<?php 
include "../../config/connection.php";
include "../../config/fungsi_indotgl.php";
include "../../config/kode_auto.php";

$module=$_GET['module'];
$act=$_GET['act'];

if($module=='puskesmas' AND $act=='hapus' ){ 
	mysql_query("delete from tabel_puskesmas where id_puskesmas='$_POST[id_puskesmas]'");
	header('location:../../'.$module);
}

else if($module=='puskesmas' AND $act=='input' ){
  
	mysql_query("insert into tabel_puskesmas set id_puskesmas='$_POST[id_puskesmas]', 
											  nm_puskesmas='$_POST[nm_puskesmas]',
											  alamat_puskesmas='$_POST[alamat_puskesmas]',
											  id_kecamatan='$_POST[kecamatan]'
											  ");
	
	header('location:../../'.$module);
	
	
}

else if($module=='puskesmas' AND $act=='edit' ){
	
	mysql_query("update tabel_puskesmas set nm_puskesmas='$_POST[nm_puskesmas]',
											  alamat_puskesmas='$_POST[alamat_puskesmas]',
											  id_kecamatan='$_POST[kecamatan]'
										where id_puskesmas='$_POST[id_puskesmas]'");
	
	header('location:../../'.$module);
	
}
?>