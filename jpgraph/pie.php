<?php
$s = 'select  * FROM relasi a left join gejala b on a.id_gejala=b.id_gejala where id_penyakit in (select Id_Pnykt from  tmp_penyakit where id_log="3")';

$data = array();
$lbl = array();
$q = mysql_num_rows(mysql_query($s));
for ($i=0; $i < $q; $i++) { 
	array_push($data, 1);
}

include("pChart/pData.class");
include("pChart/pChart.class");

// Dataset definition 
$DataSet = new pData;
$DataSet->AddPoint($data,"Serie1");
$DataSet->AddPoint($lbl,"Serie2");
$DataSet->AddAllSeries();
$DataSet->SetAbsciseLabelSerie("Serie2");

// Initialise the graph
$Test = new pChart(420,250);
$Test->drawFilledRoundedRectangle(7,7,413,243,5,240,240,240);
$Test->drawRoundedRectangle(5,5,415,245,5,230,230,230);
$Test->createColorGradientPalette(195,204,56,223,110,41,5);

// Draw the pie chart
$Test->setFontProperties("Fonts/tahoma.ttf",8);
$Test->AntialiasQuality = 0;
$Test->drawPieGraph($DataSet->GetData(),$DataSet->GetDataDescription(),180,130,110,PIE_PERCENTAGE_LABEL,FALSE,50,20,5);
$Test->drawPieLegend(330,15,$DataSet->GetData(),$DataSet->GetDataDescription(),250,250,250);


$Test->Render("example10.png");

?>
example10.png
