<?php 
class M_product extends CI_Model {

	// ambil semua data product
	public function get_all_data() {
		$this->db->join('categories', 'categories.category_id = products.category_id');
		$this->db->join('brands', 'brands.brand_id = products.brand_id');
		return $this->db->get('products')->result_array();
	}

	public function get_detail_data($params) {
		return $this->db->get_where('products', $params)->row_array();
	}

	public function get_product_photos($params) {
		return $this->db->get_where('product_photos', $params);
	}

	// insert data product
	public function insert($params) {
		return $this->db->insert('products', $params);
	}

	// delete data product
	public function delete($params) {
		return $this->db->delete('products', $params);
	}
}