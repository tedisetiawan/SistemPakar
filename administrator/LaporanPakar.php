<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";

$cek = mysql_num_rows(mysql_query("select * from hasilanalisa where id_log='".$_GET['id_log']."'"));
if($cek==0)
{
  echo "<meta http-equiv='refresh' content='0; url=LaporanPakarLain.php?id_log=".$_GET['id_log']."&id_pengguna=".$_GET['id_pengguna']."'>";
}

$kdubah=$_REQUEST['kdubah'];
if($kdubah !=""){
  #Menampilkan Data
  $sql = "SELECT * FROM gejala WHERE id_gejala='$kdubah'";
  $qry = mysql_query($sql, $koneksi)
    or die ("SQL Error".mysql_error());
  $data=mysql_fetch_array($qry);
  
  #Samakan Dengan Variabel Form
  // Memindah Data Ke dalam Variable Buatan Sendiri
  $TxtKodeH = $data['id_gejala'];
  $TxtGejala = $data['gejala'];
}
$_SESSION["get_id_log"] = $_GET['id_log'];
?>

<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--><html class="no-js"><!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>
    Administrator - Pakar Belimbing Manis
  </title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width">

    <script type="text/javascript" src="../canvasjs.min.js"></script>
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700" rel="stylesheet" type="text/css">
  <link href="../css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" id="bootstrap-css">
  <link href="../css/adminflare.min.css" media="all" rel="stylesheet" type="text/css" id="adminflare-css">
  </script>
  
  <script src="../js/modernizr-jquery.min.js" type="text/javascript"></script>
  <script src="../js/adminflare-demo.min.js" type="text/javascript"></script>
  <script src="../js/bootstrap.min.js" type="text/javascript"></script>
  <script src="../js/adminflare.min.js" type="text/javascript"></script>
  
  <script type="text/javascript">
    $(document).ready(function() {
      prettyPrint();
    });
  </script>

  <style type="text/css">
    .box, .well { padding-bottom: 0; }
  </style>
</head>
<body>
<script type="text/javascript">demoSetBodyLayout();</script>
  <!-- Main navigation bar
    ================================================== -->
  <header class="navbar navbar-fixed-top" id="main-navbar">
    <div class="navbar-inner">
      <div class="container">
        <a class="logo" href="#"><img alt="Af_logo" src="../images/af-logo.png"></a>

        <a class="btn nav-button collapsed" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-reorder"></span>
        </a>

        <div class="nav-collapse collapse">
          <ul class="nav">
            <li class="divider-vertical"></li>
            <li class="active"><a href="../"><i class="icon-home"></i> FRONT PAGE</a></li>
            <li class="divider-vertical"></li>
            <li><a href="Pages.php"><i class="icon-home"></i> HALAMAN STATIS</a></li>
            <?php
            if(!empty($_SESSION['username_admin']))
            {
            ?>
            <li class="divider-vertical"></li>
            <li><a href="../index.php?page=logout"><i class="icon-off"></i> LOG OUT</a></li>
            <?php } ?>
          </ul>
          <ul class="nav  pull-right">
            <li><a href="#"><i class="icon-user"></i> Welcome, <?php echo $_SESSION['username_admin']; ?></a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <!-- / Main navigation bar -->
  
  <!-- Left navigation panel
    ================================================== -->
  <nav id="left-panel">
    <div id="left-panel-content">
      <ul>
        <li>
          <a href="index.php"><span class="icon-home"></span>Beranda</a>
        </li>
        <li>
          <a href="Artikel.php"><span class="icon-dashboard"></span>Artikel</a>
        </li>
        <li>
          <a href="PenyakitTampil.php"><span class="icon-th-large"></span>Data Penyakit</a>
        </li>
        <li>
          <a href="GejalaTampil.php"><span class="icon-edit"></span>Daftar Gejala</a>
        </li>
        <li>
          <a href="SolusiTampil.php"><span class="icon-table"></span>Data Solusi</a>
        </li>
        
        <li>
          <a href="AdminTampil.php"><span class="icon-inbox"></span>Daftar Admin</a>
        </li>
        
        <li>
          <a href="PenggunaTampil.php"><span class="icon-share"></span>Pengguna</a>
        </li>
        <li>
          <a href="LaporanTampil.php"><span class="icon-share"></span>Laporan</a>
        </li>
      </ul>
    </div>
    <div class="icon-caret-down"></div>
    <div class="icon-caret-up"></div>
  </nav>
  <!-- / Left navigation panel -->
  
  <!-- Page content
    ================================================== -->
  <section class="container">
  
    <!-- Headings
      ================================================== -->
    <section class="row-fluid">
      <h4><span class='icon-leaf'></span> Administrator - Sistem Pakar Diagnosa Hama dan Penyakit Tanaman Belimbing Manis</h4>
      <div class="box">
        <div class="well">
