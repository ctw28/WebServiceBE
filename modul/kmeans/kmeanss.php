<?php
	$aksi="modul/kmeans/aksi_kmeans.php";
	$tahun=$_GET['tahun'];
?>

<section class="content-header">
	<h1>
		<i class=""></i>Proses Clustering Wilayah <?php echo $tahun?>
          <br><small>Clustering Wilayah Tahun <?php echo $tahun;?></small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="kmeans"> Proses Clustering</a></li>	
		<li><a href="kmeanss-<?php echo $tahun?>"> Clustering Wilayah-<?php echo $tahun?></a></li>	
	</ol>
	<br>
	<?php
	$cek_tahun=mysql_query("select tahun from tabel_cluster where tahun='$tahun'");
	$hitung=mysql_num_rows($cek_tahun);
	if($hitung > 0){
		 echo "
			 <a href='#' class='btn btn-default'> <i class='fa fa-plus'></i> Tambah</a>
			 <a href='$aksi?module=kmeanss&act=hapus&tahun=$tahun' class='btn btn-danger'> <i class='fa fa-trash'></i> Hapus</a>
			 <button type='button' class='btn btn-warning' onclick=\"window.location='kmeans'\"><i class='fa fa-arrow-circle-left'></i> Kembali</button>
			 <h1>
				<br><small>Clustering wilayah tahun $tahun sudah ada</small>
			 </h1>
		";
	}else{
		echo "
			 <a href='$aksi?module=kmeanss&act=tambah&tahun=$tahun' class='btn btn-primary'> <i class='fa fa-plus'></i> Tambah</a>
			 <a href='#' class='btn btn-default'> <i class='fa fa-trash'></i> Hapus</a>
			 <button type='button' class='btn btn-warning' onclick=\"window.location='kmeans'\"><i class='fa fa-arrow-circle-left'></i> Kembali</button>
			 <h1>
				<br><small>Clustering wilayah tahun $tahun belum ada</small>
			 </h1>
			 
		
		";
	}
	
	?>
	
 
	
</section>



