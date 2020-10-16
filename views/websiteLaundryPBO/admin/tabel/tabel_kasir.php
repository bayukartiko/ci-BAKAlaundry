<table id="tabel_kasir" class="table table-striped table-bordered table-sm" style="width:100%">
	<thead>
		<tr>
			<th>Nomor</th>
			<th>Bekerja Di</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Alamat</th>
			<th>Nomor Telepon</th>
			<th>Aksi</th>
			<th>Detail</th>
		</tr>
	</thead>
	<tbody>
	<?php
		if($h_kasir>0){
			$nomor = 1;
			foreach ($tb_user as $data_kasir){
		?>
		<tr>
			<td><?= $nomor++ ?></td>
			<td>
				<?php foreach($outlet as $cabang) : ?>
					<?php if( $cabang->id == $data_kasir->id_outlet) { ?>
						<?= $cabang->nama; ?>
					<?php } ?>
				<?php endforeach; ?>
			</td>
			<td><?= $data_kasir->nama ?></td>
			<td><?= $data_kasir->username ?></td>
			<td><?= $data_kasir->alamat ?></td>
			<td><?= $data_kasir->tlp ?></td>
			<?php if($data_kasir->username == 'kasir'){ ?>
				<td> 
					<a href="#"><button class="btn btn-info" disabled>Ubah</button></a> 
					<a href="#"><button class="btn btn-danger" onclick="return confirm('yakin?');" disabled>Hapus</button></a>
				</td>
			<?php }else{ ?>
				<td>

					<a href="javascript:void();" data-id="<?= $data_kasir->id; ?>" data-toggle="modal" data-target="#form-modal-edit-kasir" class="btn btn-primary btn-form-ubah">Ubah</a>

					<!-- Membuat sebuah textbox hidden yang akan digunakan untuk form ubah -->
						<input type="hidden" class="id-value_ubah" value="<?= $data_kasir->id; ?>">
						<input type="hidden" class="nama-value_ubah" value="<?= $data_kasir->nama; ?>">
						<input type="hidden" class="username-value_ubah" value="<?= $data_kasir->username; ?>">
						<input type="hidden" class="password-value_ubah" value="<?= $data_kasir->password; ?>">
						<input type="hidden" class="email-value_ubah" value="<?= $data_kasir->email; ?>">
						<input type="hidden" class="alamat-value_ubah" value="<?= $data_kasir->alamat; ?>">
						<input type="hidden" class="tlp-value_ubah" value="<?= $data_kasir->tlp; ?>">
						<input type="hidden" class="jenis_kelamin-value_ubah" value="<?= $data_kasir->jenis_kelamin; ?>">
						<input type="hidden" class="foto-value_ubah" value="<?= $data_kasir->foto; ?>">
						<input type="hidden" class="role-value_ubah" value="<?= $data_kasir->role; ?>">
						<input type="hidden" class="id_outlet-value_ubah" value="<?= $data_kasir->id_outlet; ?>">
					
					<a href="javascript:void();" data-id="<?= $data_kasir->id; ?>" data-toggle="modal" data-target="#form-modal-hapus-kasir" class="btn btn-danger btn-alert-hapus">Hapus</a>

				</td>
			<?php } ?>
			<td>
				<a href="javascript:void();" data-id="<?= $data_kasir->id; ?>" data-toggle="modal" data-target="#form-modal-detail-kasir" class="btn btn-primary btn-form-detail">Detail</a>

				<!-- Membuat sebuah textbox hidden yang akan digunakan untuk form detail -->
					<input type="hidden" class="id-value_detail" value="<?= $data_kasir->id; ?>">
					<input type="hidden" class="nama-value_detail" value="<?= $data_kasir->nama; ?>">
					<input type="hidden" class="username-value_detail" value="<?= $data_kasir->username; ?>">
					<input type="hidden" class="password-value_detail" value="<?= $data_kasir->password; ?>">
					<input type="hidden" class="email-value_detail" value="<?= $data_kasir->email; ?>">
					<input type="hidden" class="alamat-value_detail" value="<?= $data_kasir->alamat; ?>">
					<input type="hidden" class="tlp-value_detail" value="<?= $data_kasir->tlp; ?>">
					<input type="hidden" class="jenis_kelamin-value_detail" value="<?= $data_kasir->jenis_kelamin; ?>">
					<input type="hidden" class="foto-value_detail" value="<?= $data_kasir->foto; ?>">
					<input type="hidden" class="role-value_detail" value="<?= $data_kasir->role; ?>">
					<input type="hidden" class="id_outlet-value_detail" value="<?php foreach($outlet as $cabang) : if( $cabang->id == $data_kasir->id_outlet){ echo $cabang->nama; } endforeach; ?>">
			</td>
		</tr>
		<?php 
			}
			}else{ ?>
			<div class="alert alert-warning alert-dismissible fade show" role="alert">
				Data kasir <strong>Kosong !</strong>.
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
			<th>Bekerja Di</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Alamat</th>
			<th>Nomor Telepon</th>
			<th>Aksi</th>
			<th>Detail</th>
		</tr>
	</tfoot>
</table>

<script>
	$(document).ready(function(){
		
		$('#tabel_kasir').DataTable({
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
