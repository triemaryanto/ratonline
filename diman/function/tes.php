<?php
include "koneksi.php";
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