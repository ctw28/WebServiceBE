<?php
	$aksi="modul/kasustb/aksi_kasustb.php";
	$tahun=$_GET['tahun'];
?>

<section class="content-header">
	<h1>
		<i class=""></i>Kasus TB <?php echo $tahun?>
          <br><small>Daftar Kasus TB</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Home</a></li>
		<li><a href="kasusTb"> Kasus TB</a></li>	
		<li><a href="kasusTB-<?php echo $tahun?>"> Kasus TB-<?php echo $tahun?></a></li>	
	</ol>
	<br>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah</button>
	<button type="button" class="btn btn-warning" onclick="window.location='kasusTb'"><i class="fa fa-arrow-circle-left"></i> Kembali</button>
	
	<!-- Modal Insert-->
	<div class="modal fade" id="myModal" role="dialog">
	<script>
        $(document).ready(function(){
            $("#idkecamatan").change(function (){
                var kecamatan = $("#idkecamatan").val();
                $.ajax({
                 type : "POST",
                 url  : "modul/kasustb/getpuskesmas.php",
                 data : "id=" + kecamatan,
                 success: function (data){
                       $("#puskesmas").html(data)
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
						<h4 class="modal-title">Tambah Kasus TB Baru</h4>
				</div>
				<div class="modal-body">
					<?php
						echo " <form  method='post' action='$aksi?module=kasusTB&act=input'>";
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
							<label for="jenis">Puskesmas</label>
							<select class="form-control" name="puskesmas" id="puskesmas">
								<option selected="selected">- Pilih Puskesmas -</option>
							</select>
						</div>
						<div class="form-group">
							<label for="jenis">Bulan</label>
							<select class="form-control" name="bulan" style="width: 100%;">
								<option selected="selected">- Pilih Bulan -</option> 
								<option value="Januari">Januari</option> 
								<option value="Februari">Februari</option> 
								<option value="Maret">Maret</option> 
								<option value="April">April</option> 
								<option value="Mei">Mei</option> 
								<option value="Juni">Juni</option> 
								<option value="Juli">Juli</option> 
								<option value="Agustus">Agustus</option> 
								<option value="September">September</option> 
								<option value="Oktober">Oktober</option> 
								<option value="November">November</option> 
								<option value="Desember">Desember</option> 
								
							</select>
						</div>
						<div class="form-group">
							<label for="">Tahun</label>
							<input type="text" class="form-control"  value="<?php echo $tahun ?>" name="tahun" required="required" readonly>
						</div>
						<hr>
						<h5 class="modal-title">Rentang 0-4 Tahun</h5>
						<div class="form-group">
							<label for="">Laki-Laki</label>
							<input type="text" class="form-control"  placeholder="Laki-Laki" name="l_04" >
						</div>
						<div class="form-group">
							<label for="">Perempuan</label>
							<input type="text" class="form-control"  placeholder="Perempuan" name="p_04" >
						</div>
						<hr>
						<h5 class="modal-title">Rentang 5-14 Tahun</h5>
						<div class="form-group">
							<label for="">Laki-Laki</label>
							<input type="text" class="form-control"  placeholder="Laki-Laki" name="l_514" >
						</div>
						<div class="form-group">
							<label for="">Perempuan</label>
							<input type="text" class="form-control"  placeholder="Perempuan" name="p_514" >
						</div>
						<hr>
						<h5 class="modal-title">Rentang 15-24 Tahun</h5>
						<div class="form-group">
							<label for="">Laki-Laki</label>
							<input type="text" class="form-control"  placeholder="Laki-Laki" name="l_1524" >
						</div>
						<div class="form-group">
							<label for="">Perempuan</label>
							<input type="text" class="form-control"  placeholder="Perempuan" name="p_1524" >
						</div>
						<hr>
						<h5 class="modal-title">Rentang 25-34 Tahun</h5>
						<div class="form-group">
							<label for="">Laki-Laki</label>
							<input type="text" class="form-control"  placeholder="Laki-Laki" name="l_2534" >
						</div>
						<div class="form-group">
							<label for="">Perempuan</label>
							<input type="text" class="form-control"  placeholder="Perempuan" name="p_2534" >
						</div>
						<hr>
						<h5 class="modal-title">Rentang 35-44 Tahun</h5>
						<div class="form-group">
							<label for="">Laki-Laki</label>
							<input type="text" class="form-control"  placeholder="Laki-Laki" name="l_3544" >
						</div>
						<div class="form-group">
							<label for="">Perempuan</label>
							<input type="text" class="form-control"  placeholder="Perempuan" name="p_3544" >
						</div>
						<hr>
						<h5 class="modal-title">Rentang 45-54 Tahun</h5>
						<div class="form-group">
							<label for="">Laki-Laki</label>
							<input type="text" class="form-control"  placeholder="Laki-Laki" name="l_4554" >
						</div>
						<div class="form-group">
							<label for="">Perempuan</label>
							<input type="text" class="form-control"  placeholder="Perempuan" name="p_4554" >
						</div>
						<hr>
						<h5 class="modal-title">Rentang 55-64 Tahun</h5>
						<div class="form-group">
							<label for="">Laki-Laki</label>
							<input type="text" class="form-control"  placeholder="Laki-Laki" name="l_5564" >
						</div>
						<div class="form-group">
							<label for="">Perempuan</label>
							<input type="text" class="form-control"  placeholder="Perempuan" name="p_5564" >
						</div>
						<hr>
						<h5 class="modal-title">Rentang >65 Tahun</h5>
						<div class="form-group">
							<label for="">Laki-Laki</label>
							<input type="text" class="form-control"  placeholder="Laki-Laki" name="l_65" >
						</div>
						<div class="form-group">
							<label for="">Perempuan</label>
							<input type="text" class="form-control"  placeholder="Perempuan" name="p_65" >
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
					<h3 class="box-title">Tabel Kasus TB</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<table id="example1" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 10px">No</th>
								<th>Bulan</th>
								<th style="width: 120px">Aksi</th>

							</tr>
						</thead>
						<tbody>
						<?php
							$tampil=mysql_query("select * from tabel_kasus a, tabel_kecamatan b, tabel_puskesmas c  where a.id_kecamatan=b.id_kecamatan and a.id_puskesmas=c.id_puskesmas and  a.tahun='$tahun' and a.status='Aktif' order by a.id_kasus ASC");
							$no=1;
							while($dt=mysql_fetch_array($tampil)){
								$id=$dt['id_kasus'];
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $dt['bulan'] ." (".$dt['nm_kecamatan'].",".$dt['nm_puskesmas'].")" ?></td>
								<td>           
									
									<button type="button" class="btn btn-xs btn-success" title="update data" data-toggle="modal" data-target="#edit<?php echo $id;?>"><i class="fa fa-edit"></i></button>
									<button type="button" class="btn btn-xs btn-danger" title="hapus data" data-toggle="modal" data-target="#delete<?php echo $id;?>"><i class="fa fa-trash"></i></button>
									<button type="button" class="btn btn-xs btn-warning" title="detail data" data-toggle="modal" data-target="#detail<?php echo $id;?>"><i class="fa fa-search"></i></button>
												
										<!-- Modal Update-->
										<?php
											$tampilx=mysql_query("select * from tabel_kasus where id_kasus='$id'");
											$t=mysql_fetch_array($tampilx);		
										?>
										<div class="modal fade" id="edit<?php echo $id;?>" role="dialog">
		
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														<h4 class="modal-title">Ubah Data Kasus TB</h4>
													</div>
													<div class="modal-body">
														<div class="box-body">
														<?php
															echo " <form  method='post' action='$aksi?module=kasusTB&act=edit'>";
														?> 
															<input type="hidden" class="form-control" value="<?php echo $id?>" name="id_kasus" required="required">
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
																<label for="jenis">Puskesmas</label>
																<select class="form-control" name="puskesmas">
																	<option selected="selected">- Pilih Puskesmas -</option>
																	<?php
																		$kecamatan=mysql_query("select * from tabel_puskesmas");
																		while($j=mysql_fetch_array($kecamatan)){
																			if($t['id_puskesmas']==$j['id_puskesmas']){
																				echo "<option value='$j[id_puskesmas]' selected='$t[id_puskesmas]'>$j[nm_puskesmas]</option>";
																			}else{
																				echo "<option value='$j[id_puskesmas]' >$j[nm_puskesmas]</option>";
																			}
																		}
																	?>
																</select>
															</div>
															<div class="form-group">
																<label for="jenis">Bulan</label>
																<select class="form-control" name="bulan" style="width: 100%;">
																	<?php
																		$jb=array(1=>"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
																		for($i=1;$i<=12;$i++) {
																			if($jb[$i]==$t['bulan']) {
																				echo "<option value='$jb[$i]' selected/>$jb[$i]</option>";
																			} else {
																				echo "<option value='$jb[$i]'/>$jb[$i]</option>";
																		}
									}
																	?>
																	
																</select>
															</div>
															<div class="form-group">
																<label for="">Tahun</label>
																<input type="text" class="form-control"  value="<?php echo $tahun ?>" name="tahun" required="required" readonly>
															</div>
															<hr>
															<h5 class="modal-title">Rentang 0-4 Tahun</h5>
															<div class="form-group">
																<label for="">Laki-Laki</label>
																<input type="text" class="form-control"  value="<?php echo $t['l_04']?>" name="l_04" required="required">
															</div>
															<div class="form-group">
																<label for="">Perempuan</label>
																<input type="text" class="form-control" value="<?php echo $t['p_04']?>" name="p_04" required="required">
															</div>
															<hr>
															<h5 class="modal-title">Rentang 5-14 Tahun</h5>
															<div class="form-group">
																<label for="">Laki-Laki</label>
																<input type="text" class="form-control"  value="<?php echo $t['l_514']?>" name="l_514" required="required">
															</div>
															<div class="form-group">
																<label for="">Perempuan</label>
																<input type="text" class="form-control"  value="<?php echo $t['p_514']?>" name="p_514" required="required">
															</div>
															<hr>
															<h5 class="modal-title">Rentang 15-24 Tahun</h5>
															<div class="form-group">
																<label for="">Laki-Laki</label>
																<input type="text" class="form-control"  value="<?php echo $t['l_1524']?>" name="l_1524" required="required">
															</div>
															<div class="form-group">
																<label for="">Perempuan</label>
																<input type="text" class="form-control"  value="<?php echo $t['p_1524']?>" name="p_1524" required="required">
															</div>
															<hr>
															<h5 class="modal-title">Rentang 25-34 Tahun</h5>
															<div class="form-group">
																<label for="">Laki-Laki</label>
																<input type="text" class="form-control"  value="<?php echo $t['l_2534']?>" name="l_2534" required="required">
															</div>
															<div class="form-group">
																<label for="">Perempuan</label>
																<input type="text" class="form-control"  value="<?php echo $t['p_2534']?>" name="p_2534" required="required">
															</div>
															<hr>
															<h5 class="modal-title">Rentang 35-44 Tahun</h5>
															<div class="form-group">
																<label for="">Laki-Laki</label>
																<input type="text" class="form-control"  value="<?php echo $t['l_3544']?>" name="l_3544" required="required">
															</div>
															<div class="form-group">
																<label for="">Perempuan</label>
																<input type="text" class="form-control"  value="<?php echo $t['p_3544']?>" name="p_3544" required="required">
															</div>
															<hr>
															<h5 class="modal-title">Rentang 45-54 Tahun</h5>
															<div class="form-group">
																<label for="">Laki-Laki</label>
																<input type="text" class="form-control"  value="<?php echo $t['l_4554']?>" name="l_4554" required="required">
															</div>
															<div class="form-group">
																<label for="">Perempuan</label>
																<input type="text" class="form-control"  value="<?php echo $t['p_4554']?>" name="p_4554" required="required">
															</div>
															<hr>
															<h5 class="modal-title">Rentang 55-64 Tahun</h5>
															<div class="form-group">
																<label for="">Laki-Laki</label>
																<input type="text" class="form-control"  value="<?php echo $t['l_5564']?>" name="l_5564" required="required">
															</div>
															<div class="form-group">
																<label for="">Perempuan</label>
																<input type="text" class="form-control"  value="<?php echo $t['p_5564']?>" name="p_5564" required="required">
															</div>
															<hr>
															<h5 class="modal-title">Rentang >65 Tahun</h5>
															<div class="form-group">
																<label for="">Laki-Laki</label>
																<input type="text" class="form-control"  value="<?php echo $t['l_65']?>" name="l_65" required="required">
															</div>
															<div class="form-group">
																<label for="">Perempuan</label>
																<input type="text" class="form-control" value="<?php echo $t['p_65']?>" name="p_65" required="required">
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
														<h4 class="modal-title">Hapus <?php echo $t['bulan'] ?></h4>
													</div>
													<div class="modal-body">
														<div class="alert alert-danger">Apakah anda yakin ingin menghapus data ini?</div>
													</div>
													<div class="modal-footer">
													<?php
															echo " <form  method='post' action='$aksi?module=kasusTB&act=hapus'>";
													?> 
														<input type="hidden" class="form-control" value="<?php echo $id?>" name="id_kasus" required="required">
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
														<h4 class="modal-title">Detail Data Kasus TB</h4>
													</div>
													<div class="modal-body">
														<div class="box-body">
														<?php
															echo " <form  method='post' action='$aksi?module=puskesmas&act=edit'>";
														?> 
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
																<label for="jenis">Puskesmas</label>
																<select class="form-control" name="puskesmas" disabled>
																	<option selected="selected">- Pilih Puskesmas -</option>
																	<?php
																		$kecamatan=mysql_query("select * from tabel_puskesmas");
																		while($j=mysql_fetch_array($kecamatan)){
																			if($t['id_puskesmas']==$j['id_puskesmas']){
																				echo "<option value='$j[id_puskesmas]' selected='$t[id_puskesmas]'>$j[nm_puskesmas]</option>";
																			}else{
																				echo "<option value='$j[id_puskesmas]' >$j[nm_puskesmas]</option>";
																			}
																		}
																	?>
																</select>
															</div>
															<div class="form-group">
																<label for="jenis">Bulan</label>
																<select class="form-control" name="bulan" style="width: 100%;" disabled>
																	<?php
																		$jb=array(1=>"Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
																		for($i=1;$i<=12;$i++) {
																			if($jb[$i]==$t['bulan']) {
																				echo "<option value='$jb[$i]' selected/>$jb[$i]</option>";
																			} else {
																				echo "<option value='$jb[$i]'/>$jb[$i]</option>";
																		}
									}
																	?>
																	
																</select>
															</div>
															<div class="form-group">
																<label for="">Tahun</label>
																<input type="text" class="form-control"  value="<?php echo $tahun ?>" name="tahun" disabled>
															</div>
															<hr>
															<h5 class="modal-title">Rentang 0-4 Tahun</h5>
															<div class="form-group">
																<label for="">Laki-Laki</label>
																<input type="text" class="form-control"  value="<?php echo $t['l_04']?>" name="l_04" disabled>
															</div>
															<div class="form-group">
																<label for="">Perempuan</label>
																<input type="text" class="form-control" value="<?php echo $t['p_04']?>" name="p_04" disabled>
															</div>
															<hr>
															<h5 class="modal-title">Rentang 5-14 Tahun</h5>
															<div class="form-group">
																<label for="">Laki-Laki</label>
																<input type="text" class="form-control"  value="<?php echo $t['l_514']?>" name="l_514" disabled>
															</div>
															<div class="form-group">
																<label for="">Perempuan</label>
																<input type="text" class="form-control"  value="<?php echo $t['p_514']?>" name="p_514" disabled>
															</div>
															<hr>
															<h5 class="modal-title">Rentang 15-24 Tahun</h5>
															<div class="form-group">
																<label for="">Laki-Laki</label>
																<input type="text" class="form-control"  value="<?php echo $t['l_1524']?>" name="l_1524" disabled>
															</div>
															<div class="form-group">
																<label for="">Perempuan</label>
																<input type="text" class="form-control"  value="<?php echo $t['p_1524']?>" name="p_1524" disabled>
															</div>
															<hr>
															<h5 class="modal-title">Rentang 25-34 Tahun</h5>
															<div class="form-group">
																<label for="">Laki-Laki</label>
																<input type="text" class="form-control"  value="<?php echo $t['l_2534']?>" name="l_2534" disabled>
															</div>
															<div class="form-group">
																<label for="">Perempuan</label>
																<input type="text" class="form-control"  value="<?php echo $t['p_2534']?>" name="p_2534" disabled>
															</div>
															<hr>
															<h5 class="modal-title">Rentang 35-44 Tahun</h5>
															<div class="form-group">
																<label for="">Laki-Laki</label>
																<input type="text" class="form-control"  value="<?php echo $t['l_3544']?>" name="l_3544" disabled>
															</div>
															<div class="form-group">
																<label for="">Perempuan</label>
																<input type="text" class="form-control"  value="<?php echo $t['p_3544']?>" name="p_3544" disabled>
															</div>
															<hr>
															<h5 class="modal-title">Rentang 45-54 Tahun</h5>
															<div class="form-group">
																<label for="">Laki-Laki</label>
																<input type="text" class="form-control"  value="<?php echo $t['l_4554']?>" name="l_4554" disabled>
															</div>
															<div class="form-group">
																<label for="">Perempuan</label>
																<input type="text" class="form-control"  value="<?php echo $t['p_4554']?>" name="p_4554" disabled>
															</div>
															<hr>
															<h5 class="modal-title">Rentang 55-64 Tahun</h5>
															<div class="form-group">
																<label for="">Laki-Laki</label>
																<input type="text" class="form-control"  value="<?php echo $t['l_5564']?>" name="l_5564" disabled>
															</div>
															<div class="form-group">
																<label for="">Perempuan</label>
																<input type="text" class="form-control"  value="<?php echo $t['p_5564']?>" name="p_5564" disabled>
															</div>
															<hr>
															<h5 class="modal-title">Rentang >65 Tahun</h5>
															<div class="form-group">
																<label for="">Laki-Laki</label>
																<input type="text" class="form-control"  value="<?php echo $t['l_65']?>" name="l_65" disabled>
															</div>
															<div class="form-group">
																<label for="">Perempuan</label>
																<input type="text" class="form-control" value="<?php echo $t['p_65']?>" name="p_65" disabled>
															</div>
														</div><!-- /.box-body -->
														
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



