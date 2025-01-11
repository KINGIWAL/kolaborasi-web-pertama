<?php 
session_start();
if(!isset($_SESSION["Login"])) {
    header("Location: Login admin.php");
    exit;
}

require 'function.php';
$admin =  query("SELECT * FROM admin");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="Halaman.css">
</head>
<body>
    <h1>Daftar Admin</h1>

    <table  class ="table">
        <tr>
            <th>No</th>
            <th>Nama</th>
        </tr>
            
        <?php $i = 1;?>
        <?php foreach($admin as $adm):?>
        <tr>
            <td><?= $i ;?></td>
            <td><?= $adm ["Nama"];?></td>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>
    </table>    
</body>
</html>