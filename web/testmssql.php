<?php


#  initialize sqlserver connection
	$msconn = mssql_connect("10.108.111.250","heat","h1e2a3t4");
	if (! $msconn) {
		throw new Exception( "Unable to connect to HEAT Database");
		die();
	}

?>
