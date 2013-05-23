<?php

require_once ('librari/inc.koneksidb.php');
$sql_solusi1 = 'select  * FROM relasi a left join gejala b on a.id_gejala=b.id_gejala where id_penyakit in (select Id_Pnykt from  tmp_penyakit where id_log="'.$_SESSION["get_id_log"].'")';

$data = array();
$lbl = array();
$qry_solusi1 = mysql_query($sql_solusi1, $koneksi);
while ($hsl_solusi1=mysql_fetch_array($qry_solusi1)) 
{
    array_push($data, 1);
    array_push($lbl, $hsl_solusi1['gejala']);
}

include("jpgraph/pChart/pData.class");
include("jpgraph/pChart/pChart.class");

// Dataset definition 
$DataSet = new pData;
$DataSet->AddPoint($data,"Serie1");
$DataSet->AddPoint($lbl,"Serie2");
$DataSet->AddAllSeries();
$DataSet->SetAbsciseLabelSerie("Serie2");

// Initialise the graph
$Test = new pChart(700,300);
$Test->drawFilledRoundedRectangle(7,7,700,243,5,240,240,240);
$Test->drawRoundedRectangle(5,5,700,245,5,230,230,230);
$Test->createColorGradientPalette(195,204,56,223,110,41,5);

// Draw the pie chart
$Test->setFontProperties("Fonts/tahoma.ttf",8);
$Test->AntialiasQuality = 0;
$Test->drawPieGraph($DataSet->GetData(),$DataSet->GetDataDescription(),180,130,110,PIE_PERCENTAGE_LABEL,FALSE,50,20,5);
$Test->drawPieLegend(330,15,$DataSet->GetData(),$DataSet->GetDataDescription(),250,250,250);


$Test->Render("example10.png");



require_once("dompdf/dompdf_config.inc.php");
$h="http://localhost/pakarbelimbing/HasilDiagnosaCetak.php?id_log=".$_GET['id_log']."&id_pengguna=".$_GET['id_pengguna']."";
session_start();
$_SESSION['get_id_log'] = $_GET['id_log'];
$html=file_get_contents($h);
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->set_paper("A4", "portrait");
$dompdf->render();
$dompdf->stream("CetakHasil-LOG".$_GET['id_log']."-PENGGUNA".$_GET['id_pengguna'].".pdf");
?>