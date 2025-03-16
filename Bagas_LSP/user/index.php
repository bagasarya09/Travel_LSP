<?php
session_start();
if (!isset($_SESSION['id_user']) || $_SESSION['role'] != 'penumpang') {
    header("Location: login.php");
    exit();
}
echo "Welcome User, " . $_SESSION['nama'] . "!";
?>

<a href="../logout.php">Logout</a>