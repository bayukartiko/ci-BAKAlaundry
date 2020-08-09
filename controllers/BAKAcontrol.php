<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BAKAcontrol extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	 public function __construct()
	 {
		 parent::__construct();
		 $this->load->library('form_validation');
	 }

	 public function registrasi(){
		$this->form_validation->set_rules('nama', 'Nama' , 'required|trim', [
			'required' => 'Nama harus diisi !'
		]);
		$this->form_validation->set_rules('email', 'Email' , 'required|trim|valid_email|is_unique[tb_user.email]', [
			'required' => 'Email harus diisi !',
			'is_unique' => 'Email ini sudah terdaftar !'
		]);
		$this->form_validation->set_rules('password', 'Password' , 'required|trim|min_length[3]|matches[konfirmasiPassword]', [
			'required' => 'Kata Sandi harus diisi !',
			'matches' => 'Kata Sandi tidak sama !',
			'min_length' => 'kata sandi terlalu pendek !'
		]);
		$this->form_validation->set_rules('konfirmasiPassword', 'KonfirmasiPassword' , 'required|trim|matches[password]');

		 if($this->form_validation->run() == false){
			 // validasi gagal
			$this->load->view('websiteLaundryPBO/admin/register');
		 }else{
			 // validasi lolos
			// echo 'data berhasil ditambah';
			$data = [
				// 'nama' => '',
				'username' => htmlspecialchars($this->input->post('nama', true)),
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'email' => htmlspecialchars($this->input->post('email', true)),
				// 'alamat' => '',
				// 'tlp' => '',
				// 'jenis_kelamin' => '',
				'foto' => 'default.jpg',
				'role' => 'kasir',
				'id_outlet' => '1',
				'tgl_dibuat' => time(),
				'is_active' => 1
			];

			$this->db->insert('tb_user', $data);
			$this->session->set_flashdata('sukses', 'Selamat! Akun anda sudah terdaftar.');
			redirect('BAKAcontrol/index');
		 }
	 }
	 public function register(){
		 $this->load->view('websiteLaundryPBO/register');
	 }

	public function index(){
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
			'required' => 'Alamat Email harus diisi !'
		]);
		$this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required', [
			'required' => 'Kata Sandi harus diisi !',
		]);

		if($this->form_validation->run() == false){
			// validasi gagal
			$this->load->view('websiteLaundryPBO/login');
		}else{
			// validasi lolos
			$this->_login();
		}
	}

	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tb_user', ['email' => $email])->row_array();
		// var_dump($user);
		// die;

		// jika user ada
		if($user){
			// jika user aktif
			if($user['is_active'] == 1){
				// cek password
				if(password_verify($password, $user['password'])){
					$data = [
						'email' => $user['email'],
						'role' => $user['role']
					];
					$this->session->set_userdata($data);

					// cek tipe user
					if($user['role'] == 'admin'){
						redirect('AdminControl/index');
					}elseif($user['role'] == 'kasir'){
						redirect('KasirControl/index');
					}elseif($user['role'] == 'owner'){
						redirect('OwnerControl/index');
					}

				}else{
					$this->session->set_flashdata('gagal', 'Kata sandi salah !');
					redirect('BAKAcontrol/index');
				}
			}else{
				$this->session->set_flashdata('gagal', 'Email ini belum diaktifkan !');
				redirect('BAKAcontrol/index');
			}
		}else{
			// user tidak ada
			$this->session->set_flashdata('gagal', 'Email ini belum terdaftar !');
			redirect('BAKAcontrol/index');
		}
	}

	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');

		$this->session->set_flashdata('sukses', 'Anda sudah berhasil keluar !');
		redirect('BAKAcontrol/index');
	}
}
