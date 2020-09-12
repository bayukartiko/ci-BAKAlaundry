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
