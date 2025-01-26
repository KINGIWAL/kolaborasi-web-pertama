<?php 
session_start();
require 'function.php';

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$id = $_GET["id"];

if (hapus ($id) > 0 ){
    echo"
    <script>
        alert ('Data berhasil dihapus!');
        document.location.href = 'Halaman admin.php';
    </script>
    ";
}else{
    echo"
    <script>
        alert ('Data gagal dihapus!');
        document.location.href = 'Halaman admin.php';
    </script>
    ";
}
?>