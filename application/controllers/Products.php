<?php 
class Products extends CI_Controller {
	function __construct() {
		parent::__construct();
		// load model
		$this->load->model('m_product');
		$this->load->model('m_category');
		$this->load->model('m_brand');
	}

	public function index()	{
		// get data
		$data['list_products'] = $this->m_product->get_all_product();
		// list data
		$this->load->view('products', $data);
	}

	// halaman detail product dengan menerima product slug
	public function detail($slug = "") {
		// list categories
		$data['header']['list_categories'] = $this->m_category->get_all_categories();
		// list brands
		$data['header']['list_brands'] = $this->m_brand->get_all_brands();
		// data product
		$where = array('product_slug' => $slug);
		$data['product'] = $this->m_product->get_detail($where);
		// list foto product
		$where = array('product_id' => $data['product']['product_id']);
		$data['list_photos'] = $this->m_product->get_photos($where);
		// load view detail product
		$this->load->view('products-detail', $data);
	}

}