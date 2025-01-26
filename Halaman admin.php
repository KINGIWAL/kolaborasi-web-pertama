<!-- Yang harus ada di Halaman admin.php -->
<!-- 1. harus ada data admin  -->
<!-- 4. fungsi untuk mengontrol pembelian  -->
<!-- 5. fungsi untuk mengontrol user  -->
<!-- 6. fungsi untuk mengontrol penjual -->
<?php
require "function.php";
session_start();
if (!isset($_SESSION["Login"])) {
    header("Location: Login admin.php");
    exit;
}
if (isset($_POST["submit_1"])) {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        if (hapus_penjual($id) > 0) {
            echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = 'Halaman admin.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = 'Halaman admin.php';
            </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('ID tidak ditemukan!');
            document.location.href = 'Halaman admin.php';
        </script>
        ";
    }
}

if (isset($_POST["submit_2"])) {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        if (hapus_user($id) > 0) {
            echo "
            <script>
                alert('Data berhasil dihapus!');
                document.location.href = 'Halaman admin.php';
            </script>
            ";
        } else {
            echo "
            <script>
                alert('Data gagal dihapus!');
                document.location.href = 'Halaman admin.php';
            </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('ID tidak ditemukan!');
            document.location.href = 'Halaman admin.php';
        </script>
        ";
    }
}

$admin = query("SELECT * FROM admin");
$user = query("SELECT * FROM user");
$penjual = query("SELECT * FROM penjual");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <style>
        .img_penjual {
            width: 80px;
            height: 80px;
        }
    </style>
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
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value=" <?= $pjl['id']; ?>">
                        <button type="submit" name="submit_2">Hapus</button>
                    </form>
                </td>
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
                <td><img src="img_penjual/<?= $pjl["Photo_profil"]; ?>" alt="" class="img_penjual"></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id" value=" <?= $pjl['id']; ?>">
                        <button type="submit" name="submit_1">Hapus</button>
                    </form>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>

</body>

</html>