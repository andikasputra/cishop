<?php 
class Email extends CI_Controller {
	public function index() {
		// load view
		$this->load->view('admin/settings/email/index');
	}
}