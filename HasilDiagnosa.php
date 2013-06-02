    <script type="text/javascript" src="canvasjs.min.js"></script>
    <h4><span class='icon-dashboard'></span> Hasil Diagnosa - Belimbing Manis</h4>
<?php 
include "librari/inc.koneksidb.php";

$NOIP = $_SERVER['REMOTE_ADDR'];

//tampilkan penyakit
$sql = "select log.*,analisahasil.*,hamapenyakit.*,gejala.*,
solusi.* from (((((log inner join analisahasil on log.id_log=analisahasil.id_log) 
 inner join hamapenyakit on analisahasil.id_penyakit=hamapenyakit.Id_Pnykt)
 inner join relasi on hamapenyakit.Id_Pnykt=relasi.Id_Penyakit) 
inner join gejala on relasi.id_gejala=gejala.id_gejala) 
inner join relasigejala on gejala.id_gejala=relasigejala.id_gejala) 
inner join solusi on relasigejala.id_solusi=solusi.id_solusi 
where analisahasil.id_log ='".$_SESSION['id_log']."' and analisahasil.id_pengguna='".$_SESSION['id_pengguna']."'
order by analisahasil.id_analisa Desc limit 1";

$_SESSION["get_id_log"] = $_SESSION['id_log'];

$qry = mysql_query($sql, $koneksi) 
	   or die ("Query Hasil salam".mysql_error());
$data= mysql_fetch_array($qry);
if ($data['jenis_kelamin']=="P") {
	$kelamin = "Pria";
}
else {
	$kelamin = "Wanita";
}
$id_pnykt=$data['Id_Pnykt'];

//tampilkan gejala
$sql_gejalarelasi = "select distinct gejala.* FROM gejala, relasi WHERE gejala.id_gejala= relasi.id_gejala AND relasi.id_penyakit in (select id_pnykt from hamapenyakit where id_pnykt='$id_pnykt')";
		$qry_gejalarelasi = mysql_query($sql_gejalarelasi, $koneksi);
		$h=0;
		while ($hsl_gejalarelasi=mysql_fetch_array($qry_gejalarelasi)) {
		$h++;
		}

//gejala yang sesuai dan ada
	$sql_gejalaada = "select distinct gejala.* FROM gejala, relasi WHERE gejala.id_gejala= relasi.id_gejala AND relasi.id_gejala in (select id_gejala from analisahasil where id_log in ((select max(id_log) from log where id_log='".$_SESSION['id_log']."' and id_pengguna='".$_SESSION['id_pengguna']."'))) and gejala.id_gejala IN (select id_gejala from tmp_gejala where id_log='".$_SESSION['id_log']."')";
		$qry_gejalaada = mysql_query($sql_gejalaada, $koneksi);
		$g=0;
		while ($hsl_gejalaada=mysql_fetch_array($qry_gejalaada)) {
		$g++;
		}

$persentase=round($g/$h*100,2);
?>

