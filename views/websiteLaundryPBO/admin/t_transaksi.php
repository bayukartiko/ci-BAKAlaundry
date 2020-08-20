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
		
		<form class="tabel" action="<?= site_url('AdminControl/simpan_data_kasir') ?>" method="POST" enctype="multipart/form-data">
			<p class="text-center mb-5"><i class="fas fa-cart-plus"></i> Tambah Data Transaksi</p>

			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="namalengkap">Kode Transaksi</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="text" class="form-control" name="nama" id="kodeinvoice" value="BKL<?= $kode_nuklir; ?>TR" disabled>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="cabang">Cabang</label>
				</div>
				<div class="col-md-10 mb-3">
					<select class="form-control" id="cabang" name="cabang">
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
					<label for="datamember">Nama Member</label>
				</div>
				<div class="col-md-10 mb-3">
					<!-- <input type="text" class="form-control" name="nama" id="namalengkap" placeholder="Masukkan Nama Lengkap" required> -->
					<input class="form-control" list="pilihandatamember" id="datamember" placeholder="Pilih Nama Member">
					<datalist id="pilihandatamember">
						<option value="San Francisco">
						<option value="New York">
						<option value="Seattle">
						<option value="Los Angeles">
						<option value="Chicago">
					</datalist>
				</div>
			</div>
			<div class="form-row">
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
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<a href="<?php echo site_url('AdminControl/m_kasir'); ?>" class="btn btn-danger" type="button">Batal</a>
				</div>
				<div class="col-md-10 mb-3">
					<button class="btn btn-primary" type="submit">Tambah</button>
				</div>
			</div>
		</form>

	</div>
</div>
