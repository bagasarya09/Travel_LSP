<?php
session_start();
require '../../koneksi.php';
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../user/index.php");
    exit();
}

// Ambil data user dari database
$sql = "SELECT id_user, nama, role FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Manajemen Pengguna</title>
</head>

<body>
    <h2>Manajemen Pengguna</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <tr>
                <td><?= $row['id_user']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['role']; ?></td>
                <td>
                    <a href="edit_role.php?id=<?= $row['id_user']; ?>">Edit Role</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>

</html>