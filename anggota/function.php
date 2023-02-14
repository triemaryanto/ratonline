<?php
include "koneksi.php";
session_start();
error_reporting (E_ALL ^ E_NOTICE);
$setting = mysqli_query($conn, "SELECT * FROM tbl_setting");
while ($row3 = mysqli_fetch_array($setting)){
    $id_rat = $row3['id_rat'];
    }
if (!isset($_SESSION['username'])) {
    header("Location: ../absensi/");
}
if(isset($_POST['simpanhasil'])){

    $hasil = $_POST ['hasil'];
    $username = $_SESSION['username'];
    $id = $_POST['id'];
    $query = mysqli_query($conn, "SELECT MAX(id_soal) as a FROM tbl_soal");
while ($row = mysqli_fetch_array($query)){
    $b = $row['a'] +1;
}

    for($i=0; $i<$b; $i++){
        //mysqli_query($conn, "INSERT INTO tbl_jawaban (id_soal,id_anggota,jawaban) VALUES ('$id[$i]','$username','$hasil[$i]')");
       $result =  mysqli_query($conn, "UPDATE tbl_jawaban SET jawaban = '$hasil[$i]' WHERE id_soal = '$id[$i]' AND id_anggota ='$username' AND id_rat='$id_rat'");
     echo "<script>alert('Tanggapan anda berhasil kami rekam. Terimakasih');window.location='index';</script>";
    
    }

}else{
    echo"eror";
}
?>