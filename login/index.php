<?php 

include "koneksi.php";
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if (isset($_POST['search'])) {
  $id = $_POST['id'];
  
  $sql = mysqli_query($kon, "SELECT * FROM tbl_anggota WHERE kelompok='$id'");
  $cek = mysqli_num_rows($sql);
  while($row = mysqli_fetch_array($sql)){
	  $kehadiran=$row['kehadiran'];
      $username=$row['username'];
      $cabang =$row['id_cabang'];
	  $_SESSION['username'] = $row['username'];
	  $_SESSION['nama'] = $row['nama'];
  }
  if(empty($_POST['signed'])){
  }else{
    if($cek){		
		if($kehadiran!="hadir"){
			$folderPath = "upload/";
  $image_parts = explode(";base64,", $_POST['signed']); 
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $hasil = uniqid() . '.'.$image_type;
    $file = $folderPath . $hasil;
    file_put_contents($file, $image_base64);
  date_default_timezone_set('Asia/Jakarta');
  $tgl = date("d/m/Y");
  $jam = date("h:i:sa");
			mysqli_query($kon, "UPDATE tbl_anggota SET kehadiran='hadir', tgl = '$tgl' , jam = '$jam', ttd='$hasil' WHERE username='$username'");
			$sql = mysqli_query($kon, "SELECT * FROM tbl_soal");
			$cek = mysqli_num_rows($sql);
			while($soal = mysqli_fetch_array($sql))
			{
				$id_soal[] = $soal['id_soal'];
				
			}
			$total = $cek;
			for($i=0; $i<$total; $i++){
				mysqli_query($kon, "INSERT INTO tbl_jawaban (id_soal,id_anggota,jawaban) VALUES ('$id_soal[$i]','$username','Kosong')");
			}

			$cek2=mysqli_query($kon,"SELECT * FROM tbl_cabang WHERE id_cabang='$cabang'");
			
			while($data = mysqli_fetch_array($cek2))
		{
			$hadir=$data['total_hadir']+1;
			$tidakhadir=$data['total_tidak_hadir']-1;
			mysqli_query($kon, "UPDATE tbl_cabang SET total_hadir=$hadir, total_tidak_hadir=$tidakhadir WHERE id_cabang=$cabang");
		}
		
				echo "<script>alert('Anda Berhasil login dan Absensi.');window.location='../anggota/index';</script>";
		}else{
				header("Location: ../anggota/index");

		}
		}else{
			echo "<script>alert('Pastikan No Anggota isi dengan benar. Jika Lupa minta bantuan petugas anda ! .');window.location='index';</script>";
	}
}
echo "<script>alert('Tanda Tangan Kosong');window.location='index';</script>";
}
?>
<html>
	<head>
		<title>KSP Dian Mandiri</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="shortcut icon" href="img/logo.png"/>
		<link rel="stylesheet" href="css/menu.css"/>
		<link rel="stylesheet" href="css/main.css"/>
		<link rel="stylesheet" href="css/bgimg.css"/>
		<link rel="stylesheet" href="css/font.css"/>
		<link rel="stylesheet" href="css/font-awesome.min.css"/>
		<script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
		<script type="text/javascript" src="js/main.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet"> 
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
   
    <script type="text/javascript" src="cssjs_signature/js/jquery.signature.min.js"></script>
    <script type="text/javascript" src="cssjs_signature/js/jquery.ui.touch-punch.min.js"></script>
    <link rel="stylesheet" type="text/css" href="cssjs_signature/css/jquery.signature.css">
   
    <style>
        .kbw-signature { width: 330px; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
    </style>
	</head>
<body>
	<div class="background"></div>
	<div class="backdrop"></div>
	<div class="login-form-container" id="login-form">
		<div class="login-form-content">
			<div class="login-form-header">
				<div class="logo">
					<img src="img/ksp.png"/>
				</div>
				<h3>RAT ONLINE</h3>
			</div>
			<form method="POST" action="#" class="login-form">

				<div class="input-container">
					<i class="fa fa-user"></i>
					<input type="text" class="input" name="id" placeholder="No Anggota" required/>
				</div>
				<div class="input-container">
					<a>Tanda Tangan</a>
				<div id="sig"></div>
				<br/>
				<button id="clear" type="submit" class="button" style="background:#778899;">Ulangi TTD</button>
				<textarea id="signature64" name="signed" style="display: none"></textarea>
				</div>
				<button class="button" type="submit" value="submit" name="search">
                            LOGIN & ABSEN
                        </button>
			</form>
		</div>
	</div>
	<script type="text/javascript">
    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });
</script>	
</body>
</html>