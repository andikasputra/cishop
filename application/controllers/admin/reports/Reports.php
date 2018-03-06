<?php 
class Reports extends CI_Controller {
	function __construct() {
		parent::__construct();
		// cek login
		// jika session 'auth' itu belum ada
		if (!$this->session->userdata('auth_admin')) {
			// arahkan ke admin login
			redirect('admin/auth/login');
		}
		// load model
		$this->load->model('admin/m_report');
	}
	
	public function index() {
		$cari = $this->session->userdata('cari');
		// list tahun
		$data['list_tahun'] = $this->m_report->get_all_tahun();
		// list data penjualan
		$data['list_penjualan'] = $this->m_report->get_all_penjualan($cari['bulan'], $cari['tahun'], $cari['nama']);
		// load view
		$this->load->view('admin/reports/reports/index', $data);
	}

	public function filter_process() {
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$nama = $this->input->post('nama');
		// simpan ke dalam session
		$this->session->set_userdata('cari', ['bulan' => $bulan, 'tahun' => $tahun, 'nama' => $nama]);
		redirect('admin/reports/reports');
	}
}