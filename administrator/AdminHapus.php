<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";

# Baca variabel URL (If Register Global ON)
$kdhapus = $_REQUEST['kdhapus'];
$kdiduser=$_SESSION['id_user'];
//$kdlevel=$_SESSION['level'];
//if ($kdlevel=="P" ){
 //      echo " ANDA TIDAK BERHAK MENGHAPUS USER ";
	//	include "AdminTampil.php";
	//	exit;
//}
if ($kdhapus == $kdiduser){
 echo " ANDA TIDAK BISA MENGHAPUS LOGIN  SENDIRI ";
	include "AdminTampil.php";
	exit;
}
if ($kdhapus != $kdiduser){
 		echo " ANDA TIDAK BISA MENGHAPUS LOGIN  ADMIN LAIN ";
		include "AdminTampil.php";
		exit;
}
if ($kdhapus !="") {	
		$sql3 = "DELETE FROM user WHERE id_user='$kdhapus'";
	mysql_query($sql3, $koneksi);
   if ($kdhapus == $kdiduser){
		include "LoginOut.php";
		exit;
	}
	echo "DATA ADMIN BERHASIL DIHAPUS";
	include "AdminTampil.php";
}
else {
	echo "DATA GEJALA PEBLUM DIPILIH";
}
?>
