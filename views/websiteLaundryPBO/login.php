<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/img/apple-touch-icon.png')?>">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/favicon-32x32.png')?>">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/img/favicon-16x16.png')?>">
	<link rel="manifest" href="<?= base_url('assets/img/site.webmanifest')?>">
	
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />

    <style>
        html, body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #DFE6E9;
        }
        .container{
            background-color: #E8F0FE;
            border-top: 3px solid #34495e;
            border-bottom: 3px solid #34495e;
            /* color: #b2bec3; */  
            border-radius: 15px;
            box-shadow: 10px 10px 8px #888888;
            width: 35%;
        }

        .form-masuk {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
        .form-masuk .checkbox {
            font-weight: 400;
        }
        .form-masuk .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-masuk .form-control:focus {
            z-index: 2;
        }
        .form-masuk input[type="email"],
        .form-masuk input[type="text"] {
            /* width: 150px; */
            margin: auto;
            margin-top: 15px;
            margin-bottom: -1px;
            border-radius: 50px;
            text-align: center;
        }
        /* input[type="text"]:focus{
            width: 300px;
            transition: 0.5s;
        } */

        .form-masuk input[type="password"] {
            /* width: 150px; */
            margin: auto;
            margin-top: 15px;
            margin-bottom: -1px;
            border-radius: 50px;
            text-align: center;
        }
        /* input[type="password"]:focus{
            width: 300px;
            transition: 0.5s;
        } */
		.form-masuk input[type="submit"]{
			margin: auto;
			margin-top: 25px;
			border-radius: 50px;
			width: 50%;
		}
        .ikon-mata{
            float: right;
            margin-right: 20px;
            margin-top: -30px;
            position: relative;
            z-index: 2;
        }
    </style>

    <title>Masuk Laundry</title>
  </head>
  <body class="text-center">
      <div class="container">
          <form class="form-masuk" method="POST" action="<?= base_url('BAKAcontrol/aksi_login') ?>">
                <h1 class="h3 mb-3 font-weight-normal">BAKA Laundry</h1>
                <h4>Masuk</h4>
			  <br>
				<?php if($this->session->flashdata('sukses')) {  ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('sukses') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php }elseif($this->session->flashdata('gagal')) { ?>
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<?= $this->session->flashdata('gagal') ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php } ?>
			  
                <label for="inputUsernamePengguna" class="sr-only">Nama Pengguna</label>
				<input type="text" id="inputUsernamePengguna" class="form-control" name="username" placeholder="Nama Pengguna (username)" value="<?= set_value('username') ?>">
				<?= form_error('username', '<small class="text-danger">', '</small>'); ?>

                <label for="inputSandi" class="sr-only">Kata Sandi</label>
				<input type="password" id="inputPassword" class="form-control" name="password" placeholder="Kata Sandi (password)"> 
				<div class="lihat-password">
					<span toggle="#inputPassword" class="ikon-mata far fa-eye"></span>
				</div>
				<?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                <!-- <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Ingat Saya
                    </label>
                </div> -->
                <input type="submit" class="btn tombolMasuk btn-lg btn-primary btn-block" value="Masuk">
                <hr>
                <!-- <br>
                <del><a href="#">Lupa Password ?</a></del>
                <br>
                <del> <a href="#" style="margin-top: 10px; margin-bottom: 5px;">Buat akun baru</a> </del> -->
          </form>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/js/all.min.js" integrity="sha512-YSdqvJoZr83hj76AIVdOcvLWYMWzy6sJyIMic2aQz5kh2bPTd9dzY3NtdeEAzPp/PhgZqr4aJObB3ym/vsItMg==" crossorigin="anonymous"></script>
		<!-- font awesome kit -->
		<script src="https://kit.fontawesome.com/58da37be9c.js" crossorigin="anonymous"></script>

    <script>
	$(document).ready(function(){
		$('.lihat-password').click(function(){
			$(this).children().toggleClass('far fa-eye far fa-eye-slash');
			let input = $(this).prev();
			input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
		});
	});
    </script>

  </body>
</html>
