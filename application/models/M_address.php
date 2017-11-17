<?php 

class M_address extends CI_Model {
	// insert
	public function insert($params) {
		$this->db->insert('address', $params);
		return $this->db->insert_id();
	}
}