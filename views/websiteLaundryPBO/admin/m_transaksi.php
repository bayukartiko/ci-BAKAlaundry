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
				<a href="<?php echo site_url('AdminControl/home'); ?>">Home</a> / <span class="text-muted">Manajemen Transaksi</span>
			</span> 
		</div>
	</nav>
	
	<div class="isi">

		<h6><i class="fas fa-fw fa-shopping-cart"></i> Manajemen Data transaksi</h6>
		<div class="row row-cols-1 row-cols-md-3 text-center">
			<div class="col col-md-6 mb-4">
				<div class="card bg-light h-100">
					<!-- <img src="..." class="card-img-top" alt="..."> -->
					<div class="card-body">
						<i class="fas fa-fw fa-shopping-cart" style="width: 50px;  height: 50px;"></i>
						<h5 class="card-title">Total order baru</h5>
						<p class="card-text text-dark">
							<span id="total_transaksi-baru">
								<?= $h_transaksi_baru; ?>
							</span>
						</p>
					</div>
				</div>
			</div>
			<div class="col col-md-6 mb-4">
				<div class="card bg-light h-100">
					<!-- <img src="..." class="card-img-top" alt="..."> -->
					<div class="card-body">
						<i class="fas fa-fw fa-shopping-cart" style="width: 50px;  height: 50px;"></i>
						<h5 class="card-title">Total semua order</h5>
						<p class="card-text text-dark">
							<span id="total_transaksi">
								<?= $h_transaksi_semua; ?>
							</span>
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="garis"></div>
		
		<div class="tabel">
			<i class="fas fa-fw fa-shopping-cart"></i> Data transaksi
				<a href="<?php echo site_url('AdminControl/laporan'); ?>" type="button" class="btn btn-success float-right">Buat laporan</a> 
			<br><br>
			<!-- <a href="</?php echo site_url('AdminControl/t_transaksi'); ?>" class="btn btn-info">Tambah transaksi</a> -->
			<button type="button" name="btn-tambah" id="btn-tambah" class="btn btn-info" data-toggle="modal" data-target="#form-modal-tambah-transaksi">Tambah transaksi</button>

			<br><br>

			<!-- </?php if($this->session->flashdata('sukses')) { ?> -->
				<div class="alert alert-success alert-dismissible fade show" role="alert" id="pesan-sukses">
					<!-- Data transaksi <strong>Berhasil</strong> </?= $this->session->flashdata('sukses'); ?> -->
					<!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button> -->
				</div>
			<!-- </?php } ?> -->
			<br>
			
			<div id="view">
				<?php
					$data = [
						'paket' => $paket,
						'member' => $member,
						'outlet' => $outlet,
						'tb_user' => $tb_user,
						'tb_member' => $tb_member,
						'tb_paket' => $tb_paket,
						'tb_transaksi' => $tb_transaksi,
						'status_order' => $status_order,
						'status_dibayar' => $status_dibayar,
						'h_transaksi_baru' => $h_transaksi_baru,
						'h_transaksi_semua' => $h_transaksi_semua,
						'kode_nuklir' => $kode_nuklir,
						'h_paket' => $h_paket,
						'h_member' => $h_member
					];
				?>
				<?php $this->load->view('websiteLaundryPBO/admin/tabel/tabel_transaksi', $data); ?>
			</div>

		</div>

