<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data User</title>
</head>
<body>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
	</style>
		<div class="bungkus" style="width: 700px;margin: 0 auto;background: #ffffff;color: #000000;">
			<div class="kepala-data">
				<table cellspacing="0" cellpadding="0" border="0" width="100">
					<tr>
						<td align="center" width="1100">
							<p style="font-size: 18pt; text-align: center;">BAKA Laundry</p>
						</td>
					</tr>
					<tr>
						<td align="center" width="1100">
							<p style="font-size: 13pt; text-align: center;">
								Data Transaksi
							</p>
						</td>
					</tr>
					<tr>
						<!-- <div class="garis" style="height: 2px; background-color: #000000; top: 10;"></div> -->
					</tr>
				</table>
			</div>
			<div class="nama-saya">
				<table cellspacing="0" cellpadding="0" border="0" width="100">
					<tr>
						<td colspan="3">
							<p style="font-size: 10pt; padding-left: 20px;">Bayu Kartiko | XII RPL 2 | 18191159</p>
						</td>
					</tr>
					<tr>
						<th width="125" style="text-align: right;">
							Nama Petugas :
						</th>
						<td width="125">
							<p style="font-size: 10pt; padding-left: 10px;"><?= $tb_user['nama']; ?></p>
						</td>

						<th align="right" width="425" style="font-size: 10pt; text-align: right; padding-left: 140px;">
							Cabang Toko :
						</th>
						<td align="right">
							<p style="font-size: 10pt; padding-left: 10px;">
								<?php if($outlet_onecb){ ?>
									<?php if($outlet_onecb == $outlet_id["id"]){ ?>
										<?= $outlet_id["nama"] ?>
									<?php } ?>
								<?php }else{ ?>
									Semua Cabang
								<?php } ?>
							</p>
						</td>
					</tr>
				</table>
			</div>
			<hr>
			<div class="total-transaksi">
				<table cellspacing="0" cellpadding="0" border="0" width="100">
					<tr>
						<th width="125" style="font-size: 10pt; text-align: right;">Total Transaksi :</th>
						<td width="125" style="font-size: 10pt; padding-left: 10px;">
							<?php if($h_transaksi_onecb){ ?>
								<?php if($h_transaksi_onecb_onetgl){ ?>
									<?= $h_transaksi_onecb_onetgl ?>
								<?php }else{ ?>
									<?= $h_transaksi_onecb_alltgl ?>
								<?php } ?>
							<?php }else{ ?>
									<?php if($h_transaksi_allcb_onetgl){ ?>
										<?= $h_transaksi_allcb_onetgl ?>
									<?php }else{ ?>
										<?= $h_transaksi_allcb_alltgl ?>
									<?php } ?>
							<?php } ?>
						</td>

						<th align="right" width="420" style="font-size: 10pt; text-align: right; padding-left: 140px;">
							Tanggal cetak :
						</th>
						<td align="right">
							<p style="font-size: 10pt; padding-left: 10px;">
								<?= date('d-M-Y') ?>
							</p>
						</td>
					</tr>
				</table>
			</div>

			<div class="tabel-data">
				<table cellspacing="0" cellpadding="0" border="0" width="100" style="margin-top: 15px; padding: 10px;">
						<?php if($tb_transaksi_onecb){ ?>
							<?php if($tb_transaksi_onecb_onetgl){ ?>
								<tr>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Kode Invoice</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Tgl Transaksi</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Nama Pelanggan</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Paket Laundry</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Harga Paket</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Jumlah Barang</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Total Harga</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Status Order</th>
								</tr>
							<?php }else{ ?>
								<tr>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Kode Invoice</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Tgl Transaksi</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Nama Pelanggan</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Paket Laundry</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Harga Paket</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Jumlah Barang</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Total Harga</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Status Order</th>
								</tr>
							<?php } ?>
						<?php }else{ ?>
							<?php if($h_transaksi_allcb_onetgl){ ?>
								<tr>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Kode Invoice</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Tgl Transaksi</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Nama Pelanggan</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Paket Laundry</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Harga Paket</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Jumlah Barang</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Total Harga</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Status Order</th>
								</tr>
							<?php }else{ ?>
								<tr>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Kode Invoice</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Tgl Transaksi</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Nama Pelanggan</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Paket Laundry</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Harga Paket</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Jumlah Barang</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Total Harga</th>
									<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="83">Status Order</th>
								</tr>
							<?php } ?>
						<?php } ?>


						<?php if($tb_transaksi_onecb){ ?>
							<?php if($tb_transaksi_onecb_onetgl){ ?>
								<?php foreach($tb_transaksi_onecb_onetgl as $data){  ?>
									<tr>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?= $data->kode_invoice ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?= (new DateTime($data->tgl))->format('d/M/Y'); ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?php foreach($member as $data_member) : ?>
												<?php if( $data_member->id == $data->id_member) { ?>
													<?= $data_member->nama; ?>
												<?php }?>	
											<?php endforeach; ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?php foreach($paket as $pakets) : ?>
												<?php if( $pakets->id == $data->id_paket) { ?>
													<?= $pakets->nama_paket; ?>
												<?php } ?>
											<?php endforeach; ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											Rp.<?= number_format($data->harga_jual,2,',','.') ?> 
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?php foreach($paket as $pakets) : ?>
												<?php if( $pakets->id == $data->id_paket) { ?>
													Rp.<?= number_format($pakets->harga,2,',','.') ?> / <?= $pakets->satuan ?>
												<?php } ?>
											<?php endforeach; ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											Rp.<?= number_format($data->total,2,',','.') ?> 
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?= $data->status ?>
										</td>
									</tr>
								<?php } ?>
							<?php }else{ ?>
								<?php foreach($tb_transaksi_onecb_alltgl as $data){  ?>
									<tr>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?= $data->kode_invoice ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?= (new DateTime($data->tgl))->format('d/M/Y'); ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?php foreach($member as $data_member) : ?>
												<?php if( $data_member->id == $data->id_member) { ?>
													<?= $data_member->nama; ?>
												<?php }?>
											<?php endforeach; ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?php foreach($paket as $pakets) : ?>
												<?php if( $pakets->id == $data->id_paket) { ?>
													<?= $pakets->nama_paket; ?>
												<?php } ?>
											<?php endforeach; ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											Rp.<?= number_format($data->harga_jual,2,',','.') ?> 
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?php foreach($paket as $pakets) : ?>
												<?php if( $pakets->id == $data->id_paket) { ?>
													Rp.<?= number_format($pakets->harga,2,',','.') ?> / <?= $pakets->satuan ?>
												<?php } ?>
											<?php endforeach; ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											Rp.<?= number_format($data->total,2,',','.') ?> 
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?= $data->status ?>
										</td>
									</tr>
								<?php } ?>
							<?php } ?>
						<?php }else{ ?>
							<?php if($h_transaksi_allcb_onetgl){ ?>
								<?php foreach($tb_transaksi_allcb_onetgl as $data){  ?>
									<tr>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?= $data->kode_invoice ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?= (new DateTime($data->tgl))->format('d/M/Y'); ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?php foreach($member as $data_member) : ?>
												<?php if( $data_member->id == $data->id_member) { ?>
													<?= $data_member->nama; ?>
												<?php }?>
											<?php endforeach; ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?php foreach($paket as $pakets) : ?>
												<?php if( $pakets->id == $data->id_paket) { ?>
													<?= $pakets->nama_paket; ?>
												<?php } ?>
											<?php endforeach; ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											Rp.<?= number_format($data->harga_jual,2,',','.') ?> 
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?php foreach($paket as $pakets) : ?>
												<?php if( $pakets->id == $data->id_paket) { ?>
													Rp.<?= number_format($pakets->harga,2,',','.') ?> / <?= $pakets->satuan ?>
												<?php } ?>
											<?php endforeach; ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											Rp.<?= number_format($data->total,2,',','.') ?> 
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?= $data->status ?>
										</td>
									</tr>
								<?php } ?>
							<?php }else{ ?>
								<?php foreach($tb_transaksi_allcb_alltgl as $data){  ?>
									<tr>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?= $data->kode_invoice ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?= (new DateTime($data->tgl))->format('d/M/Y'); ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?php foreach($member as $data_member) : ?>
												<?php if( $data_member->id == $data->id_member) { ?>
													<?= $data_member->nama; ?>
												<?php }?>
											<?php endforeach; ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?php foreach($paket as $pakets) : ?>
												<?php if( $pakets->id == $data->id_paket) { ?>
													<?= $pakets->nama_paket; ?>
												<?php } ?>
											<?php endforeach; ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											Rp.<?= number_format($data->harga_jual,2,',','.') ?> 
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?php foreach($paket as $pakets) : ?>
												<?php if( $pakets->id == $data->id_paket) { ?>
													Rp.<?= number_format($pakets->harga,2,',','.') ?> / <?= $pakets->satuan ?>
												<?php } ?>
											<?php endforeach; ?>
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											Rp.<?= number_format($data->total,2,',','.') ?> 
										</td>
										<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
											<?= $data->status ?>
										</td>
									</tr>
								<?php } ?>
							<?php } ?>
						<?php } ?>
				</table>
			</div>
		</div>
</body>
</html>
