</div>

	<!-- jQuery CDN - Slim version (=without AJAX) -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<!-- Popper.JS -->
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/58da37be9c.js" crossorigin="anonymous"></script>
    <!-- Datatables -->
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.7/js/dataTables.rowReorder.min.js"></script>
	
	<!-- sweetalert -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<!-- flexdatalist -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-flexdatalist/2.2.4/jquery.flexdatalist.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
			$('.custom-file-input').on('change', function(){
				let filename = $(this).val().split('\\').pop();
				$(this).next('.custom-file-label').addClass("selected").html(filename);
			});

			$('.inputdatalist').flexdatalist({minLength: 0, searchByWord: true,});
			

            // $('#sidebarCollapse').on('click', function () {
            //     $('#sidebar, #content').toggleClass('active');
            //     $('.collapse.in').toggleClass('in');
            //     $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            // });

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
