<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_authentication');
		$this->load->library('form_validation');
		$this->load->library('bcrypt');
	}

	/**
     * user registration-> load view page
     * url : register
    **/
	public function index()
	{

		if ($this->session->userdata('shdid') == '') {
			$data['title'] = 'Register - ShaadiBaraati';
			$this->load->view('auth/registration', $data, FALSE);
		}else{
			redirect('profile');
		}
	}

	/**
     * user registration-> mobile number check exist
     * url : register
    **/
	public function phone_check($value='')
	{
		$phone = $this->input->post('phone');
        $output = $this->m_authentication->phone_check($phone);
		echo  $output;
    }


    /**
     * user registration-> email check exist
     * url : register
    **/
	public function emailcheck($value='')
	{
		$email = $this->input->post('email');
        $output = $this->m_authentication->email_check($email);
		echo  $output;
    }
    

    


	/**
     * user registration-> insert data
     * url : register
    **/
	public function register_insert($value='')
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|numeric|is_unique[user.su_phone]',
            array('required'      => 'You have not provided %s.', 'numeric'       =>  'Invalid Phone number', 'is_unique'     => 'This %s already exists.') );
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[user.su_email]',
                array('required'      => 'You have not provided %s.', 'is_unique'     => 'This %s already exists.') );
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('cnpassword', 'Password Confirmation', 'trim|required|matches[password]',
            array('required'      => 'You have not provided %s.', 'matches'       => 'Your password and confirm password is not matching') ); 
        if ($this->form_validation->run() == false) {
        	$error = validation_errors();
            $this->session->set_flashdata('error', $error);
        	redirect('register','refresh');
        }else{
        	$name 		= $this->input->post('name');
        	$phone 		= $this->input->post('phone');
        	$email 		= $this->input->post('email');
        	$password 	= $this->input->post('password');
        	$hash 		= $this->bcrypt->hash_password($password);
        	$refid      = random_string('alnum','20');

        	$insert = array(
        		'su_name' 		=> $name,
        		'su_email' 		=> $email,
        		'su_phone' 		=> $phone,
        		'su_password' 	=> $hash,
        		'su_referenceid'=> $refid,
                 );

            $data['output'] = $this->m_authentication->register($insert);
            


        	if (!empty($data['output'])) {
        		if($this->sendregister($email, $refid))
        		{
        			$this->session->set_flashdata('success', 'Before you can login, you must active your account with the code sent to your email address.');
                    redirect('login','refresh');
        		}else{
        			$this->session->set_flashdata('error', 'Something went wrong please try again later');
                    redirect('register','refresh');
        		}

        	}else{
        		$this->session->set_flashdata('error', 'Something went wrong please try again later');
                redirect('register','refresh');
        	}
        }
	}

	/**
     * user registration-> email send
     * 
    **/
    function sendregister($to='', $regid='')
    {
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $data['regid'] = $regid;
        $msg = $this->load->view('email/registration', $data, true);
		$this->email->set_newline("\r\n");
		$this->email->from($from , 'ShaadiBaraati');
        $this->email->to($to);
        $this->email->subject('Registration verification'); 
        $this->email->message($msg);
     	if($this->email->send())  
        {  
           
         	return true;
        } 
        else
        {
            
            return false;
        }
        
    }



    // account activation
    public function email_verification($var = null)
    {
       $regid = $this->input->get('regid');
       $newRegid = random_string('alnum', 50);
       if($this->m_authentication->activateAccount($regid, $newRegid)){
        $this->session->set_flashdata('success', 'Your account has been activated successfully. You can  login now. ');
        redirect('login','refresh');
       }else{
        $this->session->set_flashdata('error', 'Activation link expired!<br> <a href="'.base_url().'resent-activation-code">Resend activation link</a>');
        redirect('login','refresh');
       }
    }

    /**
     * user login-> load view page
     * url : login
    **/
    public function login($value='')
    {
    	if ($this->session->userdata('shdid') == '') {
    		$data['title'] = 'Login - ShaadiBaraati';
			$this->load->view('auth/login', $data, FALSE);
    	}else{
    		redirect('profile');
    	}
    }

    /**
     * user login-> check_login
     * url : login
    **/
    public function check_login($value='')
    {
    	$this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
        if ($this->form_validation->run() == FALSE){
            redirect('login','refresh');
            $error = validation_errors();
        	$this->session->set_flashdata('error',$error);
        	redirect('login','refresh');
        }else{

        	$username = $this->input->post('email'); 
			$password = $this->input->post('password');
			$data['output'] = $this->m_authentication->can_login($username, $password);
			if (!empty($data['output'])) {
				$session_data = array(
					'shduser' => $username,
                    'shdid'   => $data['output']['su_id'],
				);
			$this->session->set_userdata($session_data); 
			redirect('authentication/enter');
			}else{
				$this->session->set_flashdata('error', 'Invalid Username or Password'); 
				redirect('login');
			}
    	}
    }


    // set login session
    public function enter()
	{
		if($this->session->userdata('shdid') != ''){ 
			redirect('profile');
		} 
		else{
			redirect('login');
		} 
	}

	    /* --  logout -- */ 
    public function logout() 
	{
        $session_data = array(
            'shduser' => $this->session->userdata('shduser'),
            'shdid' 	=> $this->session->userdata('shdid'),
        );
		$this->session->unset_userdata($session_data);
		$this->session->sess_destroy();
        $this->session->set_flashdata('success', 'Successfully Logout');
		redirect('login');
    } 

    // forgot password
    public function forgot_password($value='')
    {
    	$data['title'] = 'Forgot password - ShaadiBaraati';
    	if($this->session->userdata('shdid') == ''){ 
    		$this->form_validation->set_rules('email', 'Email', 'required');
    		if ($this->form_validation->run() == FALSE){
	            redirect('login','refresh');
	            $error = validation_errors();
	        	$this->session->set_flashdata('error',$error);
	        }else{

	        	 $email = $this->input->post('email');
	        	 if($result = $this->m_authentication->forgotPassword($email)){
	        	 	$this->forgotPassworMail($result, $email);
	                $this->session->set_flashdata('success', 'Reset Password link has been sent your register email id.'); 
					redirect('login');
	        	}else{
	        	 	$this->session->set_flashdata('error', 'Invalid email id. Please use register email id'); 
					redirect('login');
	        	}
	        }
    	}else{
    		redirect('profile');
    	}
    }

    /**
     * forgot password-> email send
     * 
    **/
    function forgotPassworMail($result='', $email='')
    {
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $data['regid'] = $result;
        $msg = $this->load->view('email/forgot-password', $data, true);
		$this->email->set_newline("\r\n");
		$this->email->from($from , 'ShaadiBaraati');
        $this->email->to($email);
        $this->email->subject('Forgot Password'); 
        $this->email->message($msg);
     	if($this->email->send())  
        {
         	return true;
        } 
        else
        {
            return false;
        }
        
    }


    /**
     * after forgot pasword mail click
     * @url : forgot/email-check
     * @param : forgot-id
    **/
    public function add_pass($id = '')
    {
        $data['title'] = 'Forgot password - Shaadi Baraati';
        $data['id'] = $id;
        $this->load->view('auth/reset-password', $data);
    }

        /**
     * forget pasword -> update New Password
     * @url : update-password
     * @param : email and forgot-id , new password
    **/
    public function update_pass()
    {
        $forgotid = $this->input->post('refid');
        $this->form_validation->set_rules('femail', 'Email', 'required|callback_email_check');
        $this->form_validation->set_rules('npsw', 'New Password', 'required');
        $this->form_validation->set_rules('cpsw', 'Confirm Password', 'required|matches[npsw]');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('error', $error);
            redirect('forgot-password-set/' . $forgotid, 'refresh');
        } else {
            $email = $this->input->post('femail');
            $newpass = $this->input->post('npsw');
            $hash 		= $this->bcrypt->hash_password($newpass);
            $newid  = 	random_string('alnum',20);
            $datas = array(
                    'su_referenceid' => $newid,
                    'su_password' => $hash,
                );

            if($result = $this->m_authentication->forgot_password_set($forgotid)){
            	if ($this->m_authentication->setPassword($datas, $email)) {
	                $this->session->set_flashdata('success', 'Password updated Successfully');
	                redirect('login', 'refresh');
	            } else {
	                $this->session->set_flashdata('error', 'Something went wrong, please try again later!.'); 
	                redirect('forgot-password-set/' . $forgotid, 'refresh');
	            }
            }else{
            	
            	$this->session->set_flashdata('error', 'Reset password link has been expaired, Please try again.'); 
	            redirect('forgot-password-set/' . $forgotid, 'refresh');
            }
            
        }
    }

    function email_check($str)
    {
            if ($this->m_authentication->isEmail($str) == FALSE)
            {
                $this->form_validation->set_message('email_check', 'The {field} not Valid');
                return FALSE;
            }
            else
            {
                return TRUE;
            }
    }


    public function vendorRegister($var = null)
    {
        
		if ($this->session->userdata('shdid') == '') {
			$data['title'] = 'Register - ShaadiBaraati';
			$this->load->view('auth/vendor-registration', $data, FALSE);
		}else{
			redirect('profile');
		}
    }


    public function vendorsend($var = null)
    {
        $this->form_validation->set_rules('bname', 'Brand name', 'required');
        // $this->form_validation->set_rules('phone', 'Phone Number', 'required|numeric',array('required'      => 'You have not provided %s.', 'numeric'       =>  'Invalid Phone number') );
        // $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email', array('required'      => 'You have not provided %s.', 'is_unique'     => 'This %s already exists.') );
        if ($this->form_validation->run() == false) {
        	$error = validation_errors();
            $this->session->set_flashdata('error', $error);
        	redirect('vendor-register','refresh');
        }else{

                $email = 'shahirkm@5ine.in';
                $insert = array(
                    'bname'     => $this->input->post('bname'),
                    'cperson'   => $this->input->post('cperson'),
                    'email'     => $this->input->post('email'),
                    'phone'     => $this->input->post('phone'),
                    'weburl'    => $this->input->post('weburl'),
                    'pin'       => $this->input->post('pin'),
                    'address'   => $this->input->post('address'),
                    'des'       => $this->input->post('des'),
                    'city'      => $this->input->post('city'),
                    'servie'    => $this->input->post('service'),
                 );

                 $this->load->config('email');
                 $this->load->library('email');
                 $from = $this->config->item('smtp_user');
                 $data['result'] = $insert;
                 $msg = $this->load->view('email/vendor-registartion', $data, true);
                 $this->email->set_newline("\r\n");
                 $this->email->from($from , 'ShaadiBaraati');
                 $this->email->to($email);
                 $this->email->subject('Vendor registartion'); 
                 $this->email->message($msg);
                if($this->email->send())  
                {
                   $this->session->set_flashdata('success', 'Your request has been successfully submitted to our team, our team get back to you soon!');
                   redirect('vendor-register','refresh');
                } 
                else
                {
                   $this->session->set_flashdata('error', 'Something went wromg please try again later!');
                   redirect('vendor-register','refresh');
                }


        }
        
    }



	

}

/* End of file Authentication.php */
/* Location: ./application/controllers/Authentication.php */