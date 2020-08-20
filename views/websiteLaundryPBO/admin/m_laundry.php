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
					<p class="card-text">
						<?= $h_paket; ?>
					</p>
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
			<?php if($this->session->flashdata('sukses')) { ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data paket <strong>Berhasil</strong> <?= $this->session->flashdata('sukses'); ?>
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
					<th>Jenis</th>
					<th>Nama</th>
					<th>Harga/Kg</th>
					<th>aksi</th>
				</tr>
			</thead>
			<tbody>
					<?php
						if($h_paket>0){
							$nomor = 1;
							foreach ($tb_paket as $data_paket){
						?>
						<tr>
							<td><?=  $nomor++ ?></td>
							<td><?= $data_paket->jenis ?></td>
							<td><?= $data_paket->nama_paket ?></td>
							<td><?= $data_paket->harga ?></td>
							<td> 
								<a href="<?= site_url('AdminControl/edit_data_paket/'.$data_paket->id); ?>"><button class="btn btn-info">Edit</button></a> 
								<a href="<?= site_url('AdminControl/hapus_data_paket/'.$data_paket->id); ?>"><button class="btn btn-danger" onclick="return confirm('yakin?');">Hapus</button></a>
							</td>
							<!-- <td> 
								/</?= anchor('AdminControl/detail_data_paket/'.$data_paket->id,'<button type="button" class="btn btn-primary">Detail</button>'); ?> 
							</td> -->
						</tr>
						<?php 
							}
						}else{ ?>
							<div class="alert alert-warning alert-dismissible fade show" role="alert">
								Data paket <strong>Kosong !</strong>.
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
					<th>Jenis</th>
					<th>Nama</th>
					<th>Harga/Kg</th>
					<th>aksi</th>
				</tr>
			</tfoot>
		</table>
	</div>
	
	<div class="garis"></div>
</div>
</div>
