<?php 
$db = mysqli_connect("127.0.0.1","root","muhammad ilham 2372005","admin_Web");

function query($query){
    global $db;
    $result = mysqli_query ($db,$query);
    $rows = [];
    while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row;   
    }
    return $rows;
}

function registrasi_admin($data){
    global $db;

    $username =strtolower(stripslashes ($data["username"]));
    $password = mysqli_real_escape_string($db,$data["password"]);
    $password2 = mysqli_real_escape_string($db,$data["password2"]);

//cek username sudah ada atau belum
$result = mysqli_query($db,"SELECT Nama FROM admin WHERE Nama = '$username'");
if (mysqli_fetch_assoc($result)){
    echo "<script>
    alert('Username sudah terdaftar')
    </script>";
    return false;
}

    //cek konfirmasi password
    if($password !==  $password2){
        echo "<script>
        alert('konfirmasi password tidak sesuai!')
        </script>";
        return false;
    }

    //enkrips password
    $password = password_hash($password,PASSWORD_DEFAULT);

    //tambahkan userbaru ke database
    mysqli_query($db,"INSERT INTO admin (Nama, Password) VALUES('$username','$password')");

    return mysqli_affected_rows($db);
}

function registrasi_user($data){
    global $db;

    $nama =strtolower(trim($data["nama"]));
    $email =$data["email"];
    $nomor =$data["nomor"];
    $password = mysqli_real_escape_string($db,$data["password"]);
    $password2 = mysqli_real_escape_string($db,$data["password2"]);

//cek Nama sudah ada atau belum
$result = mysqli_query($db,"SELECT Nama FROM user WHERE Nama = '$nama'");
if (mysqli_fetch_assoc($result)){
    echo "<script>
    alert('Nama sudah terdaftar ')
    </script>";
    return false;
}

    //cek konfirmasi password
    if($password !==  $password2){
        echo "<script>
        alert('konfirmasi password tidak sesuai!')
        </script>";
        return false;
    }

    //enkrips password
    $password = password_hash($password,PASSWORD_DEFAULT);

    //tambahkan userbaru ke database
    mysqli_query($db,"INSERT INTO user (Nama,Email,Nomor,Password) VALUES('$nama','$email','$nomor','$password')");

    return mysqli_affected_rows($db);
}

function registrasi_penjual($data){
    global $db;

    $nama =strtolower(trim($data["nama"]));
    $email =$data["email"];
    $nomor =$data["nomor"];
    $password = mysqli_real_escape_string($db,$data["password"]);
    $password2 = mysqli_real_escape_string($db,$data["password2"]);

//cek Nama sudah ada atau belum
$result = mysqli_query($db,"SELECT Nama FROM penjual WHERE Nama = '$nama'");
if (mysqli_fetch_assoc($result)){
    echo "<script>
    alert('Nama sudah terdaftar ')
    </script>";
    return false;
}

    //cek konfirmasi password
    if($password !==  $password2){
        echo "<script>
        alert('konfirmasi password tidak sesuai!')
        </script>";
        return false;
    }

    //enkrips password
    $password = password_hash($password,PASSWORD_DEFAULT);

    //tambahkan userbaru ke database
    mysqli_query($db,"INSERT INTO penjual (Nama,Email,Nomor,Password) VALUES('$nama','$email','$nomor','$password')");

    return mysqli_affected_rows($db);
}
//function cari masih diproses
function cari($keyword){
    $query = "SELECT * FROM mahasiswa WHERE 
    nama LIKE  '%$keyword%' OR
    npm LIKE  '%$keyword%' OR
    email LIKE  '%$keyword%' OR
    jurusan LIKE  '%$keyword%'OR
    gambar LIKE  '%$keyword%'";
    return query($query);
}
?>