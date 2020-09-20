<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class  M_footercategory extends CI_Model {

	// Delete Category Type
	public function deleteType($city='',$category='')
	{
		return $this->db->where('city', $city)
		->where('category',$category)
		->where('seggregation',1)
		->delete('footer_category');
	}

	// insert category types
	public function insertType($types='')
	{	
		// $this->db->where('category', $types['category']);
		// $this->db->where('city', $types['city']);
		// $result = $this->db->get('footer_category');
		// if ($result->num_rows() > 0) {
		// 	$this->db->where('category', $types['category']);
		// 	$this->db->where('city', $types['city']);
		// 	return $this->db->update('footer_category', $types);
		// }else{
			return $this->db->insert('footer_category', $types);
		// }
	}

	// Delete Category Type
	public function deleteVcategory($city='',$category='')
	{
		return $this->db->where('city', $city)
		->where('category',$category)
		->where('seggregation',2)
		->delete('footer_category');
	}

	// Delete Category Type
	public function deletePopular($city='',$category='')
	{
		return $this->db->where('city', $city)
		->where('category',$category)
		->where('seggregation',3)
		->delete('footer_category');
	}

	//get footer category
	public function footGet($value='')
	{
		$this->db->select('fc.id,fc.type,fc.vendor_category,fc.popular,cat.category,cty.city,fc.city as cityId,fc.category as categoryId,fc.link');
		$this->db->group_by('fc.category,fc.city', 'desc');
		$this->db->from('footer_category fc');
		$this->db->join('category cat', 'cat.id = fc.category', 'left');
        $this->db->join('city cty', 'cty.id = fc.city', 'left');
		return $this->db->get()->result();
	}

	public function footEdit($city='',$category='')
	{
		$this->db->where('fc.city', $city)
		->where('fc.category', $category)
		->select('fc.id,fc.type,fc.vendor_category,fc.popular,fc.seggregation,cat.category,cty.city,fc.city as cityId,fc.category as categoryId,fc.link')
		->from('footer_category fc')
		->join('category cat', 'cat.id = fc.category', 'left')
        ->join('city cty', 'cty.id = fc.city', 'left');
        return $this->db->get()->result();
	}

	public function deleteInfo($id='')
	{
		$this->db->where('id', $id);
		return $this->db->delete('footer_category');
	}

	

}

/* End of file M_footercategory */
/* Location: ./application/models/M_footercategory */