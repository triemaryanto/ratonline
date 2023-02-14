<?php
include "koneksi.php";
$setting = mysqli_query($conn, "SELECT * FROM tbl_setting");
while ($row3 = mysqli_fetch_array($setting)){
    $id_rat = $row3['id_rat'];
    }
$h = mysqli_query($conn,"SELECT * FROM tbl_soal where kategori ='ganda' AND id_rat = $id_rat ORDER BY id_soal asc ");
$sql2 =mysqli_query($conn,"SELECT tbl_anggota.nama, tbl_jawaban.jawaban FROM tbl_jawaban JOIN tbl_anggota ON tbl_jawaban.id_anggota = tbl_anggota.username JOIN tbl_soal ON tbl_jawaban.id_soal = tbl_soal.id_soal WHERE tbl_soal.kategori = 'essay' ORDER BY RAND()");
$pie = mysqli_query($conn, "SELECT tbl_soal.id_soal, tbl_jawaban.jawaban, count(*) as Tanggapan FROM tbl_jawaban INNER JOIN tbl_soal ON tbl_jawaban.id_soal = tbl_soal.id_soal WHERE tbl_soal.kategori = 'ganda' GROUP BY tbl_jawaban.id_soal");
    /**
     * Preproses data
     */
    $soal_soal = [];
 
    while ($soal = mysqli_fetch_array($pie)) {
        $id_soal   = $soal['id_soal'];
        $jawaban   = $soal['jawaban'];
        $tanggapan = $soal['Tanggapan'];
 
        $soal_soal[$id_soal][] = [$jawaban, $tanggapan];
    }
?>