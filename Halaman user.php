<?php 
session_start();
if(!isset($_SESSION["Login"])) {
    header("Location: Login admin.php");
    exit;
}

require 'function.php';
$user =  query("SELECT * FROM user");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman user</title>
    <link rel="stylesheet" href="Halaman.css">
</head>
<body>
    <h1>Daftar user</h1>

    <table  class ="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Nomor</th>
        </tr>            
        <?php $i = 1;?>
        <?php foreach($user as $ur):?>
        <tr>
            <td><?= $i ;?></td>
            <td><?= $ur ["Nama"];?></td>
            <td><?= $ur ["Email"];?></td>
            <td><?= $ur ["Nomor"];?></td>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>
    </table>    
</body>
</html>