<?php
// $Id: bar_csimex3.php,v 1.3 2002/08/31 20:03:46 aditus Exp $
// Horiontal bar graph with image maps
include ("../jpgraph.php");
include ("../jpgraph_bar.php");

$data1y=array(1,2,1,2,2,1);
$data2y=array(4,3,6,9,3,6);

// Setup the basic parameters for the graph
$graph = new Graph(400,700);
$graph->SetAngle(90);
$graph->SetScale("textlin");

// The negative margins are necessary since we
// have rotated the image 90 degress and shifted the
// meaning of width, and height. This means that the
// left and right margins now becomes top and bottom
// calculated with the image width and not the height.
$graph->img->SetMargin(-80,-80,210,210);

$graph->SetMarginColor('white');

// Setup title for graph
$graph->title->Set('Progress Report Graph');
$graph->title->SetFont(FF_FONT2,FS_BOLD);
$graph->subtitle->Set("Click on graph bars to get greater details\n Blue is Goal driven Red is Current Position");

// Setup X-axis.
$graph->xaxis->SetTitle("Progress Meter",'center');
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetAngle(90);
$graph->xaxis->SetTitleMargin(30);
$graph->xaxis->SetLabelMargin(15);
$graph->xaxis->SetLabelAlign('right','center');

// Setup Y-axis

// First we want it at the bottom, i.e. the 'max' value of the
// x-axis
$graph->yaxis->SetPos('max');

// Arrange the title
$graph->yaxis->SetTitle("Months",'center');
$graph->yaxis->SetTitleSide(SIDE_RIGHT);
$graph->yaxis->title->SetFont(FF_FONT2,FS_BOLD);
$graph->yaxis->title->SetAngle(0);
$graph->yaxis->title->Align('center','top');
$graph->yaxis->SetTitleMargin(30);

// Arrange the labels
$graph->yaxis->SetLabelSide(SIDE_RIGHT);
$graph->yaxis->SetLabelAlign('center','top');

// Create the bar plots with image maps
$b1plot = new BarPlot($data1y);
$b1plot->SetFillColor("red");
$targ=array("#notsetupyet","#notsetupyet","#notsetupyet",
            "#notsetupyet","#notsetupyet","#notsetupyet");
$alts=array("val=%d","val=%d","val=%d","val=%d","val=%d","val=%d");
$b1plot->SetCSIMTargets($targ,$alts);

$b2plot = new BarPlot($data2y);
$b2plot->SetFillColor("black");
$targ=array("#notsetupyet","#notsetupyet","#notsetupyet",
            "#notsetupyet","#notsetupyet","#notsetupyet");
$alts=array("val=%d","val=%d","val=%d","val=%d","val=%d","val=%d");
$b2plot->SetCSIMTargets($targ,$alts);

// Create the accumulated bar plot
$abplot = new AccBarPlot(array($b1plot,$b2plot));
$abplot->SetShadow();

// We want to display the value of each bar at the top
$abplot->value->Show();
$abplot->value->SetFont(FF_FONT1,FS_NORMAL);
$abplot->value->SetAlign('left','center');
$abplot->value->SetColor("black","darkred");
$abplot->value->SetFormat('%.1f mkr');

// ...and add it to the graph
$graph->Add($abplot);

// Send back the HTML page which will call this script again
// to retrieve the image.
$graph->StrokeCSIM();

?>
