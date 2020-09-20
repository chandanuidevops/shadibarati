<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_banner extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_category');
        $this->load->model('m_cities');
        $this->load->model('m_categoryBanner');

        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();
        $acces = array();
        $acces = explode (",", $accs->menu);
        
        if (in_array("5", $acces))
        {
            $this->access = true;

        }else{
            $this->access = null;
        }
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); }
    }


    /**
     * Category -> Manage Category banner
     * load view page
     * url : category-banner/manage
    **/
	public function index()
	{   
        $data['title']  = 'Category Banner - Shaadibaraati';
        $data['banner'] = $this->m_categoryBanner->bannerGet();
		$this->load->view('banner/manage-banner', $data, FALSE);
    }
    
      /**
     * Category -> add Category banner
     * load view page
     * url : category-banner/add
    **/

    public function add()
    {   
        $data['categories']  = $this->m_category->getcategory();
        $data['cities']  = $this->m_cities->getcities();
		$data['title']  = 'Category Banner - Shaadibaraati';
		$this->load->view('banner/add-banner', $data, FALSE);
    }

	/**
     * category -> insert category banner
     * insert new category into db
     * url : category-banner/insert
    **/
         //insert banner
         public function insert($var = null)
         {
            $category_id =  $this->input->post('category');
            $city_id =  $this->input->post('city');
            $banner_id  = $this->input->post('banner_id');
            //$ipimg      = $this->input->post('ipimg');

            $filesCount = count($_FILES['images']['name']);
            if(!empty($filesCount)){
                
                for($i = 0; $i < $filesCount; $i++){
                    $_FILES['file']['name']     = $_FILES['images']['name'][$i];
                    $_FILES['file']['type']     = $_FILES['images']['type'][$i];
                    $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                    $_FILES['file']['error']     = $_FILES['images']['error'][$i];
                    $_FILES['file']['size']     = $_FILES['images']['size'][$i];
                    
                    $uploadPath = '../banner';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
                    $config['max_width'] = 0;
                    $config['encrypt_name'] = true;
                    
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    if (!is_dir($config['upload_path'])) {
                mkdir($config['upload_path'], 0777, true);
            }
                    
                    if($this->upload->do_upload('file')){
    
                        $fileData = $this->upload->data();
                        $file_name  = $fileData['file_name'];
                        $images    = 'banner/'.$file_name;
    
                        if(!empty($fileData)){
                            // Insert files data into the database
                            $insert = array(
                                'uniq' 		=>	$banner_id,
                                'category_id'=>$category_id,
                                'city_id'=>$city_id,
                                'status'    =>  '1',
                                );
                                if (file_exists($_FILES['images']['tmp_name'][$i])) {
                                    $insert['image'] = $images;
                                    
                                }
 
                            $result = $this->m_categoryBanner->insert_banner($insert);
                        }
                    }
                }
                
                if($result){
                    $this->session->set_flashdata('success', 'Category Banner added Successfully');
                    redirect('category-banner/manage','refresh');
               }else{
                    $this->session->set_flashdata('error', 'Some error occured please try again');
                    redirect('category-banner/add','refresh');
               }
            }
        }


        /**
     * category -> update category banner
     * url : category-banner/insert
    **/
         //update banner
         public function update($uniq='')
         {

            $this->load->library('upload');
            $this->load->library('image_lib');

            $category_id =  $this->input->post('category');
            $city_id =  $this->input->post('city');
            $ipimg      = $this->input->post('ipimg');
            $files = $_FILES;
           
            if (!empty($_FILES['images']['name'][0])) {

                $filesCount = count($_FILES['images']['name']);
                for($i = 0; $i < $filesCount; $i++){
                    $_FILES['images']['name']     = $files['images']['name'][$i];
                    $_FILES['images']['type']     = $files['images']['type'][$i];
                    $_FILES['images']['tmp_name'] = $files['images']['tmp_name'][$i];
                    $_FILES['images']['error']     = $files['images']['error'][$i];
                    $_FILES['images']['size']     = $files['images']['size'][$i];
                    
                    $uploadPath = '../banner';
                    $config['upload_path'] = $uploadPath;
                    $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
                    $config['max_width'] = 0;
                    $config['encrypt_name'] = true;
                    
                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                   
                    if($this->upload->do_upload('images')){
                      
                        $fileData = $this->upload->data();
                        $file_name  = $fileData['file_name'];
                        $images    = 'banner/'.$file_name;
                       
                        if(!empty($fileData)){
                            
                            $insert = array(
                                'uniq' 		=>	$ipimg,
                                'category_id'=>$category_id,
                                'city_id'=>$city_id,
                                'status'    =>  '1',
                                );
                                if (file_exists($files['images']['tmp_name'][$i])) {
                                    $insert['image'] = $images;
                                }

                            $result = $this->m_categoryBanner->update_banner($insert,$uniq);
                        }
                    }else{
                        $error =  $this->upload->display_errors();
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('category-banner/edit/'.$uniq,'refresh');
                    }
                }
            }else{
              
               //  $insert = array(
               //      'uniq' 		   =>	$ipimg,
               //      'category_id'  =>$category_id,
               //      'city_id'      =>$city_id,
               //      'status'       =>  '1',
               //      );
               //      $result = $this->m_categoryBanner->update_banner($insert,$uniq);
               //  }
               //  if($result){
               //      $this->session->set_flashdata('success', 'Category Banner added Successfully');
               // }else{
                    $this->session->set_flashdata('error', 'Some error occured please try again');
                    
               }
               redirect('category-banner/edit/'.$uniq,'refresh');
        }






        //delete banner
        public function delete($uniq)
        {
            
            if($this->m_categoryBanner->deleteBanner($uniq))
            {
                $this->session->set_flashdata('success', 'Banner deleted Successfully');
                redirect('category-banner/manage','refresh');
            }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('category-banner/manage','refresh');
            }
        }
        
        public function edit($uniq='')
        {
            $data['title']  = 'Category Banner - Shaadibaraati';
            $data['banner'] = $this->m_categoryBanner->editGet($uniq);
            
            $data['categories']  = $this->m_category->getcategory();
            $data['cities']  = $this->m_cities->getcities();
            foreach ($data['banner'] as $key => $value) {
                $data['cId'] = $value->city_id;
                $data['cateId'] = $value->category_id;
                $data['uniqId'] = $value->uniq; 
            }
            $this->load->view('banner/edit-banner', $data, FALSE);        
        }

        //delete single image
        public function deleteSingle($id='' , $uniq='')
        {
           
            if($this->m_categoryBanner->deleteSingleBanner($id))
            {
                $this->session->set_flashdata('success', 'Banner deleted Successfully');
                redirect("category-banner/view/".$uniq,'refresh');
            }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect("category-banner/view/".$uniq,'refresh');
            }
        }

        public function view($uniq='')
        {
            $data['title']  = 'Category Banner - Shaadibaraati';
            $data['banner'] = $this->m_categoryBanner->editGet($uniq); 
            foreach ($data['banner'] as $key => $value) {
                $data['city'] = $value->city;
                $data['category'] = $value->category;
                $data['uniq'] = $value->uniq;
            }  

            $this->load->view('banner/view-banner', $data, FALSE);        
        }

}

/* End of file Cities.php */
/* Location: ./application/controllers/Cities.php */