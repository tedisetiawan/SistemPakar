<?php
// ================================================================
// BUNAFIT KOMPUTER : Menjual Source Code Program untuk belajar
// Tersedia Sistem Pakar, Web Penjualan, Aplikasi Min Market, dll
// www.bunafit-komputer.com
// ================================================================

# Konvesi dd-mm-yyyy -> yyyy-mm-dd
function tgl_ind_to_eng() {
	$tgl_eng=substr($tgl,6,4)."-".substr($tgl,3,2)."-".substr($tgl,0,2);
	return $tgl_eng;
}

# Konvesi yyyy-mm-dd -> dd-mm-yyyy
function tgl_eng_to_ind($tgl) {
	$tgl_ind=substr($tgl,8,2)."-".substr($tgl,5,2)."-".substr($tgl,0,4);
	return $tgl_ind;
}
# Format angka 50000 -> 50.000
function format_angka($angka) {
	$hasil =  number_format($angka,0, ",",".");
	return $hasil;
}
?>