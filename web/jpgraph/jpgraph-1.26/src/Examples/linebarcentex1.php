<?php
include ("../jpgraph.php");
include ("../jpgraph_line.php");
include ("../jpgraph_bar.php");

$l1datay = array(11,44,55);
$l2datay = array(5,0,0);

$datax= array("4 weeks", "3 months", "9 months"); //$gDateLocale->GetShortMonth();

// Create the graph.
$graph = new Graph(800,400,"auto");
$graph->SetScale("textlin");
$graph->SetMargin(40,130,20,40);
$graph->SetShadow();
$graph->xaxis->SetTickLabels($datax);

// Create the linear error plot
$l1plot=new LinePlot($l1datay);
$l1plot->SetColor("red");
$l1plot->SetWeight(2);
$l1plot->SetLegend("Prediction");

//Center the line plot in the center of the bars
$l1plot->SetBarCenter();


// Create the bar plot
$bplot = new BarPlot($l2datay);
$bplot->SetFillColor("blue");
$bplot->SetLegend("Current Result");

// Add the plots to t'he graph
$graph->Add($bplot);
$graph->Add($l1plot);


$graph->title->Set("Progress Report");
$graph->xaxis->title->Set("");
$graph->yaxis->title->Set("Total Pushups");

$graph->title->SetFont(FF_FONT1,FS_BOLD);
$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
//$graph->SetBackgroundImage("Tentative_Logo.jpg",BGIMG_FILLFRAME);
//$graph->SetBackgroundGradient('white');
$graph->SetColor('white');
$graph->SetTitleBackground('white');
$graph->SetMarginColor('white');

// Display the graph
$graph->Stroke();
?>
