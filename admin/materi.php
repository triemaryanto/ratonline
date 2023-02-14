<?php
include "koneksi.php";
include "function/fmateri.php";
session_start();
if (!isset($_SESSION['jabatan'])) {
    header("Location: index.php");
}
$jabatan = $_SESSION['jabatan'];
include "config_chmod.php";
$chmod = $chmenu2;
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
                            <h1>Menu Materi</h1>
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
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="card-tittle">
                                        <?php if ($chmod >= 2 || $_SESSION['jabatan'] == 'admin') { ?>
                                        <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal"
                                            data-target="#tambah"><i class="fa fa-book"></i> Tambah Materi</a>
                                        <?php } else {
														} ?>
                                    </div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Judul</th>
                                                <th>Hasil</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
										$no = 0 ;
										while($row = mysqli_fetch_array($materi))
										    {
										$no++;
									?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $row['judul_materi']; ?></a></td>
                                                <td> <a target='_blank'
                                                        href="../anggota/pdfview.php?name=../diman/file/<?php echo $row['file_materi']; ?>"
                                                        class="btn btn-primary btn-flat btn-xs"><i
                                                            class="fa fa-file-pdf"></i> Lihat PDF</a></td>
                                                <td>
                                                    <?php if ($chmod >= 3 || $_SESSION['jabatan'] == 'admin') { ?>
                                                    <a href="#" class="btn btn-primary btn-flat btn-xs"
                                                        data-toggle="modal" data-target="#update<?php echo $no; ?>"><i
                                                            class="fa fa-pencil-square"></i> Edit</a>
                                                    <?php } else {
														} ?>

                                                    <?php if ($chmod >= 4 || $_SESSION['jabatan'] == 'admin') { ?>
                                                    <a href="#" class="btn btn-danger btn-flat btn-xs"
                                                        data-toggle="modal" data-target="#delete<?php echo $no; ?>"><i
                                                            class="fa fa-trash"></i> Delete</a>
                                                    <?php } else {
														} ?>
                                                </td>
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
                                                                <a href="function/fmateri.php?act=delete&id_materi=<?php echo $row['id_materi']; ?>&file_materi=<?php echo $row['file_materi']; ?>"
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

                                                                <h3 class="modal-title">Edit Materi</h3>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="function/fmateri.php?act=update"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    <?php
																		$id_materi = $row['id_materi'];
																		$query = "SELECT * FROM tbl_materi WHERE id_materi='$id_materi'";
																		$result = mysqli_query($conn, $query);
																		while ($row = mysqli_fetch_assoc($result)) {
																		?>

                                                                    <input type="text" class="form-control"
                                                                        name="id_materi"
                                                                        value="<?php echo $row['id_materi']; ?>" hidden>

                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-3 control-label text-right">Judul
                                                                                Materi <span
                                                                                    class="text-red"></span></label>
                                                                            <div class="col-sm-8"><input type="text"
                                                                                    class="form-control"
                                                                                    name="judul_materi"
                                                                                    value="<?php echo $row['judul_materi']; ?>">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <label
                                                                                class="col-sm-3 control-label text-right"><span
                                                                                    class="text-red"></span></label>
                                                                            <div class="col-sm-8"><input type="file"
                                                                                    name="file_materi"></div>
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
                <!-- /.container-fluid -->
                <div class="example-modal">
                <div id="tambah" class="modal fade" role="dialog" style="display:none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">

                                <h3 class="modal-title">Tambah Materi</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="function/fmateri.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right">Judul
                                                Materi<span class="text-red"></span></label>
                                            <div class="col-sm-8">
                                                <input type="text" class="form-control" name="judul_materi"
                                                    placeholder="Judul Materi" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <label class="col-sm-3 control-label text-right"><span
                                                    class="text-red"></span></label>
                                            <div class="col-sm-8"><input type="file" name="file_materi" required></div>
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
            </div><!-- modal insert close -->
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