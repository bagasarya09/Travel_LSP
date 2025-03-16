<?php
session_start();
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = "penumpang"; // Set default role

    // Query insert ke database
    $sql = "INSERT INTO users (nama, nama_lengkap, tanggal_lahir, jenis_kelamin, alamat, role, password) 
            VALUES ('$nama', '$nama_lengkap', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$role', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Registrasi berhasil! <a href='login.php'>Login di sini</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<form action="" method="POST">
    <input type="text" name="nama" placeholder="Nama" required><br>
    <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required><br>
    <input type="date" name="tanggal_lahir" required><br>
    <select name="jenis_kelamin">
        <option value="Laki-laki">Laki-laki</option>
        <option value="Perempuan">Perempuan</option>
    </select><br>
    <textarea name="alamat" placeholder="Alamat" required></textarea><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Daftar</button>
</form>