<?php
$cabang = mysqli_query($conn,"SELECT * FROM tbl_cabang");
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$id_cabang = $_SESSION['id_cabang'];
$setting = mysqli_query($conn,"SELECT * FROM tbl_setting");
while($row = mysqli_fetch_array($setting))
	{
        $status = $row['id_rat']; 
    }
if($id_cabang == '0'){
    $kehadiran = mysqli_query($conn,"SELECT tbl_anggota.username, tbl_anggota.nama, tbl_anggota.alamat, tbl_absensi.status, tbl_absensi.tgl, tbl_absensi.jam, tbl_absensi.ttd FROM tbl_anggota INNER JOIN tbl_absensi ON tbl_anggota.username = tbl_absensi.username where tbl_absensi.id_rat = '$status'");
}else{
    $kehadiran = mysqli_query($conn,"SELECT tbl_anggota.username, tbl_anggota.nama, tbl_anggota.alamat, tbl_absensi.status, tbl_absensi.tgl, tbl_absensi.jam, tbl_absensi.ttd FROM tbl_anggota INNER JOIN tbl_absensi ON tbl_anggota.username = tbl_absensi.username where tbl_absensi.id_rat = '$status' AND tbl_anggota.id_cabang=$id_cabang");
}    

?>