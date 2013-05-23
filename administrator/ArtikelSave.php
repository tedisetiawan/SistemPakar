<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
	
$judul 	    = $_POST['judul'];
$artikel 	= $_POST['artikel'];
$id_artikel 	= $_POST['id_param'];
$jenis = $_POST['tipe'];
if($jenis=="edit")
{
	$sql  = " update artikel set judul='".$judul."', artikel='".$artikel."' where id_artikel='".$id_artikel."'";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	$pesan= "Data berhasil disimpan";
	header("Location: Artikel.php");
}
else if($jenis=="tambah")
{
	$sql  = " INSERT INTO artikel (id_artikel,judul,artikel) VALUES ('$id_artikel','$judul','".$artikel."')";

	mysql_query($sql, $koneksi) 
		  or die ("SQL Error".mysql_error());

	$pesan= "Data berhasil disimpan";
	header("Location: Artikel.php");
}
?>
