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
				<a href="<?php echo site_url('AdminControl/home'); ?>">Home</a> / <a href="<?php echo site_url('AdminControl/m_member'); ?>">Manajemen Pelanggan</a> / <span class="text-muted">Tambah Pelanggan</>
			</span> 
		</div>
	</nav>
	
	<div class="isi">

		<h6><i class="fas fa-user-plus"></i> Tambah Data Pelanggan</h6>
		
		<form class="tabel" action="<?= site_url('AdminControl/simpan_data_member') ?>" method="POST" enctype="multipart/form-data">
			<p class="text-center mb-5"><i class="fas fa-user-plus"></i> Tambah Data Pelanggan</p>

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
					<textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat Pelanggan" cols="30" rows="5"> <?= set_value('alamat') ?> </textarea>
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
						<option>Pria</option>
						<option>Wanita</option>
					</select>
					<?= form_error('gender', '<small class="text-danger">', '</small>'); ?>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<a href="<?php echo site_url('AdminControl/m_member'); ?>" class="btn btn-danger" type="button">Batal</a>
				</div>
				<div class="col-md-10 mb-3">
					<button class="btn btn-primary" type="submit">Tambah</button>
				</div>
			</div>
		</form>

	</div>
</div>
