<?php
include "../librari/inc.koneksidb.php";

# Baca variabel Form ( If Register global On )
$TxtKodeH = $_REQUEST['TxtKodeH'];
$TxtGejala = $_REQUEST['TxtGejala'];

# Validasi Form
if (trim($TxtKodeH)=="") {
	echo "Kode belum terbentuk, ulangi kembali";
	include "SolusiEditFm.php";
}
elseif (trim($TxtGejala)=="") {
	echo " Gejala masih kosong, ulangi kembali";
	include "SolusiEditFm.php";
}
else {
	$sql = "UPDATE solusi SET solusi='$TxtGejala'";
	$sql .= " WHERE id_solusi='$TxtKodeH'";
	mysql_query($sql, $koneksi)
		or die ("SQL Error" .mysql_error());
	echo " DATA TELAH BERHASIL DIUBAH";
	include "SolusiTampil.php";
}
?>