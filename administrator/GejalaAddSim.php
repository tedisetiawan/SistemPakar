<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$TxtKodeH 	= $_REQUEST['TxtKodeH'];
$TxtGejala 	= $_REQUEST['TxtGejala'];

	$sql  = " INSERT INTO gejala (id_gejala,gejala) ";
	$sql .=	" VALUES ('$TxtKodeH','$TxtGejala')";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	$pesan= "Data berhasil disimpan";
	header("Location: GejalaTampil.php");
?>
