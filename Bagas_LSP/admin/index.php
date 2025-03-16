<?php
session_start();
if (!isset($_SESSION['id_user']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
echo "Welcome Admin, " . $_SESSION['nama'] . "!";
?>
<a href="maskapai/index.php"> Data Maskapai</a>
<a href="kota/index.php">kota</a>
<a href="role/index.php">Role Pengguna</a>
<a href="../logout.php">Logout</a>