<?php
include ("../jpgraph.php");
include ("../jpgraph_line.php");
include ("../jpgraph_error.php");


$datax = array(1,10,36);
$datay = array(100,150,250);
$graph = new Graph(400,300,"auto");
//$graph->img->SetMargin(40,40,40,40);
$graph->img->SetAntiAliasing();
$graph->SetScale("textlin");
//$graph->SetShadow();
$graph->title->Set("Virtual Fitness Progress Report");
$graph->title->SetFont(FF_FONT1,FS_BOLD);


// Use 20% "grace" to get slightly larger scale then min/max of
// data
$graph->yscale->SetGrace(20);


$p1 = new LinePlot($datay);
$p1->mark->SetType(MARK_FILLEDCIRCLE);
$p1->mark->SetFillColor("blue");
$p1->mark->SetWidth(1);
$p1->SetColor("blue");
$p1->SetCenter();
$graph->Add($p1);

$graph->Stroke();

?>


