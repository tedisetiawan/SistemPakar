<?php
include "librari/inc.koneksidb.php";
$id_log = $_SESSION['id_log'];
$sql = "SELECT * FROM tmp_penyakit WHERE id_log='$id_log'";
$qry = mysql_query($sql, $koneksi)
or die("SQL Error" .mysql_error());
$data=mysql_fetch_array($qry);
#Samakan dengan variabel form
$kdsakit = $data['Id_Pnykt'];


?>
<style type="text/css">
<!--
.style2 {font-size: 18px}
-->
</style>
<form method="post" action="?page=gejalacek">
<table width="100%" border="0">
  <tr>
    <td width="23">&nbsp;</td>
    <td width="42">&nbsp;</td>
    <td width="400">&nbsp;</td>
    <td width="112">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"><span class="style2">MENU DIAGNOSA</span></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="center"></div></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2"><input name="TxtKodeH" type="hidden" id="TxtKodeH" value="<?=$kdsakit; ?>" />
    <?php
$query = "SELECT * FROM gejala order by id_gejala";
$hasil = mysql_query($query);
$no = 1;
while ($data = mysql_fetch_array($hasil))
{
  echo "<input type='checkbox' value='".$data['id_gejala']."' name='mk".$no."' /> ".$data['gejala']."<br />";
  $no++;
}
?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="hidden" name="jumMK" value="<?php echo $no-1; ?>" />
      <input type="submit" name="submit" value="Proses" class="btn btn-warning" /></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">Silahkan Pilih Diagnosa Beberapa Gejala Pada Tanaman Belimbing Anda </td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</form>
