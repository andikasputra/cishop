<?php 

class M_category extends CI_Model {

	// ambil satu data category
	public function get_detail($where) {
		return $this->db->get_where('categories', $where)->row_array();
	}
}