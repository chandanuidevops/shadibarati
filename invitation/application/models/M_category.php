<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_category extends CI_Model {

	// category fetch
	public function allcategory($value='')
	{
		$this->db->order_by('title', 'asc');
		return $this->db->get('category')->result();
	}

	// sub category fetch
	public function subcategory($id='')
	{
		$this->db->where('cat_id', $id);
		return $this->db->get('sub_category')->result();
	}
		

}
