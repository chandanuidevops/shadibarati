<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_venquiry extends CI_Model {

    public function vendor_enquiry($var = null)
    {
        $this->db->select('ve.*,v.*,ve.category cat,v.id ids');
        $this->db->order_by('ve.id', 'asc');        
        $this->db->from('vendor_enquiry ve');
        $this->db->join('vendor v', 'v.uniq = ve.vendor_id', 'left');        
        return $this->db->get()->result();  
    }

    

}

/* End of file ModelName.php */
