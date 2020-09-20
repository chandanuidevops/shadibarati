<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	/*--construct--*/
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
    }

    /**
     * home-> load view page
     * url : index
    **/
    public function index($value='')
    {
    	$data['title'] = 'Home | Invitation';
        $data['banner'] = $this->m_home->getBanner();
    	$data['product'] = $this->m_home->getProduct();
    	$this->load->view('pages/index', $data);
    }
} 