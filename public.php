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

    <style>
        .carousel-inner img {
            width: 100%;
            height: 100%;
        }

        /* Declare heights because of positioning of img element */
        .carousel-item {
        height: 32rem;
        }

        .carousel-item > img {
        position: absolute;
        top: 0;
        left: 0;
        min-width: 100%;
        height: 32rem;
        }
    
    </style>
    
</head>
<body>
    <?php
    include 'connection.php';

    $sql = "SELECT * FROM berita
            JOIN kategori ON berita.id_kategori = kategori.id_kategori";

    if (isset($_POST['filter_submit'])) {
        if ($_POST['kategori'] !== "") {
        $sql = "SELECT * FROM berita 
        JOIN kategori ON berita.id_kategori =  kategori.id_kategori                 
        WHERE berita.id_kategori = " . $_POST['kategori'];
        }
    }

    $datas = $conn->query($sql);
    $kategori_sql = "SELECT * FROM kategori";
    $kategoris = $conn->query($kategori_sql);

    ?>

    <div class="bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <a class="navbar-brand" href="public.php">
                <h1 class="text-danger" style="font-size: 45px;">Edu News</h1>
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


        <div class="container mt-5 d-flex justify-content-center" style="width: 1000px;">
            <img class="mb-3" src="https://cdn-oss.ginee.com/official/wp-content/uploads/2022/06/image-913.png" style="width: 400px;" alt="advertisement">
            <img class="mb-3" src="https://cdn-oss.ginee.com/official/wp-content/uploads/2022/06/image-912.png" style="width: 400px;" alt="advertisement">
        </div>

        <div class="container mt-2" style="width: 1000px;">
            <div id="demo" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo" data-slide-to="0" class="active"></li>
                    <li data-target="#demo" data-slide-to="1"></li>
                    <li data-target="#demo" data-slide-to="2"></li>
                </ul>
                
                <!-- The slideshow -->
                <div class="carousel-inner" >
                    <div class="carousel-item active">
                        <img src="../carousel-1.png">
                    </div>
                    <div class="carousel-item">
                        <a href="#">
                            <img src="https://dynaimage.cdn.cnn.com/cnn/q_auto,w_1349,c_fill,g_auto,h_759,ar_16:9/http%3A%2F%2Fcdn.cnn.com%2Fcnnnext%2Fdam%2Fassets%2F221203032228-william-kate-green-carpet-221202.jpg" width="1100" height="500">
                            <div class="carousel-caption">
                                <h3>Kate wears Princess Diana emerald choker to Earthshot Prize Awards</h3>
                            </div>
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="#">
                            <img src="https://media.cnn.com/api/v1/images/stellar/prod/221204022830-01-semeru-volcano-221204.jpg?c=16x9&q=h_720,w_1280,c_fill" width="1100" height="500">
                            <div class="carousel-caption">
                                <h3>Indonesia raises alert after Mount Semeru volcano erupts</h3>
                            </div>
                        </a>
                    </div>
                </div>
                
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo" data-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </a>
                <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </a>
            </div>
        </div>
        
        <section>
            <div class="container">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="py-5 mt-5">
                        <div class="row d-flex justify-content-center mb-0">
                            <div class="col-4">
                                <select class="form-select" aria-label="Default select example" name="kategori">
                                    <option value="" selected>Kategori</option>
                                    <?php foreach($kategoris as $kategori): ?>
                                        <option value="<?php echo($kategori['id_kategori']) ?>"><?php echo($kategori['kategori_berita']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-1">
                                <button type="submit" name="filter_submit" class="rounded-pill btn btn-danger">Cari</button>
                            </div>
                        </div>
                    </div>
                </form>

                <?php foreach($datas as $data): ?>
                <div class="container pb-5 mt-0">
                        <div class="bg-white border p-4 rounded-4">
                            <div class="row">
                                <div class="col-2 text-center">
                                    <img class="mb-3" style="max-height: 120px;" src="admin/quixlab-master/gambar/<?php echo $data['gambar']; ?>">
                                </div>
                                <div class="col ms-5">
                                        <h3 class="ms-3 mt-3 mb-0"><strong><?php echo $data['judul']; ?></strong></h3>
                                        <p class="ms-3 mt-2"><?php echo $data['penulis']; ?></p>
                                        <a class="ms-3 btn btn-danger" href="detail.php?id=<?=$data['id']?>"> Baca Selengkapnya ></a>
                                </div>
                            </div>
                        </div>
                </div>
                <?php endforeach; ?>


            </div>
        </section>
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