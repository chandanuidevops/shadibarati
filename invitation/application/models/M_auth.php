<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

	// registration
    public function register($insert = null)
    {
        $this->db->insert('user', $insert);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }        
    }

     public function activateAccount($regid, $newRegid)
    {
        $this->db->select('id');
        $this->db->where('refid', $regid);
        $result = $this->db->get('user');
        if($result->num_rows() > 0){
            $this->db->where('refid', $regid);
            $this->db->update('user', array('refid' => $newRegid, 'status' => '1'));
            if($this->db->affected_rows() > 0){
            return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

            //  login
    function can_login($username, $password)  
    {  
       $this->db->where('email', $username);  
       $this->db->where('status', '1');  
       // $this->db->where('password', $password);
        $result = $this->getUsers($password);

        if (!empty($result)) {
          return $result;
        } 
        else {
            return null;
        }  
    }

    // check password
    function getUsers($password) {
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            // if ($this->bcrypt->check_password($password, $result['password'])) {
                return $result;
            // } 
            // else {
                // return array();
            // }
        } 
        else{
            return array();
        }
    }

	

}

/* End of file M_auth.php */
/* Location: ./application/models/M_auth.php */