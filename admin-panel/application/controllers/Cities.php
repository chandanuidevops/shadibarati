<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cities extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_cities');

        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();
        $acces = array();
        $acces = explode (",", $accs->menu);
        
        if (in_array("2", $acces))
        {
            $this->access = true;

        }else{
            $this->access = null;
        }
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); }
    }


    /**
     * cities -> add cities
     * load view page
     * url : cities/add
    **/
	public function index()
	{
		$data['title']  = 'cities - Shaadibaraati';
		$this->load->view('cities/add-city', $data, FALSE);
	}

	/**
     * cities -> insert cities
     * insert new cities into db
     * url : cities/insert
    **/
	public function insert_city($value='')
	{

		$files = $_FILES;
        if (file_exists($_FILES['image']['tmp_name'])) {
            $config['upload_path'] = '../city-image/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_width'] = 0;
            $config['encrypt_name'] = true;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                // print_r($error);exit();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('cities/add');
            } else {
                // echo "ok";exit();
                $upload_data = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = $upload_data['full_path'];
                $config['create_thumb'] = true;
                $config['maintain_ratio'] = true;
                $config['height'] = 250;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $file_name = $upload_data['file_name'];
                $imgpath = 'city-image/'.$file_name;

            }
        }


        $files1 = $_FILES;
        if (file_exists($_FILES['icon']['tmp_name'])) {
            $config['upload_path'] = '../icon-image/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_width'] = 0;
            $config['encrypt_name'] = true;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            if (!$this->upload->do_upload('icon')) {
                $error = array('error' => $this->upload->display_errors());
                // print_r($error);exit();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('cities/add');
            } else {
                // echo "ok";exit();
                $upload_data1 = $this->upload->data();
                $config1['image_library'] = 'gd2';
                $config1['source_image'] = $upload_data1['full_path'];
                $config1['create_thumb'] = true;
                $config1['maintain_ratio'] = true;
                $config1['height'] = 250;

                $this->load->library('image_lib', $config1);
                $this->image_lib->resize();

                $file_name1 = $upload_data1['file_name'];
                $icnpath = 'icon-image/'.$file_name1;

            }
        }

        $insert =  array(
        	'uniq' => $this->input->post('city_id'),
            'city' => $this->input->post('city'),
            'status'=> $this->input->post('top_city')
        );

        if (file_exists($_FILES['image']['tmp_name'])) {
            $insert['image'] = $imgpath;
        }

        if (file_exists($_FILES['icon']['tmp_name'])) {
            $insert['icon'] = $icnpath;

        }

			if($this->m_cities->insert_city($insert))
			{
				$this->session->set_flashdata('success', 'City Added Successfully');
				redirect('cities/manage','refresh');
			}else{
				$this->session->set_flashdata('error', 'Something went wrong please try again!');
				redirect('cities/add','refresh');
			}
		}

        /**
         * domain -> delete city
         * url : cities/delete
         * @param : id
        */
        public function delete_city($id='')
        {
            // send to model
            if($this->m_cities->delete_city($id)){
                $this->session->set_flashdata('success', 'City Deleted Successfully');
                redirect('cities/manage','refresh'); // if you are redirect to list of the data add controller name here
            }else{
                $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
                redirect('cities/manage','refresh'); // if you are redirect to list of the data add controller name here
            }
        }



	/**
     * cities -> manage cities
     * get all cities detail and display in table
     * url : cities/manage
    **/
	public function manage_cities()
	{
		$data['title']  = 'cities - Shaadibaraati';
		$data['result']  = $this->m_cities->getcities();
		$this->load->view('cities/manage-cities', $data, FALSE);
	}




    /**
    * Users -> get single city 
    * get single city detail and display
    * url : cities/edit/id
    * @param : id
    */
    public function single_city($id='')
    {
        $data['result']  = $this->m_cities->single_city($id);
        $data['title']   = $data['result']->city.' - Shaadibaraati';
        $this->load->view('cities/edit-city', $data, FALSE);
    }


    	/**
     * cities -> insert cities
     * insert new cities into db
     * url : cities/insert
    **/
	public function update_city($value='')
	{
		$files = $_FILES;
        
        if (file_exists($_FILES['image']['tmp_name'])) {
            $config['upload_path'] = '../city-image/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_width'] = 0;
            $config['encrypt_name'] = true;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                // print_r($error);exit();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('cities/add');
            } else {
                // echo "ok";exit();
                $upload_data = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = $upload_data['full_path'];
                $config['create_thumb'] = true;
                $config['maintain_ratio'] = true;
                $config['height'] = 250;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $file_name = $upload_data['file_name'];
                $imgpath = 'city-image/'.$file_name;

            }
        }

       
        $files1 = $_FILES;

        if (file_exists($_FILES['icon']['tmp_name'])) {
	            $config['upload_path'] = '../icon-image/';
	            $config['allowed_types'] = 'jpg|png|jpeg';
	            $config['max_width'] = 0;
	            $config['encrypt_name'] = true;
	            $this->load->library('upload');
	            $this->upload->initialize($config);
	            if (!is_dir($config['upload_path'])) {
	                mkdir($config['upload_path'], 0777, true);
	            }

	            if (!$this->upload->do_upload('icon')) {
	                $error = array('error' => $this->upload->display_errors());
	                // print_r($error);exit();
	                $this->session->set_flashdata('error', $this->upload->display_errors());
	                redirect('cities/add');
	            } else {
	                // echo "ok";exit();
	                $upload_data1 = $this->upload->data();
	                $config1['image_library'] = 'gd2';
	                $config1['source_image'] = $upload_data1['full_path'];
	                $config1['create_thumb'] = true;
	                $config1['maintain_ratio'] = true;
	                $config1['height'] = 250;

	                $this->load->library('image_lib', $config1);
	                $this->image_lib->resize();

	                $file_name1 = $upload_data1['file_name'];
	                $icnpath = 'icon-image/'.$file_name1;

	            }

        	}

        $id = $this->input->post('city_id');

        $update =  array(
            'city' => $this->input->post('city'),
            'status'=> $this->input->post('top_city')
        );

        if (!empty($imgpath)) {
        	$update['image'] = $imgpath;
        }
        if (!empty($icnpath)) {
        	$update['icon'] = $icnpath;
        }


			if($this->m_cities->update_city($update,$id))
			{
				$this->session->set_flashdata('success', 'City Updated Successfully');
				redirect('cities/manage','refresh');
			}else{
				$this->session->set_flashdata('error', 'Something went wrong please try again!');
				redirect('cities/edit/'.$id,'refresh');
			}
		}






}

/* End of file Cities.php */
/* Location: ./application/controllers/Cities.php */