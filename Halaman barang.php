<!-- Yang harus ditambahkan kedalaman Halaman barang.php -->
<!-- 1. Beberapa kategori akan ditambahkan -->
<!-- 2. Pemindahan Halaman apabila mengklik gambar atau anggotanya -->
<!-- 3. Nanti ada fitur untuk mengurutkan berdasarkan rating -->
<!-- 4. Ada fitur untuk mengurutkan berdasarkan yang lama dan baru -->
 <!--5. Intinya klo user ingin membeli harus masuk ke-Halaman gambar -->
<?php
require "function.php";
$makanan = query("SELECT * FROM barang_jualan WHERE Kategori = 'makanan' ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Barang</title>
</head>

<body>
    <h1>Makanan</h1>
    <?php foreach ($makanan as $mkn): ?>
        <ul>
            <li><?= $mkn["Nama_barang"] ?></li>
            <li><?= $mkn["Gambar_barang"] ?></li>
            <li><?= $mkn["Keterangan_barang"] ?></li>
            <li><?= $mkn["Harga_barang"] ?></li>
            <li><?= $mkn["Jumlah_Barang"] ?></li>
        </ul>
    <?php endforeach; ?>
    <!-- Masih akan ditambahkan lagi tapi belum untuk waktunya untuk menambahkan kategorinya -->
</body>

</html>