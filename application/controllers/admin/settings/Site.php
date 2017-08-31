<?php 
class Site extends CI_Controller {
	public function index() {
		// load view
		$this->load->view('admin/settings/site/index');
	}
}