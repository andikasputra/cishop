<?php 
class Categories extends CI_Controller {
	function __construct() {
		parent::__construct();
		// load model
		$this->load->model('m_category');
		$this->load->model('m_product');
	}

	// halaman detail product dengan menerima product slug
	public function detail($slug = "") {
		// detail category
		$category = $this->m_category->get_detail(array('category_slug' => $slug));
		// data product
		$where = array('products.category_id' => $category['category_id']);
		$data['list_products'] = $this->m_product->get_product_by_condition($where);
		// load view detail product
		$this->load->view('category-detail', $data);
	}

}