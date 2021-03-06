<?php

class M_transaction extends CI_Model {
	// get all transaction
	public function get_all_transaction() {
		$this->db->select('a.*, b.*, c.*, d.payment_name, d.payment_total, d.payment_date, d.payment_attachment, d.payment_status, COUNT(e.item_id) AS jumlah, SUM(e.item_selling_price) AS total');
		$this->db->from('transactions a');
		$this->db->join('address b', 'a.address_id = b.address_id');
		$this->db->join('users c', 'b.user_id = c.user_id');
		$this->db->join('payments d', 'a.tran_id = d.tran_id', 'left');
		$this->db->join('transaction_items e', 'a.tran_id = e.tran_id');
		$this->db->group_by('a.tran_id');
		return $this->db->get()->result_array();
	}

	public function update_transaction($params, $where) {
		return $this->db->update('transactions', $params, $where);
	}

	public function update_payment($params, $where) {
		return $this->db->update('payments', $params, $where);
	}
}