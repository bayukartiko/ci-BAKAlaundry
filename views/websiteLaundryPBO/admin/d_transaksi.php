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
				<a href="<?php echo site_url('AdminControl/home'); ?>">Home</a> / <a href="<?php echo site_url('AdminControl/m_transaksi'); ?>">Manajemen Transaksi</a> / <span class="text-muted">Detail Transaksi</>
			</span> 
		</div>
	</nav>
	
	<div class="isi">

		<h6><i class="fas fa-fw fa-file-invoice-dollar"></i> Detail Transaksi</h6>
		
		<?php $nomor = 1; foreach($data_edit_transaksi as $edit){  ?>
			<form class="tabel" action="<?= site_url('AdminControl/aksi_edit_transaksi'); ?>" method="POST" enctype="multipart/form-data">
				<p class="text-center mb-5"><i class="fas fa-fw fa-file-invoice-dollar"></i> Detail Transaksi

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
							<select class="form-control" name="edit_s_order" id="edit_s_order">
								<?php foreach($status_order as $pilih_s_order) : ?>
									<?php if( $pilih_s_order == $edit->status) { ?>
										<!-- <option value="</?= $pilih_s_order; ?>" selected>+ </?= $pilih_s_order; ?> +</option> -->
										<?php if($edit->status == "Baru"){ ?>
											<option value="Baru" selected>+ Baru +</option>
											<option value="Proses">Proses</option>
											<option value="Selesai">Selesai</option>
											<?php foreach($status_dibayar as $pilih_s_pembayaran) : ?>
												<?php if( $pilih_s_pembayaran == $edit->status_bayar) { ?>
													<?php if($edit->status_bayar == "Kurang" || $edit->status_bayar == "Belum Dibayar"){ ?>
														<option value="Diambil" disabled>x Diambil x <span class="badge badge-danger">[ harap melunasi pembayaran agar barang bisa diambil ]</span></option>
													<?php }elseif($edit->status_bayar == "Dibayar"){ ?>
														<option value="Diambil">Diambil</option>
													<?php } ?>
												<?php } ?>
											<?php endforeach; ?>
										<?php }elseif($edit->status == "Proses"){ ?>
											<option value="Proses" selected>+ Proses +</option>
											<option value="Selesai">Selesai</option>
											<?php foreach($status_dibayar as $pilih_s_pembayaran) : ?>
												<?php if( $pilih_s_pembayaran == $edit->status_bayar) { ?>
													<?php if($edit->status_bayar == "Kurang" || $edit->status_bayar == "Belum Dibayar"){ ?>
														<option value="Diambil" disabled>x Diambil x <span class="badge badge-danger">[ harap melunasi pembayaran agar barang bisa diambil ]</span></option>
													<?php }elseif($edit->status_bayar == "Dibayar"){ ?>
														<option value="Diambil">Diambil</option>
													<?php } ?>
												<?php } ?>
											<?php endforeach; ?>
										<?php }elseif($edit->status == "Selesai"){ ?>
											<option value="Selesai" selected>+ Selesai +</option>
											<?php foreach($status_dibayar as $pilih_s_pembayaran) : ?>
												<?php if( $pilih_s_pembayaran == $edit->status_bayar) { ?>
													<?php if($edit->status_bayar == "Kurang" || $edit->status_bayar == "Belum Dibayar"){ ?>
														<option value="Diambil" disabled>x Diambil x <span class="badge badge-danger">[ harap melunasi pembayaran agar barang bisa diambil ]</span></option>
													<?php }elseif($edit->status_bayar == "Dibayar"){ ?>
														<option value="Diambil">Diambil</option>
													<?php } ?>
												<?php } ?>
											<?php endforeach; ?>
										<?php }elseif($edit->status == "Diambil"){ ?>
											<option value="Diambil" selected>+ Diambil +</option>
										<?php } ?>
									<?php }?>
								<?php endforeach; ?>
							</select>
						</td>
					</tr>
					<tr>
						<td class="text-right bg-primary text-white" style="width: 250px;">Status Pembayaran</td>
						<td>
							<select class="form-control" name="edit_s_pembayaran" id="edit_s_pembayaran">
								<?php foreach($status_dibayar as $pilih_s_pembayaran) : ?>
									<?php if( $pilih_s_pembayaran == $edit->status_bayar) { ?>
										<option value="<?= $pilih_s_pembayaran; ?>" selected>+ <?= $pilih_s_pembayaran; ?> +</option>
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
							<th scope="col" id="titlekembali">
								<?php foreach($status_dibayar as $pilih_s_pembayaran) : ?>
									<?php if( $pilih_s_pembayaran == $edit->status_bayar) { ?>
										<?php if($pilih_s_pembayaran == "Kurang"){ ?>
											Kurang
										<?php }elseif($pilih_s_pembayaran == "Dibayar"){ ?>
											Kembali
										<?php } ?>
									<?php } ?>
								<?php endforeach; ?>
							</th>
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
											<input type="hidden" name="harga_tunai_detail" value="<?= $edit->tunai ?>">
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
											<input type="hidden" name="harga_kembali_detail" value="<?= $edit->kembali_or_kurang ?>">
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

				<a href="<?php echo site_url('AdminControl/m_transaksi'); ?>" class="btn btn-danger" type="button">Kembali</a>
				<button type="submit" class="btn btn-primary">Ubah Status Oder</button>
				<a href="<?= site_url('AdminControl/report_struk_transaksi_pdf/'.$edit->kode_invoice) ?>" class="btn btn-outline-secondary float-right" target="_blank">Cetak Struk</a>
			</form>
		<?php } ?>
		<div class="garis"></div>
	</div>
</div>
