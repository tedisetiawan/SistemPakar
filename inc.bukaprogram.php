<?php
if(isset($_REQUEST['page'])){
$page= $_REQUEST['page'];
}else{
$page= "";
}
if ($page=="dafhama") {
	if(file_exists ("HamaTampil.php")) {
		include "HamaTampil.php";
	}
	else {
		echo "FILE PROGRAM HAMA TIDAK ADA";
	}
}
if ($page=="artikel") {
	if(file_exists ("Artikel.php")) {
		include "Artikel.php";
	}
	else {
		echo "FILE PROGRAM HAMA TIDAK ADA";
	}
}
elseif ($page=="dafgejala") {
	if(file_exists ("GejalaTampil.php")) {
		include "GejalaTampil.php";
	}
	else {
		echo "FILE PROGRAM GEJALA JAGUNG TIDAK ADA";
	}
}
elseif ($page=="daftar") {
	if(file_exists ("PenggunaAddSim.php")) {
		include "PenggunaAddSim.php";
	}
	else {
		echo "FILE PROGRAM FORM PENGGUNA TIDAK ADA";
	}
}
elseif ($page=="daftarsim") {
	if(file_exists ("PenggunaAddSim.php")) {
		include "PenggunaAddSim.php";
	}
	else {
		echo "FILE PROGRAM FORM PENGGUNA SIMPAN TIDAK ADA";
	}
}
elseif ($page=="penyakit") {
	if(file_exists ("DiagnosaPenyakitFm.php")) {
		include "DiagnosaPenyakitFm.php";
	}
	else {
		echo "FILE PROGRAM FORM KONSULTASI TIDAK ADA";
	}
}
elseif ($page=="penyakitcek") {
	if(file_exists ("DiagnosaPenyakitPeriksa.php")) {
		include "DiagnosaPenyakitPeriksa.php";
	}
	else {
		echo "FILE PROGRAM KONSULTASI PERIKSA TIDAK ADA";
	}
}
elseif ($page=="gejala") {
	if(file_exists ("DiagnosaGejalaFm.php")) {
		include "DiagnosaGejalaFm.php";
		//include "Diagnosafmcoba.php";
	}
	else {
		echo "FILE PROGRAM FORM KONSULTASI TIDAK ADA";
	}
}
elseif ($page=="gejalacek") {
	if(file_exists ("DiagnosaGejalaPeriksa.php")) {
		include "DiagnosaGejalaPeriksa.php";
		//include "DiagnosacobaPeiksa.php";
	}
	else {
		echo "FILE PROGRAM KONSULTASI PERIKSA TIDAK ADA";
	}
}
elseif ($page=="hasil") {
	if(file_exists ("HasilDiagnosa.php")) {
		include "HasilDiagnosa.php";
	}
	else {
		echo "FILE PROGRAM ANALISA HASIL TIDAK ADA";
	}
}
elseif ($page=="hasillain") {
	if(file_exists ("HasilDiagnosaLain.php")) {
		include "HasilDiagnosaLain.php";
	}
	else {
		echo "FILE PROGRAM ANALISA HASIL TIDAK ADA";
	}
}
elseif ($page=="hasilsalah") {
	if(file_exists ("HasilDiagnosaSalah.php")) {
		include "HasilDiagnosaSalah.php";
	}
	else {
		echo "FILE PROGRAM ANALISA HASIL TIDAK ADA";
	}
}
elseif ($page=="tolong") {
	if(file_exists ("penjelasan.htm")) {
		include "penjelasan.htm";
	}
	else {
		echo "FILE PROGRAM PERTOLONGAN TIDAK ADA";
	}
}
elseif ($page=="daftarpenyakit") {
	if(file_exists ("PenyakitTampil.php")) {
		include "PenyakitTampil.php";
	}
	else {
		echo "FILE PROGRAM ARTIKEL TIDAK ADA";
	}
}
elseif ($page=="profil") {
	if(file_exists ("Profil.php")) {
		include "Profil.php";
	}
	else {
		echo "FILE PROGRAM PROFIL TIDAK ADA";
	}
}
elseif ($page=="login") {
	if(file_exists ("LoginAddFm.php")) {
		include "LoginAddFm.php";
	}
	else {
		echo "FILE PROGRAM PROFIL TIDAK ADA";
	}
}
elseif ($page=="logincek") {
	if(file_exists ("LoginPeriksa.php")) {
		include "LoginPeriksa.php";
	}
	else {
		echo "FILE PROGRAM PROFIL TIDAK ADA";
	}
}
elseif ($page=="help") {
	if(file_exists ("Help.php")) {
		include "Help.php";
	}
	else {
		echo "FILE PROGRAM HELP TIDAK ADA";
	}
}
elseif ($page=="infobk") {
	if(file_exists ("utamakita.htm")) {
		include "utamakita.htm";
	}
	else {
		echo "FILE HALAMAN UTAMA KITA TIDAK ADA";
	}
}
elseif ($page=="home") {
	if(file_exists ("Home.php")) {
		include "Home.php";
	}
	else {
		echo "FILE HALAMAN UTAMA KITA TIDAK ADA";
	}
}
elseif ($page=="detailartikel") {
	if(file_exists ("DetailArtikel.php")) {
		include "DetailArtikel.php";
	}
	else {
		echo "FILE HALAMAN UTAMA KITA TIDAK ADA";
	}
}
elseif ($page=="detaildiagnosa") {
	if(file_exists ("DetailDiagnosa.php")) {
		include "DetailDiagnosa.php";
	}
	else {
		echo "FILE HALAMAN UTAMA KITA TIDAK ADA";
	}
}
elseif ($page=="detaildiagnosalain") {
	if(file_exists ("DetailDiagnosaLain.php")) {
		include "DetailDiagnosaLain.php";
	}
	else {
		echo "FILE HALAMAN UTAMA KITA TIDAK ADA";
	}
}
elseif ($page=="reguser") {
	if(file_exists ("RegisterUser.php")) {
		include "RegisterUser.php";
	}
	else {
		echo "FILE HALAMAN UTAMA KITA TIDAK ADA";
	}
}
elseif ($page=="savereguser") {
	if(file_exists ("SaveRegUser.php")) {
		include "SaveRegUser.php";
	}
	else {
		echo "FILE HALAMAN UTAMA KITA TIDAK ADA";
	}
}	
elseif ($page=="loginuser") {
	if(file_exists ("LoginUser.php")) {
		include "LoginUser.php";
	}
	else {
		echo "FILE HALAMAN UTAMA KITA TIDAK ADA";
	}
}
elseif ($page=="actloginuser") {
	if(file_exists ("ActLoginUser.php")) {
		include "ActLoginUser.php";
	}
	else {
		echo "FILE HALAMAN UTAMA KITA TIDAK ADA";
	}
}
elseif ($page=="datadiagnosa") {
	if(file_exists ("DataDiagnosa.php")) {
		include "DataDiagnosa.php";
	}
	else {
		echo "FILE HALAMAN UTAMA KITA TIDAK ADA";
	}
}
elseif ($page=="logout") {
	session_destroy();
	echo '<meta http-equiv="refresh" content="0;url=index.php">';
}	
elseif ($page=="") {
	if(file_exists ("Home.php")) {
		include "Home.php";
	}
	else {
		echo "FILE HALAMAN UTAMA KITA TIDAK ADA";
	}
}
?>