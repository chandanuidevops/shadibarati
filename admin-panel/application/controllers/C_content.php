<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_content extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_category');
        $this->load->model('m_cities');
        $this->load->model('m_content');

        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();
        $acces = array();
        $acces = explode (",", $accs->menu);
        
        if (in_array("6", $acces))
        {
            $this->access = true;

        }else{
            $this->access = null;
        }
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); }

    }

	public function index()
	{
		$data['title']  = 'Category content - Shaadibaraati';
        $data['result'] = $this->m_content->contentGet();
		$this->load->view('content/list', $data, FALSE);
	}

	public function add($value='')
	{
		$data['categories']  = $this->m_category->getcategory();
        $data['cities']  = $this->m_cities->getcities();
		$data['title']  = 'Category content - Shaadibaraati';
		$this->load->view('content/add', $data, FALSE);
	}

	public function edit($id='')
	{
		$data['title']  	= 'Category content - Shaadibaraati';
		$data['categories'] = $this->m_category->getcategory();
        $data['cities']  	= $this->m_cities->getcities();
        $data['result'] 	= $this->m_content->edit($id);
		$this->load->view('content/edit', $data, FALSE);
	}

	public function update($value='')
	{

		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('', '<br>');
            $this->session->set_flashdata('error', str_replace(array("\n", "\r"), '', validation_errors()));
            redirect('content/edit/'.$this->input->post('uniq'),'refresh');
		}else{

			$insert = array(
				'city_id' 		=> $this->input->post('city'), 
				'category_id' 	=> $this->input->post('category'), 
				'description' 	=> $this->input->post('description'), 
				'uniq' 			=> $this->input->post('uniq'), 
				'title' 		=> $this->input->post('title'), 
				'canoncial' 	=> $this->input->post('can_url'), 
				'keywords' 		=> $this->input->post('keywords'), 
				'meta_desc' 	=> $this->input->post('meta_description'),
				'key1' 			=> $this->input->post('key1'), 
				'key2' 			=> $this->input->post('key2'), 
				'key3' 			=> $this->input->post('key3'), 
				'key4' 			=> $this->input->post('key4'), 
				'key5' 			=> $this->input->post('key5'), 
			);
			$id = $this->input->post('id');

			if ($this->m_content->update($insert,$id)) {
				$this->session->set_flashdata('success', 'Content updated Successfully');
                redirect('content/edit/'.$this->input->post('uniq'),'refresh');
			}else{
				$this->session->set_flashdata('error', 'Content not updated, please try again');
                redirect('content/edit/'.$this->input->post('uniq'),'refresh');
			}

		}
	}

	public function insert($value='')
	{
		$this->form_validation->set_rules('city', 'City', 'trim|required');
		$this->form_validation->set_rules('category', 'Category', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('', '<br>');
            $this->session->set_flashdata('error', str_replace(array("\n", "\r"), '', validation_errors()));
            redirect('content/add','refresh');
		} else {
			$insert = array(
				'city_id' 		=> $this->input->post('city'), 
				'category_id' 	=> $this->input->post('category'), 
				'description' 	=> $this->input->post('description'), 
				'title' 		=> $this->input->post('title'), 
				'canoncial' 	=> $this->input->post('can_url'), 
				'keywords' 		=> $this->input->post('keywords'), 
				'meta_desc' 	=> $this->input->post('meta_description'), 
				'uniq' 			=> $this->input->post('uniq'), 
				'key1' 			=> $this->input->post('key1'), 
				'key2' 			=> $this->input->post('key2'), 
				'key3' 			=> $this->input->post('key3'), 
				'key4' 			=> $this->input->post('key4'), 
				'key5' 			=> $this->input->post('key5'), 
			);

			if ($this->m_content->insert($insert)) {
				$this->session->set_flashdata('success', 'Content added Successfully');
                redirect('content/manage','refresh');
			}else{
				$this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('content/add','refresh');
			}
		}
	}

	public function delete($id='')
	{
		if ($this->m_content->delete($id)) {
			$this->session->set_flashdata('success', 'Content delted Successfully');
            redirect('content/manage','refresh');
		}else{
			$this->session->set_flashdata('error', 'Some error occured please try again');
            redirect('content/manage','refresh');
		}
	}

	public function prop($value='')
	{
		$this->load->view('sales/proposal');
	}

}

/* End of file C_content.php */
/* Location: ./application/controllers/C_content.php */