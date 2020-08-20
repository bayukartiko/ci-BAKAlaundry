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
				<a href="<?php echo site_url('AdminControl/home'); ?>">Home</a> / <a href="<?php echo site_url('AdminControl/m_outlet'); ?>">Manajemen Outlet</a> / <span class="text-muted">Edit Cabang</span>
			</span> 
		</div>
	</nav>
	
	<div class="isi">

		<h6><i class="fas fa-th-list"></i> Edit data cabang</h6>
		
		<form class="tabel" action="<?= site_url('AdminControl/aksi_edit_outlet') ?>" method="POST" enctype="multipart/form-data">
			<p class="text-center mb-5"><i class="fas fa-th-list"></i> Edit data cabang</p>

			<?php foreach($data_edit_outlet as $edit){ ?>

				<input type="hidden" name="id" value="<?= $edit->id; ?>">

			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="namacabang">Nama cabang</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="text" class="form-control" id="namacabang" name="nama" placeholder="Masukkan Nama cabang" value="<?= $edit->nama; ?>" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="alamatcabang">Alamat cabang</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="text" class="form-control" id="alamatcabang" name="alamat" placeholder="Masukkan alamat cabang" value="<?= $edit->alamat; ?>" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="tlp">Telepon</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="number" class="form-control" id="tlp" name="telepon" placeholder="Masukkan Telepon" value="<?= $edit->tlp; ?>" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<a href="<?php echo site_url('AdminControl/m_outlet'); ?>" class="btn btn-danger" type="button">Batal</a>
				</div>
				<div class="col-md-10 mb-3">
					<button class="btn btn-primary" type="submit">Ubah</button>
				</div>
			</div>

			<?php } ?>
		</form>

	</div>
</div>
