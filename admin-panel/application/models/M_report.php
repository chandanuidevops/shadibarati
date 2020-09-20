<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_report extends CI_Model {

	public function saleReport($filt='')
	{
		$mon='';
		if ($filt['month'] < 10 ) { $mon = '0'.$filt['month']; }
		$month = (!empty($filt['month']))?$mon:date('m');
		$year = (!empty($filt['year']))?$filt['year']:date('Y');
		$sdate = $year.'-'.$month.'-01 00:01:01';
		$edate = $year.'-'.$month.'-31 11:59:00';
		$this->db->where('rp.added_on >=', $sdate);
		$this->db->where('rp.added_on <=', $edate);
		if (!empty($filt['city'])) { $this->db->where('rp.v_city', $filt['city']); }
		if (!empty($filt['category'])) { $this->db->where('rp.v_category', $filt['category']); }
		if (!empty($filt['nathead'])){ $this->db->where('rp.nation_head', $filt['nathead']);}
		if (!empty($filt['branch'])) { 	$this->db->where('rp.bran_mang', $filt['branch']); 	}
		if (!empty($filt['tele'])) 	 { 	$this->db->where('rp.telecaller', $filt['tele']); 	}
		if (!empty($filt['asm'])) 	 { 	$this->db->where('rp.employee', $filt['asm']); 	}
		return $this->db->select('rp.id,rp.added_on,rp.city_banner,rp.cat_banner,rp.package as renewPack,rp.invoice_name,rp.gstno,rp.listing_name,rp.listing_mail,rp.listing_phone,rp.invoice_address,rp.ord_type,rp.c_person,rp.alt_phone,rp.list_city,rp.tenure,rp.nt_amnt,rp.discount,rp.gst_amount,rp.amt_after_disc,rp.tds,rp.t_amnt,rp.am_words,rp.pay_mode,rp.inst_no,rp.pay_date,rp.amount,rp.status, am.admin_type,am.id as empid, am.name as empname,vn.name as vendorname,cty.city,cat.category,p.title,rp.started_from, rp.employee,rp.manager, rp.status,vn.id as vendorId,rp.status,rp.live,rp.approved,rp.added_by,rp.bran_mang,rp.nation_head,rp.telecaller,')
		->from('renew_package rp')
		->join('city cty', 'cty.id = rp.v_city', 'left')
		->join('vendor vn', 'vn.id = rp.vendor_id', 'left')
		->join('category cat', 'cat.id = rp.v_category', 'left')
		->join('admin am', 'am.id = rp.employee', 'left')
		->join('package p', 'p.id = rp.package', 'left')
		->order_by('rp.id','desc')
		->get()->result();
	}


	public function empGet($value='')
	{
		return $this->db->select('id,name,email')->where('admin_type', '3')
		->get('admin')->result();
	}

	public function vendorsCount($id='')
	{
		return $this->db->where('added_by', $id)->get('vendor')->num_rows();
	}

	public function visitors($year='',$month='')
	{
		$newData=array();
		$counts=array();
        $this->db->select('date');
        if (!empty($year) && !empty($month)) {
        	if ($month < 10) {
        		$month = '0'.$month;
        	}
        	$syear = $year.'-'.date(''.$month.'-01 0:01:00');
        	$eyear = $year.'-'.date(''.$month.'-31 11:59:00');
        	$this->db->where('date >=', $syear);
        	$this->db->where('date <=', $eyear);
        }else if (!empty($year)) {
        	$syear = $year.'-'.date('01-01 0:01:00');
        	$eyear = $year.'-'.date('12-31 11:59:00');
        	$this->db->where('date >=', $syear);
        	$this->db->where('date <=', $eyear);
        }else if (!empty($month)) {
        	$syear = date('Y-'.$month.'-01 0:01:00');
        	$eyear = date('Y-'.$month.'-31 11:59:00');
        	$this->db->where('date >=', $syear);
        	$this->db->where('date <=', $eyear);
        }
        $this->db->order_by('id', 'desc');
        $query = $this->db->get('visitors')->result();
        foreach ($query as $key => $value) {
        	$newData[]= date("Y-m-d",strtotime($value->date));
        }
        $data['date'] = $newData;
        $data['vals'] = array_count_values($data['date']);
        foreach ($data['vals'] as $key => $value) {
            $counts[] = array("day"=>$key , "visit"=>$value);
        }
        return $counts;
	}

	public function employee($filt='')
	{
		// if (!empty($filt['nathead'])){ 	$this->db->where('rp.nation_head', $filt['nathead']);}
		// if (!empty($filt['branch'])) { 	$this->db->where('rp.bran_mang', $filt['branch']); 	}
		// if (!empty($filt['tele'])) 	 { 	$this->db->where('rp.telecaller', $filt['tele']); 	}
		// if (!empty($filt['asm'])) 	 { 	$this->db->where('rp.employee', $filt['asm']); 	}
		$this->db->group_by('a.id');
		$this->db->where('a.admin_type !=',1);
		$this->db->select('a.id,a.name,etyp.types,a.admin_type');
		$this->db->from('admin a');
		$this->db->join('emp_types etyp', 'etyp.id = a.admin_type', 'left');
		return $this->db->get()->result();
	}

	public function emp_clear($admintype='',$id='',$month='',$year='')
	{
		if ($month == '') { $month = date('m'); }
		if ($year == '') { $year = date('Y'); }
		$month = (int)$month;
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$sdate = $year.'-'.$month.'-01 00:01:01';
		$edate = $year.'-'.$month.'-31 11:59:00';
		$this->db->select_sum('t_amnt');
		$this->db->where('added_on >=', $sdate);
		$this->db->where('added_on <=', $edate);
		$this->db->where('status', '1');
		$this->db->where('live', '1');
		if ($admintype == 3 || $admintype == 4 || $admintype == 7) {
			$this->db->where('employee', $id);
		}elseif ($admintype == 2) {
			$this->db->where('manager', $id);
		}elseif ($admintype == 8) {
			$this->db->where('bran_mang', $id);
		}elseif ($admintype == 9) {
			$this->db->where('nation_head', $id);
		}
		elseif ($admintype == 6) {
			$this->db->where('telecaller', $id);
		}else{
			$this->db->where('employee', $id);
		}
		$result = $this->db->get('renew_package')->row();
		if (!empty($result->t_amnt)) {
			return $result->t_amnt;
		}else{
			return 0;
		}
	}

	public function manager($id='')
	{
		$manager = $this->db->where('id', $id)->get('admin')->row('manager');
		if (!empty($manager)) {
			return $this->db->where('id', $manager)->get('admin')->row('name');
		}else{
			return false;
		}
	}

	public function getManager($city='')
	{
		if (!empty($city)) { $this->db->where('a.city', $city); } 
		$this->db->where('a.admin_type', 2);
		$this->db->select('a.id, a.name,cty.city');
		$this->db->from('admin a');
		$this->db->join('city cty', 'cty.id = a.city', 'left');
		return $this->db->get()->result();
	}

	public function mantarget($year='',$month='',$id='')
	{
		$target = array();
		if ($month == '') { $month = date('m'); }
		if ($year == '') { $year = date('Y'); }
		$month = (int)$month;
		$query = $this->db->where('manager', $id)->get('admin')->result();
		foreach ($query as $key => $value) {
			$result = $this->db->where('emp_id', $value->id)->where('month',$month)->where('year',$year)->get('e_target')->row('target');
		}
		if (!empty($result)) {
			return $result;
		}else{
			return 0;
		}
	}

	public function manLogin($year='',$month='',$id='')
	{
		if ($month == '') { $month = date('m'); }
		if ($year == '') { $year = date('Y'); }
		$month = (int)$month;
		$target = array();
		$query = $this->db->where('manager', $id)->get('admin')->result();
		foreach ($query as $key => $value) {
			if (!empty($month) || !empty($year)) {
				$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
				$sdate = $year.'-'.$month.'-01 00:01:01';
				$edate = $year.'-'.$month.'-31 11:59:00';
				$this->db->select_sum('t_amnt');
				$this->db->where('added_on >=', $sdate);
				$this->db->where('added_on <=', $edate);
			}
			$this->db->where('employee', $value->id);
			$result = $this->db->get('renew_package')->row();
			if (!empty($result)) {
				$target[] = str_replace(",", "", $result->t_amnt);
			}else{
				$target = array();
			}
		}
		return $targ = array_sum($target);
	}

	public function penLogin($year='',$month='',$id='')
	{
		if ($month == '') { $month = date('m'); }
		if ($year == '') { $year = date('Y'); }
		$month = (int)$month;
		$target = array();
		$query = $this->db->where('manager', $id)->get('admin')->result();
		foreach ($query as $key => $value) {
			if (!empty($month) || !empty($year)) {
				$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
				$sdate = $year.'-'.$month.'-01 00:01:01';
				$edate = $year.'-'.$month.'-31 11:59:00';
				$this->db->select_sum('t_amnt');
				$this->db->where('added_on >=', $sdate);
				$this->db->where('added_on <=', $edate);
			}
			$this->db->where('status', '1');
			$this->db->where('live', '0');
			$this->db->where('employee', $value->id);
			$result = $this->db->get('renew_package')->row();
			if (!empty($result)) {
				$target[] = str_replace(",", "", $result->t_amnt);
			}else{
				$target = array();
			}
		}
		return $targ = array_sum($target);
	}


	public function manclear($year='',$month='',$id='')
	{
		if ($month == '') { $month = date('m'); }
		if ($year == '') { $year = date('Y'); }
		$month = (int)$month;
		$target = array();
		$query = $this->db->where('manager', $id)->get('admin')->result();
		foreach ($query as $key => $value) {
			if (!empty($month) || !empty($year)) {
				$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
				$sdate = $year.'-'.$month.'-01 00:01:01';
				$edate = $year.'-'.$month.'-31 11:59:00';
				$this->db->select_sum('t_amnt');
				$this->db->where('added_on >=', $sdate);
				$this->db->where('added_on <=', $edate);
			}
			$this->db->where('status', '1');
			$this->db->where('live', '1');
			$this->db->where('employee', $value->id);
			$result = $this->db->get('renew_package')->row();
			if (!empty($result)) {
				$target[] = str_replace(",", "", $result->t_amnt);
			}else{
				$target = array();
			}
		}
		return $targ = array_sum($target);
	}

	public function liveReport($category='',$city='',$month='',$year='')
	{
		if ($month == '') { $month = date('m'); }
		if ($year == '') { $year = date('Y'); }
		$month = (int)$month;
		if (!empty($month) || !empty($year)) {
			$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
			$sdate = $year.'-'.$month.'-01 00:01:01';
			$edate = $year.'-'.$month.'-31 11:59:00';
			$this->db->select_sum('t_amnt');
			$this->db->where('rp.added_on >=', $sdate);
			$this->db->where('rp.added_on <=', $edate);
		}

		if (!empty($city)) { $this->db->where('rp.v_city', $city); } 
		if (!empty($category)) { $this->db->where('rp.v_category', $category); } 

		$this->db->where('rp.live', 1);
		$this->db->where('rp.status', 1);
		$this->db->select('rp.*,vn.*,rp.discount,pc.title,rp.employee as employeename ,a.name as employee,cty.city as cityName,cat.category as categoryName,');
		$this->db->from('renew_package rp');
		$this->db->join('vendor vn', 'vn.id = rp.vendor_id', 'left');
		$this->db->join('package pc', 'pc.id = rp.package', 'left');
		$this->db->join('admin a', 'a.id = rp.employee', 'left');
		$this->db->join('city cty', 'cty.id = vn.city', 'left');
		$this->db->join('category cat', 'cat.id = vn.category', 'left');
		return $this->db->get()->result();
	}

	public function getVendors($filt='')
	{
		if (!empty($filt['city'])) {
			$this->db->where('ven.city', $filt['city']);
		}
		if (!empty($filt['category'])) {
			$this->db->where('ven.category', $filt['category']);
		}

		if (!empty($filt['package'])) {
			$this->db->where('ven.package', $filt['package']);
		}
		$this->db->group_by('ven.name,ven.id');

		$this->db->select('ven.id as id, ven.name as name , ven.phone as phone , ven.email as email, cty.city as city, cat.category as category,ven.registered_date as regdate,ven.is_active as status,pac.title,pac.leads,ven.package,ven.upgrad');
		$this->db->order_by('ven.id', 'desc');
		$this->db->from('vendor ven');
		$this->db->join('city cty', 'cty.id = ven.city', 'left');
		$this->db->join('category cat', 'cat.id = ven.category', 'left');
		$this->db->join('package pac', 'pac.id = ven.package', 'left');
		$this->db->join('vendor_enquiry vn', 'vn.vendor_id = ven.id', 'inner');
		return $this->db->get()->result();
	}


	public function getLeads($var = null)
    {
    	$this->db->group_by('ve.user_name');
    	$this->db->group_by('ve.category');
    	 $this->db->group_by('DATE(ve.date)');
        $this->db->select('ve.*,v.name,v.id,ve.id as ids');
        $this->db->from('vendor_enquiry ve');
        $this->db->join('vendor v', 'v.id = ve.vendor_id', 'left');        
        $this->db->order_by('ve.id', 'desc');        
        return $this->db->get()->result();    
    }

    public function leadsCount($user_name='',$category='')
	{
		$this->db->where('user_name', $user_name)->where('category',$category);
		$this->db->group_by('user_name');
		$this->db->group_by('category');
		$query = $this->db->get('vendor_enquiry')->result();
		if (!empty($query)) {
			return count($query);
		}else{
			return false;
		}
	}

	public function emptarget($id='',$month='',$year='')
	{
		$this->db->select('target')->where('emp_id', $id)->where('month', $month)->where('year', $year);
		$query = $this->db->get('e_target')->row('target');
		if (!empty($query)) {
			return $query;
		}else{
			return 0;
		}
	}

	public function Totlogin($admintype='',$id='',$month='',$year='')
	{
		if ($admintype == 3 || $admintype == 4 || $admintype == 7) {
			$this->db->where('employee', $id);
		}elseif ($admintype == 2) {
			$this->db->where('manager', $id);
		}elseif ($admintype == 8) {
			$this->db->where('bran_mang', $id);
		}elseif ($admintype == 9) {
			$this->db->where('nation_head', $id);
		}
		elseif ($admintype == 6) {
			$this->db->where('telecaller', $id);
		}else{
			$this->db->where('employee', $id);
		}

		if ($month == '') { $month = date('m'); }
		if ($year == '') { $year = date('Y'); }

		$month = (int)$month;
		$days = cal_days_in_month(CAL_GREGORIAN,$month,$year);
		$sdate = $year.'-'.$month.'-01 00:01:01';
		$edate = $year.'-'.$month.'-31 11:59:00';

		$this->db->select_sum('t_amnt');
		$this->db->where('added_on >=', $sdate);
		$this->db->where('added_on <=', $edate);
		$result = $this->db->get('renew_package')->row();
		if (!empty($result->t_amnt)) {
			return $result->t_amnt;
		}else{
			return 0;
		}

	}


}

/* End of file M_report.php */
/* Location: ./application/models/M_report.php */