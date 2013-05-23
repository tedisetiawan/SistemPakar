<?php
include "../librari/inc.koneksidb.php";

# Baca variabel Form ( If Register global On )
$TxtUsernameH = $_REQUEST['TxtUsernameH'];
$TxtPassword = $_REQUEST['TxtPassword'];

# Validasi Form
if (trim($TxtUsernameH)=="") {
	echo "Username Masih Kosong, ulangi kembali";
	include "PakarEditFm.php";
}
elseif (trim($TxtPassword)=="") {
	echo " Password masih kosong, ulangi kembali";
	include "PakarEditFm.php";
}
else {
	$sql = "UPDATE pakarbelimbing SET password='$TxtPassword'";
	$sql .= " WHERE username='$TxtUsernameH'";
	mysql_query($sql, $koneksi)
		or die ("SQL Error" .mysql_error());
	echo " DATA TELAH BERHASIL DIUBAH";
	include "PakarTampil.php";
}
?>