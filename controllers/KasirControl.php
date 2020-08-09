<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KasirControl extends CI_Controller 
{
	public function index(){
		$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		// echo 'selamat datang ' . $data['tb_user']['username'];
		$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/header', $data);
		$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/sidebar', $data);
		$this->load->view('websiteLaundryPBO/kasir/home', $data);
		$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/footer', $data);
		
	}
	public function logout(){
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role');

		$this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Anda sudah berhasil keluar !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('BAKAcontrol/index');
	}

	// jembatan kasir
		public function home(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/header', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/sidebar', $data);
			$this->load->view('websiteLaundryPBO/kasir/home', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/footer', $data);
		}
		public function dashboard(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

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
			$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/header', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/sidebar', $data);
			$this->load->view('websiteLaundryPBO/kasir/m_transaksi', $data);
			$this->load->view('websiteLaundryPBO/kasir/templating_engine_kasir/footer', $data);
		}
		public function m_member(){
			$this->load->view('websiteLaundryPBO/kasir/m_member');
		}
		public function laporan(){
			$this->load->view('websiteLaundryPBO/kasir/laporan');
		}
		public function tentang(){
			$this->load->view('websiteLaundryPBO/tentang/tentang');
		}
}
