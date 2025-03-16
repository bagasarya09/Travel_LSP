<?php
require '../../koneksi.php';

$query = "SELECT * FROM maskapai";
$result = mysqli_query($conn, $query);

$data_maskapai = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data_maskapai[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Data Maskapai</title>
</head>

<body>
    <h1>Data Maskapai</h1>
    <a href="tambah.php">Tambah Data</a>
    <table border="1">
        <tr>
            <th>ID Maskapai</th>
            <th>Nama Maskapai</th>
            <th>Kapasitas</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($data_maskapai as $maskapai) { ?>
            <tr>
                <td><?php echo $maskapai['id_maskapai']; ?></td>
                <td><?php echo $maskapai['nama_maskapai']; ?></td>
                <td><?php echo $maskapai['kapasitas']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $maskapai['id_maskapai']; ?>">Edit</a>
                    <a href="hapus.php?id=<?php echo $maskapai['id_maskapai']; ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>