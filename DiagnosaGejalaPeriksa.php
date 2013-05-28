<?php 
include "librari/inc.koneksidb.php";
 	
# Baca variabel Form (If Register Global ON)
$TxtKodeH = $_REQUEST['TxtKodeH'];
$jumMK = $_REQUEST['jumMK'];
$gj = "";

	 $id_log = $_SESSION['id_log'];	 

	 for($i = 1; $i <= $jumMK ; $i++)
	{
   		//$mk = $_REQUEST['mk'.$i];
		if(isset( $_REQUEST['mk'.$i])){
			$mk=  $_REQUEST['mk'.$i];
			if($gj=="")
			{
				$gj .= "'".$_REQUEST['mk'.$i]."'";
			}
			else
			{
				$gj .= ",'".$_REQUEST['mk'.$i]."'";
			}
		}else{
			$mk= "";
		}
  		 if (!empty($mk))
  		 {
      		$sql1="INSERT INTO tmp_gejala(id_pnykt,id_log,id_gejala) 
			VALUES ('$TxtKodeH','$id_log','$mk')";
		mysql_query($sql1, $koneksi) or die ("SQL INPUT RELASI GAGAL" .mysql_error());
  		 }
	}

	
function AddAnalisaHasil($mk, $id_log) {
//SQL untuk ambil data relasi dengan ketentuan
//Tentu daja querty dilakukan pada IP yang sesuai
	$sql_sakit1 = "select log.*,hamapenyakit.*,tmp_gejala.*,
solusi.* from (((((log inner join tmp_penyakit 
on log.id_log=tmp_penyakit.id_log) inner join hamapenyakit 
on tmp_penyakit.Id_Pnykt=hamapenyakit.Id_Pnykt) inner join relasi 
on hamapenyakit.Id_Pnykt=relasi.Id_Penyakit) inner join tmp_gejala 
on relasi.id_gejala=tmp_gejala.id_gejala) inner join relasigejala 
on tmp_gejala.id_gejala=relasigejala.id_gejala) inner join solusi 
on relasigejala.id_solusi=solusi.id_solusi where log.id_log='$id_log' group by id_gejala";

	$qry_sakit1 = mysql_query($sql_sakit1);
	$No=0;
	while ($data_sakit1 = mysql_fetch_array($qry_sakit1)) {
	
	//Data yang didapatkan dari wwuery diatas dimasukkan ke dalam tmp_penyakit
		$sqltmp1 = "INSERT INTO analisahasil (id_log, id_pengguna, id_penyakit,id_gejala,id_solusi,noip)  
		VALUES ('$id_log', '".$_SESSION['id_pengguna']."','$data_sakit1[Id_Pnykt]','$data_sakit1[id_gejala]','$data_sakit1[id_solusi]',' $NOIP')";
		mysql_query($sqltmp1);
		$No++;
	}

}
if(mysql_num_rows(mysql_query("select * from relasi where id_gejala in (".$gj.") and id_penyakit='".$_SESSION['id_penyakit']."'"))>0)
{
	AddAnalisaHasil($mk, $id_log);

	//$sql1="delete from log where id in(select id from tmp_pengguna where noip='$NOIP')";
	//	mysql_query($sql1, $koneksi)
	//	or die ("SQL INPUT RELASI GAGAL" .mysql_error());

//	$sql1="INSERT INTO log (id,nama,jenis_kelamin,usia,alamat) select   id,nama,jenis_kelamin,usia,alamat from tmp_pengguna";
	//	mysql_query($sql1, $koneksi)
	//	or die ("SQL INPUT RELASI GAGAL" .mysql_error());
	echo "<meta http-equiv='refresh' content='0; url=index.php?page=hasil'>";
}
else
{

		AddAnalisaHasil($mk, $id_log);
		echo "<meta http-equiv='refresh' content='0; url=index.php?page=hasil'>";
}
?>
