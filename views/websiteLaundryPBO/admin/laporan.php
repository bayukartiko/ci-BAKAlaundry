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
				<a href="#">Home</a> / <span class="text-muted">Laporan</span>
			</span> 
		</div>
	</nav>

	<div class="isi">
		
		<h6><i class="far fa-clock"></i> Laporan Data Aplikasi</h6>
		
		<div class="garis"></div>
		
		<div class="tabel">
			<i class="far fa-clock"></i> Laporan Data Aplikasi
			<br><br>

			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<form action="<?= site_url('AdminControl/run_laporan_pdf'); ?>" method="post" enctype="multipart/form-data">
								<i class="fas fa-fw fa-file-pdf"></i> Laporan PDF
								<br><br>
							
									<?php if($this->session->flashdata('gagal_pdf')){ ?>
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<?= $this->session->flashdata('gagal_pdf') ?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<?php } ?>

								<br>
								<div class="form-group">
									<label for="pilih_laporan_data_pdf">Pilih Data</label>
									<select class="form-control" name="pilih_laporan_data_pdf" id="pilih_laporan_data_pdf" required>
										<option value="" selected disabled>> Pilih Data <</option>
										<option value="data_user">Data User</option>
										<option value="data_pelanggan">Data Pelanggan</option>
										<option value="data_paket">Data Paket Laundry</option>
										<option value="data_cabang">Data Cabang Toko</option>
										<option value="data_transaksi">Data Transaksi</option>
										<option value="struk_transaksi">Struk Transaksi</option>
									</select>
								</div>
								<div id="chain_data_pdf_1"></div>
								<div id="chain_data_pdf_2"></div>
								<div id="chain_data_pdf_3"></div>
								<button type="submit" class="btn btn-primary">Buat Laporan PDF</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<form action="<?= site_url('AdminControl/run_laporan_xls'); ?>" method="post" enctype="multipart/form-data">
								<i class="fas fa-file-excel"></i> Laporan XLS
								<br><br>
							
									<?php if($this->session->flashdata('gagal_xls')){ ?>
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<?= $this->session->flashdata('gagal_xls') ?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<?php } ?>

								<br>
								<div class="form-group">
									<label for="pilih_laporan_data_xls">Pilih Data</label>
									<select class="form-control" name="pilih_laporan_data_xls" id="pilih_laporan_data_xls" required>
										<option value="" selected disabled>> Pilih Data <</option>
										<option value="data_user">Data User</option>
										<option value="data_pelanggan">Data Pelanggan</option>
										<option value="data_paket">Data Paket Laundry</option>
										<option value="data_cabang">Data Cabang Toko</option>
										<option value="data_transaksi">Data Transaksi</option>
										<option value="struk_transaksi">Struk Transaksi</option>
									</select>
								</div>
								<div id="chain_data_xls_1"></div>
								<div id="chain_data_xls_2"></div>
								<div id="chain_data_xls_3"></div>
								<button type="submit" class="btn btn-primary">Buat Laporan XLS</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div class="garis"></div>
	</div>
</div>
