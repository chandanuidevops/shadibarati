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

    public function bypackage()
    {
    	return $this->db->where('status', '0')->get('v_buypackage')->num_rows();
    }

    public function getaccess()
    {
        $aid =  $this->session->userdata('sha_id');
        return $this->db->where('id',$aid)->get('admin')->row();
    }

    public function getDisccount()
    {
         if ($this->session->userdata('sha_type') == '2' ) {
            $addedby = $this->db->select('id')->where('manager',$this->session->userdata('sha_id'))->get('admin')->result();
            foreach ($addedby as $key ) {
                $val[] = $key->id;
            }
            if(!empty($val)){
                $this->db->group_start();
                    $this->db->where_in('rp.added_by',$val);
                $this->db->group_end();
            }
            
        }
        $this->db->where('rp.added_by', $this->session->userdata('sha_id'));
        $this->db->where('rp.seen !=', 1);
        $this->db->select('ven.id as id, ven.name as name , ven.phone as phone , ven.email as email, cty.city as city, cat.category as category,ven.registered_date as regdate,ven.is_active as status,pac.title,ven.package');
        $this->db->order_by('ven.id', 'desc');
        $this->db->from('renew_package rp');
        $this->db->join('vendor ven', 'ven.id = rp.vendor_id', 'left');
        $this->db->join('city cty', 'cty.id = rp.v_city', 'left');
        $this->db->join('category cat', 'cat.id = rp.v_category', 'left');
        $this->db->join('package pac', 'pac.id = rp.package', 'left');
        return $this->db->get()->num_rows();
    }

    public function newProposal($value='')
    {
        if ($this->session->userdata('sha_type') == '2' ) {
            $this->db->where('rp.added_by', $this->session->userdata('sha_id'));
        }
        return $this->db ->where('rp.seen !=',1)
        ->where('rp.approved !=',1)
        ->where('rp.live !=',1)
        ->from('renew_package rp')
         ->get()->result();
    }
    

    public function approvedProposal($value='')
    {
        if ($this->session->userdata('sha_type') == '2' ) {
            $this->db->where('rp.added_by', $this->session->userdata('sha_id'));
        }
        return $this->db->where('rp.approved',1)
        ->where('rp.live !=',1)
        ->from('renew_package rp')
        ->get()->result();
    }

    public function rejectProposal($value='')
    {
        if ($this->session->userdata('sha_type') == '2' ) {
            $this->db->where('rp.added_by', $this->session->userdata('sha_id'));
        }
        return $this->db->where('rp.status', '2')
		->where('rp.approved !=',1)
		->where('rp.live !=',1)
        ->from('renew_package rp')
        ->get()->result();
    }

    public function allProposal($value='')
    {
        return $this->db->from('renew_package rp')
        ->get()->result();
    }

    public function payProposal($value='')
    {
        return $this->db->where('rp.approved',1)
        ->where('rp.live !=',1)
        ->from('renew_package rp')
        ->get()->result();
    }

    public function liveProposal($value='')
    {
        return $this->db->where('rp.live',1)
        ->from('renew_package rp')
        ->get()->result();
    }

    public function vendorApproval($value='')
    {
        $this->db->where('is_active', '3');
        $this->db->or_where('is_active', '0');
        $result = $this->db->get('vendor');
        if ($result->num_rows() > 0) {
            return $result->num_rows();
        }else{
            return false;
        }
    }
}

/* End of file m_preload.php */
