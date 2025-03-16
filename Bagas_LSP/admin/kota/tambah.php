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

if (isset($_POST["tambah"])) {
    if (tambah($_POST) > 0) {
        echo "
            <script type='text/javascript'>
                alert('Berhasil! data kota berhasil ditambahkan!')
                window.location = 'index.php'
            </script>
        ";
    } else {
        echo "
            <script type='text/javascript'>
                alert('Gagal data kota gagal ditambahkan')
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
    <title>Tambah Kota</title>
</head>

<body>
    <form action="" method="POST">
        <label for="nama_kota">Nama Kota</label>
        <input type="text" name="nama_kota" id="nama_kota" class="form_control"> <br> <br>

        <button type="submit" name="tambah">Tambah</button>
    </form>
</body>

</html>