<?php 
include "inc.session.php"; 
include "inc.header.php"; 
include "menu.php"; 
include "../librari/inc.koneksidb.php";
$kdsakit = $_REQUEST['kdsakit'];
?>
<html>
<head>
<title>Halaman Buat Relasi Gejala Hama</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #009966;
}
-->
</style></head>
<body>
<form name="form1" method="post" action="LapGejalaHama2.php">
<table width="800" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#99FFFF">
<tr>
  <td colspan="2" bgcolor="#22B5DD"><b>TAMPILKAN GEJALA PER HAMA </b></td>
  </tr>
<tr>
  <td width="86" bgcolor="#DBEAF5"><b>Penyakit :</b></td>
  <td width="645" bgcolor="#DBEAF5">
   <select name="CmbPenyakit">
    <option value="NULL">[ Daftar Hama ]</option>
    <?php 
	$sqlp = "SELECT * FROM hama ORDER BY kd_hama";
	$qryp = mysql_query($sqlp, $koneksi) 
		    or die ("SQL Error: ".mysql_error());
	while ($datap=mysql_fetch_array($qryp)) {
		if ($datap['kd_hama']==$kdsakit) {
			$cek ="selected";
		}
		else {
			$cek ="";
		}
		echo "<option value='$datap[kd_hama]' $cek>
			  $datap[nm_hama] ($datap[kd_hama])</option>";
	}
  ?>
  </select></td>
</tr>
<tr bgcolor="#DBEAF5"> 
  <td align="center" bgcolor="#DBEAF5">&nbsp;</td>
  <td bgcolor="#DBEAF5"><input type="submit" name="Submit" value="Tampil"></td>
</tr>
</table>
</form>
<?php
include "inc.footer.php";
?>
</body>
</html>
