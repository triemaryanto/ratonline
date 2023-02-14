<?php
require_once 'koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM tbl_settingundian");
while ($row3 = mysqli_fetch_array($data)) {
  $id_cabang = $row3['id_cabang'];
}
$query_undian = mysqli_query($conn, "SELECT tbl_undian.id, tbl_anggota.nama, tbl_anggota.kelompok FROM tbl_undian
  INNER JOIN tbl_anggota ON tbl_undian.anggota_id = tbl_anggota.username where tbl_undian.status = '0' AND tbl_anggota.id_cabang = $id_cabang");

$data = array();
$i = 0;
foreach ($query_undian as $row) {
  $data[$i]['id'] = $row['id'];
  $data[$i]['nama'] = $row['nama'];
  $data[$i]['kelompok'] = $row['kelompok'];
  $i++;
}

echo json_encode($data);
