<?php 
include "librari/inc.koneksidb.php";
  echo "<h4><span class='icon-th-large'></span> Artikel - Belimbing Manis</h4>";
$batas   = 5;//banyaknya data yang ditampilkan 
$halaman = $_GET['halaman']; 
if(empty($halaman)){ 
    $posisi=0; 
    $halaman=1; 
} 
else{ 
    $posisi = ($halaman-1) * $batas; 
} 
 
//Sesuaikan perintah SQL 
$tampil="select * from artikel limit $posisi,$batas"; 
$hasil=mysql_query($tampil); 

echo "<table class='table table-striped table-condensed'>";
$no=$posisi+1; // Agar angka (penomoran) mengikuti paging 
while ($data=mysql_fetch_array($hasil)){ 
  echo "<tr><td>$no</td><td><a href='?page=detailartikel&id=".$data['id_artikel']."'>".$data['judul']."</td><td>".substr($data['artikel'],0,100)."</td></tr>"; 
  $no++; 
} 
echo "</table>"; 
 
//Hitung total data dan halaman serta link 1,2,3 ... 
echo "<br>Halaman : "; 
$file="index.php"; 
 
$tampil2="select * from artikel"; 
$hasil2=mysql_query($tampil2); 
$jmldata=mysql_num_rows($hasil2); 
$jmlhalaman=ceil($jmldata/$batas); 
 
for($i=1;$i<=$jmlhalaman;$i++) 
if ($i != $halaman) 
{ 
    echo " <a href=$_SERVER[PHP_SELF]?page=artikel&halaman=$i>$i</A> | "; 
} 
else 
{ 
    echo " <b>$i</b> | "; 
} 
echo "<p>Total Data Artikel : <b>$jmldata</b> artikel</p>"; 
?>