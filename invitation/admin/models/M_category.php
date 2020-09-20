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

	public function update_category($title,$id)
	{

		$this->db->where('id', $id);
		$this->db->update('category', array('title' => $title));
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}


	// subcategory
    public function sub_category($id = null)
    {
        $result = $this->db->where('status', 1)->get('category')->result();
        foreach ($result as $key => $value) {
            $value->sub = $this->getSubcategory($value->id);
        }
        return $result;
    }

    public function getSubcategory($id = null)
    {
        return $this->db->select('title, id')->where('status', 1)->where('cat_id', $id)->get('sub_category')->result();
    }

    // add subcategory
    public function add_sub_category($data = null)
    {
        $this->db->insert('sub_category', $data);
        if($this->db->affected_rows() > 0){ return true;}else{return false; }
    }

        // move to trash sub post
    public function deleteSubCategoryTrash($id)
    {
        $this->db->where('category', $id)->update('sub_category', array('status' => 0));
        return true;
    }

        // edit sub category
    public function editSub($data = null, $id = null)
    {
        $this->db->where('id', $id);
        $this->db->update('sub_category', $data);
        if($this->db->affected_rows() > 0){ return true;}else{return false; }
    }





	
	

}