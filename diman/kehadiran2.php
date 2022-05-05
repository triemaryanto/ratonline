<?php
include "koneksi.php";
include "function/fkehadiran.php";
session_start();
if (!isset($_SESSION['jabatan'])) {
    header("Location: index.php");
}
$jabatan = $_SESSION['jabatan'];
include "config_chmod.php";
$chmod = $chmenu5;

if(isset($_POST['tombolreport'])) {
    $id_cabang = $_SESSION['id_cabang'];
	 header("Location: reportpdf.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dian Mandiri</title>
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
                            <h1>Data Anggota</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Anggota </li>
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
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="card-tittle">
                                        <?php if ($chmod >= 2 || $_SESSION['jabatan'] == 'admin') { ?>
                                            <form action="" method="POST">
                                            <input type="submit" name="tombolreport" class="btn btn-primary" value="Report PDF">
                                            </form>
                                       <?php } else {
														} ?>
                                    </div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Username</th>
                                                <th>Nama</th>
                                                <th>alamat</th>
                                                <th>Status</th>
                                                <th>Tgl</th>
                                                <th>Jam</th>
                                                <th>Ttd</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
										$no = 0 ;
										while($row = mysqli_fetch_array($kehadiran))
										    {
										$no++;
									?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['alamat']; ?></td>
                                                <td><?php echo $row['status']; ?></td>
                                                <td><?php echo $row['tgl']; ?></td>
                                                <td><?php echo $row['jam']; ?></td>
                                                <td><img src="../anggota/ttd/<?php echo $row['ttd']; ?>" width="50px" height="50px"></td>
                                            </tr>
                                            <!-- modal delete -->
                                            <div class="example-modal">
                                                <div id="delete<?php echo $no; ?>" class="modal fade" role="dialog"
                                                    style="display:none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="modal-title">Konfirmasi Delete ?</h3>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4 align="center">Apakah anda yakin ingin
                                                                    menghapus<strong><span class="grt"></span></strong>
                                                                    ?</h4>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button id="nodelete" type="button"
                                                                    class="btn btn-danger pull-left"
                                                                    data-dismiss="modal">Cancel</button>
                                                                <a href="function/fanggota.php?act=delete&id_anggota=<?php echo $row['id_anggota']; ?>&nama=<?php echo $row['nama'];?>"
                                                                    class="btn btn-primary">Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- modal delete -->

                                            <!-- modal update user -->
                                            <div class="example-modal">
                                                <div id="update<?php echo $no; ?>" class="modal fade" role="dialog"
                                                    style="display:none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <h3 class="modal-title">Edit Anggota</h3>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="function/fanggota.php?act=update"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    <?php
																		$id_anggota = $row['id_anggota'];
																		$query = "SELECT * FROM tbl_anggota WHERE id_anggota='$id_anggota'";
																		$result = mysqli_query($conn, $query);
																		while ($row = mysqli_fetch_assoc($result)) {
																		?>

                                                                    <input type="text" class="form-control"
                                                                        name="id_anggota"
                                                                        value="<?php echo $row['id_anggota']; ?>"
                                                                        hidden>

                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-3 control-label text-left">Username<span
                                                                                    class="text-red"></span></label>
                                                                            <label
                                                                                class="col-sm-1 control-label text-rigth">:<span
                                                                                    class="text-red"></span></label>
                                                                            <div class="col-sm-7"><input type="text"
                                                                                    class="form-control" name="username"
                                                                                    value="<?php echo $row['username']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-3 control-label text-left">Nama<span
                                                                                    class="text-red"></span></label>
                                                                            <label
                                                                                class="col-sm-1 control-label text-rigth">:<span
                                                                                    class="text-red"></span></label>
                                                                            <div class="col-sm-7"><input type="text"
                                                                                    class="form-control" name="nama"
                                                                                    value="<?php echo $row['nama']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-3 control-label text-left">Kelompok<span
                                                                                    class="text-red"></span></label>
                                                                            <label
                                                                                class="col-sm-1 control-label text-rigth">:<span
                                                                                    class="text-red"></span></label>
                                                                            <div class="col-sm-7"><input type="text"
                                                                                    class="form-control" name="kelompok"
                                                                                    value="<?php echo $row['kelompok']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-3 control-label text-left">Petugas<span
                                                                                    class="text-red"></span></label>
                                                                            <label
                                                                                class="col-sm-1 control-label text-rigth">:<span
                                                                                    class="text-red"></span></label>
                                                                            <div class="col-sm-7"><input type="text"
                                                                                    class="form-control" name="po"
                                                                                    value="<?php echo $row['po']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-3 control-label text-left">Wilayah<span
                                                                                    class="text-red"></span></label>
                                                                            <label
                                                                                class="col-sm-1 control-label text-rigth">:<span
                                                                                    class="text-red"></span></label>
                                                                            <div class="col-sm-7">
                                                                                <select name="cabang"
                                                                                    class="form-control form-control-sm">
                                                                                    <?php 
                                                                                    $cabang = $row['id_cabang'];
                                                                                            $query3 = mysqli_query($conn, "SELECT * FROM tbl_cabang where id_cabang = '$cabang'");
                                                                                            while($row3 = mysqli_fetch_array($query3)){
                                                                                    ?>
                                                                                    <option
                                                                                        value="<?=$row3['id_cabang']; ?>">
                                                                                        <?php echo $row3['nama_cabang']; ?>
                                                                                    </option>
                                                                                    <?php }?>
                                                                                    <?php
                                                                                            $query2 = mysqli_query($conn, "SELECT * FROM tbl_cabang"); while($row2 = mysqli_fetch_array($query2)){
                                                                                    ?>
                                                                                    <option
                                                                                        value="<?=$row2['id_cabang']; ?>">
                                                                                        <?php echo $row2['nama_cabang']; ?>
                                                                                    </option>
                                                                                    <?php }?>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                            class="btn btn-danger pull-left"
                                                                            data-dismiss="modal">Batal</button>
                                                                        <input type="submit" name="submit"
                                                                            class="btn btn-primary" value="Update">
                                                                    </div>
                                                                    <?php
																		}
																		?>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- modal update user -->
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
                <div class="example-modal">
                    <div id="tambah" class="modal fade" role="dialog" style="display:none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">

                                    <h3 class="modal-title">Tambah Anggota</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form action="function/fanggota.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">Username<span
                                                        class="text-red"></span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="username"
                                                        placeholder="username/id" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">nama<span
                                                        class="text-red"></span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="nama"
                                                        placeholder="nama" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">Petugas<span
                                                        class="text-red"></span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="po"
                                                        placeholder="Petugas" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">kelompok<span
                                                        class="text-red"></span></label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" name="kelompok"
                                                        placeholder="kelompok" value="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <label class="col-sm-3 control-label text-right">Wilayah<span
                                                        class="text-red"></span></label>
                                                <div class="col-sm-8">
                                                    <select name="cabang" class="form-control form-control-sm">
                                                        <?php 
                                                                                            $query2 = mysqli_query($conn, "SELECT * FROM tbl_cabang");
                                                                                            while($row2 = mysqli_fetch_array($query2)){
                                                                                    ?>
                                                        <option value="<?=$row2['id_cabang']; ?>">
                                                            <?php echo $row2['nama_cabang']; ?>
                                                        </option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button id="nosave" type="button" class="btn btn-danger pull-left"
                                                data-dismiss="modal">Batal</button>
                                            <input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
                                        </div>
                                    </form>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- modal insert close -->
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
    <!-- Page specific script -->
    <script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
    </script>
</body>

</html>