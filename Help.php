<?php 
include "librari/inc.koneksidb.php";
$q = mysql_query("select * from pages where tipe='site_help'");
while($r=mysql_fetch_array($q))
{
  echo "<h4><span class='icon-inbox'></span> Bantuan - Belimbing Manis</h4>";
  echo "<p>".$r['isi']."</p>";
}
?>