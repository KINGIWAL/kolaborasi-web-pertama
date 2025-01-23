<!-- Yang harus ada di Halaman admin.php -->
<!-- 1. harus ada data admin  -->
<!-- 2. fungsi untuk menghapus izin admin supaya tidak bisa lagi mengakses -->
<!-- 3. fungsi untuk menambah admin  -->
<!-- 4. fungsi untuk mengontrol pembelian  -->
<!-- 5. fungsi untuk mengontrol user  -->
<!-- 6. fungsi untuk mengontrol penjual -->
<?php
session_start();
if (!isset($_SESSION["Login"])) {
    header("Location: Login admin.php");
    exit;
}

require 'function.php';
$admin = query("SELECT * FROM admin");
$user =  query("SELECT * FROM user");
$penjual = query("SELECT * FROM penjual");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>

<body>
    <h1>Daftar Admin</h1>

    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($admin as $adm): ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $adm["Nama"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>

    <h1>Daftar user</h1>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($user as $ur): ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $ur["Nama"]; ?></td>
                <td><?= $ur["Email"]; ?></td>
                <td><?= $ur["Nomor"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>

    <h1>Daftar penjual</h1>
    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor</th>
            <th>Alamat</th>
            <th>Toko</th>
            <th>Kota</th>
            <th>Photo profile</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach ($penjual as $pjl): ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $pjl["Nama"]; ?></td>
                <td><?= $pjl["Email"]; ?></td>
                <td><?= $pjl["Nomor"]; ?></td>
                <td><?= $pjl["Alamat"]; ?></td>
                <td><?= $pjl["Toko"]; ?></td>
                <td><?= $pjl["Kota"]; ?></td>
                <td><?= $pjl["Photo_profil"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>