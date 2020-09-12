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
		<div class="col col-md-12 mb-4">
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
			<a href="<?php echo site_url('AdminControl/laporan'); ?>" type="button" class="btn btn-success float-right">Buat laporan</a>
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
		<table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
			<thead>
				<tr>
					<th>Nomor</th>
					<th>Pemilik Di</th>
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
					<td>
						<?php foreach($outlet as $cabang) : ?>
							<?php if( $cabang->id == $data_owner->id_outlet) { ?>
								<?= $cabang->nama; ?>
							<?php } ?>
						<?php endforeach; ?>
					</td>
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
							<!-- <a href="/</?= site_url('AdminControl/edit_data_owner/'.$data_owner->id); ?>"><button class="btn btn-info">Edit</button></a>  -->
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalEdit<?= $data_owner->id ?>">Edit</button>
							<a href="<?= site_url('AdminControl/hapus_data_owner/'.$data_owner->id); ?>"><button class="btn btn-danger" onclick="return confirm('yakin?');">Hapus</button></a>
						</td>
					<?php } ?>
					<td>
						<!-- /</?= anchor('AdminControl/detail_data_owner/'.$data_owner->id,'<button type="button" class="btn btn-primary">Detail</button>'); ?>  -->
						<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalDetail<?= $data_owner->id ?>">Detail</button>
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
					<th>Pemilik Di</th>
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
	
<!-- modal edit -->
	<?php foreach($tb_user as $edit){  ?>
		<form action="<?= site_url('AdminControl/aksi_edit_owner') ?>" method="POST" enctype="multipart/form-data">
			<div class="modal fade" id="ModalEdit<?= $edit->id ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-edit"></i> ubah biodata kasir</h5>
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
									<label for="username">Nama Pengguna</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Nama Pengguna (username)" value="<?= $edit->username; ?>" disabled>
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
									<textarea name="alamat" id="alamat" class="form-control" placeholder="Masukkan Alamat Kasir" cols="30" rows="5" required><?= $edit->alamat; ?></textarea>
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
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="foto">Foto Profil</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="row">
										<div class="col-md-2">
											<input type="hidden" name="gambarlama" value="<?= $edit->foto ?>">
											<img src="<?= base_url('assets/img/foto/').$edit->foto ?>" style="width: 100px; height: 100px;" class="img-thumbnail">
										</div>
										<div class="col-md-10">
											<!-- <input type="file" name="foto" id="foto" style="width: 100%;"> -->
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="gambar" name="foto">
												<label class="custom-file-label" for="gambar">Choose file</label>
											</div>
										</div>
									</div>
									<!-- <img src="" style="width: 100px; height: 100px;"> -->
									<!-- <img src="/</?= base_url('assets/img/foto/').$edit->foto ?>" style="width: 100px; height: 100px;">
									<input type="file" name="foto" id="foto"> -->
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="user">Tipe user</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" id="user" disabled>
										<option>admin</option>
										<option>kasir</option>
										<option selected>owner</option>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="cabang">Cabang</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" id="cabang" name="cabang">
										<?php foreach($outlet as $cabang) : ?>
											<?php if( $cabang->id == $edit->id_outlet) { ?>
												<option value="<?= $cabang->id; ?>" selected><?= $cabang->nama; ?></option>
											<?php }else { ?>
												<option value="<?= $cabang->id; ?>"><?= $cabang->nama; ?></option>
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
<!-- modal detail -->
	<?php foreach($tb_user as $detail){  ?>
		<div class="modal fade" id="ModalDetail<?= $detail->id ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-cog"></i> Detail biodata owner</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<fieldset disabled>
						<div class="form-row">
							<div class="col-md-2 mb-3 text-right">
								<label for="namalengkap">Nama Lengkap</label>
							</div>
							<div class="col-md-10 mb-3">
								<input type="text" class="form-control" name="nama" id="namalengkap" value="<?= $detail->nama ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-2 mb-3 text-right">
								<label for="username">Nama Pengguna</label>
							</div>
							<div class="col-md-10 mb-3">
								<input type="text" class="form-control" name="username" id="username" value="<?= $detail->username ?>">
							</div>
						</div>
						<!-- <div class="form-row">
							<div class="col-md-2 mb-3 text-right">
								<label for="password">kata sandi</label>
							</div>
							<div class="col-md-10 mb-3">
								<input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Kata sandi (password)" required>
							</div>
						</div> -->
						<div class="form-row">
							<div class="col-md-2 mb-3 text-right">
								<label for="email">Email</label>
							</div>
							<div class="col-md-10 mb-3">
								<input type="email" class="form-control" name="email" id="email" value="<?= $detail->email ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-2 mb-3 text-right">
								<label for="alamat">Alamat Lengkap</label>
							</div>
							<div class="col-md-10 mb-3">
								<textarea name="alamat" id="alamat" class="form-control" cols="30" rows="5"> <?= $detail->alamat ?> </textarea>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-2 mb-3 text-right">
								<label for="telepon">Telepon</label>
							</div>
							<div class="col-md-10 mb-3">
								<input type="number" class="form-control" name="telepon" id="telepon" value="<?= $detail->tlp ?>">
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-2 mb-3 text-right">
								<label for="gender">Jenis Kelamin</label>
							</div>
							<div class="col-md-10 mb-3">
								<select class="form-control" name="gender" id="gender">
									<option><?= $detail->jenis_kelamin ?></option>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-2 mb-3 text-right">
								<label for="foto">Foto Profil</label>
							</div>
							<div class="col-md-10 mb-3">
								<img src="<?= base_url('assets/img/foto/').$detail->foto ?>" style="width: 100px; height: 100px;" id="foto" class="img-thumbnail">
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-2 mb-3 text-right">
								<label for="user">Tipe user</label>
							</div>
							<div class="col-md-10 mb-3">
								<select class="form-control" id="user" disabled>
									<option><?= $detail->role ?></option>
								</select>
							</div>
						</div>
						<div class="form-row">
							<div class="col-md-2 mb-3 text-right">
								<label for="cabang">Cabang</label>
							</div>
							<div class="col-md-10 mb-3">
								<select class="form-control" id="cabang" disabled>
									<?php foreach($outlet as $cabang) : ?>
										<?php if( $cabang->id == $detail->id_outlet) { ?>
											<option value="<?= $cabang->id; ?>" selected><?= $cabang->nama; ?></option>
										<?php } ?>
									<?php endforeach; ?>
								</select>
							</div>
						</div>
						</fieldset>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Mengerti</button>
						<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
<div class="garis"></div>
</div>
</div>
