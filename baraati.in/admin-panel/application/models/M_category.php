<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_category extends CI_Model {

	/**
     * cities -> manage cities
     * get all cities detail and display in table
     * url : cities/manage
    **/
	public function getcategory($value='')
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get('category')->result();
	}

	/**
     * cities -> insert cities
     * insert new cities into db
     * url : cities/insert
    **/
	public function insert_category($insert)
	{
		$this->db->where('uniq', $insert['uniq']);
		$query = $this->db->get('category');
		if ($query->num_rows() > 0) 
		{
			$this->db->where('uniq', $insert['uniq']);
			return $this->db->update('category', $insert);
		}
		else
		{
			return $this->db->insert('category',$insert);
		}
	}
	
	public function new_service($insert)
	{
		$this->db->where('i_uniq', $insert['i_uniq']);
		$query = $this->db->get('information_service');

		if ($query->num_rows() > 0) {
			$this->db->where('i_uniq',  $insert['i_uniq']);
			$this->db->update('information_service', $insert);
		}else{
			return $this->db->insert('information_service', $insert);			
		}
	}




    /**
    * Users -> delete users
    * delete single user from db
    * url : users/delete/id
    * @param : id
    */
    public function delete_category($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('category');
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
    public function single_category($id='')
	{
		$this->db->where('id', $id);
		$query =  $this->db->get('category');

		if ($query->num_rows() > 0) {
			return $query->row();
		}else{
			return false;
		}
	}

	public function update_category($update,$id)
	{

		$this->db->where('id', $id);
		$this->db->update('category', $update);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function getInfo($id = null)
	{
		return $this->db->where('category_uniq', $id)->get('information_service', 6)->result();
	
	}

	public function getfaq($id = null)
	{
		return $this->db->where('category_id', $id)->get('faq', 6)->result();
	}

	public function deleteInfo($id = null)
	{
		$this->db->where('id', $id);
		$this->db->delete('information_service');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	
	}

	public function faq($question='',$answer='',$id='')
	{
		return $this->db->insert('faq', array('question'=>$question,'answer'=>$answer,'category_id'=>$id));
	}

	public function deleteFaq($id = null)
	{
		$this->db->where('category_id', $id);
		$this->db->delete('faq');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function delfaq($id = null)
	{
		$this->db->where('id', $id);
		$this->db->delete('faq');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
		
	}

	
	

}