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
				<a href="<?php echo site_url('AdminControl/home'); ?>">Home</a> / <span class="text-muted">Manajemen Pelanggan</span>
			</span> 
		</div>
	</nav>
	
	<div class="isi">

		<h6><i class="fas fa-user"></i> Manajemen Data Pelanggan</h6>
		<div class="row row-cols-1 row-cols-md-3 text-center">
			<div class="col col-md-12 mb-4">
				<div class="card bg-light h-100">
					<!-- <img src="..." class="card-img-top" alt="..."> -->
					<div class="card-body">
						<i class="fas fa-users" style="width: 50px;  height: 50px;"></i>
						<h5 class="card-title">Total Pelanggan</h5>
						<p class="card-text text-dark">
							<?= $h_member; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="garis"></div>
		
		<div class="tabel">
			<i class="fas fa-user"></i> Data Pelanggan
				<a href="<?php echo site_url('AdminControl/laporan'); ?>" type="button" class="btn btn-success float-right">Buat laporan</a>
			<br><br>
			<a href="<?php echo site_url('AdminControl/t_member'); ?>" class="btn btn-info">Tambah Pelanggan</a>
			<br><br>
			<?php if($this->session->flashdata('sukses')) { ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data Pelanggan <strong>Berhasil</strong> <?= $this->session->flashdata('sukses'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php } ?>
			<br>
			<table id="example" class="table table-striped table-bordered table-sm" style="width:100%;">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Alamat</th>
						<th>Nomor Telepon</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if($h_member>0){
						$nomor = 1;
						foreach ($tb_member as $data_member){
					?>
					<tr>
						<td><?=  $nomor++ ?></td>
						<td><?= $data_member->nama ?></td>
						<td><?= $data_member->email ?></td>
						<td><?= $data_member->alamat ?></td>
						<td><?= $data_member->tlp ?></td>
						<td> 
							<!-- <a href="/</?= site_url('AdminControl/edit_data_member/'.$data_member->id); ?>"><button class="btn btn-info">Edit</button></a>  -->
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalEdit<?= $data_member->id ?>">Edit</button>
							<a href="<?= site_url('AdminControl/hapus_data_member/'.$data_member->id); ?>"><button class="btn btn-danger" onclick="return confirm('yakin?');">Hapus</button></a>
						</td>
						<!-- <td> 
							/</?= anchor('AdminControl/detail_data_member/'.$data_member->id,'<button type="button" class="btn btn-primary">Detail</button>'); ?> 
						</td> -->
					</tr>
					<?php 
						}
					 }else{ ?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							Data Pelanggan <strong>Kosong !</strong>
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
						<th>Email</th>
						<th>Alamat</th>
						<th>Nomor Telepon</th>
						<th>Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div>

<!-- modal edit -->
	<?php foreach($tb_member as $edit){  ?>
		<form action="<?= site_url('AdminControl/aksi_edit_member') ?>" method="POST" enctype="multipart/form-data">
			<div class="modal fade" id="ModalEdit<?= $edit->id ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-edit"></i> ubah biodata owner</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<input type="hidden" name="id" value="<?= $edit->id; ?>">

							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="namalengkap">Nama Lengkap</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="text" class="form-control" name="nama" id="namalengkap" placeholder="Masukkan Nama Lengkap" value="<?= $edit->nama; ?>" required>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="email">Email</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" value="<?= $edit->email; ?>" required>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="alamat">Alamat Lengkap</label>
								</div>
								<div class="col-md-10 mb-3">
									<textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat Pelanggan" cols="30" rows="5" required><?= $edit->alamat; ?></textarea>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="telepon">Telepon</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="number" class="form-control" name="telepon" id="telepon" placeholder="Masukkan No. Telepon" value="<?= $edit->tlp; ?>" required>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="gender">Jenis Kelamin</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" name="gender" id="gender" required>
										<?php foreach($gender as $kelamin) : ?>
											<?php if( $kelamin == $edit->jenis_kelamin) { ?>
												<option value="<?= $kelamin; ?>" selected><?= $kelamin; ?></option>
											<?php }else { ?>
												<option value="<?= $kelamin; ?>"><?= $kelamin; ?></option>
											<?php } ?>
										<?php endforeach; ?>
									</select>
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
