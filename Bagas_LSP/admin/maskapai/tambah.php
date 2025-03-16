<?php
require '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_maskapai = $_POST["nama_maskapai"];
    $kapasitas = $_POST["kapasitas"];

    $query = "INSERT INTO maskapai (nama_maskapai, kapasitas) VALUES ('$nama_maskapai', '$kapasitas')";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Maskapai</title>
</head>

<body>
    <h1>Tambah Maskapai</h1>
    <form action="" method="POST">
        <label for="nama_maskapai">Nama Maskapai</label>
        <input type="text" name="nama_maskapai" required>
        <label for="kapasitas">Kapasitas : </label>
        <input type="number" name="kapasitas" required>
        <br>
        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">Kembali</a>
</body>

</html>