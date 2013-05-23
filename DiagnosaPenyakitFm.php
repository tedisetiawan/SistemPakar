<?php 
include "librari/inc.koneksidb.php";
?>
<html>
<head>
<title>Tampilan Data Hama</title>
</head>
<body>
<form action="?page=penyakitcek" method="post" name="form1" target="_self" id="form1">
<table width="100%" border="0" cellpadding="2" cellspacing="1" bgcolor="" >
  <tr>
    <td colspan="4" bgcolor="">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="4" bgcolor=""><div align="center"><b>MENU DIAGNOSA </b></div></td>
  </tr>
  <tr bgcolor="">
    <td colspan="4" bordercolor="" bgcolor="">&nbsp;</td>
  </tr>
  
  <?php 
	$sql = "SELECT * FROM hamapenyakit ORDER BY Id_Pnykt";
	$qry = mysql_query($sql, $koneksi) 
		 or die ("SQL Error".mysql_error());
	while ($data=mysql_fetch_array($qry)) {

  ?>
  <tr bgcolor="">
    <td width="51" bordercolor="#000000" bgcolor="">&nbsp;</td>
    <td width="26" bordercolor="#000000" bgcolor=""><input name="RbPenyakit" type="radio" value="<?php echo $data['Id_Pnykt'];?>"></td>
    <td width="438" bordercolor="" bgcolor=""><?php echo $data['JnsPnykt']; ?></td>
    <td width="64" bordercolor="#000000" bgcolor="">&nbsp;</td>
  </tr>
  <?php
  }
  ?>
  <tr bgcolor="">
    <td bordercolor="#000000" bgcolor="">&nbsp;</td>
    <td height="54" bordercolor="#000000" bgcolor="">&nbsp;</td>
    <td bordercolor="#000000" bgcolor="">
      <div align="center">
        <input type="submit" name="Submit" class="btn btn-warning" value="Proses Selanjutnya">
      </div></td>
    <td bordercolor="#000000" bgcolor="">&nbsp;</td>
  </tr>
  <tr bgcolor="">
    <td bordercolor="#000000" bgcolor="">&nbsp;</td>
    <td height="24" bordercolor="#000000" bgcolor="">&nbsp;</td>
    <td bordercolor="#000000" bgcolor="">&nbsp;</td>
  </tr>
  <tr bgcolor="">
    <td height="29" bordercolor="#000000" bgcolor="">&nbsp;</td>
    <td height="29" bordercolor="#000000" bgcolor="">&nbsp;</td>
    <td height="29" bordercolor="#000000" bgcolor=""><div align="center">Silahkan Pilih Penyakit Terlebih Dahulu Yang Menyerang Pada Tanaman Belimbing Anda </div></td>
  </tr>
  <tr bgcolor="">
    <td bordercolor="#000000" bgcolor="">&nbsp;</td> 
    <td height="47" bordercolor="#000000" bgcolor="">&nbsp;</td>
    <td bordercolor="#000000" bgcolor="">&nbsp;</td>
  </tr>
</table>
</body>
</html>
