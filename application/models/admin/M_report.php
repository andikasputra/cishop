<?php 

class M_report extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	// get list tahun pembayaran + tahun sekarang
	public function get_all_tahun() {
		$sql = "SELECT DISTINCT(tahun) AS tahun
				FROM (
					SELECT YEAR(payment_date) AS tahun
					FROM payments
					UNION ALL
					SELECT YEAR(CURRENT_DATE) AS tahun
				) AS tahun_payment
				ORDER BY tahun DESC";
		return $this->db->query($sql)->result_array();
	}

	public function get_all_penjualan($bulan, $tahun, $nama) {
		$this->db->select('a.*, b.*, c.*, d.payment_name, d.payment_total, d.payment_date, d.payment_attachment, d.payment_status, COUNT(e.item_id) AS jumlah, SUM(e.item_selling_price) AS total');
		$this->db->from('transactions a');
		$this->db->join('address b', 'a.address_id = b.address_id');
		$this->db->join('users c', 'b.user_id = c.user_id');
		$this->db->join('payments d', 'a.tran_id = d.tran_id', 'left');
		$this->db->join('transaction_items e', 'a.tran_id = e.tran_id');
		$this->db->where(array('payment_status' => 'done'));
		$this->db->like("DATE_FORMAT(payment_date, '%m')", $bulan);
		$this->db->like("DATE_FORMAT(payment_date, '%Y')", $tahun);
		$this->db->like("address_prov", $nama);
		$this->db->group_by('a.tran_id');
		return $this->db->get()->result_array();
		// echo $this->db->last_query();
	}
}