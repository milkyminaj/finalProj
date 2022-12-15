<?php
    include '../../connection.php';
    $id = $_GET['id'];
    $sql = "DELETE FROM berita WHERE id='$id'";
    $datas = $conn->query($sql);

    if (mysqli_affected_rows($conn) > 0) {
        header("Location:index_berita.php");
    } else {
        $_SESSION['error'] = "Menghapus Data Gagal!";
    }
?>