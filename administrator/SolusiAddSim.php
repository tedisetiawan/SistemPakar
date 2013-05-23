<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$TxtKodeH 	= $_REQUEST['TxtKodeH'];
$TxtGejala 	= $_REQUEST['TxtGejala'];

# Validasi Form
if (trim($TxtKodeH)=="") {
	echo "Kode belum terbentuk, ulangi kembali";
	include "SolusiAddFm.php";
}
elseif (trim($TxtGejala)=="") {
	echo "Gejala masih kosong, ulangi kembali";
	include "SolusiAddFm.php";
}
else {
	$sql  = " INSERT INTO solusi (id_solusi,solusi) ";
	$sql .=	" VALUES ('$TxtKodeH','$TxtGejala')";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	$pesan= "Data berhasil disimpan";
	header("Location: SolusiTampil.php");
}
?>
