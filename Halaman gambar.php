<?php
session_start();

if (!isset($_SESSION["Login"])) {
    header("Location: Login user.php");
    exit;
}
require "function.php";

$id = $_GET["id"];

$penjual = query("SELECT * FROM barang_jualan WHERE id = $id")[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Gambar</title>
    <link rel="stylesheet" href="Halaman gambar.css">
</head>

<body>
    <div>
        <img src="img/<?= $penjual["Gambar_barang"] ?>" alt="No image">
        <p><?= $penjual["Barang_Jualan"] ?></p>
        <p><?= $penjual["Keterangan_barang"] ?></p>
        <p>Jumlah stok : <?= $penjual["Jumlah_Barang"] ?></p>
        <p>Harga : <?= $penjual["Harga_barang"] ?></p>
        <div class="beli">
            <div class="ba"><a href="Pesanan.php">Pesan</a></div>
            <div class="bb"><a href="keranjang.php">+ Keranjang</a></div>
            <div><a href="Toko penjual.php">Kunjungi toko</a></div>
        </div>
    </div>
</body>

</html>