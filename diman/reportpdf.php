<?php
include('koneksi.php');
require_once("dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
session_start();
$id_cabang = $_SESSION['id_cabang'];
$setting = mysqli_query($conn,"SELECT * FROM tbl_setting");
while($row1 = mysqli_fetch_array($setting))
	{
        $status = $row1['id_rat']; 
    }
date_default_timezone_set('Asia/Jakarta');
$tgl = date("d/m/Y");
$query = mysqli_query($conn,"SELECT tbl_anggota.username, tbl_anggota.nama, tbl_anggota.alamat, tbl_absensi.status, tbl_absensi.tgl, tbl_absensi.jam, tbl_absensi.ttd FROM tbl_anggota INNER JOIN tbl_absensi ON tbl_anggota.username = tbl_absensi.username where tbl_absensi.id_rat = '$status' AND tbl_anggota.id_cabang=$id_cabang");
$html = '<table id="cssTable" border="0" width="100%" height="100" >
 <tr>
 <th width="100px"><img src="dist/img/ksp.png" width="130px" background="white"/></th>
 <th  align="center" width="380px"><h3>RAT KSP DIAN MANDIRI<br/>Kehadiran Anggota</h3></th>
 <th align-text= "left"><h6>Tangerang,<br/> '.$tgl.'</h6></th>
 </tr>
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
<th>Ttd</th>
</tr>';
$no = 1;
while($row = mysqli_fetch_array($query))
{
 $html .= "<tr>
 <td>".$no."</td>
 <td>".$row['username']."</td>
 <td>".$row['nama']."</td>
 <td>".$row['alamat']."</td>
 <td>".$row['status']."</td>
 <td>".$row['tgl']."</td>
 <td>".$row['jam']."</td>
 <td><img src='../anggota/ttd/".$row['ttd']."' width='50px' height='50px'/></td>
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
?>