<?php 
class Products extends CI_Controller {
	function __construct() {
		parent::__construct();
		// cek login
		// jika session 'auth' itu belum ada
		if (!$this->session->userdata('auth_admin')) {
			// arahkan ke admin login
			redirect('admin/auth/login');
		}
		// load model
		$this->load->model('admin/master/m_product');
		// load library
		$this->load->library('form_validation');
	}
	
	public function index() {
		// all data
		$data['list_product'] = $this->m_product->get_all_data();
		// load view
		$this->load->view('admin/master/products/index', $data);
	}

	public function add() {
		// get list brand
		$data['list_brands'] = $this->m_product->get_list_brands();
		// get list category
		$data['list_categories'] = $this->m_product->get_list_categories();
		// load view
		$this->load->view('admin/master/products/add', $data);
	}

	public function add_process() {
		// validasi inputan
		// aturan
		$this->form_validation->set_rules('product_name', 'Name', 'required|max_length[100]');
		$this->form_validation->set_rules('category_id', 'Category', 'required|numeric');
		$this->form_validation->set_rules('brand_id', 'Brand', 'required|numeric');
		$this->form_validation->set_rules('product_purchasing_price', 'Purchasing Price', 'required|numeric');
		$this->form_validation->set_rules('product_selling_price', 'Selling Price', 'required|numeric');
		$this->form_validation->set_rules('product_description', 'Description', 'required|min_length[5]');
		// jalankan validasi
		if ($this->form_validation->run() !== FALSE) {
			// jika validasinya tidak error
			$params = array(
				'product_name' => $this->input->post('product_name'),
				'category_id' => $this->input->post('category_id'),
				'brand_id' => $this->input->post('brand_id'),
				'product_purchasing_price' => $this->input->post('product_purchasing_price'),
				'product_selling_price' => $this->input->post('product_selling_price'),
				'product_description' => $this->input->post('product_description'),
				'product_slug' => strtolower(str_replace(' ', '-', $this->input->post('product_name')))
			);
			// proses insert dengan model
			$product_id = $this->m_product->insert($params);
			if ($product_id) {
				// jika insert berhasil upload foto
				for ($i = 0; $i < sizeof($_FILES['photos']['name']); $i++) {
					// atur multiple photo menjadi satu foto
					$_FILES['photo']['name'] = $_FILES['photos']['name'][$i];
					$_FILES['photo']['tmp_name'] = $_FILES['photos']['tmp_name'][$i];
					$_FILES['photo']['type'] = $_FILES['photos']['type'][$i];
					$_FILES['photo']['error'] = $_FILES['photos']['error'][$i];
					$_FILES['photo']['size'] = $_FILES['photos']['size'][$i];
					// config upload
					$config['upload_path'] = 'resource/images/products/';
					$config['allowed_types'] = 'jpg|jpeg';
					$name = $this->input->post('product_name') . '-' .$i;
					$config['file_name'] = strtolower(str_replace(' ', '-', $name));
					// load library upload & menggunakan config yg dibuat
					$this->load->library('upload', $config);
					// proses upload
					// brand_logo adalah nama input file
					if ($this->upload->do_upload('photo')) {
						// ambil nama file yg baru diupload & masukkan ke variable logo
						$photo = $this->upload->data('file_name');
					}
					// buat array dengan key nama kolom di tabel database, dan value nya dengan yg diinputkan user
					$params = array(
						'product_id' =>  $product_id,
						'photo_name' => $photo
					);
					// insert product photo
					$this->m_product->insert_photo($params);
				}
				// jika berhasil, redirect ke produk
				redirect('admin/master/products');
			}
		}
		$this->load->view('admin/master/products/add');
	}
}