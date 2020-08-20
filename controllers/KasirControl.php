<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KasirControl extends CI_Controller 
{
	public function __construct(){
		parent::__construct();
		cek_user_login();
		// $this->load->model('AdminModel');	
	}
	
	public function index(){
		$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

		// echo 'selamat datang ' . $data['tb_user']['username'];
		$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/header', $data);
		$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/sidebar', $data);
		$this->load->view('websiteLaundryPBO/kasir/home', $data);
		$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/footer', $data);
		
	}
	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');

		$this->session->set_flashdata('sukses', 'Anda sudah berhasil keluar !');
		redirect('BAKAcontrol/index');
	}

	// jembatan kasir
		public function home(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/header', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/sidebar', $data);
			$this->load->view('websiteLaundryPBO/kasir/home', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/footer', $data);
		}
		public function dashboard(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/header', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/sidebar', $data);
			$this->load->view('websiteLaundryPBO/kasir/dashboard', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/footer', $data);
		}
		public function e_profil(){
			$this->load->view('websiteLaundryPBO/kasir/e_profil');
		}
		public function e_password(){
			$this->load->view('websiteLaundryPBO/kasir/e_password');
		}
		public function m_transaksi(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/header', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/sidebar', $data);
			$this->load->view('websiteLaundryPBO/kasir/m_transaksi', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/footer', $data);
		}
		public function t_transaksi(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/header', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/sidebar', $data);
			$this->load->view('websiteLaundryPBO/kasir/t_transaksi', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/footer', $data);
		}
		public function m_member(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/header', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/sidebar', $data);
			$this->load->view('websiteLaundryPBO/kasir/m_member', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/footer', $data);
		}
		public function t_member(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/header', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/sidebar', $data);
			$this->load->view('websiteLaundryPBO/kasir/t_member', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/footer', $data);
		}
		public function laporan(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/header', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/sidebar', $data);
			$this->load->view('websiteLaundryPBO/kasir/laporan', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/footer', $data);
		}
		public function tentang(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/header', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/sidebar', $data);
			$this->load->view('websiteLaundryPBO/kasir/tentang', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/footer', $data);
		}
}
