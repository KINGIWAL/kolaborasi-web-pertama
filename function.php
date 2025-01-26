<?php
$db = mysqli_connect("127.0.0.1", "root", "muhammadilham2372005", "web_pertama");

function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi_admin($data)
{
    global $db;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($db, "SELECT Nama FROM admin WHERE Nama = '$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
    alert('Username sudah terdaftar')
    </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
        alert('konfirmasi password tidak sesuai!')
        </script>";
        return false;
    }

    //enkrips password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan userbaru ke database
    mysqli_query($db, "INSERT INTO admin (Nama, Password) VALUES('$username','$password')");

    return mysqli_affected_rows($db);
}

function registrasi_user($data)
{
    global $db;

    $nama = strtolower(trim($data["nama"]));
    $email = $data["email"];
    $nomor = $data["nomor"];
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);

    //cek Nama sudah ada atau belum
    $result = mysqli_query($db, "SELECT Nama FROM user WHERE Nama = '$nama'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
    alert('Nama sudah terdaftar ')
    </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
        alert('konfirmasi password tidak sesuai!')
        </script>";
        return false;
    }

    //enkrips password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan userbaru ke database
    mysqli_query($db, "INSERT INTO user (Nama,Email,Nomor,Password) VALUES('$nama','$email','$nomor','$password')");

    return mysqli_affected_rows($db);
}

function registrasi_penjual($data)
{
    global $db;

    $nama = htmlspecialchars(strtolower(trim($data["nama"])));
    $email = htmlspecialchars($data["email"]);
    $nomor = htmlspecialchars($data["nomor"]);
    $password = mysqli_real_escape_string($db, $data["password"]);
    $password2 = mysqli_real_escape_string($db, $data["password2"]);
    $alamat = htmlspecialchars($data ["Alamat"]);
    $toko = htmlspecialchars($data["Toko"]);
    $kota = htmlspecialchars($data["Kota"]);
    $photo_profil = upload_2();
    if (!$photo_profil) {
        return false;
    }
    //cek Nama sudah ada atau belum
    $result = mysqli_query($db, "SELECT Nama FROM penjual WHERE Nama = '$nama'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
    alert('Nama sudah terdaftar ')
    </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
        alert('konfirmasi password tidak sesuai!')
        </script>";
        return false;
    }

    //enkrips password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambahkan userbaru ke database
    mysqli_query($db, "INSERT INTO penjual (Nama,Email,Nomor,Password,Alamat,Toko,Kota,Photo_profil) VALUES('$nama','$email','$nomor','$password','$alamat','$toko','$kota','$photo_profil')");

    return mysqli_affected_rows($db);
}
//function cari masih diproses
function cari($keyword)
{
    $query = "SELECT * FROM mahasiswa WHERE 
    nama LIKE  '%$keyword%' OR
    npm LIKE  '%$keyword%' OR
    email LIKE  '%$keyword%' OR
    jurusan LIKE  '%$keyword%'OR
    gambar LIKE  '%$keyword%'";
    return query($query);
}

function tambah_jualan($data)
{
    global $db;
    $kategori =htmlspecialchars($data["Kategori"]);
    $Nama_barang = htmlspecialchars($data["Nama_barang"]);
    $Keterangan_barang = htmlspecialchars($data["Keterangan_barang"]);
    $Harga_barang = htmlspecialchars($data["Harga_barang"]);
    $Jumlah_barang = htmlspecialchars($data["Jumlah_Barang"]);

    //upload gambar
    $Gambar = upload_1();
    if (!$Gambar) {
        return false;
    }

    //query insert data
    $query = "INSERT INTO barang_jualan (Nama_barang,Keterangan_barang,Harga_barang,Jumlah_barang,Gambar_barang, Kategori) VALUES ('$Nama_barang','$Keterangan_barang','$Harga_barang','$Jumlah_barang','$Gambar','$kategori')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);

}

function upload_1()
{
    $namaFile = $_FILES["Gambar_barang"]["name"];
    $ukuranFile = $_FILES["Gambar_barang"]["size"];
    $error = $_FILES["Gambar_barang"]["error"];
    $tmpName = $_FILES["Gambar_barang"]["tmp_name"];

    //cek apakah tidak ada gambar yang diuploas
    if ($error === 4) {
        echo "<script>
        alert('Pilih gambar terlebih dahulu');
        </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo " <script>
            alert('Yang anda upload bukan gambar!');
            </script>";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
            alert('Ukuran gambar terlalu besar !');
            </script>";
        return false;
    }

    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    //lolos pengecekan, gambar siap upload
    move_uploaded_file($tmpName, 'img_jualan/' . $namaFileBaru);
    return $namaFileBaru;
}

function upload_2()
{
    $namaFile = $_FILES["Photo_profil"]["name"];
    $ukuranFile = $_FILES["Photo_profil"]["size"];
    $error = $_FILES["Photo_profil"]["error"];
    $tmpName = $_FILES["Photo_profil"]["tmp_name"];

    //cek apakah tidak ada gambar yang diuploas
    if ($error === 4) {
        echo "<script>
        alert('Pilih gambar terlebih dahulu');
        </script>";
        return false;
    }

    //cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo " <script>
            alert('Yang anda upload bukan gambar!');
            </script>";
        return false;
    }

    //cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
            alert('Ukuran gambar terlalu besar !');
            </script>";
        return false;
    }

    //generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    //lolos pengecekan, gambar siap upload
    move_uploaded_file($tmpName, 'img_penjual/' . $namaFileBaru);
    return $namaFileBaru;
}

function Add_item_keranjang($data)
{
    global $db;
    if (!isset($_SESSION["id_barang"]) || !isset($_SESSION["id_user"])) {
        return 0; 
    }
    $product_id =  $_SESSION["id_barang"] ;
    $user_id = $_SESSION["id_user"];

    $stmt = $db->prepare("INSERT INTO item_keranjang (product_id, id_user) VALUES (?, ?)");
    $stmt->bind_param("ii", $product_id, $user_id);
    
    if ($stmt->execute()) {
        return $stmt->affected_rows;
    } else {
        echo "Error: " . $stmt->error;
        return 0;
    }
}
function hapus($id){
    global $db;
    mysqli_query($db,"DELETE FROM penjual WHERE id = $id");
    return mysqli_affected_rows($db);
}
?>