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
			$data = array(
				'id' => '',
				'id_outlet' => $this->input->post('cabang', true),
				'jenis' =>  $this->input->post('jenis', true),
				'nama_paket' =>  $this->input->post('namapaket', true),
				'harga' => $this->input->post('harga', true)
			);

			$this->db->insert('tb_paket', $data);
		}
		public function get_jenis_paket(){
			$query = "SHOW COLUMNS FROM tb_paket WHERE FIELD = 'jenis'";
			$row = $this->db->query($query)->row()->Type;
			$regex = "/'(.*?)'/";
			preg_match_all( $regex , $row, $enum_array );
			$enum_fields = $enum_array[1];
			return( $enum_fields );
		}
		public function get_db_paket(){
			// $data = $this->db->get("tb_user");
			$data = $this->db->get("tb_paket");
			return $data->result();
		}
		public function h_paket(){
			$data = $data = $this->db->get("tb_paket");
			return $data->num_rows();
		}
		// public function detail_db_paket($id = NULL){
		// 	$query = $this->db->get_where('tb_user', array('id' => $id))->row();
		// 	return $query;
		// }
		public function hapus_db_paket($id){
			$this->db->delete('tb_paket', array('id' => $id));
		}
		public function get_data_edit_db_paket($id){
			$data = $this->db->query("SELECT * FROM tb_paket WHERE id='$id'");
			return $data->result();
		}
		public function edit_db_paket(){
			$id = $this->input->post('id');
			$data = array(
				'id' => $id,
				'id_outlet' => $this->input->post('cabang', true),
				'jenis' =>  $this->input->post('jenis', true),
				'nama_paket' =>  $this->input->post('namapaket', true),
				'harga' => $this->input->post('harga', true)
			);

			$this->db->where('id', $id);
			$this->db->update('tb_paket', $data);
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
			// $data = $this->db->get("tb_user");
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
			$data = $data = $this->db->get_where("tb_transaksi", ['status' => 'baru']);
			return $data->num_rows();
		}
		public function h_total_transaksi(){
			$data = $data = $this->db->get("tb_transaksi");
			return $data->num_rows();
		}
}


?>
