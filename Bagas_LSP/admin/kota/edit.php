<?php

session_start();
require 'function.php';

if (!isset($_SESSION["nama"])) {
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '../../auth/login/index.php';
    </script>
    ";
}

$id = $_GET["id"];
$kota = query("SELECT * FROM kota WHERE id_kota = '$id'")[0];

if (isset($_POST["edit"])) {
    if (edit($_POST) > 0) {
        echo "
            <script type='text/javascript'>
                alert('Berhasil! data kota berhasil diedit!')
                window.location = 'index.php'
            </script>
        ";
    } else {
        echo "
            <script type='text/javascript'>
                alert('Gagall .. data kota gagal diedit')
                window.location = 'index.php'
            </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kota</title>
</head>

<body>
    <form action="" method="POST">
        <input type="hidden" name="id_kota" value="<?= $kota["id_kota"]; ?>">
        <label for="nama_kota">Nama Kota</label><br />
        <input type="text" name="nama_kota" id="nama_kota" class="form-control" value="<?= $kota["nama_kota"]; ?>"><br /> <br />

        <button type="submit" name="edit">Edit</button>
    </form>
</body>

</html>