<?php 
class Brands extends CI_Controller {
	function __construct() {
		parent::__construct();
		// load model
		$this->load->model('m_brand');
		$this->load->model('m_product');
	}

	// halaman detail product dengan menerima product slug
	public function detail($slug = "") {
		// detail brand
		$brand = $this->m_brand->get_detail(array('brand_slug' => $slug));
		// data product
		$where = array('products.brand_id' => $brand['brand_id']);
		$data['list_products'] = $this->m_product->get_product_by_condition($where);
		// load view detail product
		$this->load->view('brand-detail', $data);
	}

}