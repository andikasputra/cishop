<?php 
class Cart extends CI_Controller {
	function __construct() {
		parent::__construct();
		// load model
		$this->load->model('m_product');
		$this->load->model('m_category');
		$this->load->model('m_brand');
		$this->load->model('m_address');
		$this->load->model('m_transaction');
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

	// save transaction
	public function save_transaction() {
		// cek input
		$this->form_validation->set_rules('address_nama', 'Nama Penerima', 'required');
		$this->form_validation->set_rules('address_phone', 'No Telepon', 'required');
		$this->form_validation->set_rules('address_kab', 'Kota / Kabupaten', 'required');
		$this->form_validation->set_rules('address_prov', 'Provinsi', 'required');
		$this->form_validation->set_rules('address_kec', 'Kecamatan', 'required');
		$this->form_validation->set_rules('address_kel', 'Kelurahan', 'required');
		$this->form_validation->set_rules('address_pos', 'Kode POS', 'required');
		$this->form_validation->set_rules('address_alamat', 'Alamat Lengkap', 'required');
		$this->form_validation->set_rules('service', 'Layanan', 'required');
		$this->form_validation->set_rules('ongkir', 'Ongkos Kirim', 'required');
		$this->form_validation->set_rules('total', 'Total', 'required');
		// run
		if ($this->form_validation->run() !== FALSE) {
			$user = $this->session->userdata('login');
			// data address / alamat pengiriman
			$params = array(
				'user_id' => $user['user_id'],
				'address_nama' => $this->input->post('address_nama'),
				'address_phone' => $this->input->post('address_phone'),
				'address_kab' => $this->input->post('address_kab'),
				'address_kec' => $this->input->post('address_kec'),
				'address_kel' => $this->input->post('address_kel'),
				'address_pos' => $this->input->post('address_pos'),
				'address_alamat' => $this->input->post('address_alamat'),
			);
			$address_id = $this->m_address->insert($params);
			// data transaksi
			$params = array(
				'address_id' => $address_id,
				'tran_date' => date('Y-m-d'),
				'tran_cost' => $this->input->post('ongkir')
			);
			$tran_id = $this->m_transaction->insert($params);
			// insert item
			foreach ($this->cart->contents() as $cart) {
				$params = array(
					'tran_id' => $tran_id,
					'product_id' => $cart['id'],
					'item_count' => $cart['qty'],
					'item_selling_price' => $cart['price'],
					'item_purchasing_price' => 0,
				);
				$this->m_transaction->insert_item($params);
			}
		}
	}
}