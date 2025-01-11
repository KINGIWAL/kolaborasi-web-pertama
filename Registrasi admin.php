<?php 
require 'function.php';
if (isset($_POST["register"])){

    if(registrasi_admin($_POST) > 0) {
        echo "<script>
        alert('user baru berhasil ditambahkan');
        </script>";
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
    <title>Registrasion</title>
<link rel="stylesheet" href="Registrasi.css">
</head>
<body>
<h1>Halaman Registrasi</h1>
<form action="" method="post" autocomplete="off">
    <ul>
        <li>
            <label for="username">Username :</label>
            <input type="text" name="username" id="username" required>
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