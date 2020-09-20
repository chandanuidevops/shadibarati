<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bannerp extends CI_Model {

    /**
    * banner package - manage banner package
    * @url - banner-package
    ***/
    public function getPackage($value='')
    {
    	return $this->db->order_by('id', 'desc')->get('banner_package')->result();
    }

    /**
    * package - add package
    * @url - package/add
    ***/ 
    public function insert($insert='')
    {
    	$this->db->where('title !=', $insert['title']);
    	return $this->db->insert('banner_package', $insert);
    }

    /**
    * package - edit package
    * @url - package/edit
    ***/ 
    public function singlePackage($id='')
    {
    	return $this->db->where('id', $id)->get('banner_package')->row();
    }

    /**
    * package - update package
    * @url - package/update
    ***/ 
    public function update($update='',$id='')
    {
    	return $this->db->where('id', $id)->update('banner_package',$update);
    }

    /**
    * package - delete package
    * @url - package/delete
    ***/ 
    public function delete($id='')
    {
    	return $this->db->where('id', $id)->delete('banner_package');
    }	

}

/* End of file M_bannerp.php */
/* Location: ./application/models/M_bannerp.php */