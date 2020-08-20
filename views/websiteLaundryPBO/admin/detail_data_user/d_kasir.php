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
				<a href="<?php echo site_url('AdminControl/home'); ?>">Home</a> / <span class="text-muted">Manajemen User</span> / <a href="<?php echo site_url('AdminControl/m_kasir'); ?>">Kasir</a> / <span class="text-muted">Detail kasir</>
			</span> 
		</div>
	</nav>
	
	<div class="isi">

		<h6><i class="fas fa-user-cog"></i> Detail biodata kasir</h6>
		
		<form class="tabel">
		<fieldset disabled>
		
			<p class="text-center mb-5"><i class="fas fa-user-cog"></i> Detail biodata kasir</p>

			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="namalengkap">Nama Lengkap</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="text" class="form-control" name="nama" id="namalengkap" value="<?= $detail->nama ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="username">Nama Pengguna</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="text" class="form-control" name="username" id="username" value="<?= $detail->username ?>">
				</div>
			</div>
			<!-- <div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="password">kata sandi</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Kata sandi (password)" required>
				</div>
			</div> -->
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="email">Alamat Email</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="email" class="form-control" name="email" id="email" value="<?= $detail->email ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="alamat">Alamat Lengkap</label>
				</div>
				<div class="col-md-10 mb-3">
					<textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5"> <?= $detail->alamat ?> </textarea>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="telepon">Telepon</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="number" class="form-control" name="telepon" id="telepon" value="<?= $detail->tlp ?>">
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="gender">Jenis Kelamin</label>
				</div>
				<div class="col-md-10 mb-3">
					<select class="form-control" name="gender" id="gender">
						<option><?= $detail->jenis_kelamin ?></option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="foto">Foto Profil</label>
				</div>
				<div class="col-md-10 mb-3">
					<img src="<?= base_url('assets/img/foto/').$detail->foto ?>" style="width: 100px; height: 100px;" id="foto" class="img-thumbnail">
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="user">Tipe user</label>
				</div>
				<div class="col-md-10 mb-3">
					<select class="form-control" id="user" disabled>
						<option><?= $detail->role ?></option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="cabang">Cabang</label>
				</div>
				<div class="col-md-10 mb-3">
					<select class="form-control" id="cabang" disabled>
						<?php foreach($outlet as $cabang) : ?>
							<?php if( $cabang->id == $detail->id_outlet) { ?>
								<option value="<?= $cabang->id; ?>" selected><?= $cabang->nama; ?></option>
							<?php } ?>
						<?php endforeach; ?>
					</select>
				</div>
			</div>
		</fieldset>
			<div class="form-row">
				<div class="col-md-12 mb-3">
					<a href="<?php echo site_url('AdminControl/m_kasir'); ?>" class="btn btn-info" type="button">Mengerti</a>
				</div>
				<!-- <div class="col-md-10 mb-3">
					<button class="btn btn-primary" type="submit">Tambah</button>
				</div> -->
			</div>
		</form>

	</div>
</div>
