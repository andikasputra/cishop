<?php 
class Brands extends CI_Controller {
	function __construct() {
		parent::__construct();
		// cek login
		// jika session 'auth' itu belum ada
		if (!$this->session->userdata('auth_admin')) {
			// arahkan ke admin login
			redirect('admin/auth/login');
		}
		// load model
		$this->load->model('admin/master/m_brand');
		$this->load->library('form_validation');
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
		// aturan
		$this->form_validation->set_rules('brand_name', 'Name', 'required|max_length[50]');
		$this->form_validation->set_rules('brand_description', 'Description', 'required|min_length[5]|max_length[255]');
		// jalankan validasi
		if ($this->form_validation->run() !== FALSE) {
			// jika validasinya tidak error
			// default logo
			$logo = 'default.jpg';
			// upload logo
			$config['upload_path'] = 'resource/images/brand-icon/';
			$config['allowed_types'] = 'jpg|jpeg|png|ico|bmp';
			$config['file_name'] = strtolower(str_replace(' ', '-', $this->input->post('brand_name')));
			// load library upload & menggunakan config yg dibuat
			$this->load->library('upload', $config);
			// proses upload
			// brand_logo adalah nama input file
			if ($this->upload->do_upload('brand_logo')) {
				// ambil nama file yg baru diupload & masukkan ke variable logo
				$logo = $this->upload->data('file_name');
			} else {
				echo $this->upload->display_errors();
			}
			// buat array dengan key nama kolom di tabel database, dan value nya dengan yg diinputkan user
			$params = array(
				'brand_name' => $this->input->post('brand_name'),
				'brand_description' => $this->input->post('brand_description'),
				'brand_slug' => strtolower(str_replace(' ', '-', $this->input->post('brand_name'))),
				'brand_logo' => $logo
			);
			// proses insert dengan model
			if ($this->m_brand->insert($params)) {
				// jika berhasil insert arahkan ke  halaman daftar data brand / merk
				redirect('admin/master/brands');
			} else {
				// jika insert gagal, tampilkan pesan
				echo 'error operasi database';
			}
		}
		$this->load->view('admin/master/brands/add');
	}

	public function edit($brand_id = "") {
		$where = array('brand_id' => $brand_id);
		// get detail data
		$data['detail'] = $this->m_brand->get_detail_data($where);
		// load view
		$this->load->view('admin/master/brands/edit', $data);
	}
	
	public function edit_process($brand_id = "") {
		// validasi inputan
		// aturan
		$this->form_validation->set_rules('brand_name', 'Name', 'required|max_length[50]');
		$this->form_validation->set_rules('brand_description', 'Description', 'required|min_length[5]|max_length[255]');
		// jalankan validasi
		if ($this->form_validation->run() !== FALSE) {
			// jika validasinya tidak error
			// nilai awal logo
			$logo = $this->input->post('brand_logo');
			// jika upload logo baru
			if (!empty($_FILES['brand_logo']['tmp_name'])) {
				// upload logo
				$config['upload_path'] = 'resource/images/brand-icon/';
				$config['allowed_types'] = 'jpg|jpeg|png|ico|bmp';
				$config['file_name'] = strtolower(str_replace(' ', '-', $this->input->post('brand_name')));
				// load library upload & menggunakan config yg dibuat
				$this->load->library('upload', $config);
				// proses upload
				// brand_logo adalah nama input file
				if ($this->upload->do_upload('brand_logo')) {
					// ambil nama file yg baru diupload & masukkan ke variable logo
					$logo = $this->upload->data('file_name');
				} else {
					echo $this->upload->display_errors();
				}
			}
			// buat array dengan key nama kolom di tabel database, dan value nya dengan yg diinputkan user
			$params = array(
				'brand_name' => $this->input->post('brand_name'),
				'brand_description' => $this->input->post('brand_description'),
				'brand_slug' => strtolower(str_replace(' ', '-', $this->input->post('brand_name'))),
				'brand_logo' => $logo
			);
			$where = array('brand_id' => $brand_id);
			// proses insert dengan model
			if ($this->m_brand->update($params, $where)) {
				// jika berhasil insert arahkan ke  halaman daftar data brand / merk
				redirect('admin/master/brands');
			} else {
				// jika insert gagal, tampilkan pesan
				echo 'error operasi database';
			}
		}
		$this->load->view('admin/master/brands/add');
	}

	// delete
	public function delete($brand_id = "") {
		$params = array('brand_id' => $brand_id);
		// get detail brand
		$brand = $this->m_brand->get_detail_data($params);
		// jika brand_logo itu bukan default
		if ($brand['brand_logo'] != 'default.jpg') {
			// hapus logo yg tersimpan di resource
			unlink('resource/images/brand-icon/'.$brand['brand_logo']);
		}
		// delete
		if ($this->m_brand->delete($params)) {
			// jika query berhasil, arahkan ke brands
			redirect('admin/master/brands');
		}
	}
}
