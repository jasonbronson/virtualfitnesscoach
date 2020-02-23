<?php

$msconn = mssql_connect("HEAT","sa","adminj");
if (! $msconn) {
	throw new Exception( "Unable to connect to HEAT Database");
	die();
}

mssql_select_db  ( "SLX_Lee", $msconn);

$sql = "select * from sysdba.contact a,sysdba.address b
where a.addressid=b.addressid

";
$msres = mssql_query($sql);
if (! $msres ) { throw new Exception("Bad HEAT sql:  $sql\n"); }


	$myFile = "/tmp/spg.csv";
	$fh = fopen($myFile, 'a') or die("can't open file");


while($row = mssql_fetch_array($msres, MSSQL_ASSOC)){
	$header="";
	$rowdata="";
	
	foreach($row as $key=>$value){
		$rowdata .= '"'.str_replace(",", "", $value).'",';
		$header .= $key.",";

	}
	
	
	
	$rowdata = substr($rowdata, 0, -1)."\n"; //strip last comma
	$header = substr($header, 0, -1); //strip last comma
	//die($rowdata);
	
	fwrite($fh, $rowdata);
}


		
		fclose($fh);

	//$xls = "";
	//echo $header;
	//echo $rowdata;
	//exit;






// Clean up
mssql_free_result($msres);

?>