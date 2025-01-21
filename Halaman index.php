<?php
session_start();
if (!isset($_SESSION["Login"])) {
    header("Location: Login user.php");
    exit;
}

if (isset($_POST["submit"])) {
    $kategori = cari($_POST["cari"]);
}

require "function.php";

$barang = query("SELECT * FROM barang_jualan ORDER BY id DESC ");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Iwal</title>
</head>

<body>
    <div class="Baris_pertama">
        <ul>
            <li><a href="tentang_toko.php">Tentang Toko</a></li>
            <li><a href="mitra_toko.php">Mitra Toko</a></li>
            <li><a href="Halaman Materi seller.php">Mulai Berjualan</a></li>
            <li><a href="promo.php">Promo</a></li>
            <li><a href="download.php">Download</a></li>
        </ul>
    </div>

    <div class="Baris_kedua">
        <div>
            <p>Tokoiwal</p>
        </div>
        <div class="dropdown">
            <span class="span">Kategori</span>
            <div class="dropdown-content">
                <a href="">Pakaian</a>
                <a href="">Perabotan</a>
                <a href="">Kuliner</a>
                <a href="">Tumbuhan</a>
                <a href="">Perangkat</a>
                <a href="">Hiasan</a>
            </div>
        </div>
        <div>
            <form action="" method="post">
                <input type="text" name="cari" id="cari" size="40" autofocus placeholder="Cari ditoko Iwal.."
                    autocomplete="off">
                <button type="submit" name="submit"> Cari </button>
            </form>
        </div>
        <div><a href="keranjang.php" class="keranjang">Keranjang</a></div>
        <div class="user">
            <a href="Login user.php">Login</a>
        </div>
        <div class="user">
            <a href="Registrasi user.php">Daftar</a>
        </div>
    </div>
    <div class="Baris_keempat">
        <?php foreach ($barang as $dj): ?>
            <div>
                <div class="badge">Baru</div>
                <a href="Halaman gambar.php?id=<?= $dj['id'] ?>">
                    <img src="img/<?= $dj['Gambar_barang'] ?>" alt="Gambar Barang">
                </a>
                <div class="card-details">
                    <p class="nama-barang"><?= $dj['Barang_Jualan'] ?></p>
                    <p class="harga">Rp<?= number_format($dj['Harga_barang'], 0, ',', '.') ?></p>
                    <p class="lokasi"><i class="fas fa-map-marker-alt"></i> <?= $dj['Alamat_penjual'] ?></p>
                    <p class="rating"><i class="fas fa-star"></i> <?= $dj['Rating_barang'] ?> | <?= $dj['Jumlah_terjual'] ?>
                        terjual</p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <script src="Halaman index.js"></script>
</body>

</html>