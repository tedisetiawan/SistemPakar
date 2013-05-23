<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";

# Baca variabel URL (If Register Global ON)
$kdhapus = $_REQUEST['kdhapus'];

if ($kdhapus !="") {	
	$sql = "DELETE FROM solusi	WHERE id_solusi='$kdhapus'";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());
		  	
	$sql3 = "DELETE FROM relasigejala WHERE id_solusi='$kdhapus'";
	mysql_query($sql3, $koneksi);

	echo "DATA SOLUSI BERHASIL DIHAPUS";
	include "SolusiTampil.php";
}
else {
	echo "DATA SOLUSI BELUM DIPILIH";
}
?>
