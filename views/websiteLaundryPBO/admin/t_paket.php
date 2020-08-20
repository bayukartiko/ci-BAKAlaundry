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
				<a href="<?php echo site_url('AdminControl/home'); ?>">Home</a> / <a href="<?php echo site_url('AdminControl/m_laundry'); ?>">Manajemen Laundry</a> / <span class="text-muted">Tambah Paket</span>
			</span> 
		</div>
	</nav>
	
	<div class="isi">

		<h6><i class="fas fa-th-list"></i> Tambah Data Paket Laundry</h6>
		
		<form class="tabel" action="<?= site_url('AdminControl/simpan_data_paket') ?>" method="POST" enctype="multipart/form-data">
			<p class="text-center mb-5"><i class="fas fa-th-list"></i> Tambah Data Paket Laundry</p>

			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="outlet">Pilih outlet</label>
				</div>
				<div class="col-md-10 mb-3">
					<select class="form-control" id="outlet" name="cabang" required>
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
					<label for="jenis">Jenis Paket</label>
				</div>
				<div class="col-md-10 mb-3">
					<select class="form-control" name="jenis" id="jenis" required>
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
					<label for="namapaket">Nama Paket</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="text" class="form-control" id="namapaket" name="namapaket" placeholder="Masukkan Nama Paket" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="harga">Harga/Kg</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga/Kg" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<a href="<?php echo site_url('AdminControl/m_laundry'); ?>" class="btn btn-danger" type="button">Batal</a>
				</div>
				<div class="col-md-10 mb-3">
					<button class="btn btn-primary" type="submit">Tambah</button>
				</div>
			</div>
		</form>

	</div>
</div>
