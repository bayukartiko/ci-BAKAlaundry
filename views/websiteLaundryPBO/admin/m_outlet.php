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
			<a href="<?php echo site_url('AdminControl/home'); ?>">Home</a> / <span class="text-muted">Manajemen Outlet</span>
		</span> 
	</div>
</nav>

<div class="isi">

	<h6><i class="fas fa-fw fa-store"></i> Manajemen Outlet (cabang)</h6>
	<div class="row row-cols-1 row-cols-md-3 text-center">
		<div class="col mb-4">
			<div class="card bg-light h-100">
				<!-- <img src="..." class="card-img-top" alt="..."> -->
				<div class="card-body">
					<i class="fas fa-fw fa-store" style="width: 50px;  height: 50px;"></i>
					<h5 class="card-title">Total cabang tersedia</h5>
					<p class="card-text">
						<?= $h_outlet; ?>
					</p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="garis"></div>
	
	<div class="tabel">
		<i class="fas fa-fw fa-store"></i> Data outlet
		<br><br>
		<a href="<?php echo site_url('AdminControl/t_outlet'); ?>" class="btn btn-info">Tambah Cabang</a>
		<br><br>
			<?php if($this->session->flashdata('sukses')) { ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data outlet <strong>Berhasil</strong> <?= $this->session->flashdata('sukses'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php } ?>
		<br>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
			<thead>
				<tr>
					<th>Nomor</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>telepon</th>
					<th>aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($h_outlet>0){
						$nomor = 1;
						foreach ($tb_outlet as $data_outlet){
					?>
					<tr>
						<td><?=  $nomor++ ?></td>
						<td><?= $data_outlet->nama ?></td>
						<td><?= $data_outlet->alamat ?></td>
						<td><?= $data_outlet->tlp ?></td>
						<td> 
							<a href="<?= site_url('AdminControl/edit_data_outlet/'.$data_outlet->id); ?>"><button class="btn btn-info">Edit</button></a> 
						</td>
					</tr>
					<?php 
						}
					 }else{ ?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							Data kasir <strong>Kosong !</strong>.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					 	<!-- Data Kasir kosong ! -->
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th>Nomor</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>telepon</th>
					<th>aksi</th>
				</tr>
			</tfoot>
		</table>
	</div>
	
	<div class="garis"></div>
</div>
</div>
