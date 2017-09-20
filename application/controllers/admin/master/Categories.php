<?php 
class Categories extends CI_Controller {
	function __construct() {
		parent::__construct();
		// cek login
		// jika session 'auth' itu belum ada
		if (!$this->session->userdata('auth_admin')) {
			// arahkan ke admin login
			redirect('admin/auth/login');
		}
		// load model
		$this->load->model('admin/master/m_category');
		$this->load->library('form_validation');
	}

	public function index() {
		// get data category
		$data['list_category'] = $this->m_category->get_all_data();
		// load view
		$this->load->view('admin/master/categories/index', $data);
	}

	public function add() {
		// load view
		$this->load->view('admin/master/categories/add');
	}

	public function add_process() {
		// validasi inputan
		// aturan
		$this->form_validation->set_rules('category_name', 'Name', 'required|max_length[50]');
		$this->form_validation->set_rules('category_description', 'Description', 'required|max_length[255]');
		// jalankan validasi
		if ($this->form_validation->run() !== FALSE) {
			// jika validasinya tidak error
			// buat array dengan key nama kolom di tabel database, dan value nya dengan yg diinputkan user
			$params = array(
				'category_name' => $this->input->post('category_name'),
				'category_description' => $this->input->post('category_description'),
				'category_slug' => strtolower(str_replace(' ', '-', $this->input->post('category_name')))
			);
			// proses insert dengan model
			if ($this->m_category->insert($params)) {
				// jika berhasil insert arahkan ke  halaman daftar data brand / merk
				redirect('admin/master/categories');
			} else {
				// jika insert gagal, tampilkan pesan
				echo 'error operasi database';
			}
		} 
		$this->load->view('admin/master/categories/add');
	}

	// delete
	public function delete($category_id = "") {
		$params = array('category_id' => $category_id);
		// delete
		if ($this->m_category->delete($params)) {
			// jika query berhasil, arahkan ke categories
			redirect('admin/master/categories');
		}
	}
}