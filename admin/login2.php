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
    session_start();

    if(isset($_SESSION['status']) && $_SESSION['status'] === "login"){
        header("location:/study_case/admin/dashboard.php");
        die();
    }

    include '../edu_news/connection.php';

    if(isset($_POST['username']) && $_POST['password']){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admins WHERE username='$username' and password='$password'";
        $data = $conn->query($sql);

        $check = mysqli_num_rows($data);

        if(isset($_POST['submit'])){
            if($check != 0){
                $_SESSION['username'] = $username;
                $_SESSION['status'] = "login";
                header("location:/study_case/admin/dashboard.php");
                die();
            } else{
                $_SESSION['error'] = "Gagal login, Silahkan Cek Kembali Username dan Password Anda!";
            }
        }
    }

    ?>
    
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center text-dark mt-5">Admin Login</h2>
                <h3 class="text-center mb-5 text-dark" style="font-color=">Edu News</h3>
                <div class="card my-5">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="card-body cardbody-color p-lg-5">
                        <div class="text-center">
                        <img src="../edu_news2.png" class="img-fluid profile-image-pic rounded-circle my-3" width="200px" alt="profile">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" required placeholder="Username">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <p style="color:red; font-size:12px;"><?php if(isset($_SESSION['error'])){ echo($_SESSION['error']); } ?></p>
                        <div class="text-center">
                            <button type="submit" name="submit" class="btn btn-danger px-5 mb-5 w-100">Login</button>
                        </div>
                        <div id="emailHelp" class="form-text text-center mb-4 text-dark">
                            Not Registered?
                            <a href="#" class="text-dark fw-bold">Create an Account</a>
                            <br><br>
                            <a href="#" class="text-dark fw-bold">Back To Home</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
        unset($_SESSION['error']);
    ?>
</body>
</html>