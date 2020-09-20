<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiries extends CI_Controller {

		/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_enquiry');
    }

    //get enquiries
	public function index()
	{
		$data['title']  = 'Enquiry - Shaadibaraati';
		$data['result']  = $this->m_enquiry->getEnquiry();
		$this->load->view('enquiry/enquiry-list', $data, FALSE);
		
	}

	public function view($id='')
    {
        $data['result']  = $this->m_enquiry->view($id);
        $data['title']   = 'Enquiry - Shaadibaraati';
        $this->load->view('enquiry/view-enquiry', $data, FALSE);
    }

    public function freequote($id = null)
    {
        $data['title']  = 'Free quote - Shaadibaraati';
		$data['result']  = $this->m_enquiry->getfreequote();
		$this->load->view('enquiry/freequote', $data, FALSE);
    }

    public function quoteview($id='')
    {
        $data['result']  = $this->m_enquiry->quoteview($id);
        $data['title']   = 'Enquiry - Shaadibaraati';
        $this->load->view('enquiry/view-free', $data, FALSE);
    }

    public function newsletter($id = null)
    {
        $data['title']  = 'Newsletter - Shaadibaraati';
		$data['result']  = $this->m_enquiry->newsletter();
		$this->load->view('enquiry/newsletter', $data, FALSE);
    }

    public function testimonial($id = '')
    {
        $data['title']  = 'Testimonila - Shaadibaraati';
        $data['result']  = $this->m_enquiry->testimonial($id);
        if(!empty($id)){
            $this->load->view('enquiry/testimonial-detail', $data, FALSE);
        }else{
            $this->load->view('enquiry/testimonial', $data, FALSE);
        }
    }

    // testimonila status update
    public function testimonial_status($id = null)
    {
        $upt = $this->input->get('q');
        if($upt == 'approve'){
            $data = array('status' => '1');
        }else{
            $data = array('status' => '2');
        }
        if($this->m_enquiry->testimonial_status($id, $data)){
            $this->session->set_flashdata('success', 'Status update successfully');
            redirect('testimonial/'.$id);
        }else{
            $this->session->set_flashdata('error', 'Some error occred');
            redirect('testimonial/'.$id);
        }
    }

    // Feedback
    public function feedback($id = null)
    {
        $data['title']  = 'Testimonila - Shaadibaraati';
        $data['result']  = $this->m_enquiry->feedback($id);
        if(!empty($id)){
            $this->load->view('enquiry/feedback-detail', $data, FALSE);
        }else{
            $this->load->view('enquiry/feedback', $data, FALSE);
        }
    }

}

/* End of file Enquiries.php */
/* Location: ./application/controllers/Enquiries.php */