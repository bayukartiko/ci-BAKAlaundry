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
			<a href="#">Home</a> / <span class="text-muted">Manajemen User</span> / <span class="text-muted">Owner</span>
		</span> 
	</div>
</nav>

<div class="isi">

	<h6><i class="fas fa-user"></i> Manajemen Data Owner</h6>
	<div class="row row-cols-1 row-cols-md-3 text-center">
		<div class="col mb-4">
			<div class="card bg-light h-100">
				<!-- <img src="..." class="card-img-top" alt="..."> -->
				<div class="card-body">
					<i class="fas fa-users" style="width: 50px;  height: 50px;"></i>
					<h5 class="card-title">Total Owner</h5>
					<p class="card-text">
						<?= $h_owner; ?>
					</p>
				</div>
			</div>
		</div>
	</div>
	
	<div class="garis"></div>
	
	<div class="tabel">
		<i class="fas fa-user"></i> Data Owner
		<br><br>
		<a href="<?php echo site_url('AdminControl/t_owner'); ?>" class="btn btn-info">Tambah Owner</a>
		<br><br>
			<?php if($this->session->flashdata('sukses')) { ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data owner <strong>Berhasil</strong> <?= $this->session->flashdata('sukses'); ?>
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
					<th>Username</th>
					<th>Alamat</th>
					<th>Nomor Telepon</th>
					<th>Aksi</th>
					<th>Detail</th>
				</tr>
			</thead>
			<tbody>
				<?php
					if($h_owner>0){
						$nomor = 1;
						foreach ($tb_user as $data_owner){
				?>
				<tr>
					<td><?=  $nomor++ ?></td>
					<td><?= $data_owner->nama ?></td>
					<td><?= $data_owner->username ?></td>
					<td><?= $data_owner->alamat ?></td>
					<td><?= $data_owner->tlp ?></td>
					<?php if($data_owner->username == 'owner'){ ?>
						<td> 
							<a href="#"><button class="btn btn-info" disabled>Edit</button></a> 
							<a href="#"><button class="btn btn-danger" onclick="return confirm('yakin?');" disabled>Hapus</button></a>
						</td>
					<?php }else{ ?>
						<td> 
							<a href="<?= site_url('AdminControl/edit_data_owner/'.$data_owner->id); ?>"><button class="btn btn-info">Edit</button></a> 
							<a href="<?= site_url('AdminControl/hapus_data_owner/'.$data_owner->id); ?>"><button class="btn btn-danger">Hapus</button></a>
						</td>
					<?php } ?>
					<td>
						<?= anchor('AdminControl/detail_data_owner/'.$data_owner->id,'<button type="button" class="btn btn-primary">Detail</button>'); ?> 
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