<?php
$sql = "select log.*,analisahasil.*,hamapenyakit.*,gejala.*,
solusi.* from (((((log inner join analisahasil on log.id_log=analisahasil.id_log) 
 inner join hamapenyakit on analisahasil.id_penyakit=hamapenyakit.Id_Pnykt)
 inner join relasi on hamapenyakit.Id_Pnykt=relasi.Id_Penyakit) 
inner join gejala on relasi.id_gejala=gejala.id_gejala) 
inner join relasigejala on gejala.id_gejala=relasigejala.id_gejala) 
inner join solusi on relasigejala.id_solusi=solusi.id_solusi 
where analisahasil.id_log ='".$_GET['id_log']."' and analisahasil.id_pengguna='".$_GET['id_pengguna']."'
order by analisahasil.id_analisa Desc limit 1";

$_SESSION["get_id_log"] = $_GET['id_log'];

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
  $sql_gejalaada = "select distinct gejala.* FROM gejala, relasi WHERE gejala.id_gejala= relasi.id_gejala AND relasi.id_gejala in (select id_gejala from analisahasil where id_log in ((select max(id_log) from log where id_log='".$_GET['id_log']."' and id_pengguna='".$_GET['id_pengguna']."'))) and gejala.id_gejala IN (select id_gejala from tmp_gejala where id_log='".$_GET['id_log']."')";
    $qry_gejalaada = mysql_query($sql_gejalaada, $koneksi);
    $g=0;
    while ($hsl_gejalaada=mysql_fetch_array($qry_gejalaada)) {
    $g++;
    }
$persentase=round($g/$h*100,2);
?>

    <script type="text/javascript" src="canvasjs.min.js"></script>
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
    $sql_gejala = "select distinct gejala.* FROM gejala, relasi WHERE gejala.id_gejala= relasi.id_gejala AND relasi.id_gejala in (select id_gejala from analisahasil where id_log in ((select max(id_log) from log where id_log='".$_GET['id_log']."' and id_pengguna='".$_GET['id_pengguna']."'))) and gejala.id_gejala IN (select id_gejala from tmp_gejala where id_log='".$_GET['id_log']."')";
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
    $sql_gejala = "select * from relasi a left join gejala b on a.id_gejala=b.id_gejala where a.id_penyakit='".$id_pnykt."' and b.id_gejala NOT IN (select id_gejala from tmp_gejala where id_log='".$_GET['id_log']."')";
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
         in (select Id_Pnykt from  tmp_penyakit where id_log='".$_GET['id_log']."')";

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
              $sql_solusi1 = "select  * FROM relasi a left join gejala b on a.id_gejala=b.id_gejala where id_penyakit in (select Id_Pnykt from  tmp_penyakit where id_log='".$_GET['id_log']."')";

          $qry_solusi1 = mysql_query($sql_solusi1, $koneksi);
          while ($hsl_solusi1=mysql_fetch_array($qry_solusi1)) {
              ?>
              <?php echo '{  y: 100/3, legendText:"'.$hsl_solusi1['gejala'].'", indexLabel: "'.$hsl_solusi1['gejala'].'" },'; ?>
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
        $sql_solusi = "select distinct  solusi.* FROM solusi where id_solusi in (select id_solusi from relasigejala where id_gejala in (select id_gejala from tmp_gejala where id_log='".$_GET['id_log']."'))";

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
            where id_log='".$_GET['id_log']."' and id_gejala  
            not in (select id_gejala from relasi
            where id_penyakit  in ( select id_pnykt from tmp_penyakit where id_log='".$_GET['id_log']."')))";

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
      $penyakit = mysql_query("SELECT * FROM `relasi` a left join hamapenyakit b on a.id_penyakit=b.Id_Pnykt where id_gejala in (SELECT id_gejala FROM `tmp_gejala` where id_log='".$_GET['id_log']."' and id_gejala in(select id_gejala from analisahasil where id_log='".$_GET['id_log']."')) group by id_penyakit");
      
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
        <a href="../Cetak.php?id_log=<?php echo $_GET['id_log']; ?>&id_pengguna=<?php echo $_GET['id_pengguna']; ?>" target="_blank" class="btn btn-warning">Cetak Hasil</a>
      </span></div></td>
      <td valign="top" bgcolor="">&nbsp;</td>
    </tr>
  </table>

        </div>
      </div>
    </section>
    
    <footer id="main-footer">
      Perancangan Aplikasi Sistem Pakar Berbasis Website Untuk Para Petani Belimbing Manis
    </footer>
    <!-- / Page footer -->
  </section>
</body>
</html>



