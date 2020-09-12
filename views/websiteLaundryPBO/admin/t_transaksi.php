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
				<a href="<?php echo site_url('AdminControl/home'); ?>">Home</a> / <a href="<?php echo site_url('AdminControl/m_transaksi'); ?>">Manajemen Transaksi</a> / <span class="text-muted">Tambah Transaksi</>
			</span> 
		</div>
	</nav>
	
	<div class="isi">

		<h6><i class="fas fa-cart-plus"></i> Tambah Data Transaksi</h6>
		
		<form class="tabel" action="<?= site_url('AdminControl/simpan_data_transaksi'); ?>" method="POST" enctype="multipart/form-data">
			<p class="text-center mb-5"><i class="fas fa-cart-plus"></i> Tambah Data Transaksi</p>

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
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<a href="<?php echo site_url('AdminControl/m_transaksi'); ?>" class="btn btn-danger" type="button">Batal</a>
				</div>
				<div class="col-md-10 mb-3">
					<button class="btn btn-primary" type="submit">Proses order</button>
				</div>
			</div>
		</form>

	</div>
</div>
