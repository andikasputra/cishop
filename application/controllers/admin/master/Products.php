<?php 
class Products extends CI_Controller {
	public function index() {
		// load view
		$this->load->view('admin/master/products/index');
	}
}