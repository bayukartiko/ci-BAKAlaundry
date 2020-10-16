<table id="tabel_member" class="table table-striped table-bordered table-sm" style="width:100%;">
	<thead>
		<tr>
			<th>Nomor</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Alamat</th>
			<th>Nomor Telepon</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if($h_member>0){
			$nomor = 1;
			foreach ($tb_member as $data_member){
		?>
		<tr>
			<td><?=  $nomor++ ?></td>
			<td><?= $data_member->nama ?></td>
			<td><?= $data_member->email ?></td>
			<td><?= $data_member->alamat ?></td>
			<td><?= $data_member->tlp ?></td>
			<td> 
				<!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ModalEdit</?= $data_member->id ?>">Edit</button> -->
				<a href="javascript:void();" data-id="<?= $data_member->id; ?>" data-toggle="modal" data-target="#form-modal-edit-member" class="btn btn-primary btn-form-ubah">Ubah</a>

				<!-- Membuat sebuah textbox hidden yang akan digunakan untuk form ubah -->
					<input type="hidden" class="id-value_ubah" value="<?= $data_member->id; ?>">
					<input type="hidden" class="nama-value_ubah" value="<?= $data_member->nama; ?>">
					<input type="hidden" class="email-value_ubah" value="<?= $data_member->email; ?>">
					<input type="hidden" class="alamat-value_ubah" value="<?= $data_member->alamat; ?>">
					<input type="hidden" class="tlp-value_ubah" value="<?= $data_member->tlp; ?>">
					<input type="hidden" class="jenis_kelamin-value_ubah" value="<?= $data_member->jenis_kelamin; ?>">

				<!-- <a href="</?= site_url('AdminControl/hapus_data_member/'.$data_member->id); ?>"><button class="btn btn-danger" onclick="return confirm('yakin?');">Hapus</button></a> -->
				<a href="javascript:void();" data-id="<?= $data_member->id; ?>" data-toggle="modal" data-target="#form-modal-hapus-member" class="btn btn-danger btn-alert-hapus">Hapus</a>

			</td>
		</tr>
		<?php 
			}
			}else{ ?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				Data Pelanggan <strong>Kosong !</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<!-- Data Pelanggan kosong ! -->
			<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th>Nomor</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Alamat</th>
			<th>Nomor Telepon</th>
			<th>Aksi</th>
		</tr>
	</tfoot>
</table>

<script>
	$(document).ready(function(){
		
		$('#tabel_member').DataTable({
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
