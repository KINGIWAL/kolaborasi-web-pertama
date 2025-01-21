<?php 
require 'function.php';
if (isset($_POST["register"])){

    if(registrasi_user($_POST) > 0) {
        echo "<script>
        alert('User baru berhasil ditambahkan');
        </script>";
        $_SESSION["Login"] = true;
        header("Location: Halaman index.php");
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
<form action="" method="post" autocomplete="off">
    <ul>
        <li>
            <label for="nama">Username :</label>
            <input type="text" name="nama" id="nama" required>
        </li>
        <li>
            <label for="email">Email :</label>
            <input type="text" name="email" id="email">
        </li>
        <li>
            <label for="nomor">Nomor Wa/Telp</label>
            <input type="text" name="nomor" id="nomor">
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