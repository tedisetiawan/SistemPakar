<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$TxtUsername 	= $_REQUEST['TxtUsername'];
$TxtPassword 	= $_REQUEST['TxtPassword'];

# Validasi Form
if (trim($TxtUsername)=="") {
	echo "Username Masih Kosong, ulangi kembali";
	include "PakarAddFm.php";
}
elseif (trim($TxtPassword)=="") {
	echo "Password masih kosong, ulangi kembali";
	include "PakarAddFm.php";
}
else {
	$sql  = " INSERT INTO pakarbelimbing (username,password) ";
	$sql .=	" VALUES ('$TxtUsername','$TxtPassword')";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	$pesan= "Data berhasil disimpan";
	header("Location: PakarAddFm.php?pesan=$pesan");
}
?>
