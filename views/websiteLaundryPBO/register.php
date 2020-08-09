<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

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

        .form-daftar {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }
        .form-daftar .checkbox {
            font-weight: 400;
        }
        .form-daftar .form-control {
            position: relative;
            box-sizing: border-box;
            height: auto;
            padding: 10px;
            font-size: 16px;
        }
        .form-daftar .form-control:focus {
            z-index: 2;
        }
        .form-daftar input[type="text"],
        .form-daftar input[type="email"],
        .form-daftar input[type="password"],
        .form-daftar input[type="number"],
        .form-daftar textarea {
            /* width: 150px; */
            margin: auto;
            margin-top: 15px;
            margin-bottom: -1px;
            border-radius: 50px;
            text-align: center;
        }
		.form-daftar input[type="submit"]{
			margin: auto;
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

    <title>Daftar BAKA Laundry</title>
  </head>
  <body class="text-center">
      <div class="container">
          <form class="form-daftar" method="POST" action="<?= base_url('BAKAcontrol/registrasi') ?>">
                <h1 class="h3 mb-3 font-weight-normal">BAKA Laundry</h1>
                <h4>Daftar</h4>
              <br>

                <label for="inputNamaPengguna" class="sr-only">Nama Pengguna</label>
				<input type="text" id="inputNamaPengguna" name="nama" class="form-control" placeholder="Nama Pengguna" value="<?= set_value('nama'); ?>">
				<?= form_error('nama', '<small class="text-danger">', '</small>'); ?>

                <label for="inputEmailPengguna" class="sr-only">Email</label>
				<input type="email" id="inputEmailPengguna" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
				<?= form_error('email', '<small class="text-danger">', '</small>'); ?>

                <label for="inputSandi1" class="sr-only">Kata Sandi</label>
                <input type="password" id="inputSandi1" name="password" class="form-control" placeholder="Kata Sandi">
				<span toggle="#inputSandi1" class="far fa-eye ikon-mata lihat-password"></span>
				<?= form_error('password', '<small class="text-danger">', '</small>'); ?>

                <label for="inputSandi2" class="sr-only">Konfirmasi Kata Sandi</label>
                <input type="password" id="inputSandi2" name="konfirmasiPassword" class="form-control" placeholder="Konfirmasi Kata Sandi">
                <span toggle="#inputSandi2" class="far fa-eye ikon-mata lihat-konfirmasi-password"></span>

                <br>

              <input type="submit" class="btn tombolDaftar btn-lg btn-primary btn-block" value="Daftar">
              <hr>
                <p class="mt-5 mb-3">Sudah Punya Akun ??.. <a href="<?php echo site_url('BAKAcontrol/index'); ?>">Masuk</a></p>
          </form>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- font awesome -->
    <script src="https://kit.fontawesome.com/58da37be9c.js" crossorigin="anonymous"></script>

    <script>
        $(".lihat-password").click(function() {

            $(this).toggleClass("fas fa-eye-slash");
            var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
        });
        $(".lihat-konfirmasi-password").click(function() {

            $(this).toggleClass("fas fa-eye-slash");
            var input = $($(this).attr("toggle"));
                if (input.attr("type") == "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
        });
    </script>

  </body>
</html>
