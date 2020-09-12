</div>

	<!-- jQuery CDN -->
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<!-- Popper.JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
    <!-- jQuery Custom Scroller CDN -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

	<!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js" integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg==" crossorigin="anonymous"></script>
		<!-- font awesome kit -->
		<script src="https://kit.fontawesome.com/58da37be9c.js" crossorigin="anonymous"></script>
	
    <!-- Datatables -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>

	<!-- select2 -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.js"></script> -->
	<script src="<?= base_url('assets/select2/dist/js/select2.min.js') ?>"></script>

	<!-- sweetalert -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
	<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->

	<!-- flexdatalist -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-flexdatalist/2.2.4/jquery.flexdatalist.min.js"></script>

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

		// detail transaksi
			$("#harga_tunai_detail").on('input', function(){
				var duit = $(this).val();
				var total = $("#total_harga").val();
				// var sama_total = "-"+total;

				var hitung_kembalian = duit-total;

				if(hitung_kembalian >= 0){
					$("#titlekembali").html("Kembali");
					$("#edit_s_pembayaran").html('<option value="Dibayar" selected>+ Dibayar +</option>');
				}else if(hitung_kembalian < 0){
					$("#titlekembali").html("Kurang");
					$("#edit_s_pembayaran").html('<option value="Kurang" selected>+ Kurang +</option>');
				}

				var jumlah_kembalian = hitung_kembalian;
				jumlah_kembalian = jumlah_kembalian.toString().replace('-', '');
				$("#harga_kembali_detail").val(jumlah_kembalian);
			});

		// pilihan satuan paket di transaksi
			$(document).ready(function(){
				$("#cabang").on('change', function(){
					var id_cabang= $(this).val();
					$("#jumlah").val("");
					$("#harga_jual").val("");
					$("#diskon_paket").val("");
					$("#harga_diskon").val("");
					$("#total").val("");
					$("#tunai").val("");
					$("#kembali").val("");
					$("#s_pembayaran").html('<option value="Belum Dibayar" selected disabled>Belum Dibayar</option>');

					$.ajax({
						url: "<?= site_url('AdminControl/get_data_cabang_paket'); ?>",
						method: "POST",
						data: {id_cabang:id_cabang},
						async: true,
						dataType: 'JSON',
						success: function(data){
							var html = "<option value='' selected disabled>> Pilih Paket Laundry <</option>";
							var i;
							for(i=0; i<data.length; i++){
								html += '<option value='+data[i].id+'>'+data[i].nama_paket+'</option>';
							}
							$("#paket").html(html);
						}
					});
					return false;
				});

				$("#paket").on('change', function(){
					var id = $(this).val();
					$("#jumlah").val("");
					// $("#harga_jual").val("");
					// $("#diskon_paket").val("");
					// $("#harga_diskon").val("");
					$("#total").val("");
					$("#tunai").val("");
					$("#kembali").val("");
					$("#s_pembayaran").html('<option value="Belum Dibayar" selected disabled>Belum Dibayar</option>');

					$.ajax({
						url: "<?= site_url('AdminControl/get_data_paket'); ?>",
						method: "POST",
						data: {id:id},
						async: true,
						dataType: 'JSON',
						success: function(data){
							var satuan = "";
							var diskon = "";
							var harga = "";
							var i;
							for(i=0; i<data.length; i++){
								satuan += data[i].satuan;
								diskon += data[i].diskon;
								harga += data[i].harga;
						}
						$("#hasilpilihan").html(satuan);
						$("#diskon_paket").val(diskon);

						// hitung diskon
							if(diskon == 0){
								$("#harga_jual").val(harga);
								$("#harga_diskon").val(harga);
							}else{
								var nilai_harga = harga;
								var nilai_diskon = diskon;

								var hasil_diskon = harga*(nilai_diskon/100);
								var hasil_akhir = nilai_harga-hasil_diskon;

								// $("#harga_jual").val(harga);
								$("#harga_jual").val(harga);
								$("#harga_diskon").val(hasil_akhir);
							}

						// hitung total
							$("#jumlah").on('input', function(){
								var jumlah_barang = $(this).val();
								var jumlah_diskon = $('#harga_diskon').val();
								var biaya_tambahan = 500;
								var pajak = 500;

								var hitung_total = (jumlah_diskon*jumlah_barang)+biaya_tambahan+pajak;
								
								$('#total').val(hitung_total);
							});

						// hitung kembali
							$("#tunai").on('input', function(){
								var duit = $(this).val();
								var total = $("#total").val();
								// var sama_total = "-"+total;

								var hitung_kembalian = duit-total;

								if(hitung_kembalian >= 0){
									$("#titlekembali").html("Kembali");
									$("#s_pembayaran").html('<option value="Dibayar" selected>Dibayar</option>');
								}else if(hitung_kembalian < 0){
									$("#titlekembali").html("Kurang");
									$("#s_pembayaran").html('<option value="Kurang" selected>Kurang</option>');
								}
								// else if(hitung_kembalian = sama_total){
								// 	$("#titlekembali").html("Belum Dibayar");
								// 	$("#s_pembayaran").html('<option value="Belum Dibayar" selected>Belum Dibayar</option>');
								// }

								var jumlah_kembalian = hitung_kembalian;
								jumlah_kembalian = jumlah_kembalian.toString().replace('-', '');
								$("#kembali").val(jumlah_kembalian);

							});
						}
					});
					// });
					return false;
				});
			});

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

		// tambah diskon paket
			$('.checkboxtambah').click(function() {
				if($('#ya').is(':checked')){
					$('#input_diskon').html('<div class="input-group input-grup-diskon mb-3"><input type="number" class="form-control" name="inputan_diskon" id="inputan_diskon" placeholder="Masukkan jumlah diskon" min="1" max="100" required><div class="input-group-append"><span class="input-group-text">%</span></div></div>').show();
				}else{
					$('.input-grup-diskon').remove();
				}
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
