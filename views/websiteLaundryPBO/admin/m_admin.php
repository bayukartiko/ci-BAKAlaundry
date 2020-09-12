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
			<div class="col col-md-12 mb-4">
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
			<i class="fas fa-user"></i> Data Administrator 
				<a href="<?php echo site_url('AdminControl/laporan'); ?>" type="button" class="btn btn-success float-right">Buat laporan</a>
			<br><br>
			<table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Mengawasi</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Alamat</th>
						<th>Nomor Telepon</th>
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
						<td>Semua Cabang</td>
						<td><?= $data_admin->nama ?></td>
						<td><?= $data_admin->username ?></td>
						<td><?= $data_admin->alamat ?></td>
						<td><?= $data_admin->tlp ?></td>
						<td>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalDetail<?= $data_admin->id ?>">Detail</button>
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
						<th>Mengawasi</th>
						<th>Nama</th>
						<th>Username</th>
						<th>Alamat</th>
						<th>Nomor Telepon</th>
						<th>Detail</th>
					</tr>
				</tfoot>
			</table>
		</div>
		

<!-- Modal detail -->
	<?php foreach($tb_user as $detail){  ?>
		<div class="modal fade" id="ModalDetail<?= $detail->id ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-cog"></i> Detail biodata kasir</h5>
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
										<option value="">Semua Cabang</option>
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
