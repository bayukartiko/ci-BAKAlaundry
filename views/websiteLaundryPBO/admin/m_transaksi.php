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
				<a href="<?php echo site_url('AdminControl/home'); ?>">Home</a> / <span class="text-muted">Manajemen Transaksi</span>
			</span> 
		</div>
	</nav>
	
	<div class="isi">

		<h6><i class="fas fa-fw fa-shopping-cart"></i> Manajemen Data transaksi</h6>
		<div class="row row-cols-1 row-cols-md-3 text-center">
			<div class="col mb-4">
				<div class="card bg-light h-100">
					<!-- <img src="..." class="card-img-top" alt="..."> -->
					<div class="card-body">
						<i class="fas fa-fw fa-shopping-cart" style="width: 50px;  height: 50px;"></i>
						<h5 class="card-title">Total order baru</h5>
						<p class="card-text text-dark">
							<?= $h_transaksi_baru; ?>
						</p>
					</div>
				</div>
			</div>
			<div class="col mb-4">
				<div class="card bg-light h-100">
					<!-- <img src="..." class="card-img-top" alt="..."> -->
					<div class="card-body">
						<i class="fas fa-fw fa-shopping-cart" style="width: 50px;  height: 50px;"></i>
						<h5 class="card-title">Total semua order</h5>
						<p class="card-text text-dark">
							<?= $h_total_transaksi; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class="garis"></div>
		
		<div class="tabel">
			<i class="fas fa-fw fa-shopping-cart"></i> Data transaksi 
			<br><br>
			<a href="<?php echo site_url('AdminControl/t_transaksi'); ?>" class="btn btn-info">Tambah transaksi</a>
			<br><br>
			<?php if($this->session->flashdata('sukses')) { ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					Data transaksi <strong>Berhasil</strong> <?= $this->session->flashdata('sukses'); ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php } ?>
			<br>
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Tgl.transaksi</th>
						<th>Cabang</th>
						<th>Pembayaran</th>
						<th>Member</th>
						<th>Paket</th>
						<th>Status order</th>
						<th>Total</th>
						<th>Detail</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if($h_total_transaksi>0){
						$nomor = 1;
						foreach ($tb_user as $data_kasir){
					?>
					<tr>
						<td><?=  $nomor++ ?></td>
						<td><?= $data_kasir->nama ?></td>
						<td><?= $data_kasir->username ?></td>
						<td><?= $data_kasir->alamat ?></td>
						<td><?= $data_kasir->tlp ?></td>
						<td> 
							<?= anchor('AdminControl/detail_data_kasir/'.$data_kasir->id,'<button type="button" class="btn btn-primary">Detail</button>'); ?> 
						</td>
					</tr>
					<?php 
						}
					 }else{ ?>
						<div class="alert alert-warning alert-dismissible fade show" role="alert">
							Data transaksi <strong>Kosong !</strong>.
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
						<th>Tgl.transaksi</th>
						<th>Cabang</th>
						<th>Pembayaran</th>
						<th>Member</th>
						<th>Paket</th>
						<th>Status order</th>
						<th>Total</th>
						<th>Detail</th>
					</tr>
				</tfoot>
			</table>
		</div>
		
		<div class="garis"></div>
	</div>
</div>
