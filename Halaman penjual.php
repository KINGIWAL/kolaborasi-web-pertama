<!-- Di halaman ini si penjual bisa : -->
<!-- menginputkan barang jualan sesuai kategori -->
<!-- Bisa melihat barangnya ditampilkan  -->
<!-- Bisa juga melihat barang yang dijual oleh dirinya sendiri dengan sesuai kategori -->
<?php
session_start();
require "function.php";
if (!isset($_SESSION["Login"])) {
    header("Location: Login penjual.php");
    exit;
}

if (isset($_POST["submit_1"])) {
    if (tambah_jualan($_POST) > 0) {
        echo "
        <script>
        alert ('Barang jualan berhasil ditambahkan!');
        </script>
    ";
    } else {
        echo "
    <script>
        alert ('Barang jualan gagal ditambahkan!');
        </script>
    ";
    }
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
    <h1>Menambahkan Barang Jualan</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="Kategori">Kategori :</label>
                <input type="text" name="Kategori" id="Kategori" required>
            </li>
            <br>
            <li>
                <label for="Nama_barang">Nama barang :</label>
                <input type="text" name="Nama_barang" id="Nama_barang" required>
            </li>
            <br>
            <li>
                <label for="Keterangan_barang">Keterangan barang :</label>
                <input type="text" name="Keterangan_barang" id="Keterangan_barang" required>
            </li>
            <br>
            <li>
                <label for="Jumlah_Barang">Jumlah barang :</label>
                <input type="number" name="Jumlah_Barang" id="Jumlah_Barang" required>
            </li>
            <br>
            <li>
                <label for="Harga_barang">Harga barang :</label>
                <input type="number" name="Harga_barang" id="Harga_barang" required>
            </li>
            <br>
            <li>
                <label for="Gambar_barang">Gambar barang :</label>
                <input type="file" name="Gambar_barang" id="Gambar_barang" required>
            </li>
            <br>
            <li>
                <button type="submit" name="submit_1">submit</button>
            </li>
        </ul>
    </form>
</body>

</html>