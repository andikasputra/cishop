<?php 

class Auth extends CI_Controller {
	function __construct() {
		parent::__construct();
		// load model
		$this->load->model('m_category');
		$this->load->model('m_brand');
		$this->load->model('m_user');
		// load library
		$this->load->library('form_validation');
	}

	// login page
	public function login() {
		// list categories
		$data['header']['list_categories'] = $this->m_category->get_all_categories();
		// list brands
		$data['header']['list_brands'] = $this->m_brand->get_all_brands();
		$this->load->view('login', $data);
	}

	// register page
	public function register() {
		// list categories
		$data['header']['list_categories'] = $this->m_category->get_all_categories();
		// list brands
		$data['header']['list_brands'] = $this->m_brand->get_all_brands();
		$this->load->view('register', $data);
	}

	// proses register
	public function register_process() {
		// validation
		$this->form_validation->set_rules('user_name', 'Username', 'required|is_unique[users.user_name]');
		$this->form_validation->set_rules('user_email', 'Email', 'required|is_unique[users.user_name]|valid_email');
		$this->form_validation->set_rules('user_alias', 'Full Name', 'required|min_length[2]');
		$this->form_validation->set_rules('user_password', 'Password', 'required|min_length[2]');
		// process
		if ($this->form_validation->run() !== FALSE) {
			$params = array(
				'user_name' => $this->input->post('user_name'),
				'user_email' => $this->input->post('user_email'),
				'user_alias' => $this->input->post('user_alias'),
				'user_password' => sha1($this->input->post('user_password'))
			);
			if ($this->m_user->insert($params)) {
				/*
				 * KIRIM EMAIL
				 */
				// load library email
				$this->load->library('email');
				// configurasi email
				$config['protocol'] = 'smtp';
				$config['smtp_host'] = 'ssl://smtp.gmail.com';
				$config['smtp_user'] = 'cishopcodeigniter@gmail.com';
				$config['smtp_pass'] = 'codeignitershop';
				$config['smtp_port'] = '465';
				$config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
				// initialize
				$this->email->initialize($config);
				// email
        $this->email->set_newline("\r\n");
				$this->email->from($config['smtp_user']);
				$this->email->to($params['user_email']);
				$this->email->subject('Informasi Akun CiShop');
				$message = "
				<h1>Selamat Datang Wahai $params[user_alias]</h1>
				<p>Informasi akunmu :</p>
				Username : <strong>$params[user_name]</strong> <br>
				Password : <strong>".$this->input->post('user_password')."</strong> <br>
				<hr>
				<p>Sekian dan terima kasih.. Salam sayang CiShop</p>
				";
				$this->email->message($message);
				// kirim
				if ($this->email->send()) {
					echo "<script type='text/javascript'>alert('Pesan Terkirim');window.location.href='".site_url('auth/login')."'</script>";
				} else {
					echo "gagal";
				}
			}
		}
	}
}