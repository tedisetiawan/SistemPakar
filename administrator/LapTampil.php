<?php 
include "inc.session.php";
include "inc.header.php"; 
include "menu.php"; 
include "../librari/inc.koneksidb.php";
?>
<html>
<head>
<title>Tampilan Data Hama</title>
</head>
<body>
<table width="593" border="0" cellpadding="2" cellspacing="1" bgcolor="#DBEAF5">
  <tr>
    <td>&nbsp;</td>
    <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
    <td colspan="5"><b>DAFTAR SEMUA AKTIVITAS PAKAR </b></td>
  </tr>
  <tr bgcolor="#DBEAF5">
    <td width="23" bordercolor="#000000">&nbsp;</td> 
    <td width="23" bordercolor="#000000"><b>No</b></td>
    <td width="31" bordercolor="#000000"><strong>Id</strong></td>
    <td width="126" bordercolor="#000000"><strong>Nama Pengguna </strong></td>
    <td width="313" bordercolor="#000000"><strong>Jenis Penyakit </strong></td>
    <td width="46" align="center" bordercolor="#000000"><strong>Pilih</strong></td>
  </tr>
  <?php 
	$sql = "select distinct analisahasil.id,analisahasil.id_penyakit,log.nama,hamapenyakit.jnspnykt  from ((log inner join analisahasil 
on log.id=analisahasil.id) inner join hamapenyakit on 
analisahasil.id_penyakit=hamapenyakit.id_pnykt)
";
	$qry = mysql_query($sql, $koneksi) 
		 or die ("SQL Error".mysql_error());
	$no=0;
	while ($data=mysql_fetch_array($qry)) {
	$no++;
  ?>
  <tr bgcolor="#FFFFFF">
    <td bordercolor="#000000" bgcolor="#DBEAF5">&nbsp;</td>
    <td bordercolor="#000000" bgcolor="#DBEAF5"><?php echo $no; ?></td>
    <td bordercolor="#000000" bgcolor="#DBEAF5"><?php echo $data['id']; ?></td>
    <td bordercolor="#000000" bgcolor="#DBEAF5"><?php echo $data['nama']; ?></td>
    <td bordercolor="#000000" bgcolor="#DBEAF5"><?php echo $data['jnspnykt']; ?></td>
    <td align="center" bordercolor="#000000" bgcolor="#DBEAF5">
	<a href="?page=dafgejala&kdsakit=<?=$data['Id'];?>">Cetak</a></td>
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
