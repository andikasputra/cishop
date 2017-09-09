<?php 
class Brands extends CI_Controller {
	function __construct() {
		parent::__construct();
		// load model
		$this->load->model('admin/master/m_brand');
	}

	public function index() {
		// get semua data brand
		$data['list_brand'] = $this->m_brand->get_all_data();
		// load view
		$this->load->view('admin/master/brands/index', $data);
	}

	public function add() {
		// load view
		$this->load->view('admin/master/brands/add');
	}
	public function add_process() {
		// validasi inputan
		$this->load->library('form_validation');
		// aturan
		$this->form_validation->set_rules('brand_name', 'Name', 'required|max_length[50]');
		$this->form_validation->set_rules('brand_description', 'Description', 'required|max_length[255]');
		// jalankan validasi
		if ($this->form_validation->run() !== FALSE) {
			// jika validasinya tidak error
			// buat array dengan key nama kolom di tabel database, dan value nya dengan yg diinputkan user
			$params = array(
				'brand_name' => $this->input->post('brand_name'),
				'brand_description' => $this->input->post('brand_description'),
				'brand_slug' => strtolower(str_replace(' ', '-', $this->input->post('brand_name')))
			);
			// proses insert dengan model
			if ($this->m_brand->insert($params)) {
				// jika berhasil insert arahkan ke  halaman daftar data brand / merk
				redirect('admin/master/brands');
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
