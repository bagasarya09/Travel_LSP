<?php
session_start();
require 'function.php';

if (!isset($_SESSION["nama"])) {
    echo "
    <script type='text/javascript'>
        alert('Silahkan login terlebih dahulu, ya!');
        window.location = '../../auth/login.php';
    </script>
    ";
}

$kota = query("SELECT * FROM kota");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kots</title>
</head>

<body>
    <h1>Halaman Data kota</h1>
    <a href="tambah.php">Tambah Kota</a>

    <table border="1" callspacing="0" callpadding="10">
        <tr>
            <th>No</th>
            <th>Nama Kota</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach ($kota as $data) : ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $data["nama_kota"]; ?></td>
                <td> <a href="edit.php?id=<?= $data["id_kota"]; ?>">Edit</a>
                    <a href="hapus.php?id=<?= $data["id_kota"]; ?>" onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</a>
                </td>
            </tr>
            <?php $no++; ?>
        <?php endforeach ?>
    </table>
</body>

</html>