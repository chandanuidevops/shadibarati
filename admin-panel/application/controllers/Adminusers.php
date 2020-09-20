<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminusers extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('sha_id') == '') {$this->session->set_flashdata('error', 'Please try again'); redirect('login'); }
        $this->aid = $this->session->userdata('sha_id');
        $this->load->model('m_adminusers');
        $this->load->model('m_vendors');
        $this->load->library('bcrypt');

        $this->ci =& get_instance();
        $accs = $this->ci->preload->access();
        $acces = array();
        $acces = explode (",", $accs->menu);
        
        if (in_array("10", $acces))
        {
            $this->access = true;

        }else{
            $this->access = null;
        }
        if ((empty($this->access)) && ($this->session->userdata('sha_type') !='1')) {  redirect(base_url(),'refresh'); }
    }

    /**
     * manage employees
     * @url : employees 
     **/ 
    public function index($id='')
    {
        $data['title']  = 'Employee - Shaadibaraati';
        $data['result'] = $this->m_adminusers->getEmployees();
        $this->load->view('employee/manage', $data, FALSE);  
    }

    /**
     * add employees
     * @url : employees/add
    **/ 
    public function add($var = null)
    {
        $data['title']      = 'Employee - Shaadibaraati';
        $data['manager']    = $this->m_adminusers->getManager();
        $data['menues']     = $this->m_adminusers->getMenu();
        $data['city']       = $this->m_vendors->get_city();
        $data['employee']   = $this->m_adminusers->empTypes();
        $this->load->view('employee/add', $data, FALSE); 
    }


    /**
     * add employees
     * @url : employees/insert
    **/ 
    public function insert($value='')
    {
        $this->form_validation->set_rules('name', 'Username', 'required|is_unique[admin.name]', array('required'      => 'You have not provided the %s.', 'is_unique'     => 'This %s already exists.') );
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[admin.email]', array('required'      => 'You have not provided the %s.', 'is_unique'     => 'This %s already exists.')); 
        if ($this->form_validation->run() == FALSE) {
            $error = validation_errors();
            $this->session->set_flashdata('formerror', $error);
            redirect('employees/add');
        }else{

            $name       =   $this->input->post('name');
            $email      =   $this->input->post('email');
            $phone      =   $this->input->post('phone');
            $type       =   $this->input->post('Ad_type');
            $ref_id     =   $this->input->post('ref_id');
            $manager    =   $this->input->post('manager');
            $menu       =   $this->input->post('menu');
            $discount   =   $this->input->post('discount');
            $month      =   $this->input->post('month');
            $target     =   $this->input->post('target');
            $city       =   $this->input->post('city');

            $mens='';

            if (!empty($menu)) {
               foreach ($menu as $menus => $men) {
                $mens .= $men.',';               
                } 
            }
                      

            $insert = array(
                'name'          =>  $name,
                'email'         =>  $email,
                'is_active'     =>  '0',
                'phone'         =>  $phone,
                'reference_d'   =>  $ref_id,
                'admin_type'    =>  $type,
                'added_by'      =>  $this->aid ,
                'manager'       =>  $manager,
                'discount'      =>  $discount,
                'menu'          =>  substr($mens,0,-1) ,
                'city'          =>  $city,
            );
            $result = $this->m_adminusers->insert($insert);

            if (!empty($target)) {
                $targt = array(
                    'emp_id'    => $result, 
                    'added_by'  => $this->aid, 
                    'month'     => $month, 
                    'year'      => date('Y'), 
                    'target'    => $target,
                    'status'    => '1',
                );
            $this->m_adminusers->empTarget($targt);
            }
            if(!empty($result)){
                if ($this->userEmail($insert)) {
                    $this->session->set_flashdata('success', 'Employee added Successfully');
                    redirect('employees');
                }else{
                    $this->session->set_flashdata('error', 'Email not sent some server error occured, please try again!');
                    redirect('employees/add');
                }                
            }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('employees/add');
            }
        }
    }


    function userEmail($insert='')
    {
        $data['result'] = $insert;
        $this->load->config('email');
        $this->load->library('email');
        $from = $this->config->item('smtp_user');        
        $msg = $this->load->view('email/adminusers', $data, true);
        $this->email->set_newline("\r\n");
        $this->email->from($from , 'Shaadibaraati');
        $this->email->to($data['result']['email']);
        $this->email->subject('Registration verification'); 
        $this->email->message($msg);
        if($this->email->send())  
        { 
            return true;
        } 
        else
        {
            return false;
        }
        
    }

    


    public function edit($id = null)
    {
        $data['result']     = $this->m_adminusers->singleEmp($id);
        $data['manager']    = $this->m_adminusers->getManager();
        $data['menues']     = $this->m_adminusers->getMenu(); 
        $data['target']     = $this->m_adminusers->getTarget($data['result']->id); 
        $data['city']       = $this->m_vendors->get_city();
        $data['employee']   = $this->m_adminusers->empTypes();
        $this->load->view('employee/edit', $data, FALSE); 
    }


    public function update($value='')
    {
        $id = $this->input->post('id');  

            $name       =   $this->input->post('name');
            $email      =   $this->input->post('email');
            $phone      =   $this->input->post('phone');
            $type       =   $this->input->post('Ad_type');
            $manager    =   $this->input->post('manager');
            $menu       =   $this->input->post('menu');
            $discount   =   $this->input->post('discount');
            $month      =   $this->input->post('month');
            $target     =   $this->input->post('target');
            $city       =   $this->input->post('city');
            

            $mens='';
            if (!empty($menu)) {
               foreach ($menu as $menus => $men) {
                $mens .= $men.',';               
                } 
            }           

            $update = array(
                'name'          =>  $name,
                'email'         =>  $email,
                'phone'         =>  $phone,
                'admin_type'    =>  $type,
                'added_by'      =>  $this->aid ,
                'manager'       =>  $manager,
                'discount'      =>  $discount,
                'menu'          =>  substr($mens,0,-1) ,
                'city'          =>  $city,
            );
            $result = $this->m_adminusers->update($update,$id);

            if (!empty($target)) {
                $targt = array(
                    'emp_id'    => $id, 
                    'added_by'  => $this->aid, 
                    'month'     => $month, 
                    'year'      => date('Y'), 
                    'target'    => $target,
                    'status'    => '1',
                );
                $this->m_adminusers->empTarget($targt);
            }


            if(!empty($result)){
                $this->session->set_flashdata('success', 'Employee Updated Successfully');
                redirect('employees/edit/'.$id);
            }else{
                $this->session->set_flashdata('error', 'Some error occured please try again');
                redirect('employees/edit/'.$id);
            }
    }


        /**
         * domain -> delete city
         * url : cities/delete
         * @param : id
        */
        public function delete($id='')
        {
            // send to model
            if($this->m_adminusers->delete($id)){
                $this->session->set_flashdata('success', 'Employee Deleted Successfully');
                redirect('employees','refresh'); // if you are redirect to list of the data add controller name here
            }else{
                $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
                redirect('employees','refresh'); // if you are redirect to list of the data add controller name here
            }
        }

    public function block($id='')
    {
       $id      = $this->input->get('id');
       $status  = $this->input->get('status');
       $output  = $this->m_adminusers->block($id,$status);
       echo $output;
    }

    public function reset_pass($value='')
    {
        $password   = $this->bcrypt->hash_password($this->input->post('password'));
        $eid        = $this->input->post('eid');
        if($this->m_adminusers->reset_pass($password,$eid)){
            $this->session->set_flashdata('success', 'Employee password updated Successfully!');
        }else{
            $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
        }
        redirect('employees/edit/'.$eid,'refresh');
    }


    public function tardelete($id='',$emp_id='')
    {
        // send to model
        if($this->m_adminusers->tardelete($id)){
            $this->session->set_flashdata('success', 'Employee target Deleted Successfully');
            redirect('employees/edit/'.$emp_id,'refresh'); // if you are redirect to list of the data add controller name here
        }else{
            $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
            redirect('employees/edit/'.$emp_id,'refresh'); // if you are redirect to list of the data add controller name here
        }
    }

    public function empTypes($value='')
    {
        $data['title']  = 'Employee - Shaadibaraati';
        $data['result'] = $this->m_adminusers->empTypes();     
        $this->load->view('employee/typeManage', $data, FALSE); 
    }

    public function typeInsert($value='')
    {
        $insert = array('types' => $this->input->post('type'),'uniq' => $this->input->post('uniq'));
        if($this->m_adminusers->typeInsert($insert)){
            $this->session->set_flashdata('success', 'Employee Type Added Successfully');
        }else{
            $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
        }
        redirect('employees/types','refresh');
    }

    public function typeDelete($id='')
    {
        if($this->m_adminusers->typeDelete($id)){
            $this->session->set_flashdata('success', 'Employee Type Deleted Successfully');
        }else{
            $this->session->set_flashdata('error', 'Something went to wrong. Please try again later!');
        }
        redirect('employees/types','refresh');
    }




}

/* End of file Controllername.php */
