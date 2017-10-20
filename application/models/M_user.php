<?php

class M_user extends CI_Model {
	public function insert($params) {
		return $this->db->insert('users', $params);
	}
}