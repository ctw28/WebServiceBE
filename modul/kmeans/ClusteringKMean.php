<?php

	  //echo "<pre>";
	  print_r($clus);
//	  echo "<pre>";
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
            echo "<div class='container'>
<div class='wells' ><table width='500' cellpadding=0 cellspacing=0 class='table table-bordered table-striped table-hover'>
                        <tr><th colspan='100'>ITERASI ".$itr."</th></tr>
						<tr><th>No</th>";            
            for ($i=0;$i<count($this->objek[0]->data);$i++){
                  echo "<th>Data ".($i+1)."</th>";
            }            
            /*for ($j=0;$j<count($this->centroidCluster);$j++){
                  echo "<th>Cluster ".($j+1)."</th>";
            } */
			for ($j=0;$j<count($this->centroidCluster);$j++){
                  echo "<th>C-".($j+1)."</th>";
            }            
            echo "</tr>"; 
			
			// cek error ratio
			$error = 0;
			         
            for ($i=0;$i<count($this->objek);$i++){
                  $this->objek[$i]->setCluster($this->centroidCluster);
				  echo "<tr><td> ".($i+1)."</td>";                  
                  for ($j=0;$j<count($this->objek[$i]->data);$j++)
                        echo "<td>".$this->objek[$i]->data[$j]."</td>";
                  
                 
				  
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

						echo "<td><center><i class='icon-ok'></i></center></td>";
                              if($this->objek[$i]->getCluster() == $clus[$i]){
							  //echo "<td><center><i class='icon-ok'></i>".$this->objek[$i]->getCluster()."</center></td>";
							 // echo "<td><center><span class='label label-success'><i class='icon-ok icon-white'></i>Cluster ".$ruspini[$i]."</span></center></td>";
							  }
							  else{
							  //echo "<td><center><span class='label label-important'><i class='icon-remove icon-white'></i> Cluster ".$ruspini[$i]."</span></center></td>";
							  $error++;
							  }
						
						}
                        else  echo "<td>&nbsp;</td>";	
                  }          
                  echo "</tr>";
            }
            echo "</table>";  
			echo "<h5><font color='red'>Error Ratio : ".($error/75*100)."%</font></h5>"; 
			echo "</br>";          
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
					echo "<h5>&nbsp;&nbsp;&nbsp;Centroid Cluster ".($i+1)." : ";
					for ($j=0;$j<count($this->centroidCluster[$i]);$j++){
						echo substr($this->centroidCluster[$i][$j],0,5)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
					}
					echo "</div>"; // ini tadi div nya tak hilangi
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

?>