<?php 
class Categories extends CI_Controller {
	public function index() {
		// load view
		$this->load->view('admin/master/categories/index');
	}

	public function add() {
		// load view
		$this->load->view('admin/master/categories/add');
	}
}