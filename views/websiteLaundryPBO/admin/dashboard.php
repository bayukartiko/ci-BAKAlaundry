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
					<a href="#">Home</a> / <span class="text-muted">Dashboard</span>
				</span>
			</div>
		</nav>

		<div class="isi">
			<div class="row row-cols-1 row-cols-md-3 text-center">
				<div class="col col-md-12 mb-4">
					<div class="card bg-light h-100">
						<!-- <img src="..." class="card-img-top" alt="..."> -->
						<div class="card-body">
							<i class="fas fa-th-list" style="width: 50px;  height: 50px;"></i>
							<h5 class="card-title">Total Paket Laundry</h5>
							<p class="card-text"> <?= $h_paket; ?> </p>
						</div>
					</div>
				</div>
			</div>
			<div class="row row-cols-1 row-cols-md-3 text-center">
				<div class="col col-md-3 mb-4">
					<div class="card bg-light h-100">
						<!-- <img src="..." class="card-img-top" alt="..."> -->
						<div class="card-body">
							<i class="fas fa-users" style="width: 50px;  height: 50px;"></i>
							<h5 class="card-title">Total Member</h5>
							<p class="card-text"> <?= $h_member; ?> </p>
						</div>
					</div>
				</div>
				<div class="col col-md-3 mb-4">
					<div class="card bg-light h-100">
						<!-- <img src="..." class="card-img-top" alt="..."> -->
						<div class="card-body">
							<i class="fas fa-users" style="width: 50px;  height: 50px;"></i>
							<h5 class="card-title">Total Admin</h5>
							<p class="card-text"> <?= $h_admin; ?> </p>
						</div>
					</div>
				</div>
				<div class="col col-md-3 mb-4">
					<div class="card bg-light h-100">
						<!-- <img src="..." class="card-img-top" alt="..."> -->
						<div class="card-body">
							<i class="fas fa-users" style="width: 50px;  height: 50px;"></i>
							<h5 class="card-title">Total Kasir</h5>
							<p class="card-text"> <?= $h_kasir; ?> </p>
						</div>
					</div>
				</div>
				<div class="col col-md-3 mb-4">
					<div class="card bg-light h-100">
						<!-- <img src="..." class="card-img-top" alt="..."> -->
						<div class="card-body">
							<i class="fas fa-users" style="width: 50px;  height: 50px;"></i>
							<h5 class="card-title">Total Owner</h5>
							<p class="card-text"> <?= $h_owner; ?> </p>
						</div>
					</div>
				</div>
			</div>

			<div class="row row-cols-1 row-cols-md-3 text-center">
				<div class="col col-md-6 mb-4">
					<div class="card bg-light h-100">
						<!-- <img src="..." class="card-img-top" alt="..."> -->
						<div class="card-body">
							<i class="fas fa-shopping-cart" style="width: 50px;  height: 50px;"></i>
							<h5 class="card-title">Total Order Baru</h5>
							<p class="card-text"> <?= $h_transaksi_baru; ?></p>
						</div>
					</div>
				</div>
				<div class="col col-md-6 mb-4">
					<div class="card bg-light h-100">
						<!-- <img src="..." class="card-img-top" alt="..."> -->
						<div class="card-body">
							<i class="fas fa-shopping-cart" style="width: 50px;  height: 50px;"></i>
							<h5 class="card-title">Total Semua Order</h5>
							<p class="card-text"> <?= $h_total_transaksi; ?> </p>
						</div>
					</div>
				</div>
			</div>

			<div class="row row-cols-1 row-cols-md-3 text-center">
				<div class="col col-md-12 col-md-3 mb-4">
					<div class="card bg-light h-100">
						<!-- <img src="..." class="card-img-top" alt="..."> -->
						<div class="card-body">
							<i class="fas fa-store" style="width: 50px;  height: 50px;"></i>
							<h5 class="card-title">Total Outlet</h5>
							<p class="card-text"> <?= $h_outlet; ?> </p>
						</div>
					</div>
				</div>
			</div>
		
		<!-- <div class="garis"></div> -->
		
		<!-- <div class="tabel">
			<i class="fas fa-list"></i> List Data Orderan Baru <br><br>
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Tgl.transaksi</th>
						<th>Pelanggan</th>
						<th>Paket</th>
						<th>Pembayaran</th>
						<th>Status order</th>
						<th>Total</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>1</td>
						<td>04/05/20</td>
						<td>Cleveland</td>
						<td>Cuci selimut</td>
						<td>Lunas</td>
						<td>Baru</td>
						<td>35.000</td>
						<td><button class="btn btn-info">Detail</button></td>
					</tr>
					<tr>
						<td>2</td>
						<td>03/01/219</td>
						<td>MEh</td>
						<td>Cuci otak</td>
						<td>Belum lunas</td>
						<td>Lama</td>
						<td>1.000.000</td>
						<td><button class="btn btn-info">Detail</button></td>
					</tr>
				</tbody>
				<tfoot>
					<tr>
						<th>Nomor</th>
						<th>Tgl.transaksi</th>
						<th>Pelanggan</th>
						<th>Paket</th>
						<th>Pembayaran</th>
						<th>Status order</th>
						<th>Total</th>
						<th>Aksi</th>
					</tr>
				</tfoot>
			</table>
		</div> -->
		
		<!-- <div class="garis"></div> -->
	</div>
</div>
