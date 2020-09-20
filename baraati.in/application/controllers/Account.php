<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if ($this->session->userdata('shdid') == '') { $this->session->set_flashdata('error', 'Please login'); redirect('login','refresh'); }
		$this->uid = $this->session->userdata('shdid');
		$this->load->model('m_account');
	}

		/**
		*account settings -> load view page
		* @url : profile
		*/
        public function index()
        {
            $data['title'] = 'Account settings - ShaadiBaraati';
            $data['setting'] = $this->m_account->account($this->uid);
            $this->load->view('account/profile.php', $data, FALSE); 
        }

		/**
		*account settings -> update profile
		* @url : profile/update
		*/
		public function update_profile($value='')
		{

			$files = $_FILES;
	        $filesCount = count($_FILES['profilepic']['name']);
	        if (file_exists($_FILES['profilepic']['tmp_name'])) {
	            $config['upload_path'] = 'user-profile/';
	            $config['allowed_types'] = 'jpg|png|jpeg';
	            $config['max_width'] = 0;
	            $config['encrypt_name'] = true;
	            $this->load->library('upload');
	            $this->upload->initialize($config);
	            if (!is_dir($config['upload_path'])) {
	                mkdir($config['upload_path'], 0777, true);
	            }

	            if (!$this->upload->do_upload('profilepic')) {
	                $error = array('error' => $this->upload->display_errors());
	                // print_r($error);exit();
	                $this->session->set_flashdata('error', $this->upload->display_errors());
	                redirect('profile');
	            } else {
	                // echo "ok";exit();
	                $upload_data = $this->upload->data();
	                $config['image_library'] = 'gd2';
	                $config['source_image'] = $upload_data['full_path'];
	                $config['create_thumb'] = true;
	                $config['maintain_ratio'] = false;
	                $config['height'] = 400;
	                $config['width'] = 400;

	                $this->load->library('image_lib', $config);
	                $this->image_lib->resize();

	                $file_name = $upload_data['file_name'];
	                $imgpath = 'user-profile/'.$file_name;
	            }
	        }
		       $name 	= $this->input->post('name');
		       $email 	= $this->input->post('email');
		       $phone 	= $this->input->post('phone');
		       $gender 	= $this->input->post('gender');
		        $insert =  array(
		        	'su_name' 	=> $name,
		        	'su_email' 	=> $email,
		        	'su_phone' 	=> $phone,
		        	'gender' 	=> $gender
	        	);

	        	if (file_exists($_FILES['profilepic']['tmp_name'])) {
	        		$insert['su_profile_file'] = $imgpath;
	        	}
	        	
        	    if($this->m_account->updateProfile($insert, $this->uid)){
                    $this->session->set_flashdata('success', 'Profile has been updated Successfully');
                    redirect('profile','refresh');
                }else{
                    $this->session->set_flashdata('error', 'Something went wrong please try again later!');
                    redirect('profile','refresh');
                }
		}


		public function getShortist($value='')
		{
			$data['title'] = 'Shortlisted vendors - ShaadiBaraati';
			$data['vendor'] = $this->m_account->getShortlisted($this->uid);
			$this->load->view('account/shortlist', $data, FALSE);
		}

		public function enquireVendor($id='')
		{
			$data['title'] = 'Enquired vendors - ShaadiBaraati';
			$data['vendor'] = $this->m_account->enquireVendor($this->session->userdata('shduser'));
			$this->load->view('account/enq-vendor', $data, FALSE);
		}



}

/* End of file Account.php */
/* Location: ./application/controllers/Account.php */