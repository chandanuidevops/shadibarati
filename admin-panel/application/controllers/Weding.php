<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weding extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_weding');

        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();
        $acces = array();
        $acces = explode (",", $accs->menu);
            
        if (in_array("8", $acces))
        {
            $this->access = true;
        }else{
            $this->access = null;
        }
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); }

    }

    //manage weding
    public function index($id = null)
    {
        $data['title']  = 'Weding - Real Weding';
        $data['result'] = $this->m_weding->getReal(); 
        $this->load->view('weding/manage-weding', $data);  
    }

    //add weding
    public function add($var = null)
    {
        $data['title']  = 'Weding - Real Weding';
        $this->load->view('weding/add-weding', $data, FALSE);
    }

    public function insert($result  = null)
    {
        $weding_id  = $this->input->post('weding_id');
        $name      = $this->input->post('name');
        $city      = $this->input->post('city');
        $ipimg      = $this->input->post('ipimg');
       
        $insert = array(
            'uniq' 		=>	$weding_id,
            'name'		=>  $name, 
            'city'		=>  $city,
            'added_by'=>$this->session->userdata('sha_id'),
        );



        $this->load->library('upload');
        $this->load->library('image_lib');
        $files = $_FILES;
        if (file_exists($_FILES['profile']['tmp_name'])) {
            $config['upload_path'] = '../weding/';
            $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
            $config['max_width'] = 0;
            $config['encrypt_name'] = true;
            $this->load->library('upload');
            $this->upload->initialize($config);
            if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
            }
         
            if (!$this->upload->do_upload('profile')) { 
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $this->upload->display_errors());
                if(!empty($ipimg)){
                    
                    redirect('real-wedding/edit/'.$ipimg,'refresh');
                }else{
                    redirect('real-wedding','refresh');
                }
            } else {
            $upload_data = $this->upload->data();

            $this->load->library('upload');
            $this->load->library('image_lib');
    
                $config['image_library']    = 'gd2';
                $config['source_image']     = $upload_data['full_path'];
                $config['wm_type']          = 'overlay';
                $config['wm_overlay_path']  = 'assets/img/water.png';//the overlay image
                $config['wm_x_transp']      = '4';
                $config['wm_y_transp']      = '4';
                $config['width']            = '50';
                $config['height']           = '50';
                $config['padding']          = '50';
                $config['wm_opacity']       = '40';
                $config['wm_vrt_alignment'] = 'middle';
                $config['wm_hor_alignment'] = 'center';
    
                $this->image_lib->initialize($config);
                $this->image_lib->watermark();

                $file_name  = $upload_data['file_name'];
                $profile    = 'weding/'.$file_name;
                $insert['image'] = $profile;
                }
            }

        $insertId = $this->m_weding->insertReal($insert);
        

        $filesCount = count($_FILES['images']['name']);
        if(!empty($filesCount)){
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['file']['name']     = $_FILES['images']['name'][$i];
                $_FILES['file']['type']     = $_FILES['images']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['images']['error'][$i];
                $_FILES['file']['size']     = $_FILES['images']['size'][$i];
                
                $uploadPath = '../weding';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
                $config['max_width'] = 0;
                $config['encrypt_name'] = true;
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if($this->upload->do_upload('file')){

                    $fileData = $this->upload->data();
                    $file_name  = $fileData['file_name'];
                    $images    = 'weding/'.$file_name;

                    $this->load->library('upload');
                    $this->load->library('image_lib');

                    $watermark = $this->watermark($fileData,$file_name);

                    if(!empty($fileData)){
                        $addImage = array(
                            'real_id' 	=>	$insertId,
                            'status'	=>  '1', 
                            'uniq'		=>  random_string('alnum','16'),
                        );
                       
                            if (file_exists($_FILES['images']['tmp_name'][$i])) {
                                $addImage['image'] = $images;
                            }
                            $result = $this->m_weding->insertGal($addImage);    
                    }
                }
            }
        }


       
       if(($insertId !='') || ($result !='')){
			$this->session->set_flashdata('success', 'Profile added Successfully');
			if(!empty($ipimg)){
                redirect('real-wedding/edit/'.$ipimg,'refresh');
            }else{
                redirect('real-wedding','refresh');
            }
       }else{
			$this->session->set_flashdata('error', 'Some error occured please try again');
			if(!empty($ipimg)){
                redirect('real-wedding/edit/'.$ipimg,'refresh');
            }else{
                redirect('real-wedding','refresh');
            }
       }
    }

    public function watermark($upload_data = " ",$thumbnail)
    {     
        $this->load->library('upload');
        $this->load->library('image_lib');

            $config['image_library']    = 'gd2';
            $config['source_image']     = $upload_data['full_path'];
            $config['wm_type']          = 'overlay';
            $config['wm_overlay_path']  = 'assets/img/water.png';//the overlay image
            $config['wm_x_transp']      = '4';
            $config['wm_y_transp']      = '4';
            $config['width']            = '50';
            $config['height']           = '50';
            $config['padding']          = '50';
            $config['wm_opacity']       = '40';
            $config['wm_vrt_alignment'] = 'middle';
            $config['wm_hor_alignment'] = 'center';

            $this->image_lib->initialize($config);
            $this->image_lib->watermark();

    }
    //delete profile
    public function deleteReal($id)
    {
        if($this->m_weding->realDelete($id)){
            $this->session->set_flashdata('success', 'Profile deleted Successfully');
            redirect('real-wedding','refresh');
        }else{
            $this->session->set_flashdata('error', 'Some error occured please try again');
            redirect('real-wedding','refresh');
        }
    }

    public function view($id='')
    {
        $data['title']  = 'Profile - Real Weding';      
        $data['result'] = $this->m_weding->getProfile($id);
        $data['gallery'] = $this->m_weding->getRealGal($id);
        $this->load->view('weding/view-weding', $data); 
       
    }
    //get gallery image
    public function realGalGet($real_id)
    {
        $data['gallery'] = $this->m_weding->getRealGal($id);
        $this->load->view('weding/view-weding', $data); 
    }
    //edit profile
    public function editReal($id)
    {
        $data['title']  = 'Profile - Real Wedding';
        $data['result'] = $this->m_weding->realEdit($id); 
        $this->load->view('weding/edit-weding', $data); 
    }
   
    public function deleteGal($id='',$rid=""){
        if($this->m_weding->galDelete($id)){
           
            $this->session->set_flashdata('success', 'Profile deleted Successfully');
           
            redirect('real-wedding/view/'.$rid,'refresh');
        }else{
            $this->session->set_flashdata('error', 'Some error occured please try again');
            
            redirect('real-wedding','refresh');
        }
    }
}