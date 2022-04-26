<?php
include "koneksi.php";
$user = mysqli_query($conn,"SELECT * FROM tbl_user");
error_reporting(E_ALL ^ E_NOTICE);
if(isset($_POST['tambah'])){
    $username = $_POST ['username'];
    $nama = $_POST ['nama'];
    $id_cabang = $_POST['id_cabang'];
    $jab = $_POST['jab'];
    $pass = '123456'; 
    $sql= mysqli_query($conn, "SELECT * FROM tbl_user where username='$username'");
    $cek = mysqli_num_rows($sql);
    if($cek){
        echo"<script>alert('Data Username Sudah ada -> $username');window.location='../user.php';</script>";
    }else{
        $sql1 = mysqli_query($conn, "INSERT INTO tbl_user (nama, username, password, jabatan, id_cabang) VALUES ('$nama', '$username','$pass','$jab',$id_cabang)");
        echo "<script>alert('Data berhasil ditambah.');window.location='../user';</script>";
    }
}
elseif($_GET['act']=='update'){
    $id_user = $_POST['id_user'];
    $username = $_POST ['username'];
    $nama = $_POST ['nama'];
    $id_cabang = $_POST['id_cabang'];
    $jab = $_POST['jab'];
    $pass = $_POST['pass'];
      
          // jalankan query UPDATE berdasarkan ID yang produknya kita edit
           $query  = mysqli_query($conn, "UPDATE tbl_user SET nama='$nama', username='$username', password='$pass', jabatan='$jab', id_cabang= $id_cabang WHERE id_user ='$id_user'");
          // periska query apakah ada error
          if(!$query){
                die ("Query gagal dijalankan: ".mysqli_errno($conn).
                                 " - ".mysqli_error($conn));
          } else {
              echo "<script>alert('Data berhasil diubah.');window.location='../user';</script>";
          }
        }
        elseif($_GET['act']=='delete'){
	
            $id_user= $_GET["id_user"];
            $nama = $_GET["nama"];
            //mengambil id yang ingin dihapus
            
                //jalankan query DELETE untuk menghapus data
                $query = "DELETE FROM tbl_user WHERE id_user='$id_user'";
                $hasil_query = mysqli_query($conn, $query);
            
                //periksa query, apakah ada kesalahan
                if(!$hasil_query) {
                  die ("Gagal menghapus data: ".mysqli_errno($conn).
                   " - ".mysqli_error($conn));
                } else {
                  echo "<script>alert('Data $nama berhasil dihapus.');window.location='../user';</script>";
                }	
                
            }
?>