<?php
include '../../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_maskapai = $_POST['id_maskapai'];
    $nama_maskapai = $_POST['nama_maskapai'];
    $kapasitas = $_POST['kapasitas'];

    $query = "UPDATE maskapai SET nama_maskapai='$nama_maskapai', kapasitas='$kapasitas' WHERE id_maskapai='$id_maskapai'";
    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

$id = $_GET['id'];
$query = "SELECT * FROM maskapai WHERE id_maskapai='$id'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Data Maskapai</title>
</head>

<body>
    <h1>Edit Data Maskapai</h1>
    <form method="POST">
        <input type="hidden" name="id_maskapai" value="<?php echo $row['id_maskapai']; ?>">
        <label for="nama_maskapai">Nama Maskapai:</label>
        <input type="text" name="nama_maskapai" value="<?php echo $row['nama_maskapai']; ?>" required>
        <br>
        <label for="kapasitas">Kapasitas:</label>
        <input type="number" name="kapasitas" value="<?php echo $row['kapasitas']; ?>" required>
        <br>
        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">Kembali</a>
</body>

</html>