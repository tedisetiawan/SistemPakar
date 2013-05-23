<?php 
include "inc.session.php"; 
include "inc.header.php";
include "menu.php"; 
include "../librari/inc.koneksidb.php";
?>
<html>
<head>
<title>Tampilan Data Hama</title></head>
<body>
<table width="894" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
  <tr> 
    <td colspan="4" bgcolor="#77B6D0"><b>DAFTAR SEMUA HAMA </b></td>
  </tr>
  <tr> 
    <td width="39"><b>No</b></td>
    <td width="323"><b>Nama Hama </b></td>
    <td width="345"><strong>Penjelasan Hama </strong></td>
    <td width="166" align="center"><b>Pilihan</b></td>
  </tr>
  <?php 
	$sql = "SELECT kd_hama,nm_hama,left(penjelasan,100)as penjelasan FROM hama ORDER BY kd_hama";
	$qry = mysql_query($sql, $koneksi) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {
	$no++;
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td><?php echo $no; ?></td>
    <td><?php echo $data['nm_hama']; ?></td>
    <td><?php echo $data['penjelasan']; ?></td>
    <td align="center"> 
	  <a href="HamaEditFm.php?kdubah=<? echo $data['kd_hama']; ?>" target="_self">Ubah</a> 
      | <a href="HamaHapus.php?kdhapus=<? echo $data['kd_hama']; ?>" target="_self">Hapus</a></td>
  </tr>
  <?php
  }
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><a href="HamaAddFm.php">Tambah</a></td>
  </tr>
</table>
<?php
include "inc.footer.php";
?>
</body>
</html>
