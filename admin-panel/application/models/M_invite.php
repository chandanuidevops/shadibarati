<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_invite extends CI_Model {

	public function getinvite($value='')
	{
		$this->db->from('einvite e');
		$this->db->join('user u', 'u.su_id = e.user_id', 'left');
		return $this->db->order_by('e.id', 'desc')->get()->result();
	}

}

/* End of file M_invite.php */
/* Location: ./application/models/M_invite.php */