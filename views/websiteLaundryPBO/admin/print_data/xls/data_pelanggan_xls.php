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
				<td align="center" width="1075">
					<p style="font-size: 18pt; text-align: center;">BAKA Laundry</p>
				</td>
			</tr>
			<tr>
				<td align="center" width="1075">
					<p style="font-size: 13pt; text-align: center;">Data Pelanggan</p>
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
						Semua Cabang
					</p>
				</td>
			</tr>
		</table>
	</div>
	<hr>
	<div class="total-pelanggan">
		<table cellspacing="0" cellpadding="0" border="0" width="100">
			<tr>
				<th width="125" style="font-size: 10pt; text-align: right;">Total Pelanggan :</th>
				<td width="125" style="font-size: 10pt; padding-left: 10px;"><?= $h_member ?></td>

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
			<tr>
				<th style="padding: 8px; border: 1px solid black; background-color: aqua;">No</th>
				<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="222">Nama</th>
				<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="222">Alamat</th>
				<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="222">No. Tlp</th>
				<th style="padding: 8px; border: 1px solid black; background-color: aqua;" width="222">Email</th>
			</tr>
			<?php $nomor = 1; foreach($member as $data){  ?>
				<tr>
					<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;"><?= $nomor++ ?></td>
					<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
						<?= $data->nama ?>
					</td>
					<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
						<?= $data->alamat ?>
					</td>
					<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
						<?= $data->tlp ?>
					</td>
					<td style="padding: 8px; border: 1px solid black;word-wrap: break-word;">
						<?= $data->email ?>
					</td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>
