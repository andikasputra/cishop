<?php 
class Users extends CI_Controller {
	public function index() {
		// load view
		$this->load->view('admin/users/users/index');
	}
}