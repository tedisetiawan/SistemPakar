<?php 
include "librari/inc.koneksidb.php";
  echo "<h4><span class='icon-th-large'></span> Artikel - Belimbing Manis</h4>";

$tampil="select * from artikel where id_artikel='".$_GET['id']."'"; 
$hasil=mysql_query($tampil); 
$no=$posisi+1; // Agar angka (penomoran) mengikuti paging 
while ($data=mysql_fetch_array($hasil)){ 
  echo "<h3>".$data['judul']."</h3><p>".$data['artikel']."</p>"; 
  $no++; 
} 
?>