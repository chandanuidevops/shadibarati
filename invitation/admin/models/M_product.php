<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_product extends CI_Model {

	/**
     * Product -> insert Product
     * insert new Vendors into db
     * url : Product/insert
    **/
	public function insert_product($insert)
	{
		$this->db->where('uniq', $insert['uniq']);
		$query = $this->db->get('product')->row_array();
		if ($query > 0) {
			$this->db->where('uniq', $insert['uniq']);
			 $this->db->update('product', $insert);
			return  $query['id'];
		}else{
			$this->db->insert('product',$insert);
			$insert_id = $this->db->insert_id();
		  	return  $insert_id;
		}
    }

    // get the single product
    public function getproduct($id='')
    {
    	return $this->db->where('id', $id)->get('product')->row();
    }

    // get iomages of single product
    public function getimages($id='')
    {
    	return $this->db->where('prod_id', $id)->get('product_imgs')->result();
    }

    //insert other information & images
    public function other($insert='',$id='')
    {
    	$this->db->where('id', $id);
		$query = $this->db->get('product')->row_array();
		if ($query > 0) {
			$this->db->where('id', $id);
			$this->db->update('product', $insert);
			return  true;
		}else{
		  	return  false;
		}
    }

    public function insert_images($insert='')
    {
    	$this->db->where('uniq', $insert['uniq']);
		$query = $this->db->get('product_imgs')->row_array();
		if ($query > 0) {
			$this->db->where('uniq', $insert['uniq']);
			return $this->db->update('product_imgs', $insert);
		}else{
			$this->db->insert('product_imgs',$insert);
			return $this->db->insert_id();
		}
	}
	
	public function getproducts($var = null)
	{			
		$this->db->select('pr.id,pr.name, pr.pr_id, pr.sku,cat.title as category,pr.mrp,pr.selling_price,pr.featured_image');		
		$this->db->from('product pr');		
		$this->db->join('category cat', 'cat.id = pr.category', 'left');
		return $this->db->get()->result();		
	}

	public function delete($id = null)
    {
        $this->db->where('id', $id);
        $this->db->select('featured_image');
        $query = $this->db->get('product')->row();
        if (!empty($query)) {
            $this->db->where('id', $id);
            $this->db->delete('product');
            unlink('../'.$query->featured_image);
            return true;            
        }else{
            return false;
        }
    }


	

}

/* End of file M_product.php */
/* Location: .//C/xampp/htdocs/invitation/admin/models/M_product.php */