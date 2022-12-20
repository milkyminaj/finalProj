<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edu News Admin Panel</title>
    <!-- Favicon icon -->
    <!-- Pignose Calender -->
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <?php

    $servername = "localhost:8111";
    $database   = "edu-news";
    $username   = "root";
    $password   = "root";

    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    session_start();

    if(isset($_SESSION['status']) != "login"){
        header("location:/edu_news/admin/quixlab-master/index.php");
    }
    if(isset($_POST['submit_logout'])){
        session_destroy();
        header("location:/edu_news/admin/login.php");
    }

    //include '../connection.php';

    $sql = "SELECT * FROM berita";
    $datas = $conn->query($sql);
    ?>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div>

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 mt-3 ms-5 flex-wrap flex-md-nowrap justify-content-between">
                <a class="navbar-brand" href="index.php">
                    <h1>Admin Panel</h1>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down animated flipInX d-md-none">
                            <form action="#">
                                <input type="text" class="form-control" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown d-none d-md-flex">
                            <a href="javascript:void(0)" class="log-user" data-toggle="dropdown">
                                <span>Selamat Datang, <?php echo($_SESSION['username']) ?></span>  <i class="fa fa-angle-down f-s-14" aria-hidden="true"></i>
                            </a>
                            <div class="drop-down dropdown-language animated fadeIn  dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <form id="logout_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                                <button class="btn btn-danger" type="submit_logout" name="submit_logout">Logout</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./index.html">Home 1</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Layouts</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="./index_berita.php">Berita</a></li>
                            <li><a href="./index_kategori.php">Kategori</a></li>                  
                        </ul>
                    </li>
                    <li class="nav-label">Apps</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-envelope menu-icon"></i> <span class="nav-text">Email</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="#">Inbox</a></li>
                            <li><a href="#">Read</a></li>
                            <li><a href="#">Compose</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                

                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body pb-0 d-flex justify-content-between">
                                        <div>
                                            <h3 class="mb-3">Daftar Berita</h3>
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">Thumbnail</th>
                                                        <th scope="col">Judul</th>
                                                        <th scope="col">Tanggal Upload</th>
                                                        <th scope="col">Penulis</th>
                                                        <th scope="col">Konten Berita</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach ($datas as $key => $data) {
                                                            echo '
                                                                <tr>
                                                                    <td>'.($key+1).'</td>
                                                                    <td style="text-align: center;"><img src="gambar/'.$data['gambar'].'" style="width: 120px;"></td>
                                                                    <td>'.$data['judul'].'</td>
                                                                    <td>'.$data['date'].'</td>
                                                                    <td>'.$data['penulis'].'</td>
                                                                    <td><p class="d-inline-block text-truncate" style="max-width: 500px;">'.$data['konten'].'</p></td>
                                                                    <td>
                                                                        <ul>
                                                                            <li><a href="show_berita.php?id='.$data['id'].'" class="btn btn-primary button-blue mb-2" style="color=white;">Lihat</a></li>
                                                                            <li><a href="edit_berita.php?id='.$data['id'].'" class="btn btn-primary button-blue mb-2" style="color=white;">Edit</a></li>
                                                                            <li><a href="delete_berita.php?id='.$data['id'].'" class="btn btn-primary button-blue" style="color=white;">Hapus</a></li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                            ';
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <a href="create_berita.php" class="btn btn-primary mb-4" style="color:white;">Tambah Berita</a>
                                            <a href="../../print_berita.php" class="btn btn-primary mb-4" style="color:white;">Cetak Daftar Berita</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                
        <!--**********************************
            Content body end
        ***********************************-->
        
        
        <!--**********************************
            Footer start
        ***********************************-->
        <footer class="pt-5 d-flex justify-content-between">
            <span>Copyright 2022 <a href="#">Edu News</a></span>
            <ul class="nav m-0">
                <li class="nav-item">
                    <a class="nav-link text-secondary "href="#">Hubungi Kami</a>
                </li>
            </ul>
        </footer>
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="plugins/common/common.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/gleek.js"></script>
    <script src="js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="./plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="./plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="./plugins/d3v3/index.js"></script>
    <script src="./plugins/topojson/topojson.min.js"></script>
    <script src="./plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="./plugins/raphael/raphael.min.js"></script>
    <script src="./plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="./plugins/moment/moment.min.js"></script>
    <script src="./plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="./plugins/chartist/js/chartist.min.js"></script>
    <script src="./plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src="./js/dashboard/dashboard-1.js"></script>
</body>

</html>