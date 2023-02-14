<?php
include "koneksi.php";
$nominal = mysqli_query($conn, "SELECT * FROM tbl_nominal");
error_reporting(E_ALL ^ E_NOTICE);
if (isset($_POST['tambah'])) {
    $nominal = $_POST['nominal'];
    mysqli_query($conn, "INSERT INTO tbl_nominal (nominal) VALUES ('$nominal')");
    echo "<script>alert('Nominal $nominal berhasil ditambahkan.');window.location='../nominal.php';</script>";
} elseif ($_GET['act'] == 'update') {
    $id = $_POST['id'];
    $nominal = $_POST['nominal'];
    $result = mysqli_query($conn, "UPDATE tbl_nominal SET nominal = '$nominal' WHERE id = '$id'");
    if (!$result) {
        die("Query gagal dijalankan: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    } else {
        echo "<script>alert('Nominal $nominal berhasil ditambahkan.');window.location='../nominal.php';</script>";
    }
} elseif ($_GET['act'] == 'delete') {

    $id = $_GET["id"];
    $nominal = $_GET["nominal"];
    //mengambil id yang ingin dihapus

    //jalankan query DELETE untuk menghapus data
    $query = "DELETE FROM tbl_nominal WHERE id='$id'";
    $hasil_query = mysqli_query($conn, $query);

    //periksa query, apakah ada kesalahan
    if (!$hasil_query) {
        die("Gagal menghapus data: " . mysqli_errno($conn) .
            " - " . mysqli_error($conn));
    } else {
        echo "<script>alert('Data $nominal berhasil dihapus.');window.location='../nominal.php';</script>";
    }
    // } elseif ($_GET['act'] == 'updateakses') {
    //     $id_jabatan = $_POST['id_jabatan'];
    //     $menu1 = $_POST['menu1'];
    //     $menu2 = $_POST['menu2'];
    //     $menu3 = $_POST['menu3'];
    //     $menu4 = $_POST['menu4'];
    //     $menu5 = $_POST['menu5'];
    //     $menu6 = $_POST['menu6'];
    //     $menu7 = $_POST['menu7'];
    //     $menu8 = $_POST['menu8'];
    //     $result = mysqli_query($conn, "UPDATE chmenu SET menu1= '$menu1', menu2 = '$menu2', menu3='$menu3', menu4 = '$menu4', menu5='$menu5', menu6='$menu6', menu7= '$menu7', menu8 = '$menu8' WHERE id_jabatan = '$id_jabatan'");

    //     if (!$result) {
    //         die("Query gagal dijalankan: " . mysqli_errno($conn) .
    //             " - " . mysqli_error($conn));
    //     } else {
    //         //tampil alert dan akan redirect ke halaman index.php
    //         //silahkan ganti index.php sesuai halaman yang akan dituju
    //         echo "<script>alert('Hak Akses diubah.');window.location='../jabatan.php';</script>";
    //     }
}
