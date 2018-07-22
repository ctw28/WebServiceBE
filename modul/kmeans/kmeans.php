<?php
	$aksi="modul/kepadatan/aksi_kepadatan.php";
?>
<section class="content-header">
	<h1>
		<i class=""></i>Data Administrator Toko Duta Bangunan<br>
          <small>List Data Admin</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="kmeans"> Data Administrator</a></li>	
	</ol>
	<br>
	
</section>

<section class="content">
	<!-- Menampilkan data kecamatan-->
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Tabel Administrator</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 10px">No</th>
								<th>Tahun</th>
								<th style="width: 120px">Aksi</th>

							</tr>
						</thead>
						<tbody>
						<?php
							$awal=2013;
							$akhir=date("Y");
							$no=1;
							for($i=$awal;$i<=$akhir;$i++){
						?>
							<tr>
							<?php
								echo "<form method='post' action='kmeanss-$i'>";
							?>
								<input type="hidden" name="tahun" value="<?php echo $i ?>">
								<td><?php echo $no; ?></td>
								<td><?php echo $i;?></td>
								<td>   
									<button type="submit" class="btn btn-xs btn-success" ><i class="fa fa-search"></i></button>		
								</td>
							</form>
							</tr>
						<?php
							$no++;
							};
						?>
						</tbody>
					</table>
				</div><!-- /.box-body -->	 

				
				
          
	
				
				
				
			</div><!-- /.box-primary -->
		</div><!-- /.col-md -->
	</div><!-- /.row -->
 
 

 
 
	
	
</section>