<div class="alert">
    <h4>HAMA PENYAKIT YANG TERDETEKSI YAITU:</h4>
    <p></p>
        <div class="alert alert-error"><b><? echo $data['JnsPnykt']; ?></b></div>
    <h4>GEJALA-GEJALA YANG MENYERANG SESUAI ANALISA:</h4>
    <p></p>
    <div class="alert alert-info">
        <ol>
    <?php 
        //select * from analisahasil a left join gejalan b on a.id_gejala=b.id_gejala where a.id_log='".$_GET['id_log']."'
		$sql_gejala = "select distinct gejala.* FROM gejala, relasi WHERE gejala.id_gejala= relasi.id_gejala AND relasi.id_gejala in (select id_gejala from analisahasil where id_log in ((select max(id_log) from log where id_log='".$_SESSION['id_log']."' and id_pengguna='".$_SESSION['id_pengguna']."'))) and gejala.id_gejala IN (select id_gejala from tmp_gejala where id_log='".$_SESSION['id_log']."')";
		$qry_gejala = mysql_query($sql_gejala, $koneksi);
		$i=0;
		while ($hsl_gejala=mysql_fetch_array($qry_gejala)) {
		$i++;
			echo "<li> .$hsl_gejala[gejala]</li>";
		} 
    ?> 
        </ol>     
    </div>

    <h4>GEJALA-GEJALA LAIN YANG SESUAI :</h4>
    <p></p>
    <div class="alert alert-info">
        <ol>
    <?php 
        //select * from analisahasil a left join gejalan b on a.id_gejala=b.id_gejala where a.id_log='".$_GET['id_log']."'
		$sql_gejala = "select * from relasi a left join gejala b on a.id_gejala=b.id_gejala where a.id_penyakit='".$_SESSION['id_penyakit']."' and b.id_gejala NOT IN (select id_gejala from tmp_gejala where id_log='".$_SESSION['id_log']."')";
		$qry_gejala = mysql_query($sql_gejala, $koneksi);
		$i=0;
		while ($hsl_gejala=mysql_fetch_array($qry_gejala)) {
		$i++;
			echo "<li> .$hsl_gejala[gejala]</li>";
		} 
    ?> 
        </ol>     
    </div>
    
    <h4>PERSENTASE GEJALA HAMA DAN PENYAKIT YANG MENYERANG: </h4>
    <p></p>
    <div class="alert alert-info"><? echo $persentase; ?> ...% dari total gejala  <? echo $data['JnsPnykt']; ?> yaitu ada 
        <?php 
                //select * from relasi where id_penyakit='".$id_penyakit."'
				$sql_solusi1 = "select  * FROM relasi where id_penyakit 
				 in (select Id_Pnykt from  tmp_penyakit where id_log='".$_SESSION['id_log']."')";

		$qry_solusi1 = mysql_query($sql_solusi1, $koneksi);
		$k=0;
		while ($hsl_solusi1=mysql_fetch_array($qry_solusi1)) {
		$k++;
			
		}
		echo $k." Gejala";
		?>
				    <script type="text/javascript">
		  window.onload = function () {
		    var chart = new CanvasJS.Chart("hasil",
		    {
		      theme: "theme1",
		      title:{
		        text: "<?php echo $data['JnsPnykt']; ?> ",
		      },
		      legend:{
		        verticalAlign: "bottom",
		        horizontalAlign: "center"
		      },
		      data: [
		      {       
		       type: "pie",
		       showInLegend: true,
		       dataPoints: [
		       		<?php
		       		$sql_solusi1 = "select  * FROM relasi a left join gejala b on a.id_gejala=b.id_gejala where id_penyakit in (select Id_Pnykt from  tmp_penyakit where id_log='".$_SESSION['id_log']."')";

					$qry_solusi1 = mysql_query($sql_solusi1, $koneksi);
					$banyak = mysql_num_rows($qry_solusi1);
					while ($hsl_solusi1=mysql_fetch_array($qry_solusi1)) {
		       		?>
		       		<?php echo '{  y: 100/'.$banyak.', legendText:"'.$hsl_solusi1['gejala'].'", indexLabel: "'.$hsl_solusi1['gejala'].'" },'; ?>
		       		<?php } ?>
				
		       
		       ]
		     }
		     ]
		   });

		    chart.render();
		  }
	</script>

    <div id="hasil" style="height: 300px; width: 100%;"></div>
    </div>
    
    <h4>SOLUSI PENCEGAHAN DAN PENGOBATAN SESUAI GEJALA YANG DIPILIH :  </h4>
    <p></p>

    <div class="alert alert-success">
        <ol>
        <? 
		//$sql_solusi = "select distinct  solusi.* FROM ((analisahasil inner join relasi on //analisahasil.id_gejala= relasi.id_gejala) inner join relasigejala on //relasi.id_gejala=relasigejala.id_gejala) inner join solusi on //relasigejala.id_solusi=solusi.id_solusi where analisahasil.id in (select id from tmp_pengguna where //noip='$NOIP') and analisahasil.id_solusi in (select id_solusi from relasigejala where id_gejala in //(select id_gejala from tmp_gejala where noip='$NOIP'))";
				$sql_solusi = "select distinct  solusi.* FROM solusi where id_solusi in (select id_solusi from relasigejala where id_gejala in (select id_gejala from tmp_gejala where id_log='".$_SESSION['id_log']."'))";

		$qry_solusi = mysql_query($sql_solusi, $koneksi);
		$j=0;
		while ($hsl_solusi=mysql_fetch_array($qry_solusi)) {
		$j++;
			echo "<li>$hsl_solusi[solusi] $hsl_solusi[id_gejalasolusi] </li>";
		}
		?>
        </ol>
    </div>
    
    <h4>Gejala yang dipilih tetapi bukan gejala  <? echo $data['JnsPnykt']; ?> yaitu: </h4>
    <p></p>
    <div class="alert alert-info">
        <?php
			$sql_solusi2 = "select distinct gejala.* from gejala 
            where id_gejala in (SELECT id_gejala from tmp_gejala 
            where id_log='".$_SESSION['id_log']."' and id_gejala  
            not in (select id_gejala from relasi
            where id_penyakit  in ( select id_pnykt from tmp_penyakit where id_log='".$_SESSION['id_log']."')))";

		$qry_solusi2 = mysql_query($sql_solusi2, $koneksi);
		$l=0;
		while ($hsl_solusi2=mysql_fetch_array($qry_solusi2)) {
		$l++;
			echo "<h4>$l .$hsl_solusi2[gejala]</h4>";
			echo "  Penyakit  Gejala ini antara lain: <ul>";
			$sql_solusi3 = "select distinct * from hamapenyakit 
where Id_Pnykt in (SELECT id_penyakit from relasi 
where id_gejala='$hsl_solusi2[id_gejala]') ";
$qry_solusi3 = mysql_query($sql_solusi3, $koneksi);
		$m=0;
		while ($hsl_solusi3=mysql_fetch_array($qry_solusi3)) {
		$m++;
		    
			echo "<li> $hsl_solusi3[JnsPnykt] </li>";

		  }
		  echo" </ul>";
          echo " Solusi Gejala ini antara lain: <ul>";
		  $sql_solusi3 = "select distinct * from solusi 
where id_solusi in (SELECT id_solusi from relasigejala 
where id_gejala='$hsl_solusi2[id_gejala]') ";
$qry_solusi4 = mysql_query($sql_solusi3, $koneksi);
		$m=0;
		while ($hsl_solusi4=mysql_fetch_array($qry_solusi4)) {
		$m++;
		    
			echo "<li> $hsl_solusi4[solusi] </li>";

		  }
		   echo" </ul><br>";
		}
		?>
    </div>

    <h4>Penyakit yang timbul sesuai gejala yang dipilih yaitu: </h4>
    <p></p>
    <div class="alert alert-info">
        <?php
			$penyakit = mysql_query("SELECT * FROM `relasi` a left join hamapenyakit b on a.id_penyakit=b.Id_Pnykt where id_gejala in (SELECT id_gejala FROM `tmp_gejala` where id_log='".$_SESSION['id_log']."') group by id_penyakit");
			
			echo "<ol>";
			while($pn=mysql_fetch_array($penyakit))
			{

			//tampilkan gejala
			$sql_gejalarelasi = "select * from relasi a where a.id_gejala IN (select id_gejala from tmp_gejala where id_log='".$_SESSION['id_log']."') and a.id_penyakit='".$pn['Id_Pnykt']."'";
					$qry_gejalarelasi = mysql_query($sql_gejalarelasi, $koneksi);
					$h=0;
					while ($hsl_gejalarelasi=mysql_fetch_array($qry_gejalarelasi)) {
					$h++;
					}

			//gejala yang sesuai dan ada
				$sql_gejalaada = "select * from relasi where id_penyakit='".$pn['Id_Pnykt']."'";
					$qry_gejalaada = mysql_query($sql_gejalaada, $koneksi);
					$g=0;
					while ($hsl_gejalaada=mysql_fetch_array($qry_gejalaada)) {
					$g++;
					}

				$persentase=round($h/$g*100,2);

				$gejala = mysql_query("select * from relasi a left join gejala b on a.id_gejala=b.id_gejala where a.id_penyakit='".$pn['id_penyakit']."'");
				echo "<li><h4>".$pn['JnsPnykt']."</h4>";
				?>
	    <p></p>
	   	<h5>PERSENTASE GEJALA HAMA DAN PENYAKIT YANG MENYERANG: </h5>
	    <div class="alert alert-error"><? echo $persentase; ?> ...% dari total gejala  <? echo $pn['JnsPnykt']; ?> yaitu ada 
	        <?php 
	                //select * from relasi where id_penyakit='".$id_penyakit."'
					$sql_solusi1 = "select * from relasi where id_penyakit='".$pn['Id_Pnykt']."'";

			$qry_solusi1 = mysql_query($sql_solusi1, $koneksi);
			$k=0;
			while ($hsl_solusi1=mysql_fetch_array($qry_solusi1)) {
			$k++;
				
			}
			echo $k." Gejala";
			?>
	    </div>
				<?php
				echo "<ul>";
				while($gj=mysql_fetch_array($gejala))
				{
					$solusi = mysql_query("select * from relasigejala a left join solusi b on a.id_solusi=b.id_solusi where a.id_gejala='".$gj['id_gejala']."'");
					echo "<li><b>".$gj['gejala']."</b>";
					echo "<ol>";
					while($sl=mysql_fetch_array($solusi))
					{
						echo "<li>".$sl['solusi']."</li>";
					}
					echo "</ol>";
					echo "</li>";
				}
				echo "</ul>";

				echo "</li><p></p><p></p>";
			}
			echo "</ol>";
		?>



      </span></td>
      <td bgcolor="">&nbsp;</td>
    </tr>
    <tr bgcolor="">
      <td valign="top" bgcolor="">&nbsp;</td> 
      <td valign="top" bgcolor="">
        <div align="right"></div></td>
      <td valign="top" bgcolor=""><div align="right">
        <span class="style5">
        <a href="Cetak.php?id_log=<?php echo $_SESSION['id_log']; ?>&id_pengguna=<?php echo $_SESSION['id_pengguna']; ?>" target="_blank" class="btn btn-warning">Cetak Hasil</a>
      </span></div></td>
      <td valign="top" bgcolor="">&nbsp;</td>
    </tr>
  </table>
</div>
</div>
</body>
</html>
