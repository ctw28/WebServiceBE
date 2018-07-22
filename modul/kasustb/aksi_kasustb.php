<?php 
include "../../config/connection.php";
include "../../config/fungsi_indotgl.php";
include "../../config/kode_auto.php";

$module=$_GET['module'];
$act=$_GET['act'];

$tahun=$_POST['tahun'];



if($module=='kasusTB' AND $act=='hapus' ){ 
	mysql_query("delete from tabel_kasus where id_kasus='$_POST[id_kasus]'");
	header('location:../../'.$module.'-'.$tahun);
}

else if($module=='kasusTB' AND $act=='input' ){
  
	mysql_query("insert into tabel_kasus set  id_kecamatan='$_POST[kecamatan]',
											  id_puskesmas='$_POST[puskesmas]',
											  bulan='$_POST[bulan]',
											  tahun='$_POST[tahun]',
											  l_04='$_POST[l_04]',
											  p_04='$_POST[p_04]',
											  l_514='$_POST[l_514]',
											  p_514='$_POST[p_514]',
											  l_1524='$_POST[l_1524]',
											  p_1524='$_POST[p_1524]',
											  l_2534='$_POST[l_2534]',
											  p_2534='$_POST[p_2534]',
											  l_3544='$_POST[l_3544]',
											  p_3544='$_POST[p_3544]',
											  l_4554='$_POST[l_4554]',
											  p_4554='$_POST[p_4554]',
											  l_5564='$_POST[l_5564]',
											  p_5564='$_POST[p_5564]',
											  l_65='$_POST[l_65]',
											  p_65='$_POST[p_65]',
											  status='Aktif'
											  ");
	
	header('location:../../'.$module.'-'.$tahun);
	
	
}

else if($module=='kasusTB' AND $act=='edit' ){
	
	mysql_query("update tabel_kasus set id_kecamatan='$_POST[kecamatan]',
											  id_puskesmas='$_POST[puskesmas]',
											  bulan='$_POST[bulan]',
											  tahun='$_POST[tahun]',
											  l_04='$_POST[l_04]',
											  p_04='$_POST[p_04]',
											  l_514='$_POST[l_514]',
											  p_514='$_POST[p_514]',
											  l_1524='$_POST[l_1524]',
											  p_1524='$_POST[p_1524]',
											  l_2534='$_POST[l_2534]',
											  p_2534='$_POST[p_2534]',
											  l_3544='$_POST[l_3544]',
											  p_3544='$_POST[p_3544]',
											  l_4554='$_POST[l_4554]',
											  p_4554='$_POST[p_4554]',
											  l_5564='$_POST[l_5564]',
											  p_5564='$_POST[p_5564]',
											  l_65='$_POST[l_65]',
											  p_65='$_POST[p_65]',
											  status='Aktif'
										where id_kasus='$_POST[id_kasus]'");
	
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