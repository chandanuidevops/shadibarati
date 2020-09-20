<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_homban extends CI_Model {

	//get banner
    public function bannerGet($var = null)
    {
        return $this->db->order_by('id', 'asc')->get('h_banner')->result();    
    }

    public function updateBanner($data='')
    {
    	$this->db->where('position', $data['position']);
    	$query = $this->db->get('h_banner');

    	if ($query->num_rows() > 0) {
    		$this->db->where('position', $data['position']);
    		return $this->db->update('h_banner', $data);
    	}else{
    		return $this->db->insert('h_banner',$data);
    	}
    }

    public function delete($id='')
    {
    	$this->db->where('id', $id);
    	return $this->db->delete('h_banner');
    }

    public function getlink($position='')
    {
        $this->db->where('position', $position);
        return $this->db->get('h_banner')->row();
    }



}

/* End of file M_homban.php */
/* Location: ./application/models/M_homban.php */