<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
	
	mysql_query("delete from artikel where id_artikel='".$_GET['id_artikel']."'", $koneksi) or die ("SQL Error".mysql_error());
	header("Location: Artikel.php");
?>
