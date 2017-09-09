<?php 
class M_category extends CI_Model {

	// ambil semua data category
	public function get_all_data() {
		return $this->db->get('categories')->result_array();
	}

	// insert data category
	public function insert($params) {
		return $this->db->insert('categories', $params);
	}
}