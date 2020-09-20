<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_package extends CI_Model {


    /**
    * package - manage package
    * @url - package
    ***/ 
    public function getPackage($value='')
    {
    	return $this->db->order_by('id', 'desc')->get('package')->result();
    }

    /**
    * package - add package
    * @url - package/add
    ***/ 
    public function insert($insert='')
    {
    	$this->db->where('title !=', $insert['title']);
    	return $this->db->insert('package', $insert);
    }

    /**
    * package - edit package
    * @url - package/edit
    ***/ 
    public function singlePackage($id='')
    {
    	return $this->db->where('id', $id)->get('package')->row();
    }

    /**
    * package - update package
    * @url - package/update
    ***/ 
    public function update($update='',$id='')
    {
    	return $this->db->where('id', $id)->update('package',$update);
    }

    /**
    * package - delete package
    * @url - package/delete
    ***/ 
    public function delete($id='')
    {
    	return $this->db->where('id', $id)->delete('package');
    }

}

/* End of file M_package.php */
/* Location: ./application/models/M_package.php */