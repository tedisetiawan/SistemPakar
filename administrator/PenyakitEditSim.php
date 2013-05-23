<?php
//include"..//librari/inc.session.php";
include "../librari/inc.koneksidb.php";

#Baca variabel Form ( If Register global On )
$TxtKodeH = $_REQUEST['TxtKodeH'];
$TxtPenyakit = $_REQUEST['TxtPenyakit'];
$TxtKeterangan = $_REQUEST['TxtKeterangan'];

#Validasi Form
if (trim($TxtKodeH)=="") {
	echo "Kode Tidak Ada, ulangi kembali";
	include "PenyakitEditFm.php";
}
elseif (trim($TxtPenyakit)=="") {
	echo " Nama Jenis Penyakit masih kosong, ulangi kembali";
	include "PenyakitEditFm.php";
}
elseif (trim($TxtKeterangan)=="") {
	echo " Keterangan masih kosong, ulangi kembali";
	include "PenyakitEditFm.php";
}
else {
	//Perintah SQL untuk menyimpan perubahan
$sql = "UPDATE hamapenyakit SET
JnsPnykt ='$TxtPenyakit',
Keterangan='$TxtKeterangan'
 WHERE Id_Pnykt='$TxtKodeH'";

	mysql_query($sql, $koneksi)
		or die("SQL Error" .mysql_error());

	echo "DATA TELAH BERHASIL DIUBAH";
include "PenyakitTampil.php";
}
?>