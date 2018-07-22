<?php 
include "../../config/connection.php";
include "../../config/fungsi_indotgl.php";
include "../../config/kode_auto.php";

$module=$_GET['module'];
$act=$_GET['act'];

if($module=='kecamatan' AND $act=='hapus' ){ 
	mysql_query("delete from tabel_kecamatan where id_kecamatan='$_POST[id_kecamatan]'");
	header('location:../../'.$module);
}

else if($module=='kecamatan' AND $act=='input' ){
  
	mysql_query("insert into tabel_kecamatan set id_kecamatan='$_POST[id_kecamatan]', 
											  nm_kecamatan='$_POST[nm_kecamatan]',
											  titik='$_POST[titik]'
											  ");
	
	header('location:../../'.$module);
	
	
}

else if($module=='kecamatan' AND $act=='edit' ){
	
	mysql_query("update tabel_kecamatan set nm_kecamatan='$_POST[nm_kecamatan]',
											titik='$_POST[titik]'
										where id_kecamatan='$_POST[id_kecamatan]'");
	
	header('location:../../'.$module);
	
}
?>