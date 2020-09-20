<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendors_approval extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_vendorsApproval');

        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();
        $acces = array();
        $acces = explode (",", $accs->menu);
        
        if (in_array("12", $acces))
        {
            $this->access = true;

        }else{
            $this->access = null;
        }
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); }
    }

    /**
     * Vendors -> approval vendors
     * load view page
     * url : vendors/approval
    **/
	public function index($id='')
	{
		$data['title']  = 'vendors - Shaadibaraati';
		if(!empty($id)){
			if($this->m_vendorsApproval->approve_vendors($id))
			{
				$data['user'] = $this->db->where('id', $id)->get('vendor')->row('email');
				$data['heading'] = 'Congratulations!';
				$data['content'] = 'Your Vendor request for ShaadiBaraati has been approved successfullly .';
				$this->sendMail($data);
				$this->session->set_flashdata('success', 'Vendor approval is successful');
			}else{
				$this->session->set_flashdata('error', 'Some error occured please try again');
			}
			redirect('vendors/edit/'.$id,'refresh');
		}else{
			$month = $this->input->get('month');
			$year = $this->input->get('year');
			if (empty($month) && !empty($year)) {
				$month = date('m');
			}

			if (empty($year) && !empty($month) ) {
				$year = date('Y');
			}

			$data['result']  = $this->m_vendorsApproval->get_vendors($month,$year);
			$this->load->view('vendors/vendor-approval', $data, FALSE);
		}
		
	}


	public function reject($id='')
	{
		$data['title']  = 'vendors - Shaadibaraati';
		if($this->m_vendorsApproval->reject_vendors($id))
		{
			$data['user'] = $this->db->where('id', $id)->get('vendor')->row('email');
			$data['heading'] = 'OOps!';
			$data['content'] = 'Your Vendor request for ShaadiBaraati has been rejected , Please contact our team if you want to activate your account';
			$this->session->set_flashdata('success', 'Vendor Rejected is successful');
		}else{
			$this->session->set_flashdata('error', 'Some error occured please try again');
		}
		redirect('vendors/edit/'.$id,'refresh');
	}


	public function sendMail($data='')
	{

			$this->load->config('email');
            $this->load->library('email');
            $to = $data['user'];
            $from = $this->config->item('smtp_user');
            $msg = $this->load->view('email/vendor_approval', $data, true);
            $this->email->set_newline("\r\n");
            $this->email->from($from, 'ShaadiBaraati');
            $this->email->to($to);
            $this->email->subject('Vendor Approval Request');
            $this->email->message($msg);
            if ($this->email->send()) {
                return true;
            } else {
               return false;
            }
	}

}

/* End of file vendors_approval.php */
/* Location: ./application/controllers/vendors_approval.php */