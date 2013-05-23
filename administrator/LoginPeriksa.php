<?php
session_start();
include_once "../librari/inc.koneksidb.php";

$TxtUser   = $_REQUEST['TxtUser'];
//$TxtPasswd = $_REQUEST['TxtPasswd'];
$TxtPasswd=md5($_REQUEST['TxtPasswd']);

if (trim($TxtUser)=="") {
	echo "DATA USER BELUM DIISI";
	include "Login.php"; exit;
}
elseif (trim($TxtPasswd)=="") {
	echo "DATA PASSWORD BELUM DIISI";
	include "Login.php"; exit;
}

$sql_cek = "SELECT * FROM user WHERE username='$TxtUser' 
		    AND password='$TxtPasswd'";
$qry_cek = mysql_query($sql_cek, $koneksi) 
		   or die ("Gagal Cek".mysql_error());
$ada_cek = mysql_num_rows($qry_cek);
if ($ada_cek >=1) {
    $sql = "SELECT * FROM user WHERE username='$TxtUser' 
		    AND password='$TxtPasswd'";
	$qry = mysql_query($sql, $koneksi)
		or die ("SQL Error".mysql_error());
	$data=mysql_fetch_array($qry);
	$_SESSION['username'] = $data['username'];
	$_SESSION['id_user'] = $data['id_user'];
	//session_register("SES_USER");
	
	header ("location: Home.php");
	exit;
}
else {
	echo "USER DAN PASSWORD TIDAK SESUAI";
	include "Login.php"; 
	exit;
}
?>
 
