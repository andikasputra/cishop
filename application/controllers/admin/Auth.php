<?php 

class Auth extends CI_Controller {
	function __construct() {
		parent::__construct();
		// load library
		$this->load->library('form_validation');
		// load model
		$this->load->model('admin/m_auth');
	}

	public function login() {
		// load view
		$this->load->view('admin/auth/login');
	}

	public function login_process() {
		// aturan inputan
		$this->form_validation->set_rules('user_name', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		// jalankan validasi
		if ($this->form_validation->run() !== FALSE) {
			// cek username dan password
			$where = array(
				'user_name' => $this->input->post('user_name'),
				'user_password' => sha1($this->input->post('password'))
			);
			// ambil data user berdasarkan $where
			$user = $this->m_auth->get_user($where);
			// jika user ditemukan
			if (!empty($user)) {
				// betul
				$this->session->set_userdata('auth_admin', $user);
				// arahkan ke dashboard
				redirect('admin/dashboard/dashboard');
			}
			// set pesan user tidak ditemukan
			$this->session->set_flashdata('login_error', 'Username or password incorrect');
			redirect('admin/auth/login');
		}
		// tampilkan form login lagi saat validasi gagal
		$this->load->view('admin/auth/login');
	}

	public function logout() {
		// hapus session auth_admin
		$this->session->unset_userdata('auth_admin');
		// arahkan ke form login
		redirect('admin/auth/login');
	}
}