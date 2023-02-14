<?php
include "koneksi.php";
include "function/fnominal.php";
session_start();
if (!isset($_SESSION['jabatan'])) {
    header("Location: index.php");
}
$jabatan = $_SESSION['jabatan'];
include "config_chmod.php";
$chmod = $chmenu9;

$query_count = mysqli_query($conn, "SELECT * FROM `tbl_settingundian` INNER JOIN tbl_nominal ON tbl_settingundian.id_nominal = tbl_nominal.id INNER JOIN tbl_cabang ON tbl_settingundian.id_cabang = tbl_cabang.id_cabang;");

$data = array();
$i = 0;
foreach ($query_count as $row) {
    $row_count = $row['row_count'];
    $nama_cabang = $row['nama_cabang'];
    $nominal = $row['nominal'];
    $i++;
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
                            <h1>UNDIAN KSP DIAN MANDIRI</h1>
                            <?php echo " <h1> Jumlah Sekali Putar : $row_count  <br>Wilayah : $nama_cabang <br> Nominal : $nominal </h1> " ?>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">Undian</li>
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
                            <div class="col-lg-12 text-center">
                                <?php if ($chmod >= 5 || $_SESSION['jabatan'] == 'admin') { ?>
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#tambah">Pengaturan Undian</button>
                                    <div id="nomor">
                                        <?php for ($i = 0; $i < $row_count; $i++) {
                                            echo '<h1 id="row_' . $i . '">--</h1>';
                                            echo '<input id="id_' . $i . '" type="hidden">';
                                        } ?>
                                    </div>
                                    <input id="id" type="hidden">
                                    <div id="button">
                                        <button id="start" class="btn btn-lg btn-success" type="button" name="button"><i class="fa fa-play"></i> Start</button>
                                        <button id="stop" class="btn btn-lg btn-danger" type="button" name="button"><i class="fa fa-stop"></i> Stop</button>
                                        <button id="reset" class="btn btn-lg btn-default" type="button" name="button"><i class="fa fa-refresh"></i> Reset</button>
                                    </div>
                                <?php } else {
                                } ?>


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

                                        <h3 class="modal-title">Tambah Anggota</h3>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="function/fsettingundian.php" method="POST" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <div class="row">

                                                    <label class="col-sm-3 control-label text-right">Jumlah Sekali Putar<span class="text-red"></span></label>
                                                    <div class="col-sm-8">
                                                        <input class="form-control form-control-sm" type="number" name="row_count" value="<?= $row_count ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Nominal<span class="text-red"></span></label>
                                                    <div class="col-sm-8">
                                                        <select name="id_nominal" class="form-control form-control-sm">
                                                            <?php
                                                            $query1 = mysqli_query($conn, "SELECT * FROM tbl_settingundian INNER JOIN tbl_nominal ON tbl_settingundian.id_nominal = tbl_nominal.id");
                                                            while ($row2 = mysqli_fetch_array($query1)) {
                                                            ?>
                                                                <option value="<?= $row2['id']; ?>">
                                                                    <?php echo $row2['nominal']; ?>
                                                                </option>
                                                            <?php } ?>
                                                            <?php
                                                            $query1 = mysqli_query($conn, "SELECT * FROM tbl_nominal");
                                                            while ($row2 = mysqli_fetch_array($query1)) {
                                                            ?>
                                                                <option value="<?= $row2['id']; ?>">
                                                                    <?php echo $row2['nominal']; ?>
                                                                </option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <label class="col-sm-3 control-label text-right">Wilayah<span class="text-red"></span></label>
                                                    <div class="col-sm-8">
                                                        <select name="id_cabang" class="form-control form-control-sm">
                                                            <?php
                                                            $query2 = mysqli_query($conn, "SELECT * FROM tbl_settingundian INNER JOIN tbl_cabang ON tbl_settingundian.id_cabang = tbl_cabang.id_cabang");
                                                            while ($row2 = mysqli_fetch_array($query2)) {
                                                            ?>
                                                                <option value="<?= $row2['id_cabang']; ?>">
                                                                    <?php echo $row2['nama_cabang']; ?>
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
                                                <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                                <input type="submit" name="tambah" class="btn btn-primary" value="Simpan">
                                            </div>
                                        </form>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
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
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->

    </script>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
        var i, j, temp, pop, col, chunk = <?= $row_count ?>;
        var rand;
        var idx = [];
        var chosen = [];
        var res = [];

        function getCol(matrix, col) {
            var column = [];

            for (var i = 0; i < matrix.length; i++) {
                column.push(matrix[i][col]);
            }

            return column;
        }

        function chunkArray(myArray, chunk_size) {
            var index = 0;
            var arrayLength = myArray.length;
            var tempArray = [];
            var col = [];
            var res = new Array();

            for (index = 0; index < arrayLength; index += chunk_size) {
                myChunk = myArray.slice(index, index + chunk_size);
                // Do something if you want with the group
                tempArray.push(myChunk);
            }

            for (var i = 0; i < chunk_size; i++) {
                col[i] = getCol(tempArray, i);
            }

            return col;
        }

        function get_random(i) {
            return setInterval(function() {
                var id = Math.floor(Math.random() * pop[i].length);
                $("#row_" + i).html('' + pop[i][id]['nama'] + ' (' + pop[i][id]['kelompok'] + ')') +
                    $("#id_" + i).val(pop[i][id]['id']);
            }, 10);
        }

        //initial hide
        $("#stop").hide();
        $("#reset").hide();

        //starting
        $("#start").click(function() {
            $("#start").hide();
            $("#stop").show();
            $("#info").html("PROCESSING ...");
            $.ajax({
                type: 'post',
                url: 'function/get_data.php',
                dataType: 'json',
                async: 'false',
                success: function(data) {
                    temp = data;
                    if (temp.length == 0) {
                        $("#stop").hide();
                        $("#start").show();
                        for (var i = 0; i < chunk; i++) {
                            $("#row_" + i).html('--');
                            $("#id_" + i).val('');
                        }
                        $("#info").html("CLICK START TO BEGIN");
                        alert('Data Undian sudah habis Pilih Wilayah Lain');
                    } else {
                        pop = chunkArray(temp, chunk);
                        for (var i = 0; i < chunk; i++) {
                            res[i] = get_random(i);
                        }
                    }
                }
            })
        })

        //stopping
        $("#stop").click(function() {
            $("#stop").hide();
            $("#reset").show();

            var ids = new Array();

            for (var i = 0; i < chunk; i++) {
                clearInterval(res[i]);
                ids.push($("#id_" + i).val());
            }

            $.ajax({
                type: 'post',
                url: 'function/fupdateundian.php',
                data: 'id=' + ids,

                success: function() {

                }
            })

            $("#info").html("PEMENANGNYA ADALAH .....");
        })

        $("#reset").click(function() {
            $("#start").show();
            $("#reset").hide();
            for (var i = 0; i < chunk; i++) {
                $("#row_" + i).html('--');
                $("#id_" + i).val('');
            }
            $("#info").html("Mulai Lagi");
        })

        //ini perubahan
    </script>

</body>


</body>

</html>