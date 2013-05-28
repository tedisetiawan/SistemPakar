<?php
include "inc.header.php"; 
include "menu.php"; 
include "../librari/inc.koneksidb.php";
if(isset($_REQUEST['kdsakit'])){
$kdsakit= $_REQUEST['kdsakit'];
}else{
$kdsakit= "";
}
?>
<html>
<head>
<title> HALAMAN BUAT RELASI GEJALA SERANGAN HAMA</title>
<script type="text/JavaScript">
<!--
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//-->
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style></head>
<body>
<form action="../../jagung/PakarAdmin/RelasiAddSim.php" method="post" name="form1" target="_self" id="form1">
  <table width="894" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#000000">
    <tr>
      <td colspan="2" bordercolor="#006600" bgcolor="#77B6D0"><div align="center">[ RELASI GEJALA DAN HAMA PENYAKIT] </div></td>
    </tr>
    <tr>
      <td colspan="2" bordercolor="#006600" bgcolor="#FFFFFF">Nama Hama Dan Penyakit: </td>
    </tr>
    <tr>
      <td colspan="2" bordercolor="#006600" bgcolor="#FFFFFF"><select name="CmbPenyakit" onChange="MM_jumpMenu('parent',this,0)">
        <option value="<?=$_SERVER['PHP_SELF'];?>" [ Daftar Penyakit ]</option>
		<?php
		$sqlp = "SELECT * FROM hamapenyakit ORDER BY id_pnykt";
		$qryp = mysql_query($sqlp, $koneksi)
			or die ("SQL Error: ".mysql_error());
		while ($datap=mysql_fetch_array($qryp)) {
			if($datap['id_pnykt']==$kdsakit) {
				$cek ="selected";
			}
		else {
			$cek ="";
		}
		// kode untuk menampilkan daftar
		echo "<option value='RelasiAddPilih.php?kdsakit=$datap[id_pnykt]' $cek>
			$datap[jnspnykt] 
			</option>";
		//echo "<option value='$datap[kd_hape]' $cek>
			 // $datap[nm_hape] ($datap[kd_hape])</option>";
		}
		?>
      </select>
      <input name="TxtKodeH" type="hidden" id="TxtKodeH" value="<?=$kdsakit; ?>" /></td>
    </tr>
    <tr>
      <td colspan="2" bordercolor="#006600" bgcolor="#FFFFFF">Daftar Gejala : </td>
    </tr>
	<?php
	$sql = "SELECT * FROM gejala ORDER BY id_gejala";
	$qry = mysql_query($sql, $koneksi)
		or die("SQL Error:".mysql_error());
		$no=0;
	while ($data=mysql_fetch_array($qry)){
		$no++;
		$sqlr = "SELECT * FROM relasi ";
		$sqlr .= "WHERE id_pnykt='$kdsakit'";
		$sqlr .= "AND id_gejala='$data[id_gejala]'";
		$qryr = mysql_query($sqlr, $koneksi);
		$cocok = mysql_num_rows($qryr);
		//Kode untuk nilai gejala terpilih
		// Kode untuk memberi warna untuk warna pada nilai terpilih
		if ($cocok==1){
			$cek = "checked";
			$bg = "#CCFF00";
		}
		else {
			$cek ="";
			$bg="#FFFFFF";
		}
		?>
    <tr bgcolor="#FFFFFF">
      <td width="31" bordercolor="#000000" bgcolor="#FFFFFF">
	  <input name="CekGejala[]" type="checkbox"
	  value="<?= $data['id_gejala'];?>" <?= $cek; ?> >
	  </td>
      <td width="846" bordercolor="#000000" bgcolor="#FFFFFF"><? echo $data['gejala'];?></td>
    </tr>
	<?php
	}
	?>
    <tr bgcolor="#dbeaf5">
      <td colspan="2" align="center" bordercolor="#006600" bgcolor="#dbeaf5">
	  <input type="submit" name="Submit" value="Simpan">
	  <input type="reset" name="reset" value="Normalkan"> <a href="javascript:history.back()" class="btn btn-warning">Batal</a>
	  </td>
    </tr>
  </table>
</form>
<?php
include "inc.footer.php";
?>

</body>
</html>
