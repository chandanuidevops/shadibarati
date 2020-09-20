<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_account extends CI_Model {

	    // get profile detail
    public function account($uid)
    {
        return $this->db->where('su_id', $uid)->get('user')->row();
    }

        //  update profile
    public function updateProfile($insert, $uid)
    {
        $this->db->where('su_id', $uid)->where('su_email', $insert['su_email'])->update('user', $insert);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }    
    }

    // get the profile pic
    public function profile_pic($uid='')
    {
    	return$this->db->select('su_profile_file,su_name')->where('su_id', $uid)->get('user')->row();
    }

    //get shortlisted vendors
    public function getShortlisted($userid='')
    {
        $this->db->where('sh.user_id', $userid);
        $this->db->where('sh.status', '1');
        $this->db->from('shortlist_vendor sh');
        $this->db->join('vendor v', 'v.id = sh.vendor_id', 'left');
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        }else{
            return false;
        }
    }

    public function getCity($id='')
    {
        $this->db->select('city');
        $this->db->where('id', $id);
        $result = $this->db->get('city')->row_array();
        return $result['city'];
    }

    public function getCategory($id='')
    {
        $this->db->select('category as name');
        $this->db->where('id', $id);
        $result = $this->db->get('category')->row_array();
        return $result['name'];
    }


    //get review details
    public function getReview($id='')
    {
       $this->db->where('vendor_id', $id);
       $this->db->where('status', '1');
       return $this->db->get('vendor_review')->result();
    }

        //get enquired
    public function enquireVendor($shduser='')
    {

        $this->db->where('ve.user_email', $shduser);
        $this->db->from('vendor_enquiry ve');
        $this->db->join('vendor v', 'v.uniq = ve.vendor_id', 'left');
        $result = $this->db->get();

        if ($result->num_rows() > 0) {
            return $result->result();
        }else{
            return false;
        }
    }




	

}

/* End of file M_account.php */
/* Location: ./application/models/M_account.php */