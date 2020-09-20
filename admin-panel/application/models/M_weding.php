<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class M_weding extends CI_Model {     

    //insert weding profile
      public function insertReal($insert = null)
      {
        $this->db->where('uniq', $insert['uniq']);
        $query = $this->db->get('real_wed')->row();
        if(!empty($query)){
            $this->db->where('uniq', $insert['uniq']);
            $this->db->update('real_wed', $insert);
            return $query->id;
        }else{
            $this->db->insert('real_wed', $insert);
            return $this->db->insert_id();
        } 
      }

      //insert real wedding images
      public function insertGal($insert = null)
      {
          $this->db->where('uniq', $insert['uniq']);
          $query = $this->db->get('real_gallery');
          if($query->num_rows() > 0){
              $this->db->where('uniq', $insert['uniq']);
              return $this->db->update('real_gallery', $insert);
          }else{
              return $this->db->insert('real_gallery', $insert);
          } 
      }

      //get weding profile
      public function getReal()
      {
          return $this->db->order_by('id','desc')->get('real_wed')->result();
      }

      //delete profile
      public function realDelete($id =null)
      {
        $this->db->where('id', $id);
         $this->db->select('image');
        $query = $this->db->get('real_wed')->row();
        if(!empty($query)){
            $this->db->where('id', $id);
            $this->db->delete('real_wed');
            unlink('../'.$query->image);
            $this->delGallery($id);            
            return true;
        }else{
            return false;
        }
      }

      public function delGallery($id = null)
      {
        $result = $this->db->where('real_id', $id)->get('real_gallery')->result();

        if(!empty($result)){
            foreach ($result as $key => $value) {
                $this->db->where('id', $value->id);
                $this->db->delete('real_gallery');
                unlink('../'.$value->image);                
            }
            return true;
        }else{
            return false;
        }
      }

      //get profile
      public function getProfile($id)
      {
        $this->db->where('id', $id);
        return $this->db->get('real_wed')->row();
      }
       //get profile
       public function getRealGal($id)
       {
         $this->db->where('real_id', $id);
         return $this->db->get('real_gallery')->result();
       }

       //edit profile
       public function realEdit($id)
       {
           return $this->db->where('id',$id)->get('real_wed')->row();
       }
       //update profile
    //    public function realUpdate($id,$insert)
    //    {
    //        $this->db->where('id',$id);
    //        $query = $this->db->get('real_wed')->row();
    //        if(!empty($query))
    //        {
    //         unlink('../'.$query->image);
    //         $this->db->where('id',$id);
    //         $this->db->update('real_wed',$insert);
    //         return $query->id;
    //        }else{
    //            return false;
    //        }
    //    }

       public function galDelete($id =null)
      {
        $this->db->where('id', $id);
         $this->db->select('image');
        $query = $this->db->get('real_gallery')->row();
       
        if(!empty($query)){
            $this->db->where('id', $id);
            $this->db->delete('real_gallery');
            unlink('../'.$query->image);           
            return true;
        }else{
            return false;
        }
      }
    //   public function getRealId($id){
    //     $this->db->where('id', $id);
    //     $query = $this->db->get('real_gallery')->row();
    //     return $query->real_id;
    //   }
}

/* End of file ModelName.php */
