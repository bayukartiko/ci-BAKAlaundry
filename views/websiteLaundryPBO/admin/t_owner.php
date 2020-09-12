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
			<a href="<?php echo site_url('AdminControl/home'); ?>">Home</a> / <span class="text-muted">Manajemen User</span> / <a href="<?php echo site_url('AdminControl/m_owner'); ?>">Owner</a> / <span class="text-muted">Tambah Owner</>
			</span> 
		</div>
	</nav>
	
	<div class="isi">

		<h6><i class="fas fa-user-plus"></i> Tambah Data Owner</h6>
		
		<form class="tabel" action="<?= site_url('AdminControl/simpan_data_owner') ?>" method="POST" enctype="multipart/form-data">
			<p class="text-center mb-5"><i class="fas fa-user-plus"></i> Tambah Data Owner</p>

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
					<textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat Owner" cols="30" rows="5"> <?= set_value('alamat') ?> </textarea>
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
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="cabang">Cabang</label>
				</div>
				<div class="col-md-10 mb-3">
					<select class="form-control" id="cabang" name="cabang">
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
					<a href="<?php echo site_url('AdminControl/m_owner'); ?>" class="btn btn-danger" type="button">Batal</a>
				</div>
				<div class="col-md-10 mb-3">
					<button class="btn btn-primary" type="submit">Tambah</button>
				</div>
			</div>
		</form>

	</div>
</div>
