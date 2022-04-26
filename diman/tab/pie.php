<?php
include "../koneksi.php";
include "../function/ftanggapan.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tanggapan Anggota</title>

    <script src="../plugins/piejs/loader.js"></script>
    <?php foreach ($soal_soal as $id_soal => $data_chart) : ?>
    <script type="text/javascript">
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        const $chart = document.querySelector('#piechart<?= $id_soal ?>')
        const data = google.visualization.arrayToDataTable([
            ['jawaban', 'Tanggapan'],
            <?php  
    $pie3 = mysqli_query($conn, "SELECT tbl_jawaban.jawaban, count(*) as Tanggapan FROM tbl_jawaban INNER JOIN tbl_soal ON tbl_jawaban.id_soal = tbl_soal.id_soal where tbl_soal.id_soal = '$id_soal' AND tbl_soal.kategori = 'ganda' GROUP BY tbl_jawaban.jawaban"); 
    while($row3 = mysqli_fetch_array($pie3))  
    {  
    echo "['".$row3["jawaban"]."', ".$row3["Tanggapan"]."],";  
    }  
    ?>
        ]);

        const options = {
            title: 'Hasil Tanggapan',
            width: '100%',
            height: '250px'
        };

        //css 
        options.chartArea = {
            left: '20%',
            top: '30%',
            width: "100%",
            height: "250px"
        };

        //create trigger to resizeEnd event     
        $(window).resize(function() {
            if (this.resizeTO) clearTimeout(this.resizeTO);
            this.resizeTO = setTimeout(function() {
                $(this).trigger('resizeEnd');
            }, 500);
        });

        //redraw graph when window resize is completed  
        $(window).on('resizeEnd', function() {
            drawChart(data);
        });

        const chart = new google.visualization.PieChart($chart);
        chart.draw(data, options);
    }
    </script>

    <?php endforeach ?>
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
    <div class="wrapper">

            <!-- Main content -->
            <section class="content">
                    <?php
                                                $no = 0;
                                                while($data = mysqli_fetch_array($h)){
                                                    $no++;
                                                    $id_soal = $data['id_soal'];
                                                    
                                                    ?>
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->

                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"><?php echo $no; ?>.<b>
                                    <?php echo $data['soal']; ?></h6>

                        </div>
                        <!-- Card Body -->
                        <div id="piechart<?= $id_soal ?>" style="width: 100%; height: 250px;"></div>

                    </div>
                    <?php
                                                }
                                                ?>
                <!-- /.container-fluid -->
            </section>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

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
</body>

</html>