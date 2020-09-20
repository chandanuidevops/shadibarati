<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('inv_id') == '') { $this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_banner');
    }

    //manage banner
    public function index($id = null)
    {
        $data['title']  = 'Banner - Invitation';
        $data['result'] = $this->m_banner->bannerGet(); 
        $this->load->view('banner/manage-banner', $data);  
    }

    //add banner
    public function add($var = null)
    {
        $data['title']  = 'Banner - Invitation';
        $this->load->view('banner/add-banner', $data, FALSE);
        
    }


    public function insert($var = null)
    {
        $banner_id  = $this->input->post('banner_id');
        $link      = $this->input->post('link');

        $this->load->library('upload');
        $this->load->library('image_lib');
        $files = $_FILES;
        if (file_exists($_FILES['banner']['tmp_name'])) {
        $config['upload_path'] = '../banner/';
        $config['allowed_types'] = 'jpg|png|jpeg|PNG|JPEG|JPG|gif';
        $config['max_width'] = 0;
        $config['encrypt_name'] = true;
        $this->load->library('upload');
        $this->upload->initialize($config);
        if (!is_dir($config['upload_path'])) {
        mkdir($config['upload_path'], 0777, true);
        }
        if (!$this->upload->do_upload('banner')) {
        $error = array('error' => $this->upload->display_errors());
        $this->session->set_flashdata('error', $this->upload->display_errors());
        redirect('banner/manage','refresh');
        } else {
        $upload_data = $this->upload->data();
        $file_name  = $upload_data['file_name'];
        $banner    = 'banner/'.$file_name;
        }
        }
        

        $insert = array(
			'uniq' 		=>	$banner_id,
            'status'    =>  '1',
            'link'    =>  $link,
            );

        if (file_exists($_FILES['banner']['tmp_name'])) {
            $insert['image'] = $banner;
        }
       
        $result = $this->m_banner->insert($insert);
       if($result){
			$this->session->set_flashdata('success', 'Banner added Successfully');
			redirect('banner/manage','refresh');
       }else{
			$this->session->set_flashdata('error', 'Some error occured please try again');
			redirect('banner/add','refresh');
       }
    }


    public function delete($id = null)
    {
        if($this->m_banner->delete($id)){
			$this->session->set_flashdata('success', 'Banner deleted Successfully');
			redirect('banner/manage','refresh');
       }else{
			$this->session->set_flashdata('error', 'Some error occured please try again');
			redirect('banner/manage','refresh');
       }
    }

    public function edit($id = '')
    {
        $data['result'] = $this->m_banner->edit($id);
        $data['title']  = 'Banner - Invitation';
        $this->load->view('banner/edit-banner', $data);         
    }


    // enquiry
    public function enquiry($id='')
    {
        $data['title']  = 'Enquiry - Invitation';
        if(!empty($id)){
            $data['result'] = $this->m_banner->enquiry($id);
            $this->load->view('other/enquiry-detail', $data); 
        }else{
            $data['result'] = $this->m_banner->enquiry();
            $this->load->view('other/enquiry-list', $data); 
        }
    }

    public function referral($id='')
    {
        $data['title']  = 'Referrals - Invitation';
        if(!empty($id)){
            $data['result'] = $this->m_banner->referral($id);
            $this->load->view('other/referral-detail', $data); 
        }else{
            $data['result'] = $this->m_banner->referral();
            $this->load->view('other/referral-list', $data); 
        }
    }




}