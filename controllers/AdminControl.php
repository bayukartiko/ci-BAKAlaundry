<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminControl extends CI_Controller 
{
	public function index(){
		$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		// echo 'selamat datang ' . $data['tb_user']['username'];
		$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
		$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
		$this->load->view('websiteLaundryPBO/admin/home', $data);
		$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		
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

		$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
		$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
		$this->load->view('websiteLaundryPBO/admin/home', $data);
		$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
	}
	public function dashboard(){
		$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
		$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
		$this->load->view('websiteLaundryPBO/admin/dashboard', $data);
		$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
	}

	// jembatan admin
		public function e_profil(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
			$this->load->view('websiteLaundryPBO/admin/e_profil', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function e_password(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
			$this->load->view('websiteLaundryPBO/admin/e_password', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function m_admin(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
			$this->load->view('websiteLaundryPBO/admin/m_admin', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function m_kasir(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
			$this->load->view('websiteLaundryPBO/admin/m_kasir', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function t_kasir(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
			$this->load->view('websiteLaundryPBO/admin/t_kasir', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function m_owner(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
			$this->load->view('websiteLaundryPBO/admin/m_owner', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function t_owner(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
			$this->load->view('websiteLaundryPBO/admin/t_owner', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function m_laundry(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
			$this->load->view('websiteLaundryPBO/admin/m_laundry', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function t_paket(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
			$this->load->view('websiteLaundryPBO/admin/t_paket', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function m_outlet(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
			$this->load->view('websiteLaundryPBO/admin/m_outlet', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function t_outlet(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
			$this->load->view('websiteLaundryPBO/admin/t_outlet', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function laporan(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
			$this->load->view('websiteLaundryPBO/admin/laporan', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
			$this->load->view('websiteLaundryPBO/admin/laporan');
		}
		public function tentang(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['email' => $this->session->userdata('email')])->row_array();

			$this->load->view('websiteLaundryPBO/tentang/tentang', $data);
		}
}
