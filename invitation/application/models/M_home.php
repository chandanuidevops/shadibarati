<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

	// get banner
	public function getBanner($value='')
	{
		return $this->db->get('banner')->result();
	}

	//get products
	public function getProduct($value='')
	{
		$this->db->select('p.name,p.id, p.uniq,p.pr_id,p.sku,p.mrp,p.selling_price,p.discount,p.featured_image,c.title,p.uniq,p.pr_type');
		$this->db->from('product p');
		$this->db->join('category c', 'c.id = p.category', 'left');
		return $this->db->get()->result();
	}

	

}

/* End of file M_home.php */
/* Location: ./application/models/M_home.php */