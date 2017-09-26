<?php 

class M_product extends CI_Model {
	public function get_new() {
		$this->db->join('categories', 'categories.category_id = products.category_id');
		$this->db->join('product_photos', 'products.product_id = product_photos.product_id');
		$this->db->group_by('products.product_id');
		$this->db->order_by('products.product_id', 'DESC');
		return $this->db->get('products', 8)->result_array();
	}
}