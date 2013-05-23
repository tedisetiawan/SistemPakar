<?php
include "../librari/inc.koneksidb.php";

# Baca Variabel Form ( If Register Global ON)
$TxtKodeH = $_REQUEST['TxtKodeH'];
$CekGejala = $_REQUEST['CekGejala'];

#Validasi Form
if (trim($TxtKodeH)=="") {
	echo "Nama Hama belum dipilih, ulangi kembali";
	include "RelasiAddPilih.php";
}
else {
	$jum = count($CekGejala);
	if ($jum==0) {
		echo "BELUM ADA GEJALA YANG DIPILIH";
	}
	else {
	#UNTUK MENGHAPUS YANG TIDAK DIPILIH LAGI
	// KODE UNTUK MENDATA RELASI
	$sqlpil = "SELECT * from relasigejala WHERE id_gejala ='$TxtKodeH'";
	$qrypil = mysql_query($sqlpil);
	while ($datapil = mysql_fetch_array($qrypil)){
		//Kode untuk mengurai gejala yang dipilih
		for ($i = 0 ; $i < $jum; ++$i) {
		
		if ($datapil['id_gejala'] != $CekGejala[$i]){
				$sqldel = "DELETE FROM RELASIgejala ";
				$sqldel .= "WHERE id_gejala ='$TxtKodeH'";
				$sqldel .= "AND NOT id_solusi
					IN ('$CekGejala[$i]')";
				mysql_query($sqldel);
			}
		}
	}

# UNTUK DATA GEJALA TAMBAHAN
for ($i = 0; $i < $jum; ++$i) {
	// PERINTAH UNTUK MNDAPAT RELASI
	$sqlr = "SELECT * FROM relasigejala WHERE id_gejala='".$TxtkodeH."' AND id_solusi='".$CekGejala[$i]."'";
	$qryr = mysql_query($sqlr, $koneksi);
	$cocok = mysql_num_rows($qryr);
	//GEJALA YANG BARU AKAN DISIMPAN
	if(! $cocok==1) {
		$sql = "INSERT INTO relasigejala(id_gejala, id_solusi)";
		$sql .="VALUES ('$TxtKodeH','$CekGejala[$i]')";
	mysql_query($sql, $koneksi)
		or die ("SQL INPUT RELASI GAGAL" .mysql_error());
	}
}

//PESAN SEBAGAI KONFIRMASI
$pesan = "SUKSES DISIMPAN";
header("Location: RelasiGejalaAddPilih.php?
	kdsakit=".$TxtKodeH."");
}
}
?>