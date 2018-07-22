<?php
error_reporting(0);

$server = "localhost";
$username = "root";
$password = "";
$database = "db_gis";

// Koneksi dan memilih database di server
$con=mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");

//pengambilan data kasus
$ambil_kecamatan=mysql_query("select * from tabel_kecamatan");
$i=0;
while($dt=mysql_fetch_array($ambil_kecamatan)){
	$aku="";
	$tampil_kasus=mysql_query("select * from tabel_kasus where id_kecamatan='$dt[id_kecamatan]' and tahun='$tahun'");
		
		while($t=mysql_fetch_array($tampil_kasus)){
			
			$hasil=$t['l_04']+$t['p_04']+$t['l_1524']+$t['p_1524']+$t['l_2534']+$t['p_2534']+$t['l_3544']+$t['p_3544']
					+$t['l_4554']+$t['p_4554']+$t['l_5564']+$t['p_5564']+$t['l_65']+$t['p_65'];
			
			$aku=$aku+$hasil;
			
			
		}
		 $kecamatan[$i]=$dt['nm_kecamatan'];
		 $tes[$i]=$aku;
		 $i++;
}

//pengambilan data kepadatan
$p=0;
$tampil_padat=mysql_query("select * from tabel_kepadatan where tahun='$tahun'");
		
while($pdt=mysql_fetch_array($tampil_padat)){
	$padat[$p]=$pdt['jumlah'];
	$p++;
}

//pengambilan data kemiskinan/ekonomi
$e=0;
$tampil_ekonomi=mysql_query("select * from tabel_kemiskinan where tahun='$tahun'");
while($eko=mysql_fetch_array($tampil_ekonomi)){
	$ekonomi[$e]=$eko['jumlah'];
	$e++;
}


?>

<?php
      include "objek.php";
	  include "ClusteringKMean.php";
	 // include "ClusteringKMenoid.php";
	  
      for ($i=0;$i<count($objek);$i++){
			$obj = $objek;
			$data = explode(",",$obj[$i]);
			for ($j=0;$j<count($data);$j++){
				$objek[$i][$j] = $data[$j];
			}
	  }
	  for ($i=0;$i<count($centroid);$i++){
			$cls = $centroid;
			$data = explode(",",$cls[$i]);
			for ($j=0;$j<count($data);$j++){
				$centroid[$i][$j] = $data[$j];
			}
	  }	  
	  
	  
      $objek = array(array($ekonomi[4],$tes[4],$padat[4]),
	array($ekonomi[1],$tes[1],$padat[1]),
	array($ekonomi[0],$tes[0],$padat[0]),
	array($ekonomi[2],$tes[2],$padat[2]),
	array($ekonomi[9],$tes[9],$padat[9]),
	array($ekonomi[7],$tes[7],$padat[7]),
	array($ekonomi[5],$tes[5],$padat[5]),
	array($ekonomi[3],$tes[3],$padat[3]),
	array($ekonomi[6],$tes[6],$padat[6]),
	array($ekonomi[8],$tes[8],$padat[8])
					 );
      
      $centroid = array(array($ekonomi[4],$tes[4],$padat[4]),
                        array($ekonomi[2],$tes[2],$padat[2]),
						array($ekonomi[5],$tes[5],$padat[5]));
	
	   //K-MEAN	   
	  echo "<div style='width:600px;float:left;'>
			<div style='width:600px;padding-bottom:0px;float:left;'><h4> &nbsp;&nbsp;&nbsp; PROSES K- MEAN </h4></div>";
      $clustering = new ClusteringKMean($objek, $centroid);
      $clustering->setClusterObjek(1);
	  echo"</div>";
	  
?>	
