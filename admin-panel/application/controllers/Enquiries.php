<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Enquiries extends CI_Controller {

		/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_enquiry');

        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();        
        $this->acces = explode (",", $accs->menu);      

    }

    //get enquiries
	public function index()
	{
        $acces = array();
        $acces = $this->acces;
        if (in_array("19", $acces)) {$this->access = true; }else{$this->access = null; } 
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1'))
            {  
                redirect(base_url(),'refresh'); 
            }else{
                $data['title']  = 'Enquiry - Shaadibaraati';
                $data['result']  = $this->m_enquiry->getEnquiry();
                $this->load->view('enquiry/enquiry-list', $data, FALSE);
            }	
	}

	public function view($id='')
    {
        $acces = array();
        $acces = $this->acces;
        if (in_array("19", $acces)) {$this->access = true; }else{$this->access = null; } 
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1'))
        {  
                redirect(base_url(),'refresh'); 
        }else{
            $data['result']  = $this->m_enquiry->view($id);
            $data['title']   = 'Enquiry - Shaadibaraati';
            $this->load->view('enquiry/view-enquiry', $data, FALSE);
        }
    }

    public function delete($id='')
    {
        if($this->m_enquiry->deleteEnquiry($id)){
            $this->session->set_flashdata('success', 'Enquiry deleted successfully');
        }else{
            $this->session->set_flashdata('error', 'Something went wrong please try again later');
        }
        redirect('enquiries');
    }

    public function freequote($id = null)
    {
        $acces = array();
        $acces = $this->acces;
        if (in_array("20", $acces)) {$this->access = true; }else{$this->access = null; } 
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1'))
        {  
                redirect(base_url(),'refresh'); 
        }else{
            $data['title']  = 'Free quote - Shaadibaraati';
    		$data['result']  = $this->m_enquiry->getfreequote();
    		$this->load->view('enquiry/freequote', $data, FALSE);
        }
    }

    public function quoteview($id='')
    {
        $acces = array();
        $acces = $this->acces;
        if (in_array("20", $acces)) {$this->access = true; }else{$this->access = null; } 
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1'))
        {  
                redirect(base_url(),'refresh'); 
        }else{
            $data['result']  = $this->m_enquiry->quoteview($id);
            $data['title']   = 'Enquiry - Shaadibaraati';
            $this->load->view('enquiry/view-free', $data, FALSE);
        }
    }

    
    public function quotedelete($id='')
    {
        if($this->m_enquiry->quotedelete($id)){
            $this->session->set_flashdata('success', 'Free Quote request deleted successfully');
        }else{
            $this->session->set_flashdata('error', 'Something went wrong please try again later');
        }
        redirect('free-quote');
    }


    public function newsletter($id = null)
    {
        $acces = array();
        $acces = $this->acces;
        if (in_array("21", $acces)) {$this->access = true; }else{$this->access = null; } 
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1'))
        {  
                redirect(base_url(),'refresh'); 
        }else{
            $data['title']  = 'Newsletter - Shaadibaraati';
    		$data['result']  = $this->m_enquiry->newsletter();
    		$this->load->view('enquiry/newsletter', $data, FALSE);
        }
    }

    public function newsdelete($id='')
    {
        if($this->m_enquiry->newsdelete($id)){
            $this->session->set_flashdata('success', 'Newsletter subscriber deleted successfully');
        }else{
            $this->session->set_flashdata('error', 'Something went wrong please try again later');
        }
        redirect('newsletter-subcribers');
    }

    public function testimonial($id = '')
    {
        $acces = array();
        $acces = $this->acces;
        if (in_array("22", $acces)) {$this->access = true; }else{$this->access = null; } 
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1'))
        {  
                redirect(base_url(),'refresh'); 
        }else{
            $data['title']  = 'Testimonials - Shaadibaraati';
            $data['result']  = $this->m_enquiry->testimonial($id);
            if(!empty($id)){
                $this->load->view('enquiry/testimonial-detail', $data, FALSE);
            }else{
                $this->load->view('enquiry/testimonial', $data, FALSE);
            }
        }
    }

    // testimonila status update
    public function testimonial_status($id = null)
    {
        $acces = array();
        $acces = $this->acces;
        if (in_array("22", $acces)) {$this->access = true; }else{$this->access = null; } 
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1'))
        {  
                redirect(base_url(),'refresh'); 
        }else{
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
    }

    // Feedback
    public function feedback($id = null)
    {
        $acces = array();
        $acces = $this->acces;
        if (in_array("23", $acces)) {$this->access = true; }else{$this->access = null; } 
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1'))
        {  
                redirect(base_url(),'refresh'); 
        }else{            
            $data['title']  = 'Testimonial - Shaadibaraati';
            $data['result']  = $this->m_enquiry->feedback($id);
            if(!empty($id)){
                $this->load->view('enquiry/feedback-detail', $data, FALSE);
            }else{
                $this->load->view('enquiry/feedback', $data, FALSE);
            }
        }
    }







}

/* End of file Enquiries.php */
/* Location: ./application/controllers/Enquiries.php */