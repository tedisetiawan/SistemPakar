<?php 
include "inc.session.php"; 
include "inc.header.php"; 
include "menu.php"; 
include "../librari/inc.koneksidb.php";
?>
<html>
<head>
<title>Tampilan Data Penyakit</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #009966;
}
-->
</style></head>
<body>
<table width="800" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#22B5DD">
  <tr> 
    <td colspan="2"><b>DAFTAR SEMUA HAMA </b></td>
  </tr>
  <tr bgcolor="#DBEAF5"> 
    <td colspan="2">&nbsp;</td>
  </tr>
  <?php 
	$sql = "SELECT * FROM hama ORDER BY kd_hama";
	$qry = mysql_query($sql, $koneksi) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
	$no++;
  ?>
  <tr bgcolor="#FFFFFF">
    <td width="110">Kode</td>
    <td width="622"><? echo $data['kd_hama']; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td valign="top">Nama Indonesia </td>
    <td><? echo $data['nm_hama']; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td valign="top">Nama Latin </td>
    <td><? echo $data['nm_latin']; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td valign="top">Definisi</td>
    <td><? echo $data['definisi']; ?></td>
  </tr>
  <tr bgcolor="#FFFFFF"> 
    <td valign="top">Penanganan</td>
    <td><? echo $data['penanganan']; ?></td>
  </tr>
  <tr bgcolor="#DBEAF5"> 
    <td colspan="2">&nbsp;</td>
  </tr>
  <?php
  }
  ?>
</table>
<?php
include "inc.footer.php";
?>
</body>
</html>
