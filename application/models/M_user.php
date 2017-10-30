<?php

class M_user extends CI_Model {

	// get detail user by parameter
	public function get_detail_user($where) {
		return $this->db->get_where('users', $where)->row_array();
	}

	// insert user
	public function insert($params) {
		return $this->db->insert('users', $params);
	}
}