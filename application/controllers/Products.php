<?php 
class Products extends CI_Controller {
	function __construct() {
		parent::__construct();
		// load model
		$this->load->model('m_product');
	}

	// halaman detail product dengan menerima product slug
	public function detail($slug = "") {
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