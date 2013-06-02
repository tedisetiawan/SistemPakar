<?php
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
if(isset($_REQUEST['kdsakit'])){
$kdsakit= $_REQUEST['kdsakit'];
}else{
$kdsakit= "";
}
?>

<?php
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
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

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,400,300,600,700" rel="stylesheet" type="text/css">
  <link href="../css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" id="bootstrap-css">
  <link href="../css/adminflare.min.css" media="all" rel="stylesheet" type="text/css" id="adminflare-css">
  </script>
  
  <script src="../js/modernizr-jquery.min.js" type="text/javascript"></script>
  <script src="../js/adminflare-demo.min.js" type="text/javascript"></script>
  <script src="../js/bootstrap.min.js" type="text/javascript"></script>
  <script src="../js/adminflare.min.js" type="text/javascript"></script>
  <script type="text/JavaScript">
	<!--
	function MM_jumpMenu(targ,selObj,restore){ //v3.0
	  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
	  if (restore) selObj.selectedIndex=0;
	}
	//-->
	</script>
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

<form action="RelasiGejalaAddSim.php" method="post" name="form1" target="_self" id="form1">
  <table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" bordercolor="#000000">
    <tr>
      <td colspan="2" ><div align="center">[ RELASI GEJALA DAN SOLUSI ] </div></td>
    </tr>
    <tr>
      <td colspan="2" >Nama Gejala : </td>
    </tr>
    <tr>
      <td colspan="2" ><select name="CmbPenyakit" onChange="MM_jumpMenu('parent',this,0)">
        <option value="<?=$_SERVER['PHP_SELF'];?>" [ Daftar Penyakit ]</option>
		<?php
		$sqlp = "SELECT * FROM gejala ORDER BY id_gejala";
		$qryp = mysql_query($sqlp, $koneksi)
			or die ("SQL Error: ".mysql_error());
		while ($datap=mysql_fetch_array($qryp)) {
			if($datap['id_gejala']==$kdsakit) {
				$cek ="selected";
			}
		else {
			$cek ="";
		}
		// kode untuk menampilkan daftar
		echo "<option value='RelasiGejalaAddPilih.php?kdsakit=$datap[id_gejala]' $cek>
			$datap[gejala] 
			</option>";
		}
		?>
      </select>
      <input name="TxtKodeH" type="hidden" id="TxtKodeH" value="<?=$kdsakit; ?>" /></td>
    </tr>
    <tr>
      <td colspan="2" >Daftar Solusi : </td>
    </tr>
	<?php
	$no=0;
	$sql = "SELECT * FROM solusi ORDER BY id_solusi";
	$qry = mysql_query($sql, $koneksi)
		or die("SQL Error:".mysql_error());
	while ($data=mysql_fetch_array($qry)){
		$no++;
		$sqlr = "SELECT * FROM relasigejala ";
		$sqlr .= "WHERE id_gejala='$kdsakit'";
		$sqlr .= "AND id_solusi='$data[id_solusi]'";
		$qryr = mysql_query($sqlr, $koneksi);
		$cocok = mysql_num_rows($qryr);
		//Kode untuk nilai gejala terpilih
		// Kode untuk memberi warna untuk warna pada nilai terpilih
		if ($cocok==1){
			$cek = "checked";
			$bg = "#CCFF00";
		}
		else {
			$cek ="";
			$bg="#FFFFFF";
		}
		?>
    <tr bgcolor="">
      <td width="20" >
	  <input name="CekGejala[]" type="checkbox"
	  value="<?= $data['id_solusi'];?>" <?= $cek; ?> >	  </td>
      <td width="707" ><? echo $data['solusi'];?></td>
    </tr>
	<?php
	}
	?>
    <tr >
      <td colspan="2" align="center" >
	  <input type="submit" name="Submit" value="Simpan" class="btn btn-info"> <a href="javascript:history.back()" class="btn btn-warning">Batal</a></td>
    </tr>
  </table>
</form>

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

