<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$id_cabang = $_SESSION['id_cabang'];


if(isset($_POST['tambah'])){
    $username = $_POST ['username'];
    $nama = $_POST ['nama'];
    $kelompok = $_POST['kelompok'];
    $po = $_POST['po'];
    $cabang = $_POST['cabang'];
    $sql= mysqli_query($conn, "SELECT * FROM tbl_anggota where username='$username'");
    $cek = mysqli_num_rows($sql);
    if($cek){
        echo"<script>alert('Data Username Sudah ada -> $username');window.location='../anggota.php';</script>";
    }else{
        mysqli_query($conn,"INSERT INTO tbl_anggota (username, nama, kelompok, po, id_cabang, kehadiran, tgl, jam, ttd) VALUES ('$username','$nama', '$kelompok', '$po','$cabang','kosong','kosong','kosong','kosong')");
        echo"<script>alert('Data $nama berhasil ditambahkan.');window.location='../anggota.php';</script>";
    }
}

elseif($_GET['act']=='update'){
    $id_anggota = $_POST ['id_anggota'];
    $username = $_POST ['username'];
    $nama = $_POST ['nama'];
    $kelompok = $_POST['kelompok'];
    $po = $_POST['po'];
    $cabang = $_POST['cabang'];
    $query  = "UPDATE tbl_anggota SET username = '$username', nama = '$nama', kelompok = '$kelompok', po = '$po', id_cabang = '$cabang' ";
      $query .= "WHERE id_anggota = '$id_anggota'";
      $result = mysqli_query($conn, $query);
    if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($conn).
                         " - ".mysqli_error($conn));
  } else {
    //tampil alert dan akan redirect ke halaman index.php
    //silahkan ganti index.php sesuai halaman yang akan dituju
      echo "<script>alert('Data berhasil diubah.');window.location='../anggota.php';</script>";
  }
}
elseif($_GET['act']=='delete'){
	
    $id_anggota = $_GET["id_anggota"];
    $nama = $_GET["nama"];
    //mengambil id yang ingin dihapus
    
        //jalankan query DELETE untuk menghapus data
        $query = "DELETE FROM tbl_anggota WHERE id_anggota='$id_anggota'";
        $hasil_query = mysqli_query($conn, $query);
    
        //periksa query, apakah ada kesalahan
        if(!$hasil_query) {
          die ("Gagal menghapus data: ".mysqli_errno($conn).
           " - ".mysqli_error($conn));
        } else {
          echo "<script>alert('Data $nama berhasil dihapus.');window.location='../anggota.php';</script>";
        }	
        
    }
?>