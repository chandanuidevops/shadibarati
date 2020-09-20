<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employe_auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_adminusers');
        $this->load->library('bcrypt');
	}

        public function verify($value='')
    {
        $refid = $this->input->get('rid');
        $rmail = $this->input->get('rmail');
        $newRegid = random_string('alnum', 50);
        if($this->m_adminusers->activateAccount($refid, $newRegid,$rmail)){
            $this->session->set_flashdata('success', 'Your account has been activated successfully. You can  login now. ');
            redirect('employees/add-password/'.$newRegid.'/'.urlencode($rmail));
        }else{
            $this->session->set_flashdata('error', 'Activation link expired! <br> please request admin for activation link');
            redirect('employees/add-password/'.$newRegid.'/'.urlencode($rmail));
        }
        
    }

    public function add_pass($id='',$email='')
    {
        $data['id'] = $id;
        $this->load->view('employee/set-pass', $data, FALSE);
    }

    public function update_pass()
    {
        $id     = $this->input->post('id');
        $remail = $this->input->post('remail');
        $this->form_validation->set_rules('remail', 'Email', 'required');
        $this->form_validation->set_rules('password', 'New Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
        if ($this->form_validation->run() == false) {
            $error = validation_errors();
            $this->session->set_flashdata('error', $error);
             redirect('employees/add-password/'.$id.'/'.urlencode($remail),'refresh');
        } else {
            $newpass = $this->input->post('password');
            $hash       = $this->bcrypt->hash_password($newpass);
            $newid  =   random_string('alnum',20);
            $datas = array(
                    'reference_d' => $newid,
                    'password' => $hash,
                );
            if ($this->m_adminusers->setPassword($datas, $remail,$id)) {
                $this->session->set_flashdata('success', 'Password updated Successfully');
                redirect('login', 'refresh');
            } else {
                $this->session->set_flashdata('error', 'Something went wrong, please try again later!.'); 
                redirect('employees/add-password/'.$id.'/'.urlencode($remail),'refresh');
            }
        }
    }

}

/* End of file Employe_auth.php */
/* Location: ./application/controllers/Employe_auth.php */