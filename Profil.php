<?php 
include "librari/inc.koneksidb.php";
$q = mysql_query("select * from pages where tipe='site_profil'");
while($r=mysql_fetch_array($q))
{
  echo "<h4><span class='icon-edit'></span> Profil - Belimbing Manis</h4>";
  echo "<p>".$r['isi']."</p>";
}
?>