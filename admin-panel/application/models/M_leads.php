<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_leads extends CI_Model {


    
	public function getCategory($id='')
	{
		return $this->db->select('category,id as catid')->get('category')->result();
	}

	public function getCity($id='')
	{
		return $this->db->select('city,id as cityId')->get('city')->result();
	}

	public function getVendors($city='',$category='',$v_type='',$search='')
	{
		if (!empty($search)) { $this->db->group_start()->like('vn.name', $search)->group_end(); }

		if (!empty($city)) { $this->db->where('vn.city', $city); }
		if (!empty($category)) { $this->db->where('vn.category', $category); }

		if ($v_type =='') {
			return  $this->db->group_by('vn.name')	
			->from('vendor vn')
			->select('vn.name,vn.id as vid,ve.vendor_id as lvn_id,ve.user_name as lvn_name')
			->join('vendor_enquiry ve', 've.vendor_id = vn.id', 'left')			
			->get()->result();
		}else if ($v_type =='free') {
			$nul = 0;
			return $this->db->where('vn.package',$nul)
			->group_by('vn.name')	
			->from('vendor vn')
			->select('vn.name,vn.id as vid,ve.vendor_id as lvn_id,ve.user_name as lvn_name')
			->join('vendor_enquiry ve', 've.vendor_id = vn.id', 'left')			
			->get()->result();			
			
		}else{
            return $this->db->select('vn.name,vn.id as vid,pac.*,ve.vendor_id as lvn_id,ve.user_name as lvn_name')	
            ->group_by('vn.name')
            ->where('vn.package !=','0')
            ->from('vendor vn')
			->join('vendor_enquiry ve', 've.vendor_id = vn.id', 'left')	
			->join('package pac', 'pac.id = vn.package', 'left')
			->get()->result();
		}	
    }
    
    public function lead_insert($insert = null)
    {    
        return $this->db->insert('vendor_enquiry', $insert); 
    }

    public function getLeads($var = null)
    {
        $this->db->select('ve.*,v.name,v.id,ve.id as ids');
        $this->db->from('vendor_enquiry ve');
        $this->db->join('vendor v', 'v.id = ve.vendor_id', 'left');        
        $this->db->order_by('ve.id', 'desc');        
        return $this->db->get()->result();    
    }


    public function getleadcount($vid = '',$name='')
    { 
        return $this->db->where('vendor_id', $vid)->get('vendor_enquiry')->num_rows();   
	}
	
	public function vendorPhone($id = null)
	{		
		return $this->db->where('id', $id)->get('vendor')->row('phone');		
	}

	public function deleteEnquiry($id='')
	{
		$this->db->where('id', $id)->delete('vendor_enquiry');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}





    

}

/* End of file ModelName.php */
