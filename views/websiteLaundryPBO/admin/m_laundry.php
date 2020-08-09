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
			<a href="#">Home</a> / <span class="text-muted">Manajemen Laundry</span>
		</span> 
	</div>
</nav>

<div class="isi">

	<h6><i class="fas fa-th-list"></i> Manajemen Paket Laundry</h6>
	<div class="row row-cols-1 row-cols-md-3 text-center">
		<div class="col mb-4">
			<div class="card bg-light h-100">
				<!-- <img src="..." class="card-img-top" alt="..."> -->
				<div class="card-body">
					<i class="fas fa-th-list" style="width: 50px;  height: 50px;"></i>
					<h5 class="card-title">Total Paket Laundry tersedia</h5>
					<p class="card-text">1</p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="garis"></div>
	
	<div class="tabel">
		<i class="fas fa-th-list"></i> Data Paket Laundry
		<br><br>
		<a href="<?php echo site_url('AdminControl/t_paket'); ?>" class="btn btn-info">Tambah Paket</a>
		<br><br>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>Nomor</th>
					<th>Jenis</th>
					<th>Harga/Kg</th>
					<th>aksi</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>Cuci dosa</td>
					<td>1000</td>
					<td><button class="btn btn-info">Edit</button> <button class="btn btn-danger">Hapus</button></td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<th>Nomor</th>
					<th>Jenis</th>
					<th>Harga/Kg</th>
					<th>aksi</th>
				</tr>
			</tfoot>
		</table>
	</div>
	
	<div class="garis"></div>
</div>
</div>
