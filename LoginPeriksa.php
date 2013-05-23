<?php
include_once "librari/inc.koneksidb.php";

$cek = mysql_query("select * from user where username='".$_POST['TxtUser']."' and password='".md5($_POST['TxtPasswd'])."'");
if(mysql_num_rows($cek)>0)
{
	$get = mysql_fetch_array($cek);
	
	$_SESSION['username_admin'] = $_POST['TxtUser'];
	$_SESSION['id_admin'] = $get['id_user'];
	echo '<meta http-equiv="refresh" content="0;url=administrator/">';
}
else
{
	?>
	<script type="text/javascript">alert("Data tidak valid");</script>
	<?php
	echo '<meta http-equiv="refresh" content="0;url=?page=login">';
}
?>
 