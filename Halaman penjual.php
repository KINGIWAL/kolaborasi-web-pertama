<?php
session_start();
require "function.php";
if (!isset($_SESSION["Login"])) {
    header("Location: Login penjual.php");
    exit;
}

if (isset($_POST["submit"])) {
    $kategori = cari($_POST["cari"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Penjual</title>\

</head>

<body>
    <ul>
        <li>
            <label for="Kategori">Kategori :</label>
            <input type="text" name="Kategori" id="Kategori" required>
        </li>
        <li>
            <label for="Barang_Jualan">Nama barang :</label>
            <input type="text" name="Barang_Jualan" id="Barang_Jualan" required>

        <li>
            <label for="Jumlah_Barang">Jumlah barang :</label>
            <input type="number" name="Jumlah_Barang" id="Jumlah_Barang" required>
        </li>
        <li>
            <label for="Harga_barang">Harga barang :</label>
            <input type="number" name="Harga_barang" id="Harga_barang" required>
        </li>
        <li>
            <label for="Gambar_barang">Gambar barang :</label>
            <input type="number" name="Gambar_barang" id="Gambar_barang" required>
        </li>
        <li>
            <button type="submit">submit</button>
        </li>
    </ul>
</body>

</html>