<!-- modal crud transaksi ajax -->
	<!-- tambah -->
		<div class="modal fade" id="form-modal-tambah-transaksi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							<i class="fas fa-cart-plus"></i> Tambah transaksi
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- Beri id "pesan-error" untuk menampung pesan error -->
						<div id="pesan-error" class="alert alert-danger"></div>
						
						<form enctype="multipart/form-data" id="modal-tambah-transaksi">
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="kodeinvoice">Kode Transaksi</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="text" class="form-control" name="kodeinvoice" id="kodeinvoice" value="BKL<?= $kode_nuklir; ?>TR" readonly>
									<?= form_error('kodeinvoice', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="petugas">Nama Petugas</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="hidden" name="id_petugas" id="id_petugas" value="<?= $tb_user['id']; ?>">
									<input type="text" class="form-control" name="petugas" id="petugas" value="<?= $tb_user['nama']; ?>" readonly>
									<?= form_error('petugas', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="cabang">Cabang Toko</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" id="cabang" name="cabang" required>
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
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="namamember">Nama Pelanggan</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" id="namamember" name="namamember" required>
										<option value="" selected disabled>> Pilih Nama Pelanggan <</option>
										<?php
											foreach ($tb_member as $data_member){
										?>
											<option value="<?= $data_member->id ?>"><?= $data_member->nama ?></option>
										<?php } ?>
									</select>
									<?= form_error('namamember', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<!-- mungkin yang ini nanti dipake -->
								<!-- <div class="form-row">
									<div class="col-md-2 mb-3 text-right">
										<label for="alamat">Alamat Lengkap</label>
									</div>
									<div class="col-md-10 mb-3">
										<textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat Member" cols="30" rows="5" required></textarea>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-2 mb-3 text-right">
										<label for="telepon">Telepon</label>
									</div>
									<div class="col-md-10 mb-3">
										<input type="number" class="form-control" name="telepon" id="telepon" placeholder="Masukkan No. Telepon Member" required>
									</div>
								</div>
								<div class="form-row">
									<div class="col-md-2 mb-3 text-right">
										<label for="gender">Jenis Kelamin</label>
									</div>
									<div class="col-md-10 mb-3">
										<select class="form-control" name="gender" id="gender" required>
											<option>Pria</option>
											<option>Wanita</option>
										</select>
									</div>
								</div>
								<div class="garis"></div> -->
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="paket">Paket Laundry</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" id="paket" name="paket" required>
										<option value="" selected disabled>> Pilih Cabang Toko <</option>
										
									</select>
									<?= form_error('paket', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="jumlah">Jumlah Barang</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="input-group">
										<input type="number" min="0" class="form-control" name="jumlah" id="jumlah" placeholder="> Masukkan Jumlah Barang <" required>
										<?= form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
										<div class="input-group-append">
											<div class="input-group-text" id="hasilpilihan" readonly="readonly">- Pilih Paket Laundry -</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="harga_jual">Harga Jual</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Rp.</span>
										</div>
										<input type="number" min="0" class="form-control" id="harga_jual" name="harga_jual" placeholder="- Pilih Paket Laundry -" readonly>
										<?= form_error('harga_jual', '<small class="text-danger">', '</small>'); ?>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="diskon_paket">Diskon</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="input-group">
										<input type="number" min="0" class="form-control" name="diskon_paket" id="diskon_paket" placeholder="- Pilih Paket Laundry -" readonly>
										<?= form_error('diskon_paket', '<small class="text-danger">', '</small>'); ?>
										<div class="input-group-append">
											<span class="input-group-text">%</span>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="harga_diskon">Harga Diskon</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Rp.</span>
										</div>
										<input type="number" min="0" class="form-control" id="harga_diskon" name="harga_diskon" placeholder="- Pilih Paket Laundry -" readonly>
										<?= form_error('harga_diskon', '<small class="text-danger">', '</small>'); ?>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="biaya_tambahan">Biaya Administrasi</label>
								</div>
								<div class="col-md-10 mb-3">
									<!-- <input type="text" class="form-control" name="biaya_tambahan" id="biaya_tambahan" value="IDR 1000 (sudah termasuk PPN sebesar: IDR 500 dan PPh sebesar: IDR 500)" disabled> -->
									<div class="row">
										<div class="col">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Rp.</span>
												</div>
												<input type="number" min="0" class="form-control" id="biaya_tambahan" name="biaya_tambahan" placeholder="500 (Biaya Tambahan)" disabled>
											</div>
										</div>
										<div class="col">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Rp.</span>
												</div>
												<input type="number" min="0" class="form-control" id="biaya_pajak" name="pajak" placeholder="500 (pajak)" disabled>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="total">Total</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Rp.</span>
										</div>
										<input type="number" min="0" class="form-control" id="total" name="total" placeholder="- Masukkan Jumlah Barang -" readonly>
										<?= form_error('total', '<small class="text-danger">', '</small>'); ?>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="tunai">Tunai</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Rp.</span>
										</div>
										<input type="number" min="0" class="form-control" id="tunai" name="tunai" placeholder="> Masukkan Jumlah Uang <" required>
										<?= form_error('tunai', '<small class="text-danger">', '</small>'); ?>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="kembali" id="titlekembali">Kembali</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Rp.</span>
										</div>
										<input type="number" min="0" class="form-control" id="kembali" name="kembali" placeholder="- Masukkan Jumlah Uang -" readonly>
										<?= form_error('kembali', '<small class="text-danger">', '</small>'); ?>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="t_pembayaran">Tipe Pembayaran</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" name="t_pembayaran" id="t_pembayaran" required>
										<option value="tunai">Tunai</option>
									</select>
									<?= form_error('t_pembayaran', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="s_pembayaran">Status Pembayaran</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" name="s_pembayaran" id="s_pembayaran">
										<!-- /</?php foreach ($status_dibayar as $data_status){ ?>
											<option value="/</?= $data_status ?>"> /</?= $data_status ?> </option>
										/</?php } ?> -->
										<option value="Belum Dibayar" selected>Belum Dibayar</option>
									</select>
									<?= form_error('s_pembayaran', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="tgl_ambil">Tanggal ambil</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="hidden" name="tgl_transaksi" value="<?= date("Y/m/d H:i:s"); ?>">
									<input type="date" class="form-control" name="tgl_ambil" id="tgl_ambil" required>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="s_order">Status Order</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" name="s_order" id="s_order">
										<option value="Baru" selected>Baru</option>
									</select>
									<?= form_error('s_order', '<small class="text-danger">', '</small>'); ?>
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
	<!-- pembayaran / detail -->
		<div class="modal fade" id="form-modal-detail-transaksi" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">
							<i class="fas fa-fw fa-file-invoice-dollar"></i> Detail Transaksi
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- Beri id "pesan-error" untuk menampung pesan error -->
						<div id="pesan-error" class="alert alert-danger"></div>
						
						<form enctype="multipart/form-data" id="modal-detail-transaksi">
							<input type="hidden" name="id">

							<table class="table table-bordered table-hover">
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Kode Transaksi</td>
									<td id="kode_invoice-detail"></td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Cabang Toko</td>
									<td id="cabang_id-detail"></td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Nama Petugas</td>
									<td id="nama_user-detail"></td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Nama Pelanggan</td>
									<td id="nama_pelanggan-detail"></td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Alamat Pelanggan</td>
									<td id="alamat_pelanggan-detail"></td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Email Pelanggan</td>
									<td id="email_pelanggan-detail"></td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">No.Telepon Pelanggan</td>
									<td id="tlp_pelanggan-detail"></td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Tipe Pembayaran</td>
									<td id="tipe_pembayaran-detail"></td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Status Order</td>
									<td>
										<select class="form-control" name="edit_s_order" id="edit_s_order">
											
										</select>
									</td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Status Pembayaran</td>
									<td>
										<select class="form-control" name="edit_s_pembayaran" id="edit_s_pembayaran"></select>
									</td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Tanggal Ambil</td>
									<td id="tgl_ambil-detail"></td>
								</tr>
							</table>

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

<div class="garis"></div>
</div>
</div>

<script>
	// crud transaksi
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
					url: '<?= base_url(); ?>AdminControl/crud_transaksi/simpan/'+null+'', // URL tujuan
					type: 'POST',
					// data: $("#form-modal form").serialize(),
					data: new FormData(document.getElementById('modal-tambah-transaksi')),
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
							
							$('#form-modal-tambah-transaksi').modal('hide');
							
							// Ganti isi dari div view dengan view yang diambil dari proses_simpan.php
							$('#view').html(response.html);
							$('#total_transaksi').html(response.hitung_transaksi);
							$('#pesan-sukses').html(response.pesan).fadeIn().delay(10000).fadeOut();
							$('#kodeinvoice').val(response.kode_invoice);

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
								title: 'Data transaksi berhasil ditambahkan'
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

		// pembayaran / detail
			$('#view').on('click', '.btn-form-detail', function(){
				id = $(this).data('id'); // Set variabel id dengan id yang kita set pada atribut data-id pada tag button edit
				
				// $('#btn-simpan').hide();
				$('#btn-ubah').show();
				
				// Set judul modal dialog menjadi Form Ubah Data
				// $('#modal-title').html('<i class="fas fa-user-edit"></i> Edit kasir');
				
				var tr = $(this).closest('tr');
				var id = tr.find('.id-value_detail').val();
				var tgl = tr.find('.tgl-value_detail').val();
				var kode_invoice = tr.find('.kode_invoice-value_detail').val();
				var nama_user = tr.find('.nama_user-value_detail').val();
				var nama_outlet = tr.find('.nama_outlet-value_detail').val();
				var id_member = tr.find('.id_member-value_detail').val();
				var nama_member = tr.find('.nama_member-value_detail').val();
				var alamat_member = tr.find('.alamat_member-value_detail').val();
				var email_member = tr.find('.email_member-value_detail').val();
				var telepon_member = tr.find('.telepon_member-value_detail').val();
				var gender_member = tr.find('.gender_member-value_detail').val();
				var id_paket = tr.find('.id_paket-value_detail').val();
				var nama_paket = tr.find('.nama_paket-value_detail').val();
				var harga_paket = tr.find('.harga_paket-value_detail').val();
				var satuan_paket = tr.find('.satuan_paket-value_detail').val();
				var jumlah = tr.find('.jumlah-value_detail').val();
				var harga_jual = tr.find('.harga_jual-value_detail').val();
				var diskon = tr.find('.diskon-value_detail').val();
				var harga_diskon = tr.find('.harga_diskon-value_detail').val();
				var biaya_tambahan = tr.find('.biaya_tambahan-value_detail').val();
				var pajak = tr.find('.pajak-value_detail').val();
				var total = tr.find('.total-value_detail').val();
				var tunai = tr.find('.tunai-value_detail').val();
				var kembali = tr.find('.kembali-value_detail').val();
				var tipe_pembayaran = tr.find('.tipe_pembayaran-value_detail').val();
				var status = tr.find('.status_order-value_detail').val();
				var tgl_bayar = tr.find('.tgl_bayar-value_detail').val();
				var tgl_ambil = tr.find('.tgl_ambil-value_detail').val();
				var status_bayar = tr.find('.status_bayar-value_detail').val();
				
				$('#id').html(id);
				// $('#namalengkap').html(tgl);
				$('#kode_invoice-detail').html(kode_invoice);
				$('#nama_user-detail').html(nama_user);
				$('#cabang_id-detail').html(nama_outlet);
				// $('#namalengkap').html(id_member);
				$('#nama_pelanggan-detail').html(nama_member);
				$('#alamat_pelanggan-detail').html(alamat_member);
				$('#email_pelanggan-detail').html(email_member);
				$('#tlp_pelanggan-detail').html(telepon_member);
				// $('#namalengkap').html(gender_member);
				// $('#namalengkap').html(id_paket);
				// $('#namalengkap').html(nama_paket);
				// $('#namalengkap').html(harga_paket);
				// $('#namalengkap').html(satuan_paket);
				// $('#namalengkap').html(jumlah);
				// $('#namalengkap').html(harga_jual);
				// $('#namalengkap').html(diskon);
				// $('#namalengkap').html(harga_diskon);
				// $('#namalengkap').html(biaya_tambahan);
				// $('#namalengkap').html(pajak);
				// $('#namalengkap').html(total);
				// $('#namalengkap').html(tunai);
				// $('#namalengkap').html(kembali);
				$('#tipe_pembayaran-detail').html(tipe_pembayaran);
				$('#edit_s_order').html(status);
				// $('#namalengkap').html(tgl_bayar);
				$('#tgl_ambil-detail').html(tgl_ambil);
				$('#edit_s_pembayaran').html(status_bayar);

				// besok bikin tabel ke dua di modal detail transaksi

				$('#loading-ubah').hide();
				$('#text-tombol-ubah').html('Ubah status order');
			});


	// detail transaksi
		$("#harga_tunai_detail").on('input', function(){
			var duit = $(this).val();
			var total = $("#total_harga").val();
			// var sama_total = "-"+total;

			var hitung_kembalian = duit-total;

			if(hitung_kembalian >= 0){
				$("#titlekembali").html("Kembali");
				$("#edit_s_pembayaran").html('<option value="Dibayar" selected>+ Dibayar +</option>');
			}else if(hitung_kembalian < 0){
				$("#titlekembali").html("Kurang");
				$("#edit_s_pembayaran").html('<option value="Kurang" selected>+ Kurang +</option>');
			}

			var jumlah_kembalian = hitung_kembalian;
			jumlah_kembalian = jumlah_kembalian.toString().replace('-', '');
			$("#harga_kembali_detail").val(jumlah_kembalian);
		});

	// pilihan satuan paket di transaksi
		$(document).ready(function(){
			$("#cabang").on('change', function(){
				var id_cabang= $(this).val();
				$("#jumlah").val("");
				$("#harga_jual").val("");
				$("#diskon_paket").val("");
				$("#harga_diskon").val("");
				$("#total").val("");
				$("#tunai").val("");
				$("#kembali").val("");
				$("#s_pembayaran").html('<option value="Belum Dibayar" selected disabled>Belum Dibayar</option>');

				$.ajax({
					url: "<?= site_url('AdminControl/get_data_cabang_paket'); ?>",
					method: "POST",
					data: {id_cabang:id_cabang},
					async: true,
					dataType: 'JSON',
					success: function(data){
						var html = "<option value='' selected disabled>> Pilih Paket Laundry <</option>";
						var i;
						for(i=0; i<data.length; i++){
							html += '<option value='+data[i].id+'>'+data[i].nama_paket+'</option>';
						}
						$("#paket").html(html);
					}
				});
				return false;
			});

			$("#paket").on('change', function(){
				var id = $(this).val();
				$("#jumlah").val("");
				// $("#harga_jual").val("");
				// $("#diskon_paket").val("");
				// $("#harga_diskon").val("");
				$("#total").val("");
				$("#tunai").val("");
				$("#kembali").val("");
				$("#s_pembayaran").html('<option value="Belum Dibayar" selected disabled>Belum Dibayar</option>');

				$.ajax({
					url: "<?= site_url('AdminControl/get_data_paket'); ?>",
					method: "POST",
					data: {id:id},
					async: true,
					dataType: 'JSON',
					success: function(data){
						var satuan = "";
						var diskon = "";
						var harga = "";
						var i;
						for(i=0; i<data.length; i++){
							satuan += data[i].satuan;
							diskon += data[i].diskon;
							harga += data[i].harga;
					}
					$("#hasilpilihan").html(satuan);
					$("#diskon_paket").val(diskon);

					// hitung diskon
						if(diskon == 0){
							$("#harga_jual").val(harga);
							$("#harga_diskon").val(harga);
						}else{
							var nilai_harga = harga;
							var nilai_diskon = diskon;

							var hasil_diskon = harga*(nilai_diskon/100);
							var hasil_akhir = nilai_harga-hasil_diskon;

							// $("#harga_jual").val(harga);
							$("#harga_jual").val(harga);
							$("#harga_diskon").val(hasil_akhir);
						}

					// hitung total
						$("#jumlah").on('input', function(){
							var jumlah_barang = $(this).val();
							var jumlah_diskon = $('#harga_diskon').val();
							var biaya_tambahan = 500;
							var pajak = 500;

							var hitung_total = (jumlah_diskon*jumlah_barang)+biaya_tambahan+pajak;
							
							$('#total').val(hitung_total);
						});

					// hitung kembali
						$("#tunai").on('input', function(){
							var duit = $(this).val();
							var total = $("#total").val();
							// var sama_total = "-"+total;

							var hitung_kembalian = duit-total;

							if(hitung_kembalian >= 0){
								$("#titlekembali").html("Kembali");
								$("#s_pembayaran").html('<option value="Dibayar" selected>Dibayar</option>');
							}else if(hitung_kembalian < 0){
								$("#titlekembali").html("Kurang");
								$("#s_pembayaran").html('<option value="Kurang" selected>Kurang</option>');
							}
							// else if(hitung_kembalian = sama_total){
							// 	$("#titlekembali").html("Belum Dibayar");
							// 	$("#s_pembayaran").html('<option value="Belum Dibayar" selected>Belum Dibayar</option>');
							// }

							var jumlah_kembalian = hitung_kembalian;
							jumlah_kembalian = jumlah_kembalian.toString().replace('-', '');
							$("#kembali").val(jumlah_kembalian);

						});
					}
				});
				// });
				return false;
			});
		});
</script>
