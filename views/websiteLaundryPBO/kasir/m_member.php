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
				<a href="<?php echo site_url('KasirControl/home'); ?>">Home</a> / <span class="text-muted">Manajemen Member</span>
			</span> 
		</div>
	</nav>
	
	<div class="isi">

		<h6><i class="fas fa-user"></i> Manajemen Data Member</h6>
		<div class="row row-cols-1 row-cols-md-3 text-center">
			<div class="col col-md-12 mb-4">
				<div class="card bg-light h-100">
					<!-- <img src="..." class="card-img-top" alt="..."> -->
					<div class="card-body">
						<i class="fas fa-users" style="width: 50px;  height: 50px;"></i>
						<h5 class="card-title">Total Member</h5>
						<p class="card-text">1</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="garis"></div>
		
		<div class="tabel">
			<i class="fas fa-user"></i> Data Member
			<br><br>
			<a href="<?php echo site_url('KasirControl/t_member'); ?>" class="btn btn-info">Tambah Member</a>

			<br><br>
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Alamat</th>
						<th>Nomor Telepon</th>
						<th>aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>baba</td>
						<td>babayuyu</td>
						<td>Isekai</td>
						<td>123456789</td>
						<td><button class="btn btn-info">Edit</button> <button class="btn btn-danger">Hapus</button></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<th>Nomor</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Alamat</th>
						<th>Nomor Telepon</th>
						<th>aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>
		
		<div class="garis"></div>
	</div>
</div>
