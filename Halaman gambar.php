<?php
session_start();

if (!isset($_SESSION["Login"])) {
    header("Location: Login user.php");
    exit;
}
require "function.php";

$id = $_GET["id"];

$penjual = query("SELECT * FROM barang_jualan WHERE id = $id")[0];

if (isset($_POST["submit_1"])) {
    $id_barang = $_POST["id"];
    $_SESSION["id_barang"] = $id_barang;

    if (Add_item_keranjang($_POST) > 0) {
        echo "
        <script>
        alert ('Barang berhasil ditambahkan!');
        </script>
    ";
    } else {
        echo "
    <script>
        alert ('Barang gagal ditambahkan!');
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
    <title>Halaman Gambar</title>
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
            <form action="" method="post">
                <input type="hidden" name="id" value="<?= $penjual['id'] ?>">
                <button type="submit" name="submit_1" class="bb">+ Keranjang</button>
            </form>
            <div><a href="Toko penjual.php">Kunjungi toko</a></div>
        </div>
    </div>
</body>

</html>