<?php 
include "../../config/connection.php";
include "../../config/fungsi_indotgl.php";
include "../../config/kode_auto.php";

$module=$_GET['module'];
$act=$_GET['act'];

$tahun=$_POST['tahun'];



if($module=='kepadatans' AND $act=='hapus' ){ 
	mysql_query("delete from tabel_kepadatan where id_kepadatan='$_POST[id_kepadatan]'");
	header('location:../../'.$module.'-'.$tahun);
}

else if($module=='kepadatans' AND $act=='input' ){
  
	mysql_query("insert into tabel_kepadatan set  id_kecamatan='$_POST[kecamatan]',
											  jumlah='$_POST[jumlah]',
											  tahun='$tahun'
											  ");
	
	header('location:../../'.$module.'-'.$tahun);
	
	
}

else if($module=='kepadatans' AND $act=='edit' ){
	
	mysql_query("update tabel_kepadatan set id_kecamatan='$_POST[kecamatan]',
										jumlah='$_POST[jumlah]',
										tahun='$tahun'
										where id_kepadatan='$_POST[id_kepadatan]'");
	
	header('location:../../'.$module.'-'.$tahun);
	
}

else if($module=='kasusTb' AND $act=='filter' ){
	
		$tampil=mysql_query("select id_puskesmas from tabel_kasus group by id_puskesmas");
		while($dt=mysql_fetch_array($tampil)){
			$puskesmas=$dt['id_puskesmas'];

			if($_POST['puskesmas']!=$puskesmas ){
				mysql_query("update tabel_kasus set status='Tidak'
							where id_puskesmas='$puskesmas'");
			}else{
				mysql_query("update tabel_kasus set status='Aktif'
							where id_puskesmas='$puskesmas'");
			}
		}	
	
	header('location:../../'.$module);
	
}

?>