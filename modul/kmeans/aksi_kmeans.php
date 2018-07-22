<?php 
include "../../config/connection.php";
include "../../config/fungsi_indotgl.php";
include "../../config/kode_auto.php";
error_reporting(0);
$module=$_GET['module'];
$act=$_GET['act'];

$tahun=$_GET['tahun'];



if($module=='kmeanss' AND $act=='hapus' ){ 
	mysql_query("delete from tabel_cluster where tahun='$tahun'");
	header('location:../../'.$module.'-'.$tahun);
}

else if($module=='kmeanss' AND $act=='tambah' ){
  
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



  ///


class objek {
	
     private $cluster = null;
     var $data = array();
	 var $jml = array();
     
     function __construct($dt) {
           $this->data = $dt;
     }
     
     public function setCluster($cls){
		 
    $tahun=$_GET['tahun'];
		 
		 
           $jml = 0;
           $tmpCluster = 0;
           $c = null;
           for ($i=0;$i<count($cls);$i++){
				  $jml = 1;
                  for ($j=0;$j<count($this->data);$j++){						
						$jml += pow(($this->data[$j] - $cls[$i][$j]),2);
                  }
				  $tmpC = sqrt($jml);
                  if ($c==null){
                        $c = $tmpC;
                        $tmpCluster = $i;
                  }
                  if ($tmpC < $c){
                        $c = $tmpC;
                        $tmpCluster = $i;
                  }
           }
           $this->cluster = $tmpCluster; // ini masuk cluster berapa 0,1 apa 2
		   $this->jml=$tmpC;
		   
		   $as=array($tmpCluster);
		   mysql_query("insert into tabel_cluster set cluster='$tmpCluster', tahun='$tahun' ");
		   
		  
		   
   
     }
     
     public function getCluster(){
           return $this->cluster;
		   
     }
	 
	 public function hitCluster(){
           return $this->jml;
		   
     }
}
////  

///


	  
class ClusteringKMean {
      private $objek = array();
      private $centroidCluster = null;
      private $cekObjCluster = null;
      
      public function __construct($obj,$cnt) {
            $this->centroidCluster = $cnt;
            for ($i=0;$i<count($obj);$i++){
                  $this->objek[$i] = new objek($obj[$i]);
				  $this->cekObjCluster[$i] = 0;
            }
      }
	  
	  
      
      public function setClusterObjek($itr){               
                   
            for ($i=0;$i<count($this->objek[0]->data);$i++){
                  
            }            
            /*for ($j=0;$j<count($this->centroidCluster);$j++){
                  echo "<th>Cluster ".($j+1)."</th>";
            } */
			for ($j=0;$j<count($this->centroidCluster);$j++){
                  
            }            
            echo "</tr>"; 
			
			// cek error ratio
			$error = 0;
			         
            for ($i=0;$i<count($this->objek);$i++){
                  $this->objek[$i]->setCluster($this->centroidCluster);
				              
                  for ($j=0;$j<count($this->objek[$i]->data);$j++)
                        
                  
                 
				  
				  for ($j=0;$j<count($this->centroidCluster);$j++){
                        if ($j == $this->objek[$i]->getCluster()){
						
						// untuk pengecekan
						$clus = array();
						
						// untuk ditampilkan
						$ruspini = array(
						1,1,1,1,1,1,1,1,1,1,
						1,1,1,1,1,1,1,1,1,1,
						2,2,2,2,2,2,2,2,2,2,
						2,2,2,2,2,2,2,2,2,2,
						2,2,3,3,3,3,3,3,3,3,
						3,3,3,3,3,3,3,3,4,4,
						4,4,4,4,4,4,4,4,4,4,
						4,4,4,4,4,4);

						
                              if($this->objek[$i]->getCluster() == $clus[$i]){
							  //echo "<td><center><i class='icon-ok'></i>".$this->objek[$i]->getCluster()."</center></td>";
							 // echo "<td><center><span class='label label-success'><i class='icon-ok icon-white'></i>Cluster ".$ruspini[$i]."</span></center></td>";
							  }
							  else{
							  //echo "<td><center><span class='label label-important'><i class='icon-remove icon-white'></i> Cluster ".$ruspini[$i]."</span></center></td>";
							  $error++;
							  }
						
						}
                        
                  }          
                  
            }
                   
            $cek = TRUE;
            for ($i=0;$i<count($this->cekObjCluster);$i++){
                  if ($this->cekObjCluster[$i]!=$this->objek[$i]->getCluster()){
                        $cek = FALSE;
                        break;
                  }
            }            
           if ((!($cek))&&($itr<20)){
                  for ($i=0;$i<count($this->cekObjCluster);$i++){
                        $this->cekObjCluster[$i] = $this->objek[$i]->getCluster();
                  }
                  $this->setCentroidCluster();
                  $this->setClusterObjek($itr+1);
            }else{
				for ($i=0;$i<count($this->centroidCluster);$i++){
					
					for ($j=0;$j<count($this->centroidCluster[$i]);$j++){
						
					}
					
				}
			}         
      }
      
      private function setCentroidCluster(){
           for ($i=0;$i<count($this->centroidCluster);$i++){
                 $countObj = 0;
                 $x = array();            
                 for ($j=0;$j<count($this->objek);$j++){
                       if ($this->objek[$j]->getCluster()==$i){
                             for ($k=0;$k<count($this->objek[$j]->data);$k++){
                                    $x[$k] += $this->objek[$j]->data[$k];
							 }
                             $countObj++;
                       }
                 }
                 for ($k=0;$k<count($this->centroidCluster[$i]);$k++){
					   if ($countObj>0)
							$this->centroidCluster[$i][$k] = $x[$k]/$countObj;
							//echo $this->centroidCluster[$i][$k];
					   else{
							//echo "<font color='red'>Terdapat ketidak sesuai Nilai Awal Cluster</font><br>";
							break;
					   }						
                 }
           } 
      }      
}

///

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
	 
      $clustering = new ClusteringKMean($objek, $centroid);
      $clustering->setClusterObjek(1);

	
	
	header('location:../../'.$module.'-'.$tahun);
	
	
}



?>