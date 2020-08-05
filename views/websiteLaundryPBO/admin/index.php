<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

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
        .ikon-mata{
            float: right;
            margin-right: 20px;
            margin-top: -30px;
            position: relative;
            z-index: 2;
        }
        .form-masuk .tombolMasuk{
            width: 50%;
            border-radius: 50px;
            margin-top: 50px;
            margin-left: 25%;
            margin-right: 25%;
        }
    </style>

    <title>Masuk BAKA Laundry</title>
  </head>
  <body class="text-center">
      <div class="container">
          <form class="form-masuk">
                <h1 class="h3 mb-3 font-weight-normal">BAKA Laundry</h1>
                <h4>Masuk</h4>
              <br>
                <label for="inputNamaPengguna" class="sr-only">Nama Pengguna</label>
                <input type="text" id="inputNamaPengguna" class="form-control" placeholder="Nama Pengguna" required autofocus>
                <label for="inputSandi" class="sr-only">Kata Sandi</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Kata Sandi" required> <span toggle="#inputPassword" class="far fa-eye ikon-mata lihat-password"></span>
                <!-- <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Ingat Saya
                    </label>
                </div> -->
                <a href="<?php echo site_url('BAKAcontrol/home'); ?>" class="btn tombolMasuk btn-lg btn-primary btn-block" type="submit">Masuk</a>
                <hr>
                <br>
                <a href="#">Lupa Password ?</a>
                <br>
                <a href="<?php echo site_url('BAKAcontrol/register'); ?>" style="margin-top: 10px; margin-bottom: 5px;">Buat akun baru</a>
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
    </script>

  </body>
</html>
