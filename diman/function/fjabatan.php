<?php
include "koneksi.php";
$jabtan = mysqli_query($conn,"SELECT * FROM chmenu");
error_reporting(E_ALL ^ E_NOTICE);
if(isset($_POST['tambah'])){
    $ijabatan = $_POST['ijabatan'];
    $sql= mysqli_query($conn, "SELECT * FROM chmenu where userjabatan='$ijabatan'");
    $cek = mysqli_num_rows($sql);
    if($cek){
        echo"<script>alert('Data Jabatan Sudah ada -> $ijabatan');window.location='../jabatan.php';</script>";
    }else{
        mysqli_query($conn,"INSERT INTO chmenu (userjabatan, menu1, menu2, menu3, menu4, menu5, menu6, menu7, menu8) VALUES ('$ijabatan','0','0','0','0','0','0','0','0')");
        echo"<script>alert('Data $ijabatan berhasil ditambahkan.');window.location='../jabatan.php';</script>";
    }
}
elseif($_GET['act']=='update'){
    $id_jabatan = $_POST['id_jabatan'];
    $ijabatan = $_POST['ijabatan'];
    $sql= mysqli_query($conn, "SELECT * FROM chmenu where userjabatan='$ijabatan'");
    $cek = mysqli_num_rows($sql);
    if($cek){
        echo"<script>alert('Data Jabatan Sudah ada -> $ijabatan');window.location='../jabatan.php';</script>";
    }else{
        $result = mysqli_query($conn,"UPDATE chmenu SET userjabatan = '$ijabatan' WHERE id_jabatan = '$id_jabatan'");
        echo"<script>alert('Data $ijabatan berhasil ditambahkan.');window.location='../jabatan.php';</script>";
        if(!$result){
            die ("Query gagal dijalankan: ".mysqli_errno($conn).
                             " - ".mysqli_error($conn));
      } else {
        //tampil alert dan akan redirect ke halaman index.php
        //silahkan ganti index.php sesuai halaman yang akan dituju
          echo "<script>alert('Data jabatan diubah.');window.location='../jabatan.php';</script>";
      }
    }
}
elseif($_GET['act']=='delete'){
	
    $id_jabatan = $_GET["id_jabatan"];
    $ijabatan = $_GET["ijabatan"];
    //mengambil id yang ingin dihapus
    
        //jalankan query DELETE untuk menghapus data
        $query = "DELETE FROM chmenu WHERE id_jabatan='$id_jabatan'";
        $hasil_query = mysqli_query($conn, $query);
    
        //periksa query, apakah ada kesalahan
        if(!$hasil_query) {
          die ("Gagal menghapus data: ".mysqli_errno($conn).
           " - ".mysqli_error($conn));
        } else {
          echo "<script>alert('Data $ijabatan berhasil dihapus.');window.location='../jabatan.php';</script>";
        }	
        
    }
    elseif($_GET['act']=='updateakses'){
        $id_jabatan = $_POST['id_jabatan'];
        $menu1 = $_POST['menu1'];
        $menu2 = $_POST['menu2'];
        $menu3 = $_POST['menu3'];
        $menu4 = $_POST['menu4'];
        $menu5 = $_POST['menu5'];
        $menu6 = $_POST['menu6'];
        $menu7 = $_POST['menu7'];
        $menu8 = $_POST['menu8'];
            $result = mysqli_query($conn, "UPDATE chmenu SET menu1= '$menu1', menu2 = '$menu2', menu3='$menu3', menu4 = '$menu4', menu5='$menu5', menu6='$menu6', menu7= '$menu7', menu8 = '$menu8' WHERE id_jabatan = '$id_jabatan'");

            if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($conn).
                                 " - ".mysqli_error($conn));
          } else {
            //tampil alert dan akan redirect ke halaman index.php
            //silahkan ganti index.php sesuai halaman yang akan dituju
              echo "<script>alert('Hak Akses diubah.');window.location='../jabatan.php';</script>";
          }
        }
    
?>