<?php
include "../koneksi.php";
include "../function/ftanggapan.php";
error_reporting(E_ALL ^ E_NOTICE);
if(isset($_POST['caridata'])) {
	$cari = $_POST['cari'];
    if($cari==0){
        $anggota = mysqli_query($conn,"SELECT * FROM tbl_anggota INNER JOIN tbl_cabang ON tbl_anggota.id_cabang = tbl_cabang.id_cabang");
    }else{
        $anggota = mysqli_query($conn,"SELECT * FROM tbl_anggota INNER JOIN tbl_cabang ON tbl_anggota.id_cabang = tbl_cabang.id_cabang where tbl_anggota.id_cabang = $cari");
    }
  
}
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
    <title>Dian Mandiri</title>
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
                                    <div class="card-tittle">
                                        <section class="content-header">
                                            <div class="container-fluid">
                                                <div class="row mb-12">
                                                    <div class=" text-center col-sm-12">
                                                        <?php 
                                                        $cab = mysqli_query($conn, "SELECT * FROM tbl_cabang where id_cabang = $cari");
                                                        ?>
                                                        <?php
                                                        if($cari==null){
                                                            echo "";
                                                            ?>
                                                        
                                                        <?php }else{
                                                            while($pilih = mysqli_fetch_array($cab)){  ?>
                                                            <h1> Wilayah <?php echo $pilih['nama_cabang']; ?></h1>
                                                    <?php } 
                                                        }?>
                                                    </div>
                                                </div>
                                            </div><!-- /.container-fluid -->
                                        </section>
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
                                                                                            while($hcab = mysqli_fetch_array($cab)){
                                                                                    ?>

                                                            <option value="<?=$hcab['id_cabang']; ?>">
                                                                <?php echo $hcab['nama_cabang']; ?>
                                                            </option>
                                                            <?php }?>
                                                        </select>
                                                    </div>
                                                    <!-- /.card-body -->
                                                    <div class="form-group">
                                                        <button type="submit" name="caridata"
                                                            class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Username / Id Anggota</th>
                                                <th>Nama</th>
                                                <th>Petugas</th>
                                                <th>Kelompok</th>
                                                <th>Status</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
										$no = 0 ;
										
                                        if ($anggota==null){
                                                echo "Pilih Wilayah Dahulu !";
                                        }else{
                                            while($row = mysqli_fetch_array($anggota))
										    {
										$no++;
									?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $row['username']; ?></a></td>
                                                <td><?php echo $row['nama']; ?></td>
                                                <td><?php echo $row['po']; ?></td>
                                                <td><?php echo $row['kelompok']; ?></td>
                                                <td><?php echo $row['kehadiran']; ?></td>
                                                <td>
                                                    <a href="#" class="btn btn-primary btn-flat btn-xs"
                                                        data-toggle="modal" data-target="#update<?php echo $no; ?>"><i
                                                            class="fa fa-pencil-square"></i> Detail Tanggapan</a>

                                                </td>
                                            </tr>

                                            <!-- modal update user -->
                                            <div class="example-modal">
                                                <div id="update<?php echo $no; ?>" class="modal fade" role="dialog"
                                                    style="display:none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">

                                                                <h3 class="modal-title">Detail Tanggapan</h3>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                            </div>
                                                                    
                                                            <div class="modal-body">
                                                            <h4 ><?php echo $row ['nama'];?> </h4>
                                                            <?php
                                                            $b = 0;
                                                            $id_anggota = $row ['username']; 
                                                            $pertanyaan = mysqli_query($conn, "SELECT * FROM tbl_jawaban INNER JOIN tbl_soal ON tbl_jawaban.id_soal=tbl_soal.id_soal where tbl_jawaban.id_anggota = $id_anggota AND tbl_jawaban.id_rat = $id_rat");
                                                                                                                   
                                                            ?>
                                                            <div class="form-group">
                                                                        <div class="row">
                                                                            <?php if($pertanyaan==null){ 
                                                                                echo "Bekum Melakukan Absensi!";
                                                                            }else{ 
                                                                                while ($row4 = mysqli_fetch_assoc($pertanyaan)){
                                                                                    $b++; 
                                                                                ?>
                                                                <a><b> <?php echo $b; ?>. <?php echo $row4['soal']; ?></b> <br><?php echo $row4['jawaban']; ?> </a>
                                                                <?php } ?>
                                                                        </div>
                                                            </div>
                                                            <?php
                                                            }
                                                            ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- modal update user -->
                                            <?php 
									        }
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
            "lengthChange": false,
            "autoWidth": false,
            //"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
    </script>
</body>

</html>