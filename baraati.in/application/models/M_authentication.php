<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_authentication extends CI_Model {

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

        //  account activation
    public function activateAccount($regid, $newRegid)
    {
        $this->db->select('su_id');
        $this->db->where('su_referenceid', $regid);
        $result = $this->db->get('user');
        if($result->num_rows() > 0){
            $this->db->where('su_referenceid', $regid);
            $this->db->update('user', array('su_referenceid' => $newRegid, 'su_is_active' => '1', 'su_updated_date' => date('Y-m-d H:i:s')));
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
       $this->db->where('su_email', $username);  
       $this->db->where('su_is_active', '1');  
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
            if ($this->bcrypt->check_password($password, $result['su_password'])) {
                //We're good
                return $result;
            } 
            else {
                //Wrong password
                return array();
            }
        } 
        else{
            return array();
        }
    } 


    // forgot password
    public function forgotPassword($email)
    {
        $this->db->select('su_referenceid');
        $this->db->where('su_email', $email);
        $result = $this->db->get('user');
        if($result->num_rows() > 0){
            $ref = $result->row_array();
            return $ref['su_referenceid'];
        }else{
            return false;
        }  
    }


        //  check the email is exist
    public function isEmail($str)
    {
        $this->db->where('su_email', $str);
        $result = $this->db->get('user');

        if($result->num_rows() > 0){
            return true;
        }else{
            return false;
        }
        
    }


    // password reset
    public function setPassword($datas, $email)
    {
        $this->db->where('su_email', $email);
        $query = $this->db->update('user', $datas);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }


       // forgot passwor set
    public function forgot_password_set($regid)
    {
        $this->db->where('su_referenceid', $regid);
        $result = $this->db->get('user');
        if($result->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    //vue js phone check exist or not
    public function phone_check($phone='')
    {
        $this->db->where('su_phone', $phone);
        $result = $this->db->get('user');
           if($result->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

        //vue js phone check exist or not
        public function email_check($email='')
        {
            $this->db->where('su_email', $email);
            $result = $this->db->get('user');
               if($result->num_rows() > 0){
                return true;
            }else{
                return false;
            }
        }

    



	

}

/* End of file M_authentication.php */
/* Location: ./application/models/M_authentication.php */