<?php
include "koneksi.php";
error_reporting(E_ALL ^ E_NOTICE);
$setting = mysqli_query($conn, "SELECT * FROM tbl_setting");
while ($row3 = mysqli_fetch_array($setting)){
    $id_rat = $row3['id_rat'];
    }
$soal = mysqli_query($conn,"SELECT * FROM tbl_soal where id_rat = '$id_rat'");
if(isset($_POST['tambah'])){
    $soal = $_POST['soal'];
    $kategori = $_POST['kategori'];
        $result = mysqli_query($conn, "INSERT INTO tbl_soal (soal, kategori) VALUES ('$soal', '$kategori')");
                      if(!$result){
                          die ("Query gagal dijalankan: ".mysqli_errno($conn).
                               " - ".mysqli_error($conn));
                      } else {
                        echo "<script>alert('Data berhasil ditambah.');window.location='../question';</script>";
                      }
                    }
                    elseif($_GET['act']=='delete'){
                        $id_soal = $_GET["id_soal"];
                            $query = "DELETE FROM tbl_soal WHERE id_soal='$id_soal' ";
                            $hasil_query = mysqli_query($conn, $query);
                            if(!$hasil_query) {
                              die ("Gagal menghapus data: ".mysqli_errno($conn).
                               " - ".mysqli_error($conn));
                            } else {
                              echo "<script>alert('Data berhasil dihapus.');window.location='../question';</script>";
                            }	
                            
                        }
                        elseif($_GET['act']=='update'){
                        $id_soal = $_POST['id_soal'];
                        $soal   = $_POST['soal'];
                        $kategori = $_POST['kategori'];
                          
                              // jalankan query UPDATE berdasarkan ID yang produknya kita edit
                               $query  = "UPDATE tbl_soal SET soal = '$soal', kategori = '$kategori'";
                              $query .= "WHERE id_soal = '$id_soal'";
                              $result = mysqli_query($conn, $query);
                              // periska query apakah ada error
                              if(!$result){
                                    die ("Query gagal dijalankan: ".mysqli_errno($conn).
                                                     " - ".mysqli_error($conn));
                                                     echo "<script>alert('Data berhasil diubah.');window.location='../question';</script>";
                              } else {
                                  echo "<script>alert('Data berhasil diubah.');window.location='../question';</script>";
                              }
                            }
?>