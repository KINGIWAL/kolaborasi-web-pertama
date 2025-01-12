<?php 
session_start();
require "function.php";
if(isset($_POST["Login"])){
    $Nama =  strtolower(stripslashes ($_POST["Nama"]));
    $password = $_POST["Password"];

    $result = mysqli_query($db, "SELECT * FROM penjual WHERE Nama = '$Nama'");

    //cek username
    if (mysqli_num_rows($result ) === 1){
        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password,$row["Password"])){
            //set session
            $_SESSION["Login"] = true;
            header("Location: Halaman penjual.php");
            exit;
        }
    }
    $error= true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login Admin</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    
<h1>Halaman Login Admin</h1>
<form action="" method="post" autocomplete="off">
    <ul>
        <li>
            <label for="Nama">Username :</label>
            <input type="text" name="Nama" id="Nama" required>
        </li>
        <li>
            <label for="Password">Password :</label>
            <input type="Password" name="Password" id="Password" required>
        </li>
        <li>
            <a href="Registrasi penjual.php" style="color:black;">Buat akun?</a>
        </li>
        <li>
            <button type="submit" name="Login">Submit</button>
        </li>
    </ul>
</form>
</body>
</html>