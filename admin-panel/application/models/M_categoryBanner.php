<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_categoryBanner extends CI_Model {

    public function insert_banner($insert = null)
    {
        return  $this->db->insert('category_banner', $insert);
    }

    public function update_banner($insert, $uniq)
    {        
        $this->db->where('uniq', $uniq);
        $this->db->where('city_id', $insert['city_id']);
        $this->db->where('category_id',  $insert['category_id']);
        $result = $this->db->get('category_banner');

        if($result->num_rows() > 0){
            $this->db->where('uniq', $uniq);
            $this->db->where('city_id', $insert['city_id']);
            $this->db->where('category_id',  $insert['category_id']);
            return $this->db->insert('category_banner', $insert);
        }else{
            $this->db->where('uniq', $uniq);
            return $this->db->update('category_banner', $insert);
        }
    }
    //get banner
    public function bannerGet($var = null)
    {
        $this->db->group_by('cb.uniq');
        $this->db->select('cb.id, cb.city_id, cb.category_id,  cb.image, cty.city, cb.city_id, cb.uniq, cb.category_id, cat.category');
        $this->db->from('category_banner cb');        
        $this->db->join('category cat', 'cat.id = cb.category_id', 'left');
        $this->db->join('city cty', 'cty.id = cb.city_id', 'left');
        return $this->db->order_by('cb.id', 'desc')->get()->result();    
    }

        //get banner
        public function editGet($uniq = null)
        {
            $this->db->where('cb.uniq', $uniq);
            $this->db->select('cb.id, cb.city_id, cb.category_id,  cb.image, cty.city, cb.city_id, cb.category_id, cb.uniq,  cat.category');
            $this->db->from('category_banner cb');        
            $this->db->join('category cat', 'cat.id = cb.category_id', 'left');
            $this->db->join('city cty', 'cty.id = cb.city_id', 'left');
            return $this->db->order_by('cb.id', 'desc')->get()->result();    
        }

    //delete banner
    public function deleteBanner($uniq)
    {
        $this->db->select('image');

       $this->db->where('uniq', $uniq);
       $query = $this->db->get('category_banner')->row();
    
       if (!empty($query)) {
            $this->db->where('uniq', $uniq);
            $this->db->delete('category_banner');
            unlink('../'.$query->image);
            return true;
       }else{
           return false;
       }
    }
    public function deleteSingleBanner($id){
        $this->db->where('id', $id);
        $query = $this->db->get('category_banner')->row();

        if (!empty($query)) {
            $this->db->where('id', $id);
            $this->db->delete('category_banner');
            unlink('../'.$query->image);
            return true;
       }else{
           return false;
       }

    }
}