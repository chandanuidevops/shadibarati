<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_authentication');
        $this->ci =& get_instance();
    }

    /**
     * Admin login-> load view page
     * url : login
    **/
	public function index()
	{
		if ($this->session->userdata('inv_id') == '') {
            $data['title'] = 'login - i';
            $this->load->view('auth/login', $data);
        } else {
            redirect('dashboard');
        }
		
	}


	/**
     * check admin exist
     * @url : login/check
     * @param : email or username , password
     *
     **/
    public function form_validation()
    {
        $this->form_validation->set_rules('username', 'Username or Email', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');
        if ($this->form_validation->run()) {

            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $data['login'] = $this->m_authentication->can_login($username, $password);
            if (!empty($data['login'])) {
                if (!empty($data['login']['id'])) {
                    $id = $data['login']['id'];
                    $email = $data['login']['email'];
                    $admin_type = $data['login']['admin_type'];
                }

                $session_data = array('inv_id' => $id, 'inv_mail' => $email,'inv_typ' => $admin_type);
                $this->session->set_userdata($session_data);
                redirect('dashboard');
            } else {
                $this->session->set_flashdata('error', 'Invalid Username or Password');
                redirect('login');
            }
        } else {

            $error = validation_errors();
            $this->session->set_flashdata('formerror', $error);
            redirect('login');
        }
    }



    /**
     * enter admin panel if admin exist
     * @url : dashboard
     *
    **/
    public function enter()
    {
        if ($this->session->userdata('inv_id') != '') {

            if($this->session->userdata('inv_typ') == '7'){
                redirect('finance/new-proposal','refresh');
            }else{
                $data['title'] = 'Dashboard - Invitation';
                // $data['enquiry'] = $this->m_authentication->getEnquiry();
                // $data['vcount'] = $this->m_authentication->vendorCount();
                // $data['uscount'] = $this->m_authentication->userCount();
                // $data['vnenquirycount'] = $this->m_authentication->vnenquiryCount();
                // $data['catcount'] = $this->m_authentication->categoryCount();
            }
            $this->load->view('pages/dashboard.php', $data);
        } else {
            $this->session->set_flashdata('error', 'Please login and try again');
            redirect('login');
        }
    }

    /**
     * logout
     * @url : logout
     *
    **/
    public function logout()
    {
        $session_data = array( 'inv_id' => $this->session->userdata('inv_id'), 'inv_mail' => $this->session->userdata('inv_mail'),'inv_typ' => $this->session->userdata('inv_typ'));
        $this->session->unset_userdata($session_data);
        $this->session->sess_destroy();
        $this->session->set_flashdata('logout', 'You are logged out Successfully');
        redirect('login');
    }


        /**
     * forget pasword mail check exist or not
     * @url : forgot/email-check
     * @param : email and forgot-id
     */
    public function forgot_password()
    {
        $forgotid = random_string('alnum', 16);
        $email = $this->input->post('email');
        $output = $this->m_authentication->check_mail($email, $forgotid);
        if ($output == '' && $output == FALSE) {
            $this->session->set_flashdata('error', 'invalid Email address');
            redirect('login');
        } else {

            $data['forgotid'] = $forgotid;
            $this->load->config('email');
            $this->email->set_newline('\r\n');
            $this->load->library('email');
            // $this->email->clear(TRUE);
            $from = $this->config->item('smtp_user');
            $msg = $this->load->view('mail/forgot', $data,true);
            $this->email->from($from , 'Invitation');
            $this->email->to($email);
            $this->email->subject('forgot password - Invitation');
            $this->email->message($msg);

            if ($this->email->send()) {
                $this->session->set_flashdata('success', 'Please check your email to rest the password');
                redirect('login');
            } else {
                $this->session->set_flashdata('error', 'Please try again');
                redirect('login');
            }

        }

    }


    /**
     * after forgot pasword mail click
     * @url : forgot/email-check
     * @param : forgot-id
     **/
    public function add_pass($id = '')
    {
        $data['title'] = 'admin-Forgot password - Invitation';
        $data['id'] = $id;
        $this->load->view('auth/reset-psw', $data);
    }

    /**
     * forget pasword -> update New Password
     * @url : update-password
     * @param : email and forgot-id , new password
    **/
    public function update_pass()
    {
        $forgotid = $this->input->post('id');
        $this->form_validation->set_rules('remail', 'Email Address', 'required|valid_email');
        $this->form_validation->set_rules('password', 'New Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('formerror', $error);
            redirect('set-password/' . $forgotid, 'refresh');
        } else {
            $email = $this->input->post('remail');
            $newpass = $this->input->post('password');
            $hash       = $this->bcrypt->hash_password($newpass);

            if ($this->m_authentication->addforgtpass($email, $hash, $forgotid)) {
                $this->session->set_flashdata('success', 'Password updated Successfully');
                redirect('login', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Email id does not exist. please enter correct one!');
                redirect('set-password/' . $forgotid, 'refresh');
            }
        }
    }

}

/* End of file Authentication.php */
/* Location: ./application/controllers/Authentication.php */