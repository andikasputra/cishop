<?php 

class M_category extends CI_Model {

	// ambil semua kategori
	public function get_all_categories() {
		return $this->db->get('categories')->result_array();
	}

	// ambil satu data category
	public function get_detail($where) {
		return $this->db->get_where('categories', $where)->row_array();
	}
}