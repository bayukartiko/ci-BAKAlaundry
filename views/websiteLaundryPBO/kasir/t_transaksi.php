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
				<a href="<?php echo site_url('KasirControl/m_home'); ?>">Home</a> / <a href="<?php echo site_url('KasirControl/m_transaksi'); ?>">Transaksi</a> / <span class="text-muted">Tambah Transaksi</span>
			</span> 
		</div>
	</nav>
	
	<div class="isi">

		<h6><i class="fas fa-fw fa-money-bill-wave"></i> Tambah Data Transaksi</h6>
		
		<form class="tabel">
			<p class="text-center mb-5"><i class="fas fa-fw fa-money-bill-wave"></i> Tambah Data Transaksi</p>

			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="jenis">Jenis Paket</label>
				</div>
				<div class="col-md-10 mb-3">
					<select class="form-control" id="jenis" required>
						<option>Pakaian</option>
						<option>Bed cover</option>
						<option>Boneka</option>
						<option>Jasa Setrika saja <span class="text-muted">(tanpa cuci)</span></option>
						<option>Cuci Karpet</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="namapaket">Nama Paket</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="text" class="form-control" id="namapaket" placeholder="Masukkan Nama Paket" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<label for="harga">Harga/Kg</label>
				</div>
				<div class="col-md-10 mb-3">
					<input type="number" class="form-control" id="harga" placeholder="Masukkan Harga/Kg" required>
				</div>
			</div>
			<div class="form-row">
				<div class="col-md-2 mb-3 text-right">
					<a href="<?php echo site_url('KasirControl/m_transaksi'); ?>" class="btn btn-danger" type="button">Batal</a>
				</div>
				<div class="col-md-10 mb-3">
					<button class="btn btn-primary" type="submit">Tambah</button>
				</div>
			</div>
		</form>

	</div>
</div>
