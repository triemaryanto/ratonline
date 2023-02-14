<?php
include "koneksi.php";
session_start();
if (!isset($_SESSION['jabatan'])) {
    header("Location: index.php");
}
$jabatan = $_SESSION['jabatan'];
include "config_chmod.php";
$chmod = $chmenu5;
if(isset($_POST['update']))
{   
    $id_anggota = $_POST['id_anggota'];
    $user = $_POST['user'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $kelompok = $_POST['kelompok'];
    $po = $_POST['po'];
    $id_cabang = $_POST['id_cabang'];
    $kehadiran = $_POST['kehadiran'];
        
    // update user data
    $result = mysqli_query($conn, "UPDATE tbl_anggota SET username = '$user', nama = '$nama', alamat = '$alamat', kelompok = '$kelompok', po = '$po', kehadiran = '$kehadiran', id_cabang = '$id_cabang' WHERE id_anggota = $id_anggota");
    echo "<script>alert('Data berhasil diubah.');history.go(-2)</script>";
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id_anggota = $_GET['id_anggota'];
 
// Fetech user data based on id
$result = mysqli_query($conn, "SELECT * FROM tbl_anggota WHERE id_anggota=$id_anggota");
 
while($data = mysqli_fetch_array($result))
{
    $id_anggota = $data['id_anggota'];
    $user = $data['username'];
    $nama = $data['nama'];
    $alamat = $data['alamat'];
    $kelompok = $data['kelompok'];
    $po = $data['po'];
    $id_cabang = $data['id_cabang'];
    $kehadiran = $data['kehadiran'];
}
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
                            <h1>Menu Edit</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Edit Anggota</li>
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
                                    <h3 class="card-title">Edit Data</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <br>
                                <form name="update" method="post" action="editanggota.php">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Username
                                                <span class="text-red"></span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="user" class="form-control"
                                                    value=<?php echo $user;?> readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Nama
                                                <span class="text-red"></span></label>
                                            <div class="col-sm-8">
                                                <input type="text" name="nama" class="form-control"
                                                    value='<?php echo $nama;?>'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Alamat
                                                <span class="text-red"></span></label>
                                            <div class="col-sm-8">
                                            <textarea type="text" name="alamat" class="form-control"><?php echo $alamat;?></textarea> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Kelompok
                                                <span class="text-red"></span></label>
                                            <div class="col-sm-8">
                                            <input type="text" name="kelompok" class="form-control"
                                                    value='<?php echo $kelompok;?>'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">PO
                                                <span class="text-red"></span></label>
                                            <div class="col-sm-8">
                                            <input type="text" name="po" class="form-control"
                                                    value='<?php echo $po;?>'>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="id_cabang" value=<?php echo $id_cabang;?>>
                                    <input type="hidden" name="kehadiran" value=<?php echo $kehadiran;?>>
                                    <input type="hidden" name="id_anggota" value=<?php echo $id_anggota;?>>
                                    <div class="modal-footer">
                                                                        <input type="submit" name="update"
                                                                            class="btn btn-primary" value="Simpan">
                                                                    </div>

                                </form>

                            </div>
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