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
				<a href="<?php echo site_url('AdminControl/home'); ?>">Home</a> / <span class="text-muted">Profil</span> / <span class="text-muted">Ubah Password</span>
			</span> 
		</div>
	</nav>
	
	<div class="isi">

		<h6><i class="fas fa-key"></i> Ubah Kata sandi</h6>
		
		<form class="tabel" action="<?= base_url('AdminControl/e_password') ?>" method="POST">
			<p class="text-center mb-5"><i class="fas fa-key"></i> Ubah Kata sandi</p>

			<?php if($this->session->flashdata('sukses')) {  ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('sukses') ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php }elseif($this->session->flashdata('gagal')) { ?>
				<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<?= $this->session->flashdata('gagal') ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php } ?>

			<!-- /</?php foreach($tb_user as $edit){ ?> -->

				<!-- <input type="hidden" name="id" value="/</?= $tb_user['id']; ?>"> -->

			<div class="form-group">
				<!-- <div class="col-md-2 mb-3 text-right"> -->
					<label for="passwordsaatini">kata sandi lama</label>
				<!-- </div> -->
				<!-- <div class="col-md-10 mb-3"> -->
					<input type="password" class="form-control" id="passwordsaatini" name="passwordsaatini" placeholder="Masukkan Kata sandi (password) lama">
					<?= form_error('passwordsaatini', '<small class="text-danger">', '</small>'); ?>
				<!-- </div> -->
			</div>
			<div class="form-group mt-5">
				<!-- <div class="col-md-2 mb-3 text-right"> -->
					<label for="passwordbaru1">kata sandi baru</label>
				<!-- </div> -->
				<!-- <div class="col-md-10 mb-3"> -->
					<input type="password" class="form-control" id="passwordbaru1" name="passwordbaru1" placeholder="Masukkan Kata sandi (password) baru">
					<?= form_error('passwordbaru1', '<small class="text-danger">', '</small>'); ?>
				<!-- </div> -->
			</div>
			<div class="form-group mt-4">
				<!-- <div class="col-md-2 mb-3 text-right"> -->
					<label for="passwordbaru2">konfirmasi kata sandi baru</label>
				<!-- </div> -->
				<!-- <div class="col-md-10 mb-3"> -->
					<input type="password" class="form-control" id="passwordbaru2" name="passwordbaru2" placeholder="Konfirmasi Kata sandi (password) baru">
					<?= form_error('passwordbaru2', '<small class="text-danger">', '</small>'); ?>
				<!-- </div> -->
			</div>
			<div class="form-group">
				<!-- <div class="col-md-2 mb-3 text-right"> -->
					<a href="<?php echo site_url('AdminControl/home'); ?>" class="btn btn-danger" type="button">Batal</a>
				<!-- </div> -->
				<!-- <div class="col-md-10 mb-3"> -->
					<button class="btn btn-primary" type="submit">Simpan</button>
				<!-- </div> -->
			</div>

			<!-- /</?php } ?> -->

		</form>

	</div>
</div>
