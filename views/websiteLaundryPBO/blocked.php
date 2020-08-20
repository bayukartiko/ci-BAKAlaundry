<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<title>BAKA Laundry | 403</title>
	<style>
		@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
		body,html{
			margin: 0;
			padding: 0;
			height: 100%;
			overflow: hidden;
			font-family: 'Poppins', sans-serif;
            background: #dfe6e9;
		}
		.isiblock{
			z-index: 1;
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			text-align: center;
			padding: 10px;
			min-width: 300px;
        }
	</style>
  </head>
  <body>
    <div class="isiblock">

		<h1>403</h1>
		<h3>Akses dilarang !</h3>
		<?php if($this->session->userdata('role') == 'admin'){ ?>
			<a href="<?= site_url('AdminControl/home'); ?>" class="btn btn-danger">Kembali</a>
		<?php }elseif($this->session->userdata('role') == 'kasir'){ ?>
			<a href="<?= site_url('KasirControl/home'); ?>" class="btn btn-danger">Kembali</a>
		<?php }elseif($this->session->userdata('role') == 'owner'){ ?>
			<a href="<?= site_url('OwnerControl/home'); ?>" class="btn btn-danger">Kembali</a>
		<?php } ?>
	</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
