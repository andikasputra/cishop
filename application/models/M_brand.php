<?php 

class M_brand extends CI_Model {

	// ambil semua brands
	public function get_all_brands() {
		return $this->db->get('brands')->result_array();
	}

	// ambil satu data category
	public function get_detail($where) {
		return $this->db->get_where('brands', $where)->row_array();
	}
}