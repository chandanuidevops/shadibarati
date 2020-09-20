<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_content extends CI_Model {

	public function contentGet($value='')
	{
		$this->db->select('cc.id, cc.city_id, cc.category_id, cty.city,cat.category,cc.description, cc.uniq');
		$this->db->from('category_content cc');
		$this->db->join('category cat', 'cat.id = cc.category_id', 'left');
        $this->db->join('city cty', 'cty.id = cc.city_id', 'left');
        return $this->db->order_by('cc.id', 'desc')->get()->result();
	}

	public function insert($insert='')
	{
		$query = $this->db->where('city_id', $insert['city_id'])->where('category_id',$insert['category_id'])->get('category_content')->row();
		if (!empty($query)) {
			$this->db->where('city_id', $insert['city_id'])->where('category_id',$insert['category_id'])->update('category_content',$insert);
			if ($this->db->affected_rows() > 0) {
				return true;
			}else{
				return false;
			}
		}else{
			return $this->db->insert('category_content', $insert);
		}
	}

	public function edit($id='')
	{
		$this->db->where('cc.uniq', $id);
		$this->db->select('cc.id, cc.city_id, cc.category_id, cty.city,cat.category,cc.description, cc.uniq,cc.title,cc.canoncial,cc.keywords,cc.meta_desc,cc.key1,cc.key2,cc.key3,cc.key4,cc.key5');
		$this->db->from('category_content cc');
		$this->db->join('category cat', 'cat.id = cc.category_id', 'left');
        $this->db->join('city cty', 'cty.id = cc.city_id', 'left');
        return $this->db->order_by('cc.id', 'desc')->get()->row();
	}

	public function update($insert,$id)
	{
		$this->db->where('id', $id)->update('category_content',$insert);
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

	public function delete($id='')
	{
		$this->db->where('uniq', $id)->delete('category_content');
		if ($this->db->affected_rows() > 0) {
			return true;
		}else{
			return false;
		}
	}

}

/* End of file M_content.php */
/* Location: ./application/models/M_content.php */