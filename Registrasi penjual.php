<?php 
require 'function.php';
if (isset($_POST["register"])){

    if(registrasi_penjual($_POST) > 0) {
        echo "<script>
        alert('Penjual baru berhasil ditambahkan');
        </script>";
        $_SESSION["Login"] = true;
        header("Location: Halaman penjual.php");
        exit;
    }else{
        echo mysqli_error($db);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
</head>
<body>
<h1>Halaman Registrasi</h1>
<form action="" method="post" enctype="multipart/form-data">
    <ul>
        <li>
            <label for="nama">Username :</label>
            <input type="text" name="nama" id="nama" required>
        </li>
        <li>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email" required>
        </li>
        <li>
            <label for="nomor">Nomor Wa/Telp</label>
            <input type="text" name="nomor" id="nomor" required>
        </li>
        <li>
            <label for="Alamat">Alamat :</label>
            <input type="text" name="Alamat" id="Alamat" required>
        </li>
        <li>
            <label for="Toko">Nama toko :</label>
            <input type="text" name="Toko" id="Toko" required>
        </li>
        <li>
            <label for="Kota">Kota :</label>
            <input type="text" name="Kota" id="Kota" required>
        </li>
        <li>
            <label for="Photo_profil">Photo profil :</label>
            <input type="file" name="Photo_profil" id="Photo_profil" required>
        </li>
        <li>
            <label for="password">Password :</label>
            <input type="password" name="password" id="password" required>
        </li>
        <li>
            <label for="password2">Konfirmasi Password :</label>
            <input type="password" name="password2" id="password2" required>
        </li>
        <li>
            <button type="submit" name="register">Submit</button>
        </li>
    </ul>
</form>
</body>
</html>