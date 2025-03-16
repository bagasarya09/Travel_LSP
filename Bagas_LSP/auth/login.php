<?php
session_start();
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE nama='$nama'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['nama'] = $user['nama'];
        $_SESSION['role'] = $user['role'];

        // Role-based redirect
        if ($user['role'] == 'admin') {
            header("Location: ../admin/index.php");
        } elseif ($user['role'] == 'petugas') {
            header("Location: ../petugas/index.php");
        } else {
            header("Location: ../user/index.php");
        }
        exit();
    } else {
        echo "Username atau password salah!";
    }
}
?>

<form action="" method="POST">
    <input type="text" name="nama" placeholder="Nama" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <button type="submit">Login</button>
</form>