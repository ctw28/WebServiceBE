<?php
include "config/koneksi.php";

	if($_GET['module']=="home"){
	include "modul/home/home.php";
	}
	else if($_GET['module']=="kecamatan"){
	include "modul/kecamatan/kecamatan.php";
	}
	else if($_GET['module']=="puskesmas"){
	include "modul/puskesmas/puskesmas.php";
	}
	else if($_GET['module']=="kasustb"){
	include "modul/kasustb/kasus.php";
	}
	else if($_GET['module']=="kasusTB"){
	include "modul/kasustb/kasustb.php";
	}
	else if($_GET['module']=="kepadatan"){
	include "modul/kepadatan/kepadatan.php";
	}
	else if($_GET['module']=="kepadatans"){
	include "modul/kepadatan/padat.php";
	}
	else if($_GET['module']=="kemiskinan"){
	include "modul/kemiskinan/kemiskinan.php";
	}
	else if($_GET['module']=="kemiskinans"){
	include "modul/kemiskinan/miskin.php";
	}
	else if($_GET['module']=="kmeans"){
	include "modul/kmeans/kmeans.php";
	}
	else if($_GET['module']=="kmeanss"){
	include "modul/kmeans/kmeanss.php";
	}
        else if($_GET['module']=="administrator"){
	include "modul/administrator/administrator.php";
	}
        else if($_GET['module']=="barang_masuk"){
	include "modul/barang/barang_masuk.php";
	}
        else if($_GET['module']=="transaksi"){
	include "modul/transaksi/transaksi.php";
	}
        else if($_GET['module']=="barang_keluar"){
	include "modul/barang_keluar/barang_keluar.php";
	}
        
	
?>