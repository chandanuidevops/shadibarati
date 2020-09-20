<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_vendor');
		$this->load->library('form_validation');
		$this->load->library('bcrypt');
    }

    public function index($var = null)
    {
        if ($this->session->userdata('shvid') == '') {
			$data['title'] = 'Vendor Registration | Shaadibaraati';
            $this->load->view('vendor-auth/vendor-registration',$data);
		}else{
			redirect('vendor/profile');
        }       
        
    }



    public function login($var = null)
    {
        
        if ($this->session->userdata('shvid') == '') {
			$data['title'] = 'Vendor Registration | Shaadibaraati';
            $this->load->view('vendor-auth/vendor-login',$data);
		}else{
			redirect('vendor/profile');
        }  
    }

    	/**
     * user registration-> mobile number check exist
     * url : register
    **/
	public function phone_check($value='')
	{
		$phone = $this->input->post('phone');
        $output = $this->m_vendor->phone_check($phone);
        if (empty($output)) {
            $output = $this->m_vendor->phone_user($phone);
        }
		echo  $output;
    }

    
    /**
     * user registration-> email check exist
     * url : register
    **/
	public function emailcheck($value='')
	{
		$email = $this->input->post('email');
        $output = $this->m_vendor->email_check($email);
        if (empty($output)) {
            $output = $this->m_vendor->email_user($email);
        }
		echo  $output;
    }

    public function emailcheck1($value='')
	{
		$email = $this->input->post('email');
        $output = $this->m_vendor->email_check($email);
		echo  $output;
    }

        /**
     * user registration-> email check exist
     * url : register
    **/
	public function brandcheck($value='')
	{
		$brand = $this->input->post('brand');
        $output = $this->m_vendor->brandcheck($brand);
		echo  $output;
    }

    
    
    


    public function register_insert($value='')
	{
        $this->form_validation->set_rules('name', 'Name', 'required|is_unique[vendor.name]',
        array('required'      => 'You have not provided %s.', 'is_unique'     => 'This %s already exists.'));
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|is_unique[vendor.email]',
                array('required'      => 'You have not provided %s.', 'is_unique'     => 'This %s already exists.') );
        $this->form_validation->set_rules('phone', 'Phone Number', 'required|numeric|is_unique[vendor.phone]',
            array('required'      => 'You have not provided %s.', 'numeric'       =>  'Invalid Phone number', 'is_unique'     => 'This %s already exists.') );
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|matches[password]',
            array('required'      => 'You have not provided %s.', 'matches'       => 'Your password and confirm password is not matching') ); 
        if ($this->form_validation->run() == false) {
        	$error = validation_errors();
            $this->session->set_flashdata('formerror', $error);
        	redirect('vendor/register','refresh');
        }else{
        	$name 		= $this->input->post('name');
        	$city 		= $this->input->post('city');
        	$category 	= $this->input->post('category');
            $email 		= $this->input->post('email');
        	$phone 		= $this->input->post('phone');
        	$password 	= $this->input->post('password');
        	$hash 		= $this->bcrypt->hash_password($password);
            $refid      = random_string('alnum','20');
        	$uniq      = random_string('alnum','10');

        	$insert = array(
        		'name' 		=> $name,
        		'email' 	=> $email,
        		'phone' 	=> $phone,
        		'password' 	=> $hash,
                'reference_id'=> $refid,
                'city'      => $city,
                'category'  => $category,
                'uniq'      => $uniq 
                 );


            $data['output'] = $this->m_vendor->register($insert);          
        	if (!empty($data['output'])) {
            $this->sendregister($email, $refid);
        		if($this->sendregister($email, $refid))
        		{
        			$this->session->set_flashdata('success', 'Before you can login, you must active your <br> account with the link sent to your email address.');
                    redirect('vendor/login','refresh');
        		}else{
        			$this->session->set_flashdata('error', 'Something went wrong please try again later');
                    redirect('vendor/register','refresh');
        		}

        	}else{
        		$this->session->set_flashdata('error', 'Something went wrong please try again later');
                redirect('vendor/register','refresh');
        	}
        }
  }
  

    function sendregister($to='', $regid='')
    {
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');
        $data['regid'] = $regid;
        $msg = $this->load->view('email/vendor-register', $data, true);
        $this->email->set_newline("\r\n");
        $this->email->from($from , 'ShaadiBaraati');
        $this->email->to($to);
        $this->email->cc('hello@shaadibaraati.com');
        $this->email->subject('Vendor Registration verification'); 
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
           if($this->m_vendor->activateAccount($regid, $newRegid)){
            $this->session->set_flashdata('success', 'Your account has been activated successfully. You can  login now. ');
            redirect('vendor/login','refresh');
           }else{
            $this->session->set_flashdata('error', 'Activation link expired!<br> <a href="'.base_url().'resent-activation-code">Resend activation link</a>');
            redirect('vendor/login','refresh');
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
            $error = validation_errors();
        	$this->session->set_flashdata('error',$error);
        	redirect('vendor/login','refresh');
        }else{

        	$username = $this->input->post('email'); 
			$password = $this->input->post('password');
			$data['output'] = $this->m_vendor->can_login($username, $password);
			if (!empty($data['output'])) {
				$session_data = array(
					'shvuser' => $username,
                    'shvid'   => $data['output']['id'],
				);
			$this->session->set_userdata($session_data); 
			redirect('vendor/enter');
			}else{
				$this->session->set_flashdata('error', 'Invalid Username or Password'); 
				redirect('vendor/login');
			}
    	}
    }

        // set login session
        public function enter()
        {
            if($this->session->userdata('shvid') != ''){ 
                redirect('vendor/profile');
            } 
            else{
                redirect('vendor/login');
            } 
        }


	    /* --  logout -- */ 
        public function logout() 
        {
            $session_data = array(
                'shvuser' => $this->session->userdata('shvuser'),
                'shvid' 	=> $this->session->userdata('shvid'),
            );
            $this->session->unset_userdata($session_data);
            $this->session->sess_destroy();
            $this->session->set_flashdata('success', 'Successfully Logout');
            redirect('vendor/login');
        } 


    // forgot password
    public function forgot_password($value='')
    {
    	$data['title'] = 'Forgot password - ShaadiBaraati';
    	if($this->session->userdata('shvid') == ''){ 
    		$this->form_validation->set_rules('email', 'Email', 'required');
    		if ($this->form_validation->run() == FALSE){
	            $error = validation_errors();
                $this->session->set_flashdata('error',$error);
                redirect('vendor/login');
	        }else{

	        	 $email = $this->input->post('email');
	        	 if($result = $this->m_vendor->forgotPassword($email)){
	        	 	$this->forgotPassworMail($result, $email);
	                $this->session->set_flashdata('success', 'Reset Password link has been sent your register email id.'); 
					redirect('vendor/login');
	        	}else{
	        	 	$this->session->set_flashdata('error', 'Invalid email id. Please use register email id'); 
                     redirect('vendor/login');
	        	}
	        }
    	}else{
    		redirect('vendor/profile');
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
        $msg = $this->load->view('email/vendor-forgot-password', $data, true);
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
        $this->load->view('vendor-auth/reset-pass', $data);
    }


    public function update_pass()
    {
        $forgotid = $this->input->post('refid');
        $this->form_validation->set_rules('femail', 'Email', 'required|callback_email_check');
        $this->form_validation->set_rules('npsw', 'New Password', 'required');
        $this->form_validation->set_rules('cpsw', 'Confirm Password', 'required|matches[npsw]');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('formerror', $error);
            redirect('vendor/forgot-password-set/' . $forgotid, 'refresh');
        } else {
            $email = $this->input->post('femail');
            $newpass = $this->input->post('npsw');
            $hash 		= $this->bcrypt->hash_password($newpass);
            $newid  = 	random_string('alnum',20);
            $datas = array(
                    'reference_id' => $newid,
                    'password' => $hash,
                );

            if($result = $this->m_vendor->forgot_password_set($forgotid)){
            	if ($this->m_vendor->setPassword($datas, $email)) {
	                $this->session->set_flashdata('success', 'Password updated Successfully');
                    redirect('vendor/login');
	            } else {
	                $this->session->set_flashdata('error', 'Something went wrong, please try again later!.'); 
	                redirect('vendor/forgot-password-set/' . $forgotid, 'refresh');
	            }
            }else{
            	
            	$this->session->set_flashdata('error', 'Reset password link has been expaired, Please try again.'); 
	            redirect('vendor/forgot-password-set/' . $forgotid, 'refresh');
            }
            
        }
    }

    function email_check($str)
    {
            if ($this->m_vendor->isEmail($str) == FALSE)
            {
                $this->form_validation->set_message('email_check', 'The {field} not Valid');
                return FALSE;
            }
            else
            {
                return TRUE;
            }
    }
}