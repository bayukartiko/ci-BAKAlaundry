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

			$data['gender'] = ['pria','wanita'];
			$data['outlet'] = $this->AdminModel->get_db_outlet();
			$data['tb_user'] = $this->AdminModel->get_db_admin();
			$data['h_admin'] = $this->AdminModel->h_admin();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $dataS);
			$this->load->view('websiteLaundryPBO/admin/m_admin', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function m_kasir(){
			$dataS['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
			
			$data['gender'] = ['pria','wanita'];
			$data['outlet'] = $this->AdminModel->get_db_outlet();
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

			$data['gender'] = ['pria','wanita'];
			$data['outlet'] = $this->AdminModel->get_db_outlet();
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

			$data['outlet'] = $this->AdminModel->get_db_outlet();
			$data['gender'] = ['pria','wanita'];
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
			$data['outlet'] = $this->AdminModel->get_db_outlet();
			$data['jenis'] = $this->AdminModel->get_jenis_paket();
			$data['satuan'] = $this->AdminModel->get_jenis_satuan();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $dataS);
			$this->load->view('websiteLaundryPBO/admin/m_laundry', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function t_paket(){
			$dataS['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			$data['outlet'] = $this->AdminModel->get_db_outlet();
			$data['jenis'] = $this->AdminModel->get_jenis_paket();
			$data['satuan'] = $this->AdminModel->get_jenis_satuan();

			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $dataS);
			$this->load->view('websiteLaundryPBO/admin/t_paket', $data);
			$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
		}
		public function m_outlet(){
			$dataS['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

			// $data['data_edit_outlet'] = $this->AdminModel->get_data_edit_db_outlet($id);
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

			$data['paket'] = $this->AdminModel->get_db_paket();
			$data['member'] = $this->AdminModel->get_db_member();
			$data['outlet'] = $this->AdminModel->get_db_outlet();
			$data['tb_member'] = $this->AdminModel->get_db_member();
			$data['tb_paket'] = $this->AdminModel->get_db_paket();
			$data['tb_transaksi'] = $this->AdminModel->get_db_transaksi();
			$data['status_order'] = $this->AdminModel->get_status_order();
			$data['status_dibayar'] = $this->AdminModel->get_status_dibayar();
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

			$data['tb_paket'] = $this->AdminModel->get_db_paket();
			$data['h_paket'] = $this->AdminModel->h_paket();
			$data['h_member'] = $this->AdminModel->h_member();
			$data['status_dibayar'] = $this->AdminModel->get_status_dibayar();
			$data['tb_member'] = $this->AdminModel->get_db_member();
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
				$this->form_validation->set_rules('nama', 'Nama' , 'required|trim', [
					'required' => 'Nama harus diisi !'
				]);
				$this->form_validation->set_rules('email', 'Email' , 'required|trim|valid_email', [
					'required' => 'Email harus diisi !',
					'valid_email' => 'Email tidak benar !'
				]);
				$this->form_validation->set_rules('alamat', 'Alamat' , 'required|trim', [
					'required' => 'Alamat harus diisi !'
				]);
				$this->form_validation->set_rules('telepon', 'No.Telepon' , 'required|trim|numeric', [
					'required' => 'No.Telepon harus diisi !',
					'numeric' => 'Isi no telepon harus angka !'
				]);
				$this->form_validation->set_rules('gender', 'Jenis Kelamin' , 'required|trim', [
					'required' => 'Jenis kelamin harus dipilih !'
				]);
				
				if($this->form_validation->run() == false){
					$this->t_member();
				}else{
					$this->AdminModel->simpan_db_member();
					$this->session->set_flashdata('sukses', 'ditambahkan.');
					redirect('AdminControl/m_member');
				}
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
				$this->form_validation->set_rules('nama', 'Nama' , 'required|trim', [
					'required' => 'Nama harus diisi !'
				]);
				$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_user.username]', [
					'required' => 'Nama Pengguna harus diisi !',
					'is_unique' => 'Nama Pengguna ini sudah terdaftar !'
				]);
				$this->form_validation->set_rules('password', 'Password' , 'required|trim|min_length[3]', [
					'required' => 'Kata Sandi harus diisi !',
					'min_length' => 'kata sandi terlalu pendek !'
				]);
				$this->form_validation->set_rules('email', 'Email' , 'required|trim|valid_email', [
					'required' => 'Email harus diisi !',
					'valid_email' => 'Email tidak benar !'
				]);
				$this->form_validation->set_rules('alamat', 'Alamat' , 'required|trim', [
					'required' => 'Alamat harus diisi !'
				]);
				$this->form_validation->set_rules('telepon', 'No.Telepon' , 'required|trim|numeric', [
					'required' => 'No.Telepon harus diisi !',
					'numeric' => 'Isi no telepon harus angka !'
				]);
				$this->form_validation->set_rules('gender', 'Jenis Kelamin' , 'required|trim', [
					'required' => 'Jenis kelamin harus dipilih !'
				]);
				$this->form_validation->set_rules('cabang', 'Cabang' , 'required|trim', [
					'required' => 'Cabang toko harus dipilih !'
				]);
		
				if($this->form_validation->run() == false){
					$this->t_kasir();
				}else{
					$this->AdminModel->simpan_db_kasir();
					$this->session->set_flashdata('sukses', 'ditambahkan.');
					redirect('AdminControl/m_kasir');
				}
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
				$this->form_validation->set_rules('nama', 'Nama' , 'required|trim', [
					'required' => 'Nama harus diisi !'
				]);
				$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[tb_user.username]', [
					'required' => 'Nama Pengguna harus diisi !',
					'is_unique' => 'Nama Pengguna ini sudah terdaftar !'
				]);
				$this->form_validation->set_rules('password', 'Password' , 'required|trim|min_length[3]', [
					'required' => 'Kata Sandi harus diisi !',
					'min_length' => 'kata sandi terlalu pendek !'
				]);
				$this->form_validation->set_rules('email', 'Email' , 'required|trim|valid_email', [
					'required' => 'Email harus diisi !',
					'valid_email' => 'Email tidak benar !'
				]);
				$this->form_validation->set_rules('alamat', 'Alamat' , 'required|trim', [
					'required' => 'Alamat harus diisi !'
				]);
				$this->form_validation->set_rules('telepon', 'No.Telepon' , 'required|trim|numeric', [
					'required' => 'No.Telepon harus diisi !',
					'numeric' => 'Isi no telepon harus angka !'
				]);
				$this->form_validation->set_rules('gender', 'Jenis Kelamin' , 'required|trim', [
					'required' => 'Jenis kelamin harus dipilih !'
				]);
				$this->form_validation->set_rules('cabang', 'Cabang' , 'required|trim', [
					'required' => 'Cabang toko harus dipilih !'
				]);
		
				if($this->form_validation->run() == false){
					$this->t_owner();
				}else{
					$this->AdminModel->simpan_db_owner();
					$this->session->set_flashdata('sukses', 'ditambahkan.');
					redirect('AdminControl/m_owner');
				}
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
				$this->form_validation->set_rules('nama', 'Nama' , 'required|trim|is_unique[tb_outlet.nama]', [
					'required' => 'Nama harus diisi !',
					'is_unique' => 'Cabang ini sudah tersedia !'
				]);
				$this->form_validation->set_rules('alamat', 'Alamat' , 'required|trim', [
					'required' => 'Alamat harus diisi !'
				]);
				$this->form_validation->set_rules('telepon', 'No.Telepon' , 'required|trim|numeric', [
					'required' => 'No.Telepon harus diisi !',
					'numeric' => 'Isi no telepon harus angka !'
				]);
				
				if($this->form_validation->run() == false){
					$this->t_outlet();
				}else{
					$this->AdminModel->simpan_db_outlet();
					$this->session->set_flashdata('sukses', 'ditambahkan.');
					redirect('AdminControl/m_outlet');
				}
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

	// pengolahan data transaksi
		// detail
			public function detail_data_transaksi($id){
				$datap['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

				$data['paket'] = $this->AdminModel->get_db_paket();
				$data['member'] = $this->AdminModel->get_db_member();
				$data['outlet'] = $this->AdminModel->get_db_outlet();
				$data['tb_member'] = $this->AdminModel->get_db_member();
				$data['tb_paket'] = $this->AdminModel->get_db_paket();
				$data['tb_transaksi'] = $this->AdminModel->get_db_transaksi();
				$data['status_order'] = $this->AdminModel->get_status_order();
				$data['status_dibayar'] = $this->AdminModel->get_status_dibayar();
				$data['h_transaksi_baru'] = $this->AdminModel->h_transaksi_baru();
				$data['h_total_transaksi'] = $this->AdminModel->h_total_transaksi();
				$data['data_edit_transaksi'] = $this->AdminModel->get_data_edit_db_transaksi($id);

				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $datap);
				$this->load->view('websiteLaundryPBO/admin/d_transaksi', $data);
				$this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
			}
			public function aksi_edit_transaksi(){
				$this->AdminModel->edit_db_transaksi();
				$this->session->set_flashdata('sukses', 'diperbarui.');
				redirect('AdminControl/m_transaksi');
			}

		public function get_data_paket(){
			$id = $this->input->post('id', true);
			$data = $this->AdminModel->get_data_paket($id)->result();
			echo json_encode($data);
		}

		public function simpan_data_transaksi(){
			$this->form_validation->set_rules('kodeinvoice', 'Kode Transaksi' , 'required|trim', [
				'required' => 'Kode Transaksi harus diisi !'
			]);
			$this->form_validation->set_rules('petugas', 'Petugas' , 'required|trim', [
				'required' => 'Nama Petugas harus diisi !'
			]);
			$this->form_validation->set_rules('cabang', 'Cabang' , 'required|trim', [
				'required' => 'Cabang Toko harus dipilih !'
			]);
			$this->form_validation->set_rules('cabang', 'Cabang' , 'required|trim', [
				'required' => 'Cabang Toko harus dipilih !'
			]);
			$this->form_validation->set_rules('namamember', 'Nama Pelanggan' , 'required|trim', [
				'required' => 'Nama Pelanggan harus dipilih !'
			]);
			$this->form_validation->set_rules('paket', 'Paket Laundry' , 'required|trim', [
				'required' => 'Paket Laundry harus dipilih !'
			]);
			$this->form_validation->set_rules('jumlah', 'Jumlah Barang' , 'required|trim|numeric', [
				'required' => 'Jumlah Barang harus diisi !',
				'numeric' => 'Input Jumlah Barang harus angka !'
			]);
			$this->form_validation->set_rules('harga_jual', 'Harga Jual' , 'required|trim|numeric', [
				'required' => 'Harga Jual harus diisi !',
				'numeric' => 'Input Harga Jual harus angka !'
			]);
			$this->form_validation->set_rules('diskon_paket', 'Diskon' , 'required|trim|numeric', [
				'required' => 'Diskon harus diisi !',
				'numeric' => 'Input Diskon harus angka !'
			]);
			$this->form_validation->set_rules('harga_diskon', 'Harga Diskon' , 'required|trim|numeric', [
				'required' => 'Harga Diskon harus diisi !',
				'numeric' => 'Input Harga Diskon harus angka !'
			]);
			$this->form_validation->set_rules('total', 'Total Harga' , 'required|trim|numeric', [
				'required' => 'Total Harga harus diisi !',
				'numeric' => 'Input Total Harga harus angka !'
			]);
			$this->form_validation->set_rules('tunai', 'Tunai' , 'required|trim|numeric', [
				'required' => 'Jumlah Uang harus diisi !',
				'numeric' => 'Input Jumlah Uang harus angka !'
			]);
			$this->form_validation->set_rules('kembali', 'Kembalian' , 'required|trim|numeric', [
				'required' => 'Kembalian harus diisi !',
				'numeric' => 'Input Kembalian harus angka !'
			]);
			$this->form_validation->set_rules('t_pembayaran', 'Tipe Pembayaran' , 'required|trim', [
				'required' => 'Tipe Pembayaran harus dipilih !'
			]);
			$this->form_validation->set_rules('s_pembayaran', 'Status Pembayaran' , 'required|trim', [
				'required' => 'Status Pembayaran harus dipilih !'
			]);
			$this->form_validation->set_rules('s_order', 'Status Order' , 'required|trim', [
				'required' => 'Status Order harus dipilih !'
			]);
			// mungkin yang ini ntar dipake
				// $this->form_validation->set_rules('reg[dob]','Date of birth',array('regex_match[/^((0[1-9]|[12][0-9]|3[01])[- \/.](0[1-9]|1[012])[- \/.](19|20)\d\d)$/]'));
				// $this->form_validation->set_rules('email', 'Email' , 'required|trim|valid_email', [
				// 	'required' => 'Email harus diisi !',
				// 	'valid_email' => 'Email tidak benar !'
				// ]);
				// $this->form_validation->set_rules('alamat', 'Alamat' , 'required|trim', [
				// 	'required' => 'Alamat harus diisi !'
				// ]);
				// $this->form_validation->set_rules('telepon', 'No.Telepon' , 'required|trim|numeric', [
				// 	'required' => 'No.Telepon harus diisi !',
				// 	'numeric' => 'Isi no telepon harus angka !'
				// ]);
				// $this->form_validation->set_rules('gender', 'Jenis Kelamin' , 'required|trim', [
				// 	'required' => 'Jenis kelamin harus dipilih !'
				// ]);
	
			if($this->form_validation->run() == false){
				$this->t_transaksi();
			}else{
				$this->AdminModel->simpan_db_transaksi();
				// $this->AdminModel->simpan_db_detail_transaksi();
				$this->session->set_flashdata('sukses', 'ditambahkan.');
				redirect('AdminControl/m_transaksi');
			}
			// trigger detail transaksi
			// BEGIN
			// 	INSERT INTO tb_detail_transaksi set 
			// 	id_transaksi = new.id,
			// 	id_paket=new.id_paket,
			// 	jumlah=new.jumlah,
			// 	keterangan = "Terima Kasih telah menggunakan jasa laundry kami :)"; 
			// END
		}

	// pengolahan data laporan
		public function get_data_cabang_paket(){
			$id = $this->input->post('id_cabang', true);
			$data = $this->AdminModel->get_data_outlet_paket($id)->result();
			echo json_encode($data);
		}

		// pdf
			// data transaksi
				public function run_laporan_pdf(){
					$data_pilihan =  $this->input->post('pilih_laporan_data_pdf', true);

					if($data_pilihan == "struk_transaksi"){
						$kode_invoice = $this->input->post('kode_nuklir_pdf', true);
						
						// cek kode
						$kode_nuklir = $this->db->get_where('tb_transaksi', ['kode_invoice' => $kode_invoice])->row_array();

						// jika kode ada
						if($kode_nuklir){
							$this->report_struk_transaksi_pdf($kode_invoice);
						}else{
							// jika kode tidak ada
							$this->session->set_flashdata('gagal_pdf', 'Kode transaksi tidak valid !');
							redirect('AdminControl/laporan');
						}

					}elseif($data_pilihan == "data_pelanggan"){
						$this->report_data_pelanggan_pdf();
					}elseif($data_pilihan == "data_cabang"){
						$this->report_data_cabang_pdf();
					}elseif($data_pilihan == "data_user"){
						$jenis_user = $this->input->post('pilih_ju_laporan_data_pdf_data_user_c1', true);
						$cabang_toko_id = $this->input->post('pilih_ctu_laporan_data_pdf_data_user_c1', true);

						$this->report_data_user_pdf($cabang_toko_id, $jenis_user);

					}elseif($data_pilihan == "data_paket"){
						$cabang_toko_id = $this->input->post('pilih_ctp_laporan_data_pdf_data_paket_c1', true);

						$this->report_data_paket_pdf($cabang_toko_id);

					}elseif($data_pilihan == "data_transaksi"){
						$cabang_toko_id = $this->input->post('pilih_ctt_laporan_data_pdf_data_user_c1', true);
						$tanggal_radio = $this->input->post('tanggalRadiospdf', true);
						$dari_tanggal = date('Y-m-d', strtotime($this->input->post('dari_tanggal_pdf', true)));
						$sampai_tanggal = date('Y-m-d', strtotime($this->input->post('sampai_tanggal_pdf', true)));
						// echo $dari_tanggal;
						// echo $sampai_tanggal;
						// die;

						$this->report_data_transaksi_pdf($cabang_toko_id, $tanggal_radio, $dari_tanggal, $sampai_tanggal);
					}else{
						echo "404 page belom dibikin";
					}
				}

				public function run_laporan_xls(){
					$data_pilihan =  $this->input->post('pilih_laporan_data_xls', true);

					if($data_pilihan == "struk_transaksi"){
						$kode_invoice = $this->input->post('kode_nuklir_xls', true);
						
						// cek kode
						$kode_nuklir = $this->db->get_where('tb_transaksi', ['kode_invoice' => $kode_invoice])->row_array();

						// jika kode ada
						if($kode_nuklir){
							$this->report_struk_transaksi_xls($kode_invoice);
						}else{
							// jika kode tidak ada
							$this->session->set_flashdata('gagal_xls', 'Kode transaksi tidak valid !');
							redirect('AdminControl/laporan');
						}

					}elseif($data_pilihan == "data_pelanggan"){
						$this->report_data_pelanggan_xls();
					}elseif($data_pilihan == "data_user"){
						$jenis_user = $this->input->post('pilih_ju_laporan_data_xls_data_user_c1', true);
						$cabang_toko_id = $this->input->post('pilih_ctu_laporan_data_xls_data_user_c1', true);

						$this->report_data_user_xls($cabang_toko_id, $jenis_user);
					}elseif($data_pilihan == "data_cabang"){
						$this->report_data_cabang_xls();
					}elseif($data_pilihan == "data_paket"){
						$cabang_toko_id = $this->input->post('pilih_ctu_laporan_data_xls_data_user_c1', true);

						$this->report_data_paket_xls($cabang_toko_id);

					}elseif($data_pilihan == "data_transaksi"){
						$cabang_toko_id = $this->input->post('pilih_ctt_laporan_data_xls_data_user_c1', true);
						$tanggal_radio = $this->input->post('tanggalRadiosxls', true);
						$dari_tanggal = date('Y-m-d', strtotime($this->input->post('dari_tanggal_xls', true)));
						$sampai_tanggal = date('Y-m-d', strtotime($this->input->post('sampai_tanggal_xls', true)));
						// echo $dari_tanggal;
						// echo $sampai_tanggal;
						// die;

						$this->report_data_transaksi_xls($cabang_toko_id, $tanggal_radio, $dari_tanggal, $sampai_tanggal);
					}else{
						echo "404 page blom dibikin";
					}
				}

			// data transaksi
				public function report_data_transaksi_pdf($cabang_toko_id ,$tanggal_radio, $dari_tanggal, $sampai_tanggal){
					ob_start();

					if($cabang_toko_id == "semua_cabang"){
						if($tanggal_radio != "semua_tanggal_pdf"){
							$data["tb_transaksi_onecb"] = "";
							$data['outlet_onecb'] = "";
							$data['h_transaksi_onecb'] = "";
							$data['tb_transaksi_allcb_alltgl'] = "";
							$data['h_transaksi_allcb_alltgl'] = "";
							$data['tb_transaksi_onecb_onetgl'] = "";
							$data['h_transaksi_onecb_onetgl'] = "";
							$data['tb_transaksi_onecb_alltgl'] = "";
							$data['h_transaksi_onecb_alltgl'] = "";

							$data['tb_transaksi_allcb_onetgl'] = $this->db->query("SELECT * FROM tb_transaksi WHERE DATE(tgl) >= '$dari_tanggal' AND DATE(tgl) <= '$sampai_tanggal'")->result();
							$data['h_transaksi_allcb_onetgl'] = $this->db->query("SELECT * FROM tb_transaksi WHERE DATE(tgl) >= '$dari_tanggal' AND DATE(tgl) <= '$sampai_tanggal'")->num_rows();
						}else{
							$data["tb_transaksi_onecb"] = "";
							$data['outlet_onecb'] = "";
							$data['h_transaksi_onecb'] = "";
							$data['tb_transaksi_allcb_onetgl'] = "";
							$data['h_transaksi_allcb_onetgl'] = "";
							$data['tb_transaksi_onecb_onetgl'] = "";
							$data['h_transaksi_onecb_onetgl'] = "";
							$data['tb_transaksi_onecb_alltgl'] = "";
							$data['h_transaksi_onecb_alltgl'] = "";
							
							$data['tb_transaksi_allcb_alltgl'] = $this->db->query("SELECT * FROM tb_transaksi")->result();
							$data['h_transaksi_allcb_alltgl'] = $this->db->query("SELECT * FROM tb_transaksi")->num_rows();
						}
					}else{
						if($tanggal_radio != "semua_tanggal_pdf"){
							$data['outlet_onecb'] = $cabang_toko_id;
							$data['tb_transaksi_onecb'] = "ada";
							$data['h_transaksi_onecb'] = "ada";
							$data['tb_transaksi_allcb_onetgl'] = "";
							$data['h_transaksi_allcb_onetgl'] = "";
							$data['tb_transaksi_allcb_alltgl'] = "";
							$data['h_transaksi_allcb_alltgl'] = "";
							$data['tb_transaksi_onecb_alltgl'] = "";
							$data['h_transaksi_onecb_alltgl'] = "";

							$data['tb_transaksi_onecb_onetgl'] = $this->db->query("SELECT * FROM tb_transaksi WHERE DATE(tgl) >= '$dari_tanggal' AND DATE(tgl) <= '$sampai_tanggal' AND id_outlet = '$cabang_toko_id'")->result();
							$data['h_transaksi_onecb_onetgl'] = $this->db->query("SELECT * FROM tb_transaksi WHERE DATE(tgl) >= '$dari_tanggal' AND DATE(tgl) <= '$sampai_tanggal' AND id_outlet = '$cabang_toko_id'")->num_rows();
						}else{
							$data['outlet_onecb'] = $cabang_toko_id;
							$data['tb_transaksi_onecb'] = "ada";
							$data['h_transaksi_onecb'] = "ada";
							$data['tb_transaksi_allcb_onetgl'] = "";
							$data['h_transaksi_allcb_onetgl'] = "";
							$data['tb_transaksi_allcb_alltgl'] = "";
							$data['h_transaksi_allcb_alltgl'] = "";
							$data['tb_transaksi_onecb_onetgl'] = "";
							$data['h_transaksi_onecb_onetgl'] = "";

							$data['tb_transaksi_onecb_alltgl'] = $this->db->query("SELECT * FROM tb_transaksi WHERE id_outlet = '$cabang_toko_id'")->result();
							$data['h_transaksi_onecb_alltgl'] = $this->db->query("SELECT * FROM tb_transaksi WHERE id_outlet = '$cabang_toko_id'")->num_rows();
						}
					}
					
					$data['paket'] = $this->AdminModel->get_db_paket();
					$data['member'] = $this->AdminModel->get_db_member();
					$data['outlet'] = $this->AdminModel->get_db_outlet();
					$data['outlet_id'] = $this->db->get_where('tb_outlet', ['id' => $cabang_toko_id])->row_array();
					$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
					
					$this->load->view('websiteLaundryPBO/admin/print_data/pdf/data_transaksi_pdf', $data);
					// echo "berhasil";
					// die;
					
					$html = ob_get_contents();
						ob_end_clean();

					require './assets/html2pdf/autoload.php';

					$pdf = new Spipu\Html2Pdf\Html2Pdf('L', 'A4', 'en');
					$pdf->writeHTML($html);

					// nama file
					$pdf->output('Data_transaksi_'.date('d-M-Y').'.pdf', 'D');
				} 
			// data paket laundry
				public function report_data_paket_pdf($cabang_toko_id){
					ob_start();
				
					if($cabang_toko_id == "semua_cabang"){
						$data['tb_paket'] = $this->AdminModel->get_db_paket();
						$data['h_paket'] = $this->AdminModel->h_paket();
						$data['tb_paket_onecb'] = "";
						$data['h_paket_onecb'] = "";
						$data['outlet_onecb'] = "";
						$data['outlet'] = $this->AdminModel->get_db_outlet();
						$data['jenis'] = $this->AdminModel->get_jenis_paket();
						$data['satuan'] = $this->AdminModel->get_jenis_satuan();
					}else{
						$data['tb_paket'] = "";
						$data['h_paket'] = "";
						$data['tb_paket_onecb'] = $data = $this->db->get_where("tb_paket", ['id_outlet' => $cabang_toko_id])->result();
						$data['h_paket_onecb'] = $this->db->get_where("tb_paket", ['id_outlet' => $cabang_toko_id])->num_rows();
						$data['outlet_onecb'] = $cabang_toko_id;
						$data['outlet'] = $this->db->get_where("tb_outlet", ['id' => $cabang_toko_id])->row_array();
						$data['jenis'] = $this->AdminModel->get_jenis_paket();
						$data['satuan'] = $this->AdminModel->get_jenis_satuan();
					}

					$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
					$this->load->view('websiteLaundryPBO/admin/print_data/pdf/data_paket_pdf', $data);

					$html = ob_get_contents();
						ob_end_clean();

					require './assets/html2pdf/autoload.php';

					$pdf = new Spipu\Html2Pdf\Html2Pdf('L', 'A4', 'en');
					$pdf->writeHTML($html);

					// nama file
					$pdf->output('Data_Paket_'.date('d-M-Y').'.pdf', 'D');
				}

			// data user
				public function report_data_user_pdf($cabang_toko_id ,$jenis_user){
					ob_start();

					if($cabang_toko_id == "semua_cabang"){
						if($jenis_user != "semua_user"){
							$data["jenis_user"] = $jenis_user;
							$data["tb_user_onecb"] = "";
							$data["outlet_onecb"] = "";
							$data["h_user_onecb"] = "";
							$data['tb_user_allcb'] = $this->db->get_where("tb_user", ['role' => $jenis_user])->result();
							$data['h_user_allcb'] = $this->db->get_where("tb_user", ['role' => $jenis_user])->num_rows();
						}else{
							$data["jenis_user"] = $jenis_user;
							$data["tb_user_onecb"] = "";
							$data["outlet_onecb"] = "";
							$data["h_user_onecb"] = "";
							$data['tb_user_allcb'] = $this->db->get("tb_user")->result();
							$data['h_user_allcb'] = $this->db->get("tb_user")->num_rows();
						}
					}else{
						if($jenis_user != "semua_user"){
							$data["jenis_user"] = $jenis_user;
							$data['outlet_onecb'] = $cabang_toko_id;
							$data['tb_user_onecb'] = $this->db->get_where("tb_user", ['role' => $jenis_user, 'id_outlet' => $cabang_toko_id])->result();
							$data['h_user_onecb'] = $this->db->get_where("tb_user", ['role' => $jenis_user, 'id_outlet' => $cabang_toko_id])->num_rows();
						}else{
							$data["jenis_user"] = $jenis_user;
							$data['outlet_onecb'] = $cabang_toko_id;
							$data['tb_user_onecb'] = $this->db->get_where("tb_user", ['id_outlet' => $cabang_toko_id])->result();
							$data['h_user_onecb'] = $this->db->get_where("tb_user", ['id_outlet' => $cabang_toko_id])->num_rows();
						}
					}

					$data['outlet'] = $this->AdminModel->get_db_outlet();
					$data['outlet_id'] = $this->db->get_where('tb_outlet', ['id' => $cabang_toko_id])->row_array();
					$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

					$this->load->view('websiteLaundryPBO/admin/print_data/pdf/data_user_pdf', $data);

					$html = ob_get_contents();
						ob_end_clean();

					require './assets/html2pdf/autoload.php';

					$pdf = new Spipu\Html2Pdf\Html2Pdf('L', 'A4', 'en');
					$pdf->writeHTML($html);

					// nama file
					$pdf->output('Data_user_'.date('d-M-Y').'.pdf', 'D');
				} 

			// data cabang
				public function report_data_cabang_pdf(){
					ob_start();

					$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
					$data['tb_outlet'] = $this->AdminModel->get_db_outlet();
					$data['h_outlet'] = $this->AdminModel->h_outlet();

					$this->load->view('websiteLaundryPBO/admin/print_data/pdf/data_cabang_pdf', $data);

					$html = ob_get_contents();
						ob_end_clean();

					require './assets/html2pdf/autoload.php';

					$pdf = new Spipu\Html2Pdf\Html2Pdf('L', 'A4', 'en');
					$pdf->writeHTML($html);

					// nama file
					$pdf->output('Data_CabangToko_'.date('d-M-Y').'.pdf', 'D');
				}

			// data pelangggan / member
				public function report_data_pelanggan_pdf(){
					ob_start();

					$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
					$data['member'] = $this->AdminModel->get_db_member();
					$data['outlet'] = $this->AdminModel->get_db_outlet();
					$data['h_member'] = $this->AdminModel->h_member();

					$this->load->view('websiteLaundryPBO/admin/print_data/pdf/data_pelanggan_pdf', $data);

					$html = ob_get_contents();
						ob_end_clean();

					require './assets/html2pdf/autoload.php';

					$pdf = new Spipu\Html2Pdf\Html2Pdf('L', 'A4', 'en');
					$pdf->writeHTML($html);

					// nama file
					$pdf->output('Data_Pelanggan_'.date('d-M-Y').'.pdf', 'D');
				}
			// struk transaksi
					public function report_struk_transaksi_pdf($kode_invoice){
						ob_start();

						$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
						$data['paket'] = $this->AdminModel->get_db_paket();
						$data['member'] = $this->AdminModel->get_db_member();
						$data['outlet'] = $this->AdminModel->get_db_outlet();
						$data['tb_member'] = $this->AdminModel->get_db_member();
						$data['tb_paket'] = $this->AdminModel->get_db_paket();
						$data['tb_transaksi'] = $this->AdminModel->get_db_transaksi();
						$data['status_order'] = $this->AdminModel->get_status_order();
						$data['status_dibayar'] = $this->AdminModel->get_status_dibayar();
						$data['h_transaksi_baru'] = $this->AdminModel->h_transaksi_baru();
						$data['h_total_transaksi'] = $this->AdminModel->h_total_transaksi();
						$data['data_struk_transaksi'] = $this->AdminModel->get_data_struk_transaksi($kode_invoice);

						$this->load->view('websiteLaundryPBO/admin/print_data/pdf/struk_transaksi_pdf', $data);

						$html = ob_get_contents();
							ob_end_clean();

						require './assets/html2pdf/autoload.php';

						$pdf = new Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'en');
						$pdf->writeHTML($html);

						// nama file
						$pdf->output('Struk_transaksi_'.$kode_invoice.'.pdf', 'D');
					}
		
		// xls
			// data transaksi
				public function report_data_transaksi_xls($cabang_toko_id ,$tanggal_radio, $dari_tanggal, $sampai_tanggal){
					header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
					header('Content-Disposition: attachment; filename="Data_Transaksi.xls"');
					header('Cache-Control: max-age=0');

					if($cabang_toko_id == "semua_cabang"){
						if($tanggal_radio != "semua_tanggal_xls"){
							$data["tb_transaksi_onecb"] = "";
							$data['outlet_onecb'] = "";
							$data['h_transaksi_onecb'] = "";
							$data['tb_transaksi_allcb_alltgl'] = "";
							$data['h_transaksi_allcb_alltgl'] = "";
							$data['tb_transaksi_onecb_onetgl'] = "";
							$data['h_transaksi_onecb_onetgl'] = "";
							$data['tb_transaksi_onecb_alltgl'] = "";
							$data['h_transaksi_onecb_alltgl'] = "";

							$data['tb_transaksi_allcb_onetgl'] = $this->db->query("SELECT * FROM tb_transaksi WHERE DATE(tgl) >= '$dari_tanggal' AND DATE(tgl) <= '$sampai_tanggal'")->result();
							$data['h_transaksi_allcb_onetgl'] = $this->db->query("SELECT * FROM tb_transaksi WHERE DATE(tgl) >= '$dari_tanggal' AND DATE(tgl) <= '$sampai_tanggal'")->num_rows();
						}else{
							$data["tb_transaksi_onecb"] = "";
							$data['outlet_onecb'] = "";
							$data['h_transaksi_onecb'] = "";
							$data['tb_transaksi_allcb_onetgl'] = "";
							$data['h_transaksi_allcb_onetgl'] = "";
							$data['tb_transaksi_onecb_onetgl'] = "";
							$data['h_transaksi_onecb_onetgl'] = "";
							$data['tb_transaksi_onecb_alltgl'] = "";
							$data['h_transaksi_onecb_alltgl'] = "";
							
							$data['tb_transaksi_allcb_alltgl'] = $this->db->query("SELECT * FROM tb_transaksi")->result();
							$data['h_transaksi_allcb_alltgl'] = $this->db->query("SELECT * FROM tb_transaksi")->num_rows();
						}
					}else{
						if($tanggal_radio != "semua_tanggal_xls"){
							$data['outlet_onecb'] = $cabang_toko_id;
							$data['tb_transaksi_onecb'] = "ada";
							$data['h_transaksi_onecb'] = "ada";
							$data['tb_transaksi_allcb_onetgl'] = "";
							$data['h_transaksi_allcb_onetgl'] = "";
							$data['tb_transaksi_allcb_alltgl'] = "";
							$data['h_transaksi_allcb_alltgl'] = "";
							$data['tb_transaksi_onecb_alltgl'] = "";
							$data['h_transaksi_onecb_alltgl'] = "";

							$data['tb_transaksi_onecb_onetgl'] = $this->db->query("SELECT * FROM tb_transaksi WHERE DATE(tgl) >= '$dari_tanggal' AND DATE(tgl) <= '$sampai_tanggal' AND id_outlet = '$cabang_toko_id'")->result();
							$data['h_transaksi_onecb_onetgl'] = $this->db->query("SELECT * FROM tb_transaksi WHERE DATE(tgl) >= '$dari_tanggal' AND DATE(tgl) <= '$sampai_tanggal' AND id_outlet = '$cabang_toko_id'")->num_rows();
						}else{
							$data['outlet_onecb'] = $cabang_toko_id;
							$data['tb_transaksi_onecb'] = "ada";
							$data['h_transaksi_onecb'] = "ada";
							$data['tb_transaksi_allcb_onetgl'] = "";
							$data['h_transaksi_allcb_onetgl'] = "";
							$data['tb_transaksi_allcb_alltgl'] = "";
							$data['h_transaksi_allcb_alltgl'] = "";
							$data['tb_transaksi_onecb_onetgl'] = "";
							$data['h_transaksi_onecb_onetgl'] = "";

							$data['tb_transaksi_onecb_alltgl'] = $this->db->query("SELECT * FROM tb_transaksi WHERE id_outlet = '$cabang_toko_id'")->result();
							$data['h_transaksi_onecb_alltgl'] = $this->db->query("SELECT * FROM tb_transaksi WHERE id_outlet = '$cabang_toko_id'")->num_rows();
						}
					}
					
					$data['paket'] = $this->AdminModel->get_db_paket();
					$data['member'] = $this->AdminModel->get_db_member();
					$data['outlet'] = $this->AdminModel->get_db_outlet();
					$data['outlet_id'] = $this->db->get_where('tb_outlet', ['id' => $cabang_toko_id])->row_array();
					$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
					
					// echo "berhasil";
					// die;
					$this->load->view('websiteLaundryPBO/admin/print_data/xls/data_transaksi_xls', $data);
				} 
			// data pelanggan / member
				public function report_data_pelanggan_xls(){
					header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
					header('Content-Disposition: attachment; filename="Data_Pelanggan.xls"');
					header('Cache-Control: max-age=0');

					$data['member'] = $this->AdminModel->get_db_member();
					$data['outlet'] = $this->AdminModel->get_db_outlet();
					$data['h_member'] = $this->AdminModel->h_member();
					$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
					$this->load->view('websiteLaundryPBO/admin/print_data/xls/data_pelanggan_xls', $data);
				}
			
			// data user
				public function report_data_user_xls($cabang_toko_id, $jenis_user){
					header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
					header('Content-Disposition: attachment; filename="Data_User.xls"');
					header('Cache-Control: max-age=0');

					if($cabang_toko_id == "semua_cabang"){
						if($jenis_user != "semua_user"){
							$data["jenis_user"] = $jenis_user;
							$data["tb_user_onecb"] = "";
							$data["outlet_onecb"] = "";
							$data["h_user_onecb"] = "";
							$data['tb_user_allcb'] = $this->db->get_where("tb_user", ['role' => $jenis_user])->result();
							$data['h_user_allcb'] = $this->db->get_where("tb_user", ['role' => $jenis_user])->num_rows();
						}else{
							$data["jenis_user"] = $jenis_user;
							$data["tb_user_onecb"] = "";
							$data["outlet_onecb"] = "";
							$data["h_user_onecb"] = "";
							$data['tb_user_allcb'] = $this->db->get("tb_user")->result();
							$data['h_user_allcb'] = $this->db->get("tb_user")->num_rows();
						}
					}else{
						if($jenis_user != "semua_user"){
							$data["jenis_user"] = $jenis_user;
							$data['outlet_onecb'] = $cabang_toko_id;
							$data['tb_user_onecb'] = $this->db->get_where("tb_user", ['role' => $jenis_user, 'id_outlet' => $cabang_toko_id])->result();
							$data['h_user_onecb'] = $this->db->get_where("tb_user", ['role' => $jenis_user, 'id_outlet' => $cabang_toko_id])->num_rows();
						}else{
							$data["jenis_user"] = $jenis_user;
							$data['outlet_onecb'] = $cabang_toko_id;
							$data['tb_user_onecb'] = $this->db->get_where("tb_user", ['id_outlet' => $cabang_toko_id])->result();
							$data['h_user_onecb'] = $this->db->get_where("tb_user", ['id_outlet' => $cabang_toko_id])->num_rows();
						}
					}

					$data['outlet'] = $this->AdminModel->get_db_outlet();
					$data['outlet_id'] = $this->db->get_where('tb_outlet', ['id' => $cabang_toko_id])->row_array();
					$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
					$this->load->view('websiteLaundryPBO/admin/print_data/xls/data_user_xls', $data);
				} 	

			// data cabang
				public function report_data_cabang_xls(){
					header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
					header('Content-Disposition: attachment; filename="Data_CabangToko.xls"');
					header('Cache-Control: max-age=0');

					$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
					$data['tb_outlet'] = $this->AdminModel->get_db_outlet();
					$data['h_outlet'] = $this->AdminModel->h_outlet();
					$this->load->view('websiteLaundryPBO/admin/print_data/xls/data_cabang_xls', $data);
				}
			
			// data paket laundry
				public function report_data_paket_xls($cabang_toko_id){
					header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
					header('Content-Disposition: attachment; filename="Data_PaketLaundry.xls"');
					header('Cache-Control: max-age=0');

					if($cabang_toko_id == "semua_cabang"){
						$data['tb_paket'] = $this->AdminModel->get_db_paket();
						$data['h_paket'] = $this->AdminModel->h_paket();
						$data['tb_paket_onecb'] = "";
						$data['h_paket_onecb'] = "";
						$data['outlet_onecb'] = "";
						$data['outlet'] = $this->AdminModel->get_db_outlet();
						$data['jenis'] = $this->AdminModel->get_jenis_paket();
						$data['satuan'] = $this->AdminModel->get_jenis_satuan();
					}else{
						$data['tb_paket'] = "";
						$data['h_paket'] = "";
						$data['tb_paket_onecb'] = $data = $this->db->get_where("tb_paket", ['id_outlet' => $cabang_toko_id])->result();
						$data['h_paket_onecb'] = $this->db->get_where("tb_paket", ['id_outlet' => $cabang_toko_id])->num_rows();
						$data['outlet_onecb'] = $cabang_toko_id;
						$data['outlet'] = $this->db->get_where("tb_outlet", ['id' => $cabang_toko_id])->row_array();
						$data['jenis'] = $this->AdminModel->get_jenis_paket();
						$data['satuan'] = $this->AdminModel->get_jenis_satuan();
					}

					$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

					$this->load->view('websiteLaundryPBO/admin/print_data/xls/data_paket_xls', $data);
				}
			
			// struk transaksi
				public function report_struk_transaksi_xls($kode_invoice){
					header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
					header('Content-Disposition: attachment; filename="Data_StrukTransaksi.xls"');
					header('Cache-Control: max-age=0');

					$data['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();
					$data['paket'] = $this->AdminModel->get_db_paket();
					$data['member'] = $this->AdminModel->get_db_member();
					$data['outlet'] = $this->AdminModel->get_db_outlet();
					$data['tb_member'] = $this->AdminModel->get_db_member();
					$data['tb_paket'] = $this->AdminModel->get_db_paket();
					$data['tb_transaksi'] = $this->AdminModel->get_db_transaksi();
					$data['status_order'] = $this->AdminModel->get_status_order();
					$data['status_dibayar'] = $this->AdminModel->get_status_dibayar();
					$data['h_transaksi_baru'] = $this->AdminModel->h_transaksi_baru();
					$data['h_total_transaksi'] = $this->AdminModel->h_total_transaksi();
					$data['data_struk_transaksi'] = $this->AdminModel->get_data_struk_transaksi($kode_invoice);

					$this->load->view('websiteLaundryPBO/admin/print_data/xls/struk_transaksi_xls', $data);
				}
}
