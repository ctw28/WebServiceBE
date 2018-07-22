<?php
include "../../config/connection.php";
$id=$_POST['id'];
$query=mysql_query("select * from tabel_puskesmas where id_kecamatan='$id'");
while($data=mysql_fetch_array($query)){
	echo "<option value='$data[id_puskesmas]'>$data[nm_puskesmas]</option>";
}
?>
