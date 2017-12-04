<?php 
class Account extends CI_Controller {
	function __construct() {
		parent::__construct();
		// cek login
		if (!$this->session->userdata('login')) {
			redirect('auth/login');
		}
		// model
		$this->load->model('m_transaction');
	}

	// index
	public function index() {

	}

	// detail order
	public function order($tran_id = "") {
		// get user data
		$user = $this->session->userdata('login');
		// get detail transaksi
		$where = array(
			'tran_id' => $tran_id,
			'user_id' => $user['user_id']
		);
		$data['detail'] = $this->m_transaction->get_detail_transaction($where);
		$where = array(
			'tran_id' => $tran_id
		);
		$data['list_item'] = $this->m_transaction->get_list_item($where);
		// print_r($data);
		// load view
		$this->load->view('account_order', $data);
	}
}