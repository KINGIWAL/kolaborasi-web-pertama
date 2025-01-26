<!-- Halaman ini hanya untuk mengetahui siapa saja yang membeli -->
<?php
session_start();
if (!isset($_SESSION["Login"])) {
    header("Location: Login admin.php");
    exit;
}
if (isset($_POST["submit"])) {
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        if (hapus_pembelian($id) > 0) {
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
require 'function.php';
$pembelian = query("SELECT * FROM pembelian");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Pembeli</title>
    <link rel="stylesheet" href="Halaman.css">
</head>

<body>
    <h1>Daftar Pembelian</h1>

    <table class="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Barang</th>
            <th>Jumlah</th>
            <th>Kualitas</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($pembelian as $pbl): ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $pbl["Nama"]; ?></td>
                <td><?= $pbl["Barang"]; ?></td>
                <td><?= $pbl["Jumlah"]; ?></td>
                <td><?= $pbl["Kualitas"]; ?></td>
                <td>
                <form action="" method="post">
                        <input type="hidden" name="id" value=" <?= $pbl['id']; ?>">
                        <button type="submit" name="submit">hapus</button>
                    </form>
                </td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</body>

</html>