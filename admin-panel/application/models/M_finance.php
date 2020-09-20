<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_finance extends CI_Model {

	// get new proposal
	public function newProposal($added = null)
	{
		return $this->db->where('rp.seen !=',1)
		->where('rp.live !=',1)
		->where('rp.status !=', 1)
		->select('rp.id,vn.name,cty.city,cat.category,p.title,rp.started_from')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.added_by', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.id','desc')
		->get()->result();
	}

	public function approvedProposal($added = null)
	{
		return $this->db->where('rp.status', 1)
		->where('rp.live !=',1)
		->select('rp.id,vn.name,cty.city,cat.category,p.title,rp.started_from')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.added_by', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.id','desc')
		->get()->result();
	}

	public function rejectedProposal($added = null)
	{
		return $this->db->where('rp.status', '2')
		->where('rp.live !=',1)
		->select('rp.id,vn.name,cty.city,cat.category,p.title,rp.started_from')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.added_by', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.id','desc')
		->get()->result();
	}

	public function view_proposal($added = null,$id = null)
	{
		return $this->db->where('rp.id', $id)
		->select('rp.id,rp.lname,rp.in_name,rp.gstno,rp.laddress,rp.in_email,rp.in_mobile,rp.landline,rp.total,rp.namopunt,rp.or_id,rp.pan_no,am.admin_type,am.id as empid, am.name as empname,vn.name,cty.city,cat.category,p.title,rp.started_from,rp.pay_date')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.added_by', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.id','desc')
		->get()->row_array();
	}

	public function seenChange($id='')
	{
		return $this->db->where('id', $id)
		->where('seen','0')
		->update('renew_package',array('seen' => 1 ));
	}

	public function allProposal($added = null)
	{
		return $this->db->select('rp.id,vn.name,cty.city,cat.category,p.title,rp.started_from')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.added_by', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.id','desc')
		->get()->result();
	}

	public function clearedProposal($added = null)
	{
		return $this->db->where('rp.status',1)
		->where('rp.live !=',1)
		->select('rp.id,vn.name,cty.city,cat.category,p.title,rp.started_from')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.added_by', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.id','desc')
		->get()->result();
	}

	public function liveProposal($added='')
	{
		return $this->db->where('rp.live',1)
		->select('rp.id,vn.name,cty.city,cat.category,p.title,rp.started_from')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.added_by', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.id','desc')
		->get()->result();
	}

	public function makeLive($id='',$validity='')
	{
		$this->db->where('id', $id)->update('renew_package',array('live' => '1','ends_on'=>$validity));
		if ($this->db->affected_rows() > 0) {
			$this->addPackage($id);
			return true;
		}else{
			return false;
		}
	}


	public function addPackage($id='')
	{
		
		$rp = $this->db->select('vendor_id,package')->where('id', $id)->get('renew_package')->row();
		if (!empty($rp)) {
			$insert = array(
				'package' => $rp->package, 
				'discount_status' => '1', 
				'upgrad' => $id, 
			);
			$this->db->where('id', $rp->vendor_id)->update('vendor',$insert);
			return true;

		}else{
			return false;
		}
	}
	

}

/* End of file M_finance.php */
/* Location: ./application/models/M_finance.php */