<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";

# Baca variabel URL (If Register Global ON)
$kdhapus = $_REQUEST['kdhapus'];

if ($kdhapus !="") {	
	$sql = "DELETE FROM gejala	WHERE id_gejala='$kdhapus'";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());
		  
	$sql2 = "DELETE FROM relasi WHERE id_gejala='$kdhapus'";
	mysql_query($sql2, $koneksi);
	
	$sql3 = "DELETE FROM relasigejala WHERE id_gejala='$kdhapus'";
	mysql_query($sql3, $koneksi);

	echo "DATA GEJALA BERHASIL DIHAPUS";
	include "GejalaTampil.php";
}
else {
	echo "DATA GEJALA PEBLUM DIPILIH";
}
?>
