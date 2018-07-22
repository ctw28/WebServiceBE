<?php
	$aksi="modul/kasustb/aksi_kasustb.php";
?>
<section class="content-header">
	<h1>
		<i class=""></i>Kasus TB
          <small>Daftar Kasus TB</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="kasusTb"> Kasus TB</a></li>	
	</ol>
	<br>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#filter"><i class="fa fa-filter"></i> Filter</button>
	
	<!-- Modal Filter-->
	<div class="modal fade" id="filter" role="dialog">
	<script>
        $(document).ready(function(){
            $("#kecamatan").change(function (){
                var id = $("#kecamatan").val();
                $.ajax({
                 type : "POST",
                 url  : "modul/kasustb/getpuskesmas.php",
                 data : "id=" + id,
                 success: function (data){
                       $("#idpuskesmas").html(data)
                 }
                })
            })  
        });
    </script>
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Filter Kecamatan Dan Puskesmas</h4>
				</div>
				<div class="modal-body">
					<?php
						echo " <form  method='post' action='$aksi?module=kasusTb&act=filter'>";
					?>
					<div class="box-body">
						<input type="hidden" name="tahun" value="<?php echo $tahun ?>">
						<div class="form-group">
							<label for="jenis">Kecamatan</label>
							<select class="form-control" name="kecamatan" id="kecamatan">
								<option selected="selected">- Pilih Kecamatan -</option>
								<?php
									$kecamatan=mysql_query("select id_kecamatan, nm_kecamatan from tabel_kecamatan");
									while($kec=mysql_fetch_array($kecamatan)){
										echo "<option value='$kec[id_kecamatan]'>$kec[nm_kecamatan]</option>";
                                    }
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="jenis">Puskesmas</label>
							<select class="form-control" name="puskesmas" id="idpuskesmas">
								<option selected="selected">- Pilih Puskesmas -</option>
							</select>
						</div>
						
						
					</div><!-- /.box-body -->
					<div class="box-footer">
                       <button type="submit" class="btn btn-primary">Filter</button>
					</div><!-- /.box-footer -->
                   </form>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<!-- Menampilkan data kecamatan-->
	<div class="row">
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<?php
						$tampil=mysql_query("select * from tabel_kasus a, tabel_kecamatan b, tabel_puskesmas c  where a.id_kecamatan=b.id_kecamatan and a.id_puskesmas=c.id_puskesmas and a.status='Aktif' order by a.id_kasus ASC");
						while($r=mysql_fetch_array($tampil)){
							$kecamatan=$r['nm_kecamatan'];
							$puskesmas=$r['nm_puskesmas'];
						};
					?>
					<h3 class="box-title">Tabel Kasus TB "<?php echo $kecamatan ."-". $puskesmas ?>"</h3>
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
								echo "<form method='post' action='kasusTB-$i'>";
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



