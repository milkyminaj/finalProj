<?php
    include '../../connection.php';

    $id_kategori = $_GET['id'];
    $sql = "DELETE FROM kategori WHERE id='$id_kategori'";
    $datas = $conn->query($sql);


    if (mysqli_affected_rows($conn) > 0) {
        header("Location:index_kategori.php");
    } else {
        $_SESSION['error'] = "Menghapus Data Gagal!";
    }
?>