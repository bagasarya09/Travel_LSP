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
$id = $_GET["id"];

if (hapus($id) > 0) {
    echo "
    <script type='text/javascript'>
        alert('Berhasill! data kota berhasil dihapus');
        window.location = 'index.php';
    </script>
    ";
} else {
    echo "
    <script type='text/javascript'>
        alert('Gagall.. data kota gagal dihapus');
        window.location = 'index.php';
    </script>
    ";
}
