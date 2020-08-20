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
				<a href="#">Home</a> / <span class="text-muted">Manajemen User</span> / <span class="text-muted">Admin</span>
			</span> 
		</div>
	</nav>

	<div class="isi">

		<h6><i class="fas fa-user"></i> Manajemen Data Administrator</h6>
		<div class="row row-cols-1 row-cols-md-3 text-center">
			<div class="col mb-4">
				<div class="card bg-light h-100">
					<!-- <img src="..." class="card-img-top" alt="..."> -->
					<div class="card-body">
						<i class="fas fa-users" style="width: 50px;  height: 50px;"></i>
						<h5 class="card-title">Total Administrator</h5>
						<p class="card-text">
							<?= $h_admin; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="garis"></div>
		
		<div class="tabel">
			<i class="fas fa-user"></i> Data Administrator <br><br>
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Alamat</th>
						<th>Nomor Telepon</th>
						<th>Aksi</th>
						<th>Detail</th>
					</tr>
				</thead>
				<tbody>
					<?php
						if($h_admin>0){
							$nomor = 1;
							foreach ($tb_user as $data_admin){
					?>
					<tr>
						<td><?=  $nomor++ ?></td>
						<td><?= $data_admin->nama ?></td>
						<td><?= $data_admin->username ?></td>
						<td><?= $data_admin->alamat ?></td>
						<td><?= $data_admin->tlp ?></td>
						<td>
							<button class="btn btn-info" style="cursor: not-allowed;" disabled>Edit</button> 
							<button class="btn btn-danger" style="cursor: not-allowed;" disabled>Hapus</button>
						</td>
						<td>
							<?= anchor('AdminControl/detail_data_admin/'.$data_admin->id,'<button type="button" class="btn btn-info">Detail</button>'); ?> 
						</td>
					</tr>
					<?php 
						}
					 }else{ ?>
					 	Data Kasir kosong !
					 <?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<th>Nomor</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Alamat</th>
						<th>Nomor Telepon</th>
						<th>Aksi</th>
						<th>Detail</th>
					</tr>
				</tfoot>
			</table>
		</div>
		
		<div class="garis"></div>
	</div>
</div>
