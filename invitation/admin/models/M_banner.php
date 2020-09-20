<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_banner extends CI_Model {

    //banner get
    public function bannerGet($var = null)
    {
        return $this->db->order_by('id', 'desc')->get('banner')->result();    
    }


    //insert banner
    public function insert($insert = null)
    {
        
        $this->db->where('uniq', $insert['uniq']);
        $query = $this->db->get('banner');
        if($query->num_rows() > 0){
            $this->db->where('uniq', $insert['uniq']);
            return $this->db->update('banner', $insert);
        }else{
            return $this->db->insert('banner', $insert);
        } 
    }


    public function delete($id = null)
    {
        $this->db->where('id', $id);
        $this->db->select('image');
        $query = $this->db->get('banner')->row();
        if (!empty($query)) {
            $this->db->where('id', $id);
            $this->db->delete('banner');
            unlink('../'.$query->image);
            return true;            
        }else{
            return false;
        }
    }

    public function edit($id = null)
    {
        return $this->db->where('id', $id)->get('banner')->row();
    }
    

}

/* End of file ModelName.php */
