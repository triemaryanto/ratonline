<?php
require_once 'koneksi.php';
$row_count = $_POST['row_count'];
$id_cabang = $_POST['id_cabang'];
$id_nominal = $_POST['id_nominal'];
$query_undian = mysqli_query($conn, "UPDATE tbl_settingundian SET row_count = '$row_count', id_cabang = '$id_cabang', id_nominal = '$id_nominal'");

header('Location: ../undian.php');
