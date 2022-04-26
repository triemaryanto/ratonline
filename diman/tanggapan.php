<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['jabatan'])) {
    header("Location: index.php");
}
$jabatan = $_SESSION['jabatan'];
include "config_chmod.php";
$chmod = $chmenu4;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KSP Dian Mandiri</title>
    <link rel="icon" href="dist/img/logo.png" type="image/png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body>
    <div class="wrapper">

        <!-- Main Sidebar Container -->
        <?php 
        include "sidebar.php";
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tanggapan Anggota KSP Dian Mandiri</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Anggota</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <?php
					if ($chmod == '1' || $chmod == '2' || $chmod == '3' || $chmod == '4' || $chmod == '5' || $_SESSION['jabatan'] == 'admin') {
					?>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">

                            <!-- /.card -->

                            <div class="card">
                                <div class="card-body">
                                    <div class="col-12 col-sm-12">
                                        <div class="card card-primary card-outline card-tabs">
                                            <div class="card-header p-0 pt-1 border-bottom-0">
                                                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                                    <!--<li class="nav-item">
                                                        <a class="nav-link active" id="custom-tabs-three-home-tab"
                                                            data-toggle="pill" href="#custom-tabs-three-home" role="tab"
                                                            aria-controls="custom-tabs-three-home"
                                                            aria-selected="true">Pie Chart</a>
                                                    </li> -->
                                                    <li class="nav-item">
                                                        <a class="nav-link active" id="custom-tabs-three-profile-tab"
                                                            data-toggle="pill" href="#custom-tabs-three-profile"
                                                            role="tab" aria-controls="custom-tabs-three-profile"
                                                            aria-selected="false">Table</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="custom-tabs-three-messages-tab"
                                                            data-toggle="pill" href="#custom-tabs-three-messages"
                                                            role="tab" aria-controls="custom-tabs-three-messages"
                                                            aria-selected="false">Pertanyaan Anggota</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                                    <!--<div class="tab-pane fade show active" id="custom-tabs-three-home"
                                                        role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                                                    <iframe class="responsive-iframe" src="tab/pie.php"
                                                                        width="100%" height="500px"></iframe>
                                                    </div>-->
                                                    <div class="tab-pane fade show active"
                                                        id="custom-tabs-three-profile" role="tabpanel"
                                                        aria-labelledby="custom-tabs-three-profile-tab">
                                                        <iframe class="responsive-iframe" src="tab/tanggapantable.php"
                                                            width="100%" height="500px"></iframe>
                                                    </div>
                                                    <div class="tab-pane fade" id="custom-tabs-three-messages"
                                                        role="tabpanel"
                                                        aria-labelledby="custom-tabs-three-messages-tab">
                                                        <iframe class="responsive-iframe" src="tab/pertanyaan.php"
                                                            width="100%" height="500px"></iframe>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
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
            <?php
					} else {
					?>
            <div class="callout callout-danger">
                <h4>Info</h4>
                <b>Hanya user tertentu yang dapat mengakses halaman ini .</b>
            </div>
            <?php
					}
					?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php
        include "footer.php";
        ?>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script><!-- ok -->

    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script><!-- ok -->
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->

    <script type="text/javascript">
    function isi_otomatis() {
        var nim = $("#nim").val();
        $.ajax({
            url: 'proses-ajax.php',
            data: "nim=" + nim,
        }).success(function(data) {
            var json = data,
                obj = JSON.parse(json);
            $('#username').val(obj.username);
        });
    }
    </script>
</body>

</html>