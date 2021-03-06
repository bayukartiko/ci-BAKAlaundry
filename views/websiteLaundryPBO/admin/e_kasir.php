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
				<a href="<?php echo site_url('AdminControl/home'); ?>">Home</a> / <span class="text-muted">Manajemen User</span> / <a href="<?php echo site_url('AdminControl/m_kasir'); ?>">Kasir</a> / <span class="text-muted">Edit Kasir</>
			</span> 
		</div>
	</nav>
	
	<div class="isi">

		<h6><i class="fas fa-user-edit"></i> Edit Data Kasir</h6>
		
		<form class="tabel" action="<?= site_url('AdminControl/aksi_edit_kasir') ?>" method="POST" enctype="multipart/form-data">form
			<p class="text-center mb-5"><i class="fas fa-user-edit"></i> Edit Data Kasir</p>


			<?php foreach($data_edit_kasir as $edit){ ?>

				<input type="hidden" name="id" value="<?= $edit->id; ?>">

			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="namalengkap">Nama Lengkap</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="text" class="form-control" name="nama" id="namalengkap" placeholder="Masukkan Nama Lengkap" value="<?= $edit->nama; ?>" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="username">Nama Pengguna</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Nama Pengguna (username)" value="<?= $edit->username; ?>" disabled>
				</div>
			</div>

			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="email">Alamat Email</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Alamat Email" value="<?= $edit->email; ?>" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="alamat">Alamat Lengkap</label>
				</div>
				<div class="col-md-10 mb-3">
					<textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat Kasir" cols="30" rows="5" required><?= $edit->alamat; ?></textarea>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="telepon">Telepon</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="number" class="form-control" name="telepon" id="telepon" placeholder="Masukkan No. Telepon" value="<?= $edit->tlp; ?>" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="gender">Jenis Kelamin</label>
				</div>
				<div class="col-md-10 mb-3">
					<select class="form-control" name="gender" id="gender" required>
						<?php foreach($gender as $kelamin) : ?>
							<?php if( $kelamin == $edit->jenis_kelamin) { ?>
								<option value="<?= $kelamin; ?>" selected><?= $kelamin; ?></option>
							<?php }else { ?>
								<option value="<?= $kelamin; ?>"><?= $kelamin; ?></option>
							<?php } ?>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="foto">Foto Profil</label>
				</div>
				<div class="col-md-10 mb-3">
					<div class="row">
						<div class="col-md-2">
							<input type="hidden" name="gambarlama" value="<?= $edit->foto ?>">
							<img src="<?= base_url('assets/img/foto/').$edit->foto ?>" style="width: 100px; height: 100px;" class="img-thumbnail">
						</div>
						<div class="col-md-10">
							<!-- <input type="file" name="foto" id="foto" style="width: 100%;"> -->
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="gambar" name="foto">
								<label class="custom-file-label" for="gambar">Choose file</label>
							</div>
						</div>
					</div>
					<!-- <input type="hidden" name="defaultfoto" value="default.jpg"> -->
					<!-- <img src="/</?= base_url('assets/img/foto/').$edit->foto ?>" style="width: 100px; height: 100px;">
					<input type="file" name="foto" id="foto"> -->
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="user">Tipe user</label>
				</div>
				<div class="col-md-10 mb-3">
					<select class="form-control" id="user" disabled>
						<option>admin</option>
						<option selected>kasir</option>
						<option>owner</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="cabang">Cabang</label>
				</div>
				<div class="col-md-10 mb-3">
					<select class="form-control" id="cabang" name="cabang">
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
					<a href="<?php echo site_url('AdminControl/m_kasir'); ?>" class="btn btn-danger" type="button">Batal</a>
				</div>
				<div class="col-md-10 mb-3">
					<button class="btn btn-primary" type="submit">Ubah</button>
				</div>
			</div>

			<?php } ?>

		</form>

	</div>
</div>
