<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);

$setting = mysqli_query($conn, "SELECT * FROM tbl_setting");
while ($row3 = mysqli_fetch_array($setting)) {
    $id_rat = $row3['id_rat'];
}
$sql = mysqli_query($conn, "SELECT * FROM tbl_materi where id_rat = '$id_rat'");
$sql2 = mysqli_query($conn, "SELECT * FROM tbl_soal where id_rat='$id_rat' ORDER BY id_soal asc ");
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../login/");
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
        .img {
            border-radius: 50%;
        }

        #more {
            display: none;
        }

        .responsive {
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <nav id="scrollspy" class="navbar page-navbar navbar-dark navbar-expand-md fixed-top" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="navbar-brand"><strong class="text-primary">Hallo,</strong><span class="text-light"> <?php echo "$_SESSION[nama]"; ?></span></a>
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
                        <a class="nav-link" href="logout.php">Logout</a>
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
                        <div></div>
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-md-12">
                                    <img src="../diman/dist/img/3.png" class="responsive">
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <h4 class="header-subtitle">RAPAT ANGGOTA TAHUNAN (RAT)</h4>
                            <p>Pengertian RAT
                                <br>RAT atau singkatan dari Rapat Anggota Tahunan merupakan agenda wajib setiap badan
                                usaha
                                koperasi, karena di dalamnya akan dibahas tentang pertanggunjawaban pengurus koperasi
                                selama
                                satu tahun kepada anggota koperasi yang bersangkutan. Semakin banyak anggota yang
                                terlibat
                                maka akan semakin baik dan dapat menghasilkan keputusan sesuai dengan kebutuhan anggota
                                koperasi. Adapun beberapa bahasan utama dalam RAT, di antara lainnya adalah : Laporan
                                Pertanggung Jawaban Pengurus, Laporan Pertanggung Jawaban Pengawas, Pembahasan Pembagian
                                SHU, Rencana Pendapatan Belanja untuk tahun berikutnya dan termasuk Agenda-agenda lain
                                tentang Perkoperasian.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <section class="section">
        <div class="container">

            <div class="row justify-content-between">
                <div class="col-md-5 align-self-center mb-4 mb-md-0">

                    <img src="assets/imgs/1.png" alt="" class="shadow w-100" style="border-radius:50%;">\
                </div>

                <div class="col-md-6 col-lg-5">
                    <h2>Sindoro Purnomo Hadi. SE</h2>
                    <hr>
                    <h6 class="title">Sambutan Ketua Pengurus</h6>
                    <p>Salam sejahtera untuk kita semua. <br>Terlebih dahulu marilah kita panjatkan puji syukur atas
                        limpahan rahmat, hidayah-Nya kehadirat Allah Yang Maha Kuasa
                        sehingga hari ini kita diberi nikmat dan dalam keadaan sehat wal’afiat.
                        Dalam melaksanakan Rapat Anggota Tahunan Tahun Buku 2021, ini merupakan salah satu bentuk
                        kepatuhan dan tanggung
                        jawab kita sebagai komponen organisasi dalam melaksanakan kewajiban dan hak kita baik sebagai
                        pengurus, pengawas
                        maupun sebagai anggota koperasi.....
                    </p>
                    <a href="pdfview?name=per/ketua.pdf" class="btn btn-primary btn-flat btn-xs" target="_blank"><i class="fa fa-file-pdf"></i> Lihat Lebih</a>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-lg-5 align-self-center">
                    <h3>Daniel Ingatti Manik. SE</h3>
                    <hr>
                    <h6 class="title">Sambutan Ketua Pengawas</h6>
                    <p>Assalamu’alaikum Wr. Wb Dan Salam Sejahtera untuk kita semua.</p>
                    <p>Puji dan syukur kita panjatkan pada Tuhan Yang Maha Kuasa atas segala kebaikan dan rahmatNya buat
                        kita semua
                        keluarga besar Koperasi Simpan Pinjam Dian Mandiri. KSP Dian Mandiri pada kesempatan ini dapat
                        menyelenggarakan
                        Rapat Anggota Tahunan (RAT) Tahun Buku 2021. Laporan RAT Tahun Buku 2021 ini merupakan bentuk
                        tanggung jawab
                        Pengawas dan Pengurus terhadap Rencana Kerja (RK) dan Rencana Anggaran Pendapatan dan Belanja
                        (RAPB) Tahun
                        Buku 2021 yang telah ditetapkan pada RAT tahun sebelumnya....</p>
                    <a href="pdfview.php??name=per/pengawas.pdf" class="btn btn-primary btn-flat btn-xs" target="_blank"><i class="fa fa-file-pdf"></i> Lihat Lebih</a>
                </div>
                <div class="col-md-5 mt-4 mt-md-0">
                    <img src="assets/imgs/2.png" alt="" class="shadow w-100" style="border-radius:50%;">

                </div>
            </div>
        </div>
    </section>
    <section class="section" id="features">
        <div class="container text-center">
            <h6 class="display-4 has-line">DASAR HUKUM</h6>
            <p class="mb-5 pb-4">Dasar penyelenggaraan Rapat Anggota Tahunan adalah<br>
                <strong>Menteri Koperasi dan UKM RI Nomor 19/Per/M.KUKM/IX/2015 : </strong> <br><br>
                <a href="pdfview.php?name=per/mentri.pdf" class="btn btn-primary btn-flat btn-xs" target="_blank"><i class="fa fa-file-pdf"></i> Lihat PDF</a><br><br>
                <strong>Peraturan Khusus RAT Online KSP Dian Mandiri : </strong> <br><br>
                <a href="pdfview.php??name=per/persus.pdf" class="btn btn-primary btn-flat btn-xs" target="_blank"><i class="fa fa-file-pdf"></i> Lihat PDF</a>
            </p>

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
                    $no = 0;
                    while ($row = mysqli_fetch_array($sql)) {
                        $no++;
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['judul_materi']; ?></td>
                            <td><a href="pdfview.php?name=../diman/file/<?php echo $row['file_materi']; ?> " class="btn btn-primary btn-flat btn-xs" target="_blank"><i class="fa fa-file-pdf"></i> Lihat PDF</a>
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
            <?php
            $sql_rat = mysqli_query($conn, "SELECT * FROM tbl_rat where id_rat = '$id_rat'");
            while ($rowrat = mysqli_fetch_array($sql_rat)) {
                $jrat = $rowrat['judul_rat'];
            }
            ?>
            <h6 class="display-4 has-line"><b>Tanggapan RAT <?php echo $jrat; ?></b></h6>

            <?php
            $no = 0;
            while ($data = mysqli_fetch_array($sql2)) {
                $id = $data['id_soal'];
                $no++;

            ?>
                <form action="function.php" method="post" enctype="multipart/form-data">
                    <div class="row mb-4">
                        <div class="col-md-12">
                            <div class="form-group pb-1 text-left">

                                <h5 style="color:black"><?php echo $no; ?>.<?php echo $data['soal']; ?> </h5>
                                <?php $jawaban = mysqli_query($conn, "SELECT * FROM tbl_jawaban where id_anggota = '$_SESSION[username]' AND id_soal = '$id' AND id_rat = '$id_rat'");
                                $result = mysqli_fetch_array($jawaban);
                                ?>
                                <?php if ($data['kategori'] == 'ganda') { ?>
                                    <input type="text" name="id[<?php echo $data['id_soal']; ?>]" value="<?php echo $data['id_soal']; ?>" hidden>
                                    <div class="p-t-20 text-left">
                                        <label class="radio-container m-r-55" style="margin-right: 20px;">
                                            <input type="radio" name="hasil[<?php echo $data['id_soal']; ?>]" value="Setuju" <?php if ($result['jawaban'] == "Setuju") {
                                                                                                                                    echo "checked";
                                                                                                                                } ?> required>

                                            <span class="checkmark"></span>
                                            Setuju
                                        </label>
                                        <label class="radio-container m-r-55" style="margin-right: 20px;">
                                            <input type="radio" name="hasil[<?php echo $data['id_soal']; ?>]" value="Tidak Setuju" <?php if ($result['jawaban'] == "Tidak Setuju") {
                                                                                                                                        echo "checked";
                                                                                                                                    } ?> required>
                                            <span class="checkmark"></span>
                                            Tidak Setuju
                                        </label><!--
                                <label class="radio-container m-r-55"style="margin-right: 20px;">
                                    <input type="radio"  name="hasil[<?php echo $data['id_soal']; ?>]" value="Kosong"<?php if ($result['jawaban'] == "Kosong") {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                                    <span class="checkmark"></span>
                                    Kosong 
                                </label>-->&nbsp;
                                    </div>
                                <?php  } else { ?>
                                    <?php
                                    $idd_soal = $data['id_soal'];
                                    $jawaban2 = mysqli_query($conn, "SELECT * FROM tbl_jawaban where id_anggota = '$_SESSION[username]' and id_soal=$idd_soal");
                                    $result2 = mysqli_fetch_array($jawaban2);
                                    $area = $result2['jawaban'];
                                    ?>
                                    <input type="text" name="id[<?php echo $data['id_soal']; ?>]" value="<?php echo $data['id_soal']; ?>" hidden>
                                    <textarea name="hasil[<?php echo $data['id_soal']; ?>]" id="" cols="" rows="7" class="form-control" placeholder="Tanggapan / Usulan / Pertanyaan" value="" required><?php echo $area; ?></textarea>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <input type="submit" name="simpanhasil" class="form-control btn btn-primary" value="Simpan">
                        </div>
                    </div>
                </form>
        </div>
    </section>
    <footer class="footer py-4 bg-dark text-light">
        <div class="container text-center">
            <p class="mb-4 small">Copyright <script>
                    document.write(new Date().getFullYear())
                </script> &copy; <a href="http://www.dianmandiri.id">Dian Mandiri</a></p>
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

</body>

</html>