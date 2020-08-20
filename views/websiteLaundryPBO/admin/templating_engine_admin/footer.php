
</div>

	<!-- jQuery CDN - Slim version (=without AJAX) -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<!-- Popper.JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
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

	<script type="text/javascript">
		// const tombol = document.querySelector('#tombollogout');
		// tombol.addEventListener('click', function(){
		// 	Swal.fire({
		// 		title: 'Are you sure?',
		// 		text: "You won't be able to revert this!",
		// 		icon: 'warning',
		// 		showCancelButton: true,
		// 		confirmButtonColor: '#3085d6',
		// 		cancelButtonColor: '#d33',
		// 		cancelButtonText: 'No, cancel!',
		// 		confirmButtonText: 'Yes, delete it!'
		// 	})
		// })

		// $('.dropdown').on('hidden.bs.dropdown', function(e) {
		// 	$(this).find('.caret').toggleClass('rotate-180');
		// });

		// $('.dropdown').on('shown.bs.dropdown', function(e) {
		// 	$(this).find('.caret').toggleClass('rotate-180');
		// });

        $(document).ready(function () {
			$('.custom-file-input').on('change', function(){
				let filename = $(this).val().split('\\').pop();
				$(this).next('.custom-file-label').addClass("selected").html(filename);
			});


            // $("#sidebar").mCustomScrollbar({
            //     theme: "minimal"
            // });

            // $('#sidebarCollapse').on('click', function () {
            //     $('#sidebar, #content').toggleClass('active');
            //     $('.collapse.in').toggleClass('in');
            //     $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            // });

            $('#example').DataTable( {
                rowReorder: true,

				"language": {
					sProcessing: "Sedang memproses...",
					sLengthMenu: "Tampilkan _MENU_ entri",
					sZeroRecords: "Tidak ditemukan data yang sesuai",
					sInfo: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
					sInfoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
					sInfoFiltered: "(disaring dari _MAX_ entri keseluruhan)",
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
