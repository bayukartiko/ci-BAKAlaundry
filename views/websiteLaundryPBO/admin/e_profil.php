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
				<a href="<?php echo site_url('AdminControl/home'); ?>">Home</a> / <span class="text-muted">Profil</span> / <span class="text-muted">Ubah Profil</span>
			</span> 
		</div>
	</nav>
	
	<div class="isi">

		<h6><i class="fas fa-user-edit"></i> Ubah Profil</h6>
		
		<form class="tabel" action="<?= site_url('AdminControl/aksi_edit_profil') ?>" method="POST" enctype="multipart/form-data">
			<p class="text-center mb-5"><i class="fas fa-user-edit"></i> Ubah Profil</p>

			<!-- /</?php foreach($tb_user as $edit){ ?> -->

				<input type="hidden" name="id" value="<?= $tb_user['id']; ?>">

			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="namalengkap">Nama Lengkap</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="text" class="form-control" id="namalengkap" name="nama" value="<?= $tb_user['nama'] ?>" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="username">Nama Pengguna</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="text" class="form-control" id="username" name="username" value="<?= $tb_user['username'] ?>" readonly>
				</div>
			</div>
			<!-- <div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="password">kata sandi</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="password" class="form-control" id="password" placeholder="Masukkan Kata sandi (password)" required>
				</div>
			</div> -->
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="email">Email</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="email" class="form-control" id="email" name="email" value="<?= $tb_user['email'] ?>" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="alamat">Alamat Lengkap</label>
				</div>
				<div class="col-md-10 mb-3">
					<textarea name="alamat" id="alamat" name="alamat" class="form-control" cols="30" rows="5" required><?= $tb_user['alamat'] ?></textarea>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="telepon">Telepon</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="number" class="form-control" id="telepon" name="telepon" value="<?= $tb_user['tlp'] ?>" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="gender">Jenis Kelamin</label>
				</div>
				<div class="col-md-10 mb-3">
					<select class="form-control" id="gender" name="gender" required>
						<?php foreach($gender as $kelamin) : ?>
							<?php if( $kelamin == $tb_user['jenis_kelamin']) { ?>
								<option value="<?= $kelamin; ?>" selected><?= $kelamin; ?></option>
							<?php }else { ?>
								<option value="<?= $kelamin; ?>"><?= $kelamin; ?></option>
							<?php } ?>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-md-2 mb-3 text-right">
					<label for="foto">Foto profil</label>
				</div>
				<div class="col-md-10 mb-3">
					<div class="row">
						<div class="col-md-2">
							<img src="<?= base_url('assets/img/foto/').$tb_user['foto'] ?>" style="width: 100px; height: 100px;" class="img-thumbnail">
						</div>
						<div class="col-md-10">
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
					<a href="<?php echo site_url('AdminControl/home'); ?>" class="btn btn-danger" type="button">Batal</a>
				</div>
				<div class="col-md-10 mb-3">
					<button class="btn btn-primary" type="submit">Simpan</button>
				</div>
			</div>

			<!-- /</?php } ?> -->

		</form>

	</div>
</div>
