<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu News</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    
</head>
<body>
<?php
    include 'connection.php';
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM berita WHERE id='$id'";
    $datas = $conn->query($sql);

    while ($data = mysqli_fetch_array($datas)) {
        $gambar = $data['gambar'];
        $judul = $data['judul'];
        $date = $data['date'];
        $penulis = $data['penulis'];
        $konten = $data['konten'];
        $id_kategori = $data['id_kategori'];
     }
?>

    <div class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="public.php">
                <h1 class="text-danger ms-5" style="font-size: 45px;">Edu News</h1>
                </a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="d-flex justify-content-end mb-4 mt-3 me-5">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active ms-2 me-2" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active ms-2 me-2" aria-current="page" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active ms-2 me-2" aria-current="page" href="#">Contact</a>
                    </li>
                    <div class="input-group">
                        <input type="search" class="form-control rounded me-1" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-outline-danger">search</button>
                    </div>
                </ul>
              </div>
            </div>
        </nav>

        <div class="container-fluid mt-5 d-flex justify-content-center" style="width: 1000px;">
            <img class="mb-3" src="https://cdn-oss.ginee.com/official/wp-content/uploads/2022/06/image-913.png" style="width: 600px;" alt="advertisement">
            <img class="mb-3" src="https://cdn-oss.ginee.com/official/wp-content/uploads/2022/06/image-912.png" style="width: 600px;" alt="advertisement">
        </div>

        <div class="container pb-3 mt-5 bg-white p-4 rounded-4">
            <div class="row">
                <div class="mt-3 mb-0">
                    <h1 class="text-center"><strong><?php echo $judul ?></strong></h1> <br>
                </div>
                <div class="ms-0 mt-0 mb-5">
                    <h6 class="text-center mb-0"><?php echo $penulis ?></h6>
                    <h6 class="text-center"><?php echo $date ?></h6>
                </div>
                <div class="d-flex justify-content-center">
                    <img class="d-flex justify-content-center mb-3" style="width: 1000px;" src="admin/quixlab-master/gambar/<?php echo $gambar ?>">
                </div>
                <div class="ms-0 mt-3 mb-3">
                    <p class="h6 text-justify">
                    <?php echo nl2br($konten) ?>
                </div>
                <div>
                    <h5><br><i>Edu News's <?php echo $penulis ?> contributed to this report</i></h6>
                </div>
            </div>
        </div>
            <div class="container cards mt-5 mb-5">
                <div class="row">
                    <div class="ms-0 mt-3 mb-0">
                        <h6>Rekomendasi</h6>
                    </div>
                    <div class="d-flex justify-content-between">
                        <a href="#">
                            <div class="card" style="width:350px; height:350px" >
                                <img class="card-img-top" src="https://akcdn.detik.net.id/community/media/visual/2022/05/25/logo-goto-1_169.jpeg?w=700&q=90" alt="Card image" style="width:100%">
                                <div class="card-body">
                                    <h4 class="card-title">Saham GoTo Anjlok Lagi, Mendarat di Rp 123</h4>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="card" style="width:350px; height:350px" >
                                <img class="card-img-top" src="https://akcdn.detik.net.id/community/media/visual/2022/12/05/penampakan-aliran-lahar-semeru-di-desa-supit-urang-3.jpeg?w=700&q=90" alt="Card image" style="width: 100%; height: 195px;">
                                <div class="card-body">
                                    <h4 class="card-title">Gunung Semeru Erupsi, Terkait Gempa Cianjur dan Garut?</h4>
                                </div>
                            </div>
                        </a>
                        <a href="#">
                            <div class="card" style="width:350px; height:350px" >
                            <img class="card-img-top" src="https://akcdn.detik.net.id/community/media/visual/2022/10/27/wuling-serahkan-300-unit-air-ev-kepada-kementerian-sekretariat-negara-untuk-mendukung-ktt-g20-bali-2.jpeg?w=700&q=90" alt="Card image" style="width:100%">
                                <div class="card-body">
                                    <h4 class="card-title">Dijual Lebih Murah, Wuling Air ev Bekas KTT G20 Ludes!</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>             
        </div>          
    

        <footer class="bd-footer" style="background-color: rgb(220,53,69); color: #f9f9f9;">
            <div class="container py-2 py-md-3 px-2 px-md-1">
                <div class="row mb-0">
                    <div class="col-lg-3 mb-3">
                        <a href="public.php">
                            <img class="navbar-brand" src="../edu_news.png" style="width: 180px;">
                        </a>
                        <ul class="list-unstyled text-white">
                            <li class="mt-3">+62 857 1000 2811</li>
                            <li class="">Tangerang, Indonesia</li>
                        </ul>
                    </div>
                    <div class="col-9">
                        <div class="row d-flex justify-content-end">
                            <div class="col-2">
                                <a class="nav-link text-white" href="#">Beranda</a>
                            </div>
                            <div class="col-2">
                                <a class="nav-link text-white" href="#">Berita</a>
                            </div>
                            <div class="col-2">
                                <a class="nav-link text-white" href="#">About Us</a>
                            </div>
                            <div class="col-2">
                                <a class="nav-link text-white" href="#">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-0">
                    <p class="text-center text-white">© 2022 Edu News. All Rights Reserved</p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>