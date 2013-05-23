<?php 
include "inc.session.php"; 
include "inc.header.php";
include "menu.php"; 
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";

$kdubah=$_REQUEST['kdubah'];
if($kdubah !=""){
	#Menampilkan Data
	$sql = "SELECT * FROM pakarbelimbing WHERE username='$kdubah'";
	$qry = mysql_query($sql, $koneksi)
		or die ("SQL Error".mysql_error());
	$data=mysql_fetch_array($qry);
	
	#Samakan Dengan Variabel Form
	// Memindah Data Ke dalam Variable Buatan Sendiri
	$TxtUsername = $data['username'];
	$TxtUsernameH = $data['username'];
	$TxtPassword = $data['password'];
}
?>
<html>
<head>
<title>Masukan Data Gejala</title>
</head>
<body>
<form action="PakarEditSim.php" method="post" name="form1" target="_self">
  <table width="800" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
    <tr> 
      <td colspan="2" bgcolor="#77B6D0"><b>MASUKAN PAKAR BELIMBING</b></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td>Kode</td>
      <td><input name="TxtUsername" type="text" disabled="disabled" id="TxtUsername" value="<? echo $TxtUsername; ?>" size="25"  maxlength="25">
	      <input name="TxtUsernameH" type="hidden" id="TxtUsernameH" value="<? echo $TxtUsernameH; ?>"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td width="77">Gejala</td>
      <td width="361"><input name="TxtPassword" type="text" id="TxtPassword" value="<?= $TxtPassword; ?>" size="35" maxlength="25"></td>
    </tr>
    <tr bgcolor="#FFFFFF"> 
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Simpan"></td>
    </tr>
  </table>
</form>
<?php
include "inc.footer.php";
?>
</body>
</html>
