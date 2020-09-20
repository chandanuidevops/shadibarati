<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_seo extends CI_Model {

	public function seoData($page='')
	{
		return $this->db->get('seo')->result();
	}

	

}

/* End of file M_seo.php */
/* Location: ./application/models/M_seo.php */