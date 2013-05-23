<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$TxtIdUserH 	    = $_REQUEST['TxtIdUserH'];
$TxtUserName 	= $_REQUEST['TxtUserName'];
//$RbAdmin 	    = $_REQUEST['RbAdmin'];
//$TxtPassword 	= $_REQUEST['TxtPassword'];
$TxtPassword=md5($_REQUEST['TxtPassword']);
# Validasi Form
if (trim($TxtIdUserH)=="") {
	echo "User Id  belum terbentuk, ulangi kembali";
	include "AdminAddFm.php";
}
elseif (trim($TxtUserName)=="") {
	echo "User Name masih kosong, ulangi kembali";
	include "AdminAddFm.php";
}
elseif (trim($TxtPassword)=="") {
	echo "Password masih kosong, ulangi kembali";
	include "AdminAddFm.php";
}
//elseif (trim($RbAdmin)=="") {
	//echo "Level  masih kosong, ulangi kembali";
	//include "AdminAddFm.php";
//}
else {
	$sql  = " INSERT INTO user (id_user,username,password) ";
	$sql .=	" VALUES ('$TxtIdUserH','$TxtUserName','$TxtPassword')";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	$pesan= "Data berhasil disimpan";
	header("Location: AdminTampil.php?pesan=$pesan");
}
?>
