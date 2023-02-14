<?php

include "koneksi.php";
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if (isset($_POST['search'])) {
    //tbl_anggota
    $id = $_POST['id'];
    $sig = $_POST['signed'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $ip = $_POST['ip'];
    $sql = mysqli_query($kon, "SELECT * FROM tbl_anggota WHERE username='$id'");
    //tblsetting
    $setting = mysqli_query($kon, "SELECT * FROM tbl_setting");

    while ($row3 = mysqli_fetch_array($setting)) {
        $id_rat = $row3['id_rat'];
    }
    //tbl absensi
    $arrive = mysqli_query($kon, "SELECT * FROM tbl_absensi WHERE username='$id' AND id_rat=$id_rat");

    $cek = mysqli_num_rows($sql);
    while ($row = mysqli_fetch_array($sql)) {
        $username = $row['username'];
        $cabang = $row['id_cabang'];
        $_SESSION['username'] = $row['username'];
        $_SESSION['nama'] = $row['nama'];
    }
    while ($row2 = mysqli_fetch_array($arrive)) {
        $user = $row2['username'];
        $status = $row2['status'];
        $rat = $row2['id_rat'];
    }
    if (isset($_POST['search'])) {
        if (empty($_POST['longitude'])) {
            echo "<script>alert('Lokasi mohon di nyalakan');window.location='index.php';</script>";
        } else {
            if (empty($_POST['signed'])) {
                echo "<script>alert('Tanda Tangan Kosong ');window.location='index.php';</script>";
            } else {
                if ($cek) {
                    if (($rat != $id_rat) || ($user != $id)) {
                        $folderPath = "../anggota/ttd/";
                        $image_parts = explode(";base64,", $_POST['signed']);
                        $image_type_aux = explode("image/", $image_parts[0]);
                        $image_type = $image_type_aux[1];
                        $image_base64 = base64_decode($image_parts[1]);
                        $hasil = uniqid() . '.' . $image_type;
                        $file = $folderPath . $hasil;
                        file_put_contents($file, $image_base64);
                        date_default_timezone_set('Asia/Jakarta');
                        $tgl = date("d/m/Y");
                        $jam = date("h:i:sa");
                        mysqli_query($kon, "UPDATE tbl_anggota SET kehadiran='Hadir' where username='$id'");
                        mysqli_query($kon, "INSERT INTO tbl_absensi (id_rat,username,status,tgl,jam, ttd) VALUES ('$id_rat','$username','hadir','$tgl','$jam','$hasil')");
                        mysqli_query($kon, "INSERT INTO tbl_undian (anggota_id, status, nominal) VALUES ('$username', '0', '0')");
                        mysqli_query($kon, "INSERT INTO tbl_geolocation (anggota_id, latitude, longitude, ip) VALUES ('$username', '$latitude', '$longitude', '$ip')");
                        $sql = mysqli_query($kon, "SELECT * FROM tbl_soal where id_rat='$id_rat'");
                        $cek = mysqli_num_rows($sql);
                        while ($soal = mysqli_fetch_array($sql)) {
                            $id_soal[] = $soal['id_soal'];
                        }
                        $total = $cek;
                        for ($i = 0; $i < $total; $i++) {
                            mysqli_query($kon, "INSERT INTO tbl_jawaban (id_rat,id_anggota,id_soal,jawaban) VALUES ('$id_rat','$username','$id_soal[$i]','Kosong')");
                        }
                        echo "<script>alert('Selamat Mengikuti RAT KSP Dian Mandiri.');window.location='../anggota/';</script>";
                        // $cek2 = mysqli_query($kon, "SELECT * FROM tbl_cabang WHERE id_cabang='$cabang'");
                        // while ($data = mysqli_fetch_array($cek2)) {
                        //     $hadir = $data['total_hadir'] + 1;
                        //     $tidakhadir = $data['total_tidak_hadir'] - 1;
                        //     mysqli_query($kon, "UPDATE tbl_cabang SET total_hadir=$hadir, total_tidak_hadir=$tidakhadir WHERE id_cabang=$cabang");
                        //     
                        // }
                    } else {
                        echo "<script>alert('Welcome Back !');window.location='../anggota/';</script>";
                    }
                } else {
                    echo "<script>alert('Pastikan No Anggota isi dengan benar. Jika Lupa minta bantuan petugas anda ! .');window.location='index.php';</script>";
                }
            }
        }
    }
}
