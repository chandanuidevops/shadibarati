<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Career extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_career');
        
        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();
        $acces = array();
        $acces = explode (",", $accs->menu);
        
        if (in_array("24", $acces))
        {
            $this->access = true;

        }else{
            $this->access = null;
        }
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); }

    }


    public function index()
    {
        $data['title'] = 'Jobs List';
        $data['jobs'] = $this->m_career->jobList();
        $this->load->view('career/list', $data);
    }

    public function add($var = null)
    {
        $data['title'] = 'Jobs Add';
        if(!empty($this->input->post())){
           
            $data = array(
                'title' => $this->input->post('title', true), 
                'openings' => $this->input->post('openings', true), 
                'qualification' => $this->input->post('qualification', true), 
                'experience' => $this->input->post('experience', true), 
                'language' => $this->input->post('language', true), 
                'location' => $this->input->post('location', true), 
                'skils' => $this->input->post('skills', true), 
                'responsiblity' => $this->input->post('responsiblity', true), 
                'key_role' => $this->input->post('role', true), 
                'des' => $this->input->post('desc', true), 
                'creaderby' => $this->session->userdata('sha_id')
            );
            if($this->m_career->addJob($data)){
                $this->session->set_flashdata('success', 'Successfully added');
                redirect('career','refresh');
            }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('career','refresh');
            }
        }else{
            $this->load->view('career/add', $data);
        }
    }

    // edit
    public function edit($id = null)
    {
        $data['title'] = 'Edit Jobs';
        if(!empty($this->input->post())){
            $data = array(
                'title' => $this->input->post('title', true), 
                'openings' => $this->input->post('openings', true), 
                'qualification' => $this->input->post('qualification', true), 
                'experience' => $this->input->post('experience', true), 
                'language' => $this->input->post('language', true), 
                'location' => $this->input->post('location', true), 
                'skils' => $this->input->post('skills', true), 
                'responsiblity' => $this->input->post('responsiblity', true), 
                'key_role' => $this->input->post('role', true), 
                'des' => $this->input->post('desc', true), 
                'creaderby' => $this->session->userdata('sha_id')
            );

            if($this->m_career->editJob($data, $id)){
                $this->session->set_flashdata('success', 'Successfully Updated');
                redirect('career/edit/'.$id,'refresh');
            }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('career/edit/'.$id,'refresh');
            }


        }else{
            $data['jobs'] = $this->m_career->jobGet($id);
            $this->load->view('career/edit', $data);
        }
    }


    // status change
    public function status($id = null)
    {
        if($this->input->get('q') == 'close'){
            $data  = array('status' => 2);
        }else{
            $data  = array('status' => 1);
        }
        if($this->m_career->editJob($data, $id)){
            $this->session->set_flashdata('success', 'Successfully Updated');
            redirect('career/edit/'.$id,'refresh');
        }else{
            $this->session->set_flashdata('error', 'Some error occured please try again');
            redirect('career/edit/'.$id,'refresh');
        }
    }


    // delete career
    public function delete($id = null)
    {
        
        if($this->m_career->delete($id)){
            $this->session->set_flashdata('success', 'Successfully Deleted');
            redirect('career/','refresh');
        }else{
            $this->session->set_flashdata('error', 'Some error occured please try again');
            redirect('career/','refresh');
     }
    }

    // applications
    public function applications()
    {   
        $data['title'] = 'applications';
        $data['application'] = $this->m_career->applications();
        $this->load->view('career/applications', $data);
    }
   

}

/* End of file Career.php */
