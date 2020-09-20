<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('m_auth');
		$this->load->library('form_validation');
		$this->load->library('bcrypt');
	}

	/**
     * user registration-> load view page
     * url : register
    **/
	public function index()
	{
		if ($this->session->userdata('inuid') == '') {
			$data['title'] = 'Register - Invitation';
			$this->load->view('auth/register', $data, FALSE);
		}else{
			redirect('profile');
		}
	}


	/**
     * user registration-> insert data
     * url : register
    **/
	public function register_insert($value='')
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[user.email]', array('required' => 'You have not provided %s.', 'is_unique'     => 'This %s already exists.') ); 
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('c_password', 'Password Confirmation', 'trim|required|matches[password]',
            array('required'      => 'You have not provided %s.', 'matches'       => 'Your password and confirm password is not matching') ); 
        if ($this->form_validation->run() == false) {
        	$error = validation_errors();
            $this->session->set_flashdata('error', $error);
        	redirect('register','refresh');
        }else{
        	$name 		= $this->input->post('name');
        	$email 		= $this->input->post('email');
        	$password 	= $this->input->post('password');
        	$hash 		= $this->bcrypt->hash_password($password);
        	$refid      = random_string('alnum','20');

        	$insert = array(
        		'name' 		=> $name,
        		'email' 	=> $email,
        		'password' 	=> $hash,
        		'refid' 	=> $refid,
                'status'	=> $refid,
            );

            $data['output'] = $this->m_auth->register($insert);
        	if (!empty($data['output'])) {
        		if($this->sendregister($email, $refid))
        		{
        			$this->session->set_flashdata('success', 'Before you can login, you must active your account with the link sent to your email address.');
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
		$this->email->from($from , 'Invitation');
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
       if($this->m_auth->activateAccount($regid, $newRegid)){
        $this->session->set_flashdata('success', 'Your account has been activated successfully. You can  login now. ');
        redirect('login','refresh');
       }else{
        $this->session->set_flashdata('error', 'Activation link expired, please contact our support team');
        redirect('login','refresh');
       }
    }

       /**
     * user login-> load view page
     * url : login
    **/
    public function login($value='')
    {
    	if ($this->session->userdata('inuid') == '') {
    		$data['title'] = 'Login - Invitation';
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
            $error = validation_errors();
        	$this->session->set_flashdata('error',$error);
        	redirect('login','refresh');
        }else{

        	$email = $this->input->post('email'); 
			$password = $this->input->post('password');
			$data['output'] = $this->m_auth->can_login($email, $password);
			if (!empty($data['output'])) {
				$session_data = array(
					'inusr' => $email,
                    'inuid'   => $data['output']['id'],
				);
			$this->session->set_userdata($session_data); 
			redirect('auth/enter');
			}else{
				$this->session->set_flashdata('error', 'Invalid Username or Password'); 
				redirect('login');
			}
    	}
    }


    // set login session
    public function enter()
	{
		if($this->session->userdata('inuid') != ''){ 
			redirect('profile');
		}else{
			redirect('login');
		} 
	}

	    /* --  logout -- */ 
    public function logout() 
	{
        $session_data = array(
            'inusr' => $this->session->userdata('inusr'),
            'inuid' => $this->session->userdata('inuid'),
        );
		$this->session->unset_userdata($session_data);
		$this->session->sess_destroy();
        $this->session->set_flashdata('success', 'You are logged Successfully');
		redirect('login');
    } 

}