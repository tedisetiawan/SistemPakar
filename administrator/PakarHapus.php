<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";

# Baca variabel URL (If Register Global ON)
$kdhapus = $_REQUEST['kdhapus'];

if ($kdhapus !="") {	
	$sql = "DELETE FROM pakarbelimbing	WHERE username='$kdhapus'";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());
		  		
	echo "DATA GEJALA BERHASIL DIHAPUS";
	include "PakarTampil.php";
}
else {
	echo "DATA USERNAME BELUM DIPILIH";
}
?>
