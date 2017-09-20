<?php 
class Site extends CI_Controller {
	function __construct() {
		parent::__construct();
		// cek login
		// jika session 'auth' itu belum ada
		if (!$this->session->userdata('auth_admin')) {
			// arahkan ke admin login
			redirect('admin/auth/login');
		}
	}
	
	public function index() {
		// load view
		$this->load->view('admin/settings/site/index');
	}
}