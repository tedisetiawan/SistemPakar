<?php
include "../librari/inc.koneksidb.php";

# Baca variabel Form ( If Register global On )
$TxtKodeH = $_REQUEST['TxtKodeH'];
$TxtGejala = $_REQUEST['TxtGejala'];

# Validasi Form
if (trim($TxtKodeH)=="") {
	echo "Kode belum terbentuk, ulangi kembali";
	include "GejalaEditFm.php";
}
elseif (trim($TxtGejala)=="") {
	echo " Gejala masih kosong, ulangi kembali";
	include "GejalaEditFm.php";
}
else {
	$sql = "UPDATE gejala SET gejala='$TxtGejala'";
	$sql .= " WHERE id_gejala='$TxtKodeH'";
	mysql_query($sql, $koneksi)
		or die ("SQL Error" .mysql_error());
	echo " DATA TELAH BERHASIL DIUBAH";
	include "GejalaTampil.php";
}
?>