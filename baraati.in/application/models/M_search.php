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
        $this->db->select('v.name,v.package, v.phone,cty.city,cat.category,v.price,v.profile_file,v.id,v.uniq,v.price_for,');
        // $this->db->select('v.package');
        $this->db->protect_identifiers = FALSE;
            $this->db->order_by('FIELD ( v.package, "Wed Elite", "Wed Leader", "Wed Assisted", "Wed Gold", "Wed Premium", "Wed Featured", "Free Listing", "")');
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
            return $value->rating;
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



}

/* End of file M_search.php */
/* Location: ./application/models/M_search.php */