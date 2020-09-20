<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_package');

        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();
        $acces = array();
        $acces = explode (",", $accs->menu);
        
        if (in_array("15", $acces))
        {
            $this->access = true;

        }else{
            $this->access = null;
        }
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); }
        
        

    }


    /**
    * package - manage package
    * @url - package
    ***/ 
	public function index()
	{
		$data['title'] 	= 'Package - Shaadibaraati';
		$data['result']	=	$this->m_package->getPackage();
		$this->load->view('package/manage', $data, FALSE);		
	}

	/**
    * package - add package
    * @url - package/add
    ***/ 
    public function add($value='')
    {
    	$data['title'] 	= 'Package - Shaadibaraati';
    	$this->load->view('package/add', $data, FALSE);	
    }

	/**
    * package - insert package
    * @url - package/insert
    ***/     	
    function insert($value='')
	{
    	$title 	= $this->input->post('title');
    	$position = $this->input->post('position');
    	$cost 	= $this->input->post('cost');
    	$c_per 	= $this->input->post('c_per');
    	$leads 	= $this->input->post('leads');
    	$banner = $this->input->post('banner');

    	$insert = array(
    		'title' 		=>	$title , 
    		'list_position' =>	$position , 
    		'price' 		=>	$cost , 
    		'price_per' 	=>	$c_per , 
    		'leads' 		=>  $leads , 
    		'banner' 		=>  $banner , 
    	);

    	if($this->m_package->insert($insert))
    	{
    		$this->session->set_flashdata('success', 'Package added successfully');
    		redirect('package','refresh');
    	}else{
    		$this->session->set_flashdata('error', 'Something went wrong please tey again later!');
    		redirect('package/add','refresh');
    	}
    }

    /**
    * package - insert package
    * @url - package/insert
    ***/ 
    public function edit($id='')
    {
    	$data['title'] 	= 'Package - Shaadibaraati';
		$data['result']	=	$this->m_package->singlePackage($id);
		$this->load->view('package/edit', $data, FALSE);
    }

    /**
    * package - update package
    * @url - package/update
    ***/ 
    public function update($value='')
    {
    	$title 	= $this->input->post('title');
    	$position = $this->input->post('position');
    	$cost 	= $this->input->post('cost');
    	$c_per 	= $this->input->post('c_per');
    	$leads 	= $this->input->post('leads');
    	$banner = $this->input->post('banner');
    	$id 	= $this->input->post('id');

    	$update = array(
    		'title' 		=>	$title , 
    		'list_position' =>	$position , 
    		'price' 		=>	$cost , 
    		'price_per' 	=>	$c_per , 
    		'leads' 		=>  $leads , 
    		'banner' 		=>  $banner , 
    	);

    	if($this->m_package->update($update,$id))
    	{
    		$this->session->set_flashdata('success', 'Package updated successfully');
    		redirect('package/edit/'.$id,'refresh');
    	}else{
    		$this->session->set_flashdata('error', 'Something went wrong please tey again later!');
    		redirect('package/edit/'.$id,'refresh');
    	}
    }


    public function delete($id='')
    {
    	if($this->m_package->delete($id))
    	{
    		$this->session->set_flashdata('success', 'Package Deleted successfully');
    		redirect('package','refresh');
    	}else{
    		$this->session->set_flashdata('error', 'Something went wrong please tey again later!');
    		redirect('package','refresh');
    	}
    }

}

/* End of file Package.php */
/* Location: ./application/controllers/Package.php */