<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_vnpackage extends CI_Model {

	public function getProfile($id = null)
    {
        $this->db->select('v.id,v.name,v.phone,v.email,v.price,v.price_for,v.address,v.profile_file,v.detail,v.policy,v.tags,v.specification,v.location,v.uniq,cty.city,cat.category,cty.id as cityId, cat.id as catId');
        $this->db->group_start();
        $this->db->where('v.is_active', '3');
        $this->db->or_where('v.is_active', '1');
	    $this->db->group_end();
	    $this->db->where('v.uniq', $id);
	    $this->db->from('vendor v');
	    $this->db->join('city cty', 'cty.id = v.city', 'left');
	    $this->db->join('category cat', 'cat.id = v.category', 'left');
	    $query = $this->db->get();
	    if ($query->num_rows() > 0) {
	        return $query->row();
	    } else {
	        return false;
	    }
    }


    public function buyPackage($insert='')
    {
    	return $this->db->insert('v_buypackage', $insert);
    }

    public function getPackage($id='')
    {
    	if (!empty($id)) {
    		return $this->db->where('id', $id)->get('package')->row();
    	}else{
    		return $this->db->order_by('id', 'asc')->get('package')->result();
    	}
    	
    }

    public function getBanner($id='')
    {
    	if (!empty($id)) {
    		return $this->db->where('id', $id)->get('banner_package')->row();
    	}else{
    		return $this->db->order_by('id', 'asc')->get('banner_package')->result();
    	}
    }

}

/* End of file M_vnpackage.php */
/* Location: ./application/models/M_vnpackage.php */