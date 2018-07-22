<?php
//session_start();
if (empty($_SESSION['namauser']) AND empty($_SESSION['passuser'])){
	echo "<script language=Javascript>
				javascript:document.location='login.php';
		</script>";
}
else{
?>
	<script language="javascript">
			function validasi(form){
			  if (form.passlama.value == ""){
				alert("Anda Belum Memasukkan Sandi Lama Anda");
				form.passlama.focus();
				return (false);
			  }    
			  if (form.passbaru.value == ""){
				alert("Anda Belum Memasukkan Sandi Baru Anda");
				form.passbaru.focus();
				return (false);
			  }
			  if (form.passlagi.value == ""){
				alert("Masukkan Lagi Sandi Baru Anda");
				form.passlagi.focus();
				return (false);
			  }
			  if (form.passlagi.value != form.passbaru.value){
				alert("Input Sandi Baru Tidak Sesuai");
				form.passlagi.focus();
				return (false);
			  }			  
			  return (true);
			}
		</script>
<?php
    echo "<br><form method=POST onSubmit=\"return validasi(this)\" action=modul/password/aksi_pasword.php>
          <table>
          <tr><th>Masukkan Sandi Lama</th> <td>&nbsp :  &nbsp</td><td> <input class='form-control' type=text id=passlama class='form-input-gray' name='pass_lama'></td></tr>
          <tr><th>Masukkan Sandi Baru</th> <td>&nbsp : </td><td> <input class='form-control'type=text id=passbaru class='form-input-gray' name='pass_baru'></td></tr>
          <tr><th>Masukkan Lagi Sandi Baru</th><td>&nbsp : </td><td>    <input class='form-control' type=text id=passlagi class='form-input-gray' name='pass_ulangi'></td></tr>
          <tr><td></td><td></td><td><br>
		  
			<button type='submit' class='btn btn-success'>Proses</button>
			<button type='reset' class='btn btn-danger' onclick=self.history.back()>Kembali</button>
              
							
							</td>
							
							</tr>
          </table></form>";
}
?>
