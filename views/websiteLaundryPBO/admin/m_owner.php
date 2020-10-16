<!-- Page Content  -->
<div id="content">

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
	<div class="container-fluid">
		<!-- <button type="button" id="sidebarCollapse" class="btn btn-info">
			<i class="fas fa-bars"></i>
			<span>Toggle Sidebar</span>
		</button>
		<button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fas fa-align-justify"></i>
		</button> -->
		<span class="text-left">
			<a href="#">Home</a> / <span class="text-muted">Manajemen User</span> / <span class="text-muted">Owner</span>
		</span> 
	</div>
</nav>

<div class="isi">

	<h6><i class="fas fa-user"></i> Manajemen Data Owner</h6>
	<div class="row row-cols-1 row-cols-md-3 text-center">
		<div class="col col-md-12 mb-4">
			<div class="card bg-light h-100">
				<!-- <img src="..." class="card-img-top" alt="..."> -->
				<div class="card-body">
					<i class="fas fa-users" style="width: 50px;  height: 50px;"></i>
					<h5 class="card-title">Total Owner</h5>
					<p class="card-text">
						<span id="total_owner">
							<?= $h_owner; ?>
						</span>
					</p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="garis"></div>
	
	<div class="tabel">
		<i class="fas fa-user"></i> Data Owner
			<a href="<?php echo site_url('AdminControl/laporan'); ?>" type="button" class="btn btn-success float-right">Buat laporan</a>
		<br><br>
		<!-- <a href="</?php echo site_url('AdminControl/t_owner'); ?>" class="btn btn-info">Tambah Owner</a>  -->
		<button type="button" name="btn-tambah" id="btn-tambah" class="btn btn-info" data-toggle="modal" data-target="#form-modal-tambah-owner">Tambah owner</button>

		<br><br>

		<!-- </?php if($this->session->flashdata('sukses')) { ?> -->
			<div class="alert alert-success alert-dismissible fade show" role="alert" id="pesan-sukses">
				<!-- Data owner <strong>Berhasil</strong> </?= $this->session->flashdata('sukses'); ?> -->
				<!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close"> -->
					<!-- <span aria-hidden="true">&times;</span> -->
				<!-- </button> -->
			</div>
		<!-- </?php } ?> -->

		<br>

		<div id="view">
			<?php $this->load->view('websiteLaundryPBO/admin/tabel/tabel_owner', ['tb_user'=>$tb_user]); ?>
		</div>
	</div>
	
