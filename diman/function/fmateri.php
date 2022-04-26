<?php
include "koneksi.php";
$materi = mysqli_query($conn,"SELECT * FROM tbl_materi");
error_reporting(E_ALL ^ E_NOTICE);

if(isset($_POST['tambah'])){
    $tipe_file = $_FILES['file_materi']['type']; //mendapatkan mime type
    if ($tipe_file == "application/pdf") //mengecek apakah file tersebut pdf atau bukan
    {
     $judul_materi = trim($_POST['judul_materi']);
     $file_materi = trim($_FILES['file_materi']['name']);
    
     $sql = mysqli_query($conn, "INSERT INTO tbl_materi (judul_materi) VALUES ('$judul_materi')");
    
     //dapatkan id terkahir
     $query = mysqli_query($conn,"SELECT id_materi FROM tbl_materi ORDER BY id_materi DESC LIMIT 1");
     $data  = mysqli_fetch_array($query);
    
     //mengganti nama pdf
     $file       = uniqid() . '.pdf'; //hasil contoh: file_1.pdf
     $file_temp = $_FILES['file_materi']['tmp_name'];
    
     move_uploaded_file($file_temp,'../file/'.$file); //fungsi upload
     //update nama file di database
     mysqli_query($conn,"UPDATE tbl_materi SET file_materi='$file' WHERE id_materi='$data[id_materi]' ");
    
     header('location:../materi.php?pesan=upload-berhasil');
    
    } else
    {
     echo "Gagal Upload File Bukan PDF! <a href='../materi.php'> Kembali </a>";
    }
    }
    elseif($_GET['act']=='delete'){
	
        $id_materi = $_GET["id_materi"];
        //mengambil id yang ingin dihapus
        $file ='../file/'.$_GET["file_materi"];
        unlink($file);
        
            //jalankan query DELETE untuk menghapus data
            $query = "DELETE FROM tbl_materi WHERE id_materi='$id_materi' ";
            $hasil_query = mysqli_query($conn, $query);
        
            //periksa query, apakah ada kesalahan
            if(!$hasil_query) {
              die ("Gagal menghapus data: ".mysqli_errno($conn).
               " - ".mysqli_error($conn));
            } else {
              echo "<script>alert('Data berhasil dihapus.');window.location='../materi.php';</script>";
            }	
            
        }
        elseif($_GET['act']=='update'){
                    
            $tipe_file = $_FILES['file_materi']['type']; //mendapatkan mime type
            if ($tipe_file == "application/pdf") //mengecek apakah file tersebu pdf atau bukan
            {
             $judul_materi     = trim($_POST['judul_materi']);
             $id_materi = $_POST['id_materi'];
             $file ='../file/'.$_POST['file_materi'];
             unlink($file);
             $file_materi = trim($_FILES['file_materi']['name']);
            
             $sql = "UPDATE tbl_materi SET judul_materi = '$judul_materi'";
             mysqli_query($conn,$sql); //simpan data judul_materi dahulu untuk mendapatkan id
            
             //dapatkan id terkahir
             $query = mysqli_query($conn,"SELECT id_materi FROM tbl_materi ORDER BY id_materi DESC LIMIT 1");
             $data  = mysqli_fetch_array($query);
            $no = 0;
            $no++;
             //mengganti nama pdf
             $file       = uniqid() . '.pdf';
             $file_temp = $_FILES['file_materi']['tmp_name']; //data temp yang di upload
             $folder    = "../file";
             move_uploaded_file($file_temp, "$folder/$file"); //fungsi upload
             //update nama file di database
             mysqli_query($conn,"UPDATE tbl_materi SET file_materi='$file' WHERE id_materi='$data[id_materi]' ");
             
             header('location:../materi.php?pesan=upload-berhasil');
            
            } else
            {
             echo "Gagal Upload File Bukan PDF! <a href='../materi.php'> Kembali </a>";
            }

            }
?>