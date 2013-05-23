<?php
include "../librari/inc.koneksidb.php";

# Baca Variabel Form ( If Register Global ON)
$TxtKodeH = $_REQUEST['TxtKodeH'];
//$CekGejala = $_REQUEST['CekGejala'];
if(isset($_REQUEST['CekGejala'])){
$CekGejala= $_REQUEST['CekGejala'];
}else{
$CekGejala= "";
}
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
	$sqlpil = "SELECT * from relasi WHERE id_penyakit ='$TxtKodeH'";
	$qrypil = mysql_query($sqlpil);
	while ($datapil = mysql_fetch_array($qrypil)){
		//Kode untuk mengurai gejala yang dipilih
		for ($i = 0 ; $i < $jum; ++$i) {
		
		if ($datapil['id_gejala'] != $CekGejala[$i]){
				$sqldel = "DELETE FROM RELASI ";
				$sqldel .= "WHERE id_penyakit ='$TxtKodeH'";
				$sqldel .= "AND NOT id_gejala
					IN ('$CekGejala[$i]')";
				mysql_query($sqldel);
			}
		}
	}

# UNTUK DATA GEJALA TAMBAHAN
for ($i = 0; $i < $jum; ++$i) {
	// PERINTAH UNTUK MNDAPAT RELASI
	$sqlr = "SELECT * FROM relasi WHERE id_penyakit='".$TxtkodeH."' AND id_gejala='".$CekGejala[$i]."'";
	$qryr = mysql_query($sqlr, $koneksi);
	$cocok = mysql_num_rows($qryr);
	//GEJALA YANG BARU AKAN DISIMPAN
	if(! $cocok==1) {
		$sql = "INSERT INTO relasi(id_penyakit, id_gejala)";
		$sql .="VALUES ('$TxtKodeH','$CekGejala[$i]')";
	mysql_query($sql, $koneksi)
		or die ("SQL INPUT RELASI GAGAL" .mysql_error());
	}
}

//PESAN SEBAGAI KONFIRMASI
$pesan = "SUKSES DISIMPAN";
	echo '<meta http-equiv="refresh" content="0;url=RelasiAddPilih.php?kdsakit='.$TxtKodeH.'">';
}
}
?>