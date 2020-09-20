<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor_package extends CI_Controller {

		public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('shvid') == '') { $this->session->set_flashdata('error', 'Please login and try again'); redirect('vendor/login'); } 
		$this->load->model('m_vnpackage');
		$this->load->library('form_validation');
		$this->id = $this->session->userdata('shvid');
		$this->uniq = $this->db->where('id',$this->session->userdata('shvid'))->get('vendor')->row('uniq');
    }

	public function index()
	{
		$data['title'] 	= 'Packages | Shaadibaraati';
		$data['value'] 	= $this->m_vnpackage->getProfile($this->uniq);
		$data['result'] = $this->m_vnpackage->getPackage();
		$data['banner'] = $this->m_vnpackage->getBanner();
        $this->load->view('vendor-auth/packages',$data);
	}


	public function buyPackage($value='')
	{
		$id 	= $this->input->get('p');
		$type 	= $this->input->get('t');

		if ($type == 'package') {
			$data['result'] = $this->m_vnpackage->getPackage($id);
		}else{
			$data['result'] = $this->m_vnpackage->getBanner($id);
		}
		$data['value'] = $this->m_vnpackage->getProfile($this->uniq);
		$insert = array(
			'package' 	=> $data['result']->id, 
			'vendor_id' => $this->id, 
			'type'		=> $type
		);
		$data['package'] = $data['result']->title;

		if($this->m_vnpackage->buyPackage($insert))
		{
			$this->load->config('email');
	        $this->load->library('email');
	        $to = $this->config->item('vr_to');
	        $cc = $this->config->item('vr_cc');
	        $from = $this->config->item('smtp_user');
            $msg = $this->load->view('email/buy-package', $data, true);
            $this->email->set_newline("\r\n");
            $this->email->from($from, 'ShaadiBaraati');
            $this->email->to($to);
            $this->email->cc($cc);
            $this->email->subject('Package Request');
            $this->email->message($msg);
            if ($this->email->send()) {
                $this->session->set_flashdata('success', 'Your request has been submitted successfully, <br />You can pay the package amount here.');
                redirect('https://pages.razorpay.com/pl_Ckj0SFClrYvOzF/view','refresh');
            } else {
                $this->session->set_flashdata('error', 'Unable to submit your request, <br /> Please try again later!');
                redirect('vendor/package','refresh');
            }
        }else{
        	$this->session->set_flashdata('error', 'Unable to submit your request, <br /> Please try again later!');
            redirect('vendor/package','refresh');
        }
	}


}

/* End of file Vendor_package.php */
/* Location: ./application/controllers/Vendor_package.php */