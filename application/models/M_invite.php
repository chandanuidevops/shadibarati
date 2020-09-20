<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_invite extends CI_Model {

	// insert theme
	public function themeinsert($insert='')
	{
		
		$result = $this->db->where('user_id', $insert['user_id'])->where('status',0)->get('einvite')->row();
		if (!empty($result)) {
			$this->db->where('user_id', $insert['user_id'])->where('status',0)->update('einvite',$insert);
			if ($this->db->affected_rows() > 0) {
				return $result->uniq;
			}else{
				return false;
			}
		}else{
			$this->db->insert('einvite', $insert);
			return $insert['uniq'];
		}
	}

	// get theme
	public function getThemeselect($value='')
	{
		return $this->db->where('user_id', $this->session->userdata('shdid'))->where('status',0)->get('einvite')->row('theme');
	}

	public function getusers($eid='')
	{
		return $this->db->where('user_id', $this->session->userdata('shdid'))->where('uniq',$eid)->get('einvite')->row();
	}

	public function gmUpdate($insert='',$eid='')
	{
		$this->db->where('uniq', $eid);
		$this->db->where('user_id', $this->session->userdata('shdid'));
		return $this->db->update('einvite', $insert);
	}

	public function brdeGroom($value='')
	{
		return $this->db->select('groom,bride')->where('user_id', $this->session->userdata('shdid'))->where('status',0)->get('einvite')->row();
	}

	public function getEvents($eid='')
	{
		$result = $this->db->where('user_id', $this->session->userdata('shdid'))->where('uniq',$eid)->get('einvite')->row('id');
		$query = $this->db->where('invite_id',$result)->get('einvite_event')->result();
		return $query;
	}

	public function eventInsert($insert='',$eid='')
	{
		$result = $this->db->where('user_id', $insert['user_id'])->where('uniq',$eid)->get('einvite')->row('id');
		if (!empty($result)) {
			$insert['invite_id'] = $result;
			$query = $this->db->where('invite_id',$result)->get('einvite_event')->result();
			if ((count($query)) < 2) {
				if($this->db->insert('einvite_event', $insert))
				{
					return $query;
				}else{
					return false;
				}
			}else{
				return $query;
			}
			
		}else{
			return false;
		}
	}

	public function getfamily($eid='')
	{
		$result = $this->db->where('user_id', $this->session->userdata('shdid'))->where('uniq',$eid)->get('einvite')->row('id');
		return $this->db->where('invite_id',$result)->get('e_invite_family')->result();
	}

	public function getfamilys($user_id='')
	{
		$result = $this->db->where('user_id', $this->session->userdata('shdid'))->where('status',0)->get('einvite')->row('id');
		return $this->db->where('invite_id',$result)->get('e_invite_family')->result();
	}


	public function familyInsert($insert='',$eid)
	{
		$result = $this->db->where('user_id', $insert['user_id'])->where('uniq',$eid)->get('einvite')->row('id');
		if (!empty($result)) {
			$insert['invite_id'] = $result;
			if($this->db->insert('e_invite_family', $insert))
			{
				return $this->db->where('invite_id',$result)->get('e_invite_family')->result();
			}else{
				return false;
			}
		}else{
			return false;
		}
	}

	public function insertGallery($insert='',$eid='')
	{
		$result = $this->db->where('user_id', $insert['user_id'])->where('uniq',$eid)->get('einvite')->row('id');
		if (!empty($result)) {
			$insert['invite_id'] = $result;
			if($this->db->insert('e_invitegallery', $insert)){
				return true;
			}else{
				return false;
			}
		}else{
			return false;
		}
	}
	public function getGlarys($eid='')
	{
		$result = $this->db->where('user_id', $this->session->userdata('shdid'))->where('uniq',$eid)->get('einvite')->row('id');
		return $this->db->where('invite_id',$result)->get('e_invitegallery')->result();
	}


	public function getGlary($user_id='')
	{
		$result = $this->db->where('user_id', $this->session->userdata('shdid'))->where('status',0)->get('einvite')->row('id');
		return $this->db->where('invite_id',$result)->get('e_invitegallery')->result();
	}

	public function getWebsite($user_id='')
	{
		return $this->db->where('user_id', $user_id)->where('status',1)->get('einvite')->result();
	}

	public function myWebsite($id='')
	{
		return $this->db->where('id', $id)->where('status',1)->get('einvite')->row();
	}

	public function getGallery($id='')
	{
		return $this->db->where('invite_id',$id)->get('e_invitegallery')->result();
	}

	public function getEvent($id='')
	{
		return $this->db->where('invite_id',$id)->get('einvite_event')->result();
	}

	public function getFam($id='')
	{
		return $this->db->where('invite_id',$id)->get('e_invite_family')->result();
	}

	public function getUniq($value='')
	{
		return $this->db->where('user_id', $this->session->userdata('shdid'))->where('status',0)->get('einvite')->row('uniq');
	}

	public function getEven($user_id='')
	{
		$result = $this->db->where('user_id', $this->session->userdata('shdid'))->where('status',0)->get('einvite')->row('id');
		$query = $this->db->where('invite_id',$result)->get('einvite_event')->result();
		return $query;
	}




	

}

/* End of file M_invite.php */
/* Location: ./application/models/M_invite.php */