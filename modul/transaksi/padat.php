<?php
	$aksi="modul/kepadatan/aksi_kepadatan.php";
	$tahun=$_GET['tahun'];
?>

<section class="content-header">
	<h1>
		<i class=""></i>Kepadatan Penduduk <?php echo $tahun?>
          <br><small>Daftar Kepadatan Penduduk</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="kepadatan"> Kepadatan Penduduk</a></li>	
		<li><a href="kepadatans-<?php echo $tahun?>"> Kepadatan Penduduk-<?php echo $tahun?></a></li>	
	</ol>
	<br>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</button>
	<button type="button" class="btn btn-warning" onclick="window.location='kepadatan'"><i class="fa fa-arrow-circle-left"></i> Kembali</button>
	
	<!-- Modal Insert-->
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title">Tambah Kepadatan Baru</h4>
				</div>
				<div class="modal-body">
					<?php
						echo " <form  method='post' action='$aksi?module=kepadatans&act=input'>";
					?>
					<div class="box-body">
						
						<div class="form-group">
							<label for="jenis">Kecamatan</label>
							<select class="form-control" name="kecamatan" id="idkecamatan">
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
							<label for="">Tahun</label>
							<input type="text" class="form-control"  value="<?php echo $tahun ?>" name="tahun" required="required" readonly>
						</div>
						<div class="form-group">
							<label for="">Jumlah Kepadatan</label>
							<input type="text" class="form-control"  placeholder="Jumlah" name="jumlah" >
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
					<h3 class="box-title">Tabel Kepadatan Penduduk</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 10px">No</th>
								<th>Kecamatan</th>
								<th style="width: 120px">Aksi</th>

							</tr>
						</thead>
						<tbody>
						<?php
							$tampil=mysql_query("select * from tabel_kepadatan a, tabel_kecamatan b where a.id_kecamatan=b.id_kecamatan and  a.tahun='$tahun' order by a.id_kepadatan ASC");
							$no=1;
							while($dt=mysql_fetch_array($tampil)){
								$id=$dt['id_kepadatan'];
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $dt['nm_kecamatan'] ?></td>
								<td>           
									
									<button type="button" class="btn btn-xs btn-success" title="update data" data-toggle="modal" data-target="#edit<?php echo $id;?>"><i class="fa fa-edit"></i></button>
									<button type="button" class="btn btn-xs btn-danger" title="hapus data" data-toggle="modal" data-target="#delete<?php echo $id;?>"><i class="fa fa-trash"></i></button>
									<button type="button" class="btn btn-xs btn-warning" title="detail data" data-toggle="modal" data-target="#detail<?php echo $id;?>"><i class="fa fa-search"></i></button>
												
										<!-- Modal Update-->
										<?php
											$tampilx=mysql_query("select * from tabel_kepadatan where id_kepadatan='$id'");
											$t=mysql_fetch_array($tampilx);		
										?>
										<div class="modal fade" id="edit<?php echo $id;?>" role="dialog">
		
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Ubah Data Kepadatan Penduduk</h4>
													</div>
													<div class="modal-body">
														<div class="box-body">
														<?php
															echo " <form  method='post' action='$aksi?module=kepadatans&act=edit'>";
														?> 
															<input type="hidden" class="form-control" value="<?php echo $id?>" name="id_kepadatan" required="required">
															<div class="form-group">
																<label for="jenis">Kecamatan</label>
																<select class="form-control" name="kecamatan" id="idkecamatan">
																	<option selected="selected">- Pilih Kecamatan -</option>
																	<?php
																		$kecamatan=mysql_query("select id_kecamatan, nm_kecamatan from tabel_kecamatan");
																		while($j=mysql_fetch_array($kecamatan)){
																			if($t['id_kecamatan']==$j['id_kecamatan']){
																				echo "<option value='$j[id_kecamatan]' selected='$t[id_kecamatan]'>$j[nm_kecamatan]</option>";
																			}else{
																				echo "<option value='$j[id_kecamatan]' >$j[nm_kecamatan]</option>";
																			}
																		}
																	?>
																</select>
															</div>
															<div class="form-group">
																<label for="">Tahun</label>
																<input type="text" class="form-control"  value="<?php echo $tahun ?>" name="tahun" required="required" readonly>
															</div>
															<div class="form-group">
																<label for="">Jumlah</label>
																<input type="text" class="form-control"  value="<?php echo $t['jumlah'] ?>" name="jumlah" required="required">
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
														<h4 class="modal-title">Hapus</h4>
													</div>
													<div class="modal-body">
														<div class="alert alert-danger">Apakah anda yakin ingin menghapus data ini?</div>
													</div>
													<div class="modal-footer">
													<?php
															echo " <form  method='post' action='$aksi?module=kepadatans&act=hapus'>";
													?> 
														<input type="hidden" class="form-control" value="<?php echo $id?>" name="id_kepadatan" required="required">
														<input type="hidden" class="form-control" value="<?php echo $tahun?>" name="tahun" required="required">
														<button type="submit" class="btn btn-danger">&nbsp;Ya</button>
														<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Batal</button>
													</form>
													</div>
												</div>
											</div>
										</div>
										
										<!-- Modal Detail-->
										
										<div class="modal fade" id="detail<?php echo $id;?>" role="dialog">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Detail Data Kepadatan Penduduk</h4>
													</div>
													<div class="modal-body">
														<div class="box-body">
														<div class="form-group">
																<label for="jenis">Kecamatan</label>
																<select class="form-control" name="kecamatan" id="idkecamatan" disabled>
																	<option selected="selected">- Pilih Kecamatan -</option>
																	<?php
																		$kecamatan=mysql_query("select id_kecamatan, nm_kecamatan from tabel_kecamatan");
																		while($j=mysql_fetch_array($kecamatan)){
																			if($t['id_kecamatan']==$j['id_kecamatan']){
																				echo "<option value='$j[id_kecamatan]' selected='$t[id_kecamatan]'>$j[nm_kecamatan]</option>";
																			}else{
																				echo "<option value='$j[id_kecamatan]' >$j[nm_kecamatan]</option>";
																			}
																		}
																	?>
																</select>
															</div>
															<div class="form-group">
																<label for="">Tahun</label>
																<input type="text" class="form-control"  value="<?php echo $tahun ?>" name="tahun" required="required" readonly>
															</div>
															<div class="form-group">
																<label for="">Jumlah</label>
																<input type="text" class="form-control"  value="<?php echo $t['jumlah'] ?>" name="jumlah" required="required" readonly>
															</div>
															
														</div><!-- /.box-body -->
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



