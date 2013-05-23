<?php
include_once "librari/inc.koneksidb.php";

$cek = mysql_query("select * from pengguna where username='".$_POST['username']."' and password='".md5($_POST['password'])."'");
if(mysql_num_rows($cek)>0)
{
	$get = mysql_fetch_array($cek);

	$_SESSION['username_pengguna'] = $_POST['username'];
	$_SESSION['id_pengguna'] = $get['id_pengguna'];
	echo '<meta http-equiv="refresh" content="0;url=?page=datadiagnosa">';
}
else
{
	?>
	<script type="text/javascript">alert("Data tidak valid");</script>
	<?php
	echo '<meta http-equiv="refresh" content="0;url=?page=loginuser">';
}
?>
 
