<?php
include "koneksi.php";
include "function/fanggota.php";
error_reporting(E_ALL ^ E_NOTICE);
session_start();
if (!isset($_SESSION['jabatan'])) {
    header("Location: index.php");
}
$jabatan = $_SESSION['jabatan'];
include "config_chmod.php";
$chmod = $chmenu5;
if (isset($_POST['caridata'])) {
    $cari = $_POST['cari'];
    $anggota = mysqli_query($conn, "SELECT * FROM tbl_anggota where id_cabang = $cari");
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
                            <h1>Data Anggota</h1>
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

                                            <?php if ($chmod >= 3 || $_SESSION['jabatan'] == 'admin') { ?>
                                                <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#tambah"><i class="fa fa-book"></i> Tambah Anggota</a>
                                            <?php } else {
                                            } ?>
                                            <div class="row mb-12">
                                                <div class=" text-center col-sm-12">
                                                    <?php
                                                    $cab = mysqli_query($conn, "SELECT * FROM tbl_cabang where id_cabang = $cari");
                                                    ?>
                                                    <?php
                                                    if ($cari == null) {
                                                        echo "";
                                                    ?>

                                                        <?php } else {
                                                        while ($pilih = mysqli_fetch_array($cab)) {  ?>
                                                            <h1> Wilayah <?php echo $pilih['nama_cabang']; ?></h1>

                                                    <?php }
                                                    } ?>
                                                </div>
                                                <?php
                                                if ($cari == null) {
                                                    echo "";
                                                ?>

                                                <?php } else { ?>
                                                    <div class=" text-center col-sm-4">
                                                        <?php
                                                        $total = mysqli_query($conn, "SELECT count(*) as total FROM tbl_anggota where id_cabang = $cari");
                                                        ?>
                                                        <?php
                                                        while ($total1 = mysqli_fetch_array($total)) {  ?>
                                                            <h1> Total Anggota : <?php echo $total1['total'] ?></h1>
                                                        <?php }
                                                        ?>
                                                    </div>
                                                    <div class=" text-center col-sm-4">
                                                        <?php
                                                        $hadir = mysqli_query($conn, "SELECT count(*) as totalhadir FROM tbl_anggota where id_cabang = $cari and kehadiran='Hadir'");
                                                        ?>
                                                        <?php
                                                        while ($hasil1 = mysqli_fetch_array($hadir)) {  ?>
                                                            <h1> Hadir : <?php echo $hasil1['totalhadir'] ?></h1>
                                                        <?php }
                                                        ?>
                                                    </div>
                                                    <div class=" text-center col-sm-4">
                                                        <?php
                                                        $tidak = mysqli_query($conn, "SELECT count(*) as totaltidak FROM tbl_anggota where id_cabang = $cari and kehadiran='Tidak Hadir'");
                                                        ?>
                                                        <?php
                                                        while ($hasil2 = mysqli_fetch_array($tidak)) {  ?>
                                                            <h1> Tidak Hadir : <?php echo $hasil2['totaltidak'] ?></h1>
                                                    <?php }
                                                    }
                                                    ?>

                                                    </div>
                                            </div>
                                            <div class="card card-primary">

                                                <!-- /.card-header -->
                                                <!-- form start -->
                                                <form action="#" method="POST" enctype="multipart/form-data">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label>Cari Wilayah :</label>
                                                            <select class="form-control form-control-sm" name="cari">
                                                                <option value="0">--</option>
                                                                <?php
                                                                $cab = mysqli_query($conn, "SELECT * FROM tbl_cabang");
                                                                while ($hcab = mysqli_fetch_array($cab)) {
                                                                ?>

                                                                    <option value="<?= $hcab['id_cabang']; ?>">
                                                                        <?php echo $hcab['nama_cabang']; ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </div>
                                                        <!-- /.card-body -->
                                                        <div class="form-group">
                                                            <button type="submit" name="caridata" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Username</th>
                                                    <th>Nama</th>
                                                    <th>Petugas</th>
                                                    <th>Kelompok</th>
                                                    <th>Alamat</th>
                                                    <th>Status</th>
                                                    <th>Opsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $no = 0;

                                                if ($anggota == null) {
                                                    echo "Pilih Wilayah Dahulu !";
                                                } else {
                                                    while ($row = mysqli_fetch_array($anggota)) {
                                                        $no++;
                                                ?>
                                                        <tr>
                                                            <td><?php echo $no; ?></td>
                                                            <td><?php echo $row['username']; ?></a></td>
                                                            <td><?php echo $row['nama']; ?></td>
                                                            <td><?php echo $row['po']; ?></td>
                                                            <td><?php echo $row['kelompok']; ?></td>
                                                            <td><?php echo $row['alamat']; ?></td>
                                                            <td><?php echo $row['kehadiran']; ?></td>
                                                            <td>

                                                                <?php if ($chmod >= 2 || $_SESSION['jabatan'] == 'admin') { ?>
                                                                    <a href='editanggota.php?id_anggota=<?php echo $row['id_anggota']; ?>' class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil-square"></i> Edit</a>
                                                                <?php } else {
                                                                } ?>

                                                                <?php if ($chmod >= 4 || $_SESSION['jabatan'] == 'admin') { ?>
                                                                    <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#delete<?php echo $no; ?>"><i class="fa fa-trash"></i> Delete</a>
                                                                <?php } else {
                                                                } ?>
                                                            </td>
                                                        </tr>
                                                        <!-- modal delete -->
                                                        <div class="example-modal">
                                                            <div id="delete<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h3 class="modal-title">Konfirmasi Delete ?</h3>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <h4 align="center">Apakah anda yakin ingin
                                                                                menghapus<strong><span class="grt"></span></strong>
                                                                                ?</h4>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                                                            <a href="function/fanggota.php?act=delete&id_anggota=<?php echo $row['id_anggota']; ?>&nama=<?php echo $row['nama']; ?>" class="btn btn-primary">Delete</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- modal delete -->

                                                        <!-- modal update user -->
                                                        <div class="example-modal">
                                                            <div id="update<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">

                                                                            <h3 class="modal-title">Edit Anggota</h3>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="function/fanggota.php?act=update" method="POST" enctype="multipart/form-data">
                                                                                <?php
                                                                                $id_anggota = $row['id_anggota'];
                                                                                $query = "SELECT * FROM tbl_anggota WHERE id_anggota='$id_anggota'";
                                                                                $result = mysqli_query($conn, $query);
                                                                                while ($data = mysqli_fetch_assoc($result)) {
                                                                                ?>

                                                                                    <input type="text" class="form-control" name="id" value="<?php echo $data['id_anggota']; ?>">
                                                                                    <input type="text" class="form-control" name="kehadiran" value="<?php echo $data['kehadiran']; ?>">

                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-3 control-label text-left">Username<span class="text-red"></span></label>
                                                                                            <label class="col-sm-1 control-label text-rigth">:<span class="text-red"></span></label>
                                                                                            <div class="col-sm-7"><input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>" readonly>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-3 control-label text-left">Nama<span class="text-red"></span></label>
                                                                                            <label class="col-sm-1 control-label text-rigth">:<span class="text-red"></span></label>
                                                                                            <div class="col-sm-7"><input type="text" class="form-control" name="nama" value="<?php echo $data['nama']; ?>" readonly>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-3 control-label text-left">Kelompok<span class="text-red"></span></label>
                                                                                            <label class="col-sm-1 control-label text-rigth">:<span class="text-red"></span></label>
                                                                                            <div class="col-sm-7"><input type="text" class="form-control" name="kelompok" value="<?php echo $data['kelompok']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-3 control-label text-left">Petugas<span class="text-red"></span></label>
                                                                                            <label class="col-sm-1 control-label text-rigth">:<span class="text-red"></span></label>
                                                                                            <div class="col-sm-7"><input type="text" class="form-control" name="po" value="<?php echo $data['po']; ?>">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-3 control-label text-left">Alamat<span class="text-red"></span></label>
                                                                                            <label class="col-sm-1 control-label text-rigth">:<span class="text-red"></span></label>
                                                                                            <div class="col-sm-7"><textarea class="form-control" name="alamat">
                                                                                    <?php echo $data['alamat']; ?></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group">
                                                                                        <div class="row">
                                                                                            <label class="col-sm-3 control-label text-left">Wilayah<span class="text-red"></span></label>
                                                                                            <label class="col-sm-1 control-label text-rigth">:<span class="text-red"></span></label>
                                                                                            <div class="col-sm-7">
                                                                                                <select name="cabang" class="form-control form-control-sm" readonly>
                                                                                                    <?php
                                                                                                    $cabang = $row['id_cabang'];
                                                                                                    $query3 = mysqli_query($conn, "SELECT * FROM tbl_cabang where id_cabang = '$cabang'");
                                                                                                    while ($row3 = mysqli_fetch_array($query3)) {
                                                                                                    ?>
                                                                                                        <option value="<?= $row3['id_cabang']; ?>">
                                                                                                            <?php echo $row3['nama_cabang']; ?>
                                                                                                        </option>
                                                                                                    <?php } ?>
                                                                                                    <?php
                                                                                                    $query2 = mysqli_query($conn, "SELECT * FROM tbl_cabang");
                                                                                                    while ($row2 = mysqli_fetch_array($query2)) {
                                                                                                    ?>
                                                                                                        <option value="<?= $row2['id_cabang']; ?>">
                                                                                                            <?php echo $row2['nama_cabang']; ?>
                                                                                                        </option>
                                                                                                    <?php } ?>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="modal-footer">
                                                                                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                                                        <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                                                                    </div>
                                                                            <?php
                                                                                }
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
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="function/fanggota.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Username<span class="text-red"></span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="username" placeholder="username/id" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">nama<span class="text-red"></span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="nama" placeholder="nama" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Petugas<span class="text-red"></span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="po" placeholder="Petugas" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">kelompok<span class="text-red"></span></label>
                                                    <div class="col-sm-8">
                                                        <input type="text" class="form-control" name="kelompok" placeholder="kelompok" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Wilayah<span class="text-red"></span></label>
                                                    <div class="col-sm-8">
                                                        <select name="cabang" class="form-control form-control-sm">
                                                            <?php
                                                            $query2 = mysqli_query($conn, "SELECT * FROM tbl_cabang");
                                                            while ($row2 = mysqli_fetch_array($query2)) {
                                                            ?>
                                                                <option value="<?= $row2['id_cabang']; ?>">
                                                                    <?php echo $row2['nama_cabang']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
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
                "lengthChange": true,
                "autoWidth": true,
                "buttons": ["excel", "pdf"]
                //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        });
    </script>
</body>

</html>