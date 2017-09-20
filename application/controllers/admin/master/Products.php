<?php 
class Products extends CI_Controller {
	function __construct() {
		parent::__construct();
		// cek login
		// jika session 'auth' itu belum ada
		if (!$this->session->userdata('auth_admin')) {
			// arahkan ke admin login
			redirect('admin/auth/login');
		}
		// load model
		$this->load->model('admin/master/m_product');
	}
	
	public function index() {
		// all data
		$data['list_product'] = $this->m_product->get_all_data();
		// load view
		$this->load->view('admin/master/products/index', $data);
	}

	public function add() {
		// load view
		$this->load->view('admin/master/products/add');
	}
}