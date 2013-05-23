<?php 
include "inc.session.php";
include "inc.header.php"; 
include "menu.php";
include "../librari/inc.koneksidb.php";
?>
<html>
<head>
<title>Tampilan Data Pakar</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #009966;
}
-->
</style></head>
<body>
<table width="891" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
  <tr bgcolor="#33FFFF"> 
    <td colspan="3" bgcolor="#77B6D0"><b>DAFTAR SEMUA PAKAR</b></td>
  </tr>
  <tr> 
    <td width="222"><b>Username</b></td>
    <td width="371"><b>Password</b></td>
    <td width="282" align="center"><b>Pilihan</b></td>
  </tr>
  <?php 
	$sql = "SELECT * FROM pakarbelimbing ORDER BY username";
	$qry = mysql_query($sql, $koneksi) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
	$no++;
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td><?php echo $data['username']; ?></td>
    <td><?php echo $data['password']; ?></td>
    <td align="center"> 
	  <a href="PakarEditFm.php?kdubah=<? echo $data['username']; ?>" target="_self">Ubah</a> 
      | <a href="PakarHapus.php?kdhapus=<? echo $data['username']; ?>" target="_self">Hapus</a></td>
  </tr>
  <?php
  }
  ?>
  <tr> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><a href="PakarAddFm.php">Tambah</a></td>
  </tr>
</table>
<?php
include "inc.footer.php";
?>
</body>
</html>
