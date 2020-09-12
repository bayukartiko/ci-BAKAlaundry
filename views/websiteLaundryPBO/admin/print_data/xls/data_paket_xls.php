<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Struk Transaksi</title>
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
							<p style="font-size: 13pt; text-align: center;">Data Paket Laundry</p>
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
									<?php if($outlet_onecb == $outlet["id"]){ ?>
										<?= $outlet["nama"] ?>
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
			<div class="total-paket">
				<table cellspacing="0" cellpadding="0" border="0" width="100">
					<tr>
						<th width="125" style="font-size: 10pt; text-align: right;">Total Paket :</th>
						<td width="125" style="font-size: 10pt; padding-left: 10px;">
							<?php if($h_paket_onecb){ ?>
								<?= $h_paket_onecb ?>
							<?php }else{ ?>
								<?= $h_paket ?>
							<?php } ?>
						</td>

						<th align="right" width="420" style="font-size: 10pt; text-align: right; padding-left: 140px;">
							Tanggal :
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
					<?php if($tb_paket_onecb){ ?>
						<tr>
							<th style="padding: 8px; border: 1px solid black; background-color: aqua;">No</th>
							<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="170">Jenis</th>
							<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="170">Nama</th>
							<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="170">Harga</th>
							<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="170">Diskon</th>
							<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="170">Harga Diskon</th>
						</tr>
					<?php }else{ ?>
						<tr>
							<th style="padding: 8px; border: 1px solid black; background-color: aqua;">No</th>
							<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="135">Cabang</th>
							<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="135">Jenis</th>
							<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="135">Nama</th>
							<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="135">Harga</th>
							<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="135">Diskon</th>
							<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="135">Harga Diskon</th>
						</tr>
					<?php } ?>
						<?php if($tb_paket_onecb){ ?>
							<?php $nomor = 1; foreach($tb_paket_onecb as $data){  ?>
								<tr>
									<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;"><?= $nomor++ ?></td>
									<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
										<?= $data->jenis ?>
									</td>
									<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
										<?= $data->nama_paket ?>
									</td>
									<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
										Rp.<?= number_format($data->harga,2,',','.') ?> /<?= $data->satuan ?>
									</td>
									<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
										<?= $data->diskon ?> %
									</td>
									<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
										<?php 
											$harga = $data->harga ;
											$diskon = $data->diskon ;

											$hasildiskon = $harga*($diskon/100);
											$hasilakhir = $harga-$hasildiskon;
										?>
										Rp.<?= number_format($hasilakhir,2,',','.') ?>
									</td>
								</tr>
							<?php } ?>
						<?php }else{ ?>
							<?php $nomor = 1; foreach($tb_paket as $data){  ?>
								<tr>
									<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;"><?= $nomor++ ?></td>
									<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
										<?php foreach($outlet as $cabang) : ?>
											<?php if( $cabang->id == $data->id_outlet) { ?>
												<?= $cabang->nama; ?>
											<?php }?>
										<?php endforeach; ?>
									</td>
									<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
										<?= $data->jenis ?>
									</td>
									<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
										<?= $data->nama_paket ?>
									</td>
									<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
										Rp.<?= number_format($data->harga,2,',','.') ?> /<?= $data->satuan ?>
									</td>
									<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
										<?= $data->diskon ?> %
									</td>
									<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
										<?php 
											$harga = $data->harga ;
											$diskon = $data->diskon ;

											$hasildiskon = $harga*($diskon/100);
											$hasilakhir = $harga-$hasildiskon;
										?>
										Rp.<?= number_format($hasilakhir,2,',','.') ?>
									</td>
								</tr>
							<?php } ?>
						<?php } ?>
				</table>
			</div>
		</div>
</body>
</html>
