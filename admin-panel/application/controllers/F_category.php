<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class F_category extends CI_Controller {

		/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_category');
        $this->load->model('m_cities');
        $this->load->model('m_footercategory');

        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();
        $acces = array();
        $acces = explode (",", $accs->menu);
        
        if (in_array("7", $acces))
        {
            $this->access = true;

        }else{
            $this->access = null;
        }
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); }
    }


	public function index()
	{
		$data['title']  = 'Footer Category - Shaadibaraati';
        $data['result'] = $this->m_footercategory->footGet();
		$this->load->view('footer-category/list', $data, FALSE);
	}


	public function add($value='')
	{
		$data['categories']  = $this->m_category->getcategory();
        $data['cities']  = $this->m_cities->getcities();
		$data['title']  = 'Footer Category - Shaadibaraati';
		$this->load->view('footer-category/add', $data, FALSE);
	}

	public function insert($value='')
	{
		$city 		= $this->input->post('city');
		$category 	= $this->input->post('category');
		$type 		= $this->input->post('type');
		$vcategory 	= $this->input->post('vcategory');
		$popular 	= $this->input->post('popular');
		$link 		= $this->input->post('link');

		if (!empty($type[0])) {
			$this->m_footercategory->deleteType($city,$category);
			for ($i=0; $i <count($type) ; $i++) { 
				if (!empty($type[$i])) {
				$types = array('city' => $city,'category' => $category,'type' => $type[$i],'seggregation' => 1);
	            	$this->m_footercategory->insertType($types);
	            }
	        }
		}

		if (!empty($vcategory[0])) {
			$this->m_footercategory->deleteVcategory($city,$category);
			for ($i=0; $i <count($vcategory) ; $i++) { 
				if (!empty($vcategory[$i])) {
					$vcategorys = array('city' => $city,'category' => $category,'vendor_category' => $vcategory[$i],'seggregation' => 2);
	            	$this->m_footercategory->insertType($vcategorys);
	            }
	        }
		}	

		if (!empty($popular[0]) && !empty($link[0])) {
			$this->m_footercategory->deletePopular($city,$category);
			for ($i=0; $i <count($vcategory) ; $i++) { 
				if (!empty($popular[$i]) && !empty($link[$i])) {
					$populars = array('city' => $city,'category' => $category,'popular' => $popular[$i],'link' => $link[$i],'seggregation' => 3);
	            	$this->m_footercategory->insertType($populars);
				}
	        }
		}

		$this->session->set_flashdata('success', 'Footer category Added Successfully');
		redirect('footer-category/manage','refresh');
	}

	public function edit($city='',$category='')
	{
		$data['categories']  = $this->m_category->getcategory();
        $data['cities']  = $this->m_cities->getcities();
		$data['result'] = $this->m_footercategory->footEdit($city,$category);
		$this->load->view('footer-category/edit', $data, FALSE);
	}

	public function deleteInfo($value='')
	{
		$id = $this->input->get('id');
		$output = $this->m_footercategory->deleteInfo($id);
		echo $output;
	}

}

/* End of file F_category.php */
/* Location: ./application/controllers/F_category.php */