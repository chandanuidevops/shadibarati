<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_career extends CI_Model {

    //List of jobs 
    public function jobList(Type $var = null)
    {
       return  $this->db->get('career_post')->result();
    }

    // add jobs
    public function addJob($data = null)
    {
        $this->db->insert('career_post', $data);
        if($this->db->affected_rows() > 0 ){
            return true;
        }else{
            return false;
        }
    }

    // get single
    public function jobGet($id)
    {
       return  $this->db->where('id', $id)->get('career_post')->row();
    }

    // update 
    public function editJob($data, $id)
    {
        $this->db->where('id', $id);
        $this->db->update('career_post', $data);
        if($this->db->affected_rows() > 0 ){
            return true;
        }else{
            return false;
        }
    }

    // delte
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('career_post');
        if($this->db->affected_rows() > 0 ){
            return true;
        }else{
            return false;
        }
    }

    // applications
    public function applications()
    {
        return $this->db->order_by('status', 'desc')->get('application')->result();
    }

    


}

/* End of file M_career.php */
