<?php 
include "librari/inc.koneksidb.php";

$kdsakit = $_REQUEST['kdsakit'];
$sqlp = "SELECT * FROM hamapenyakit WHERE id_Pnykt='$kdsakit' ";
$qryp = mysql_query($sqlp);
$datap= mysql_fetch_array($qryp);
$sakit = $datap['JnsPnykt'];
if(isset($datap['Keterangan'])){
		$TxtKeterangan= $datap['Keterangan'];
}else{
	$TxtKeterangan= "";
}
?>
<html>
<head>
<title>Tampilan Data Gejala</title>
</head>
<body>
<table width="593" border="0" cellpadding="2" cellspacing="0" bgcolor="#000000">
  <tr>
    <td colspan="5" bgcolor="#DBEAF5">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" bgcolor="#DBEAF5">&nbsp;</td>
  </tr>
  <tr> 
    <td bgcolor="#DBEAF5">&nbsp;</td>
    <td colspan="4" bgcolor="#DBEAF5"><b>GEJALA HAMA :
        <?= strtoupper($sakit); ?>
    </b></td>
  </tr>
  <tr bgcolor="#DBEAF5">
    <td width="21" align="center" bgcolor="#DBEAF5">&nbsp;</td> 
    <td width="20" align="center" bgcolor="#00CCFF"><b>No</b></td>
    <td width="96" bgcolor="#00CCFF"><b>Kode</b></td>
    <td width="380" bgcolor="#00CCFF"><b>Nama Gejala</b></td>
    <td width="56" bgcolor="#DBEAF5">&nbsp;</td>
  </tr>
  <?php 
	$sqlg  = "SELECT gejala.* FROM gejala,relasi ";
	$sqlg .= "WHERE gejala.id_gejala=relasi.id_gejala ";
	$sqlg .= "AND  relasi.Id_Penyakit='$kdsakit' ";
	$sqlg .= "ORDER BY gejala.id_gejala";
	$qryg = mysql_query($sqlg, $koneksi) 
		 or die ("SQL Error".mysql_error());
	$no=0;
	while ($datag=mysql_fetch_array($qryg)) {
	$no++;
  ?>
  <tr bgcolor="#FFFFFF">
    <td align="center" bgcolor="#DBEAF5">&nbsp;</td> 
    <td align="center" bgcolor="#DBEAF5"><?php echo $no; ?></td>
    <td bgcolor="#DBEAF5"><?php echo $datag['id_gejala']; ?></td>
    <td bgcolor="#DBEAF5"><?php echo $datag['gejala']; ?></td>
    <td bgcolor="#DBEAF5">&nbsp;</td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td colspan="5" bgcolor="#DBEAF5">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#DBEAF5">&nbsp;</td>
    <td colspan="3" bgcolor="#DBEAF5">Keterangan :  
        <?= $TxtKeterangan; ?>&nbsp;</td>
    <td bgcolor="#DBEAF5">&nbsp;</td>
  </tr>
  <tr> 
    <td bgcolor="#DBEAF5">&nbsp;</td>
    <td colspan="3" bgcolor="#DBEAF5">&nbsp;</td>
    <td bgcolor="#DBEAF5">&nbsp;</td>
  </tr>
</table>
</body>
</html>
