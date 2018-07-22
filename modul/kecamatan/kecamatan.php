<?php
	$aksi="modul/kecamatan/aksi_kecamatan.php";
?>
<section class="content-header">
	<h1>
		<i class=""></i>Kecamatan
          <small>Daftar Kecamatan</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="kecamatan"> Kecamatan</a></li>	
	</ol>
	<br>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</button>
	<!-- Modal Insert-->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Tambah Kecamatan Baru</h4>
				</div>
				<div class="modal-body">
					<?php
						echo " <form  method='post' action='$aksi?module=kecamatan&act=input'>";
					?>
					<div class="box-body">
						<div class="form-group">
							<label for="jenis">ID Kecamatan</label>
							<input type="text" class="form-control" id="jenis"  name="id_kecamatan" value='<?php echo kdauto(tabel_kecamatan,K)?>' readonly>
						</div>
                       <div class="form-group">
                         <label for="password">Nama Kecamatan</label>
                         <input type="text" class="form-control" id="password" placeholder="Nama Kecamatan" name="nm_kecamatan" required="required">
                       </div>
					   <div class="form-group">
                         <label for="password">Titik</label>
                         <input type="text" class="form-control" id="password" placeholder="Titik Peta" name="titik" required="required">
                       </div>
					</div><!-- /.box-body -->
					<div class="box-footer">
                       <button type="submit" class="btn btn-primary">Tambah</button>
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
					<h3 class="box-title">Tabel Kecamatan</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 10px">No</th>
								<th>ID</th>
								<th>Kecamatan</th>
								<th style="width: 120px">Aksi</th>

							</tr>
						</thead>
						<tbody>
						<?php
							$tampil=mysql_query("select * from tabel_kecamatan order by id_kecamatan ASC");
							$no=1;
							while($dt=mysql_fetch_array($tampil)){
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $dt['id_kecamatan']; $id=$dt['id_kecamatan'];?></td>
								<td><?php echo $dt['nm_kecamatan'];?></td>
								<td>           
									
									<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#edit<?php echo $id;?>"><i class="fa fa-edit"></i></button>
									<button type="button" class="btn btn-xs btn-danger" data-toggle="modal" data-target="#delete<?php echo $id;?>"><i class="fa fa-trash"></i></button>
												
										<!-- Modal Update-->
										<?php
											$tampilx=mysql_query("select * from tabel_kecamatan where id_kecamatan='$id'");
											$t=mysql_fetch_array($tampilx);		
										?>
										<div class="modal fade" id="edit<?php echo $id;?>" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Ubah Data Kecamatan</h4>
													</div>
													<div class="modal-body">
														<div class="box-body">
														<?php
															echo " <form  method='post' action='$aksi?module=kecamatan&act=edit'>";
														?> 
															<div class="form-group">
																<label>ID Kecamatan</label>
																	<input type="text" class="form-control"  value='<?php echo $t['id_kecamatan'] ?>' name="id_kecamatan" required="required" readonly>
															</div>
															<div class="form-group">
																<label>Nama Kecamatan</label>
																	<input type="text" class="form-control"  value='<?php echo $t['nm_kecamatan'] ?>' name="nm_kecamatan" required="required">
															</div>
															<div class="form-group">
																<label>Titik</label>
																	<input type="text" class="form-control"  value='<?php echo $t['titik'] ?>' name="titik" required="required">
															</div>
														</div><!-- /.box-body -->
														<div class="box-footer">
															<button type="submit" class="btn btn-primary">Ubah</button>
														</div>
													</form>
													</div>         
												</div>
											</div>
										</div>
										
										
										<!-- Modal Delete-->
										<div class="modal fade" id="delete<?php echo $id;?>" role="dialog">
											<div class="modal-dialog">
											<!-- Modal content-->
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Hapus Kecamatan <?php echo $t['nm_kecamatan'] ?></h4>
													</div>
													<div class="modal-body">
														<div class="alert alert-danger">Apakah anda yakin ingin menghapus data ini?</div>
													</div>
													<div class="modal-footer">
													<?php
															echo " <form  method='post' action='$aksi?module=kecamatan&act=hapus'>";
													?> 
														<input type="hidden" class="form-control" value="<?php echo $id?>" name="id_kecamatan" required="required">
														<button type="submit" class="btn btn-danger">&nbsp;Ya</button>
														<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Batal</button>
													</form>
												</div>
												</div>
											</div>
										</div>
								</td>
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



