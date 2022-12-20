<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Edu News Admin Panel</title>
    <link href="./plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="./plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <link href="css/style.css" rel="stylesheet">

</head>

<body>
    <?php

        session_start();

        if(isset($_SESSION['status']) != "login"){
            header("location:/edu_news/admin/quixlab-master/index.php");
        }
        if(isset($_POST['submit_logout'])){
            session_destroy();
            header("location:/edu_news/admin/login.php");
        }

        if(isset($_POST['data_submit'])){
            $judul = $_POST['judul'];
            $date = $_POST['date'];
            $penulis = $_POST['penulis'];
            $gambar = $_POST['gambar'];
            $konten = $_POST['konten'];  
            $id_kategori = $_POST['id_kategori'];

            $servername = "localhost:8111";
            $database   = "edu-news";
            $username   = "root";
            $password   = "root";

            $conn = mysqli_connect($servername, $username, $password, $database);
        
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            
            //include '../../connection.php';
            $sql = "INSERT INTO berita (judul, date, penulis, gambar, konten, id_kategori) VALUES ('$judul', '$date', '$penulis', '$gambar', '$konten', $id_kategori);";
            $datas = $conn->query($sql);

            if (mysqli_affected_rows($conn) > 0) {
                header("Location:index_berita.php");
            } else{
                $_SESSION['error'] = "Menambah Data Gagal";
            }

        }
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
                        <!--<div class="row">-->
                            <!--<div class="col-12">-->
                                <div class="card">
                                    <div class="card-body pb-0 d-flex justify-content-between">
                                        <!--<div class="card">-->
                                            <div class="card-body">
                                                <h3 class="mb-5">Menambah Data Berita</h3>
                                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                                    <div class="mb-3">
                                                        <label for="judul" class="form-label">Judul Berita</label>
                                                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul Berita" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="date" class="form-label">Tanggal Upload</label>
                                                        <input type="text" class="form-control" id="date" name="date" placeholder="YYYY/MM/DD" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="penulis" class="form-label">Nama Penulis</label>
                                                        <input type="text" class="form-control" id="penulis" name="penulis" placeholder="Author" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="gambar" class="form-label">Gambar</label>
                                                        <input type="file" class="form-control" id="gambar" name="gambar" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="konten" class="form-label">Isi Konten Berita</label>
                                                        <textarea type="text" class="form-control" id="konten" name="konten" required></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="kategori" class="form-label">Kategori Berita</label>
                                                        <select class="form-select" aria-label="Default select example" name="id_kategori">
                                                            <option>Kategori</option>
                                                            <?php
                                                                $servername = "localhost:8111";
                                                                $database   = "edu_news";
                                                                $username   = "root";
                                                                $password   = "root";
                                                            
                                                                $conn = mysqli_connect($servername, $username, $password, $database);
                                                            
                                                                if (!$conn) {
                                                                    die("Connection failed: " . mysqli_connect_error());
                                                                }
                                                                $query = mysqli_query($conn, "SELECT * FROM kategori") or die (mysqli_error($conn));
                                                                while($data = mysqli_fetch_array($query)){
                                                                    echo "<option value=$data[id_kategori]>$data[kategori_berita]</option>";
                                                                }
                                                            ?>
                                                            <input type="text" class="form-control" id="id_kategori" name="id_kategori" placeholder="ID Kategori Berita" required>
                                                        </select>
                                                    </div>
                                                    <p style="color: red; font-size: 12px;"><?php if(isset($_SESSION['error'])){ echo($_SESSION['error']); } ?></p>
                                                    <button type="submit" name="data_submit" class="btn btn-primary button-blue my-3" style="color: white;">Save</button>
                                                </form>
                                            </div>
                                        <!--</div>-->
                                    </div>
                                </div>
                            <!--</div>-->
                        <!--</div>-->
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

    <?php
        unset($_SESSION['error']);
    ?>
</body>

</html>