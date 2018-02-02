<?php 
class M_product extends CI_Model {

	// ambil semua data product
	public function get_all_data($start, $end) {
		$this->db->join('categories', 'categories.category_id = products.category_id');
		$this->db->join('brands', 'brands.brand_id = products.brand_id');
		$this->db->limit($end, $start);
		return $this->db->get('products')->result_array();
	}
	// total data
	public function get_total_data() {
		$this->db->select('COUNT(*) AS total');
		$this->db->join('categories', 'categories.category_id = products.category_id');
		$this->db->join('brands', 'brands.brand_id = products.brand_id');
		// return $this->db->get('products')->row_array();
		$data = $this->db->get('products')->row_array();
		// echo $this->db->last_query();
		return $data['total'];
	}

	public function get_detail_data($params) {
		return $this->db->get_where('products', $params)->row_array();
	}

	public function get_list_brands() {
		return $this->db->get('brands')->result_array();
	}

	public function get_list_categories() {
		return $this->db->get('categories')->result_array();
	}

	public function get_product_photos($params) {
		return $this->db->get_where('product_photos', $params);
	}

	// insert data product
	public function insert($params) {
		$this->db->insert('products', $params);
		// medapatkan primary key terakhir yang baru diinsert
		return $this->db->insert_id();
	}

	// insert photo
	public function insert_photo($params) {
		return $this->db->insert('product_photos', $params);
	}

	// delete data product
	public function delete($params) {
		return $this->db->delete('products', $params);
	}
}