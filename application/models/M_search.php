<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_search extends CI_Model {

	/*
     *Home-> get cities
     **/
    public function getSearch($city='',$category='',$limit='',$start='')
    {

        if (!empty($city) && $city !='All') { $this->db->where('cty.city', $city); }
        if (!empty($category) && $category !='all category') {$this->db->where('cat.category', $category); }
        $this->db->where('v.is_active', '1');
        $this->db->select('v.name,v.package,v.discount_status, v.phone,cty.city,cat.category,v.price,v.profile_file,v.id,v.uniq,v.price_for,v.verified,v.v_chat ,');
        // $this->db->select('v.package');
        $this->db->protect_identifiers = FALSE;
            $this->db->order_by('v.discount_status', 'desc');
            $this->db->order_by('FIELD ( v.package, "3", "4", "5", "6", "7", "8", "0", "")');
            $this->db->order_by('v.rating', 'desc');
        $this->db->protect_identifiers = TRUE;


        $this->db->from('vendor v');
        $this->db->join('city cty', 'cty.id = v.city', 'left');
        $this->db->join('category cat', 'cat.id = v.category', 'left');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

    // sort data
    public function sortresult($data = null)
    {
        // $sordatedata = 
        $count = 0; $wedElite = array(); $wedLeader = array(); $wedAssisted = array(); $wedGold = array(); $wedPremium = array(); $wedFeatured = array();
        foreach ($data as $key => $value) {
            switch ($value->package) {
                case 'Wed Elite':
                    $wedElite[] = $value;
                    break;

                case 'Wed Leader':
                    $wedLeader[] = $value;
                    break;

                case 'Wed Assisted':
                    $wedAssisted[] = $value;
                    break;

                case 'Wed Gold':
                    $wedGold[] = $value;
                    break;

                case 'Wed Premium':
                    $wedPremium[] = $value;
                    break;

                case 'Wed Featured':
                    $wedFeatured[] = $value;
                    break;

                default:
                    $wedfree[] = $value;
                    break;
            }

            $count += 1;
        }
        
       return  $newArray = array_merge($wedElite, $wedLeader, $wedAssisted,  $wedGold,  $wedPremium, $wedFeatured,  $wedfree);

    }

    //get total rows count for pagination
    public function rowsCount($city='',$category='')
    {
        if (!empty($city) && $city !='All') { $this->db->where('cty.city', $city); }
        if (!empty($category) && $category !='all category') {$this->db->where('cat.category', $category); }
        $this->db->where('v.is_active', '1');
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

    //get review count in instant
    public function countReview($id='')
    {
    	$this->db->where('vendor_id', $id);
    	$query = $this->db->get('vendor_review');
        if ($query->num_rows() > 0) {
            $result =  $query->result();
            return count($result);
        } else {
            return 0;
        }
    }

    public function avgrating($id = '')
    {      
        $this->db->select_avg('rating');
        $this->db->where('vendor_id', $id);  
        $query = $this->db->get('vendor_review');
        foreach ($query->result() as $key => $value) {
        if (!empty($value->rating)) {
            return round($value->rating);
        }else{
            return 0;
        }
        }
    }



    //search autocompletee
    public function get_search($vendor='')
    {
        $this->db->select('v.*,cty.city as cityname,cat.category as categoryname');
        $this->db->where('v.is_active', '1');
    	$this->db->like('v.name', $vendor, 'BOTH');
		$this->db->limit(20);
        $this->db->from('vendor v');
        $this->db->join('city cty', 'cty.id = v.city', 'left');
        $this->db->join('category cat', 'cat.id = v.category', 'left');
        $query = $this->db->get();
		if($query->num_rows() > 0)
		{
			return $query->result();
		}else{
			return false;
		}
    }

    //get single city name
    public function SingleCity($id = null)
    {
        $this->db->select('city');
        $this->db->where('id', $id);
        return $this->db->get('city')->row_array();
    }

    //get single category name name
    public function SingleCategory($id = null)
    {
        $this->db->select('category');
        $this->db->where('id', $id);
        return $this->db->get('category')->row_array();
    }

    public function getSubtitle($vendorid,$serviceid)
    {
        $this->db->select('subtitle');		
		$this->db->where('vendor_id', $vendorid);
		$this->db->where('information_id', $serviceid);
		$query = $this->db->get('vendor_infoservice')->row();

		if (!empty($query)) {
			return $query->subtitle;
		}else{
			return false;
		}
       
    }

    public function catviseresult($city='')
    {
        
        $cityId = '';
        if (!empty($city)) {
            $cityId = $this->db->where('city', ucwords(str_replace("-"," ",$city)))->get('city')->row('id');
        }
      $result = vendor_category();
      foreach ($result as $key => $value) {
        $this->db->group_by('name');
        $value->vendors = $this->getVendors($value->id,$cityId);
      }
      return  $result;
    }

    // get vendors
    public function getVendors($id = null,$cityId='')
    {

        if (!empty($cityId)) {
           $this->db->where('v.city', $cityId);
        }
        $this->db->select('v.name,v.package,v.discount_status, v.phone,cty.city,,v.price,v.profile_file,v.id,v.uniq,v.price_for,v.verified,v.v_chat'); 
        $this->db->where('v.category', $id);
        $this->db->protect_identifiers = FALSE;
            $this->db->order_by('v.discount_status', 'desc');
            $this->db->order_by('FIELD ( v.package, "3", "4", "5", "6", "7", "8", "0", "")');
            $this->db->order_by('v.rating', 'desc');
        $this->db->protect_identifiers = TRUE;
        $this->db->from('vendor v');
        $this->db->join('city cty', 'cty.id = v.city', 'left');
        $this->db->join('vendor_review vr', 'vr.vendor_id = v.id', 'left');
        $this->db->limit(4);
        return $this->db->get()->result();
    }



    public function packageName($id='')
    {
       return $this->db->where('id', $id)->get('package')->row('title');
    }

        //get banner
    public function bannerGet($city = '',$category='')
    {
        $this->db->where('cty.city', $city);
        $this->db->where('cat.category', $category);
        $this->db->select('cb.id, cb.city_id, cb.category_id,  cb.image, cty.city, cb.city_id, cb.uniq, cb.category_id, cat.category');
        $this->db->limit(10);
        $this->db->from('category_banner cb');        
        $this->db->join('category cat', 'cat.id = cb.category_id', 'left');
        $this->db->join('city cty', 'cty.id = cb.city_id', 'left');
        return $this->db->order_by('cb.id', 'desc')->get()->result();    
    }

    public function conentGet($city = '',$category='')
    {

        if (!empty($city) && $city =='All') {
            $this->db->where('cc.city_id', 'all');
        }else{
            $this->db->where('cty.city', $city);
        }

        if (!empty($category) && $category =='all category') {
            $this->db->where('cc.category_id', 'all');
        }else{
            $this->db->where('cat.category', $category);
        }
        
        $this->db->select('cc.id, cc.city_id, cc.category_id, cty.city,cat.category,cc.description, cc.uniq,cc.title,cc.canoncial,cc.keywords,cc.meta_desc,cc.key1,cc.key2,cc.key3,cc.key4,cc.key5');
        $this->db->from('category_content cc');
        $this->db->join('category cat', 'cat.id = cc.category_id', 'left');
        $this->db->join('city cty', 'cty.id = cc.city_id', 'left');
        return $this->db->get()->row();
    }

    //get footer category
    public function footGet($city = '',$category='')
    {

        if (!empty($city) && $city =='All') {
            $this->db->where('fc.city', 'all');
        }else{
            $this->db->where('cty.city', $city);
        }
        if (!empty($category) && $category =='all category') {
            $this->db->where('fc.category', 'all');
        }else{
            $this->db->where('cat.category', $category);
        }
        
        $this->db->select('fc.id,fc.type,fc.link, fc.vendor_category,fc.popular,fc.seggregation,cat.category,cty.city,fc.city as cityId,fc.category as categoryId');
        $this->db->from('footer_category fc');
        $this->db->join('category cat', 'cat.id = fc.category', 'left');
        $this->db->join('city cty', 'cty.id = fc.city', 'left');
        return $this->db->get()->result();
    }

}

/* End of file M_search.php */
/* Location: ./application/models/M_search.php */