<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class M_preload extends CI_Model {

    public function testimonial()
    {
        return $this->db->where('status', '3')->get('feedback')->num_rows();
    }
    
    public function feedback()
    {
        return $this->db->where('status', '2')->get('user_feedback')->num_rows();
    }

}

/* End of file m_preload.php */
