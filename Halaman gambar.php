<?php
session_start();

if (!isset($_SESSION["Login"])) {
    header("Location: Login user.php");
    exit;
}
require "function.php";

$id = $_GET["id"];

$penjual = query("SELECT * FROM penjual WHERE id = $id")[0];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Gambar</title>
    <style>
        /* Styling untuk body */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Styling untuk container */
        div {
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            text-align: center;
        }

        /* Styling untuk gambar */
        div img {
            width: 100%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 15px;
        }

        /* Styling untuk nama barang */
        div p:first-of-type {
            font-size: 1.5rem;
            font-weight: bold;
            color: #333;
            margin: 10px 0;
        }

        /* Styling untuk keterangan barang */
        div p:nth-of-type(2) {
            font-size: 1rem;
            color: #666;
            margin: 10px 0;
        }

        /* Styling untuk informasi lainnya */
        div p {
            font-size: 0.9rem;
            color: #444;
            margin: 5px 0;
        }

        /* Styling untuk harga */
        div p:last-of-type {
            font-size: 1.2rem;
            font-weight: bold;
            color: #e63946;
            margin-top: 15px;
        }

        .beli {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div>
        <img src="img/<?= $penjual["Gambar_barang"] ?>" alt="No image">
        <p><?= $penjual["Barang_Jualan"] ?></p>
        <p><?= $penjual["Keterangan_barang"] ?></p>
        <p>Jumlah stok : <?= $penjual["Jumlah_Barang"] ?></p>
        <p>Toko : <?= $penjual["Toko_penjual"] ?></p>
        <p>Alamat : <?= $penjual["Alamat_penjual"] ?></p>
        <p>Harga : <?= $penjual["Harga_barang"] ?></p>
        <div class="beli">
            <div class="ba"><a href="Pesanan.php">Pesan</a></div>
            <div class="bb"><a href="keranjang.php">+ Keranjang</a></div>
        </div>
    </div>
</body>

</html>