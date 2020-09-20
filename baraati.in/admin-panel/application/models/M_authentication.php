<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_authentication extends CI_Model {

	    /***admin login
	    * @param : email/username , password
	    *
	    **/ 
		function can_login($email, $password)  
	      {  
        
           $this->db->where('password', $password); 
           $this->db->group_start(); 
            $this->db->where('name', $email);  
            $this->db->or_where('email', $email); 
           $this->db->group_end();
           $query = $this->db->get('admin');
           //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
           if($query->num_rows() > 0)  
           {  
                return $query->row_array();  
           } else{
            return false;
           }
          
      } 



        /**
		* forget pasword mail check exist or not
		* @url : forgot/email-check
		* @param : email and forgot-id
		*/ 
		public function check_mail($email,$forgotid)
		{
        $this->db->where('email', $email);
        $query = $this->db->get('admin');

        if($query->num_rows() > 0)  
           {
            $this->db->where('email', $email);
            $this->db->update('admin',array('forgot_link' =>$forgotid));
            return true;
           }  
           else  
           {
              return false;
           }
        }

        /**
		* forget pasword -> update new password
		* @url : update-password
		* @param : email and forgot-id , new password
		*/ 
        public function addforgtpass($email,$newpass,$forgotid)
		{
            $this->db->where('email', $email);
			$this->db->where('forgot_link', $forgotid);
			$query = $this->db->get('admin');
			if($query->num_rows() > 0)
			{
			    $this->db->where('email', $email);
                $this->db->where('forgot_link', $forgotid);
                $this->db->update('admin',  array(' password ' =>$newpass,'forgot_link'=>random_string('alnum',16)));
                if ($this->db->affected_rows() > 0) 
                {
                	return true;
                }else{
                	return false;
                }
			}else
			{
             return false;  
			}
			
        }

          //get enquiries
  public function getEnquiry($value='')
  {
    return $this->db->order_by('id', 'desc')->get('contact')->result();
  }

  public function vendorCount($value='')
  {
    $result =  $this->db->get('vendor')->result();
    return count($result);
  }

  public function userCount($value='')
  {
    $this->db->where('su_is_active', '1');
    $result =  $this->db->get('user')->result();
    return count($result);
  }

  public function vnenquiryCount($value='')
  {
    $result =  $this->db->get('vendor_enquiry')->result();
    return count($result);
  }

  public function categoryCount($value='')
  {
    $result =  $this->db->get('category')->result();
    return count($result);
  }

  

	

}

/* End of file M_authentication.php */
/* Location: ./application/models/M_authentication.php */