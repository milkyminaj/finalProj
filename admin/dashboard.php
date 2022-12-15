<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDU NEWS</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>

<body>

<nav class="navbar navbar-light bg-light p-3">
    <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
        <a class="navbar-brand" href="#">
            Admin Panel
        </a>
        <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
    <div class="col-12 col-md-4 col-lg-2">
        <input class="form-control form-control-dark" type="text" placeholder="Search" aria-label="Search">
    </div>
    <div class="col-12 col-md-5 col-lg-8 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
        <div>
            <form id="logout_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <button class="btn btn-danger" type="submit" name="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <i class="fa-solid fa-home px-2"></i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/study_case/admin/users">
                            <i class="fa-solid fa-user px-2"></i>
                            <span>Pengguna</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">
                            <i class="fa-solid fa-home px-2"></i>
                            <span>Pesawat</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">
                            <i class="fa-solid fa-plane-departure px-2"></i>
                            <span>Penerbangan</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Overview</li>
                </ol>
            </nav>
            <h1 class="h2">Beranda</h1>
            <p>dhsfhkjfhekjfhjkdhfjksdhfjhjskdfkh</p>

            <div class="row my-4">
                <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="card">
                        <h5 class="card-header">Data 1</h5>
                        <div class="card-body">
                            <h5 class="card-title">Deskripsi</h5>
                            <p class="card-text">Lorem Ipsum dolor</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="card">
                        <h5 class="card-header">Data 2</h5>
                        <div class="card-body">
                            <h5 class="card-title">Deskripsi</h5>
                            <p class="card-text">Lorem Ipsum dolor</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="card">
                        <h5 class="card-header">Data 3</h5>
                        <div class="card-body">
                            <h5 class="card-title">Deskripsi</h5>
                            <p class="card-text">Lorem Ipsum dolor</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
                    <div class="card">
                        <h5 class="card-header">Data 4</h5>
                        <div class="card-body">
                            <h5 class="card-title">Deskripsi</h5>
                            <p class="card-text">Lorem Ipsum dolor</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-lg-0">
                    <div class="card">
                        <h5 class="card-header">Data Penerbangan</h5>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nomor Penerbangan</th>
                                            <th scope="col">Pesawat</th>
                                            <th scope="col">Waktu Penerbangan</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">537</th>
                                            <td>Boeing 737 (A320)</td>
                                            <td>1 Agustus 2022 (05:00)</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">Lihat</a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">537</th>
                                            <td>Boeing 737 (A320)</td>
                                            <td>1 Agustus 2022 (05:00)</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">Lihat</a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">537</th>
                                            <td>Boeing 737 (A320)</td>
                                            <td>1 Agustus 2022 (05:00)</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">Lihat</a></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">537</th>
                                            <td>Boeing 737 (A320)</td>
                                            <td>1 Agustus 2022 (05:00)</td>
                                            <td><a href="#" class="btn btn-sm btn-primary">Lihat</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <a href="#" class="btn btn-block btn-light">Lihat Semua</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-4">
                    <div class="card">
                        <h5 class="card-header">Data Penerbangan</h5>
                        <div class="card-body">
                            <div id="flight-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="pt-5 d-flex justify-content-between">
                        <span>Copyright 2022 <a href="#">Edu Airlines</a></span>
                        <ul class="nav m-0">
                            <li class="nav-item">
                                <a class="nav-link text-secondary "href="#">Hubungi Kami</a>
                            </li>
                        </ul>
                    </footer>    
        </main>
    </div>
</div>

<script src="https://cdnjs.cloudfare.com/ajax/libs/popper.js/2.11.5/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudfare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudfare.com/ajax/libs/font-awesome/6.1.2/js/fontawesome.min.js"></script>
<script src="https://cdn.jsdeliver.net/chartist.js/latest/chartist.min.js"></script>

<script>
    new Chartist.Line('#flight-chart', {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        serier:[
            [288, 250, 193, 349, 567, 646]
        ]
    });
</script>
</body>
</html>


