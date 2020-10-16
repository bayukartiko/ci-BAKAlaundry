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
			<a href="#">Home</a> / <span class="text-muted">Manajemen Laundry</span>
		</span> 
	</div>
</nav>

<div class="isi">

	<h6><i class="fas fa-th-list"></i> Manajemen Paket Laundry</h6>
	<div class="row row-cols-1 row-cols-md-3 text-center">
		<div class="col col-md-12 mb-4">
			<div class="card bg-light h-100">
				<!-- <img src="..." class="card-img-top" alt="..."> -->
				<div class="card-body">
					<i class="fas fa-th-list" style="width: 50px;  height: 50px;"></i>
					<h5 class="card-title">Total Paket Laundry tersedia</h5>
					<p class="card-text">
						<span id="total_paket">
							<?= $h_paket; ?>
						</span>
					</p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="garis"></div>
	
	<div class="tabel">
		<i class="fas fa-th-list"></i> Data Paket Laundry
			<a href="<?php echo site_url('AdminControl/laporan'); ?>" type="button" class="btn btn-success float-right">Buat laporan</a>
		<br><br>
		<!-- <a href="</?php echo site_url('AdminControl/t_paket'); ?>" class="btn btn-info">Tambah Paket</a> -->
		<button type="button" name="btn-tambah" id="btn-tambah" class="btn btn-info" data-toggle="modal" data-target="#form-modal-tambah-paket">Tambah paket</button>

		<br><br>

			<!-- </?php if($this->session->flashdata('sukses')) { ?> -->
				<div class="alert alert-success alert-dismissible fade show" role="alert" id="pesan-sukses">
					<!-- Data paket <strong>Berhasil</strong> </?= $this->session->flashdata('sukses'); ?> -->
					<!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button> -->
				</div>
			<!-- </?php } ?> -->
			<br>
		
			<div id="view">
				<?php $this->load->view('websiteLaundryPBO/admin/tabel/tabel_paket', ['tb_paket'=>$tb_paket, 'outlet'=>$outlet]); ?>
			</div>

	</div>

<!-- modal crud paket ajax -->
	<!-- edit -->
		<div class="modal fade" id="form-modal-edit-paket" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							<i class="fas fa-th-list"></i> Ubah harga paket laundry
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- Beri id "pesan-error" untuk menampung pesan error -->
						<div id="pesan-error" class="alert alert-danger"></div>
						
						<form enctype="multipart/form-data" id="modal-ubah-paket">
							<input type="hidden" name="id" id="id">

							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="cabang_detail">Cabang Toko</label>
								</div>
								<div class="col-md-10 mb-3">
									<input ype="text" class="form-control" name="cabang-id" id="cabang-id_detail" disabled>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="namapaket">Nama Paket</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="text" class="form-control" id="namapaket" name="namapaket" disabled>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="jenis">Jenis Paket</label>
								</div>
								<div class="col-md-10 mb-3">
									<input ype="text" class="form-control" name="jenis" id="jenis" disabled>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="harga">Harga</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Rp.</span>
										</div>
										<input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga" required>
										<div class="input-group-append">
											<input type="text" class="form-control" id="satuan" name="satuan" disabled>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="diskon">Ubah Diskon ?</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="input-group input-grup-diskon mb-3">
										<input type="number" class="form-control" name="diskon" id="diskon" placeholder="Masukkan jumlah diskon" min="0" max="100" required>
										<div class="input-group-append">
											<span class="input-group-text">%</span>
										</div>
									</div>
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
		<div class="modal fade" id="form-modal-hapus-paket" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							<i class="fas fa-th-list"></i> Konfirmasi hapus paket laundry
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						Apakah anda yakin ingin menghapus paket laundry ini?
					</div>
					<div class="modal-footer">
						<!-- Beri id "btn-hapus" untuk tombol hapus nya -->
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
		<div class="modal fade" id="form-modal-tambah-paket" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							<i class="fas fa-th-list"></i> Tambah Data Paket Laundry</p>
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- Beri id "pesan-error" untuk menampung pesan error -->
						<div id="pesan-error" class="alert alert-danger"></div>
						
						<form enctype="multipart/form-data" id="modal-tambah-paket">
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="outlet">Cabang Toko</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" id="outlet" name="cabang" required>
										<option value="" selected disabled>> Pilih Cabang Toko <</option>
										<?php foreach($outlet as $cabang) : ?>
											<!-- /</?php if( $cabang == $edit->jenis_cabang) { ?> -->
												<option value="<?= $cabang->id; ?>"><?= $cabang->nama; ?></option>
											<!-- /</?php }?> -->
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="jenis">Jenis Paket Laundry</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" name="jenis" id="jenis" required>
										<option value="" selected disabled>> Pilih Jenis Paket Laundry <</option>
										<?php foreach($jenis as $j) : ?>
											<!-- /</?php if( $cabang == $edit->jenis_cabang) { ?> -->
												<option value="<?= $j ?>"><?= $j; ?></option>
											<!-- /</?php }?> -->
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="namapaket">Nama Paket Laundry</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="text" class="form-control" id="namapaket" name="namapaket" placeholder="Masukkan Nama Paket Laundry" required>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="harga">Harga</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Rp.</span>
										</div>
										<input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga" required>
										<div class="input-group-append">
											<select class="form-control" name="satuan" id="satuan" required>
												<?php foreach($satuan as $s) : ?>
														<option value="<?= $s ?>">/<?= $s; ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="diskon">Beri Diskon ?</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="custom-control custom-radio">
										<input class="custom-control-input checkboxtambah" type="radio" name="diskon?" id="ya" value="Ya" required>
										<label class="custom-control-label" for="ya">
											Ya, beri diskon untuk paket ini
										</label>
									</div>
									<div class="custom-control custom-radio">
										<input class="custom-control-input checkboxtambah" type="radio" name="diskon?" id="tidak" value="Tidak" required>
										<label class="custom-control-label" for="tidak">
											Tidak, mungkin nanti
										</label>
									</div>
									<div id="input_diskon"></div>
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
	
