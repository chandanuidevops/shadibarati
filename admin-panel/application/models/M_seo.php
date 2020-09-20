<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_seo extends CI_Model {

	/**
    *manage SEO - get website page
    *@ulr : seo/manage
    **/ 
	public function getPage($value='')
	{
		return $this->db->order_by('id', 'asc')->get('seo')->result();
	}
	
	/**
    *	SEO - edit page details
    *	@ulr : seo/edit/$id
    *	@param: page id
    **/ 
	public function edit($id)
	{
		return $this->db->where('id', $id)->get('seo')->row();
	}

	/**
    *	SEO - update page details
    *	@ulr : seo/update
    **/ 
	public function update($insert='')
	{
		$this->db->where('id', $insert['id']);
		$query = $this->db->get('seo')->row();
		if (!empty($query)) {
			return $this->db->where('id',$insert['id'])->update('seo',$insert);
		}else{
			return $this->db->insert('seo', $insert);
		}
	}

	/**
    *	SEO - delete SEO details
    *	@ulr : seo/delete
    **/ 
	public function delete($id = null)
    {       
        $this->db->where('id', $id);
        $this->db->delete('seo');
        if ($this->db->affected_rows() > 0) {
            return true;
        }else{
            return false;
        }
	}
	
	public function getDseo($var = null)
	{
		return $this->db->get('default_seo')->row();
		
	}

	public function defaultUpdate($insert = null)
	{
		$query = $this->db->get('default_seo');
		if ($query->num_rows() > 0) {
			return $this->db->update('default_seo', $insert);					
		}else{			
			return $this->db->insert('default_seo', $insert);			
		}
	}

	/**
    *	SEO - fetch seo enquiry
    *	@ulr : seo-enquiry
    *	@param: page id
    **/ 
    public function getSeoEnquiry($value='')
    {
    	return $this->db->get('enquiry')->result();
    }

}

/* End of file M_seo.php */
/* Location: ./application/models/M_seo.php */