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
				<a href="#">Home</a> / <a href="#">Manajemen Outlet</a> / <span class="text-muted">Tambah Cabang</span>
			</span> 
		</div>
	</nav>
	
	<div class="isi">

		<h6><i class="fas fa-th-list"></i> Tambah cabang</h6>
		
		<form class="tabel">
			<p class="text-center mb-5"><i class="fas fa-th-list"></i> Tambah cabang</p>

			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="namacabang">Nama cabang</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="text" class="form-control" id="namacabang" placeholder="Masukkan Nama cabang" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="alamatcabang">Alamat cabang</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="text" class="form-control" id="alamatcabang" placeholder="Masukkan alamat cabang" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="tlp">Telepon</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="number" class="form-control" id="tlp" placeholder="Masukkan Telepon" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<a href="<?php echo site_url('AdminControl/m_outlet'); ?>" class="btn btn-danger" type="button">Batal</a>
				</div>
				<div class="col-md-10 mb-3">
					<button class="btn btn-primary" type="submit">Tambah</button>
				</div>
			</div>
		</form>

	</div>
</div>
