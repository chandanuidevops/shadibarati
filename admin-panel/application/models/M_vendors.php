<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_vendors extends CI_Model {

	/**
     * Vendors -> get Vendors
     * get Vendors details from database
     * url : vendors/manage
    **/
	public function get_vendors($id='',$filt='')
	{
		$null=0;
		if (!empty($filt['type']) && $filt['type'] =='free') {
			$this->db->where('ven.package', $null);
		}elseif (!empty($filt['type']) || $filt['type'] =='paid') {
			$this->db->where('ven.package !=', $null);
		}

		if (!empty($filt['package'])) {
			$this->db->where('ven.package', $filt['package']);
		}

		if (!empty($filt['city'])) {
			$this->db->where('ven.city', $filt['city']);
		}
		if (!empty($filt['category'])) {
			$this->db->where('ven.category', $filt['category']);
		}

		// $this->db->where('is_active', 1);
		$this->db->select('ven.id as id, ven.name as name , ven.phone as phone , ven.email as email, cty.city as city, cat.category as category,ven.registered_date as regdate,ven.is_active as status,pac.title,ven.package,ven.upgrad,ven.verified,ven.v_chat,ven.c_person');
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

		$this->db->from('vendor');
		$this->db->where('id', $id);
		return $this->db->get()->row();
	}



	/**
     * Vendors -> get Vendors enquiry
     * get Vendors enquiry from database
     * url : vendors/view/id
    **/
	public function vendorEnquiry($id='')
	{
		$this->db->from('vendor_enquiry');
		$this->db->where('vendor_id', $id);
		return $this->db->get()->result();
		
	}

	/**
     * Vendors -> get Vendors portfolio
     * get Vendors portfolio from database
     * url : vendors/view/id
    **/
	public function vendorPortfolio($id='')
	{
		$this->db->from('vendor_portfolio');
		$this->db->where('vendor_id', $id);
		return $this->db->get()->result();
		
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

	/**
     * Vendors -> insert Vendors
     * insert new Vendors into db
     * url : vendors/insert
    **/
	public function insert_vendor($insert)
	{
		$this->db->where('uniq', $insert['uniq']);
		$query = $this->db->get('vendor')->row_array();
		if ($query > 0) {
			$this->db->where('uniq', $insert['uniq']);
			 $this->db->update('vendor', $insert);
			return  $query['id'];
		}else{
			$this->db->insert('vendor',$insert);
			$insert_id = $this->db->insert_id();
		  	return  $insert_id;
		}
    }

    /**
     * Vendors -> update vendor details about,specification,tags etc
     * insert Vendors details into db
     * url : vendors/about_insert
    **/
    public function insert_about($insert='',$id='')
    {	

    	$this->db->where('id', $id);
    	$this->db->update('vendor', $insert);
    	if ($this->db->affected_rows() > 0) {
    		return true;
    	}else{
    		return false;
    	}
    }


    /**
     * Vendors -> insert portfolio
     * insert Vendors portfolio into db
     * url : vendors/portfolio_insert
    **/
	public function insert_portfolio($insert)
	{
		$this->db->where('vendor_id', $insert['vendor_id']);
		$query = $this->db->get('vendor_portfolio')->result();

		if (count($query) > 30) {
			return false;
		}else{
			$this->db->insert('vendor_portfolio',$insert);
			$insert_id = $this->db->insert_id();
	  		return  $insert_id;
		}
		
    }

    


    /**
    * Vendors -> block Vendor
    * url : vendors/block/id
    * @param : id
    */
	public function block_vendor($id='',$status='')
	{
		$this->db->where('id', $id);
		$this->db->set('is_active', $status);
		$this->db->update('vendor');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	/**
    * Vendors -> delete Vendor
    * url : vendors/delete/id
    * @param : id
    */
	public function delete($id='')
	{
		$this->imagedelete($id);
		$this->db->where('id', $id);
		$this->db->delete('vendor');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	/**
    * Vendors -> delete portfolio image
    * url : vendors/delete/id
    * @param : id
    */
	public function imagedelete($id='')
	{
		$this->db->select('image, thumb_image');
		$this->db->where('vendor_id', $id);
		$port = $this->db->get('vendor_portfolio')->result();
		foreach ($port as $key => $value) {
			unlink($_SERVER['DOCUMENT_ROOT'].'/shaadibaraati/vendor-portfolio/'.$value->image);
			unlink($_SERVER['DOCUMENT_ROOT'].'/shaadibaraati/vendor-portfolio/'.$value->thumb_image);
		}
		return true;
	}

	/**
    * Vendors -> get portfolio images
    * url : vendors/view/id
    * @param : id
    */
    public function get_portfolio($id='')
	{
		$this->db->where('vendor_id', $id);
		$port = $this->db->get('vendor_portfolio')->result();
		return $port;
	}

	public function get_video($id='')
	{
		$this->db->where('vendor_id', $id);
		return $this->db->get('vendor_video')->result();
	}

	/**
    * Vendors -> add new video 
    * url : vendors/view/id
    * @param : id
    */
	public function add_video($insert='')
	{
		$this->db->where('vendor_id', $insert['vendor_id']);
		$query = $this->db->get('vendor_video')->result();
		if (count($query) < 6 ) {
			return $this->db->insert('vendor_video', $insert);
		}else{
			return false;
		}
	}

	/**
    * Vendors -> add new information service 
    * url : vendors/new-service
    * @param : id
    */
	public function new_service($insert)
	{
		return $this->db->insert('information_service', $insert);
	}


	/**
    * Vendors -> add new information service 
    * url : vendors/add-video
    * @param : id
    */
	public function get_service($id = null)
	{
		$uqid = $this->db->select('uniq')->where('id',$id)->get('category')->row();
		return $this->db->where('category_uniq', $uqid->uniq)->get('information_service')->result();
	}

	public function getSubtitle($servId='',$vendorId='')
	{		
		$this->db->select('subtitle');		
		$this->db->where('vendor_id', $vendorId);
		$this->db->where('information_id', $servId);
		$query = $this->db->get('vendor_infoservice')->row();

		if (!empty($query)) {
			return $query->subtitle;
		}else{
			return false;
		}
		
		
	}



	/**
    * Vendors -> get perticular vendor information service 
    * url : vendors/edit/id
    * @param : id
    */	
	public function vendor_info($id='')
	{
		$this->db->where('vendor_id', $id);
		return $this->db->get('vendor_infoservice')->result();
	}


	public function deletService($id='')
	{
		$this->db->where('vendor_id', $id);
		return $this->db->delete('vendor_infoservice');
	}

	public function service($insert='')
	{
		$this->db->where('vendor_id', $insert['vendor_id']);
		$this->db->where('information_id', $insert['information_id']);
		$query = $this->db->get('vendor_infoservice');
		if ($query->num_rows() > 0) {
			$this->db->where('vendor_id', $insert['vendor_id']);
			$this->db->where('information_id', $insert['information_id']);
			$this->db->update('vendor_infoservice', $insert);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
			
		}else{

			return $this->db->insert('vendor_infoservice', $insert);
			

		}
		
		
	}

	public function gallery_delete($id = '')
	{
		$this->db->where('id', $id);
		$this->db->delete('vendor_portfolio');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function video_delete($id = '')
	{
		$this->db->where('id', $id);
		$this->db->delete('vendor_video');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}



	//  add faq
    public function faq_insert($data)
    {

       $this->db->insert('vendor_faq', $data);
       return true;
    }

	// faq get
	public function vendor_faq($id)
	{
		return $this->db->where('vendor_id',$id )->order_by('id', 'asc')->get('vendor_faq')->result();
		
	}

	// deltefaq
	public function delfaq($id)
	{
		$this->db->where('vendor_id', $id)->delete('vendor_faq');
		return true;
	}
	

	public function vendor_review($id='')
	{
		return $this->db->where('vendor_id', $id)->get('vendor_review')->result();
	}

	public function updateReview($id='',$review='',$vendid='')
	{
		$this->db->where('id', $id)->update('vendor_review', array('review' => $review));
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function reviewdelete($id='')
	{
		return $this->db->where('id', $id)->delete('vendor_review');
	}

	public function offer_image($insert='')
	{
		$this->db->where('vendor_id', $insert['vendor_id']);
		$query = $this->db->get('vendor_offer');
		if ($query->num_rows() > 0) {
			$this->db->where('vendor_id', $insert['vendor_id']);
			$this->db->update('vendor_offer', $insert);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}else{
			return $this->db->insert('vendor_offer', $insert);
		}
	}

	public function vendor_offer($id='')
	{
		return $this->db->where('vendor_id', $id)->get('vendor_offer')->row_array();
	}

	public function get_faq($id = null)
	{
		$uqid = $this->db->select('uniq')->where('id',$id)->get('category')->row();
		
		return $this->db->where('category_id', $uqid->uniq)->get('faq')->result();
	}

	public function fansw($id = null,$vid='')
	{
		$this->db->select('asw');
		$this->db->where('fq_id', $id);
		$this->db->where('vendor_id', $vid);
		return $this->db->get('vendor_faq')->row('asw');	
	}

	public function getPackage($value='')
	{
		return $this->db->get('package')->result();
	}

	public function getCategory($id='')
	{
		return $this->db->where('id',$id)->get('category')->row('category');
	}

	public function getCity($id='')
	{
		return $this->db->where('id',$id)->get('city')->row('city');
	}

	public function packageName($id='')
	{
		return $this->db->where('id',$id)->get('package')->row('title');
	}

	// check and get the proposal details if  exist
	public function saleExist($id='')
	{
		$this->db->where('ven.id', $id);
		$this->db->select('ven.id as vid, ven.name as name ,ven.address, ven.phone as phone , ven.email as email, cty.city as city, cat.category as category,ven.registered_date as regdate,ven.is_active as status,pc.title as package,sd.*');
		$this->db->from('vendor ven');
		$this->db->join('city cty', 'cty.id = ven.city', 'left');
		$this->db->join('package pc', 'pc.id = ven.package', 'left');
		$this->db->join('category cat', 'cat.id = ven.category', 'left');
		$this->db->join('sales_doc sd', 'sd.vendor_id = ven.id', 'left');
		$this->db->order_by('ven.id', 'desc');
		return $this->db->get()->row();
	}

	public function insertProposal($insert='')
	{
		$query = $this->db->where('uniq', $insert['uniq'])->get('sales_doc');
		if ($query->num_rows() > 0) {
			if($this->db->where('uniq', $insert['uniq'])->update('sales_doc',$insert))
			{

				return $this->db->select('v.name, v.phone, v.email, v.price, v.price_for, v.address,  v.price,cat.category, cty.city, sd.*')
				->where('sd.uniq',$insert['uniq'])
				->from('vendor v')
				->join('sales_doc sd', 'sd.vendor_id = v.id', 'left')
				->join('category cat', 'cat.id = v.category', 'left')
				->join('city cty', 'cty.id = v.city', 'left')
				->get()->row();

			}else{
				return false;
			}

		}else{
			if($this->db->insert('sales_doc', $insert))
			{
				return $this->db->select('v.name, v.phone, v.email, v.price, v.price_for, v.address, v.email, v.price, sd.customer_id, sd.*')
				->where('sd.uniq',$insert['uniq'])
				->from('vendor v')
				->join('sales_doc sd', 'sd.vendor_id = v.id', 'left')
				->join('category cat', 'cat.id = v.category', 'left')
				->join('city cty', 'cty.id = v.city', 'left')
				->get()->row();

			}	
		}
	}


	public function pack_insert($insert = null)
	{
		$this->db->where('vendor_id', $insert['vendor_id'])->delete('vendor_package');			
		return $this->db->insert('vendor_package', $insert);
	}

	public function reset_pass($pass='',$eid='')
    {
        return $this->db->where('id', $eid)->update('vendor',array('password' => $pass ));
    }

    public function updateSeo($insert='')
    {
    	$query = $this->db->where('ven_id', $insert['ven_id'])->get('vendor_seo')->row();
    	if (!empty($query)) {
    		return $this->db->where('ven_id', $insert['ven_id'])->update('vendor_seo',$insert);
    	}else{
    		return $this->db->insert('vendor_seo', $insert);
    	}
    }

    public function getvendSeo($id='')
    {
    	return $this->db->where('ven_id', $id)->get('vendor_seo')->row();
    }



	

	

}

/* End of file M_vendors.php */
/* Location: ./application/models/M_vendors.php */