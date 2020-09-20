<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_adminusers extends CI_Model {

    /**
     * get all employees
     * **/ 
    public function getEmployees($var = null)
    {
        if ($this->session->userdata('sha_type') == '2') {
            $this->db->where('a.manager', $this->session->userdata('sha_id'));
        }
        return $this->db->select('a.id,a.email,a.phone,a.name,a.admin_type,et.types,a.manager')
        ->where('a.admin_type !=', 1)
        ->from('admin a')->join('emp_types et', 'et.id = a.admin_type', 'left')
        ->get()->result();
    }

    /**
     * get all Subadmins/manager
     * **/ 
    public function getManager(Type $var = null)
    {
        return $this->db->where('admin_type', '2')->get('admin')->result();  
    }

    /**
     * get all menues
     * **/ 
    public function getMenu(Type $var = null)
    {
        return $this->db->get('menus')->result();
    }

    /**
     *insert employee 
     * **/ 
    public function insert($insert = null)
    {
        $query = $this->db->where('reference_d', $insert['reference_d'])->get('admin')->row();
        if(!empty($query)){
            $this->db->where('reference_d', $insert['reference_d'])->update('admin',$insert);
            return $query->id;
        }else{
            $this->db->insert('admin',$insert);
            return $this->db->insert_id();
        }      
        
    }

    /**
     *insert employee target
    * **/ 
    public function empTarget($targt='')
    {
        $result = $this->db->where('emp_id', $targt['emp_id'])->where('year',$targt['year'])->where('month',$targt['month'])
        ->get('e_target')->row();
        if (!empty($result)) {
            $this->db->where('emp_id', $targt['emp_id'])->where('year',$targt['year'])->where('month',$targt['month']);            
            return $this->db->update('e_target', $targt);            
        }else{
            return $this->db->insert('e_target', $targt);
        }

    }

    /**
     *Get employee target
    * **/ 
    public function getTarget($id = null)
    {
        
        return $this->db->where('emp_id', $id)->where('year',date('Y'))->get('e_target')->result();
        
    }

    /**
     *get single employee 
     * **/ 
    public function singleEmp($id = null)
    {
        return $this->db->where('id', $id)->get('admin')->row();        
    }

    public function update($update='',$id='')
    {
        $query = $this->db->where('id', $id)->get('admin')->result();
        if(!empty($query)){
            return $this->db->where('id', $id)->update('admin',$update);
        }else{
            return $this->db->insert('admin',$update);
        } 
    }

    public function delete($id='')
    {
        return $this->db->where('id', $id)->delete('admin');
    }

    public function block($id='',$status='')
    {
        $this->db->where('id', $id);
        $this->db->set('is_active', $status);
        $this->db->update('admin');
        if ($this->db->affected_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

        //  account activation
    public function activateAccount($regid='', $newRegid='',$regmail='')
    {
        $this->db->where('reference_d', $regid);
        $this->db->where('email', $regmail);
        $result = $this->db->get('admin');
        if($result->num_rows() > 0){
            $this->db->where('reference_d', $regid);
            $this->db->where('email', $regmail);
            $this->db->update('admin', array('reference_d' => $newRegid, 'is_active' => '1', 'updated_date' => date('Y-m-d H:i:s')));
            if($this->db->affected_rows() > 0){
            return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function setPassword($datas, $remail,$id)
    {
        $this->db->where('reference_d', $id);
        $this->db->where('email', $remail);
        $this->db->update('admin', $datas);
        if ($this->db->affected_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function reset_pass($pass='',$eid='')
    {
        return $this->db->where('id', $eid)->update('admin',array('password' => $pass ));
    }

    public function tardelete($id='')
    {
        $this->db->where('id', $id);
        $emp_id = $this->db->get('e_target')->row('emp_id');

        $this->db->where('id', $id);
        $this->db->delete('e_target');
        if ($this->db->affected_rows() > 0) {
            return $emp_id;
        }else{
            return false;
        }
    }

    public function empTypes($value='')
    {
        return $this->db->get('emp_types')->result();
    }

    public function typeInsert($insert='')
    {
        $query = $this->db->where('uniq', $insert['uniq'])->get('emp_types');
        if ($query->num_rows() > 0) {
            $this->db->where('uniq', $insert['uniq'])->update('emp_types',$insert);
            if ($this->db->affected_rows() > 0) {
               return true;
            }else{
                return false;
            }
        }else{
            return $this->db->insert('emp_types', $insert);
        }
    }

    public function typeDelete($id='')
    {
        $this->db->where('id', $id);
        $emp_id = $this->db->get('emp_types')->row('emp_id');
        $this->db->where('id', $id);
        $this->db->delete('emp_types');
        if ($this->db->affected_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

}

/* End of file M_adminusers.php */
