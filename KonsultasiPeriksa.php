<?php 
include "librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
$RbPilih 	= $_REQUEST['RbPilih'];
$TxtKdGejala= $_REQUEST['TxtKdGejala'];

# Mendapatkan No IP
$NOIP 		= $_SERVER['REMOTE_ADDR'];

# Fungsi untuk menambah data ke tmp_analisa
function AddTmpAnalisa($kdgejala, $IP) {
//SQL untuk ambil data relasi dengan ketentuan
// Kd penyaki=kd_penyakit yang ada di dalam tmp_penyakit
//Tentu daja querty dilakukan pada IP yang sesuai
	$sql_sakit = "SELECT relasi.* FROM relasi,tmp_hama 
				  WHERE relasi.kd_hama=tmp_hama.kd_hama 
				  AND noip='$IP' ORDER BY relasi.kd_hama,relasi.kd_gejala";
	$qry_sakit = mysql_query($sql_sakit);
	while ($data_sakit = mysql_fetch_array($qry_sakit)) {
	
	//Data yang didapatkan dari wwuery diatas dimasukkan ke dalam tmp_analisa
		$sqltmp = "INSERT INTO tmp_analisa (noip, kd_hama,kd_gejala)
					VALUES ('$IP','$data_sakit[kd_hama]','$data_sakit[kd_gejala]')";
		mysql_query($sqltmp);
	}
}

# Fungsi menambah tmp_gejala
function AddTmpGejala($kdgejala, $IP) {
	$sql_gejala = "INSERT INTO tmp_gejala (noip,kd_gejala) VALUES ('$IP','$kdgejala')";
	mysql_query($sql_gejala);
}

# Fungsi mengosongkan tabel tmp_sakit
function DelTmpSakit($IP) {
	$sql_del = "DELETE FROM tmp_hama WHERE noip='$IP'";
	mysql_query($sql_del);
}

# Fungsi mengosongkan tabel tmp_analisa
function DelTmpAnlisa($IP) {
	$sql_del = "DELETE FROM tmp_analisa WHERE noip='$IP'";
	mysql_query($sql_del);
}

# PEMERIKSAAN
if ($RbPilih == "YA") {
//periksa apakah ada data di tmp_analisa
	$sql_analisa = "SELECT * FROM tmp_analisa ";
	$qry_analisa = mysql_query($sql_analisa, $koneksi);
	$data_cek = mysql_num_rows($qry_analisa);
	if ($data_cek >= 1) {
		# Kode saat tmp_analisa tidak kosong
		DelTmpSakit($NOIP);
		
		//SQL untuk mengambil data ke tmp_analisa
		// yang kd_gejalanya dipilih oleh pasien
		$sql_tmp = "SELECT * FROM tmp_analisa 
					WHERE kd_gejala='$TxtKdGejala' 
					AND noip='$NOIP'";
		$qry_tmp = mysql_query($sql_tmp, $koneksi);
		while ($data_tmp = mysql_fetch_array($qry_tmp)) {
		
		//SQL untuk ambil data relasi yang Kd_penyakit ada di dalam tabel tmp_analisa
			$sql_rsakit = "SELECT * FROM relasi 
							WHERE kd_hama='$data_tmp[kd_hama]' 
							GROUP BY kd_hama";
			$qry_rsakit = mysql_query($sql_rsakit);
			while ($data_rsakit = mysql_fetch_array($qry_rsakit)) {
				// Data penyakit yang mungkin dimasukkan ke tmp
				$sql_input = "INSERT INTO tmp_hama (noip,kd_hama)
							 VALUES ('$NOIP','$data_rsakit[kd_hama]')";
				mysql_query($sql_input, $koneksi);
			}
		} 
		// Gunakan Fungsi
		DelTmpAnlisa($NOIP);
		AddTmpAnalisa($TxtKdGejala, $NOIP);
		AddTmpGejala($TxtKdGejala, $NOIP);
	}	
	else {
		# Kode saat tmp_analisa kosong
		
		//SQL unuk mengambil data relasi
		// Yang KD Gejalanya dipilih oleh pasien
		$sql_rgejala = "SELECT * FROM relasi WHERE kd_gejala='$TxtKdGejala'";
		$qry_rgejala = mysql_query($sql_rgejala);
		while ($data_rgejala = mysql_fetch_array($qry_rgejala)) {
		
		//Ambil daa relasi yang kd_penyakit
		//sesuai dengan query sebelumnya
			$sql_rsakit = "SELECT * FROM relasi 
						   WHERE kd_hama='$data_rgejala[kd_hama]' 
						   GROUP BY kd_hama";
			$qry_rsakit = mysql_query($sql_rsakit);
			while ($data_rsakit = mysql_fetch_array($qry_rsakit)) {
				// Data penyakit yang mungkin dimasukkan ke tmp
				$sql_input = "INSERT INTO tmp_hama (noip,kd_hama)
							 VALUES ('$NOIP','$data_rsakit[kd_hama]')";
				mysql_query($sql_input, $koneksi);
			}
		} 
		// Menggunakan Fungsi
		AddTmpAnalisa($TxtKdGejala, $NOIP);
		AddTmpGejala($TxtKdGejala, $NOIP);
	}
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul'>";
}

