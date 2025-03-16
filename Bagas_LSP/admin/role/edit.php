<?php
session_start();
include '../../koneksi.phpp'; // File koneksi database

// Cek apakah user adalah admin
if ($_SESSION['role'] !== 'admin') {
    header("Location: ../user/index.php");
    exit();
}

// Ambil ID user dari parameter URL
$id_user = $_GET['id'] ?? null;

// Ambil data user
$sql = "SELECT id_user, nama, role FROM users WHERE id_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_user);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_role = $_POST['role'];

    // Update role di database
    $update_sql = "UPDATE users SET role = ? WHERE id_user = ?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("si", $new_role, $id_user);
    if ($stmt->execute()) {
        echo "Role berhasil diperbarui!";
        header("Refresh:2; url=manage_users.php"); // Redirect setelah 2 detik
        exit();
    } else {
        echo "Terjadi kesalahan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Edit Role</title>
</head>

<body>
    <h2>Edit Role untuk <?= htmlspecialchars($user['nama']); ?></h2>
    <form method="post">
        <label>Pilih Role:</label>
        <select name="role">
            <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : ''; ?>>Admin</option>
            <option value="petugas" <?= $user['role'] === 'petugas' ? 'selected' : ''; ?>>Petugas</option>
            <option value="pelanggan" <?= $user['role'] === 'pelanggan' ? 'selected' : ''; ?>>Pelanggan</option>
        </select>
        <button type="submit">Update Role</button>
    </form>
    <a href="manage_users.php">Kembali</a>
</body>

</html>