<table id="example" class="tabel table-striped table-bordered table-responsive" style="width:100%" border="1">
	<thead class="thead-dark">
		<tr>
			<th>Nomor</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Email</th>
			<th>Alamat</th>
			<th>Nomor Telepon</th>
			<th>Jenis Kelamin</th>
			<th>Foto Profil</th>
			<th>Jabatan</th>
			<th>Bekerja di</th>
			<th>Tgl dibuat</th>
		</tr>
	</thead>
	<tbody>
		<?php
		if($h_admin>0){
			$nomor = 1;
			foreach ($tb_user as $data_admin){
		?>
		<tr>
			<td><?=  $nomor++ ?></td>
			<td><?= $data_admin->nama ?></td>
			<td><?= $data_admin->username ?></td>
			<td><?= $data_admin->email ?></td>
			<td><?= $data_admin->alamat ?></td>
			<td><?= $data_admin->tlp ?></td>
			<td><?= $data_admin->jenis_kelamin ?></td>
			<td><img src="<?= base_url('assets/img/foto/').$data_admin->foto ?>" style="width: 100px; height: 100px;" class="img-thumbnail"></td>
			<td><?= $data_admin->role ?></td>


			<td>
			<?php foreach($outlet as $cabang) : ?>
				<?php if( $cabang->id == $data_admin->id_outlet) { ?>
					<?= $cabang->nama; ?>
				<?php } ?>
			<?php endforeach; ?>
			</td>

			<td><?= date("Y-M-d H:i:s", $data_admin->tgl_dibuat);  ?></td>
		</tr>
		<?php }} ?>
	</tbody>
	<tfoot class="thead-dark">
		<tr>
			<th>Nomor</th>
			<th>Nama</th>
			<th>Username</th>
			<th>Email</th>
			<th>Alamat</th>
			<th>Nomor Telepon</th>
			<th>Jenis Kelamin</th>
			<th>Foto Profil</th>
			<th>Jabatan</th>
			<th>Bekerja di</th>
			<th>Tgl dibuat</th>
		</tr>
	</tfoot>
</table>
