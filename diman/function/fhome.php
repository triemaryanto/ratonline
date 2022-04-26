<?php
error_reporting(E_ALL ^ E_NOTICE);
$sql1 = mysqli_query($conn,"SELECT * FROM tbl_anggota");
 $totalanggota = mysqli_num_rows($sql1);
 $sql2 = mysqli_query($conn,"SELECT * FROM tbl_anggota where kehadiran='hadir'");
 $totalhadir = mysqli_num_rows($sql2);
 $sql3 = mysqli_query($conn,"SELECT * FROM tbl_user");
 $totaluser = mysqli_num_rows($sql3);
 $sql4 = mysqli_query($conn,"SELECT * FROM tbl_jawaban GROUP BY id_anggota");
 $totaltanggapan = mysqli_num_rows($sql4);
?>