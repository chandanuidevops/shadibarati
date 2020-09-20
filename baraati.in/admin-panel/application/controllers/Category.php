<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_category');
    }


    /**
     * Category -> add Category
     * load view page
     * url : category/add
    **/
	public function index()
	{
		$data['title']  = 'Category - Shaadibaraati';
		$this->load->view('category/add-category', $data, FALSE);
	}

	/**
     * category -> insert category
     * insert new category into db
     * url : category/insert
    **/
	public function insert_category($value='')
	{

		$files = $_FILES;
        $filesCount = count($_FILES['image']['name']);
        if (file_exists($_FILES['image']['tmp_name'])) {
            $config['upload_path'] = '../category-image/';
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
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('cities/add');
            } else {
                $upload_data = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = $upload_data['full_path'];
                $config['create_thumb'] = true;
                $config['maintain_ratio'] = true;
                $config['height'] = 250;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $file_name = $upload_data['file_name'];
                $imgpath = 'category-image/'.$file_name;

            }
        }


        $files1 = $_FILES;
        $filesCount = count($_FILES['icon']['name']);
        if (file_exists($_FILES['icon']['tmp_name'])) {
            $config['upload_path'] = '../category-icon/';
            $config['allowed_types'] = 'svg|SVG';
            $config['max_width'] = 0;
            $config['encrypt_name'] = true;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            if (!$this->upload->do_upload('icon')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('category/add');
            } else {
                $upload_data1 = $this->upload->data();
                $config1['image_library'] = 'gd2';
                $config1['source_image'] = $upload_data1['full_path'];
                $config1['create_thumb'] = true;
                $config1['maintain_ratio'] = true;
                $config1['height'] = 250;

                $this->load->library('image_lib', $config1);
                $this->image_lib->resize();

                $file_name1 = $upload_data1['file_name'];
                $icnpath = 'category-icon/'.$file_name1;

            }
        }


        $files2 = $_FILES;
        $filesCount = count($_FILES['banner_image']['tmp_name']);
        if (file_exists($_FILES['banner_image']['tmp_name'])) {
            $config['upload_path'] = '../category-banner/';
            $config['allowed_types'] = 'jpg|png|jpeg|gif';
            $config['max_width'] = 0;
            $config['encrypt_name'] = true;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }

            if (!$this->upload->do_upload('banner_image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('category/add');
            } else {
                $upload_data1 = $this->upload->data();
                $config1['image_library'] = 'gd2';
                $config1['source_image'] = $upload_data1['full_path'];
                $config1['create_thumb'] = true;
                $config1['maintain_ratio'] = true;
                $config1['height'] = 250;

                $this->load->library('image_lib', $config1);
                $this->image_lib->resize();

                $file_name2 = $upload_data1['file_name'];
                $banrpath = 'category-banner/'.$file_name2;

            }
        }


        

        $insert =  array(
        	'image' => $imgpath,
        	'icon' => $icnpath,
        	'banner' => $banrpath,
        	'uniq' => $this->input->post('category_id'),
            'subtitle' => $this->input->post('subtitle'),
        	'category' => $this->input->post('category')
        );


        $output1 = $this->m_category->insert_category($insert);

       $i_title=  $this->input->post('i_title');
        $files3 = $_FILES;
        $filesCount3 = count($_FILES['i_image']['name']);

        if (!empty($filesCount3)) {
            for ($i = 0; $i < $filesCount3; $i++) {
                $_FILES['i_image']['name']     = $files['i_image']['name'][$i];
                $_FILES['i_image']['type']     = $files['i_image']['type'][$i];
                $_FILES['i_image']['tmp_name'] = $files['i_image']['tmp_name'][$i];
                $_FILES['i_image']['error']    = $files['i_image']['error'][$i];
                $_FILES['i_image']['size']     = $files['i_image']['size'][$i];

                $config['upload_path']   = '../vendors-service/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_width']     = 0;
                $config['encrypt_name']  = TRUE;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if (!is_dir($config['upload_path']))
                mkdir($config['upload_path'], 0777, TRUE);

                if (!$this->upload->do_upload('i_image')) {
                    $error =  $this->upload->display_errors();
                     $this->session->set_flashdata('error', $this->upload->display_errors());
                     redirect('category/add');
                 } else {

                    $upload_data = $this->upload->data();
                    $i_file = $upload_data['file_name'];
                    $i_path = 'vendors-service/'.$i_file;

                    $information = array('service' => $i_title[$i] ,'image' => $i_path,'category_uniq'=>$this->input->post('category_id'),'i_uniq'=> random_string('alnum',10)  );
                    $output = $this->m_category->new_service($information);
                 }
            }
        }

        $this->faq($this->input->post('quest'),$this->input->post('answ'),$this->input->post('category_id'));

			if(!empty($output) && !empty($output1) )
			{
				$this->session->set_flashdata('success', 'category Added Successfully');
				redirect('category/manage','refresh');
			}else{
				$this->session->set_flashdata('error', 'Something went wrong please try again!');
				redirect('category/add','refresh');
			}
        }

        public function faq($question = '',$answer='',$id='')
        {
            
            $this->m_category->deleteFaq($id);
            for ($i=0; $i <count($question) ; $i++) { 
                $this->m_category->faq($question[$i],$answer[$i],$id);
            }
            return  true;
            
        }
        

        public function deleteInfo($id = null)
        {
            $id = $this->input->get('id');
            $output = $this->m_category->deleteInfo($id);
            echo $output;
            
        }

        /**
         * category -> delete city
         * url : cities/delete
         * @param : id
        */
        public function delete_category($id='')
        {
            // send to model
            if($this->m_category->delete_category($id)){
                $this->session->set_flashdata('success', 'category Deleted Successfully');
                redirect('category/manage','refresh'); // if you are redirect to list of the data add controller name here
            }else{
                $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
                redirect('category/manage','refresh'); // if you are redirect to list of the data add controller name here
            }
        }



	/**
     * cities -> manage cities
     * get all cities detail and display in table
     * url : cities/manage
    **/
	public function manage_category()
	{
		$data['title']  = 'category - Shaadibaraati';
		$data['result']  = $this->m_category->getcategory();
		$this->load->view('category/manage-category', $data, FALSE);
	}




    /**
    * Users -> get single city 
    * get single city detail and display
    * url : cities/edit/id
    * @param : id
    */
    public function single_category($id='')
    {
        $data['result']  = $this->m_category->single_category($id);
        $data['service'] = $this->m_category->getInfo($data['result']->uniq);
        $data['faq'] = $this->m_category->getfaq($data['result']->uniq);
        $data['title']   = $data['result']->category.' - Shaadibaraati';
        $this->load->view('category/edit-category', $data, FALSE);
    }


    	/**
     * cities -> insert cities
     * insert new cities into db
     * url : cities/insert
    **/
	public function update_category($value='')
	{
       
		$files = $_FILES;
        $filesCount = count($_FILES['image']['name']);
		if (!empty($filesCount)) {
        if (file_exists($_FILES['image']['tmp_name'])) {
            $config['upload_path'] = '../category-image/';
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
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('category/add');
            } else {
                $upload_data = $this->upload->data();
                $config['image_library'] = 'gd2';
                $config['source_image'] = $upload_data['full_path'];
                $config['create_thumb'] = true;
                $config['maintain_ratio'] = true;
                $config['height'] = 250;

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

                $file_name = $upload_data['file_name'];
                $imgpath = 'category-image/'.$file_name;

            }
        }
        }


       
        $files1 = $_FILES;
        $filesCount1 = count($_FILES['icon']['name']);       

         if (!empty($filesCount1)) {

        if (file_exists($_FILES['icon']['tmp_name'])) {
            
	            $config['upload_path'] = '../category-icon/';
	            $config['allowed_types'] = 'svg|SVG';
	            $config['max_width'] = 0;
	            $config['encrypt_name'] = true;
	            $this->load->library('upload');
	            $this->upload->initialize($config);
	            if (!is_dir($config['upload_path'])) {
	                mkdir($config['upload_path'], 0777, true);
	            }

	            if (!$this->upload->do_upload('icon')) {
	                $error = array('error' => $this->upload->display_errors());
	                $this->session->set_flashdata('error', $this->upload->display_errors());
	                redirect('category/add');
	            } else {
	                $upload_data1 = $this->upload->data();
	                $config1['image_library'] = 'gd2';
	                $config1['source_image'] = $upload_data1['full_path'];
	                $config1['create_thumb'] = true;
	                $config1['maintain_ratio'] = true;
	                $config1['height'] = 250;

	                $this->load->library('image_lib', $config1);
	                $this->image_lib->resize();

	                $file_name1 = $upload_data1['file_name'];
	                $icnpath = 'category-icon/'.$file_name1;

	            }

        	}
        }


        $id = $this->input->post('city_id');
        $cat_uniq = $this->input->post('cat_uniq');
        

        $update =  array(
            'category' => $this->input->post('category'),
        	'subtitle' => $this->input->post('subtitle'),
        );

        if (!empty($imgpath)) {
        	$update['image'] = $imgpath;
        }
        if (!empty($icnpath)) {
        	$update['icon'] = $icnpath;
        }

        $output1 = $this->m_category->update_category($update,$id);
        $i_title =  $this->input->post('i_title');

        $serviceid = $this->input->post('serviceid');
        $files3 = $_FILES;  
        
        foreach ($_FILES['i_image']['name'] as $key => $value) {

            if (!empty($value)) {
                $index[] = $value;
            }
        }

        $filesCount3 = count($i_title); 

            for ($i = 0; $i < $filesCount3; $i++) {

                if (!empty($_FILES['i_image']['name'][$i])) {


                $_FILES['i_image']['name']     = $files['i_image']['name'][$i];
                $_FILES['i_image']['type']     = $files['i_image']['type'][$i];
                $_FILES['i_image']['tmp_name'] = $files['i_image']['tmp_name'][$i];
                $_FILES['i_image']['error']    = $files['i_image']['error'][$i];
                $_FILES['i_image']['size']     = $files['i_image']['size'][$i];

                $config['upload_path']   = '../vendors-service/';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_width']     = 0;
                $config['encrypt_name']  = TRUE;

                $this->load->library('upload');
                $this->upload->initialize($config);
                if (!is_dir($config['upload_path']))
                mkdir($config['upload_path'], 0777, TRUE);

                if (!$this->upload->do_upload('i_image')) {
                    $error =  $this->upload->display_errors(); 
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('category/edit/'.$id,'refresh');
                 } else {
                    $upload_data = $this->upload->data(); 
                    $i_file = $upload_data['file_name'];
                    $i_path = 'vendors-service/'.$i_file;


                 }
            }


            if ((!empty($i_title[$i])) || (!empty($i_path[$i]))) {
                $information = array('service' => $i_title[$i] , 'category_uniq'=>$cat_uniq);

                if (!empty($_FILES['i_image']['name'][$i])) {
                    $information['image'] = $i_path;
                }


                if (!empty($serviceid[$i])) {
                    $information['i_uniq'] = $serviceid[$i];
                }else{
                    $information['i_uniq'] = random_string('alnum',10);;
                }                        
                $output = $this->m_category->new_service($information);
            }
        }

        $output2 = $this->faq($this->input->post('quest'),$this->input->post('answ'),$this->input->post('cat_uniq'));

        if(!empty($output) || !empty($output1) || !empty($output2) )
			{
				$this->session->set_flashdata('success', 'Category Updated Successfully');
				redirect('category/manage','refresh');
			}else{
				$this->session->set_flashdata('error', 'Something went wrong please try again!');
				redirect('category/edit/'.$id,'refresh');
			}
        }



        public function delfaq($id = null)
        {
            $id = $this->input->get('id');
            $output = $this->m_category->delfaq($id);
            echo $output;
            
        }




}

/* End of file Cities.php */
/* Location: ./application/controllers/Cities.php */