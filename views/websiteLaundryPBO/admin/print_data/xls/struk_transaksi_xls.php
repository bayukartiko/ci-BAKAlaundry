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
	<?php $nomor = 1; foreach($data_struk_transaksi as $data){  ?>
		<div class="bungkus" style="width: 700px;margin: 0 auto;background: #ffffff;color: #000000;">
			<div class="kepala-data">
				<table cellspacing="0" cellpadding="0" border="0" width="100">
					<tr>
						<td align="center" width="750">
							<p style="font-size: 18pt; text-align: center;">BAKA Laundry</p>
						</td>
					</tr>
					<tr>
						<td align="center" width="750">
							<p style="font-size: 13pt; text-align: center;">Struk Transaksi</p>
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
						<td align="left" width="125">
							<p style="font-size: 10pt; padding-left: 10px;"><?= $tb_user['nama']; ?></p>
						</td>

						<th align="right" width="125" style="text-align: right; padding-left: 140px;">
							Cabang Toko :
						</th>
						<td align="right">
							<p style="font-size: 10pt; padding-left: 10px;">
								<?php foreach($outlet as $cabang) : ?>
									<?php if( $cabang->id == $data->id_outlet) { ?>
										<?= $cabang->nama; ?>
									<?php }?>
								<?php endforeach; ?>
							</p>
						</td>
						<!-- <td align="right" style=" padding-top: 10px; padding-right:10px;">
							<p style="font-family: 'Libre Barcode 128 Text', cursive; font-size: 15pt;"></?= $data->kode_invoice ?></p>
						</td> -->
					</tr>
				</table>
			</div>
			<hr>
			<div class="nama-pelanggan">
				<table cellspacing="0" cellpadding="0" border="0" width="100">
					<tr>
						<th width="125" style="text-align: right;padding: 3px;">
							Nama Pelanggan :
						</th>
						<td align="left" style="padding: 3px;">
							<p style="font-size: 10pt; padding-left: 10px;">
								<?php foreach($tb_member as $data_member) : ?>
									<?php if( $data_member->id == $data->id_member) { ?>
										<?= $data_member->nama; ?>
									<?php }?>
								<?php endforeach; ?>
							</p>
						</td>

						<th align="right" width="108" style="text-align: right; padding-left: 50px;padding: 3px;">
							Kode Transaksi :
						</th>
						<td align="right" style="padding: 3px;">
							<p style="font-size: 10pt; padding-left: 10px;">
								<?= $data->kode_invoice ?>
							</p>
						</td>
					</tr>
					<tr>
						<th width="125" style="text-align: right;padding: 3px;">
							Alamat Pelanggan :
						</th>
						<td align="left" style="padding: 3px;">
							<p style="font-size: 10pt; padding-left: 10px;">
								<?php foreach($tb_member as $data_member) : ?>
									<?php if( $data_member->id == $data->id_member) { ?>
										<?= $data_member->alamat; ?>
									<?php }?>
								<?php endforeach; ?>
							</p>
						</td>

						<th align="right" width="108" style="text-align: right; padding-left: 100px;padding: 3px;">
							Tgl. Transaksi :
						</th>
						<td align="right" style="padding: 3px;">
							<p style="font-size: 10pt; padding-left: 10px;">
								<?= (new DateTime($data->tgl))->format('d/M/Y'); ?>
							</p>
						</td>
					</tr>
					<tr>
						<th width="125" style="text-align: right;padding: 3px;">
							No.tlp Pelanggan :
						</th>
						<td align="left" style="padding: 3px;">
							<p style="font-size: 10pt; padding-left: 10px;">
								<?php foreach($tb_member as $data_member) : ?>
									<?php if( $data_member->id == $data->id_member) { ?>
										<?= $data_member->tlp; ?>
									<?php }?>
								<?php endforeach; ?>
							</p>
						</td>

						<th align="right" width="108" style="text-align: right; padding-left: 100px;padding: 3px;">
							Tgl. Ambil :
						</th>
						<td align="right" style="padding: 3px;">
							<p style="font-size: 10pt; padding-left: 10px;">
							<?= (new DateTime($data->tgl_ambil))->format('d/M/Y'); ?>
							</p>
						</td>
					</tr>
				</table>
			</div>

			<div class="tabel-data">
				<table cellspacing="0" cellpadding="0" border="0" width="100" style="margin-top: 15px; padding: 10px;">
					<tr>
						<th style="padding: 8px; border: 1px solid black; background-color: aqua;">No</th>
						<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="140">Paket Laundry</th>
						<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="140">Jumlah Barang</th>
						<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="140">Harga</th>
						<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="140">Subtotal</th>
					</tr>
					<tr>
						<td style="padding: 8px; border: 1px solid black;"><?= $nomor++ ?></td>
						<td style="padding: 8px; border: 1px solid black;">
							<?php foreach($paket as $pakets) : ?>
								<?php if( $pakets->id == $data->id_paket) { ?>
									<?= $pakets->nama_paket; ?>
								<?php } ?>
							<?php endforeach; ?>
						</td>
						<td style="padding: 8px; border: 1px solid black;">
							<?= $data->jumlah; ?>
							<?php foreach($paket as $pakets) : ?>
								<?php if( $pakets->id == $data->id_paket) { ?>
									<?= $pakets->satuan ?>
								<?php } ?>
							<?php endforeach; ?>
						</td>
						<td style="padding: 8px; border: 1px solid black;">
							<?php foreach($paket as $pakets) : ?>
								<?php if( $pakets->id == $data->id_paket) { ?>
									Rp.<?= number_format($pakets->harga,2,',','.') ?> / <?= $pakets->satuan ?>
								<?php } ?>
							<?php endforeach; ?>
						</td>
						<td style="padding: 8px; border: 1px solid black;">
							<?php $subtotal = $data->total - 1000; ?>
							Rp.<?= number_format($subtotal,2,',','.') ?>
						</td>
					</tr>

					<tr>
						<th colspan="4" style="padding: 5px; text-align: right;">PPN :</th>
						<td style="padding: 5px;">Rp.<?= number_format(1000,2,',','.') ?></td>
					</tr>
					<tr>
						<th colspan="4" style="padding: 5px; text-align: right;">Total :</th>
						<td style="padding: 5px;">Rp.<?= number_format($data->total,2,',','.') ?></td>
					</tr>
					<tr>
						<th colspan="4" style="padding: 5px; text-align: right;">Tunai :</th>
						<td style="padding: 5px;">Rp.<?= number_format($data->tunai,2,',','.') ?></td>
					</tr>
					<tr>
						<th colspan="4" style="padding: 5px; text-align: right;">
							<?php foreach($status_dibayar as $pilih_s_pembayaran) : ?>
								<?php if( $pilih_s_pembayaran == $data->status_bayar) { ?>
									<?php if($pilih_s_pembayaran == "Kurang"){ ?>
										Kurang :
									<?php }elseif($pilih_s_pembayaran == "Dibayar"){ ?>
										Kembali :
									<?php } ?>
								<?php } ?>
							<?php endforeach; ?>
						</th>
						<td style="padding: 5px;">Rp.<?= number_format($data->kembali_or_kurang,2,',','.') ?></td>
					</tr>
				</table>
			</div>

			<div class="keterangan">
				<table cellspacing="0" cellpadding="0" border="0" width="100" style="margin-top: 15px; padding: 10px;">
					<tr>
						<th>Keterangan :</th>
					</tr>
					<tr>
						<td style="padding-left: 10px; padding: 3px;">1. Pengambilan cucian harus membawa struk.</td>
					</tr>
					<tr>
						<td style="padding-left: 10px; padding: 3px;">2. Jika struk hilang/tidak ada bukti kepemilikan struk, maka barang akan dianggap hangus.</td>
					</tr>
					<tr>
						<td style="padding-left: 10px; padding: 3px;">3. Pakaian yang luntur tanpa pemberitahuan, diluar tanggung jawab kami.</td>
					</tr>
					<tr>
						<td style="padding-left: 10px; padding: 3px;">4. Cucian yang rusak karena sifat bahan/kain bukan tanggung jawab kami.</td>
					</tr>
					<tr>
						<td style="padding-left: 10px; padding: 3px;">5. Apabila konsumen tidak menghitung jumlah cucian, maka jumlah yang kami hitung dianggap benar.</td>
					</tr>
					<tr>
						<td style="padding-left: 10px; padding: 3px;">6. Pengajuan keberatan tidak melebihi 24 jam setelah cucian diterima, dengan membawa nota.</td>
					</tr>
					<tr>
						<td style="padding-left: 10px; padding: 3px;">7. Benda berharga atau barang yang tertinggal dalam cucian apabila hilang atau rusak bukan tanggung jawab kami.</td>
					</tr>
					<tr>
						<td style="padding-left: 10px; padding: 3px;">8. Cucian hilang atau rusak diganti sesuai dengan cucian yang hilang/rusak.</td>
					</tr>
					<tr>
						<td style="padding-left: 10px; padding: 3px;">9. Barang yang tidak diambil lebih dari 1 bulan bukan tanggung jawab kami, dan akan dianggap hangus.</td>
					</tr>
				</table>
			</div>
		</div>
	<?php } ?>
</body>
</html>
