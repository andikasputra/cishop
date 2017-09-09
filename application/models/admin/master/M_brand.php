<?php 
class M_brand extends CI_Model {

	// ambil semua data brand
	public function get_all_data() {
		return $this->db->get('brands')->result_array();
	}

	// insert data brand
	public function insert($params) {
		return $this->db->insert('brands', $params);
	}
}