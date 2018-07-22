<?php
session_start();
error_reporting(0);
include "config/connection.php";
include "config/library.php";
include "config/fungsi_indotgl.php";
include "config/fungsi_combobox.php";
include "config/kode_auto.php";
include "timeout.php";
include 'connectionToDB.php';
$bridgeConnection = connectionToDB::getConnection();

if ($_SESSION['login'] == 1) {
    if (!checkLogin()) {
        $_SESSION['login'] = 0;
    }
}
if ($_SESSION['login'] == 0) {
    header('location:logtimeout.php');
} else {
    if (!isset($_SESSION['namauser']) or ! isset($_SESSION['passuser'])) {
        echo "<script language=Javascript>
				javascript:document.location='login.php';
			</script>";
    } else if (isset($_SESSION['namauser']) and isset($_SESSION['passuser'])) {
        
        $login = mysqli_query($bridgeConnection, "SELECT * FROM 3rd_administrator WHERE username='".$_SESSION['namauser']."' "
                . "AND password='".$_SESSION['passuser']."' AND type='Superuser'");

        
        //$login = mysql_query("SELECT * FROM tabel_user WHERE userid='$_SESSION[namauser]' AND passid='$_SESSION[passuser]'");
        $ketemu = mysqli_num_rows($login);
        $r = mysqli_fetch_array($login);

        if ($ketemu > 0) {
            ?>
            <!DOCTYPE html>
            <html>
                <head>
                    <meta charset="UTF-8">
                    <title>Halaman Kontrol</title>
                    <!-- Tell the browser to be responsive to screen width -->
                    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
                    <!-- Bootstrap 3.3.4 -->
                    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
                    <!-- Font Awesome Icons -->
                    <link href="fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
                    <!-- Ionicons -->
                    <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
                    <!-- Theme style -->
                    <link href="css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
                    <!-- AdminLTE Skins. Choose a skin from the css/skins
                         folder instead of downloading all of them to reduce the load. -->
                    <link href="css/_all-skins.min.css" rel="stylesheet" type="text/css" />
                    <!-- jQuery 2.1.4 -->
                    <script src="js/jQuery-2.1.4.min.js"></script>

                </head>
                <!-- ADD THE CLASS sidedar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
                <body class="skin-blue sidebar-collapse sidebar-mini">
                    <!-- Site wrapper -->
                    <div class="wrapper">
                        <header class="main-header">
                            <!-- Logo -->
                            <a href="" class="logo">
                                <!-- mini logo for sidebar mini 50x50 pixels -->
                                <span class="logo-mini"><b>D</b>uta</span>
                                <!-- logo for regular state and mobile devices -->
                                <span class="logo-lg"><b>Toko Duta</b> Bangunan</span>
                            </a>
                            <!-- Header Navbar: style can be found in header.less -->
                            <nav class="navbar navbar-static-top" role="navigation">
                                <!-- Sidebar toggle button-->
                                <a href="" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </a>
                                <div class="navbar-custom-menu">
                                    <ul class="nav navbar-nav">
                                        <!-- Messages: style can be found in dropdown.less-->

                                        <!-- Notifications: style can be found in dropdown.less -->
                                        <li >
                                            <a href="javascript:void(0);" >
                                                <?php
                                                $tgl1 = tgl_indo(date("Y-m-d"));
                                                echo "<span class='date'><b>$hari_ini, $tgl1</b></span><span class='posted'></span>
						";
                                                ?>
                                            </a>
                                        </li>
                                        <!-- User Account: style can be found in dropdown.less -->
                                        <li class="dropdown user user-menu">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                <img src="img/avatar5.png" class="user-image" alt="User Image"/>
                                                <span class="hidden-xs">Administrator</span>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <!-- User image -->
                                                <li class="user-header">
                                                    <img src="img/avatar5.png" class="img-circle" alt="User Image" />
                                                    <p>
                                                        Administrator
                                                        <small>Jln Syech Yusuf</small>
                                                    </p>
                                                </li>
                                                <!-- Menu Body -->

                                                <!-- Menu Footer-->
                                                <li class="user-footer">
                                                    <div class="pull-left">
                                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                                    </div>
                                                    <div class="pull-right">
                                                        <a href="logout" class="btn btn-default btn-flat">Keluar</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </header>

                        <!-- =============================================== -->

                        <!-- Left side column. contains the sidebar -->
                        <aside class="main-sidebar">
                            <!-- sidebar: style can be found in sidebar.less -->
                            <section class="sidebar">
                                <!-- Sidebar user panel -->
                                <div class="user-panel">
                                    <div class="pull-left image">
                                        <img src="img/avatar5.png" class="img-circle" alt="User Image" />
                                    </div>
                                    <div class="pull-left info">
                                        <p>Administrator</p>

                                        <a href=""><i class="fa fa-circle text-success"></i> Online</a>
                                    </div>
                                </div>
                                <!-- sidebar menu: : style can be found in sidebar.less -->
                                <ul class="sidebar-menu">
                                    <li class="header">MAIN MENU</li>
                                    <li class="treeview">
                                        <a href="home">
                                            <i class="fa fa-dashboard text-red"></i> <span>Beranda</span>
                                        </a>
                                    </li>
                                    <li class="treeview">
                                        <a href="administrator">
                                            <i class="fa fa-crosshairs text-red"></i> <span>Administrator</span>
                                        </a>
                                    </li>
                                    <li class="treeview">
                                        <a href="javascript:void(0);">
                                            <i class="fa fa-database text-red"></i>
                                            <span>Data Barang</span>
                                            <span class="label label-danger pull-right">3</span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="barang_masuk"><i class="fa fa-circle-o"></i> Data Barang Masuk</a></li>
                                            <li><a href="barang_keluar"><i class="fa fa-circle-o"></i> Data Barang Keluar</a></li>

                                        </ul>
                                    </li>
                                    <li class="treeview">
                                        <a href="javascript:void(0);">
                                            <i class="fa fa-navicon text-red"></i>
                                            <span>Data Transaksi</span>
                                            <span class="label label-danger pull-right">2</span>
                                        </a>
                                        <ul class="treeview-menu">
                                            <li><a href="transaksi"><i class="fa fa-circle-o"></i>Data Transaksi</a></li>
                                        </ul>
                                    </li>


                                </ul>
                            </section>
                            <!-- /.sidebar -->
                        </aside>

                        <!-- =============================================== -->

                        <!-- Content Wrapper. Contains page content -->
                        <div class="content-wrapper">

                            <?php include "data.php" ?>

                        </div><!-- /.content-wrapper -->

                        <footer class="main-footer">
                            <div class="pull-right hidden-xs">
                                <b>Toko Duta Bangunan</b> V.1.0
                            </div>
                            <strong>Copyright &copy; 2016 <a href="javascript:void(0);">Anda</a>.</strong> All rights reserved.
                        </footer>


                    </div><!-- ./wrapper -->


                    <!-- Bootstrap 3.3.2 JS -->
                    <script src="js/bootstrap.min.js" type="text/javascript"></script>
                    <!-- SlimScroll -->
                    <script src="js/jquery.slimscroll.min.js" type="text/javascript"></script>
                    <!-- FastClick -->
                    <script src='js/fastclick.min.js'></script>
                    <!-- AdminLTE App -->
                    <script src="js/app.min.js" type="text/javascript"></script>
                    <!-- AdminLTE for demo purposes -->
                    <script src="js/demo.js" type="text/javascript"></script>


                </body>
            </html>

            <?php
        } else {
            echo "<script language=Javascript>
						javascript:document.location='login.php';
					</script>";
        }
    }
}
?>