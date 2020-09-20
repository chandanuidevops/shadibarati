<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_enquiry extends CI_Model {

	//get enquiries
	public function getEnquiry($value='')
	{
		return $this->db->order_by('id', 'desc')->get('contact')->result();
	}

	public function view($id='')
	{
		return $this->db->where('id', $id)->get('contact')->row();
	}

		//get enquiries
	public function getfreequote($value='')
	{
		return $this->db->order_by('id', 'desc')->get('quoterequest')->result();
	}

	public function quoteview($id='')
	{
		return $this->db->where('id', $id)->get('quoterequest')->row();
	}

	public function newsletter($value='')
	{
		return $this->db->order_by('id', 'desc')->get('newsletter')->result();
	}

	public function testimonial($id)
	{
		if(!empty($id)){
			$this->db->where('id', $id);
		}
		return $this->db->order_by('status', 'desc')->get('feedback')->result();
	}

	// testimonila status update
	public function testimonial_status($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('feedback', $data);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}	
	}

	public function feedback($id)
	{
		if(!empty($id)){
			$this->updateStatus($id);
			$this->db->where('id', $id);
		}
		return $this->db->order_by('status', 'desc')->get('user_feedback')->result();
	}

	
	function updateStatus($id = null)
	{
		$this->db->where('id', $id);
		$this->db->update('user_feedback',  array('status' => '1' ));
	}
	

	

}

/* End of file M_enquiry.php */
/* Location: ./application/models/M_enquiry.php */