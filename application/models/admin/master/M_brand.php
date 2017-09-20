<?php 
class M_brand extends CI_Model {

	// ambil semua data brand
	public function get_all_data() {
		return $this->db->get('brands')->result_array();
	}

	public function get_detail_data($params) {
		return $this->db->get_where('brands', $params)->row_array();
	}

	// insert data brand
	public function insert($params) {
		return $this->db->insert('brands', $params);
	}

	// update data brand
	public function update($params, $where) {
		return $this->db->update('brands', $params, $where);
	}

	// delete data brand
	public function delete($params) {
		return $this->db->delete('brands', $params);
	}
}