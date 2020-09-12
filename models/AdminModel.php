<?php

Class AdminModel extends CI_Model{

	// manajemen kasir
		public function simpan_db_kasir(){
			// cek jika ada gambar yang diupload
			$upload_foto = $_FILES['foto']['name'];
					
			if(!empty($upload_foto)){
				$config['upload_path'] = './assets/img/foto/';
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$config['max_size'] = '15048000';
				// $config['max_width'] = '1024';
				// $config['max_height'] = '768';
				$config['file_name'] = url_title($this->input->post('foto'));

				// $filename = $this->upload->file_name;
				$this->upload->initialize($config);
				if($this->upload->do_upload('foto')){

					$gambar_baru = $this->upload->data('file_name');
					$this->db->set('foto', $gambar_baru);
					// $nama_gambar_baru = $this->upload->data('file_name');
					// $this->db->set('foto', $nama_gambar_baru);
				}else{
					echo $this->upload->display_errors();
				}
				// $data = $this->upload->data();
			}else{
				$this->db->set('foto', 'default.jpg');
			}

			$this->db->set('nama', $this->input->post('nama', true));
			$this->db->set('username', $this->input->post('username', true));
			$this->db->set('password', password_hash($this->input->post('password', true), PASSWORD_DEFAULT));
			$this->db->set('email', $this->input->post('email', true));
			$this->db->set('alamat', $this->input->post('alamat', true));
			$this->db->set('tlp', $this->input->post('telepon', true));
			$this->db->set('jenis_kelamin', $this->input->post('gender', true));
			$this->db->set('role', 'kasir');
			$this->db->set('id_outlet', $this->input->post('cabang', true));
			$this->db->set('tgl_dibuat', time());
			$this->db->set('is_active', 'offline');

			$this->db->insert('tb_user');
			// redirect('AdminControl/m_kasir');
			// header("Location:".base_url().'AdminControl/m_kasir');
		}
		public function get_db_kasir(){
			// $data = $this->db->get("tb_user");
			$data = $this->db->get_where("tb_user", ['role' => 'kasir']);
			return $data->result();
		}
		public function h_kasir(){
			$data = $data = $this->db->get_where("tb_user", ['role' => 'kasir']);
			return $data->num_rows();
		}
		public function detail_db_kasir($id = NULL){
			$query = $this->db->get_where('tb_user', array('id' => $id))->row();
			return $query;
		}
		public function hapus_db_kasir($id){
			$this->db->delete('tb_user', array('id' => $id));
		}
		public function get_data_edit_db_kasir($id){
			$data = $this->db->query("SELECT * FROM tb_user WHERE id='$id'");
			return $data->result();
		}
		public function edit_db_kasir(){
			$upload_foto = $_FILES['foto']['name'];
					
			if(!empty($upload_foto)){
				$config['upload_path'] = './assets/img/foto/';
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$config['max_size'] = '15048000';
				// $config['max_width'] = '1024';
				// $config['max_height'] = '768';
				$config['file_name'] = url_title($this->input->post('foto'));

				
				// $filename = $this->upload->file_name;
				$this->upload->initialize($config);
				if($this->upload->do_upload('foto')){

					// hapus gambar lama
						$gambar_lama = $this->input->post('gambarlama');
						if($gambar_lama != 'default.jpg'){
							unlink(FCPATH . '/assets/img/foto/' . $gambar_lama);
						}
						
						// }
						$gambar_baru = $this->upload->data('file_name');
						$this->db->set('foto', $gambar_baru);
				}else{
					echo $this->upload->display_errors();
				}
				// $data = $this->upload->data();
			}else{
				$gambar_lama = $this->input->post('gambarlama');
				$this->db->set('foto', $gambar_lama);
			}

			$id = $this->input->post('id');
			$this->db->set('nama', $this->input->post('nama', true));
			// $this->db->set('username', $this->input->post('username', true));
			$this->db->set('password', password_hash($this->input->post('password', true), PASSWORD_DEFAULT));
			$this->db->set('email', $this->input->post('email', true));
			$this->db->set('alamat', $this->input->post('alamat', true));
			$this->db->set('tlp', $this->input->post('telepon', true));
			$this->db->set('jenis_kelamin', $this->input->post('gender', true));
			$this->db->set('role', 'kasir');
			$this->db->set('id_outlet', $this->input->post('cabang', true));
			// $this->db->set('tgl_dibuat', time());
			$this->db->set('is_active', 'offline');

			$this->db->where('id', $id);
			$this->db->update('tb_user');
		}

	// manajemen member
		public function simpan_db_member(){
			$this->db->set('nama', $this->input->post('nama', true));
			$this->db->set('email', $this->input->post('email', true));
			$this->db->set('alamat', $this->input->post('alamat', true));
			$this->db->set('tlp', $this->input->post('telepon', true));
			$this->db->set('jenis_kelamin', $this->input->post('gender', true));

			$this->db->insert('tb_member');
			// redirect('AdminControl/m_kasir');
			// header("Location:".base_url().'AdminControl/m_kasir');
		}
		public function get_db_member(){
			$data = $this->db->get("tb_member");
			return $data->result();
		}
		public function h_member(){
			$data = $data = $this->db->get("tb_member");
			return $data->num_rows();
		}
		public function get_data_edit_db_member($id){
			$data = $this->db->query("SELECT * FROM tb_member WHERE id='$id'");
			return $data->result();
		}
		public function edit_db_member(){
			$id = $this->input->post('id');
			$this->db->set('nama', $this->input->post('nama', true));
			$this->db->set('email', $this->input->post('email', true));
			$this->db->set('alamat', $this->input->post('alamat', true));
			$this->db->set('tlp', $this->input->post('telepon', true));
			$this->db->set('jenis_kelamin', $this->input->post('gender', true));

			$this->db->where('id', $id);
			$this->db->update('tb_member');
		}
		public function hapus_db_member($id){
			$this->db->delete('tb_member', array('id' => $id));
		}
	// manajemen admin
		public function get_db_admin(){
			$data = $this->db->get_where("tb_user", ['role' => 'admin']);
			return $data->result();
		}
		public function h_admin(){
			$data = $data = $this->db->get_where("tb_user", ['role' => 'admin']);
			return $data->num_rows();
		}
		public function detail_db_admin($id = NULL){
			$query = $this->db->get_where('tb_user', array('id' => $id))->row();
			return $query;
		}

		// profil
			public function get_db_profil(){
				// $data = $this->db->get("tb_user");
				$data = $this->db->get("tb_user");
				return $data->result();
			}
			public function get_data_edit_db_profil(){
				$data = $this->db->query("SELECT * FROM tb_user WHERE id=''");
				return $data->result();
			}
			public function edit_db_profil(){
				$datap['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

				// cek jika ada gambar yang diupload
					$upload_foto = $_FILES['foto']['name'];
					
					if(!empty($upload_foto)){
						$config['upload_path'] = './assets/img/foto/';
						$config['allowed_types'] = 'jpg|png|jpeg|gif';
						$config['max_size'] = '15048000';
						// $config['max_width'] = '1024';
						// $config['max_height'] = '768';
						$config['file_name'] = url_title($this->input->post('foto'));
		
						// $this->load->library('upload', $config);
						$this->upload->initialize($config);

						if($this->upload->do_upload('foto')){

							// hapus gambar lama
								$gambar_lama = $datap['tb_user']['foto'];
								if($gambar_lama != 'default.jpg'){
									unlink(FCPATH . '/assets/img/foto/' . $gambar_lama);
								}
								
								// }
								$gambar_baru = $this->upload->data('file_name');
								$this->db->set('foto', $gambar_baru);
								// $nama_gambar_baru = $this->upload->data('file_name');
							// $this->db->set('foto', $nama_gambar_baru);
						}else{
							echo $this->upload->display_errors();
						}
					}else{
						$gambar_lama = $datap['tb_user']['foto'];
						$this->db->set('foto', $gambar_lama);
					}

					$this->db->set('nama', $this->input->post('nama', true));
					$this->db->set('email', $this->input->post('email', true));
					$this->db->set('alamat', $this->input->post('alamat', true));
					$this->db->set('tlp', $this->input->post('telepon', true));
					$this->db->set('jenis_kelamin', $this->input->post('gender', true));

					$this->db->where('id', $this->session->userdata('id'));
					$this->db->update('tb_user');
			}
		// password
			public function edit_db_password(){
				$datap['tb_user'] = $this->db->get_where('tb_user', ['username' => $this->session->userdata('username')])->row_array();

				$passwordlama = $this->input->post('passwordsaatini');
				$passwordbaru = $this->input->post('passwordbaru1');

				if(!password_verify($passwordlama, $datap['tb_user']['password'])){
					// password salah
					$this->session->set_flashdata('gagal', 'Kata sandi lama salah !');
					redirect('AdminControl/e_password');
				}else{
					// password benar
					if($passwordlama == $passwordbaru){
						// password sama seperti yang lama
						$this->session->set_flashdata('gagal', 'Kata sandi baru tidak boleh sama dengan kata sandi lama !');
						redirect('AdminControl/e_password');
					}else{
						// password tidak sama seperti yang lama
						$acak_password = password_hash($passwordbaru, PASSWORD_DEFAULT);

						$this->db->set('password', $acak_password);
						$this->db->where('id', $this->session->userdata('id'));
						$this->db->update('tb_user');

						$this->session->set_flashdata('sukses', 'Kata sandi telah berhasil diubah !');
						redirect('AdminControl/e_password');
					}
				}

				// $id = $this->input->post('id');
				// $data = array(
				// 	'id' => $id,	
				// 	'nama' =>  $this->input->post('nama', true),
				// 	// 'username' =>  htmlspecialchars($this->input->post('username', true)),
				// 	// 'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				// 	'email' =>  $this->input->post('email', true),
				// 	'alamat' => $this->input->post('alamat', true),
				// 	'tlp' => $this->input->post('telepon', true),
				// 	'jenis_kelamin' => $this->input->post('gender', true),
				// 	// 'foto' => $nama_gambar_baru,
				// 	'role' => 'admin'
				// 	// 'id_outlet' => $this->input->post('cabang', true),
				// 	// 'tgl_dibuat' => time()
				// 	// 'is_active' => 'online'
				// );

				// $this->db->where('id', $id);
				// $this->db->update('tb_user', $data);
			}

	// manajemen owner
		public function simpan_db_owner(){
			// cek jika ada gambar yang diupload
			$upload_foto = $_FILES['foto']['name'];
					
			if(!empty($upload_foto)){
				$config['upload_path'] = './assets/img/foto/';
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$config['max_size'] = '15048000';
				// $config['max_width'] = '1024';
				// $config['max_height'] = '768';
				$config['file_name'] = url_title($this->input->post('foto'));

				// $filename = $this->upload->file_name;
				$this->upload->initialize($config);
				if($this->upload->do_upload('foto')){

					$gambar_baru = $this->upload->data('file_name');
					$this->db->set('foto', $gambar_baru);
					// $nama_gambar_baru = $this->upload->data('file_name');
					// $this->db->set('foto', $nama_gambar_baru);
				}else{
					echo $this->upload->display_errors();
				}
				// $data = $this->upload->data();
			}else{
				$this->db->set('foto', 'default.jpg');
			}

			$this->db->set('nama', $this->input->post('nama', true));
			$this->db->set('username', $this->input->post('username', true));
			$this->db->set('password', password_hash($this->input->post('password', true), PASSWORD_DEFAULT));
			$this->db->set('email', $this->input->post('email', true));
			$this->db->set('alamat', $this->input->post('alamat', true));
			$this->db->set('tlp', $this->input->post('telepon', true));
			$this->db->set('jenis_kelamin', $this->input->post('gender', true));
			$this->db->set('role', 'owner');
			$this->db->set('id_outlet', $this->input->post('cabang', true));
			$this->db->set('tgl_dibuat', time());
			$this->db->set('is_active', 'offline');

			$this->db->insert('tb_user');
		}
		public function get_db_owner(){
			// $data = $this->db->get("tb_user");
			$data = $this->db->get_where("tb_user", ['role' => 'owner']);
			return $data->result();
		}
		public function h_owner(){
			$data = $data = $this->db->get_where("tb_user", ['role' => 'owner']);
			return $data->num_rows();
		}
		public function detail_db_owner($id = NULL){
			$query = $this->db->get_where('tb_user', array('id' => $id))->row();
			return $query;
		}
		public function hapus_db_owner($id){
			$this->db->delete('tb_user', array('id' => $id));
		}
		public function get_data_edit_db_owner($id){
			$data = $this->db->query("SELECT * FROM tb_user WHERE id='$id'");
			return $data->result();
		}
		public function edit_db_owner(){
			$upload_foto = $_FILES['foto']['name'];
					
			if(!empty($upload_foto)){
				$config['upload_path'] = './assets/img/foto/';
				$config['allowed_types'] = 'jpg|png|jpeg|gif';
				$config['max_size'] = '15048000';
				// $config['max_width'] = '1024';
				// $config['max_height'] = '768';
				$config['file_name'] = url_title($this->input->post('foto'));

				
				// $filename = $this->upload->file_name;
				$this->upload->initialize($config);
				if($this->upload->do_upload('foto')){

					// hapus gambar lama
						$gambar_lama = $this->input->post('gambarlama');
						if($gambar_lama != 'default.jpg'){
							unlink(FCPATH . '/assets/img/foto/' . $gambar_lama);
						}
						
						// }
						$gambar_baru = $this->upload->data('file_name');
						$this->db->set('foto', $gambar_baru);
				}else{
					echo $this->upload->display_errors();
				}
				// $data = $this->upload->data();
			}else{
				$gambar_lama = $this->input->post('gambarlama');
				$this->db->set('foto', $gambar_lama);
			}

			$id = $this->input->post('id');
			$this->db->set('nama', $this->input->post('nama', true));
			// $this->db->set('username', $this->input->post('username', true));
			$this->db->set('password', password_hash($this->input->post('password', true), PASSWORD_DEFAULT));
			$this->db->set('email', $this->input->post('email', true));
			$this->db->set('alamat', $this->input->post('alamat', true));
			$this->db->set('tlp', $this->input->post('telepon', true));
			$this->db->set('jenis_kelamin', $this->input->post('gender', true));
			$this->db->set('role', 'owner');
			$this->db->set('id_outlet', $this->input->post('cabang', true));
			// $this->db->set('tgl_dibuat', time());
			$this->db->set('is_active', 'offline');

			$this->db->where('id', $id);
			$this->db->update('tb_user');
		}

	// manajemen paket laundry
		public function simpan_db_paket(){

			$this->db->set('id_outlet', $this->input->post('cabang', true));
			$this->db->set('jenis', $this->input->post('jenis', true));
			$this->db->set('nama_paket', $this->input->post('namapaket', true));
			$this->db->set('harga', $this->input->post('harga', true));
			$this->db->set('satuan', $this->input->post('satuan', true));
			if($this->input->post('inputan_diskon')){
				$this->db->set('diskon', $this->input->post('inputan_diskon', true));
			}elseif($this->input->post('inputan_diskon') === null){
				$this->db->set('diskon', '0');
			}
			$this->db->insert('tb_paket');
		}
		public function get_jenis_paket(){
			$query = "SHOW COLUMNS FROM tb_paket WHERE FIELD = 'jenis'";
			$row = $this->db->query($query)->row()->Type;
			$regex = "/'(.*?)'/";
			preg_match_all( $regex , $row, $enum_array );
			$enum_fields = $enum_array[1];
			return( $enum_fields );
		}
		public function get_jenis_satuan(){
			$query = "SHOW COLUMNS FROM tb_paket WHERE FIELD = 'satuan'";
			$row = $this->db->query($query)->row()->Type;
			$regex = "/'(.*?)'/";
			preg_match_all( $regex , $row, $enum_array );
			$enum_fields = $enum_array[1];
			return( $enum_fields );
		}
		public function get_db_paket(){
			$data = $this->db->get("tb_paket");
			return $data->result();
		}
		public function h_paket(){
			$data = $this->db->get("tb_paket");
			return $data->num_rows();
		}
		public function hapus_db_paket($id){
			$this->db->delete('tb_paket', array('id' => $id));
		}
		public function get_data_edit_db_paket($id){
			$data = $this->db->query("SELECT * FROM tb_paket WHERE id='$id'");
			return $data->result();
		}
		public function edit_db_paket(){
			$id = $this->input->post('id');

			$this->db->set('id_outlet', $this->input->post('cabang', true));
			$this->db->set('jenis', $this->input->post('jenis', true));
			$this->db->set('nama_paket', $this->input->post('namapaket', true));
			$this->db->set('harga', $this->input->post('harga', true));
			$this->db->set('satuan', $this->input->post('satuan', true));
			$this->db->set('diskon', $this->input->post('inputan_diskon', true));

			$this->db->where('id', $id);
			$this->db->update('tb_paket');
			// redirect('AdminControl/m_owner');

		}

	// manajemen outlet
		public function simpan_db_outlet(){
			$data = array(
				'id' => '',
				'nama' => $this->input->post('nama', true),
				'alamat' =>  $this->input->post('alamat', true),
				'tlp' =>  $this->input->post('telepon', true)
			);

			$this->db->insert('tb_outlet', $data);
		}
		public function get_db_outlet(){
			$data = $this->db->get("tb_outlet");
			return $data->result();
		}
		public function h_outlet(){
			$data = $data = $this->db->get("tb_outlet");
			return $data->num_rows();
		}
		public function get_data_edit_db_outlet($id){
			$data = $this->db->query("SELECT * FROM tb_outlet WHERE id='$id'");
			return $data->result();
		}
		public function edit_db_outlet(){
			$id = $this->input->post('id');
			$data = array(
				'id' => $id,
				'nama' => $this->input->post('nama', true),
				'alamat' =>  $this->input->post('alamat', true),
				'tlp' =>  $this->input->post('telepon', true)
			);

			$this->db->where('id', $id);
			$this->db->update('tb_outlet', $data);
			// redirect('AdminControl/m_owner');

		}
	// manajemen transaksi
		public function get_db_transaksi(){
			$data = $this->db->get("tb_transaksi");
			return $data->result();
		}
		public function h_transaksi_baru(){
			$data = $this->db->get_where("tb_transaksi", ['status' => 'baru']);
			return $data->num_rows();
		}
		public function h_total_transaksi(){
			$data = $this->db->get("tb_transaksi");
			return $data->num_rows();
		}
		public function get_status_order(){
			$query = "SHOW COLUMNS FROM tb_transaksi WHERE FIELD = 'status'";
			$row = $this->db->query($query)->row()->Type;
			$regex = "/'(.*?)'/";
			preg_match_all( $regex , $row, $enum_array );
			$enum_fields = $enum_array[1];
			return( $enum_fields );
		}
		public function get_status_dibayar(){
			$query = "SHOW COLUMNS FROM tb_transaksi WHERE FIELD = 'status_bayar'";
			$row = $this->db->query($query)->row()->Type;
			$regex = "/'(.*?)'/";
			preg_match_all( $regex , $row, $enum_array );
			$enum_fields = $enum_array[1];
			return( $enum_fields );
		}
		public function get_data_edit_db_transaksi($id){
			$data = $this->db->query("SELECT * FROM tb_transaksi WHERE id='$id'");
			return $data->result();
		}
			// struk transaksi
				public function get_data_struk_transaksi($kode_invoice){
					$data = $this->db->query("SELECT * FROM tb_transaksi WHERE kode_invoice='$kode_invoice'");
					return $data->result();
				}
		public function edit_db_transaksi(){
			$id = $this->input->post('id');
			$this->db->set('tunai', $this->input->post('harga_tunai_detail', true));
			$this->db->set('kembali_or_kurang', $this->input->post('harga_kembali_detail', true));
			$this->db->set('status', $this->input->post('edit_s_order', true));
			$this->db->set('status_bayar', $this->input->post('edit_s_pembayaran', true));

			$this->db->where('id', $id);
			$this->db->update('tb_transaksi');
		}

		public function get_data_paket($id){
			$query = $this->db->get_where("tb_paket", ['id' => $id]);
			return $query;
		}

		public function get_data_outlet_paket($id){
			$query = $this->db->get_where("tb_paket", ['id_outlet' => $id]);
			return $query;
		}

		public function simpan_db_transaksi(){
			$this->db->set('tgl', $this->input->post('tgl_transaksi', true));
			$this->db->set('kode_invoice', $this->input->post('kodeinvoice', true));
			$this->db->set('id_user', $this->input->post('id_petugas', true));
			$this->db->set('id_outlet', $this->input->post('cabang', true));
			$this->db->set('id_member', $this->input->post('namamember', true));
			$this->db->set('id_paket', $this->input->post('paket', true));
			$this->db->set('jumlah', $this->input->post('jumlah', true));
			$this->db->set('harga_jual', $this->input->post('harga_jual', true));
			$this->db->set('diskon', $this->input->post('diskon_paket', true));
			$this->db->set('harga_diskon', $this->input->post('harga_diskon', true));
			$this->db->set('biaya_tambahan', '500');
			$this->db->set('pajak', '500');
			$this->db->set('total', $this->input->post('total', true));
			$this->db->set('tunai', $this->input->post('tunai', true));
			$this->db->set('kembali_or_kurang', $this->input->post('kembali', true));
			$this->db->set('tipe_pembayaran', $this->input->post('t_pembayaran', true));
			$this->db->set('status', $this->input->post('s_order', true));
			if($this->input->post('s_pembayaran') == "Dibayar"){
				$this->db->set('tgl_bayar', date('Y/m/d H:i:s'));	
			}else{
				$this->db->set('tgl_bayar', '0000/00/00 00:00:00');
			}
			$this->db->set('tgl_ambil', date('Y/m/d H:i:s',strtotime($this->input->post('tgl_ambil'))));
			$this->db->set('status_bayar', $this->input->post('s_pembayaran', true));

			$this->db->insert('tb_transaksi');
		}
		// detail transaksi
			// public function simpan_db_detail_transaksi(){
			// 	$this->db->set('tgl', $this->input->post('tgl_transaksi', true));
			// 	$this->db->set('kode_invoice', $this->input->post('kodeinvoice', true));
			// 	$this->db->set('id_user', $this->input->post('id_petugas', true));
			// 	$this->db->set('id_outlet', $this->input->post('cabang', true));
			// 	$this->db->set('id_member', $this->input->post('namamember', true));
			// 	$this->db->set('id_paket', $this->input->post('paket', true));
			// 	$this->db->set('jumlah', $this->input->post('jumlah', true));
			// 	$this->db->set('harga_jual', $this->input->post('harga_jual', true));
			// 	$this->db->set('diskon', $this->input->post('diskon_paket', true));
			// 	$this->db->set('harga_diskon', $this->input->post('harga_diskon', true));
			// 	$this->db->set('biaya_tambahan', '500');
			// 	$this->db->set('pajak', '500');
			// 	$this->db->set('total', $this->input->post('total', true));
			// 	$this->db->set('tunai', $this->input->post('tunai', true));
			// 	$this->db->set('kembali_or_kurang', $this->input->post('kembali', true));
			// 	$this->db->set('tipe_pembayaran', $this->input->post('t_pembayaran', true));
			// 	$this->db->set('status', $this->input->post('s_order', true));
			// 	if($this->input->post('s_pembayaran') == "Dibayar"){
			// 		$this->db->set('tgl_bayar', date('Y/m/d H:i:s'));	
			// 	}else{
			// 		$this->db->set('tgl_bayar', '0000/00/00 00:00:00');
			// 	}
			// 	$this->db->set('tgl_ambil', date('Y/m/d H:i:s',strtotime($this->input->post('tgl_ambil'))));
			// 	$this->db->set('status_bayar', $this->input->post('s_pembayaran', true));

			// 	$this->db->insert('tb_transaksi');
			// }
}


?>
