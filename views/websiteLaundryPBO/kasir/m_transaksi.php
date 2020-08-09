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
					<a href="<?php echo site_url('KasirControl/home'); ?>">Home</a> / <span class="text-muted">Transaksi</span>
				</span>
			</div>
		</nav>

		<div class="isi">
			<div class="tabel">
				<i class="fas fa-list"></i> List Data Transaksi <br><br>
				<a href="" class="btn btn-primary">Tambah transaksi</a> <br><br>
				<table id="example" class="table table-striped table-bordered" style="width:100%">
					<thead>
						<tr>
							<th>Nomor</th>
							<th>Tgl.transaksi</th>
							<th>Pembayaran</th>
							<th>Member</th>
							<th>Paket</th>
							<th>Status order</th>
							<th>Total</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>04/05/20</td>
							<td><div class="btn btn-success">Lunas</div></td>
							<td>Cleveland</td>
							<td>Cuci selimut</td>
							<td><div class="btn btn-info">Baru</div></td>
							<td>35.000</td>
							<td><button class="btn btn-primary">Detail</button></td>
						</tr>
						<tr>
							<td>2</td>
							<td>03/01/219</td>
							<td><div class="btn btn-success">Belum lunas</div></td>
							<td>MEh</td>
							<td>Cuci otak</td>
							<td><div class="btn btn-info">Lama</div></td>
							<td>1.000.000</td>
							<td><button class="btn btn-primary">Detail</button></td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th>Nomor</th>
							<th>Tgl.transaksi</th>
							<th>Pembayaran</th>
							<th>Member</th>
							<th>Paket</th>
							<th>Status order</th>
							<th>Total</th>
							<th>Aksi</th>
						</tr>
					</tfoot>
				</table>
			</div>
		
		<div class="garis"></div>
	</div>
</div>
