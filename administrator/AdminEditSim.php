<?php
include "../librari/inc.koneksidb.php";

# Baca variabel Form ( If Register global On )
$TxtIdUserH = $_REQUEST['TxtIdUserH'];
$TxtUserName = $_REQUEST['TxtUserName'];
//$TxtPassword = $_REQUEST['TxtPassword'];
$TxtPassword=md5($_REQUEST['TxtPassword']);
# Validasi Form
if (trim($TxtIdUserH)=="") {
	echo "Id User belum terbentuk, ulangi kembali";
	include "AdminEditFm.php";
}
elseif (trim($TxtUserName)=="") {
	echo " User Name masih kosong, ulangi kembali";
	include "AdminEditFm.php";
}
elseif (trim($TxtPassword)=="") {
	echo " Password masih kosong, ulangi kembali";
	include "AdminEditFm.php";
}

else {
	if(!empty($_REQUEST['TxtPassword']))
	{
		$sql = "UPDATE user SET username='$TxtUserName', password='$TxtPassword'";
		$sql .= " WHERE id_user='$TxtIdUserH'";
		mysql_query($sql, $koneksi)
			or die ("SQL Error" .mysql_error());
		echo " DATA TELAH BERHASIL DIUBAH";
		include "AdminTampil.php";
	}
	else
	{
		$sql = "UPDATE user SET username='$TxtUserName'";
		$sql .= " WHERE id_user='$TxtIdUserH'";
		mysql_query($sql, $koneksi)
			or die ("SQL Error" .mysql_error());
		echo " DATA TELAH BERHASIL DIUBAH";
		include "AdminTampil.php";

	}
}
?>