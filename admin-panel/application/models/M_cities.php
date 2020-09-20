<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cities extends CI_Model {

	/**
     * cities -> manage cities
     * get all cities detail and display in table
     * url : cities/manage
    **/
	public function getcities($value='')
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get('city')->result();
	}

	/**
     * cities -> insert cities
     * insert new cities into db
     * url : cities/insert
    **/
	public function insert_city($insert)
	{
		$this->db->where('uniq', $insert['uniq']);
		$query = $this->db->get('city');
		if ($query->num_rows() > 0) 
		{
			$this->db->where('uniq', $insert['uniq']);
			return $this->db->update('city', $insert);
		}
		else
		{
			return $this->db->insert('city',$insert);
		}
    }



    /**
    * Users -> delete users
    * delete single user from db
    * url : users/delete/id
    * @param : id
    */
    public function delete_city($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('city');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	/**
    * Users -> get single city 
    * get single city detail and display
    * url : cities/edit/id
    * @param : id
    */
    public function single_city($id='')
	{
		$this->db->where('id', $id);
		$query =  $this->db->get('city');

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function update_city($update,$id)
	{

		$this->db->where('id', $id);
		$this->db->update('city', $update);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	
	

}