<table id="tabel_paket" class="table table-striped table-bordered table-sm" style="width:100%">
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
						<!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalEdit</?= $data_paket->id ?>">Edit</button> -->
						<a href="javascript:void();" data-id="<?= $data_paket->id; ?>" data-toggle="modal" data-target="#form-modal-edit-paket" class="btn btn-primary btn-form-ubah">Ubah</a>

						<!-- Membuat sebuah textbox hidden yang akan digunakan untuk form ubah -->
							<input type="hidden" class="id-value_ubah" value="<?= $data_paket->id; ?>">
							<input type="hidden" class="id_outlet-value_detail" value="<?php foreach($outlet as $cabang) : if( $cabang->id == $data_paket->id_outlet){ echo $cabang->nama; } endforeach; ?>">
							<input type="hidden" class="jenis-value_ubah" value="<?= $data_paket->jenis; ?>">
							<input type="hidden" class="nama-value_ubah" value="<?= $data_paket->nama_paket; ?>">
							<input type="hidden" class="harga-value_ubah" value="<?= $data_paket->harga; ?>">
							<input type="hidden" class="satuan-value_ubah" value="<?= $data_paket->satuan; ?>">
							<input type="hidden" class="diskon-value_ubah" value="<?= $data_paket->diskon; ?>">

						<!-- <a href="</?= site_url('AdminControl/hapus_data_paket/'.$data_paket->id); ?>"><button class="btn btn-danger" onclick="return confirm('yakin?');">Hapus</button></a> -->
						<a href="javascript:void();" data-id="<?= $data_paket->id; ?>" data-toggle="modal" data-target="#form-modal-hapus-paket" class="btn btn-danger btn-alert-hapus">Hapus</a>
					</td>
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
					<!-- Data Paket kosong ! -->
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

<script>
	$(document).ready(function(){
		
		$('#tabel_paket').DataTable({
			rowReorder: true,

			"language": {
				sProcessing: "Sedang memproses...",
				sLengthMenu: "Tampilkan _MENU_ data",
				sZeroRecords: "Tidak ditemukan data yang sesuai",
				sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
				sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 data",
				sInfoFiltered: "(disaring dari _MAX_ data keseluruhan)",
				sInfoPostFix: "",
				sSearch: "Cari:",
				sUrl: "",
					oPaginate: {
						sFirst: "Pertama",
						sPrevious: "Sebelumnya",
						sNext: "Selanjutnya",
						sLast: "Terakhir"
					}
				}
		});

	});
</script>
