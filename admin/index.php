<?php

include "koneksi.php";
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if (isset($_POST['search'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'");
    $cek = mysqli_num_rows($sql);
    while ($row = mysqli_fetch_array($sql)) {
        $kehadiran = $row['kehadiran'];
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama'] = $row['nama'];
        $_SESSION['jabatan'] = $row['jabatan'];
        $_SESSION['id_cabang'] = $row['id_cabang'];
    }

    if ($cek) {
        echo "<script>alert('Gocha.');window.location='home.php';</script>";
    } else {
        echo "<script>alert('Username dan Password Salah .');window.location='index.php';</script>";
    }
}
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>KSP Dian Mandiri</title>
    <link rel="icon" href="dist/img/logo.png" type="image/png">
    <link rel="stylesheet" href="css_login/style.default.css" type="text/css" />
    <link rel="shortcut icon" href="Logo Diman Bhs oke.ico" />

</head>

<body class="loginpage" style="background:url(dist/img/bac.jpg)">

    <div class="loginpanel">
        <div class="loginpanelinner">
            <div class="logo animate0 bounceIn"><img src="dist/img/ksp.png" alt="" width="200px" /></div>
            <form id="login" action="#" method="post">
                <div class="inputwrapper login-alert">
                    <div class="alert alert-error">Username Dan Password Masih Kosong</div>
                </div>
                <div class="inputwrapper animate1 bounceIn">
                    <input type="text" name="username" id="username" placeholder="Username" />
                </div>
                <div class="inputwrapper animate2 bounceIn">
                    <input type="password" name="password" id="password" placeholder="Password" />
                </div>
                <div class="inputwrapper animate3 bounceIn">
                    <button type="submit" value="submit" name="search">LOGIN</button>
                </div>
            </form>
        </div><!--loginpanelinner-->
    </div><!--loginpanel-->
</body>

</html>