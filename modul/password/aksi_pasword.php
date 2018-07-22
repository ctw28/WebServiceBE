<?php
	session_start();
	if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	  echo "<script language=Javascript>
					javascript:document.location='../../login.php';
			</script>";
	}
	else{
		include "../../config/connection.php";

		$r=mysql_fetch_array(mysql_query("SELECT * FROM tabel_user where userid='$_SESSION[namauser]'"));

		$pass_lama=md5($_POST['pass_lama']);
		$pass_baru=md5($_POST['pass_baru']);

		// Apabila password lama cocok dengan password admin di database
		if ($pass_lama==$r['passid']){
			mysql_query("UPDATE tabel_user SET passid = '$pass_baru' WHERE userid='$_SESSION[namauser]'");
			$_SESSION['passuser'] = $pass_baru;
			echo "<script language=Javascript>
					window.alert('Kata Sandi Telah Di Ubah');
					document.location='../../media.php?module=home';
				</script>";
		}
		else{
			echo "<script language=Javascript>
					window.alert('Anda Salah Memasukkan Sandi Lama Anda.');
					history.go(-1);
				</script>";
		}
	}
?>