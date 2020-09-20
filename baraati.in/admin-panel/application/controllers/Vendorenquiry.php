<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendorenquiry extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_venquiry');
    }
    
    //get vendor enquiry
    public function index()
    {
        $data['title'] = 'Vendor Enquiry - shaadibaraati';
        $data['result'] = $this->m_venquiry->vendor_enquiry();        
        $this->load->view('vendors/vendor-enquiry', $data);     
        
    }

}

/* End of file Controllername.php */
