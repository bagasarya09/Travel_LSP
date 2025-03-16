<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "new_travel_lsp";


$conn = new mysqli($host, $user, $pass, $dbname);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
