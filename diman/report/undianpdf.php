<?php
include('../koneksi.php');
require_once("../dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
session_start();
$dataundian = mysqli_query($conn, "SELECT tbl_anggota.username, tbl_anggota.nama, tbl_anggota.kelompok, tbl_cabang.nama_cabang, tbl_undian.nominal FROM tbl_undian
INNER JOIN tbl_anggota ON tbl_undian.anggota_id = tbl_anggota.username INNER JOIN tbl_cabang ON tbl_cabang.id_cabang = tbl_anggota.id_cabang where tbl_undian.status = '1' ORDER BY tbl_cabang.nama_cabang = ASC");
$html = '<table id="cssTable" border="0" width="100%" height="100" >
 <tr>
 <th width="100px"><img src="../dist/img/ksp.jpg" width="130px"/></th>
 <th  align="center" width="380px"><h3>Daftar Pemenang Undian <br/>KSP DIAN MANDIRI</h3></th>
 <th align-text= "left"><h6>Tangerang,<br/> 11 Juni 2022</h6></th>
 </table><br><hr/><br>';

$html .= '<table border="0" width="100%">
<tr>
<th>#</th>
<th>Username</th>
<th>Nama</th>
<th>Kelompok</th>
<th>Cabang</th>
<th>Nominal</th>
</tr>';
$no = 0;
while ($row = mysqli_fetch_array($dataundian)) {
    $no++;
    $html .= "<tr>
    <td>" . $no . "</td>
    <td>" . $row['username'] . "</td>
    <td>" . $row['nama'] . "</td>
    <td>" . $row['kelompok'] . "</td>
    <td>" . $row['nama_cabang'] . "</td>
    <td>" . $row['nominal'] . "</td>
 </tr>";
}

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Data Pemenang.pdf');
