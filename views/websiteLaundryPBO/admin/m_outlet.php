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
			<a href="<?php echo site_url('AdminControl/home'); ?>">Home</a> / <span class="text-muted">Manajemen Cabang toko</span>
		</span> 
	</div>
</nav>

<div class="isi">

	<h6><i class="fas fa-fw fa-store"></i> Manajemen Cabang toko</h6>
	<div class="row row-cols-1 row-cols-md-3 text-center">
		<div class="col col-md-12 mb-4">
			<div class="card bg-light h-100">
				<!-- <img src="..." class="card-img-top" alt="..."> -->
				<div class="card-body">
					<i class="fas fa-fw fa-store" style="width: 50px;  height: 50px;"></i>
					<h5 class="card-title">Total cabang tersedia</h5>
					<p class="card-text">
						<span id="total_outlet">
							<?= $h_outlet; ?>
						</span>
					</p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="garis"></div>
	
	<div class="tabel">
		<i class="fas fa-fw fa-store"></i> Data cabang
			<a href="<?php echo site_url('AdminControl/laporan'); ?>" type="button" class="btn btn-success float-right">Buat laporan</a>
		<br><br>
		<!-- <a href="</?php echo site_url('AdminControl/t_outlet'); ?>" class="btn btn-info">Tambah cabang</a> -->
		<button type="button" name="btn-tambah" id="btn-tambah" class="btn btn-info" data-toggle="modal" data-target="#form-modal-tambah-outlet">Tambah cabang</button>

		<br><br>
			<!-- </?php if($this->session->flashdata('sukses')) { ?> -->
				<div class="alert alert-success alert-dismissible fade show" role="alert" id="pesan-sukses">
					<!-- Data outlet <strong>Berhasil</strong> </?= $this->session->flashdata('sukses'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button> -->
				</div>
			<!-- </?php } ?> -->
		<br>
		
		<div id="view">
			<?php $this->load->view('websiteLaundryPBO/admin/tabel/tabel_outlet', ['tb_outlet'=>$tb_outlet]); ?>
		</div>

	</div>

<!-- modal crud outlet ajax -->
	<!-- edit -->
		<div class="modal fade" id="form-modal-edit-outlet" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							<i class="fas fa-fw fa-store"></i> Ubah data cabang
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- Beri id "pesan-error" untuk menampung pesan error -->
						<div id="pesan-error" class="alert alert-danger"></div>
						
						<form enctype="multipart/form-data" id="modal-ubah-outlet">
							<input type="hidden" name="id" id="id">
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="namacabang">Nama cabang</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="text" class="form-control" id="namacabang" name="nama" placeholder="Masukkan Nama cabang" required>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="alamatcabang">Alamat cabang</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="text" class="form-control" id="alamatcabang" name="alamat" placeholder="Masukkan alamat cabang" required>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="tlp">Telepon</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="number" class="form-control" id="tlp" name="telepon" placeholder="Masukkan Telepon" required>
								</div>
							</div>
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

	<!-- tambah -->
		<div class="modal fade" id="form-modal-tambah-outlet" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							<i class="fas fa-fw fa-store"></i> Tambah outlet
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- Beri id "pesan-error" untuk menampung pesan error -->
						<div id="pesan-error" class="alert alert-danger"></div>
						
						<form enctype="multipart/form-data" id="modal-tambah-outlet">
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="namacabang">Nama cabang</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="text" class="form-control" id="namacabang" name="nama" placeholder="Masukkan Nama cabang" required>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="alamatcabang">Alamat cabang</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="text" class="form-control" id="alamatcabang" name="alamat" placeholder="Masukkan alamat cabang" required>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="tlp">Telepon</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="number" class="form-control" id="tlp" name="telepon" placeholder="Masukkan Telepon" required>
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

<div class="garis"></div>
</div>
</div>

<script>
	$(document).ready(function(){
		// crud outlet
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
						url: '<?= base_url(); ?>AdminControl/crud_outlet/simpan/'+null+'', // URL tujuan
						type: 'POST',
						// data: $("#form-modal form").serialize(),
						data: new FormData(document.getElementById('modal-tambah-outlet')),
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
								
								$('#form-modal-tambah-outlet').modal('hide');
								
								// Ganti isi dari div view dengan view yang diambil dari proses_simpan.php
								$('#view').html(response.html)
								$('#total_outlet').html(response.hitung_outlet)
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
									title: 'Data outlet berhasil disimpan'
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
					// $('#modal-title').html('<i class="fas fa-user-edit"></i> Edit outlet');
					
					var tr = $(this).closest('tr');
					var id = tr.find('.id-value_ubah').val();
					var nama = tr.find('.nama-value_ubah').val();
					var alamat = tr.find('.alamat-value_ubah').val();
					var tlp = tr.find('.tlp-value_ubah').val();
					
					$('#id').val(id);
					$('#namacabang').val(nama);
					$('#alamatcabang').val(alamat);
					$('#tlp').val(tlp);

					$('#loading-ubah').hide();
					$('#text-tombol-ubah').html('Ubah');
				});

				$('#btn-ubah').click(function(){
					$('#loading-ubah').show(); // Munculkan loading ubah
					$('#text-tombol-ubah').html('Sedang mengubah...'); // ganti text ubah jadi sedang mangubah

					$.ajax({
						url: '<?= base_url(); ?>AdminControl/crud_outlet/ubah/'+id+'', // URL tujuan
						type: 'POST',
						// data: $("#form-modal form").serialize(),
						data: new FormData(document.getElementById('modal-ubah-outlet')),
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

								$('#form-modal-edit-outlet').modal('hide');

								// Ganti isi dari div view dengan view yang diambil dari proses_ubah.php
								$('#view').html(response.html)
								$('#total_outlet').html(response.hitung_outlet)
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
									title: 'Data outlet berhasil diubah'
								})

							}else{
								$('#pesan-error').html(response.pesan).show()
							}
						}
					});
				});


	});
</script>

