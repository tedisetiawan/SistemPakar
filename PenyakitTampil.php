<?php 
include "librari/inc.koneksidb.php";
?>
<html>
<head>
<title>Tampilan Data Hama</title></head>
<body>
<table width="588" border="0" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
  <tr>
    <td>&nbsp;</td>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td colspan="4"><b>DAFTAR SEMUA PENYAKIT </b></td>
  </tr>
  <tr bgcolor="#DBEAF5">
    <td width="42" bordercolor="#000000">&nbsp;</td> 
    <td width="27" bordercolor="#000000"><b>No</b></td>
    <td width="121" bordercolor="#000000"><b>Id Penyakit </b></td>
    <td width="317" bordercolor="#000000" bgcolor="#DBEAF5"><strong>Jenis Penyakit </strong></td>
    <td width="55" align="center" bordercolor="#000000"><strong>Pilih</strong></td>
  </tr>
  <?php 
	$sql = "SELECT * FROM hamapenyakit ORDER BY Id_Pnykt";
	$qry = mysql_query($sql, $koneksi) 
		 or die ("SQL Error".mysql_error());
	$no=0;
	while ($data=mysql_fetch_array($qry)) {
	$no++;
  ?>
  <tr bgcolor="#FFFFFF">
    <td bordercolor="#000000" bgcolor="#DBEAF5">&nbsp;</td>
    <td bordercolor="#000000" bgcolor="#DBEAF5"><?php echo $no; ?></td>
    <td bordercolor="#000000" bgcolor="#DBEAF5"><?php echo $data['Id_Pnykt']; ?></td>
    <td bordercolor="#000000" bgcolor="#DBEAF5"><?php echo $data['JnsPnykt']; ?></td>
    <td align="center" bordercolor="#000000" bgcolor="#DBEAF5">
	<a href="?page=dafgejala&kdsakit=<?=$data['Id_Pnykt'];?>">Lihat</a></td>
  </tr>
  
  <?php
  }
  ?>
</table>
</body>
</html>
