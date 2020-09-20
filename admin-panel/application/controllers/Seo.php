<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seo extends CI_Controller {

		/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') { $this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_seo');

        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();        
        $this->acces = explode (",", $accs->menu);
        
        

    }

    /**
    *manage SEO
    *@ulr : seo/manage
    **/ 
	public function index()
	{
        $acces = array();
        $acces = $this->acces;
        if (in_array("26", $acces)) {$this->access = true; }else{$this->access = null; } 
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1'))
        {  
            redirect(base_url(),'refresh'); 
        }else{
    		$data['title']  = 'SEO - Shaadibaraati';
    		$data['result'] = $this->m_seo->getPage();
    		$this->load->view('seo/list', $data);
        }
	}

	
    /**
    *add page for seo
    *@ulr : seo/add-page
    **/
    public function edit($id='')
    {
        $acces = array();
        $acces = $this->acces;
        if (in_array("26", $acces)) {$this->access = true; }else{$this->access = null; } 
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1'))
        {  
            redirect(base_url(),'refresh'); 
        }else{

        	$data['title']  = 'SEO - Shaadibaraati';
        	$data['result'] = $this->m_seo->edit($id);
        	$this->load->view('seo/edit', $data);
        }
    }

    /**
    *update seo details
    *@ulr : seo/update
    **/
    public function update($value='')
    {
        $acces = array();
        $acces = $this->acces;
        if (in_array("26", $acces)) {$this->access = true; }else{$this->access = null; } 
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1'))
        {  
            redirect(base_url(),'refresh'); 
        }else{

           $insert = array(
           	'page' 		=> $this->input->post('page') , 
           	'title' 	=> $this->input->post('title') , 
           	'keywords' 	=> $this->input->post('keywords') , 
            'm_desc'    => $this->input->post('description') ,         
           	'can_link' 	=> $this->input->post('can_url') ,       	 
            'id'        => $this->input->post('id') , 
           	'description' => $this->input->post('content') ,
           );

            if($this->m_seo->update($insert)){
    			$this->session->set_flashdata('success', 'Seo Details updated Successfully');
    			redirect('seo/edit/'.$insert['id'],'refresh');
           	}else{
    			$this->session->set_flashdata('error', 'Some error occured please try again');
    			redirect('seo/edit/'.$insert['id'],'refresh');
           	}
        }
    }


    public function delete($id = null)
    {
        if($this->m_seo->delete($id)){
			$this->session->set_flashdata('success', 'Seo Details deleted Successfully');
			redirect('seo/manage','refresh');
       }else{
			$this->session->set_flashdata('error', 'Some error occured please try again');
			redirect('seo/manage','refresh');
       }
    }


    public function seoDefault($var = null)
    {
        $data['title'] = 'SEO | rajahousing';
        if (!empty($this->input->post())) {
            $insert = array(
                'g_tag' 		=> $this->input->post('gmanager') , 
                'g_analytics' 	=> $this->input->post('ganalytics') , 
                'schema' 		=> $this->input->post('schema') , 
            );
            if($this->m_seo->defaultUpdate($insert)){
                $this->session->set_flashdata('success', 'Seo Details updated Successfully');
                redirect('seo/seoDefault','refresh');
               }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('seo/seoDefault','refresh');
               }
        }else{
            $data['result'] = $this->m_seo->getDseo();            
            $this->load->view('seo/default', $data, FALSE);      
        }
    }

    public function enquiry($value='')
    {
        $acces = array();
        $acces = $this->acces;
        if (in_array("27", $acces)) {$this->access = true; }else{$this->access = null; } 
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1'))
        {  
            redirect(base_url(),'refresh'); 
        }else{
            $data['title']   = 'Enquiry - Shaadibaraati';
            $data['result']  = $this->m_seo->getSeoEnquiry();
            $this->load->view('seo/enquiry', $data);
        }
    }

}

/* End of file Seo.php */
/* Location: ./application/controllers/Seo.php */