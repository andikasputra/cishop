<?php 
class Brands extends CI_Controller {
	function __construct() {
		parent::__construct();
		// load model
		$this->load->model('m_brand');
		$this->load->model('m_category');
		$this->load->model('m_product');
	}

	// halaman detail product dengan menerima product slug
	public function detail($slug = "") {
		// list categories
		$data['header']['list_categories'] = $this->m_category->get_all_categories();
		// list brands
		$data['header']['list_brands'] = $this->m_brand->get_all_brands();
		// detail brand
		$brand = $this->m_brand->get_detail(array('brand_slug' => $slug));
		// data product
		$where = array('products.brand_id' => $brand['brand_id']);
		$data['list_products'] = $this->m_product->get_product_by_condition($where);
		// load view detail product
		$this->load->view('brand-detail', $data);
	}

}