<!-- modal edit -->
	<?php foreach($tb_paket as $edit){  ?>
		<form action="<?= site_url('AdminControl/aksi_edit_paket') ?>" method="POST" enctype="multipart/form-data">
			<div class="modal fade" id="ModalEdit<?= $edit->id ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-edit"></i> ubah paket</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<input type="hidden" name="id" value="<?= $edit->id; ?>">

							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="outlet">Cabang Toko</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" id="outlet" name="cabang" required>
										<?php foreach($outlet as $cabang) : ?>
											<?php if( $cabang->id == $edit->id_outlet) { ?>
												<option value="<?= $cabang->id; ?>" selected><?= $cabang->nama; ?></option>
											<?php }else { ?>
												<option value="<?= $cabang->id; ?>"><?= $cabang->nama; ?></option>
											<?php } ?>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="jenis">Jenis Paket</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" name="jenis" id="jenis" required>
										<?php foreach($jenis as $j) : ?>
											<?php if( $j == $edit->jenis) { ?>
												<option value="<?= $j; ?>" selected><?= $j; ?></option>
											<?php }else { ?>
												<option value="<?= $j; ?>"><?= $j; ?></option>
											<?php } ?>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="namapaket">Nama Paket</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="text" class="form-control" id="namapaket" name="namapaket" value="<?= $edit->nama_paket; ?>" placeholder="Masukkan Nama Paket" required>
								</div>
							</div>
							<!-- <div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="harga">Harga/Kg</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga/Kg" required>
								</div>
							</div> -->
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="harga">Harga</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Rp.</span>
										</div>
										<input type="number" class="form-control" id="harga" name="harga" value="<?= $edit->harga; ?>" placeholder="Masukkan Harga">
										<div class="input-group-append">
											<!-- <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Satuan</button>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="#">/kg</a>
												<a class="dropdown-item" href="#">/m2</a>
											</div> -->
											<select class="form-control" name="satuan" id="satuan" required>
												<?php foreach($satuan as $s) : ?>
													<?php if( $s == $edit->satuan) { ?>
														<option value="<?= $s; ?>" selected>/<?= $s; ?></option>
													<?php }else { ?>
														<option value="<?= $s; ?>">/<?= $s; ?></option>
													<?php } ?>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="diskon">Ubah Diskon ?</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="input-group input-grup-diskon mb-3"><input type="number" class="form-control" name="inputan_diskon" id="inputan_diskon" placeholder="Masukkan jumlah diskon" min="0" max="100" value="<?= $edit->diskon; ?>" required><div class="input-group-append"><span class="input-group-text">%</span></div></div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary">Ubah</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	<?php } ?>
<div class="garis"></div>
</div>
</div>

<script>
	$(document).ready(function(){
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
					url: '<?= base_url(); ?>AdminControl/crud_paket/simpan/'+null+'', // URL tujuan
					type: 'POST',
					// data: $("#form-modal form").serialize(),
					data: new FormData(document.getElementById('modal-tambah-paket')),
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
							
							$('#form-modal-tambah-paket').modal('hide');
							
							// Ganti isi dari div view dengan view yang diambil dari proses_simpan.php
							$('#view').html(response.html)
							$('#total_paket').html(response.hitung_paket)
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
								title: 'Paket laundry berhasil disimpan'
							});

						}else{
							$('#pesan-error').html(response.pesan).show();
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
				// $('#modal-title').html('<i class="fas fa-user-edit"></i> Edit paket');
				
				var tr = $(this).closest('tr');
				var id = tr.find('.id-value_ubah').val();
				var id_outlet = tr.find('.id_outlet-value_detail').val();
				var jenis = tr.find('.jenis-value_ubah').val();
				var nama = tr.find('.nama-value_ubah').val();
				var harga = tr.find('.harga-value_ubah').val();
				var satuan = tr.find('.satuan-value_ubah').val();
				var diskon = tr.find('.diskon-value_ubah').val();
				
				$('#id').val(id);
				$('#cabang-id_detail').val(id_outlet);
				$('#jenis').val(jenis);
				$('#namapaket').val(nama);
				$('#harga').val(harga);
				$('#satuan').val(satuan);
				$('#diskon').val(diskon);

				$('#loading-ubah').hide();
				$('#text-tombol-ubah').html('Ubah');
			});

			$('#btn-ubah').click(function(){
				$('#loading-ubah').show(); // Munculkan loading ubah
				$('#text-tombol-ubah').html('Sedang mengubah...'); // ganti text ubah jadi sedang mangubah

				$.ajax({
					url: '<?= base_url(); ?>AdminControl/crud_paket/ubah/'+id+'', // URL tujuan
					type: 'POST',
					// data: $("#form-modal form").serialize(),
					data: new FormData(document.getElementById('modal-ubah-paket')),
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

							$('#form-modal-edit-paket').modal('hide');

							// Ganti isi dari div view dengan view yang diambil dari proses_ubah.php
							$('#view').html(response.html)
							$('#total_paket').html(response.hitung_paket)
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
								title: 'Harga paket berhasil diubah'
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

				$('#loading-hapus').hide();
				$('#text-tombol-hapus').html('Hapus');
			});
			
			$("#btn-hapus").click(function(){ // ketika tombol hapus didalam modal di klik
			
				$('#loading-hapus').show(); // Munculkan loading hapus
				$('#text-tombol-hapus').html('Sedang menghapus...'); // ganti text hapus jadi sedang menghapus

				$.ajax({
					url: '<?= base_url(); ?>AdminControl/crud_paket/hapus/'+id+'', // URL tujuan
					type: 'POST', // Tentukan type nya POST atau GET
					dataType: 'JSON',
					beforeSend: function() {
						$('#loading-hapus').show(); // Munculkan loading hapus
						$('#text-tombol-hapus').html('Sedang menghapus...'); // ganti text hapus jadi sedang menghapus
					},
					success: function(response){ // Ketika proses pengiriman berhasil
						$('#loading-hapus').hide(); // Sembunyikan loading hapus

						$('#form-modal-hapus-paket').modal('hide'); // Close / Tutup Modal Dialog
						
						// Ganti isi dari div view dengan view yang diambil dari proses_hapus.php
						$('#view').html(response.html);
						$('#total_paket').html(response.hitung_paket);
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
							title: 'Paket laundry berhasil dihapus'
						});
					},
					error: function (xhr, ajaxOptions, thrownError) {
						alert(xhr.responseText);
					}
				});
			});
	
	// tambah diskon paket
		$('.checkboxtambah').click(function() {
			if($('#ya').is(':checked')){
				$('#input_diskon').html('<div class="input-group input-grup-diskon mb-3"><input type="number" class="form-control" name="inputan_diskon" id="inputan_diskon" placeholder="Masukkan jumlah diskon" min="1" max="100" required><div class="input-group-append"><span class="input-group-text">%</span></div></div>').show();
			}else{
				$('.input-grup-diskon').remove();
			}
		});
	});

</script>
