<table id="tabel_transaksi" class="table table-striped table-bordered table-sm" style="width:100%">
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
		if($h_transaksi_semua>0){
			$nomor = 1;
			foreach ($tb_transaksi as $data_transaksi){
		?>
		<tr>
			<td><?=  $nomor++ ?></td>
			<td><?= (new DateTime($data_transaksi->tgl))->format('d/M/Y'); ?></td>
			<td>
				<?php foreach($outlet as $cabang) : ?>
					<?php if( $cabang->id == $data_transaksi->id_outlet) { ?>
						<?= $cabang->nama; ?>
					<?php } ?>
				<?php endforeach; ?>
			</td>
			<td>
				<div class="btn btn-outline-success">
					<?= $data_transaksi->status_bayar ?>
				</div>
			</td>
			<td>
				<?php foreach($member as $pelanggan) : ?>
					<?php if( $pelanggan->id == $data_transaksi->id_member) { ?>
						<?= $pelanggan->nama; ?>
					<?php } ?>
				<?php endforeach; ?>
			</td>
			<td>
				<?php foreach($paket as $pakets) : ?>
					<?php if( $pakets->id == $data_transaksi->id_paket) { ?>
						<?= $pakets->nama_paket; ?>
					<?php } ?>
				<?php endforeach; ?>
			</td>
			<td>
				<div class="btn btn-outline-info">
					<?= $data_transaksi->status ?>
				</div>
			</td>
			<td>Rp.<?= number_format($data_transaksi->total,2,',','.') ?></td>
			<td> 
				<!-- </?= anchor('AdminControl/detail_data_transaksi/'.$data_transaksi->id,'<button type="button" class="btn btn-primary">Detail</button>'); ?> -->
				<a href="javascript:void();" data-id="<?= $data_transaksi->id; ?>" data-toggle="modal" data-target="#form-modal-detail-transaksi" class="btn btn-primary btn-form-detail">Detail</a>

				<!-- besok bikin modal detail transaksi -->

				<!-- Membuat sebuah textbox hidden yang akan digunakan untuk form detail -->
					<!-- tabel pertama -->
						<!-- id -->
							<input type="hidden" class="id-value_detail" value="<?= $data_transaksi->id; ?>">
						
						<!-- kode_invoice -->
							<input type="hidden" class="kode_invoice-value_detail" value="<?= 
							$data_transaksi->kode_invoice; ?>">
						<!-- nama_user -->
							<input type="hidden" class="nama_user-value_detail" value="<?php foreach($tb_user as $user) : if( $user->id == $data_transaksi->id_user){ echo $user->nama; } endforeach; ?>">
						<!-- nama_outlet -->
							<input type="hidden" class="nama_outlet-value_detail" value="<?php foreach($outlet as $cabang) : if( $cabang->id == $data_transaksi->id_outlet){ echo $cabang->nama; } endforeach; ?>">
						<!-- id_member -->
							<input type="hidden" class="id_member-value_detail" value="<?php $data_transaksi->id_member ?>">
						<!-- nama_member -->
							<input type="hidden" class="nama_member-value_detail" value="<?php foreach($tb_member as $pelanggan) : if( $pelanggan->id == $data_transaksi->id_member){ echo $pelanggan->nama; } endforeach; ?>">
						<!-- alamat_member -->
							<input type="hidden" class="alamat_member-value_detail" value="<?php foreach($tb_member as $pelanggan) : if( $pelanggan->id == $data_transaksi->id_member){ echo $pelanggan->alamat; } endforeach; ?>">
						<!-- email_member -->
							<input type="hidden" class="email_member-value_detail" value="<?php foreach($tb_member as $pelanggan) : if( $pelanggan->id == $data_transaksi->id_member){ echo $pelanggan->email; } endforeach; ?>">
						<!-- telepon_member -->
							<input type="hidden" class="telepon_member-value_detail" value="<?php foreach($tb_member as $pelanggan) : if( $pelanggan->id == $data_transaksi->id_member){ echo $pelanggan->tlp; } endforeach; ?>">
						<!-- gender_member -->
							<input type="hidden" class="gender_member-value_detail" value="<?php foreach($tb_member as $pelanggan) : if( $pelanggan->id == $data_transaksi->id_member){ echo $pelanggan->jenis_kelamin; } endforeach; ?>">
						
						<!-- tipe_pembayaran -->
							<input type="hidden" class="tipe_pembayaran-value_detail" value="<?= $data_transaksi->tipe_pembayaran; ?>">
						<!-- status_order -->
							<?php foreach($status_order as $pilih_s_order) : ?>
								<?php if( $pilih_s_order == $data_transaksi->status) { ?>
									<!-- <option value="</?= $pilih_s_order; ?>" selected>+ </?= $pilih_s_order; ?> +</option> -->
									<?php if($data_transaksi->status == "Baru"){ ?>
										<input type="hidden" class="status_order-value_detail" value='
											<option value="Baru" selected>+ Baru +</option>
											<option value="Proses">Proses</option>
											<option value="Selesai">Selesai</option>
											<?php foreach($status_dibayar as $pilih_s_pembayaran) : ?>
												<?php if( $pilih_s_pembayaran == $data_transaksi->status_bayar) { ?>
													<?php if($data_transaksi->status_bayar == "Kurang" || $data_transaksi->status_bayar == "Belum Dibayar"){ ?>
														<option value="Diambil" disabled>x Diambil x <span class="badge badge-danger">[ harap melunasi pembayaran agar barang bisa diambil ]</span></option>
													<?php }elseif($data_transaksi->status_bayar == "Dibayar"){ ?>
														<option value="Diambil">Diambil</option>
													<?php } ?>
												<?php } ?>
											<?php endforeach; ?>
										'>
									<?php }elseif($data_transaksi->status == "Proses"){ ?>
										<input type="hidden" class="status_order-value_detail" value='
											<option value="Proses" selected>+ Proses +</option>
											<option value="Selesai">Selesai</option>
											<?php foreach($status_dibayar as $pilih_s_pembayaran) : ?>
												<?php if( $pilih_s_pembayaran == $data_transaksi->status_bayar) { ?>
													<?php if($data_transaksi->status_bayar == "Kurang" || $data_transaksi->status_bayar == "Belum Dibayar"){ ?>
														<option value="Diambil" disabled>x Diambil x <span class="badge badge-danger">[ harap melunasi pembayaran agar barang bisa diambil ]</span></option>
													<?php }elseif($data_transaksi->status_bayar == "Dibayar"){ ?>
														<option value="Diambil">Diambil</option>
													<?php } ?>
												<?php } ?>
											<?php endforeach; ?>
										'>
									<?php }elseif($data_transaksi->status == "Selesai"){ ?>
										<input type="hidden" class="status_order-value_detail" value='
											<option value="Selesai" selected>+ Selesai +</option>
											<?php foreach($status_dibayar as $pilih_s_pembayaran) : ?>
												<?php if( $pilih_s_pembayaran == $data_transaksi->status_bayar) { ?>
													<?php if($data_transaksi->status_bayar == "Kurang" || $data_transaksi->status_bayar == "Belum Dibayar"){ ?>
														<option value="Diambil" disabled>x Diambil x <span class="badge badge-danger">[ harap melunasi pembayaran agar barang bisa diambil ]</span></option>
													<?php }elseif($data_transaksi->status_bayar == "Dibayar"){ ?>
														<option value="Diambil">Diambil</option>
													<?php } ?>
												<?php } ?>
											<?php endforeach; ?>
										'>
									<?php }elseif($data_transaksi->status == "Diambil"){ ?>
										<input type="hidden" class="status_order-value_detail" value='
											<option value="Diambil" selected>+ Diambil +</option>
										'>
									<?php } ?>
								<?php }?>
							<?php endforeach; ?>
						<!-- tgl_bayar -->
							<input type="hidden" class="tgl_bayar-value_detail" value="<?= (new DateTime($data_transaksi->tgl_bayar))->format('d/M/Y'); ?>">
						<!-- tgl_ambil -->
							<input type="hidden" class="tgl_ambil-value_detail" value="<?= (new DateTime($data_transaksi->tgl_ambil))->format('d/M/Y'); ?>">
						<!-- status_bayar -->
							<?php foreach($status_dibayar as $pilih_s_pembayaran) : ?>
								<?php if( $pilih_s_pembayaran == $data_transaksi->status_bayar) { ?>
									<input type="hidden" class="status_bayar-value_detail" value="<option value='<?= $pilih_s_pembayaran; ?>' selected>+ <?= $pilih_s_pembayaran; ?> +</option>">
								<?php } ?>
							<?php endforeach; ?>
					<!-- tabel kedua -->
						<!-- tgl -->
							<input type="hidden" class="tgl-value_detail" value="<?= (new DateTime($data_transaksi->tgl))->format('d/M/Y'); ?>">
						<!-- titlekembali -->
							<?php foreach($status_dibayar as $pilih_s_pembayaran) : ?>
								<?php if( $pilih_s_pembayaran == $data_transaksi->status_bayar) { ?>
									<?php if($pilih_s_pembayaran == "Kurang"){ ?>
										<input type="hidden" class="titlekembali-value_detail" value="kurang">
									<?php }elseif($pilih_s_pembayaran == "Dibayar"){ ?>
										<input type="hidden" class="titlekembali-value_detail" value="kembali">
									<?php } ?>
								<?php } ?>
							<?php endforeach; ?>
						<!-- id_paket -->
							<input type="hidden" class="id_paket-value_detail" value="<?= $data_transaksi->id_paket; ?>">
						<!-- nama_paket -->
							<input type="hidden" class="nama_paket-value_detail" value="<?php foreach($paket as $pakets) : if( $pakets->id == $data_transaksi->id_paket){ echo $pakets->nama_paket; } endforeach; ?>">
						<!-- harga_paket -->
							<input type="hidden" class="harga_paket-value_detail" value="<?php foreach($paket as $pakets) : if( $pakets->id == $data_transaksi->id_paket){ echo number_format($pakets->harga,2,',','.'); } endforeach; ?>">
						<!-- satuan_paket -->
							<input type="hidden" class="satuan_paket-value_detail" value="<?php foreach($paket as $pakets) : if( $pakets->id == $data_transaksi->id_paket){ echo $pakets->satuan; } endforeach; ?>">
						<!-- jumlah -->
							<input type="hidden" class="jumlah-value_detail" value="<?= $data_transaksi->jumlah; ?>">
						<!-- harga_jual -->
							<input type="hidden" class="harga_jual-value_detail" value="<?= $data_transaksi->harga_jual; ?>">
						<!-- diskon -->
							<input type="hidden" class="diskon-value_detail" value="<?= $data_transaksi->diskon; ?>">
						<!-- harga_diskon -->
							<input type="hidden" class="harga_diskon-value_detail" value="<?= $data_transaksi->harga_diskon; ?>">
						<!-- biaya_tambahan -->
							<input type="hidden" class="biaya_tambahan-value_detail" value="<?= $data_transaksi->biaya_tambahan; ?>">
						<!-- pajak -->
							<input type="hidden" class="pajak-value_detail" value="<?= $data_transaksi->pajak; ?>">
						<!-- total-hidden -->
							<input type="hidden" class="total-value-hidden_detail" value="<?= $data_transaksi->total; ?>">
						<!-- total -->
							<input type="hidden" class="total-value_detail" value="<?= number_format($data_transaksi->total,2,',','.'); ?>">
						<!-- tunai -->
							<?php foreach($status_dibayar as $pilih_s_pembayaran) : ?>
								<?php if( $pilih_s_pembayaran == $data_transaksi->status_bayar) { ?>
									<?php if( $data_transaksi->status_bayar == 'Dibayar'){ ?>
										<input type="hidden" class="tunai-value_detail" value='
											<input type="hidden" name="harga_tunai_detail" value="<?= $data_transaksi->tunai ?>">
											Rp.<?= number_format($data_transaksi->tunai,2,",",".") ?>
										'>
									<?php }elseif( $data_transaksi->status_bayar == 'Kurang'){ ?>
										<input type="hidden" class="tunai-value_detail" value='
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Rp.</span>
												</div>
												<input type="number" min="0" class="form-control" id="harga_tunai_detail" name="harga_tunai_detail" value="<?= $data_transaksi->tunai ?>">
											</div>
										'>
									<?php }?>
								<?php } ?>
							<?php endforeach; ?>
						<!-- kembali -->
							<?php foreach($status_dibayar as $pilih_s_pembayaran) : ?>
								<?php if( $pilih_s_pembayaran == $data_transaksi->status_bayar) { ?>
									<?php if( $data_transaksi->status_bayar == 'Dibayar'){ ?>
										<input type="hidden" class="kembali-value_detail" value='
											<input type="hidden" name="harga_kembali_detail" value="<?= $data_transaksi->kembali_or_kurang ?>">
											Rp.<?= number_format($data_transaksi->kembali_or_kurang,2,",",".") ?>
										'>
									<?php }elseif( $data_transaksi->status_bayar == 'Kurang'){ ?>
										<input type="hidden" class="kembali-value_detail" value='
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">Rp.</span>
												</div>
												<input type="number" min="0" class="form-control" id="harga_kembali_detail" name="harga_kembali_detail" value="<?= $data_transaksi->kembali_or_kurang ?>" readonly>
											</div>
										'>
									<?php }?>
								<?php } ?>
							<?php endforeach; ?>

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
			<!-- Data transaksi kosong ! -->
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


<script>
	$(document).ready(function(){
		
		$('#tabel_transaksi').DataTable({
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

		// // detail transaksi
		// 	$("#harga_tunai_detail").on('input', function(){
		// 		var duit = $(this).val();
		// 		var total = $("#total_harga").val();
		// 		// var sama_total = "-"+total;

		// 		var hitung_kembalian = duit-total;

		// 		if(hitung_kembalian >= 0){
		// 			$("#titlekembali-detail").html("Kembali");
		// 			$("#edit_s_pembayaran").html('<option value="Dibayar" selected>+ Dibayar +</option>');
		// 		}else if(hitung_kembalian < 0){
		// 			$("#titlekembali-detail").html("Kurang");
		// 			$("#edit_s_pembayaran").html('<option value="Kurang" selected>+ Kurang +</option>');
		// 		}

		// 		var jumlah_kembalian = hitung_kembalian;
		// 		jumlah_kembalian = jumlah_kembalian.toString().replace('-', '');
		// 		$("#harga_kembali_detail").val(jumlah_kembalian);
		// 	});

	});
</script>
