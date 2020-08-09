<!-- Content  -->
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
				<a href="<?php echo site_url('KasirControl/home'); ?>">Home</a>
			</span>
		</div>
	</nav>

	<div class="isi">
		<h4>Selamat Datang <?= $tb_user['username']; ?> Di website BAKA Laundry</h4>
		<div class="card mb-3" style="max-width: 540px;">
			<div class="row no-gutters">
				<div class="col-md-4">
					<img src="<?= base_url('assets/img/foto/') . $tb_user['foto']; ?>" class="card-img">
				</div>
				<div class="col-md-8">
					<div class="card-body" style="padding: 10px;">
						<h5 class="card-title"><?= $tb_user['username']; ?></h5>
						<p class="card-text"><?= $tb_user['email']; ?>.</p>
						<p class="card-text"><small class="text-muted"><?= date('d F Y', $tb_user['tgl_dibuat']); ?></small></p>
						<a href="" class="btn btn-primary">Ubah profil</a>

					</div>
				</div>
			</div>
		</div>
			
	</div>
</div>
