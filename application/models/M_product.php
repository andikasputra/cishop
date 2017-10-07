<?php 

class M_product extends CI_Model {
	// ambil product terbaru sebanyak delapan (8)
	public function get_new() {
		$this->db->join('categories', 'categories.category_id = products.category_id');
		$this->db->join('product_photos', 'products.product_id = product_photos.product_id');
		$this->db->group_by('products.product_id');
		$this->db->order_by('products.product_id', 'DESC');
		return $this->db->get('products', 8)->result_array();
	}

	// ambil product terbaru 
	public function get_all_product() {
		$this->db->join('categories', 'categories.category_id = products.category_id');
		$this->db->join('product_photos', 'products.product_id = product_photos.product_id');
		$this->db->group_by('products.product_id');
		$this->db->order_by('products.product_id', 'DESC');
		return $this->db->get('products')->result_array();
	}

	// ambil product terbaru sebanyak delapan (8) berdasarkan kondisi
	public function get_product_by_condition($where) {
		$this->db->join('categories', 'categories.category_id = products.category_id');
		$this->db->join('product_photos', 'products.product_id = product_photos.product_id');
		$this->db->group_by('products.product_id');
		$this->db->order_by('products.product_id', 'DESC');
		return $this->db->get_where('products', $where)->result_array();
	}

	// ambil satu data product
	public function get_detail($where) {
		$this->db->join('categories', 'categories.category_id = products.category_id');
		$this->db->join('brands', 'brands.brand_id = products.brand_id');
		return $this->db->get_where('products', $where)->row_array();
	}

	// ambil foto di tiap product
	public function get_photos($where) {
		return $this->db->get_where('product_photos', $where)->result_array();
	}
}