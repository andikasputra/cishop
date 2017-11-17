<?php 
class M_transaction extends CI_Model {
	// insert
	public function insert($params) {
		$this->db->insert('transactions', $params);
		return $this->db->insert_id();
	}
	// insert item
	public function insert_item($params) {
		return $this->db->insert('transaction_items', $params);
	}
}