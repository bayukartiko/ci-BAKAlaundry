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

		
		<h6><i class="far fa-clock"></i> Data laporan order masuk</h6>
		
		<div class="garis"></div>
		
		<div class="tabel">
			<i class="far fa-clock"></i> Data laporan order masuk
			<br><br>
			
				<div class="form-check" style="margin-left: 20px;">
					<div class="form_row">
						<div class="col-md-12" style="margin-left: -15px;">
							<input class="form-check-input" type="radio" name="cabangRadios" id="exampleRadios1" value="option1">
							<label class="form-check-label" for="exampleRadios1">
								Semua cabang
							</label>
						</div>
					</div><br>
					<div class="form-row">
						<div class="col-md-2">
							<input class="form-check-input" type="radio" name="cabangRadios" id="exampleRadios2" value="option2">
							<label class="form-check-label" for="exampleRadios2">
								cabang tertentu
							</label>
						</div>
						<div class="col-md-5">
							<label class="form-check-label" for="cabang">
								Pilih cabang
							</label>
							<select class="form-control" id="cabang" required>
								<option>Cabang 1</option>
							</select>
						</div>
					</div>
				</div>

				<div class="garis"></div>
				
				<div class="form-check" style="margin-left: 20px;">
					<div class="form-row">
						<div class="col-md-12">
							<input class="form-check-input" type="radio" name="tanggalRadios" id="exampleRadios3" value="option1">
							<label class="form-check-label" for="exampleRadios3">
								Semua data
							</label>
						</div>
					</div><br>
					<div class="form-row">
						<div class="col-md-2">
							<input class="form-check-input" type="radio" name="tanggalRadios" id="exampleRadios4" value="option2">
							<label class="form-check-label" for="exampleRadios4">
								Tanggal tertentu
							</label>
						</div>
						<div class="col-md-5">
							<label class="form-check-label" for="dari">
								Dari tanggal
							</label>
							<input name="dari" type="date" value="" class="colorpicker-default form-control" size="12" id="dari">
						</div>
						<div class="col-md-5">
							<label class="form-check-label" for="sampai">
								Sampai tanggal
							</label>
							<input name="sampai" type="date" value="" class="colorpicker-default form-control" size="12" id="sampai">
						</div>
					</div>
				</div><br>
		
		<a href="#" target="_blank" class="btn btn-primary">Buat Laporan</a>
	</div>
	
	<div class="garis"></div>
</div>
</div>
