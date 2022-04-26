<?php
include "../koneksi.php";
include "../function/ftanggapan.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Anggota KSP Dian Mandiri</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body>
    <section class="content">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Pertanyaan</th>
                    <th>Tanggapan</th>
                </tr>
            </thead>
            <tbody>
                <?php
										$no = 0 ;
										while($data = mysqli_fetch_array($h))
                                       
										    {
                                                $id_soal = $data['id_soal'];
                                                $result1 = mysqli_query($conn,"SELECT * FROM tbl_jawaban where id_soal = '$id_soal' AND jawaban = 'Setuju'");
                                                $setuju = mysqli_num_rows($result1);
                                                $result2 = mysqli_query($conn,"SELECT * FROM tbl_jawaban where id_soal = '$id_soal' AND jawaban = 'Tidak Setuju'");
                                                $tidak = mysqli_num_rows($result2);
                                                $result3 = mysqli_query($conn,"SELECT * FROM tbl_jawaban where id_soal = '$id_soal' AND jawaban = 'Kosong'");
                                                $kosong = mysqli_num_rows($result3);
										$no++;
									?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td> <?php echo $data['soal']; ?> </td>
                    <td> <?php 
                            $count = mysqli_query($conn, "SELECT count(*) as total FROM tbl_anggota" );
                            $total = mysqli_fetch_assoc($count);
                          //$hasil = $setuju*$legitimasi/implode(" ",$total);
                          $hasil = $setuju*100/implode(" ",$total);
                            //echo $total;
                            echo round($hasil); echo "%";
                            //echo $legitimasi;
                            
                            ?> </td>
                    <td>
                        Setuju : <?php echo $setuju?>
                        <br>
                        Tidak Setuju : <?php echo $tidak?>
                        <br>
                        Kosong : <?php echo $kosong ?>
                    </td>

                </tr>

                <?php 
									        }
                                        ?>
            </tbody>
        </table>

        <!-- /.container-fluid -->
    </section>
    <script src="../plugins/jquery/jquery.min.js"></script><!-- ok -->

    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script><!-- ok -->
    <!-- DataTables  & Plugins -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../plugins/jszip/jszip.min.js"></script>
    <script src="../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
</body>

</html>