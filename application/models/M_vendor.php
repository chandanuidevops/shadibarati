<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_vendor extends CI_Model {

    //vue js phone check exist or not
    public function phone_check($phone='')
    {
        $this->db->where('phone', $phone);
        $result = $this->db->get('vendor');
           if($result->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

       //vue js phone check exist or not
       public function email_check($email='')
       {
           $this->db->where('email', $email);
           $result = $this->db->get('vendor');
              if($result->num_rows() > 0){
               return true;
           }else{
               return false;
           }
       }

       //vue js phone check exist or not
       public function brandcheck($name='')
       {

           $this->db->where('name', $name);
           $result = $this->db->get('vendor');
              if($result->num_rows() > 0){
               return true;
           }else{
               return false;
           }
       }    
       
       
       public function email_user($email = null)
       {
        $this->db->where('su_email', $email);
        $result = $this->db->get('user');
           if($result->num_rows() > 0){
            return 2;
        }else{
            return false;
        }
       }

       public function phone_user($email = null)
       {
        $this->db->where('su_phone', $email);
        $result = $this->db->get('user');
           if($result->num_rows() > 0){
            return 2;
        }else{
            return false;
        }
       }


    // registration
    public function register($insert = null)
    {
        $this->db->insert('vendor', $insert);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }        
    }

            //  account activation
            public function activateAccount($regid, $newRegid)
            {
                $this->db->select('id');
                $this->db->where('reference_id', $regid);
                $result = $this->db->get('vendor');
                if($result->num_rows() > 0){
                    $this->db->where('reference_id', $regid);
                    $this->db->update('vendor', array('reference_id' => $newRegid, 'is_active' => '3', 'updated_date' => date('Y-m-d H:i:s')));
                    if($this->db->affected_rows() > 0){
                    return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            }

            function can_login($email, $password)  
            {  
               $this->db->where('email', $email);
               $this->db->group_start();
               $this->db->where('is_active', '3');  
               $this->db->or_where('is_active', '1'); 
               
               $this->db->group_end();
            
               
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
        $query = $this->db->get('vendor');

        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            if ($this->bcrypt->check_password($password, $result['password'])) {
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
         $this->db->select('reference_id');
         $this->db->where('email', $email);
         $result = $this->db->get('vendor');
         if($result->num_rows() > 0){
             $ref = $result->row_array();
             return $ref['reference_id'];
         }else{
             return false;
         }  
     } 
     
     
            // forgot passwor set
    public function forgot_password_set($regid)
    {
        $this->db->where('reference_id', $regid);
        $result = $this->db->get('vendor');
        if($result->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }


        //  check the email is exist
        public function isEmail($str)
        {
            $this->db->where('email', $str);
            $result = $this->db->get('vendor');
    
            if($result->num_rows() > 0){
                return true;
            }else{
                return false;
            }
            
        }
    // password reset
    public function setPassword($datas, $email)
    {
        $this->db->where('email', $email);
        $query = $this->db->update('vendor', $datas);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }


}

/* End of file ModelName.php */
 ?>