<!-- modal crud owner ajax -->
	<!-- edit -->
		<div class="modal fade" id="form-modal-edit-owner" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							<i class="fas fa-user-edit"></i> Ubah biodata owner
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- Beri id "pesan-error" untuk menampung pesan error -->
						<div id="pesan-error" class="alert alert-danger"></div>
						
						<form enctype="multipart/form-data" id="modal-ubah-owner">
							<input type="hidden" name="id" id="id">
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="namalengkap">Nama Lengkap</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="text" class="form-control" name="nama" id="namalengkap" placeholder="Masukkan Nama Lengkap" required>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="username">Nama Pengguna</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Nama Pengguna (username)" disabled>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="email">Email</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" required>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="alamat">Alamat Lengkap</label>
								</div>
								<div class="col-md-10 mb-3">
									<textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat owner" cols="30" rows="5" required></textarea>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="telepon">Telepon</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="number" class="form-control" name="telepon" id="telepon" placeholder="Masukkan No. Telepon" required>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="gender">Jenis Kelamin</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" name="gender" id="gender" required>
										<option value="" selected disabled>> Pilih Jenis Kelamin <</option>
										<option value="pria">Pria</option>
										<option value="wanita">Wanita</option>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="foto">Foto Profil</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="row">
										<div class="col-md-2">
											<input type="hidden" name="gambarlama" id="foto-lama">
											<img src="" id="tampil-img" style="width: 100px; height: 100px;" class="img-thumbnail">
										</div>
										<div class="col-md-10">
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="gambar" name="foto">
												<label class="custom-file-label" for="gambar">Choose file</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="user">Tipe user</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" id="user" disabled>
										<option>admin</option>
										<option>kasir</option>
										<option selected>owner</option>
									</select>
								</div>
							</div>
							<input type="hidden" name="cabang-id" id="cabang-id">
						</form>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
						<button type="submit" id="btn-ubah" class="btn btn-primary">
							<!-- loading ubah -->
							<span class="spinner-border spinner-border-sm" id="loading-ubah" role="status" aria-hidden="true"></span>
							
							<span id="text-tombol-ubah"></span>
						</button>
					</div>
				</div>
			</div>
		</div>

	<!-- hapus -->
		<div class="modal fade" id="form-modal-hapus-owner" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							<i class="fas fa-fw fa-user-minus"></i> Konfirmasi hapus owner
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form enctype="multipart/form-data" id="modal-hapus-owner">
							<input type="hidden" name="gambarlama" id="foto-lama_hapus">
							Apakah anda yakin ingin menghapus data ini?
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
						<button type="submit" id="btn-hapus" class="btn btn-primary">
							<!-- loading hapus -->
							<span class="spinner-border spinner-border-sm" id="loading-hapus" role="status" aria-hidden="true"></span>
							
							<span id="text-tombol-hapus"></span>
						</button>
					</div>
				</div>
			</div>
		</div>
	<!-- tambah -->
		<div class="modal fade" id="form-modal-tambah-owner" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							<i class="fas fa-user-plus"></i> Tambah owner
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- Beri id "pesan-error" untuk menampung pesan error -->
						<div id="pesan-error" class="alert alert-danger"></div>
						
						<form enctype="multipart/form-data" id="modal-tambah-owner">
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="namalengkap">Nama Lengkap</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="text" class="form-control" name="nama" id="namalengkap" placeholder="Masukkan Nama Lengkap" value="<?= set_value('nama') ?>">
									<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="username">Nama Pengguna</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Nama Pengguna (username)" value="<?= set_value('username') ?>">
									<?= form_error('username', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="password">kata sandi</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Kata sandi (password)">
									<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="email">Email</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="<?= set_value('email') ?>">
									<?= form_error('email', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="alamat">Alamat Lengkap</label>
								</div>
								<div class="col-md-10 mb-3">
									<textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat Owner" cols="30" rows="5"><?= set_value('alamat') ?></textarea>
									<?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="telepon">Telepon</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="number" class="form-control" name="telepon" id="telepon" placeholder="Masukkan No. Telepon" value="<?= set_value('telepon') ?>">
									<?= form_error('telepon', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="gender">Jenis Kelamin</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" name="gender" id="gender">
										<option value="" selected disabled>> Pilih Jenis Kelamin <</option>
										<option value="pria">Pria</option>
										<option value="wanita">Wanita</option>
									</select>
									<?= form_error('gender', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="foto">Foto Profil</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="row">
										<div class="col-md-12">
											<!-- <input type="file" name="foto" id="foto" style="width: 100%;"> -->
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="foto" name="foto">
												<label class="custom-file-label" for="foto">Choose file</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="user">Tipe user</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" id="user" disabled>
										<option>admin</option>
										<option>kasir</option>
										<option selected>owner</option>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="cabang-id">Cabang</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" id="cabang-id" name="cabang-id">
										<option value="" selected disabled>> Pilih Cabang Toko <</option>
										<?php foreach($outlet as $cabang) : ?>
											<!-- /</?php if( $cabang == $edit->jenis_cabang) { ?> -->
												<option value="<?= $cabang->id; ?>"><?= $cabang->nama; ?></option>
											<!-- /</?php }?> -->
										<?php endforeach; ?>
									</select>
									<?= form_error('cabang', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
						</form>
						
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
						<button type="submit" id="btn-simpan" class="btn btn-primary">
							<!-- loading simpan -->
							<span class="spinner-border spinner-border-sm" id="loading-simpan" role="status" aria-hidden="true"></span>
							
							<span id="text-tombol-tambah"></span>
						</button>
					</div>
				</div>
			</div>
		</div>
	<!-- detail -->
		<div class="modal fade" id="form-modal-detail-owner" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-cog"></i> Detail biodata Owner</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<fieldset disabled>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="namalengkap_detail">Nama Lengkap</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="text" class="form-control" name="nama" id="namalengkap_detail" placeholder="Masukkan Nama Lengkap" required disabled>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="username_detail">Nama Pengguna</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="text" class="form-control" name="username" id="username_detail" placeholder="Masukkan Nama Pengguna (username)" required disabled>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="email_detail">Email</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="email" class="form-control" name="email" id="email_detail" placeholder="Masukkan Email" required disabled>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="alamat_detail">Alamat Lengkap</label>
								</div>
								<div class="col-md-10 mb-3">
									<textarea name="alamat" id="alamat_detail" class="form-control" placeholder="Masukkan Alamat Owner" cols="30" rows="5" required disabled></textarea>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="telepon_detail">Telepon</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="number" class="form-control" name="telepon" id="telepon_detail" placeholder="Masukkan No. Telepon" required disabled>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="gender_detail">Jenis Kelamin</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" name="gender" id="gender_detail" required disabled>
										<option value="" selected disabled>> Pilih Jenis Kelamin <</option>
										<option value="pria">Pria</option>
										<option value="wanita">Wanita</option>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="foto_detail">Foto Profil</label>
								</div>
								<div class="col-md-10 mb-3">
									<img src="" id="tampil-img_detail" style="width: 100px; height: 100px;" class="img-thumbnail">
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="user_detail">Tipe user</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" id="user_detail" disabled>
										<option>admin</option>
										<option>kasir</option>
										<option selected>owner</option>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="cabang_detail">Cabang</label>
								</div>
								<div class="col-md-10 mb-3">
									<input ype="text" class="form-control" name="cabang-id" id="cabang-id_detail">
								</div>
							</div>
						</fieldset>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Mengerti</button>
						<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
					</div>
				</div>
			</div>
		</div>

<div class="garis"></div>
</div>
</div>

<script>
	$(document).ready(function(){
		// crud Owner
			var id = 0;
			$("#loading-simpan, #loading-ubah, #loading-hapus, #pesan-error, #pesan-sukses").hide();

			$('#form-modal').on('hidden.bs.modal', function (e){ // Ketika Modal Dialog di Close / tertutup
				$('#form-modal input, #form-modal select, #form-modal textarea').val(''); // Clear inputan menjadi kosong
				$('#pesan-error').hide();
			});
			
			// tambah
				$('#btn-tambah').click(function(){ // Ketika tombol tambah diklik

					$('#form-modal input, #form-modal select, #form-modal textarea').val(''); // Clear inputan menjadi kosong
					$('#pesan-error').hide();

					$('#loading-simpan').hide();
					$('#text-tombol-tambah').html('Tambah');
				});

				$('#btn-simpan').click(function(){ // Ketika tombol simpan didalam modal di klik
					$('#loading-simpan').show(); // Munculkan loading simpan
					$('#text-tombol-tambah').html('Sedang menambahkan...'); // ganti text tambah jadi sedang menyimpan

					$.ajax({
						url: '<?= base_url(); ?>AdminControl/crud_owner/simpan/'+null+'', // URL tujuan
						type: 'POST',
						// data: $("#form-modal form").serialize(),
						data: new FormData(document.getElementById('modal-tambah-owner')),
						processData:false,
						contentType:false,
						cache:false,
						async:false,
						dataType: 'JSON',
						beforeSend: function() {
							$('#loading-simpan').show(); // Munculkan loading simpan
							$('#text-tombol-tambah').html('Sedang menambahkan...'); // ganti text tambah jadi sedang menyimpan
						},
						success: function(response){
							$('#loading-simpan').hide()
							if(response.status == 'sukses'){ // Jika Statusnya = sukses
								
								$('#form-modal-tambah-owner').modal('hide');
								
								// Ganti isi dari div view dengan view yang diambil dari proses_simpan.php
								$('#view').html(response.html)
								$('#total_owner').html(response.hitung_owner)
								$('#pesan-sukses').html(response.pesan).fadeIn().delay(10000).fadeOut();

								const Toast = Swal.mixin({
									toast: true,
									position: 'top-end',
									showConfirmButton: false,
									timer: 10000,
									timerProgressBar: true,
									didOpen: (toast) => {
										toast.addEventListener('mouseenter', Swal.stopTimer)
										toast.addEventListener('mouseleave', Swal.resumeTimer)
									}
								});
								Toast.fire({
									icon: 'success',
									title: 'Data owner berhasil disimpan'
								});

							}else{
								$('#pesan-error').html(response.pesan).show();
								$('#text-tombol-tambah').html('x Terjadi kesalahan x');
								setTimeout(() => {
									$('#text-tombol-tambah').html('Tambah');
								}, 2000);
							}
						},
						error: function (xhr, ajaxOptions, thrownError) {
							alert(xhr.responseText);
						}
					});
				});

			// edit
				$('#view').on('click', '.btn-form-ubah', function(){
					id = $(this).data('id'); // Set variabel id dengan id yang kita set pada atribut data-id pada tag button edit
					
					// $('#btn-simpan').hide();
					$('#btn-ubah').show();
					
					// Set judul modal dialog menjadi Form Ubah Data
					// $('#modal-title').html('<i class="fas fa-user-edit"></i> Edit owner');
					
					var tr = $(this).closest('tr');
					var id = tr.find('.id-value_ubah').val();
					var nama = tr.find('.nama-value_ubah').val();
					var username = tr.find('.username-value_ubah').val();
					var email = tr.find('.email-value_ubah').val();
					var alamat = tr.find('.alamat-value_ubah').val();
					var tlp = tr.find('.tlp-value_ubah').val();
					var gender = tr.find('.jenis_kelamin-value_ubah').val();
					var foto = tr.find('.foto-value_ubah').val();
					var role = tr.find('.role-value_ubah').val();
					var id_outlet = tr.find('.id_outlet-value_ubah').val();
					
					$('#id').val(id);
					$('#namalengkap').val(nama);
					$('#username').val(username);
					$('#email').val(email);
					$('#alamat').val(alamat);
					$('#telepon').val(tlp);
					$('#gender').val(gender);
					$('#foto-lama').val(foto);
					$('#tampil-img').attr("src", "<?= base_url();?>assets/img/foto/"+foto+"");
					$('#user').val(role);
					$('#cabang-id').val(id_outlet);

					$('#loading-ubah').hide();
					$('#text-tombol-ubah').html('Ubah');
				});

				$('#btn-ubah').click(function(){
					$('#loading-ubah').show(); // Munculkan loading ubah
					$('#text-tombol-ubah').html('Sedang mengubah...'); // ganti text ubah jadi sedang mangubah

					$.ajax({
						url: '<?= base_url(); ?>AdminControl/crud_owner/ubah/'+id+'', // URL tujuan
						type: 'POST',
						// data: $("#form-modal form").serialize(),
						data: new FormData(document.getElementById('modal-ubah-owner')),
						processData:false,
						contentType:false,
						cache:false,
						async:false,
						dataType: 'JSON',
						beforeSend: function() {
							$('#loading-ubah').show(); // Munculkan loading ubah
							$('#text-tombol-ubah').html('Sedang mengubah...'); // ganti text ubah jadi sedang mangubah
						},
						success: function(response){
							$('#loading-ubah').hide();
							if(response.status == 'sukses'){

								$('#form-modal-edit-owner').modal('hide');

								// Ganti isi dari div view dengan view yang diambil dari proses_ubah.php
								$('#view').html(response.html)
								$('#total_owner').html(response.hitung_owner)
								$('#pesan-sukses').html(response.pesan).fadeIn().delay(10000).fadeOut();

								const Toast = Swal.mixin({
									toast: true,
									position: 'top-end',
									showConfirmButton: false,
									timer: 10000,
									timerProgressBar: true,
									didOpen: (toast) => {
										toast.addEventListener('mouseenter', Swal.stopTimer)
										toast.addEventListener('mouseleave', Swal.resumeTimer)
									}
								})
								Toast.fire({
									icon: 'success',
									title: 'Data berhasil diubah'
								})

							}else{
								$('#pesan-error').html(response.pesan).show()
							}
						}
					});
				});

			// hapus
				$('#view').on('click', '.btn-alert-hapus', function(){ // Ketika tombol dengan class btn-alert-hapus pada div view di klik
					id = $(this).data('id') // Set variabel id dengan id yang kita set pada atribut data-id pada tag button hapus

					var tr = $(this).closest('tr');
					var foto = tr.find('.foto-value_ubah').val();
					$('#foto-lama_hapus').val(foto);

					$('#loading-hapus').hide();
					$('#text-tombol-hapus').html('Hapus');
				});
				
				$("#btn-hapus").click(function(){ // ketika tombol hapus didalam modal di klik
					$('#loading-hapus').show(); // Munculkan loading hapus
					$('#text-tombol-hapus').html('Sedang menghapus...'); // ganti text hapus jadi sedang menghapus

					$.ajax({
						url: '<?= base_url(); ?>AdminControl/crud_owner/hapus/'+id+'', // URL tujuan
						type: 'POST', // Tentukan type nya POST atau GET
						data: new FormData(document.getElementById('modal-hapus-owner')),
						processData:false,
						contentType:false,
						cache:false,
						async:false,
						dataType: 'JSON',
						beforeSend: function() {
							$('#loading-hapus').show(); // Munculkan loading hapus
							$('#text-tombol-hapus').html('Sedang menghapus...'); // ganti text hapus jadi sedang menghapus
						},
						success: function(response){ // Ketika proses pengiriman berhasil
							$('#loading-hapus').hide(); // Sembunyikan loading hapus

							$('#form-modal-hapus-owner').modal('hide'); // Close / Tutup Modal Dialog
							
							// Ganti isi dari div view dengan view yang diambil dari proses_hapus.php
							$('#view').html(response.html);
							$('#total_owner').html(response.hitung_owner);
							$('#pesan-sukses').html(response.pesan).fadeIn().delay(10000).fadeOut();

							const Toast = Swal.mixin({
								toast: true,
								position: 'top-end',
								showConfirmButton: false,
								timer: 10000,
								timerProgressBar: true,
								didOpen: (toast) => {
									toast.addEventListener('mouseenter', Swal.stopTimer)
									toast.addEventListener('mouseleave', Swal.resumeTimer)
								}
							});
							Toast.fire({
								icon: 'success',
								title: 'Data berhasil dihapus'
							});
						},
						error: function (xhr, ajaxOptions, thrownError) {
							alert(xhr.responseText);
						}
					});
				});

			// detail
				$('#view').on('click', '.btn-form-detail', function(){
					id = $(this).data('id'); // Set variabel id dengan id yang kita set pada atribut data-id pada tag button edit
					
					// $('#btn-simpan').hide();
					// $('#btn-ubah').show();
					
					// Set judul modal dialog menjadi Form Ubah Data
					// $('#modal-title').html('<i class="fas fa-user-edit"></i> Edit owner');
					
					var tr = $(this).closest('tr');
					var id = tr.find('.id-value_detail').val();
					var nama = tr.find('.nama-value_detail').val();
					var username = tr.find('.username-value_detail').val();
					var email = tr.find('.email-value_detail').val();
					var alamat = tr.find('.alamat-value_detail').val();
					var tlp = tr.find('.tlp-value_detail').val();
					var gender = tr.find('.jenis_kelamin-value_detail').val();
					var foto = tr.find('.foto-value_detail').val();
					var role = tr.find('.role-value_detail').val();
					var id_outlet = tr.find('.id_outlet-value_detail').val();
					
					$('#namalengkap_detail').val(nama);
					$('#username_detail').val(username);
					$('#email_detail').val(email);
					$('#alamat_detail').val(alamat);
					$('#telepon_detail').val(tlp);
					$('#gender_detail').val(gender);
					$('#tampil-img_detail').attr("src", "<?= base_url();?>assets/img/foto/"+foto+"");
					$('#user_detail').val(role);
					$('#cabang-id_detail').val(id_outlet);
				});
	});
</script>
