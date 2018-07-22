<?php
$aksi = "modul/admin/aksi_kepadatan.php";
?>
<section class="content-header">
    <h1>
        <i class=""></i>Administrator
        <small>Daftar Data Administrator</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="javascript:void(0);"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="administrator"> Administrator</a></li>	
    </ol>
    <br>

</section>

<section class="content">
    <!-- Menampilkan data kecamatan-->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tabel Data Administrator</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style="width: 10px">No</th>
                                <th>Username</th>
                                <th>Password</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //include 'connectionToDB.php';
                            $bridgeConnection = connectionToDB::getConnection();
                            $resultSelect = mysqli_query($bridgeConnection, "SELECT * FROM 3rd_administrator");
                            $no = 1;
                            while ($row = mysqli_fetch_array($resultSelect)) {
                                ?>
                                <tr>
                                    <?php
                                    echo "<form method='post' action='administrator-$i'>";
                                    ?>
                            <input type="hidden" name="tahun" value="<?php echo $row['id_administrator']; ?>">
                            <td><?php echo $no; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['password']; ?></td>
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



