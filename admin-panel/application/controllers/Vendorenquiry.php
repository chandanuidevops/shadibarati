<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendorenquiry extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_venquiry');
        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();        
        $this->acces = explode (",", $accs->menu);
    }
    
    //get vendor enquiry
    public function index()
    {
        $acces = array();
        $acces = $this->acces;
        if (in_array("18", $acces)) {$this->access = true; }else{$this->access = null; } 
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1'))
        {  
            redirect(base_url(),'refresh'); 
        }else{
            $data['title'] = 'Vendor Enquiry - shaadibaraati';
            $data['result'] = $this->m_venquiry->vendor_enquiry();        
            $this->load->view('vendors/vendor-enquiry', $data);
        }
    }

    //buy package request
    public function packageGet($value='')
    {
        $acces = array();
        $acces = $this->acces;
        if (in_array("17", $acces)) {$this->access = true; }else{$this->access = null; } 
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1'))
        {  
            redirect(base_url(),'refresh'); 
        }else{
            $data['title'] = 'Vendor Packages - shaadibaraati';
            $data['result'] = $this->m_venquiry->packageGet();
            $this->load->view('vendors/package-request', $data);
        }        
    }

    public function viewPackage($id='')
    {
        $acces = array();
        $acces = $this->acces;
        if (in_array("17", $acces)) {$this->access = true; }else{$this->access = null; } 
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1'))
        {  
            redirect(base_url(),'refresh'); 
        }else{
            $data['title'] = 'Vendor Packages - shaadibaraati';
            $data['result'] = $this->m_venquiry->singlePackage($id);
            $this->load->view('vendors/package-view', $data);
        }
    }

    
    public function detail($id = null)
    {
        $data['result'] = $this->m_venquiry->detail($id); 
        $this->load->view('leads/detail', $data, FALSE);
        
    }

}

/* End of file Controllername.php */
