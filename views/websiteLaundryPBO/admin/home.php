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
				<span class="text-muted">Home</span>
			</span>
		</div>
	</nav>

	<div class="isi">
		<h4>Selamat Datang <?= $tb_user['nama']; ?> Di website BAKA Laundry</h4>
		<!-- <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
				<li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="<?= base_url('assets/img/1.jpg'); ?>" class="d-block w-100">
					<div class="carousel-caption d-none d-md-block">
						<h5>First slide label</h5>
						<p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="<?= base_url('assets/img/1.jpg'); ?>" class="d-block w-100">
					<div class="carousel-caption d-none d-md-block">
						<h5>Second slide label</h5>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
					</div>
				</div>
				<div class="carousel-item">
					<img src="<?= base_url('assets/img/1.jpg'); ?>" class="d-block w-100">
					<div class="carousel-caption d-none d-md-block">
						<h5>Third slide label</h5>
						<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
					</div>
				</div>
			</div>
			<a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div> -->

		<?php if($this->session->flashdata('sukses')) { ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Profil anda <strong>Berhasil</strong> <?= $this->session->flashdata('sukses'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php } ?>

		<div class="card mb-3" style="max-width: 540px;">
			<div class="row no-gutters">
				<div class="col-md-4">
					<img src="<?= base_url('assets/img/foto/') . $tb_user['foto']; ?>" class="card-img">
				</div>
				<div class="col-md-8">
					<div class="card-body" style="padding: 10px;">
						<h5 class="card-title"><?= $tb_user['nama']; ?></h5>
						<p class="card-text"><?= $tb_user['email']; ?></p>
						<p class="card-text"><small class="text-muted"><?= date('d F Y', $tb_user['tgl_dibuat']); ?></small></p>
						<a href="<?php echo site_url('AdminControl/e_profil') ?>" class="btn btn-primary">Ubah profil</a> | 
						<a href="<?php echo site_url('AdminControl/e_password') ?>" class="btn btn-primary">Ubah kata sandi</a>
						<!-- <a href="#" onclick="swal('coba alert', 'coba sweetalert', 'success')">coba</a> -->
					</div>
				</div>
			</div>
		</div>
			
	</div>
</div>
