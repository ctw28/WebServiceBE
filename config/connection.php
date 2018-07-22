<?php
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$database = "db_toko_bangunan_control_website";

	// Koneksi dan memilih database di server
	mysql_connect($hostname,$username,$password) or die("Koneksi Gagal");
	mysql_select_db($database) or die("Database Tidak Ditemukan");
?>
