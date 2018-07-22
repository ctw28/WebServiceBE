<?php
//
//$aksi = "modul/barang/aksi_barang_masuk.php";

//$bridgeConnection = connectionToDB::getConnection();

//$resultSelect = mysqli_query($bridgeConnection, "SELECT * FROM 1st_data_barang");
?>
<section class="content-header">
    <h1>
        <i class=""></i>Data Barang
        <small>Daftar Data Barang Masuk</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="barang_masuk"> Data Barang Masuk</a></li>	
    </ol>
    <br>

</section>

<section class="content">
    <!-- Menampilkan data kecamatan-->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabel Data Barang Masuk</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th style="width: 50px">No Barcode</th>
                                <th style="width: 250px">Nama Barang</th>
                                <th>Harga Modal (Rp)</th>
                                <th>Harga Barang (Rp)</th>
                                <th style="width: 130px">Tanggal Masuk</th>
                                <th>Stok Barang</th>
                                <th>Type</th>
                                <th>Item</th>
                                <th>Gudang</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //include 'connectionToDB.php';
                            $bridgeConnection = connectionToDB::getConnection();
                            $resultSelect = mysqli_query($bridgeConnection, "SELECT * FROM 1st_data_barang");
                            $no = 1;
                            while ($row = mysqli_fetch_array($resultSelect)) {
                                
                                //$rp=format_rupiah($row['modal_harga']);
                                //echo $row['nomor_barcode'];
                                ?>
                                <tr>
                                <?php
                                echo "<form method='post' action='barang_masuk-$i'>";
                                ?>
                            <input type="hidden" name="tahun" value="<?php echo $row['nomor_barcode'] ?>">
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['nomor_barcode']; ?></td>
                            <td><?php echo $row['nama_barang']; ?></td>
                            <td><?php echo "Rp ".$row['modal_harga']; ?></td>
                            <td><?php echo "Rp ".$row['harga_barang']; ?></td>
                            <td><?php echo $row['tanggal_masuk']; ?></td>
                            <td><?php echo $row['stok_barang']; ?></td>
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo $row['item']; ?></td>
                            <td><?php echo $row['gudang']; ?></td>
                            <td><?php echo $row['keterangan']; ?></td>

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



