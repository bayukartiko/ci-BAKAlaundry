<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>BAKA Laundry</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <style>
        /*
            DEMO STYLE
        */

        @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
        body {
            font-family: 'Poppins', sans-serif;
            background: #dfe6e9;
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
            height: 81.5px;
            padding: 15px 10px;
            background: #fff;
            border: none;
            border-radius: 0;
            margin-bottom: 40px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
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
            border-right: 1px solid #1E272E;
            border-left: 1px solid #1E272E;
            border-top: 3px solid #1E272E;
            border-bottom: 3px solid #1E272E;
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
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: #485460;
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

        .dropdown-toggle::after {
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

        /* a.download {
            background: #fff;
            color: #7386D5;
        } */

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
            height: 100%;
            padding: 15px;
            text-align: center;
        }

        /* #content.active {
            width: 100%;
        } */

        /* ---------------------------------------------------
            MEDIAQUERIES
        ----------------------------------------------------- */

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
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.7/css/rowReorder.bootstrap4.min.css">

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>BAKA Laundry</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <!-- <p>
                        <img src="imgnotfound.png" alt="" srcset="" style="border-radius: 50%; width: 50px; height: 50px;">
                        <i class="fas fa-user-circle"></i>
                        Bayu Kartiko
                        Administrator
                    </p> -->
                    <a href="#profilSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <!-- <i class="fas fa-user-circle"></i> -->
                        <img src="img/imgnotfound.png" alt="" srcset="" style="border-radius: 50%; width: 50px; height: 50px;">
                        Bayu Kartiko
                        <p class="text-muted">Administrator</p>
                    </a>
                    <ul class="collapse list-unstyled" id="profilSubmenu">
                        <li>
                            <a href="#">Ubah Profil</a>
                        </li>
                        <li>
                            <a href="#">Ubah Password</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('BAKAcontrol/index'); ?>">Logout</a>
                        </li>
                    </ul>
                </li>
                <br>
                <li>
                    <a href="<?php echo site_url('BAKAcontrol/home'); ?>"><i class="fas fa-home"></i> Dashboard</a>
                </li>
                <li>
                    <a href="#manajemenUserSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="fas fa-user"></i> Manajemen User</a>
                    </a>
                    <ul class="collapse list-unstyled" id="manajemenUserSubmenu">
                        <li>
                            <a href="<?php echo site_url('BAKAcontrol/m_admin'); ?>">Admin</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('BAKAcontrol/m_kasir'); ?>">Kasir</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('BAKAcontrol/m_owner'); ?>">Owner</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo site_url('BAKAcontrol/m_laundry'); ?>"><i class="fas fa-th-list"></i> Manajemen Laundry</a>
                </li>
                <li>
                    <a href="<?php echo site_url('BAKAcontrol/m_outlet'); ?>"><i class="fas fa-money-bill-alt"></i> Manajemen Outlet</a>
                </li>
                <li>
                    <a href="<?php echo site_url('BAKAcontrol/laporan'); ?>"><i class="fas fa-chart-line"></i> Laporan</a>
                </li>
            </ul>

            <ul class="list-unstyled tentang">
                <a href="#" class="btn btn-outline-info"><i class="fas fa-book"></i> Tentang Website ini</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
                <div class="container-fluid">
                    nanti disini untuk Breadcrumb
                </div>
            </nav> -->

            <div class="isi">
                   <h1>BAKA Laundry</h1>
                   <h5>hanya website tugas</h5>
                   <br><br>
                   Terima Kasih kepada:
                   <br><br>
                   <a href="https://getbootstrap.com/" target="_blank">Bootstrap</a>
                   <br>
                   <a href="https://flatuicolors.com/" target="_blank">Flat UI Colors</a>
                   <br>
                   <a href="https://fontawesome.com/" target="_blank">Font Awesome</a>
                   <br>
                   <a href="https://fonts.google.com/" target="_blank">Google Fonts</a>
                   <br>
                   <a href="https://codeigniter.com/" target="_blank">CodeIgniter</a>
                   <br>
                   <a href="https://themes.getbootstrap.com/" target="_blank">Sumber refrensi layout :D</a>
            </div>
    </div>
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

    <script type="text/javascript">
        $(document).ready(function () {
            // $("#sidebar").mCustomScrollbar({
            //     theme: "minimal"
            // });

            // $('#sidebarCollapse').on('click', function () {
            //     $('#sidebar, #content').toggleClass('active');
            //     $('.collapse.in').toggleClass('in');
            //     $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            // });

            $('#example').DataTable( {
                rowReorder: true
            } );
        });
    </script>
</body>

</html>
