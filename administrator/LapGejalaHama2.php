<?php 
include "inc.session.php"; 
include "inc.header.php"; 
include "menu.php"; 
include "../librari/inc.koneksidb.php";

$kdsakit = $_REQUEST['CmbPenyakit'];
$sqlp = "SELECT * FROM hama WHERE kd_hama='$kdsakit' ";
$qryp = mysql_query($sqlp);
$datap= mysql_fetch_array($qryp);
$sakit = $datap['nm_hama'];
?>
<html>
<head>
<title>Tampilan Data Gejala Penyakit</title>
</head>
<body>
<div align="center"><b>NAMA HAMA : 
  <?= $sakit; ?> 
  </b>
</div>
<table width="800" border="0" align="center" cellpadding="2" cellspacing="1" bgcolor="#22B5DD">
  <tr> 
    <td colspan="3"><b>DAFTAR GEJALA</b></td>
  </tr>
  <tr bgcolor="#DBEAF5"> 
    <td width="21" align="center"><b>No</b></td>
    <td width="47"><b>Kode</b></td>
    <td width="316" bgcolor="#DBEAF5"><b>Nama Gejala</b></td>
  </tr>
  <?php 
	$sqlg  = "SELECT gejala.* FROM gejala,relasi ";
	$sqlg .= "WHERE gejala.kd_gejala=relasi.kd_gejala ";
	$sqlg .= "AND  relasi.kd_hama='$kdsakit' ";
	$sqlg .= "ORDER BY gejala.kd_gejala";
	$qryg = mysql_query($sqlg, $koneksi) 
		 or die ("SQL Error".mysql_error());
	while ($datag=mysql_fetch_array($qryg)) {
	$no++;
  ?>
  <tr bgcolor="#FFFFFF"> 
    <td align="center"><?php echo $no; ?></td>
    <td><?php echo $datag['kd_gejala']; ?></td>
    <td><?php echo $datag['nm_gejala']; ?></td>
  </tr>
  <?php
  }
  ?>
  <tr> 
    <td colspan="3" bgcolor="#DBEAF5">&nbsp;</td>
  </tr>
</table>
<?php
include "inc.footer.php";
?>
</body>
</html>