if ($RbPilih == "TIDAK") {
	$sql_analisa = "SELECT * FROM tmp_analisa ";
	$qry_analisa = mysql_query($sql_analisa, $koneksi);
	$data_cek = mysql_num_rows($qry_analisa);
	if ($data_cek >= 1) {
		# Kode saat tmp_analisa tidak kosong
		$sql_relasi = "SELECT * FROM tmp_analisa WHERE kd_gejala='$TxtKdGejala'";
		$qry_relasi = mysql_query($sql_relasi, $koneksi);
		while($hsl_relasi = mysql_fetch_array($qry_relasi)){
			// Hapus daftar relasi yang sudah tidak mungkin dari tabel tmp
			$sql_deltmp = "DELETE FROM tmp_analisa 
							WHERE kd_hama='$hsl_relasi[kd_hama]' 
							AND noip='$NOIP'";
			mysql_query($sql_deltmp, $koneksi);
			
			// Hapus daftar penyakit yang sudah tidak ada kemungkinan
			$sql_deltmp2 = "DELETE FROM tmp_hama 
						    WHERE kd_hama='$hsl_relasi[kd_hama]' 
						    AND noip='$NOIP'";
			mysql_query($sql_deltmp2, $koneksi);
		}		
	}
	else {
		# Pindahkan data relsi ke tmp_analisa
		$sql_relasi= "SELECT * FROM relasi ORDER BY kd_hama,kd_gejala";
		$qry_relasi= mysql_query($sql_relasi, $koneksi);
		
		while($hsl_relasi=mysql_fetch_array($qry_relasi)){
			$sql_intmp = "INSERT INTO tmp_analisa (noip, kd_hama,kd_gejala)
						  VALUES ('$NOIP','$hsl_relasi[kd_hama]',
						  '$hsl_relasi[kd_gejala]')";
			mysql_query($sql_intmp,$koneksi);
			
			// Masukkan data penyakit yang mungkin terjangkit
			$sql_intmp2 = "INSERT INTO tmp_hama(noip,kd_hama)
						   VALUES ('$NOIP','$hsl_relasi[kd_hama]')";
			mysql_query($sql_intmp2,$koneksi);				
		}
		
		# Hapus tmp_analisa yang tidak sesuai
		$sql_relasi2 = "SELECT * FROM relasi WHERE kd_gejala='$TxtKdGejala'";
		$qry_relasi2 = mysql_query($sql_relasi2, $koneksi);
		while($hsl_relasi2 = mysql_fetch_array($qry_relasi2)){
			$sql_deltmp = "DELETE FROM tmp_analisa 
						   WHERE kd_hama='$hsl_relasi2[kd_hama]' 
						   AND noip='$NOIP'";
			mysql_query($sql_deltmp, $koneksi);
			
			// Hapus penyakit yang sudah tidak mungkin
			$sql_deltmp2 = "DELETE FROM tmp_hama
							WHERE kd_hama='$hsl_relasi2[kd_hama]' 
							AND noip='$NOIP'";
			mysql_query($sql_deltmp2, $koneksi);
		}
	}
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=konsul'>";
}
?>
