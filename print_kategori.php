<?php
    ob_start();
    include 'connection.php';

    $sql = "SELECT * FROM kategori;";

    $datas = $conn->query($sql);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        td {
            padding: 2px;
        }
    </style>

</head>
<body>
    <table>
        <tr>
            <th>ID Kategori</th>
            <th>Nama Kategori</th>
        </tr>
        <?php foreach($datas as $data): ?>
            <tr>
                <td><?php echo $data['id_kategori']; ?></td>
                <td><?php echo $data['kategori_berita']; ?></td>
        <?php endforeach; ?>
    </table>
</body>
</html>

<?php
    require './mpdf/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4',
        'margin_top' => 25,
        'margin_bottom' => 25,
        'margin_left' => 25,
        'margin_right' => 25
    ]);

    $html = ob_get_contents();

    ob_end_clean();
    $mpdf->WriteHTML(utf8_encode($html));

    $content = $mpdf->Output("cetak.pdf", "D");
?>