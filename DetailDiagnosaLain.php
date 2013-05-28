    <script type="text/javascript" src="canvasjs.min.js"></script>

<h4><span class='icon-dashboard'></span> Hasil Diagnosa - Belimbing Manis</h4>
<?php 
include "librari/inc.koneksidb.php";
$_GET['id_log'] = $_GET['id_log'];

$_SESSION["get_id_log"] = $_GET['id_log'];
?>

    <h4>PENYAKIT YANG TERDETEKSI</h4>
    <p></p>

    <div class="alert alert-error">
        Gejala yang menyerang belimbing manis anda tidak sesuai dengan dengan penyakit bercak daun(yg dipilih di awal tadi), penyakit yang sesuai dengan
    </div>

    <h4>Penyakit yang timbul sesuai gejala yang dipilih yaitu: </h4>
    <p></p>
    <div class="alert alert-info">
        <?php
      $penyakit = mysql_query("SELECT * FROM `relasi` a left join hamapenyakit b on a.id_penyakit=b.Id_Pnykt where id_gejala in (SELECT id_gejala FROM `tmp_gejala` where id_log='".$_GET['id_log']."') group by id_penyakit");
      
      echo "<ol>";
      while($pn=mysql_fetch_array($penyakit))
      {

      //tampilkan gejala
      $sql_gejalarelasi = "select * from relasi a where a.id_gejala IN (select id_gejala from tmp_gejala where id_log='".$_GET['id_log']."') and a.id_penyakit='".$pn['Id_Pnykt']."'";
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
        <a href="CetakLain.php?id_log=<?php echo $_GET['id_log']; ?>&id_pengguna=<?php echo $_SESSION['id_pengguna']; ?>" target="_blank" class="btn btn-warning">Cetak Hasil</a>
      </span></div></td>
      <td valign="top" bgcolor="">&nbsp;</td>
    </tr>
  </table>
</div>
</div>
</body>
</html>
