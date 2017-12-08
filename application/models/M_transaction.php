<?php 
class M_transaction extends CI_Model {
	// get list data transaksi
	public function get_list_trx($where) {
		$this->db->join('address a', 'a.address_id = b.address_id');
		$this->db->join('transaction_items c', 'c.tran_id = b.tran_id');
		$this->db->group_by('b.tran_id');
		$this->db->select('*, sum(c.item_selling_price) as price');
		return $this->db->get_where('transactions b', $where)->result_array();
	}
	// get detail data transaksi
	public function get_detail_transaction($where) {
		$this->db->join('address a', 'a.address_id = b.address_id');
		return $this->db->get_where('transactions b', $where)->row_array();
	}
	// get list transaction item
	public function get_list_item($where) {
		$this->db->join('products a', 'a.product_id = b.product_id');
		return $this->db->get_where('transaction_items b', $where)->result_array();
	}
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