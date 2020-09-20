<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_vendorDetail extends CI_Model {

	    /*
     *Home-> get cities
     **/
    public function getVendors($uniqid='')
    {

        $this->db->select('v.id,v.is_active,v.name,v.phone,v.email,v.price,v.price_for,v.address,v.profile_file,v.detail,v.policy,v.tags,v.specification,v.location,v.uniq,cty.city,cat.category,cty.id as cityId, cat.id as catId');
        $this->db->group_start();
        	$this->db->where('v.is_active', '3');
        	$this->db->or_where('v.is_active', '1');
        $this->db->group_end();
        $this->db->where('v.uniq', $uniqid);
        $this->db->from('vendor v');
        $this->db->join('city cty', 'cty.id = v.city', 'left');
        $this->db->join('category cat', 'cat.id = v.category', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

        //vue js phone check exist or not
    public function phone_check($phone='')
    {
        $this->db->where('phone', $phone);
        $result = $this->db->get('vendor');
           if($result->num_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    public function phone_user($email = null)
    {
    $this->db->where('su_phone', $email);
    $result = $this->db->get('user');
       if($result->num_rows() > 0){
        return 2;
    }else{
        return false;
    }
    }


       //vue js phone check exist or not
       public function email_check($email='')
       {
           $this->db->where('email', $email);
           $result = $this->db->get('vendor');
              if($result->num_rows() > 0){
               return true;
           }else{
               return false;
           }
       }


       public function email_user($email = null)
       {
        $this->db->where('su_email', $email);
        $result = $this->db->get('user');
           if($result->num_rows() > 0){
            return 2;
        }else{
            return false;
        }
       }


       public function addOtp($email='',$otp='')
       {
           return $this->db->where('email', $email)->update('vendor', array('reference_id' => $otp));
       }

    /**
    * Vendors -> add new information service 
    * url : vendors/add-video
    * @param : id
    */
    public function getService($id = null)
    {
        $uqid = $this->db->select('uniq')->where('id',$id)->get('category')->row();
        return $this->db->where('category_uniq', $uqid->uniq)->get('information_service')->result();
    }

    /*
     *vendor detail-> fetch all video
    **/
    public function getVideo($id='')
    {
        $this->db->where('vendor_id', $id);
        $this->db->limit(6);
        return $this->db->get('vendor_video')->result();
    }

    //get review details
    public function getReview($id='')
    {
       $this->db->where('vendor_id', $id);
       $this->db->where('status', '1');
       $this->db->order_by('id', 'desc');
       return $this->db->get('vendor_review')->result();
    }

        // getuserreview
    public function getuserReview($id)
    {
        $this->db->where('vendor_id', $id);
        $this->db->where('status', '1');
        $this->db->where('user_id', $this->session->userdata('shdid'));
        return $this->db->get('vendor_review')->row();
    }

        //get favourite
    public function getFavourite($vendorid='')
    {
        $this->db->select('status');
        $this->db->where('vendor_id', $vendorid);
        $this->db->where('user_id', $this->session->userdata('shdid'));
        $ouput = $this->db->get('shortlist_vendor')->row();
        if (!empty($ouput)) {
        	return $ouput->status;
        }else{
        	return false;
        }
    }

        //  add faq
    public function faq($id)
    {
        $uqid = $this->db->select('uniq')->where('id',$id)->get('category')->row('uniq');
        $this->db->where('category_id', $uqid)->order_by('id', 'asc');        
        return $this->db->get('faq')->result();
        
    }

    public function offer($id='')
    {
        $this->db->where('vendor_id', $id);
        return $this->db->get('vendor_offer')->row();
    }

    public function similarVendors($city='',$category='',$id='')
    {    

        $this->db->where('v.id !=', $id);
        $this->db->select('v.package,v.id,v.name,v.phone,v.email,v.price,v.address,v.price_for,v.profile_file,v.detail,v.policy,v.tags,v.specification,v.location,v.uniq,cty.city,cat.category,cty.id as cityId, cat.id as catId');
        $this->db->where('v.city', $city);
        $this->db->where('v.category', $category); 
        $this->db->where('v.is_active', '1');

        $this->db->protect_identifiers = FALSE;
            $this->db->order_by('FIELD ( v.package, "Wed Elite", "Wed Leader", "Wed Assisted", "Wed Gold", "Wed Premium", "Wed Featured", "Free Listing", "")');
        $this->db->protect_identifiers = TRUE;

        $this->db->from('vendor v');
        $this->db->join('city cty', 'cty.id = v.city', 'left');
        $this->db->join('category cat', 'cat.id = v.category', 'left');
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
        
    }

    public function insertPrice($price,$uniq)
    {
    	$this->db->where('uniq', $uniq)->update('vendor',array('price' =>$price));
    	if ($this->db->affected_rows() > 0) {
    		return $price;
    	}else{
    		return false;
    	}
    }

    public function contactPerson($c_person='',$uniq='')
    {
        $this->db->where('uniq', $uniq)->update('vendor',array('c_person' =>$c_person));
        if ($this->db->affected_rows() > 0) {
            return $c_person;
        }else{
            return false;
        }
    }

    public function pricePer($per='',$uniq='')
    {
    	$this->db->where('uniq', $uniq)->update('vendor',array('price_for' =>$per));
    	if ($this->db->affected_rows() > 0) {
    		return $per;
    	}else{
    		return false;
    	}
    }

    public function address($vaddress,$uniq)
    {
    	$this->db->where('uniq', $uniq)->update('vendor',array('address' =>$vaddress));
    	if ($this->db->affected_rows() > 0) {
    		return $vaddress;
    	}else{
    		return false;
    	}
    }


    public function banner($banner='',$img='',$uniq='')
    {
        $this->db->where('uniq', $uniq)->update('vendor',array('profile_file' =>$banner,'img'=>$img));
        if ($this->db->affected_rows() > 0) {
            return $banner;
        }else{
            return false;
        }
    }

    	/**
	*Change pasword -> Update New password
	* @url : change-password
	*/
	public function changepass($id,$npass)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('vendor');
		if($query->num_rows() > 0)
		{
			$this->db->where('id', $id);
			$this->db->update('vendor',  array('password' =>$npass));
			if ($this->db->affected_rows() > 0)
			{
				return true;
			}else{

				return false;
			}
		} else {
			return false;
		}
	}

    public function profileImg($id='')
    {
        return $this->db->where('id', $id)->get('vendor')->row('profile_file');
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


    public function insertAbout($about,$uniq)
    {
        $this->db->where('uniq', $uniq)->update('vendor',array('detail' =>$about));
        if ($this->db->affected_rows() > 0) {
            return $about;
        }else{
            return false;
        }
    }



    

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

    public function faq_insert($insert='')
    {
        $query = $this->db->where('fq_id', $insert['fq_id'])->where('vendor_id', $insert['vendor_id'])->get('vendor_faq');
        if ($query->num_rows() > 0) {
            return $this->db->where('fq_id', $insert['fq_id'])->where('vendor_id', $insert['vendor_id'])->update('vendor_faq', $insert);
        }else{
            return $this->db->insert('vendor_faq', $insert);
        }
    }

    public function getAnswer($vid='',$fid='')
    {
        return $this->db->where('vendor_id', $vid)->where('fq_id', $fid)->get('vendor_faq')->row('asw');
    }

    public function getSubtitle($servId='',$vendorId='')
    {
        return $this->db->where('vendor_id', $vendorId)->where('information_id', $servId)->get('vendor_infoservice')->row('subtitle');
    }

    public function serviceAdd($insert='')
    {
        $query = $this->db->where('information_id', $insert['information_id'])->where('vendor_id', $insert['vendor_id'])->get('vendor_infoservice');
        if ($query->num_rows() > 0) {
            return $this->db->where('information_id', $insert['information_id'])->where('vendor_id', $insert['vendor_id'])->update('vendor_infoservice', $insert);
        }else{
            return $this->db->insert('vendor_infoservice', $insert);
        }
    }

    public function get_portfolio($id='')
    {
        return $this->db->where('vendor_id', $id)->get('vendor_portfolio')->result();
        
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

    public function offer_delete($id = '')
    {
        $this->db->where('id', $id);
        $this->db->delete('vendor_offer');
        if ($this->db->affected_rows() > 0) {
            return true;
        }else{
            return false;
        }
    }

    public function reviewsGet($vid='',$limit='',$page='')
    {
        if (!empty($limit) && $limit <= 250) {
            $this->db->limit($limit, $page);
        }
        $this->db->where('vr.vendor_id', $vid)->select('u.su_name,u.su_email,vr.review,vr.rating,vr.added_date')->from('vendor_review vr')->join('user u', 'u.su_id = vr.user_id', 'left');
        return $this->db->get()->result();
    }


    public function rowsCount($vid='',$limit='')
    {
        $this->db->where('vr.vendor_id', $vid)->select('u.su_name,u.su_email,vr.review,vr.rating,vr.added_date')->from('vendor_review vr')->join('user u', 'u.su_id = vr.user_id', 'left');
        return $this->db->get()->result();
    }


    public function enquiryGet($vid='',$id='')
    {
        if (!empty($id)) {
           $this->db->where('id', $id);
        }
        return $this->db->where('vendor_id', $vid)->get('vendor_enquiry')->result();
    }

    public function leadscount($vid = null)
    {
        return $this->db->where('vendor_id', $vid)->where('status', '0')->get('vendor_enquiry')->num_rows();
    }


    


}

/* End of file M_vendorDetail.php */
/* Location: ./application/models/M_vendorDetail.php */