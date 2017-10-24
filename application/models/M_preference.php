<?php 

class M_preference extends CI_Model {
	public function get_mail_setting() {
		$this->db->select("
		  MAX(CASE WHEN (name = 'smtp_host') THEN value ELSE NULL END) AS smtp_host,
		  MAX(CASE WHEN (name = 'smtp_port') THEN value ELSE NULL END) AS smtp_port,
		  MAX(CASE WHEN (name = 'smtp_user') THEN value ELSE NULL END) AS smtp_user,
		  MAX(CASE WHEN (name = 'smtp_pass') THEN value ELSE NULL END) AS smtp_pass"
		);
		$this->db->where(array('type' => 'email'));
		return $this->db->get('preferences')->row_array();
	}
}