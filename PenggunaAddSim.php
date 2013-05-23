<?php 
if(!empty($_SESSION['username_pengguna']))
{

	include "librari/inc.koneksidb.php";

	$NOIP = $_SERVER['REMOTE_ADDR'];
	$sqldel = "DELETE FROM tmp_pengguna WHERE noip='$NOIP'";
	mysql_query($sqldel, $koneksi);

	$sql  = " INSERT INTO tmp_pengguna (noip,id_pengguna) 
		 	  VALUES ('$NOIP', '".$_SESSION['id_pengguna']."')";
	mysql_query($sql, $koneksi) 
		  or die ("SQL Error 2".mysql_error());

	$sqlhapus = "DELETE FROM tmp_penyakit WHERE noip='$NOIP'";
	mysql_query($sqlhapus, $koneksi) 
			or die ("SQL Error 1".mysql_error());
					
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=penyakit'>";
}
else
{
	echo '<meta http-equiv="refresh" content="0;url=?page=loginuser">';
}
?>
