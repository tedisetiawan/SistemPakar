<?php 
include "librari/inc.koneksidb.php";
  echo "<h4><span class='icon-table'></span> Data Diagnosa - Belimbing Manis</h4>";
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
$tampil="select * from log a left join (select y.JnsPnykt, x.Id_Pnykt, x.id_log from tmp_penyakit x left join hamapenyakit y on x.Id_Pnykt=y.Id_Pnykt) b on a.id_log=b.id_log where a.id_pengguna='".$_SESSION['id_pengguna']."' group by a.id_log limit $posisi,$batas"; 
$hasil=mysql_query($tampil); 

echo "<table class='table table-striped table-condensed'>";
$no=$posisi+1; // Agar angka (penomoran) mengikuti paging 
while ($data=mysql_fetch_array($hasil)){ 
  echo "<tr><td width='30'>$no</td><td><a href='?page=detaildiagnosa&id_log=".$data['id_log']."'>".$data['JnsPnykt']."</td></tr>"; 
  $no++; 
} 
echo "</table>"; 
 
//Hitung total data dan halaman serta link 1,2,3 ... 
echo "<br>Halaman : "; 
$file="index.php"; 
 
$tampil2="select * from log a left join (select y.JnsPnykt, x.Id_Pnykt, x.id_log from tmp_penyakit x left join hamapenyakit y on x.Id_Pnykt=y.Id_Pnykt) b on a.id_log=b.id_log where a.id_pengguna='".$_SESSION['id_pengguna']."' group by a.id_log"; 
$hasil2=mysql_query($tampil2); 
$jmldata=mysql_num_rows($hasil2); 
$jmlhalaman=ceil($jmldata/$batas); 
 
for($i=1;$i<=$jmlhalaman;$i++) 
if ($i != $halaman) 
{ 
    echo " <a href=$_SERVER[PHP_SELF]?page=datadiagnosa&halaman=$i>$i</A> | "; 
} 
else 
{ 
    echo " <b>$i</b> | "; 
} 
echo "<p>Total Data Artikel : <b>$jmldata</b> data Diagnosa</p>"; 
?>