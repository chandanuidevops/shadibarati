<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {


    /**
     * Users -> manage users
     * get all users detail and display in table
     * url : users/manage
    **/
	public function getusers($value='')
	{
		$this->db->order_by('su_id', 'desc');
		return $this->db->get('user')->result();
	}


    /**
    * Users -> delete users
    * delete single user from db
    * url : users/delete/id
    * @param : id
    */
    public function delete_user($id)
	{
		$this->db->where('su_id', $id);
		$this->db->delete('user');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

    /**
    * Users -> user detail 
    * get single user detail and display
    * url : users/view/id
    * @param : id
    */
    public function single_user($id)
	{
        $this->db->where('su_id', $id);
		$query = $this->db->get('user');
		if ($query->num_rows() > 0) 
		{
			
			return $query->row();
		}
		else
		{
			return false;
		}
	}	


    /**
    * Users -> get contacted vendor
    * get single contacted vendor
    * @param : userid
    */
    public function contacted_vendor($id)
	{
        $this->db->where('user_id', $id);
		$query = $this->db->get('vendor_enquiry');
		if ($query->num_rows() > 0) 
		{
			
			return $query->result();
		}
		else
		{
			return false;
		}
	}

    /**
    * Users -> block user
    * url : users/block/id
    * @param : id
    */
	public function block_user($id='',$status='')
	{
		$this->db->where('su_id', $id);
		$this->db->set('su_is_active', $status);
		$this->db->update('user');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function resend_link($id = null,$refid='')
	{		
		return $this->db->where('su_id', $id)->update('user',array('su_referenceid' => $refid));		
	}
	

}

/* End of file M_user.php */
/* Location: ./application/models/M_user.php */