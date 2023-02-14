<?php
$setting = mysqli_query($conn, "SELECT * FROM tbl_setting");
while($row = mysqli_fetch_array($setting)){
$set = $row['id_rat'];
}

?>