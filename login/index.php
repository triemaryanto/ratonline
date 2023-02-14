<html>

<head>
    <title>RAT KSP Dian Mandiri</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="img/logo.png" />
    <link rel="stylesheet" href="css/menu.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/bgimg.css" />
    <link rel="stylesheet" href="css/font.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />
    <script type="text/javascript" src="js/jquery-1.12.4.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script type="text/javascript" src="cssjs_signature/js/jquery.signature.min.js"></script>
    <script type="text/javascript" src="cssjs_signature/js/jquery.ui.touch-punch.min.js"></script>
    <link rel="stylesheet" type="text/css" href="cssjs_signature/css/jquery.signature.css">

    <style>
        .kbw-signature {
            width: 330px;
            height: 200px;
        }

        #sig canvas {
            width: 100% !important;
            height: auto;
        }
    </style>
</head>

<body onload="getLocation()">
    <div class="background"></div>
    <div class="backdrop"></div>
    <div class="login-form-container" id="login-form">
        <div class="login-form-content">

            <div class="login-form-header">
                <div class="logo">
                    <img src="img/ksp.png" />
                </div>
                <h3>RAT ONLINE</h3>
            </div>
            <!-- <form method="POST" action="#" class="login-form"> -->
            <form method="POST" action="function.php" class="login-form">
                <?php
                //mengambil ip address
                if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                    $ip = $_SERVER['HTTP_CLIENT_IP'];
                }
                //whether ip is from the proxy
                elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
                }
                //whether ip is from the remote address
                else {
                    $ip = $_SERVER['REMOTE_ADDR'];
                }
                echo 'User IP Address - ' . $ip;
                ?>
                <br>
                <a> Koordinat : <span id="slatitude"></span>, <span id="slongitude"></span></a>
                <div class="input-container">
                    <i class="fa fa-user"></i>
                    <input type="text" class="input" name="id" placeholder="No Anggota" required />
                </div>
                <div class="input-container text-center">
                    <a>Tanda Tangan</a>
                    <div id="sig"></div>
                    <br />
                    <button id="clear" type="submit" class="button" style="background:#778899;">Ulangi TTD</button>
                    <textarea id="signature64" name="signed" style="display:none;"></textarea>
                    <textarea name="latitude" id="latitude" hidden></textarea>
                    <textarea name="longitude" id="longitude" hidden></textarea>

                    <textarea name="ip" hidden> <?php echo $ip ?></textarea>
                </div>
                <button class="button" type="submit" value="submit" name="search">
                    LOGIN & ABSEN
                </button>
            </form>
        </div>
    </div>
    <script type="text/javascript">
        //tana tangan
        var sig = $('#sig').signature({
            syncField: '#signature64',
            syncFormat: 'JPEG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });

        //script mengambil longitude dan latitude
        var x = document.getElementById("latitude");
        var z = document.getElementById("slatitude");
        var y = document.getElementById("longitude");
        var w = document.getElementById("slongitude");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                alert('Please Share Your Location');
            }
        }

        function showPosition(position) {
            x.innerHTML = position.coords.latitude;
            y.innerHTML = position.coords.longitude;
            z.innerHTML = position.coords.latitude;
            w.innerHTML = position.coords.longitude;
        }
    </script>
</body>

</html>