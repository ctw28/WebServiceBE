<?php
//
//$aksi = "modul/barang/aksi_barang_masuk.php";

//$bridgeConnection = connectionToDB::getConnection();

//$resultSelect = mysqli_query($bridgeConnection, "SELECT * FROM 1st_data_barang");
?>
<section class="content-header">
    <h1>
        <i class=""></i>Data Barang Keluar
        <small>Daftar Data Barang Keluar</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="barang_masuk"> Data Barang Keluar</a></li>	
    </ol>
    <br>

</section>

<section class="content">
    <!-- Menampilkan data kecamatan-->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabel Data Barang Keluar</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th style="width: 50px">ID Keluar</th>
                                <th style="width: 250px">Nomor Barcode</th>
                                <th>Nama Barang</th>
                                <th>Tanggal Keluar</th>
                                <th style="width: 130px">Jumlah</th>
                                <th>Tujuan</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //include 'connectionToDB.php';
                            $bridgeConnection = connectionToDB::getConnection();
                            $resultSelect = mysqli_query($bridgeConnection, "SELECT 5th_barang_keluar.id_keluar, 5th_barang_keluar.nomor_barcode, 1st_data_barang.nama_barang, 5th_barang_keluar.tanggal_keluar, 5th_barang_keluar.jumlah, 5th_barang_keluar.tujuan  FROM 5th_barang_keluar, 1st_data_barang WHERE 1st_data_barang.nomor_barcode = 5th_barang_keluar.nomor_barcode");
                            $no = 1;
                            while ($row = mysqli_fetch_row($resultSelect)) {
                                
                                //$rp=format_rupiah($row['modal_harga']);
                                //echo $row['nomor_barcode'];
                                ?>
                                <tr>
                                <?php
                                echo "<form method='post' action='barang_masuk-$i'>";
                                ?>
                            <input type="hidden" name="tahun" value="<?php echo $row[0] ?>">
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row[0]; ?></td>
                            <td><?php echo $row[1]; ?></td>
                            <td><?php echo $row[2]; ?></td>
                            <td><?php echo $row[3]; ?></td>
                            <td><?php echo $row[4]; ?></td>
                            <td><?php echo $row[5]; ?></td>

                            </form>
                            </tr>
    <?php
    $no++;
}
?>
                        </tbody>
                    </table>
                </div><!-- /.box-body -->	 








            </div><!-- /.box-primary -->
        </div><!-- /.col-md -->
    </div><!-- /.row -->







</section>



