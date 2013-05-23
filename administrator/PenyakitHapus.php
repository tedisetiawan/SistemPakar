<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";

# Baca variabel URL (If Register Global ON)
$kdhapus = $_REQUEST['kdhapus'];

if ($kdhapus !="") {	
	$sql = "DELETE FROM hamapenyakit WHERE Id_Pnykt='$kdhapus'";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());
	
	$sql2 = "DELETE FROM relasi WHERE id_penyakit='$kdhapus'";
	mysql_query($sql2, $koneksi);
	
	echo "DATA PENYAKIT BERHASIL DIHAPUS";
	include "PenyakitTampil.php";
}
else {
	echo "DATA PENYAKIT BELUM DIPILIH";
}
?>
