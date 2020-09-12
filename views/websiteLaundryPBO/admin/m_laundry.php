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
		<div class="col col-md-12 mb-4">
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
			<a href="<?php echo site_url('AdminControl/laporan'); ?>" type="button" class="btn btn-success float-right">Buat laporan</a>
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
		<table id="example" class="table table-striped table-bordered table-sm" style="width:100%">
			<thead>
				<tr>
					<th>Nomor</th>
					<th>Cabang</th>
					<th>Jenis</th>
					<th>Nama</th>
					<th>Harga</th>
					<th>Satuan</th>
					<th>Diskon</th>
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
							<td>
								<?php foreach($outlet as $cabang) : ?>
									<?php if( $cabang->id == $data_paket->id_outlet) { ?>
										<?= $cabang->nama; ?>
									<?php } ?>
								<?php endforeach; ?>
							</td>
							<td><?= $data_paket->jenis ?></td>
							<td><?= $data_paket->nama_paket ?></td>
							<?php if($data_paket->diskon == 0){ ?>
								<td>
									Rp.<?= number_format($data_paket->harga,2,',','.') ?>
								</td>
							<?php }else{ ?>
								<td>
									<i><del class="text-muted" style="font-size: 10px;">Rp.<?= number_format($data_paket->harga,2,',','.') ?></del></i> <?= $data_paket->diskon ?>%
									<?php 
										$harga = $data_paket->harga ;
										$diskon = $data_paket->diskon ;

										$hasildiskon = $harga*($diskon/100);
										$hasilakhir = $harga-$hasildiskon;
									?>
									<br>
									<u>Rp.<?= number_format($hasilakhir,2,',','.') ?></u>
									<br>
									<span class="text-muted" style="font-size: 3px;">Hemat <b>Rp.<?= number_format($hasildiskon,2,',','.') ?></b></span>
								</td>
							<?php } ?>
							<td>/<?= $data_paket->satuan ?></td>
							<?php if($data_paket->diskon == '0'){ ?>
								<td>Belum ada Diskon</td>
							<?php }else{ ?>
								<td><?= $data_paket->diskon ?>%</td>
							<?php } ?>
							<td> 
								<!-- <a href="/</?= site_url('AdminControl/edit_data_paket/'.$data_paket->id); ?>"><button class="btn btn-info">Edit</button></a>  -->
								<button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalEdit<?= $data_paket->id ?>">Edit</button>
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
					<th>Cabang</th>
					<th>Jenis</th>
					<th>Nama</th>
					<th>Harga</th>
					<th>Satuan</th>
					<th>Diskon</th>
					<th>aksi</th>
				</tr>
			</tfoot>
		</table>
	</div>
	
<!-- modal edit -->
	<?php foreach($tb_paket as $edit){  ?>
		<form action="<?= site_url('AdminControl/aksi_edit_paket') ?>" method="POST" enctype="multipart/form-data">
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
									<label for="outlet">Cabang Toko</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" id="outlet" name="cabang" required>
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
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="jenis">Jenis Paket</label>
								</div>
								<div class="col-md-10 mb-3">
									<select class="form-control" name="jenis" id="jenis" required>
										<?php foreach($jenis as $j) : ?>
											<?php if( $j == $edit->jenis) { ?>
												<option value="<?= $j; ?>" selected><?= $j; ?></option>
											<?php }else { ?>
												<option value="<?= $j; ?>"><?= $j; ?></option>
											<?php } ?>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="namapaket">Nama Paket</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="text" class="form-control" id="namapaket" name="namapaket" value="<?= $edit->nama_paket; ?>" placeholder="Masukkan Nama Paket" required>
								</div>
							</div>
							<!-- <div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="harga">Harga/Kg</label>
								</div>
								<div class="col-md-10 mb-3">
									<input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan Harga/Kg" required>
								</div>
							</div> -->
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="harga">Harga</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text">Rp.</span>
										</div>
										<input type="number" class="form-control" id="harga" name="harga" value="<?= $edit->harga; ?>" placeholder="Masukkan Harga">
										<div class="input-group-append">
											<!-- <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Satuan</button>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="#">/kg</a>
												<a class="dropdown-item" href="#">/m2</a>
											</div> -->
											<select class="form-control" name="satuan" id="satuan" required>
												<?php foreach($satuan as $s) : ?>
													<?php if( $s == $edit->satuan) { ?>
														<option value="<?= $s; ?>" selected>/<?= $s; ?></option>
													<?php }else { ?>
														<option value="<?= $s; ?>">/<?= $s; ?></option>
													<?php } ?>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-2 mb-3 text-right">
									<label for="diskon">Ubah Diskon ?</label>
								</div>
								<div class="col-md-10 mb-3">
									<div class="input-group input-grup-diskon mb-3"><input type="number" class="form-control" name="inputan_diskon" id="inputan_diskon" placeholder="Masukkan jumlah diskon" min="0" max="100" value="<?= $edit->diskon; ?>" required><div class="input-group-append"><span class="input-group-text">%</span></div></div>
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
