<?php 
class Transactions extends CI_Controller {
	public function index() {
		// load view
		$this->load->view('admin/transactions/transactions/index');
	}
}