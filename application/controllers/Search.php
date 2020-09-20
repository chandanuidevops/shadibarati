<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
        //Do your magic here
		$this->load->model('m_search');
		$this->load->model('m_home');
		$this->load->library('form_validation');
		$this->load->library('pagination');
    }


    /**
     * search-> get search result with pagination
     * url : vendors/search
    **/
	public function index($city='',$category='',$page='')
	{
		$key = $this->input->post('key');
		if (empty($city)) {
			
        	$city = 'all'; 
        }
        if (empty($category)) {
        	$category = 'all-category'; 
		}
		$data['title']      = 'Vendors - ShaadiBaraati';
		if($city == 'all' && $category == 'all-category'){
			$data['vendors'] = $this->m_search->catviseresult();
			$data['content'] = $this->m_search->conentGet(ucwords(str_replace("-"," ",$city)),str_replace("-"," ",$category));
			$data['foot'] = $this->m_search->footGet(ucwords(str_replace("-"," ",$city)),str_replace("-"," ",$category));
			$this->load->view('vendors/category', $data, FALSE);
		} else if($city != 'all' && $city !='' && $category == 'all-category'){
			$data['vendors'] = $this->m_search->catviseresult($city);
			$data['content'] = $this->m_search->conentGet(ucwords(str_replace("-"," ",$city)),str_replace("-"," ",$category));
			$data['foot'] = $this->m_search->footGet(ucwords(str_replace("-"," ",$city)),str_replace("-"," ",$category));
			$this->load->view('vendors/category', $data, FALSE);
		} else{
			$per_page = 40;
			$rows = $this->m_search->rowsCount(ucwords(str_replace("-"," ",$city)),str_replace("-"," ",$category));
			$data['vendors']    = $this->m_search->getSearch(ucwords(str_replace("-"," ",$city)),str_replace("-"," ",$category),$per_page,$page);

			$config['base_url'] = base_url().'vendors/'.$city.'/'.$category;
			$config['total_rows'] = (!empty($rows)? count($rows) : '0');
			$config['per_page'] = 40;
			$config['reuse_query_string'] = TRUE;
			$config['num_links'] = 15;
			$config['full_tag_open'] = '<div class="center-align"><ul class="pagination">';
			$config['full_tag_close'] = '</ul></div>';

			$config['num_tag_open']     = '<li ><span class="waves-effect">';
			$config['num_tag_close']    = '</span></li>';

			$config['cur_tag_open']     = '<li class="active"><a class="waves-effect">';
			$config['cur_tag_close']    = '</a></li>';

			$config['next_tag_open']    = '<li class="next"> <a href="#" title=""> ';
			$config['next_tag_close']   = '</a></li>';
			$config['next_link']        = '<i class="material-icons">chevron_right</i>';

			$config['prev_tag_open']    = '<li class="prev"> <a href="#" title=""> ';
			$config['prev_tag_close']   = '</a></li>';
			$config['prev_link']        = '<i class="material-icons">chevron_left</i>';

			$config['first_tag_open']   = '<li class=""><span class="">';
			$config['first_tag_close']  = '</span></li>';
			$config['first_link']        = FALSE;

			$config['last_tag_open']    = '<li class=""><span class="">';
			$config['last_tag_close']   = '</span></li>';
			$config['last_link']        = FALSE;

			$this->pagination->initialize($config);
			$data['pagelink'] 	= $this->pagination->create_links();

			// $data['city']       = $this->m_home->getCity();
			// $data['category']   = $this->m_home->getCategory();

			$data['banner'] = $this->m_search->bannerGet(ucwords(str_replace("-"," ",$city)),str_replace("-"," ",$category));
			$data['content'] = $this->m_search->conentGet(ucwords(str_replace("-"," ",$city)),str_replace("-"," ",$category));
			$data['foot'] = $this->m_search->footGet(ucwords(str_replace("-"," ",$city)),str_replace("-"," ",$category));
			$this->load->view('vendors/result', $data, FALSE);
		}
	}


	//vendor autoload
	public function vendorcheck($value='')
	{
		$data='';
		$vendor = $this->input->post('vendor');
		$result = $this->m_search->get_search(trim($vendor));
		if (!empty($result)) {
			foreach ($result as $key => $value) {
				$city 		= $this->m_search->SingleCity($value->city);
				$category 	= $this->m_search->SingleCategory($value->category);
				$data .= '<li class="sg-result-list left-align">';
				$data .= '<a href="'.base_url().str_replace(" ","-",strtolower($value->categoryname)).'/'.str_replace(" ","-",strtolower($value->cityname)).'/'.str_replace(" ","-",strtolower($value->name)).'/'.$value->uniq.'">
					<div class="vendor-inf">
						<div class="row m0">
							<div class="left">
								<img src="'.base_url().$value->profile_file.'" width="80">
							</div>
							<div class="left ml15">
								<p class="m0 black-text">'.$value->name.'</p>
								<p class="auto-loc-cat">'.(!empty($category['category'])?$category['category'].',  ':'') .$city['city'].'</p>
							</div>
						</div>
					</div>
				 </a>';
				$data .= '</li>';
			}
		}else{
			$data .= $result;
		}

		echo $data;
	}

	








}

/* End of file Search.php */
/* Location: ./application/controllers/Search.php */