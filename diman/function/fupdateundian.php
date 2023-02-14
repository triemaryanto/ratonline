<?php
require_once 'koneksi.php';
$id = $_POST['id'];
$query1 = mysqli_query($conn, "SELECT * FROM tbl_settingundian INNER JOIN tbl_nominal ON tbl_settingundian.id_nominal = tbl_nominal.id");
while ($row2 = mysqli_fetch_array($query1)) {
    $nominal = $row2['nominal'];
}
$ids = explode(',', $id);

for ($i = 0; $i < sizeof($ids); $i++) {
    $query_undian = mysqli_query($conn, "UPDATE tbl_undian SET status='1', nominal ='$nominal' WHERE id='$ids[$i]'");
}
