<?php 
$_SESSION['id_log'] = "";
include "librari/inc.koneksidb.php";
	
# Baca variabel Form (If Register Global ON)
if(isset($_REQUEST['RbPenyakit'])){
$RbPenyakit= $_REQUEST['RbPenyakit'];
$_SESSION['id_penyakit'] = $RbPenyakit;
}else{
$RbPenyakit= "";
}

# Validasi Form
if (trim($RbPenyakit)=="") {
	include "DiagnosaPenyakitFm.php";
	echo "Anda Belum Pilih Penyakit, ulangi kembali";
	}
else {
	mysql_query($sqldel, $koneksi);

	$sql1="INSERT INTO log (id_pengguna) values('".$_SESSION['id_pengguna']."')";
	mysql_query($sql1, $koneksi)
	or die ("SQL INPUT RELASI GAGAL" .mysql_error());
	
	$id_log = mysql_insert_id();
	$_SESSION['id_log'] = $id_log;
	
	function AddTmpPenyakit($RbPenyakit, $IP, $id_log) 
	{
		//SQL untuk ambil data relasi dengan ketentuan
		// Kd penyaki=kd_penyakit yang ada di dalam tmp_penyakit
		//Tentu daja querty dilakukan pada IP yang sesuai
		$sql_sakit = "SELECT * FROM hamapenyakit where Id_Pnykt='$RbPenyakit' ";
		$qry_sakit = mysql_query($sql_sakit);
		while ($data_sakit = mysql_fetch_array($qry_sakit)) {
		
		//Data yang didapatkan dari wwuery diatas dimasukkan ke dalam tmp_penyakit
			$sqltmp = "INSERT INTO tmp_penyakit (noip, id_log, Id_Pnykt) VALUES('$IP','$id_log','$data_sakit[Id_Pnykt]')";
			mysql_query($sqltmp);
		}
	}
        //Penggunaan Fungsi AddTmpPenyakit
		AddTmpPenyakit($RbPenyakit, $NOIP,$id_log);

		echo "<meta http-equiv='refresh' content='0; url=index.php?page=gejala'>";
	}
?>
