<table id="tabel_outlet" class="table table-striped table-bordered table-sm" style="width:100%">
	<thead>
		<tr>
			<th>Nomor</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>telepon</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			if($h_outlet>0){
				$nomor = 1;
				foreach ($tb_outlet as $data_outlet){
			?>
			<tr>
				<td><?=  $nomor++ ?></td>
				<td><?= $data_outlet->nama ?></td>
				<td><?= $data_outlet->alamat ?></td>
				<td><?= $data_outlet->tlp ?></td>
				<td> 
					<!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalEdit</?= $data_outlet->id ?>">Edit</button> -->
					<a href="javascript:void();" data-id="<?= $data_outlet->id; ?>" data-toggle="modal" data-target="#form-modal-edit-outlet" class="btn btn-primary btn-form-ubah">Ubah</a>

					<!-- Membuat sebuah textbox hidden yang akan digunakan untuk form ubah -->
						<input type="hidden" class="id-value_ubah" value="<?= $data_outlet->id; ?>">
						<input type="hidden" class="nama-value_ubah" value="<?= $data_outlet->nama; ?>">
						<input type="hidden" class="alamat-value_ubah" value="<?= $data_outlet->alamat; ?>">
						<input type="hidden" class="tlp-value_ubah" value="<?= $data_outlet->tlp; ?>">
				</td>
			</tr>
			<?php 
				}
				}else{ ?>
				<div class="alert alert-warning alert-dismissible fade show" role="alert">
					Data cabang <strong>Kosong !</strong>.
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
			<th>Nama</th>
			<th>Alamat</th>
			<th>telepon</th>
			<th>aksi</th>
		</tr>
	</tfoot>
</table>

<script>
	$(document).ready(function(){
		
		$('#tabel_outlet').DataTable({
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
