<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$TxtKodeH 	 = $_REQUEST['TxtKodeH'];
$TxtPenyakit = $_REQUEST['TxtPenyakit'];
$TxtKeterangan   = $_REQUEST['TxtKeterangan'];

	$sql  = " INSERT INTO hamapenyakit (Id_Pnykt,JnsPnykt,Keterangan) ";
	$sql .=	" VALUES ('$TxtKodeH','$TxtPenyakit','$TxtKeterangan')";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	$pesan= "DATA TELAH BERHASIL DISIMPAN";
	header("Location: PenyakitTampil.php");
?>
