</div>

	<script type="text/javascript">

        $(document).ready(function () {
			// $('#sidebarCollapse').on('click', function () {
			//     $('#sidebar, #content').toggleClass('active');
			//     $('.collapse.in').toggleClass('in');
			//     $('a[aria-expanded=true]').attr('aria-expanded', 'false');
			// });

			$('.custom-file-input').on('change', function(){
				let filename = $(this).val().split('\\').pop();
				$(this).next('.custom-file-label').addClass("selected").html(filename);
			});

			$(document).ready(function(){
				$('.lihat-password').click(function(){
					$(this).children().toggleClass('far fa-eye far fa-eye-slash');
					let input = $(this).prev();
					input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
				});
			});

			$(document).on("wheel", "input[type=number]", function (e) {
				$(this).blur();
			});

			$('#s_pembayaran').css('pointer-events', 'none').on('focus', function () {$(this).blur();});
			$('#edit_s_pembayaran').css('pointer-events', 'none').on('focus', function () {$(this).blur();});
			$('#s_order').css('pointer-events', 'none').on('focus', function () {$(this).blur();});

			$('.inputdatalist').flexdatalist({minLength: 0, searchByWord: true,});

			// laporan
				// laporan PDF
					$(document).ready(function(){
						$('#pilih_laporan_data_pdf').on('change', function () {
							var isi_option = $(this).val();
							$(".hasil-c1-pdf").remove();

						// data user
							if(isi_option == "data_user"){
								$("#chain_data_pdf_1").html(
									'<div class="form-group hasil-c1-pdf mb-3">'+
										'<label for="pilih_laporan_data_pdf_data_user_c1">Pilih Jenis User</label>'+
										'<select class="form-control" name="pilih_ju_laporan_data_pdf_data_user_c1" id="pilih_ju_laporan_data_pdf_data_user_c1" required>'+
											'<option value="" selected disabled>> Pilih Jenis User <</option>'+
											'<option value="semua_user">Semua User</option>'+
											'<option value="admin">Data Admin</option>'+
											'<option value="kasir">Data Kasir</option>'+
											'<option value="owner">Data Owner</option>'+
										'</select>'+
									'<div>'+
									'<br>'+
									'<div class="form-group hasil-c1-pdf mb-3">'+
										'<label for="pilih_laporan_data_pdf_data_user_c1">Pilih Cabang Toko User</label>'+
										'<select class="form-control" name="pilih_ctu_laporan_data_pdf_data_user_c1" id="pilih_ctu_laporan_data_pdf_data_user_c1" required>'+
											'<option value="" selected disabled>> Pilih Cabang Toko User <</option>'+
											'<option value="semua_cabang">Semua Cabang</option>'+
											'<?php foreach($outlet as $cabang) : ?>'+
												'<option value="<?= $cabang->id; ?>"><?= $cabang->nama; ?></option>'+
											'<?php endforeach; ?>'+
										'</select>'+
									'<div>').show();
								$('#chain_data_pdf_2').html("");
								$('#chain_data_pdf_3').html("");
						// data pelanggan
							}else if(isi_option == "data_pelanggan"){
								$(".hasil-c1-pdf").remove();
								$('#chain_data_pdf_2').html("");
								$('#chain_data_pdf_3').html("");
						// data paket
							}else if(isi_option == "data_paket"){
								$("#chain_data_pdf_1").html(
									'<div class="form-group hasil-c1-pdf mb-3">'+
										'<label for="pilih_ctp_laporan_data_pdf_data_paket_c1">Pilih Cabang Toko</label>'+
										'<select class="form-control" name="pilih_ctp_laporan_data_pdf_data_paket_c1" id="pilih_ctp_laporan_data_pdf_data_paket_c1" required>'+
											'<option value="" selected disabled>> Pilih Cabang Toko <</option>'+
											'<option value="semua_cabang">Semua Cabang</option>'+
											'<?php foreach($outlet as $cabang) : ?>'+
												'<option value="<?= $cabang->id; ?>"><?= $cabang->nama; ?></option>'+
											'<?php endforeach; ?>'+
										'</select>'+
									'<div>').show();
								$('#chain_data_pdf_2').html("");
								$('#chain_data_pdf_3').html("");
						// data cabang
							}else if(isi_option == "data_cabang"){
								$(".hasil-c1-pdf").remove();
								$('#chain_data_pdf_2').html("");
								$('#chain_data_pdf_3').html("");
						// data transaksi
							}else if(isi_option == "data_transaksi"){
								$("#chain_data_pdf_1").html(
									'<div class="form-group hasil-c1-pdf mb-3">'+
										'<label for="pilih_ctt_laporan_data_pdf_data_user_c1">Pilih Cabang Toko</label>'+
										'<select class="form-control" name="pilih_ctt_laporan_data_pdf_data_user_c1" id="pilih_ctt_laporan_data_pdf_data_user_c1" required>'+
											'<option value="" selected disabled>> Pilih Cabang Toko <</option>'+
											'<option value="semua_cabang"> Semua Cabang </option>'+
											'<?php foreach($outlet as $cabang) : ?>'+
												'<option value="<?= $cabang->id; ?>"><?= $cabang->nama; ?></option>'+
											'<?php endforeach; ?>'+
										'</select>'+
									'<div>').show();

									$('#pilih_ctt_laporan_data_pdf_data_user_c1').on('change', function () {
										$("#chain_data_pdf_2").html(
											'<div class="form-check">'+
												'<input class="form-check-input radio-transaksi-pdf" type="radio" name="tanggalRadiospdf" id="semua_tanggal_pdf" value="semua_tanggal_pdf" required>'+
												'<label class="form-check-label" for="semua_tanggal_pdf">'+
													'Semua Tanggal'+
												'</label>'+
											'</div>'+
											'<div class="form-check">'+
												'<input class="form-check-input radio-transaksi-pdf" type="radio" name="tanggalRadiospdf" id="tanggal_tertentu_pdf" value="tanggal_tertentu_pdf" required>'+
												'<label class="form-check-label" for="tanggal_tertentu_pdf">'+
													'Tanggal Tertentu'+
												'</label>'+
											'</div>'+
											'<br>'
										);
										$('#chain_data_pdf_3').html("");

										$('.radio-transaksi-pdf').click(function() {
											if($('#tanggal_tertentu_pdf').is(':checked')){
												$('#chain_data_pdf_3').html(
													'<div class="form-group mb-3">'+
														'<label for="dari_tanggal">Dari Tanggal</label>'+
														'<input type="date" class="form-control" name="dari_tanggal_pdf" id="dari_tanggal" required>'+
													'<div>'+
													'<br>'+
													'<div class="form-group mb-3">'+
														'<label for="dari_tanggal">Sampai Tanggal</label>'+
														'<input type="date" class="form-control" name="sampai_tanggal_pdf" id="sampai_tanggal" required>'+
													'<div>'+
													'<br>').show();
											}else{
												$('#chain_data_pdf_3').html("");
											}
										});
									});
						// struk transaksi	
							}else if(isi_option == "struk_transaksi"){
								$("#chain_data_pdf_1").html(
									'<div class="form-group hasil-c1-pdf mb-3">'+
										'<label for="input_kdtr_laporan_data_pdf_data_user_c1">Masukkan Kode Transaksi</label>'+
										'<input type="text" class="form-control" id="input_kdtr_laporan_data_pdf_data_user_c1" name="kode_nuklir_pdf" placeholder="> Masukkan Kode Transaksi <" required>'+
									'<div>').show();
								$('#chain_data_pdf_2').html("");
								$('#chain_data_pdf_3').html("");
							}


						});
					});

				// laporan XLS
					$(document).ready(function(){
							$('#pilih_laporan_data_xls').on('change', function () {
								var isi_option_xls = $(this).val();
								$(".hasil-c1-xls").remove();

							// data user
								if(isi_option_xls == "data_user"){
									$("#chain_data_xls_1").html(
										'<div class="form-group hasil-c1-xls mb-3">'+
											'<label for="pilih_laporan_data_xls_data_user_c1">Pilih Jenis User</label>'+
											'<select class="form-control" name="pilih_ju_laporan_data_xls_data_user_c1" id="pilih_ju_laporan_data_xls_data_user_c1" required>'+
												'<option value="">> Pilih Jenis User <</option>'+
												'<option value="semua_user">Semua User</option>'+
												'<option value="admin">Data Admin</option>'+
												'<option value="kasir">Data Kasir</option>'+
												'<option value="owner">Data Owner</option>'+
											'</select>'+
										'<div>'+
										'<br>'+
										'<div class="form-group hasil-c1-xls mb-3">'+
											'<label for="pilih_laporan_data_xls_data_user_c1">Pilih Cabang Toko User</label>'+
											'<select class="form-control" name="pilih_ctu_laporan_data_xls_data_user_c1" id="pilih_ctu_laporan_data_xls_data_user_c1" required>'+
												'<option value="" selected disabled>> Pilih Cabang Toko User <</option>'+
												'<option value="semua_cabang">Semua Cabang</option>'+
												'<?php foreach($outlet as $cabang) : ?>'+
													'<option value="<?= $cabang->id; ?>"><?= $cabang->nama; ?></option>'+
												'<?php endforeach; ?>'+
											'</select>'+
										'<div>').show();
									$('#chain_data_xls_2').html("");
									$('#chain_data_xls_3').html("");
							// data pelanggan
								}else if(isi_option_xls == "data_pelanggan"){
									$(".hasil-c1-xls").remove();
									$('#chain_data_xls_2').html("");
									$('#chain_data_xls_3').html("");
							// data paket
								}else if(isi_option_xls == "data_paket"){
									$("#chain_data_xls_1").html(
										'<div class="form-group hasil-c1-xls mb-3">'+
											'<label for="pilih_laporan_data_xls_data_user_c1">Pilih Cabang Toko</label>'+
											'<select class="form-control" name="pilih_ctu_laporan_data_xls_data_user_c1" id="pilih_ctu_laporan_data_xls_data_user_c1" required>'+
												'<option value="" selected disabled>> Pilih Cabang Toko <</option>'+
												'<option value="semua_cabang">Semua Cabang</option>'+
												'<?php foreach($outlet as $cabang) : ?>'+
													'<option value="<?= $cabang->id; ?>"><?= $cabang->nama; ?></option>'+
												'<?php endforeach; ?>'+
											'</select>'+
										'<div>').show();
									$('#chain_data_xls_2').html("");
									$('#chain_data_xls_3').html("");
							// data cabang
								}else if(isi_option_xls == "data_cabang"){
									$(".hasil-c1-xls").remove();
									$('#chain_data_xls_2').html("");
									$('#chain_data_xls_3').html("");
							// data transaksi
								}else if(isi_option_xls == "data_transaksi"){
									$("#chain_data_xls_1").html(
										'<div class="form-group hasil-c1-xls mb-3">'+
											'<label for="pilih_ctt_laporan_data_xls_data_user_c1">Pilih Cabang Toko</label>'+
											'<select class="form-control" name="pilih_ctt_laporan_data_xls_data_user_c1" id="pilih_ctt_laporan_data_xls_data_user_c1" required>'+
												'<option value="" selected disabled>> Pilih Cabang Toko <</option>'+
												'<option value="semua_cabang"> Semua Cabang </option>'+
												'<?php foreach($outlet as $cabang) : ?>'+
													'<option value="<?= $cabang->id; ?>"><?= $cabang->nama; ?></option>'+
												'<?php endforeach; ?>'+
											'</select>'+
										'<div>').show();

										$('#pilih_ctt_laporan_data_xls_data_user_c1').on('change', function () {
											$("#chain_data_xls_2").html(
												'<div class="form-check">'+
													'<input class="form-check-input radio-transaksi-xls" type="radio" name="tanggalRadiosxls" id="semua_tanggal_xls" value="semua_tanggal_xls" required>'+
													'<label class="form-check-label" for="semua_tanggal_xls">'+
														'Semua Tanggal'+
													'</label>'+
												'</div>'+
												'<div class="form-check">'+
													'<input class="form-check-input radio-transaksi-xls" type="radio" name="tanggalRadiosxls" id="tanggal_tertentu_xls" value="tanggal_tertentu_xls" required>'+
													'<label class="form-check-label" for="tanggal_tertentu_xls">'+
														'Tanggal Tertentu'+
													'</label>'+
												'</div>'+
												'<br>'
											);
											$('#chain_data_xls_3').html("");

											$('.radio-transaksi-xls').click(function() {
												if($('#tanggal_tertentu_xls').is(':checked')){
													$('#chain_data_xls_3').html(
														'<div class="form-group mb-3">'+
															'<label for="dari_tanggal">Dari Tanggal</label>'+
															'<input type="date" class="form-control" name="dari_tanggal_xls" id="dari_tanggal" required>'+
														'<div>'+
														'<br>'+
														'<div class="form-group mb-3">'+
															'<label for="dari_tanggal">Sampai Tanggal</label>'+
															'<input type="date" class="form-control" name="sampai_tanggal_xls" id="sampai_tanggal" required>'+
														'<div>'+
														'<br>').show();
												}else{
													$('#chain_data_xls_3').html("");
												}
											});
										});
							// struk transaksi
								}else if(isi_option_xls == "struk_transaksi"){
									$("#chain_data_xls_1").html(
										'<div class="form-group hasil-c1-xls mb-3">'+
											'<label for="input_kdtr_laporan_data_xls_data_user_c1">Masukkan Kode Transaksi</label>'+
											'<input type="text" class="form-control" id="input_kdtr_laporan_data_xls_data_user_c1" name="kode_nuklir_xls" placeholder="> Masukkan Kode Transaksi <" required>'+
										'<div>').show();
									$('#chain_data_xls_2').html("");
									$('#chain_data_xls_3').html("");
								}
						});
					});

			// select2
				$('#namamember').select2({
					width: '100%',
					// allowClear: true,
					closeOnSelect: true,
					theme: 'bootstrap4'
				});
				$('#paket').select2({
					width: '100%',
					// allowClear: true,
					closeOnSelect: true,
					theme: 'bootstrap4'
				});
				$('#cabang').select2({
					width: '100%',
					// allowClear: true,
					closeOnSelect: true,
					theme: 'bootstrap4'
				});

			// datatables
				$('#example').DataTable( {
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
</body>

</html>
