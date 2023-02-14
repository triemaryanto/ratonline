<?php
include "koneksi.php";
$hasil = mysqli_query($conn,"INSERT INTO tbl_materi (judul_materi) VALUES ('aa')");
echo"$hasil";
?>