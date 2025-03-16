<?php
require '../../koneksi.php'; // Pastikan file koneksi.php sudah benar

if (isset($_GET['id'])) {
    $id_maskapai = $_GET['id'];

    $query_delete = "DELETE FROM maskapai WHERE id_maskapai = '$id_maskapai'";
    if (mysqli_query($conn, $query_delete)) {
        $query_reset_auto_increment = "ALTER TABLE maskapai AUTO_INCREMENT = 1";
        mysqli_query($conn, $query_reset_auto_increment);

        $query_update_ids = "SET @count = 0; UPDATE maskapai SET id_maskapai = @count:= @count + 1;";
        mysqli_multi_query($conn, $query_update_ids);

        header("Location: index.php");
    } else {
        echo "Error: " . $query_delete . "<br>" . mysqli_error($conn);
    }
} else {
    echo "ID tidak ditemukan.";
}
