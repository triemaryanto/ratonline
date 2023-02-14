<?php
include "koneksi.php";
include "function/fjabatan.php";
session_start();
if (!isset($_SESSION['jabatan'])) {
    header("Location: index.php");
}
$jabatan = $_SESSION['jabatan'];
include "config_chmod.php";
$chmod = $chmenu8;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KSP Dian Mandiri</title>
    <link rel="icon" href="dist/img/logo.png" type="image/png">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
                            <h1>AKSES USER</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Hak Akses</li>
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
                            <div class="col-md-6">
                                <!-- general form elements -->
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">General Setting</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="function/fjabatan.php?act=updateakses" method="POST" enctype="multipart/form-data">
                                        <?php
                                        $userjabatan = $_GET['userjabatan'];
                                        $sql1 = mysqli_query($conn, "SELECT * FROM chmenu where userjabatan = '$userjabatan'");
                                        while ($data = mysqli_fetch_assoc($sql1)) {
                                        ?>
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <input name='id_jabatan' value="<?php echo $data['id_jabatan'] ?>" hidden>
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">Jabatan<span class="text-red"></span></label>
                                                        <div class="col-sm-8"><input type="text" class="form-control" name="userjabatan" value="<?php echo $data['userjabatan'] ?>" Readonly></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">Dasboard<span class="text-red"></span></label>
                                                        <div class="col-sm-8"><input type="number" class="form-control" name="menu1" value="<?php echo $data['menu1'] ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">Materi RAT<span class="text-red"></span></label>
                                                        <div class="col-sm-8"><input type="number" class="form-control" name="menu2" value="<?php echo $data['menu2'] ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">Kehadiran<span class="text-red"></span></label>
                                                        <div class="col-sm-8"><input type="number" class="form-control" name="menu3" value="<?php echo $data['menu3'] ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">Tanggapan<span class="text-red"></span></label>
                                                        <div class="col-sm-8"><input type="number" class="form-control" name="menu4" value="<?php echo $data['menu4'] ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">Data Anggota<span class="text-red"></span></label>
                                                        <div class="col-sm-8"><input type="number" class="form-control" name="menu5" value="<?php echo $data['menu5'] ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">Question<span class="text-red"></span></label>
                                                        <div class="col-sm-8"><input type="number" class="form-control" name="menu6" value="<?php echo $data['menu6'] ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">Manajemen User<span class="text-red"></span></label>
                                                        <div class="col-sm-8"><input type="number" class="form-control" name="menu7" value="<?php echo $data['menu7'] ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">Data Jabatan<span class="text-red"></span></label>
                                                        <div class="col-sm-8"><input type="number" class="form-control" name="menu8" value="<?php echo $data['menu8'] ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">Undian<span class="text-red"></span></label>
                                                        <div class="col-sm-8"><input type="number" class="form-control" name="menu8" value="<?php echo $data['menu9'] ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">Data Undian<span class="text-red"></span></label>
                                                        <div class="col-sm-8"><input type="number" class="form-control" name="menu8" value="<?php echo $data['menu10'] ?>"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <label class="col-sm-3 control-label text-right">Kategori Nominal<span class="text-red"></span></label>
                                                        <div class="col-sm-8"><input type="number" class="form-control" name="menu8" value="<?php echo $data['menu11'] ?>"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <input type="submit" name="submit" class="btn btn-primary " value="Update">
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title">Info Hak Akses</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        Tulis angka 0 untuk hak akses tidak bisa semua .
                                        <br>
                                        Tulis angka 1 untuk hak akses baca dan report.
                                        <br>
                                        Tulis angka 2 untuk hak akses baca dan tambah .
                                        <br>
                                        Tulis angka 3 untuk hak akses baca, tambah, dan edit .
                                        <br>
                                        Tulis angka 4 untuk hak akses baca, tambah, edit, dan delete .
                                        <br>
                                        Tulis angka 5 untuk hak akses semua bisa .
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
</body>

</html>