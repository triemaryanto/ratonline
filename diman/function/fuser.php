<?php
include "koneksi.php";
$user = mysqli_query($conn, "SELECT * FROM tbl_user");
error_reporting(E_ALL ^ E_NOTICE);
if (isset($_POST['tambah'])) {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $jab = $_POST['jab'];
    $password = md5($_POST['password']);
    $ulangi_password = md5($_POST['ulangi_password']);
    $sql = mysqli_query($conn, "SELECT * FROM tbl_user where username='$username'");
    $cek = mysqli_num_rows($sql);
    if ($cek) {
        echo "<script>alert('Data Username Sudah ada -> $username');window.location='../user.php';</script>";
    } else {
        if ($password == $ulangi_password) {
            $sql1 = mysqli_query($conn, "INSERT INTO tbl_user (nama, username, password, jabatan) VALUES ('$nama', '$username','$password','$jab')");
            echo "<script>alert('Data berhasil ditambah.');window.location='../user.php';</script>";
        } else {
            echo "<script>alert('Data password tidak sama.');window.location='../user.php';</script>";
        }
    }
} elseif ($_GET['act'] == 'update') {
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $id_cabang = $_POST['id_cabang'];
    $jab = $_POST['jab'];
    $pass = $_POST['pass'];

    // jalankan query UPDATE berdasarkan ID yang produknya kita edit
    $query  = mysqli_query($conn, "UPDATE tbl_user SET nama='$nama', username='$username', password='$pass', jabatan='$jab' WHERE id_user ='$id_user'");
    // periska query apakah ada error
    if (!$query) {
        die("Query gagal dijalankan: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    } else {
        echo "<script>alert('Data berhasil diubah.');window.location='../user';</script>";
    }
} elseif ($_GET['act'] == 'delete') {

    $id_user = $_GET["id_user"];
    $nama = $_GET["nama"];
    //mengambil id yang ingin dihapus

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM tbl_user WHERE id_user='$id_user'";
    $hasil_query = mysqli_query($conn, $query);

    //periksa query, apakah ada kesalahan
    if (!$hasil_query) {
        die("Gagal menghapus data: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    } else {
        echo "<script>alert('Data $nama berhasil dihapus.');window.location='../user';</script>";
    }
} elseif ($_GET['act'] == 'ubahpwd') {
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $ulangi_password = md5($_POST['ulangi_password']);
    if (empty($password) && empty($ulangi_password)) {

        echo "<script>alert('Data Kosong.');window.location='../user.php';</script>";
    } else {
        if ($password == $ulangi_password) {
            mysqli_query($conn, "UPDATE tbl_user SET password='$password' where id_user='$id_user'");
            echo "<script>alert('Password Berhasil di Ubah.');window.location='../user.php';</script>";
        } else {
            echo "<script>alert('Password Tidak Sama. $password and $ulangi_password ');window.location='../user.php';</script>";
        }
    }
}
