<?php
session_start();
require 'function.php';

?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah ke Keranjang</title>
</head>

<body>
    <h2>Tambah Produk ke Keranjang</h2>
    <form action="tambah_ke_keranjang.php" method="post">
        <label for="product_id">ID Produk:</label>
        <input type="number" id="product_id" name="product_id" required>
        <br>
        <label for="quantity">Kuantitas:</label>
        <input type="number" id="quantity" name="quantity" required>
        <br>
        <button type="submit">Tambah ke Keranjang</button>
    </form>
</body>

</html>