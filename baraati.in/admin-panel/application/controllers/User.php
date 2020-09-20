<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->load->model('m_user');
    }

    /**
     * Users -> manage users
     * get all users detail and display in table
     * url : users/manage
    **/
	public function index()
	{
		$data['title']  = 'Users - Shaadibaraati';
		$data['result']  = $this->m_user->getusers();
		$this->load->view('users/manage-users', $data, FALSE);
	}


    /**
    * Users -> delete users
    * delete single user from db
    * url : users/delete/id
    * @param : id
    */
    public function delete_user($id='')
    {
        // send to model
        if($this->m_user->delete_user($id)){
            $this->session->set_flashdata('success', 'User Deleted Successfully');
                redirect('users/manage','refresh'); // if you are redirect to list of the data add controller name here
        }else{
            $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
            redirect('users/manage','refresh'); // if you are redirect to list of the data add controller name here
        }
    }


    /**
    * Users -> user detail 
    * get single user detail and display
    * url : users/view/id
    * @param : id
    */
    public function view_user($id='')
    {
        $data['result']  = $this->m_user->single_user($id);
        $data['title']   = $data['result']->su_name.'- Shaadibaraati';
        $data['vendor']  = $this->m_user->contacted_vendor($id); //get all the vendor list which single user have been contacted
        $this->load->view('users/view-users', $data, FALSE);
    }


    /**
    * Users -> block and unblock user
    * url : users/block/id
    * @param : id
    */
    public function block_user($id='')
    {
       $id      = $this->input->get('id');
       $status  = $this->input->get('status');
       $output  = $this->m_user->block_user($id,$status);
       echo $output;
    }








}

/* End of file User.php */
/* Location: ./application/controllers/User.php */