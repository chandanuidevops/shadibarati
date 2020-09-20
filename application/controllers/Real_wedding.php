<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Real_wedding extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        //Do your magic here
        $this->load->model('m_real');
        $this->load->model('m_home');
        $this->load->library('pagination');
	}


	/**
     * real-weding-> load view page
     * url : base_url
    **/
	
    public function real_wedding($page='')
    {
        $per_page = 6;
        $data['title']  = 'ShaadiBaraati | Real Wedding';
        $data['records'] = $this->m_real->getProfile($per_page, $page);
        $rows = $this->m_real->getCount();

        $config['base_url'] = base_url().'real-wedding/';
        $config['total_rows'] = $rows;
		$config['per_page'] =$per_page;
		$config['reuse_query_string'] = TRUE;
        $config['num_links'] = 5;
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
        $this->load->view('real/real-wedding', $data);
    }
    public function real_wedding_detail($title='',$id='')
    {
        $data['title']      = 'ShaadiBaraati | Real Wedding Detail';  
        $data['related']    = $this->m_real->relatedWedding($id); 
        $data['rname']      = $this->m_real->rname($id);
        $this->load->view('real/real-wedding-detail',$data);
    }

    public function gallery($var = null)
    {
        $id = $this->input->post('gal_id');
        $output = $this->m_real->getGallery($id);
        if(!empty($output)){
            foreach ($output as $key => $value) {
              $data[] = base_url().$value->image;
          }
          
        }else{
          $data = '';
        }
         echo json_encode($data);
    }

}

/* End of file Controllername.php */
