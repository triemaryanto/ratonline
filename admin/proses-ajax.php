<?php
include 'koneksi.php';
$nim = $_GET['nim'];
$query10 = mysqli_query($conn, "select * from tbl_anggota where nama='$nim'");
$mahasiswa = mysqli_fetch_array($query10);
$data = array(
            'username'      =>  $mahasiswa['username'],);
 echo json_encode($data);
?>