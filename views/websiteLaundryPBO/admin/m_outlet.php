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
			<a href="<?php echo site_url('AdminControl/home'); ?>">Home</a> / <span class="text-muted">Manajemen Cabang toko</span>
		</span> 
	</div>
</nav>

<div class="isi">

	<h6><i class="fas fa-fw fa-store"></i> Manajemen Cabang toko</h6>
	<div class="row row-cols-1 row-cols-md-3 text-center">
		<div class="col col-md-12 mb-4">
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
		<i class="fas fa-fw fa-store"></i> Data cabang
			<a href="<?php echo site_url('AdminControl/laporan'); ?>" type="button" class="btn btn-success float-right">Buat laporan</a>
		<br><br>
		<a href="<?php echo site_url('AdminControl/t_outlet'); ?>" class="btn btn-info">Tambah cabang</a>
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
		<table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
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
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalEdit<?= $data_outlet->id ?>">Edit</button>
						</td>
					</tr>
					<?php 
						}
					 }else{ ?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							Data cabang <strong>Kosong !</strong>.
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

	
<!-- modal edit -->
	<?php foreach($tb_outlet as $edit){  ?>
		<form action="<?= site_url('AdminControl/aksi_edit_outlet') ?>" method="POST" enctype="multipart/form-data">
			<div class="modal fade" id="ModalEdit<?= $edit->id ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-fw fa-store"></i> Edit Data Cabang</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
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
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
							<button type="submit" class="btn btn-primary">Ubah</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	<?php } ?>
<div class="garis"></div>
</div>
</div>
