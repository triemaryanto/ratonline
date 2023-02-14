<?php
include "koneksi.php";
include "fsetting.php";
error_reporting(E_ALL ^ E_NOTICE);
session_start();
  $sql1 = mysqli_query($conn,"SELECT * FROM tbl_anggota");
 $totalanggota = mysqli_num_rows($sql1);
 $sql2 = mysqli_query($conn,"SELECT * FROM tbl_absensi where id_rat='$set'");
 $totalhadir = mysqli_num_rows($sql2);
 $sql4 = mysqli_query($conn,"SELECT * FROM tbl_jawaban WHERE id_rat='1' AND jawaban IN ('SETUJU', 'TIDAK SETUJU') AND id_soal IN (1,2,3,4,5,6,7) GROUP BY id_anggota");
 $totaltanggapan = mysqli_num_rows($sql4);
 $sql5 = mysqli_query($conn,"SELECT * FROM tbl_jawaban WHERE id_rat='1' AND jawaban = 'Kosong' AND id_soal IN (1,2,3,4,5,6,7) GROUP BY id_anggota;");
 $kosong = mysqli_num_rows($sql5);
 $sql3 = mysqli_query($conn,"SELECT * FROM tbl_user");
 $totaluser = mysqli_num_rows($sql3);

 if(isset($_POST['setting'])){
    $idnya = $_POST ['rat'];
    $query  = "UPDATE tbl_setting SET id_rat = '$idnya'";
    $query .= "WHERE id_setting = '1'";
    $result = mysqli_query($conn, $query);
  if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($conn).
                       " - ".mysqli_error($conn));
                       echo"$idnya";
} else {
  //tampil alert dan akan redirect ke halaman index.php
  //silahkan ganti index.php sesuai halaman yang akan dituju
    echo "<script>alert('Status RAT di Rubah');window.location='../home.php';</script>";
    }
}
?>