<?php 

class M_brand extends CI_Model {

	// ambil satu data category
	public function get_detail($where) {
		return $this->db->get_where('brands', $where)->row_array();
	}
}