<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";

$isi 	= $_POST['isi'];
$id_pages 	= $_POST['id_param'];


	$sql  = " update pages set isi='".$isi."' where id_pages='".$id_pages."'";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	$pesan= "Data berhasil disimpan";
	header("Location: Pages.php");

?>
