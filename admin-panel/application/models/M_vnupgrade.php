<?php defined('BASEPATH') OR exit('No direct script access allowed');

class M_vnupgrade extends CI_Model {

		/**
     * Vendors -> get Vendors
     * get Vendors details from database
     * url : vendors/my-vendors
    **/
	public function get_vendors($id='',$filter='')
	{
		$null=0;
		if (!empty($filter) && $filter =='free') {
			$this->db->where('ven.package', $null);
		}elseif (!empty($filter)) {
			$this->db->where('ven.package !=', $null);
		}

		if (!empty($id)) {
			$this->db->where('ven.added_by', $id);
		}

		$this->db->select('ven.id as id, ven.name as name , ven.phone as phone , ven.email as email, cty.city as city, cat.category as category,ven.registered_date as regdate,ven.is_active as status,pac.title,ven.package');
		$this->db->order_by('ven.id', 'desc');
		$this->db->from('vendor ven');
		$this->db->join('city cty', 'cty.id = ven.city', 'left');
		$this->db->join('category cat', 'cat.id = ven.category', 'left');
		$this->db->join('package pac', 'pac.id = ven.package', 'left');
		return $this->db->get()->result();
	}

	/**
     * Vendors -> get Vendors
     * get Vendors details from databases
     * url : vendors/view/id
    **/
	public function detail($id='')
	{
		$this->db->select('v.id as vId,ct.id as citId, ct.city as city,cat.id as catId, cat.category as category,v.name,v.email,v.phone,v.address,v.c_person')
		->where('v.id', $id)
		->from('vendor v')
		->join('city ct', 'ct.id = v.city', 'left')
		->join('category cat', 'cat.id = v.category', 'left');
		return $this->db->get()->row();
	}

		/**
     * Vendors -> get category
     * get category details from database
     * url : vendors/add
    **/
	public function get_category($value='')
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get('category')->result();
	}


	/**
     * Vendors -> get city
     * get city details from database
     * url : vendors/add
    **/
	public function get_city($value='')
	{
		$this->db->order_by('id', 'desc');
		return $this->db->get('city')->result();
	}

	public function getPackage($value='')
	{
		return $this->db->get('package')->result();
	}

	public function insertProposal($insert='')
	{
		$this->db->where('id', $insert['vendor_id']);
		$package = $this->db->from('vendor')->get()->row('package');
		$this->db->where('vendor_id', $insert['vendor_id']);
		$ends_on = $this->db->from('renew_package')->get()->row('ends_on');
		
		if (!empty($package)) { $insert['oldpack'] = $package; }
		if($ends_on){ $insert['oldval'] 	= $ends_on; }

		$this->db->where('uniq', $insert['uniq']);
		$query = $this->db->get('renew_package');
		if ($query->num_rows() > 0) {
			$this->db->where('uniq', $insert['uniq']);
			return $this->db->update('renew_package', $insert);
		}else{
			$this->db->insert('renew_package', $insert);
			return $this->db->insert_id();
		}
		
	}

	// get new proposal
	public function newProposal($added = null)
	{
		if ($this->session->userdata('sha_type') == '2' ) {
			$this->db->where('rp.added_by', $added);
		}

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
		if ($this->session->userdata('sha_type') == '2' ) {
			$this->db->where('rp.added_by', $added);
		}
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
		if ($this->session->userdata('sha_type') == '2' ) {
			$this->db->where('rp.added_by', $added);
		}
		 
		return $this->db->where('rp.status', '2')
		->where('rp.approved !=',1)
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
		->select('rp.id,rp.city_banner,rp.cat_banner,rp.package as renewPack,rp.invoice_name,rp.gstno,rp.listing_name,rp.listing_mail,rp.listing_phone,rp.invoice_address,rp.ord_type,rp.c_person,rp.alt_phone,rp.list_city,rp.tenure,rp.nt_amnt,rp.discount,rp.gst_amount,rp.amt_after_disc,rp.tds,rp.t_amnt,rp.am_words,rp.pay_mode,rp.inst_no,rp.pay_date,rp.amount,rp.status, am.admin_type,am.id as empid, am.name as empname,vn.name as vendorname,cty.city,cat.category,p.title,rp.started_from, rp.employee,rp.manager, rp.status,vn.id as vendorId,rp.reject_reson,rp.approved,rp.live,rp.ban_pack,rp.add_mon,rp.balance,rp.bran_mang,rp.nation_head,rp.telecaller,')
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

	public function packPrice($package='')
	{
		return $this->db->where('id', $package)->get('package')->row('price');
	}

	public function getInvoice($id='')
	{
		$this->db->order_by('id', 'desc');
		return $this->db->where('vendor_id', $id)->get('renew_package')->row();
	}

	public function getEmployee($value='')
	{
		return $this->db->select('a.id,a.name,a.admin_type,et.types,a.manager')
		->where('a.admin_type !=', 1)
		->from('admin a')->join('emp_types et', 'et.id = a.admin_type', 'left')
		->get()->result();
	}

	public function employ($emp='',$manager='',$bran_mang='',$nation_head='',$telecaller='')
	{
		$query = $this->db->select('id,name')->where('id', $emp)->get('admin')->row();
		if(!empty($query)){
			$query->manager 	= $this->db->select('id,name')->where('id', $manager)->get('admin')->row();
			$query->bran_mang 	= $this->db->select('id,name')->where('id', $bran_mang)->get('admin')->row();
			$query->nation_head = $this->db->select('id,name')->where('id', $nation_head)->get('admin')->row();
			$query->telecaller 	= $this->db->select('id,name')->where('id', $telecaller)->get('admin')->row();
		}
		return $query;
	}

	public function checkUpgrade($id='')
	{
		$query = $this->db->where('vendor_id', $id)->where('status', 0)->where('approved',0)->get('renew_package')->row();
		if (!empty($query)) {
			return $query;
		}else{
			return false;
		}
	}

	public function getBanner($id='')
    {
    	return $this->db->order_by('id', 'asc')->get('banner_package')->result();
    }

    public function editProposal($id='')
    {
    	return $this->db->where('id', $id)->get('renew_package')->row();
    }

    public function updateUpgrade($insert='',$id='')
    {
    	$this->db->where('id', $id);
    	$query = $this->db->get('renew_package');
    	if ($query->num_rows() > 0) {
    		$this->db->where('id', $id);
    		return $this->db->update('renew_package', $insert);
    	}else{
    		return $this->db->insert('renew_package', $insert);
    	}
    }

    public function insertPdc($insert='')
    {
    	return $this->db->insert('rp_pdc', $insert);
    }

    public function getPdc($id='')
    {
    	return $this->db->where('rp_id', $id)->get('rp_pdc')->result();
    }

    public function discountchk($discount='')
    {
    	$id = $this->session->userdata('sha_id') ;
    	$this->db->where('id', $id)->select('discount');
    	$query = $this->db->get('admin')->row('discount');
    	if (!empty($query)) {
    		if ($discount > $query) {
    			return $query;
    		}else{
    			return false;
    		}
    	}else{
    		return false;
    	}
    }
}

/* End of file M_vnupgrade.php */
/* Location: ./application/models/M_vnupgrade.php */