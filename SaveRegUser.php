<?php
include_once "librari/inc.koneksidb.php";
$username = $_POST['username'];
$password = md5($_POST['password']);
$nama = $_POST['nama'];
$kelamin = $_POST['RbKelamin'];
$alamat = $_POST['alamat'];
$usia = $_POST['usia'];

$cek = mysql_num_rows(mysql_query("select * from pengguna where username='".$username."'"));
if($cek>0)
{
	?>
	<script type="text/javascript">alert("username telah terdaftar, gunakan username lain");</script>
	<?php
	echo '<meta http-equiv="refresh" content="0;url=?page=reguser">';
}
else
{
	mysql_query("insert into pengguna(username,password,nama,kelamin,alamat,usia)
		values(
			'".$username."',
			'".$password."',
			'".$nama."',
			'".$kelamin."',
			'".$alamat."',
			'".$usia."'
			)");
	echo '<meta http-equiv="refresh" content="0;url=?page=loginuser">';
}
?>
 
