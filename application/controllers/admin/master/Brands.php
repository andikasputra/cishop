<?php 
class Brands extends CI_Controller {
	public function index() {
		// load view
		$this->load->view('admin/master/brands/index');
	}
}