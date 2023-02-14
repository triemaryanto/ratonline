<?php
include "../koneksi.php";
include "../function/ftanggapan.php";
error_reporting(E_ALL ^ E_NOTICE);

$setting = mysqli_query($conn, "SELECT * FROM tbl_setting");
while ($row3 = mysqli_fetch_array($setting)){
    $id_rat = $row3['id_rat'];
    }
    $sql2 =mysqli_query($conn,"SELECT * FROM tbl_soal where id_rat='$id_rat' ORDER BY id_soal asc ");
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tanggapan / Usulan / Pertanyaan</title>
    <link rel="icon" href="../dist/img/logo.png" type="image/png">
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
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- /.card -->

                            <div class="card">
                                <!-- /.card-header -->
                                <div class="card-body">
                                        
                                        
                                    <table id="example1" class="table table-bordered table-striped">
                                        
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Nama</th>
                                                <th>Pertanyaan/Usulan/tanggapan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
										$no = 0 ;
                                        $tanya = mysqli_query($conn, "SELECT * FROM tbl_anggota INNER JOIN tbl_jawaban on tbl_anggota.username = tbl_jawaban.id_anggota where tbl_jawaban.id_soal = 8");
                                            while($row6 = mysqli_fetch_array($tanya))
                                            {
										$no++;
									?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $row6['username']; ?></a></td>
                                                <td><?php echo $row6['nama']; ?></td>
                                                <td><?php echo $row6['jawaban']; ?></td>
                                            </tr>
                                            <?php 
                                            }
                                            ?>
                                            </tfoot>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- /.container-fluid -->
            </section>

    <!-- jQuery -->
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
    <!-- Page specific script -->
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "autoWidth": true,
            "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
    </script>
</body>

</html>