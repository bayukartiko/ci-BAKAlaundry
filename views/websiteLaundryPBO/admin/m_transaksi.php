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
				<a href="<?php echo site_url('AdminControl/home'); ?>">Home</a> / <span class="text-muted">Manajemen Transaksi</span>
			</span> 
		</div>
	</nav>
	
	<div class="isi">

		<h6><i class="fas fa-fw fa-shopping-cart"></i> Manajemen Data transaksi</h6>
		<div class="row row-cols-1 row-cols-md-3 text-center">
			<div class="col col-md-6 mb-4">
				<div class="card bg-light h-100">
					<!-- <img src="..." class="card-img-top" alt="..."> -->
					<div class="card-body">
						<i class="fas fa-fw fa-shopping-cart" style="width: 50px;  height: 50px;"></i>
						<h5 class="card-title">Total order baru</h5>
						<p class="card-text text-dark">
							<?= $h_transaksi_baru; ?>
						</p>
					</div>
				</div>
			</div>
			<div class="col col-md-6 mb-4">
				<div class="card bg-light h-100">
					<!-- <img src="..." class="card-img-top" alt="..."> -->
					<div class="card-body">
						<i class="fas fa-fw fa-shopping-cart" style="width: 50px;  height: 50px;"></i>
						<h5 class="card-title">Total semua order</h5>
						<p class="card-text text-dark">
							<?= $h_total_transaksi; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="garis"></div>
		
		<div class="tabel">
			<i class="fas fa-fw fa-shopping-cart"></i> Data transaksi
				<a href="<?php echo site_url('AdminControl/laporan'); ?>" type="button" class="btn btn-success float-right">Buat laporan</a> 
			<br><br>
			<a href="<?php echo site_url('AdminControl/t_transaksi'); ?>" class="btn btn-info">Tambah transaksi</a>
			<br><br>
			<?php if($this->session->flashdata('sukses')) { ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data transaksi <strong>Berhasil</strong> <?= $this->session->flashdata('sukses'); ?>
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
						<th>Tgl.transaksi</th>
						<th>Cabang</th>
						<th>Pembayaran</th>
						<th>Member</th>
						<th>Paket</th>
						<th>Status order</th>
						<th>Total</th>
						<th>Detail</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if($h_total_transaksi>0){
						$nomor = 1;
						foreach ($tb_transaksi as $data_transaksi){
					?>
					<tr>
						<td><?=  $nomor++ ?></td>
						<td><?= (new DateTime($data_transaksi->tgl))->format('d/M/Y'); ?></td>
						<td>
							<?php foreach($outlet as $cabang) : ?>
								<?php if( $cabang->id == $data_transaksi->id_outlet) { ?>
									<?= $cabang->nama; ?>
								<?php } ?>
							<?php endforeach; ?>
						</td>
						<td>
							<div class="btn btn-outline-success">
								<?= $data_transaksi->status_bayar ?>
							</div>
						</td>
						<td>
							<?php foreach($member as $pelanggan) : ?>
								<?php if( $pelanggan->id == $data_transaksi->id_member) { ?>
									<?= $pelanggan->nama; ?>
								<?php } ?>
							<?php endforeach; ?>
						</td>
						<td>
							<?php foreach($paket as $pakets) : ?>
								<?php if( $pakets->id == $data_transaksi->id_paket) { ?>
									<?= $pakets->nama_paket; ?>
								<?php } ?>
							<?php endforeach; ?>
						</td>
						<td>
							<div class="btn btn-outline-info">
								<?= $data_transaksi->status ?>
							</div>
						</td>
						<td>Rp.<?= number_format($data_transaksi->total,2,',','.') ?></td>
						<td> 
							<?= anchor('AdminControl/detail_data_transaksi/'.$data_transaksi->id,'<button type="button" class="btn btn-primary">Detail</button>'); ?> 
							<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalEdit</?= $data_transaksi->id ?>">Detail</button> -->
						</td>
					</tr>
					<?php 
						}
					 }else{ ?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							Data transaksi <strong>Kosong !</strong>.
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					 	<!-- Data transaksi kosong ! -->
					 <?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<th>Nomor</th>
						<th>Tgl.transaksi</th>
						<th>Cabang</th>
						<th>Pembayaran</th>
						<th>Member</th>
						<th>Paket</th>
						<th>Status order</th>
						<th>Total</th>
						<th>Detail</th>
					</tr>
				</tfoot>
			</table>
		</div>
	<div class="garis"></div>
<!-- modal edit -->
	<?php $nomor = 1; foreach($tb_transaksi as $edit){  ?>
		<form action="<?= site_url('AdminControl/aksi_edit_transaksi') ?>" method="POST" enctype="multipart/form-data">
			<div class="modal fade" id="ModalEdit<?= $edit->id ?>" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-fw fa-file-invoice-dollar"></i> Detail Transaksi</h5>
							<button type="button" class="btn btn-success" data-dismiss="modal">Mengerti</button>
						</div>
						<div class="modal-body">
							<input type="hidden" name="id" value="<?= $edit->id; ?>">

							<table class="table table-bordered table-hover">
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Kode Transaksi</td>
									<td><?= $edit->kode_invoice; ?></td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Cabang Toko</td>
									<td>
										<?php foreach($outlet as $cabang) : ?>
											<?php if( $cabang->id == $edit->id_outlet) { ?>
												<?= $cabang->nama; ?>
											<?php }?>
										<?php endforeach; ?>
									</td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Nama Petugas</td>
									<td><?= $tb_user['nama']; ?></td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Nama Pelanggan</td>
									<td>
										<?php foreach($tb_member as $data_member) : ?>
											<?php if( $data_member->id == $edit->id_member) { ?>
												<?= $data_member->nama; ?>
											<?php }?>
										<?php endforeach; ?>
									</td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Alamat Pelanggan</td>
									<td>
										<?php foreach($tb_member as $data_member) : ?>
											<?php if( $data_member->id == $edit->id_member) { ?>
												<?= $data_member->alamat; ?>
											<?php }?>
										<?php endforeach; ?>
									</td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Email Pelanggan</td>
									<td>
										<?php foreach($tb_member as $data_member) : ?>
											<?php if( $data_member->id == $edit->id_member) { ?>
												<?= $data_member->email; ?>
											<?php }?>
										<?php endforeach; ?>
									</td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">No.Telepon Pelanggan</td>
									<td>
										<?php foreach($tb_member as $data_member) : ?>
											<?php if( $data_member->id == $edit->id_member) { ?>
												<?= $data_member->tlp; ?>
											<?php }?>
										<?php endforeach; ?>
									</td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Tipe Pembayaran</td>
									<td>Tunai</td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Status Order</td>
									<td>
										<select class="form-control" name="edit_s_pembayaran" id="edit_s_pembayaran">
											<?php foreach($status_order as $pilih_s_order) : ?>
												<?php if( $pilih_s_order == $edit->status) { ?>
													<option value="<?= $pilih_s_order; ?>" selected disabled>+ <?= $pilih_s_order; ?> +</option>
												<?php }else { ?>
													<option value="<?= $pilih_s_order; ?>"><?= $pilih_s_order; ?></option>
												<?php } ?>
											<?php endforeach; ?>
										</select>
									</td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Status Pembayaran</td>
									<td>
										<select class="form-control" name="edit_s_order" id="edit_s_order">
											<?php foreach($status_dibayar as $pilih_s_pembayaran) : ?>
												<?php if( $pilih_s_pembayaran == $edit->status_bayar) { ?>
													<option value="<?= $pilih_s_pembayaran; ?>" selected disabled>+ <?= $pilih_s_pembayaran; ?> +</option>
												<?php }else { ?>
													<option value="<?= $pilih_s_pembayaran; ?>"><?= $pilih_s_pembayaran; ?></option>
												<?php } ?>
											<?php endforeach; ?>
										</select>
									</td>
								</tr>
								<tr>
									<td class="text-right bg-primary text-white" style="width: 250px;">Tanggal Ambil</td>
									<td><?= (new DateTime($edit->tgl_ambil))->format('d/M/Y'); ?></td>
								</tr>
							</table>

							<table class="table table-bordered table-hover table-sm">
								<thead>
									<tr>
										<th scope="col">No</th>
										<th scope="col">Tgl.Order</th>
										<th scope="col">Paket Laundry</th>
										<th scope="col">Harga</th>
										<th scope="col">Jumlah Barang</th>
										<th scope="col">Subtotal</th>
										<th scope="col">Tunai</th>
										<th scope="col">Kembali</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<th scope="row"><?=  $nomor++ ?></th>
										<td><?= (new DateTime($edit->tgl))->format('d/M/Y'); ?></td>
										<td>
											<?php foreach($paket as $pakets) : ?>
												<?php if( $pakets->id == $edit->id_paket) { ?>
													<?= $pakets->nama_paket; ?>
												<?php } ?>
											<?php endforeach; ?>
										</td>
										<td>
											<?php foreach($paket as $pakets) : ?>
												<?php if( $pakets->id == $edit->id_paket) { ?>
													Rp.<?= number_format($pakets->harga,2,',','.') ?> / <?= $pakets->satuan ?>
												<?php } ?>
											<?php endforeach; ?>
										</td>
										<td>
											<?= $edit->jumlah; ?>
											<?php foreach($paket as $pakets) : ?>
												<?php if( $pakets->id == $edit->id_paket) { ?>
													<?= $pakets->satuan ?>
												<?php } ?>
											<?php endforeach; ?>
										</td>
										<td>
											<input type="hidden" name="total_harga" id="total_harga" value="<?= $edit->total ?>">
											Rp.<?= number_format($edit->total,2,',','.') ?>
										</td>
										<td>
											<?php foreach($status_dibayar as $pilih_s_pembayaran) : ?>
												<?php if( $pilih_s_pembayaran == $edit->status_bayar) { ?>
													<?php if( $edit->status_bayar == 'Dibayar'){ ?>
														Rp.<?= number_format($edit->tunai,2,',','.') ?>
													<?php }elseif( $edit->status_bayar == 'Kurang'){ ?>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text">Rp.</span>
															</div>
															<input type="number" min="0" class="form-control" id="harga_tunai_detail" name="harga_tunai_detail" value="<?= $edit->tunai ?>">
														</div>
													<?php }?>
												<?php } ?>
											<?php endforeach; ?>
										</td>
										<td>
											<?php foreach($status_dibayar as $pilih_s_pembayaran) : ?>
												<?php if( $pilih_s_pembayaran == $edit->status_bayar) { ?>
													<?php if( $edit->status_bayar == 'Dibayar'){ ?>
														Rp.<?= number_format($edit->kembali_or_kurang,2,',','.') ?>
													<?php }elseif( $edit->status_bayar == 'Kurang'){ ?>
														<div class="input-group">
															<div class="input-group-prepend">
																<span class="input-group-text">Rp.</span>
															</div>
															<input type="number" min="0" class="form-control" id="harga_kembali_detail" name="harga_kembali_detail" value="<?= $edit->kembali_or_kurang ?>" readonly>
														</div>
													<?php }?>
												<?php } ?>
											<?php endforeach; ?>
										</td>
									</tr>
									<tr>
										<th colspan="7" class="text-center bg-primary text-white">TOTAL HARGA</th>
										<th>Rp.<?= number_format($edit->total,2,',','.') ?></th>
									</tr>
								</tbody>
							</table>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cetak Struk</button>
							<button type="submit" class="btn btn-primary">Ubah Status Oder</button>
						</div>
					</div>
				</div>
			</div>
		</form>
	<?php } ?>						

</div>
</div>
