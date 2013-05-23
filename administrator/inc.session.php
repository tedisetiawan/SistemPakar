<?php
@session_start();
if (!isset($_SESSION['username_admin'])){
    echo "<div align=center><b> PERHATIAN! </b><br>";
	echo "AKSES DITOLAK, ADMIN BELUM LOGIN</div>";
	echo '<meta http-equiv="refresh" content="0;url=?page=login">';
	exit;
}
?>