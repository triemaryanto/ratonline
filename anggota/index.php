<?php
include "koneksi.php";
error_reporting (E_ALL ^ E_NOTICE);
$sql = mysqli_query ($conn, "SELECT * FROM tbl_materi");
$sql2 =mysqli_query($conn,"SELECT * FROM tbl_soal ORDER BY id_soal asc ");
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../absensi/");
}
  ?> 

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Rubic landing page.">
    <meta name="author" content="Devcrud">
    <title>RAT ONLINE KSP DIAN MANDIRI</title>
    <!-- font icons -->
    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <!-- Bootstrap + Rubic main styles -->
	<link rel="stylesheet" href="assets/css/rubic.css">
    <style>
   #more { display:none;}
   </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <nav id="scrollspy" class="navbar page-navbar navbar-dark navbar-expand-md fixed-top" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="navbar-brand" ><strong class="text-primary">Hallo,</strong><span class="text-light"> <?php echo "$_SESSION[nama]"; ?></span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">Dasar Hukum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Materi RAT</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Tanggapan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"  href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="header d-flex justify-content-center">
        <div class="container">
            <div class="row h-100 align-items-center">
                <div class="col-md-12">
                    <div class="header-content">
                        <h3 class="header-title"><strong class="text-info">KSP</strong> <strong class="text-info">DIAN MANDIRI</strong></h3>
                        <h4 class="header-subtitle">RAPAT ANGGOTA TAHUNAN (RAT)</h4>
                        <p>Pengertian RAT
                            <br>RAT atau singkatan dari Rapat Anggota Tahunan merupakan agenda wajib setiap badan usaha koperasi, karena di dalamnya akan dibahas tentang pertanggunjawaban pengurus koperasi selama satu tahun kepada anggota koperasi yang bersangkutan.
                            
                            Semakin banyak anggota yang terlibat maka akan semakin baik dan dapat menghasilkan keputusan sesuai dengan kebutuhan anggota koperasi.
                            Adapun beberapa bahasan utama dalam RAT, di antara lainnya adalah :
                            
                            Laporan keuangan tahun anggaran sebelumnya (masih berkaitan dengan laporan keuangan).
                            Rencana bisnis kedepan (forecasting dan business plan).
                            Voting pengurus baru.</p>
                        
                    </div>  
                </div>
            </div>  
        </div>
    </header>
    <section class="section" id="features">
        <div class="container text-center">
                <h6 class="display-4 has-line">DASAR HUKUM</h6>
                <p class="mb-5 pb-4">Dasar penyelenggaraan Rapat Anggota Tahunan adalah<br>
                    <strong> Menteri Koperasi dan UKM RI Nomor 19/Per/M.KUKM/IX/2015 : </strong></p>
        </div>
        <div class="container b" c="fila">      
        <p><strong>Ketiga Rapat Anggota Tertulis Pasal 15</strong> <br>
            ◉ pengurus menyusun dan mengirimkan bahan rapat secara lengkap, jelas, dan mudah dimengerti oleh seluruh anggota, serta disertai dengan lembaran tanggapan dan atau persetujuan setiap anggota, yang dilengkapi dengan bukti tanda terima setiap anggota atau kelompok;
            <span class="a">...</span><span class="more" style="display: none;">
            <br>
            ◉ kepada para anggota diberi waktu paling lama 14 (empat belas) hari sejak bahan tersebut diterima untuk memberikan jawaban dari perseorangan dengan menyertakan jawaban masing-masing anggota, yangdisertai daftar hadir yang ditandatangani oleh masingmasing anggota;
            pengurus meneliti, membuat berita acara, dan menyusun hasil tanggapan anggota atau kelompok dan membuat kesimpulan;
            <br>
            ◉ keputusan atau kesimpulan yang dibuat oleh panitia sah dan mengikat apabila jumlah jawaban anggota yang masuk mencapai kuorum;dan
            kesimpulan atau keputusan sah diterima apabila disetujui atau ditolak oleh sejumlah anggota yang memberikan jawaban sesuai dengan ketentuan dalam Anggaran Dasar/Anggaran Rumah Tangga
            
            <br><br><strong>Bagian Keempat Rapat Anggota Melalui Media Elektronik Pasal 16</strong>
            <br>Rapat Anggota dapat juga dilakukan melalui media telekonferensi, video konferensi, atau sarana media elektronik lainnya yang memungkinkan semua peserta saling melihat dan mendengar serta berpartisipasi langsung dalam Rapat Anggota, dengan ketentuan :
            <br><br>
            ◉ Pengurus menyampaikan materi dan bahan rapat kepada setiap anggota secara lengkap, jelas, dan mudah dimengerti, selambat-lambatnya 7(tujuh) hari sebelum Rapat Anggota dilaksanakan
            <br> ◉ Persyaratan kuorum dan sahnya pengambilan keputusan Rapat Anggota adalah sebagaimana diatur dalam Anggaran Dasar/Anggaran Rumah Tangga/Peraturan Khusus Koperasi.
            <br>◉ Persyaratan sebagaimana dimaksud pada hurufb di atas dihitung berdasarkan jumlah peserta yang mengikuti Rapat Anggota melalui media telekonferensi, video konferensi, atau sarana media elektronik lainnya.
            <br>◉ Rapat Anggota sebagaimana dimaksud pada huruf c wajib dibuatkan risalah rapat yang disetujui dan ditandatangani oleh semua peserta Rapat Anggota.</p>
            <button onclick="readMore('fila')" class="jagoankodemantap btn btn-primary btn-flat btn-xs">Read more</button>               
        </div> 
        </section>
   
    
    <section class="section" id="about">
        <div class="container text-center">
            <h6 class="display-4 has-line">Materi RAT</h6>
            <p class="mb-5 pb-4">Berikut Materi Rat :</p>
            
        </div>   
                <div class="table table-responsive container">
                    <table width='100%'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Materi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
										$no = 0 ;
										while($row = mysqli_fetch_array($sql))
										{
										$no++;
									?>
                            <tr>
                                             <td><?php echo $no; ?></td>
											<td><?php echo $row['judul_materi']; ?></td>  							
											<td><a href="pdfview?name=../diman/file/<?php echo $row['file_materi']; ?>" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-file-pdf"></i> Lihat PDF</a>
											</td>
                            </tr>
                            <?php
                                        }
                                        ?>
                        </tbody>
                    </table>
                </div>
    </section>
    <section class="section" id="contact">
        <div class="container text-center">
            <h6 class="display-4 has-line">Tanggapan RAT TAHUN BUKU 2021</h6>
            <?php
				 $jumlah =mysqli_num_rows($sql2);
				$no = 0;
				while($data = mysqli_fetch_array($sql2)){
                    $id = $data['id_soal'];
                    $no++;
                    
                    ?>
            <form  action="function.php" method="post" enctype="multipart/form-data">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="form-group pb-1 text-left">
                        
                            <p style="color:black"><?php echo $no; ?>.<b> <?php echo $data['soal']; ?> </b></p>
                            <?php $jawaban = mysqli_query($conn,"SELECT * FROM tbl_jawaban where id_anggota = '$_SESSION[username]' AND id_soal = '$id' ");
                             $result=mysqli_fetch_array($jawaban);
                             ?>
                            <?php if($data['kategori']=='ganda') {?>
                                <input type="text"  name="id[<?php echo $data['id_soal']; ?>]" value="<?php echo $data['id_soal']; ?>" hidden>
                            <div class="p-t-20 text-left">
                                <label class="radio-container m-r-55" style="margin-right: 20px;">
                                    <input type="radio"  name="hasil[<?php echo $data['id_soal']; ?>]" value="Setuju"<?php if($result['jawaban']=="Setuju"){ echo "checked";}?>>
                                    
                                    <span class="checkmark"></span>
                                    Setuju
                                </label>
                                <label class="radio-container m-r-55" style="margin-right: 20px;">
                                    <input type="radio"  name="hasil[<?php echo $data['id_soal']; ?>]" value="Tidak Setuju"<?php if($result['jawaban']=="Tidak Setuju"){ echo "checked";}?>>
                                    <span class="checkmark"></span>
                                    Tidak Setuju
                                </label>
                                <label class="radio-container m-r-55"style="margin-right: 20px;">
                                    <input type="radio"  name="hasil[<?php echo $data['id_soal']; ?>]" value="Kosong"<?php if($result['jawaban']=="Kosong"){ echo "checked";}?>>
                                    <span class="checkmark"></span>
                                    Kosong 
                                </label>&nbsp;
                            </div>         
                            <?php  }else{ ?>  
                                <?php
                                $idd_soal = $data['id_soal'];
                                $jawaban2 = mysqli_query($conn,"SELECT * FROM tbl_jawaban where id_anggota = '$_SESSION[username]' and id_soal=$idd_soal");
                                 $result2=mysqli_fetch_array($jawaban2);
                                 $area=$result2['jawaban'];
                                 ?>
                                <input type="text"  name="id[<?php echo $data['id_soal']; ?>]" value="<?php echo $data['id_soal']; ?>" hidden>
                            <textarea name="hasil[<?php echo $data['id_soal']; ?>]" id="" cols="" rows="7" class="form-control" placeholder="Tanggapan / Usulan / Pertanyaan" value=""><?php echo $area; ?></textarea>
                            <?php } ?>
                        </div>
                        <?php }?>
                        <input type="submit" name="simpanhasil" class="form-control btn btn-primary" value="Simpan">
                    </div>
                </div>
            </form>
        </div>
    </section>
    <footer class="footer py-4 bg-dark text-light"> 
        <div class="container text-center">
            <p class="mb-4 small">Copyright <script>document.write(new Date().getFullYear())</script> &copy; <a href="http://www.dianmandiri.id">Dian Mandiri</a></p>
            <div class="social-links">
                <a href="javascript:void(0)" class="link"><i class="ti-facebook"></i></a>
                <a href="javascript:void(0)" class="link"><i class="ti-twitter-alt"></i></a>
                <a href="javascript:void(0)" class="link"><i class="ti-google"></i></a>
                <a href="javascript:void(0)" class="link"><i class="ti-pinterest-alt"></i></a>
                <a href="javascript:void(0)" class="link"><i class="ti-instagram"></i></a>
                <a href="javascript:void(0)" class="link"><i class="ti-rss"></i></a>
            </div>
        </div>
    </footer>
	
	<!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <!-- bootstrap 3 affix -->
	<script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>

    <!-- Rubic js -->
    <script src="assets/js/rubic.js"></script>

    <script>
   function readMore(d) {
    let a = document.querySelector(`.b[c="${d}"] .a`);
    let moreText = document.querySelector(`.b[c="${d}"] .more`);
    let btnText = document.querySelector(`.b[c="${d}"] .jagoankodemantap`);

    if (a.style.display === "none") {
        a.style.display = "inline";
        btnText.textContent = "Read more";
        moreText.style.display = "none";
    } else {
        a.style.display = "none";
        btnText.textContent = "Read less";
        moreText.style.display = "inline";
    }
}
    </script>
</body>
</html>
