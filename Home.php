<?php 
include "librari/inc.koneksidb.php";
$q = mysql_query("select * from pages where tipe='site_home'");
while($r=mysql_fetch_array($q))
{
  echo "<h4><span class='icon-dashboard'></span> Beranda - Belimbing Manis</h4>";
  echo "<p>".$r['isi']."</p>";
}
?>