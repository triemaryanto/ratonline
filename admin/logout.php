<?php
//function start lagi
session_start();
session_unset();
session_destroy();

//variabel session salah, user tidak seharusnya ada dihalaman ini. Kembalikan ke login
echo "<script>window.location='index.php';</script>";
?>