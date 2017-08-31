<?php 
class Dashboard extends CI_Controller {
	public function index() {
		// load view
		$this->load->view('admin/dashboard/dashboard/index');
	}
}