<?php 
class Categories extends CI_Controller {
	function __construct() {
		parent::__construct();
		// load model
		$this->load->model('admin/master/m_category');
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
		$this->load->library('form_validation');
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
		} else {
			// jika proses validasi error, tampilkan error / yg gagal divalidasi
			echo validation_errors();
		}
	}
}