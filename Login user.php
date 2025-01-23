<?php
session_start();
require "function.php";
if (isset($_POST["Login"])) {
    $id_user = $_POST["id"];
    $_SESSION["id_user"] = $id_user;
    $Nama = strtolower(stripslashes($_POST["Nama"]));
    $password = $_POST["password"];

    $result = mysqli_query($db, "SELECT * FROM user WHERE Nama = '$Nama'");

    //cek username
    if (mysqli_num_rows($result) === 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["Password"])) {
            //set session
            $_SESSION["Login"] = true;
            header("Location: Halaman index.php");
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }

    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    <form action="" method="post" autocomplete="off">
        <ul>
            <li>
                <label for="Nama">Username :</label>
                <input type="text" name="Nama" id="Nama" required>
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" required>
            </li>
            <li>
                <a href="Registrasi user.php" style="color:black;">Buat akun?</a>
            </li>
            <li>
                <button type="submit" name="Login">Submit</button>
            </li>
        </ul>
    </form>

</body>

</html>