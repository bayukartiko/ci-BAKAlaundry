<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminControl extends CI_Controller {
	public function __construct(){
		parent::__construct();
		cek_user_login();
		$this->load->library('form_validation');
		$this->load->model('AdminModel');	
	}

	public function index(){
		$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

		// echo 'selamat datang ' . $data['tb_user']['username'];
		$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
		$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
		$this->load->view('websiteLaundryPBO/admin/home', $data);
		$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		
	}
	public function logout(){
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role');

		$this->session->set_flashdata('sukses', 'Anda sudah berhasil keluar !');
		redirect('BAKAcontrol/index');
	}

	// jembatan utama
		public function home(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
			$this->load->view('websiteLaundryPBO/admin/home', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function dashboard(){
			$dataS['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$data['h_kasir'] = $this->AdminModel->h_kasir();
			$data['h_admin'] = $this->AdminModel->h_admin();
			$data['h_owner'] = $this->AdminModel->h_owner();
			$data['h_paket'] = $this->AdminModel->h_paket();
			$data['h_outlet'] = $this->AdminModel->h_outlet();
			$data['h_member'] = $this->AdminModel->h_member();
			$data['h_transaksi_baru'] = $this->AdminModel->h_transaksi_baru();
			$data['h_total_transaksi'] = $this->AdminModel->h_total_transaksi();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $dataS);
			$this->load->view('websiteLaundryPBO/admin/dashboard', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}

	// jembatan admin
		// edit profil & password
			public function e_profil(){
				// $this->AdminModel->edit_db_kasir($id);
				// redirect('AdminControl/m_kasir');

				$datap['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

				$data['gender'] = ['pria','wanita'];
				// $data['profil'] = $this->AdminModel->get_db_profil();
				// $data['tb_user'] = $this->AdminModel->get_db_profil();
				// $data['data_edit_profil'] = $this->AdminModel->get_data_edit_db_profil();

				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $datap);
				$this->load->view('websiteLaundryPBO/admin/e_profil', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
			}
			public function aksi_edit_profil(){
				$this->AdminModel->edit_db_profil();
				$this->session->set_flashdata('sukses', 'diperbarui.');
				redirect('AdminControl/home');
			}	
			public function e_password(){
				$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
				
				$this->form_validation->set_rules('passwordsaatini', 'Password saat ini', 'required|trim');
				$this->form_validation->set_rules('passwordbaru1', 'Password baru', 'required|trim|min_length[3]|matches[passwordbaru2]');
				$this->form_validation->set_rules('passwordbaru2', 'Konfirmasi Password baru', 'required|trim|min_length[3]|matches[passwordbaru1]');

				if($this->form_validation->run() == false){
					$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
					$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
					$this->load->view('websiteLaundryPBO/admin/e_password', $data);
					$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
				}else{
					$this->_aksi_edit_password();
				}
			}
			private function _aksi_edit_password(){
				$this->AdminModel->edit_db_password();
				$this->session->set_flashdata('sukses', 'diperbarui.');
				redirect('AdminControl/home');
			}	
		public function m_admin(){
			$dataS['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$data['tb_user'] = $this->AdminModel->get_db_admin();
			$data['h_admin'] = $this->AdminModel->h_admin();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $dataS);
			$this->load->view('websiteLaundryPBO/admin/m_admin', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function m_kasir(){
			$dataS['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$data['tb_user'] = $this->AdminModel->get_db_kasir();
			$data['h_kasir'] = $this->AdminModel->h_kasir();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $dataS);
			$this->load->view('websiteLaundryPBO/admin/m_kasir', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function t_kasir(){
			$dataS['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$data['outlet'] = $this->AdminModel->get_db_outlet();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $dataS);
			$this->load->view('websiteLaundryPBO/admin/t_kasir', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function m_owner(){
			$dataS['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$data['tb_user'] = $this->AdminModel->get_db_owner();
			$data['h_owner'] = $this->AdminModel->h_owner();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $dataS);
			$this->load->view('websiteLaundryPBO/admin/m_owner', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function t_owner(){
			$dataS['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$data['outlet'] = $this->AdminModel->get_db_outlet();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $dataS);
			$this->load->view('websiteLaundryPBO/admin/t_owner', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function m_member(){
			$dataS['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$data['tb_member'] = $this->AdminModel->get_db_member();
			$data['h_member'] = $this->AdminModel->h_member();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $dataS);
			$this->load->view('websiteLaundryPBO/admin/m_member', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function t_member(){
			$dataS['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$data['outlet'] = $this->AdminModel->get_db_outlet();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $dataS);
			$this->load->view('websiteLaundryPBO/admin/t_member', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function m_laundry(){
			$dataS['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$data['tb_paket'] = $this->AdminModel->get_db_paket();
			$data['h_paket'] = $this->AdminModel->h_paket();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $dataS);
			$this->load->view('websiteLaundryPBO/admin/m_laundry', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function t_paket(){
			$dataS['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$data['outlet'] = $this->AdminModel->get_db_outlet();
			$data['jenis'] = $this->AdminModel->get_jenis_paket();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $dataS);
			$this->load->view('websiteLaundryPBO/admin/t_paket', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function m_outlet(){
			$dataS['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$data['tb_outlet'] = $this->AdminModel->get_db_outlet();
			$data['h_outlet'] = $this->AdminModel->h_outlet();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $dataS);
			$this->load->view('websiteLaundryPBO/admin/m_outlet', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function t_outlet(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
			$this->load->view('websiteLaundryPBO/admin/t_outlet', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function m_transaksi(){
			$dataS['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$data['tb_transaksi'] = $this->AdminModel->get_db_transaksi();
			$data['h_transaksi_baru'] = $this->AdminModel->h_transaksi_baru();
			$data['h_total_transaksi'] = $this->AdminModel->h_total_transaksi();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $dataS);
			$this->load->view('websiteLaundryPBO/admin/m_transaksi', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function t_transaksi(){
			$dataS['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$mentah = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$data['kode_nuklir'] = substr(str_shuffle($mentah), 0, 15);
			$data['outlet'] = $this->AdminModel->get_db_outlet();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $dataS);
			$this->load->view('websiteLaundryPBO/admin/t_transaksi', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function laporan(){
			$dataS['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$data['outlet'] = $this->AdminModel->get_db_outlet();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $dataS);
			$this->load->view('websiteLaundryPBO/admin/laporan', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
			$this->load->view('websiteLaundryPBO/admin/laporan');
		}
		public function tentang(){
			$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
			$this->load->view('websiteLaundryPBO/admin/tentang', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}

	// pengolahan data member
		// tambah
			public function simpan_data_member(){
				$this->AdminModel->simpan_db_member();
				$this->session->set_flashdata('sukses', 'ditambahkan.');
				redirect('AdminControl/m_member');
			}
		// edit
			public function edit_data_member($id){
				$datap['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

				$data['gender'] = ['pria','wanita'];
				$data['outlet'] = $this->AdminModel->get_db_outlet();
				$data['tb_member'] = $this->AdminModel->get_db_member();
				$data['h_member'] = $this->AdminModel->h_member();
				$data['data_edit_member'] = $this->AdminModel->get_data_edit_db_member($id);

				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $datap);
				$this->load->view('websiteLaundryPBO/admin/e_member', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
			}
			public function aksi_edit_member(){
				$this->AdminModel->edit_db_member();
				$this->session->set_flashdata('sukses', 'diubah.');
				redirect('AdminControl/m_member');
			}
		// hapus
			public function hapus_data_member($id){
				$this->AdminModel->hapus_db_member($id);
				$this->session->set_flashdata('sukses', 'dihapus.');
				redirect('AdminControl/m_member');
			}
	// pengolahan data kasir
		// tambah
			public function simpan_data_kasir(){
				$this->AdminModel->simpan_db_kasir();
				$this->session->set_flashdata('sukses', 'ditambahkan.');
				redirect('AdminControl/m_kasir');
			}

		// detail	
			public function detail_data_kasir($id){
				$datap['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

				$this->load->model('AdminModel');
				$data['outlet'] = $this->AdminModel->get_db_outlet();
				$detail_db = $this->AdminModel->detail_db_kasir($id);
				$data['detail'] = $detail_db;
				//redirect('AdminControl/m_kasir');

				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $datap);
				$this->load->view('websiteLaundryPBO/admin/detail_data_user/d_kasir', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
			}

		// hapus
			public function hapus_data_kasir($id){
				$this->AdminModel->hapus_db_kasir($id);
				$this->session->set_flashdata('sukses', 'dihapus.');
				redirect('AdminControl/m_kasir');
			}
		
		// edit
			public function edit_data_kasir($id){
				// $this->AdminModel->edit_db_kasir($id);
				// redirect('AdminControl/m_kasir');

				$datap['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

				$data['gender'] = ['pria','wanita'];
				$data['outlet'] = $this->AdminModel->get_db_outlet();
				$data['tb_user'] = $this->AdminModel->get_db_kasir();
				$data['h_kasir'] = $this->AdminModel->h_kasir();
				$data['data_edit_kasir'] = $this->AdminModel->get_data_edit_db_kasir($id);

				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $datap);
				$this->load->view('websiteLaundryPBO/admin/e_kasir', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
			}
			public function aksi_edit_kasir(){
				$this->AdminModel->edit_db_kasir();
				$this->session->set_flashdata('sukses', 'diubah.');
				redirect('AdminControl/m_kasir');
			}

	// pengolahan data admin
		public function detail_data_admin($id){
			$datap['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$this->load->model('AdminModel');
			$data['outlet'] = $this->AdminModel->get_db_outlet();
			$detail_db = $this->AdminModel->detail_db_kasir($id);
			$data['detail'] = $detail_db;
			//redirect('AdminControl/m_kasir');

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $datap);
			$this->load->view('websiteLaundryPBO/admin/detail_data_user/d_admin', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}

	// pengolahan data owner
		// tambah
			public function simpan_data_owner(){
				$this->AdminModel->simpan_db_owner();
				$this->session->set_flashdata('sukses', 'ditambahkan.');
				redirect('AdminControl/m_owner');
			}

		// detail
			public function detail_data_owner($id){
				$datap['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

				$this->load->model('AdminModel');
				$data['outlet'] = $this->AdminModel->get_db_outlet();
				$detail_db = $this->AdminModel->detail_db_owner($id);
				$data['detail'] = $detail_db;
				//redirect('AdminControl/m_kasir');

				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $datap);
				$this->load->view('websiteLaundryPBO/admin/detail_data_user/d_owner', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
			}

		// hapus
			public function hapus_data_owner($id){
				$this->AdminModel->hapus_db_owner($id);
				$this->session->set_flashdata('sukses', 'dihapus.');
				redirect('AdminControl/m_owner');
			}

		// edit
			public function edit_data_owner($id){
				// $this->AdminModel->edit_db_kasir($id);
				// redirect('AdminControl/m_kasir');

				$datap['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

				$data['gender'] = ['pria','wanita'];
				$data['outlet'] = $this->AdminModel->get_db_outlet();
				$data['tb_user'] = $this->AdminModel->get_db_owner();
				$data['h_owner'] = $this->AdminModel->h_owner();
				$data['data_edit_owner'] = $this->AdminModel->get_data_edit_db_owner($id);

				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $datap);
				$this->load->view('websiteLaundryPBO/admin/e_owner', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
			}
			public function aksi_edit_owner(){
				$this->AdminModel->edit_db_owner();
				$this->session->set_flashdata('sukses', 'diubah.');
				redirect('AdminControl/m_owner');
			}	
	
	// pengolahan data paket
		// tambah
			public function simpan_data_paket(){
				$this->AdminModel->simpan_db_paket();
				$this->session->set_flashdata('sukses', 'ditambahkan.');
				redirect('AdminControl/m_laundry');
			}
		// hapus
			public function hapus_data_paket($id){
				$this->AdminModel->hapus_db_paket($id);
				$this->session->set_flashdata('sukses', 'dihapus.');
				redirect('AdminControl/m_laundry');
			}
		// edit
			public function edit_data_paket($id){
				// $this->AdminModel->edit_db_kasir($id);
				// redirect('AdminControl/m_kasir');

				$datap['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

				$data['jenis'] = $this->AdminModel->get_jenis_paket();
				$data['outlet'] = $this->AdminModel->get_db_outlet();
				$data['tb_paket'] = $this->AdminModel->get_db_paket();
				$data['h_paket'] = $this->AdminModel->h_paket();
				$data['data_edit_paket'] = $this->AdminModel->get_data_edit_db_paket($id);

				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $datap);
				$this->load->view('websiteLaundryPBO/admin/e_paket', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
			}
			public function aksi_edit_paket(){
				$this->AdminModel->edit_db_paket();
				$this->session->set_flashdata('sukses', 'diubah.');
				redirect('AdminControl/m_laundry');
			}	

	// pengolahan data outlet
		// tambah
			public function simpan_data_outlet(){
				$this->AdminModel->simpan_db_outlet();
				$this->session->set_flashdata('sukses', 'ditambahkan.');
				redirect('AdminControl/m_outlet');
			}
		// edit
			public function edit_data_outlet($id){
				// $this->AdminModel->edit_db_kasir($id);
				// redirect('AdminControl/m_kasir');

				$datap['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

				$data['jenis_outlet'] = ['pakaian','bed cover','boneka','jasa setrika','cuci karpet'];
				$data['tb_outlet'] = $this->AdminModel->get_db_outlet();
				$data['h_outlet'] = $this->AdminModel->h_outlet();
				$data['data_edit_outlet'] = $this->AdminModel->get_data_edit_db_outlet($id);

				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $datap);
				$this->load->view('websiteLaundryPBO/admin/e_outlet', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
			}
			public function aksi_edit_outlet(){
				$this->AdminModel->edit_db_outlet();
				$this->session->set_flashdata('sukses', 'diubah.');
				redirect('AdminControl/m_outlet');
			}	
}
