<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
session_start();
$id_cabang = $_SESSION['id_cabang'];
$setting = mysqli_query($conn, "SELECT * FROM tbl_setting");
while ($row1 = mysqli_fetch_array($setting)) {
    $status = $row1['id_rat'];
}
$query = mysqli_query($conn, "SELECT tbl_geolocation.ip, tbl_anggota.username, tbl_anggota.nama, tbl_anggota.alamat, tbl_absensi.status, tbl_absensi.tgl, tbl_absensi.jam, tbl_absensi.ttd FROM tbl_anggota INNER JOIN tbl_absensi ON tbl_anggota.username = tbl_absensi.username INNER JOIN tbl_geolocation ON tbl_anggota.username = tbl_geolocation.anggota_id where tbl_absensi.id_rat = '$status'");
$html = '<table id="cssTable" border="0" width="100%" height="100" >
 <tr>
 <th width="100px"><img src="dist/img/ksp.jpg" width="130px"/></th>
 <th  align="center" width="380px"><h3>RAT KSP DIAN MANDIRI<br/>Kehadiran Anggota</h3></th>
 <th align-text= "left"><h6>Tangerang,<br/> 11 Juni 2022</h6></th>
 </table><br><hr/><br>';

$html .= '<table border="0" width="100%">
<tr>
<th>#</th>
<th>Username</th>
<th>Nama</th>
<th>alamat</th>
<th>Status</th>
<th>Tgl</th>
<th>Jam</th>
<th>IP Address</th>
<th>Ttd</th>
</tr>';
$no = 0;
while ($row = mysqli_fetch_array($query)) {
    $no++;
    $html .= "<tr>
 <td>" . $no . "</td>
 <td>" . $row['username'] . "</td>
 <td>" . $row['nama'] . "</td>
 <td>" . $row['alamat'] . "</td>
 <td>" . $row['status'] . "</td>
 <td>" . $row['tgl'] . "</td>
 <td>" . $row['jam'] . "</td>
 <td>" . $row['ip'] . "</td>
 <td><img src='../anggota/ttd/" . $row['ttd'] . "' width='50px' height='50px'/></td>
 </tr>";
    $no++;
}

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('Kehadiran.pdf');
