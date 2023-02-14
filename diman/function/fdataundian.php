<?php
$dataundian = mysqli_query($conn, "SELECT tbl_anggota.username, tbl_anggota.nama, tbl_anggota.kelompok, tbl_cabang.nama_cabang, tbl_undian.nominal FROM tbl_undian
INNER JOIN tbl_anggota ON tbl_undian.anggota_id = tbl_anggota.username INNER JOIN tbl_cabang ON tbl_cabang.id_cabang = tbl_anggota.id_cabang where tbl_undian.status = '1'");
