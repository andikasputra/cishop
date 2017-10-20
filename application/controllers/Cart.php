<?php 
class Cart extends CI_Controller {
	function __construct() {
		parent::__construct();
		// load model
		$this->load->model('m_product');
		$this->load->model('m_category');
		$this->load->model('m_brand');
		// load library
		$this->load->library('form_validation');
	}

	// list cart
	public function index() {
		// list categories
		$data['header']['list_categories'] = $this->m_category->get_all_categories();
		// list brands
		$data['header']['list_brands'] = $this->m_brand->get_all_brands();
		$this->load->view('cart', $data);
	}

	public function add_cart() {
		// set validasi
		$this->form_validation->set_rules("product_id", "Product ID", 'required');
		$this->form_validation->set_rules("value", "Jumlah", 'required');
		// jalankan validasi
		if ($this->form_validation->run() !== FALSE) {
			// ambil data product
			$where = array('product_id' => $this->input->post('product_id'));
			$product = $this->m_product->get_detail($where);
			// cek stok
			if ($this->input->post('value') > $product['product_stock']) {
				// kalau permintaan lebih besar dari stok
				redirect('products/detail/'.$product['product_slug']);
			}
			// insert to cart
			$data = array(
				'id' => $product['product_id'],
				'qty' => intval($this->input->post('value')),
				'price' => intval($product['product_selling_price']),
				'name' => $product['product_name']
			);
			if ($this->cart->insert($data)) {
				// redirect ke halaman detail product yg dipilih
				redirect('products/detail/'.$product['product_slug']);
			}
		}
	}

	// kosongkan cart
	public function empty_cart() {
		// empty
		$this->cart->destroy();
		// kembalikan ke home
		redirect('');
	}
}