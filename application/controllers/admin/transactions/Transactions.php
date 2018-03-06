<?php 
class Transactions extends CI_Controller {
	function __construct() {
		parent::__construct();
		// cek login
		// jika session 'auth' itu belum ada
		if (!$this->session->userdata('auth_admin')) {
			// arahkan ke admin login
			redirect('admin/auth/login');
		}
		// load model
		$this->load->model('admin/m_transaction');
	}
	
	public function index() {
		$data['list_transaction'] = $this->m_transaction->get_all_transaction();
		// load view
		$this->load->view('admin/transactions/transactions/index', $data);
	}

	public function verify($tran_id) {
		// params
		$params = array(
			'payment_status' => 'done'
		);
		$where = array(
			'tran_id' => $tran_id
		);
		// update
		$this->m_transaction->update_payment($params, $where);
		redirect('admin/transactions/transactions');
	}

	public function expired($tran_id) {
		$params = array(
			'tran_expired' => 'yes'
		);
		$where = array(
			'tran_id' => $tran_id
		);
		$this->m_transaction->update_transaction($params, $where);
		redirect('admin/transactions/transactions');
	}
}