<?php 
include "inc.session.php"; 
include "../librari/inc.koneksidb.php";
include "../librari/inc.kodeauto.php";

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

<table class='table table-striped table-condensed'>
  <tr bgcolor="#33FFFF"> 
    <td colspan="4" bgcolor=""><b>DAFTAR SEMUA SOLUSI </b></td>
  </tr>
  <tr>
    <td width="35"><strong>No</strong></td> 
    <td width="118"><b>Id Solusi </b></td>
    <td width="594"><b>Solusi</b></td>
    <td width="127" align="center"><b>Pilihan</b></td>
  </tr>
  <?php 
  $sql = "SELECT id_solusi,left(solusi,75) as solusi FROM solusi ORDER BY id_solusi";
  $qry = mysql_query($sql, $koneksi) 
     or die ("SQL Error".mysql_error());
  $no=0;
  while ($data=mysql_fetch_array($qry)) {
  $no++;
  ?>
  <tr bgcolor="#FFFFFF">
    <td><div align="right"><?php echo $no; ?></div></td> 
    <td><div align="left"><?php echo $data['id_solusi']; ?></div></td>
    <td><div align="left"><?php echo $data['solusi']; ?></div></td>
    <td align="center"> 
    <div><a href="SolusiHapus.php?kdhapus=<? echo $data['id_solusi']; ?>" target="_self" class="btn">Delete</a> 
      <a href="SolusiEditFm.php?kdubah=<? echo $data['id_solusi']; ?>" target="_self"></a> 
      | <a href="SolusiEditFm.php?kdubah=<? echo $data['id_solusi']; ?>" target="_self" class="btn">Edit</a>
      <a href="SolusiHapus.php?kdhapus=<? echo $data['id_solusi']; ?>" target="_self"></a></div></td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><a href="SolusiAddFm.php" class="btn">Tambah</a></td>
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

