<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>BAKA Laundry</title>
	<!-- icon aplikasi -->
		<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/apple-touch-icon.png')?>">
		<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicon-32x32.png')?>">
		<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/favicon-16x16.png')?>">
		<link rel="manifest" href="<?= base_url('assets/img/site.webmanifest')?>">

    <!-- Bootstrap CSS CDN -->
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	
	<!-- CSS sendiri -->
    <style>
		@import url("https://fonts.googleapis.com/css2?family=Patrick+Hand+SC:300,400,500,600,700");
        @import url('https://fonts.googleapis.com/css2?family=Alata&display=swap');
        body {
            font-family: 'Alata', sans-serif;
            background: #dfe6e9;
        }
			::-webkit-scrollbar {
				width: 10px;
			}

			/* Track */
			::-webkit-scrollbar-track {
				background: #f1f1f1; 
			}
			
			/* Handle */
			::-webkit-scrollbar-thumb {
				background: #888; 
			}

			/* Handle on hover */
			::-webkit-scrollbar-thumb:hover {
				background: #555; 
			}

        h1,h2,h4,h5,h6{
            color: #2d3436;
        }

        p {
            font-family: 'Poppins', sans-serif;
            font-size: 1em;
            font-weight: 300;
            line-height: 1.7em;
            color: #b2bec3;
        }

        a,
        a:hover,
        a:focus {
            color: inherit;
            text-decoration: none;
            transition: all 0.3s;
        }

        .navbar {
            height: 81.4px;
            padding: 15px 10px;
            background: #fff;
            border: none;
            border-radius: 0;
            margin-bottom: 40px;
            box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15)!important;
        }

        .navbar-btn {
            box-shadow: none;
            outline: none !important;
            border: none;
        }

        .garis {
            width: 100%;
            height: 1px;
            border-bottom: 1px dashed #95a5a6;
            margin: 40px 0;
        }
        .tabel{
            background: white;
            padding: 25px;
            border-radius: 10px;
            /* border-right: 1px solid #1E272E;
            border-left: 1px solid #1E272E; */
            border-top: 3px solid #1E272E;
            border-bottom: 3px solid #1E272E;
        }

		.select2-rendered__match {
			text-decoration: underline;
		}
        /* sidebar */

        .wrapper {
            display: flex;
            width: 100%;
        }

        #sidebar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 999;
            background: #1e272e;
            color: #fff;
            transition: all 0.3s;
			overflow: auto;
        }
			#sidebar::-webkit-scrollbar {
				width: 5px;
			}

			/* Track */
			#sidebar::-webkit-scrollbar-track {
				background: #f1f1f1; 
			}
			
			/* Handle */
			#sidebar::-webkit-scrollbar-thumb {
				background: #888; 
			}

			/* Handle on hover */
			#sidebar::-webkit-scrollbar-thumb:hover {
				background: #555; 
			}

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #485460;
			font-family: 'Patrick Hand SC', cursive;
			text-align: center;
        }

        #sidebar ul.components {
            padding: 20px 0;
            border-bottom: 1px solid #47748b;
        }

        #sidebar ul p {
            color: #fff;
            padding: 10px;
        }

        #sidebar ul li a {
            padding: 10px;
            font-size: 1em;
            display: block;
        }

        #sidebar ul li a:hover {
            color: #808e9b;
            background: #151515;
        }

        #sidebar ul li.active>a,
        a[aria-expanded="true"] {
            color: #ecf0f1;
            background: #151515;
        }

        a[data-toggle="collapse"] {
            position: relative;
        }

        a.active{
            color: #ecf0f1;
            background: #5e5e5e;
        }
		
        .dropdown-toggle::after{
            display: block;
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
        }

        ul ul a {
            font-size: 0.9em !important;
            padding-left: 30px !important;
            background: #151515;
        }

        ul.tentang {
            padding: 20px;
        }

        ul.tentang a {
            text-align: center;
            font-size: 0.9em !important;
            display: block;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        a.article,
        a.article:hover {
            background: #6d7fcc !important;
            color: #fff !important;
        }

        /* konten*/

        #content {
            width: calc(100% - 250px);
            padding: 0px;
            min-height: 100vh;
            transition: all 0.3s;
            position: absolute;
            top: 0;
            right: 0;
        }
        .isi{
            padding: 15px;
        }
		.isiTentang{
            height: 100%;
            padding: 15px;
            text-align: center;
        }

        /* #content.active {
            width: 100%;
        } */

        /* responsif */

        /* @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
            #content {
                width: 100%;
            }
            #content.active {
                width: calc(100% - 250px);
            }
            #sidebarCollapse span {
                display: none;
            }
        } */
	</style>
	
	<!-- select2 -->
		<link href="<?= base_url('assets/select2/dist/css/select2.min.css') ?>" rel="stylesheet" />
		<link href="<?= base_url('assets/select2-bootstrap4/dist/select2-bootstrap4.min.css') ?>" rel="stylesheet" />

    <!-- Scrollbar Custom CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
	
    <!-- font awesome -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <!-- Datatables -->
    	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.bootstrap4.min.css">

	<!-- flexdatalist -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-flexdatalist/2.2.4/jquery.flexdatalist.min.css" rel="stylesheet" type="text/css">


	<!-- jQuery CDN -->
		<script	script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
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
		<script src="<?= base_url('assets/select2/dist/js/select2.min.js') ?>"></script>

	<!-- sweetalert -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.3.5/sweetalert2.all.min.js" integrity="sha512-rQGS49+CfE3nYVbZ4JFwdUrwZwHMnvNz611lVFevMeKN8HG7z/Sep0K91rjMbL4da6VSmOxk4hSXrhK0M+nDnQ==" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.3.5/sweetalert2.min.css" integrity="sha512-NU255TKQ55xzDS6UHQgO9HQ4jVWoAEGG/lh2Vme0E2ymREox7e8qwIfn6BFem8lbahhU9E2IQrHZlFAxtKWH2Q==" crossorigin="anonymous" />

	<!-- flexdatalist -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-flexdatalist/2.2.4/jquery.flexdatalist.min.js"></script>



	<script>
    	var base_url = '<?= base_url() ?>' // Buat variabel base_url agar bisa di akses di semua file js
    </script>
</head>

<body>

    <div class="wrapper">
