<?php

class objek {
	
	
	
	
     private $cluster = null;
     var $data = array();
	 var $jml = array();
     
     function __construct($dt) {
           $this->data = $dt;
     }
     
     public function setCluster($cls){
		 

		 
		 
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
		   //return $this->$tmpC;
     }
	 
	 public function hitCluster(){
           return $this->jml;
		   //return $this->$tmpC;
     }
}

?>
