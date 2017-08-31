<?php 
class Reports extends CI_Controller {
	public function index() {
		// load view
		$this->load->view('admin/reports/reports/index');
	}
}