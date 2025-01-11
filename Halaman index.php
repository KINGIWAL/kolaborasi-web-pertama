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
$barang = query("SELECT * FROM penjual ORDER BY id DESC ");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store Iwal</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #181818;
            color: white;
            margin: 0;
            padding: 0;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }


        ul li a {
            text-decoration: none;
            color: white;
            padding: 10px 20px;
            background-color: #333;
            border-radius: 5px;
            transition: background-color 0.3s;
        }


        ul li a:hover {
            background-color: #555;
        }

        .Baris_pertama {
            background-color: #202020;
            padding: 10px 0;
        }

        .Baris_kedua {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #202020;
            border-bottom: 2px solid #333
        }


        .Baris_kedua .dropdown {
            position: relative;
            display: inline-block;
        }

        .Baris_kedua .dropdown-content {
            display: none;
            position: absolute;
            background-color: #333;
            padding: 10px;
            border-radius: 5px;
            top: 30px;
            z-index: 10;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        }

        .Baris_kedua .dropdown:hover .dropdown-content {
            display: block;
        }

        .span {
            padding: 20px;
        }

        /* Styling untuk container utama */
        .Baris_keempat {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /* Jarak antar card */
            justify-content: center;
            padding: 20px;
            background-color: #f5f5f5;
            /* Warna latar belakang */
        }

        /* Styling untuk setiap card */
        .Baris_keempat>div {
            background-color: #fff;
            /* Warna latar card */
            border-radius: 12px;
            /* Sudut melengkung */
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            /* Bayangan */
            width: 220px;
            /* Lebar card */
            overflow: hidden;
            /* Potong elemen di luar card */
            position: relative;
            /* Untuk badge */
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .Baris_keempat>div:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        /* Styling untuk badge "Terlaris" */
        .Baris_keempat .badge {
            background-color: #fdbb2d;
            /* Warna kuning badge */
            color: #fff;
            /* Warna teks */
            font-size: 12px;
            font-weight: bold;
            padding: 5px 10px;
            position: absolute;
            /* Supaya berada di atas */
            top: 10px;
            left: 10px;
            border-radius: 4px;
            /* Sudut melengkung */
            z-index: 10;
        }

        /* Styling untuk gambar */
        .Baris_keempat>div img {
            width: 100%;
            height: 200px;
            /* Tinggi gambar */
            object-fit: cover;
            /* Potong gambar sesuai ukuran */
            border-bottom: 1px solid #eee;
            /* Garis pembatas bawah gambar */
        }

        /* Styling untuk detail card */
        .Baris_keempat .card-details {
            padding: 15px;
            text-align: left;
            /* Teks rata kiri */
        }

        /* Styling untuk nama barang */
        .Baris_keempat .card-details .nama-barang {
            font-size: 14px;
            font-weight: bold;
            margin: 10px 0;
            color: #333;
            overflow: hidden;
            /* Potong teks panjang */
            text-overflow: ellipsis;
            /* Tambahkan "..." untuk teks panjang */
            white-space: nowrap;
        }

        /* Styling untuk harga */
        .Baris_keempat .card-details .harga {
            font-size: 16px;
            font-weight: bold;
            color: #e74c3c;
            /* Warna merah untuk harga */
            margin: 5px 0;
        }

        /* Styling lokasi */
        .Baris_keempat .card-details .lokasi {
            font-size: 12px;
            color: #777;
            display: flex;
            align-items: center;
            margin: 5px 0;
        }

        /* Styling rating */
        .Baris_keempat .card-details .rating {
            font-size: 12px;
            color: #555;
            display: flex;
            align-items: center;
        }

        .Baris_keempat .card-details .rating i {
            color: #fbc02d;
            /* Warna bintang kuning */
            margin-right: 5px;
        }

        @media (max-width: 768px) {
            .Baris_keempat {
                flex-direction: column;
                align-items: center;
            }

            .Baris_keempat>div {
                width: 100%;
                max-width: 400px;
            }
        }

        .user{
            background-color: green;
            border-radius: 5px;
            transition: ease-in-out background-color 0.3s ;
        }
        
        .user:hover{
            background-color:rgb(4, 53, 13);
        }
        
        .user a{
            text-decoration: none;
            color: white;
            padding: 30px;
        }
        
    </style>
</head>

<body>
    <div class="Baris_pertama">
        <ul>
            <li><a href="tentang_toko.php">Tentang Toko</a></li>
            <li><a href="mitra_toko.php">Mitra Toko</a></li>
            <li><a href="Registrasi penjual.php">Mulai Berjualan</a></li>
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
            <a href="Login user.php" >Login</a>
        </div>
        <div class="user">
            <a href="Registrasi user.php" >Daftar</a>
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