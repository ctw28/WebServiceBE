<?php
//
//$aksi = "modul/barang/aksi_barang_masuk.php";

//$bridgeConnection = connectionToDB::getConnection();

//$resultSelect = mysqli_query($bridgeConnection, "SELECT * FROM 1st_data_barang");
?>
<section class="content-header">
    <h1>
        <i class=""></i>Data Transaksi
        <small>Daftar Data Seluruh Transaksi</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="barang_masuk"> Data Transaksi</a></li>	
    </ol>
    <br>

</section>

<section class="content">
    <!-- Menampilkan data kecamatan-->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabel Data Transaksi</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th style="width: 50px">Id Transaksi</th>
                                <th style="width: 150px">Tanggal Transaksi</th>
                                <th>Pembeli</th>
                                <th>Kontak</th>
                                <th>Alamat</th>
                                <th>Status Transaksi</th>
                                <th>Jatuh Tempo</th>
                                <th style="width: 150px">Tanggal Pembayaran</th>
                                <th>Diskon</th>
                                <th>Total Biaya Transaksi</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //include 'connectionToDB.php';
                            $bridgeConnection = connectionToDB::getConnection();
                            $resultSelect = mysqli_query($bridgeConnection, "SELECT * FROM 2nd_data_penjualan");
                            $no = 1;
                            while ($row = mysqli_fetch_array($resultSelect)) {
                                
                                //$rp=format_rupiah($row['modal_harga']);
                                //echo $row['nomor_barcode'];
                                ?>
                                <tr>
                                <?php
                                echo "<form method='post' action='barang_masuk-$i'>";
                                ?>
                            <input type="hidden" name="tahun" value="<?php echo $row['id_transaksi'] ?>">
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['id_transaksi']; ?></td>
                            <td><?php echo $row['tanggal_transaksi']; ?></td>
                            <td><?php echo $row['pembeli']; ?></td>
                            <td><?php echo $row['kontak_pembeli']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td><?php echo $row['status_transaksi']; ?></td>
                            <td><?php echo $row['jatuh_tempo']; ?></td>
                            <td><?php echo $row['tanggal_pembayaran']; ?></td>
                            <td><?php echo $row['diskon']."%"; ?></td>
                            <td><?php echo "Rp ".$row['cost_transaksi']; ?></td>

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



