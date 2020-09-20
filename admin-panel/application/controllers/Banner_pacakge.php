<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_pacakge extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') { $this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_bannerp');

        $this->aid = $this->session->userdata('sha_id');
        $this->type = $this->session->userdata('sha_type');
        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();
        $acces = array();
        $acces = explode (",", $accs->menu);
        
        if (in_array("16", $acces))
        {
            $this->access = true;

        }else{
            $this->access = null;
        }
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); }

    }


    /**
    * banner package - manage banner package
    * @url - banner-package
    ***/ 
	public function index()
	{
		$data['title'] 	= 'Banner Package - Shaadibaraati';
		$data['result']	=	$this->m_bannerp->getPackage();
		$this->load->view('banner-package/manage', $data, FALSE);		
	}

	/**
    * package - add package
    * @url - package/add
    ***/ 
    public function add($value='')
    {
    	$data['title'] 	= 'Banner Package - Shaadibaraati';
    	$this->load->view('banner-package/add', $data, FALSE);	
    }

	/**
    * package - insert package
    * @url - package/insert
    ***/     	
    function insert($value='')
	{
		$title 	= $this->input->post('title');
    	$page 	= $this->input->post('page');
    	$pack1 	= $this->input->post('pack1');
    	$pack2 	= $this->input->post('pack2');
    	$limit 	= $this->input->post('limit');
    	$tenure = $this->input->post('tenure');

    	$insert = array(
    		'title' 	=>	$title , 
    		'page' 		=>	$page , 
    		'pack1' 	=>	$pack1 , 
    		'pack2' 	=>	$pack2 , 
    		'p_limit' 	=>  $limit , 
    		'tenure' 	=>  $tenure , 
    	);

    	if($this->m_bannerp->insert($insert))
    	{
    		$this->session->set_flashdata('success', 'Banner Package added successfully');
    		redirect('banner-package','refresh');
    	}else{
    		$this->session->set_flashdata('error', 'Something went wrong please tey again later!');
    		redirect('banner-package/add','refresh');
    	}
    }

    /**
    * bannerpackage - edit banner package
    * @url - banner-package/edir
    ***/ 
    public function edit($id='')
    {
    	$data['title'] 	= 'Banner Package - Shaadibaraati';
		$data['result']	=	$this->m_bannerp->singlePackage($id);
		$this->load->view('banner-package/edit', $data, FALSE);
    }

    /**
    * package - update package
    * @url - package/update
    ***/ 
    public function update($value='')
    {
		$title 	= $this->input->post('title');
    	$page 	= $this->input->post('page');
    	$pack1 	= $this->input->post('pack1');
    	$pack2 	= $this->input->post('pack2');
    	$limit 	= $this->input->post('limit');
    	$tenure = $this->input->post('tenure');
    	$id 	= $this->input->post('id');

    	$update = array(
    		'title' 	=>	$title , 
    		'page' 		=>	$page , 
    		'pack1' 	=>	$pack1 , 
    		'pack2' 	=>	$pack2 , 
    		'p_limit' 	=>  $limit , 
    		'tenure' 	=>  $tenure , 
    	);

    	if($this->m_bannerp->update($update,$id))
    	{
    		$this->session->set_flashdata('success', 'Banner Package updated successfully');
    		redirect('banner-package/edit/'.$id,'refresh');
    	}else{
    		$this->session->set_flashdata('error', 'Something went wrong please tey again later!');
    		redirect('banner-package/edit/'.$id,'refresh');
    	}
    }


    public function delete($id='')
    {
    	if($this->m_bannerp->delete($id))
    	{
    		$this->session->set_flashdata('success', 'Package Deleted successfully');
    		redirect('banner-package','refresh');
    	}else{
    		$this->session->set_flashdata('error', 'Something went wrong please tey again later!');
    		redirect('banner-package','refresh');
    	}
    }

}

/* End of file Banner_pacakge.php */
/* Location: ./application/controllers/Banner_pacakge.php */