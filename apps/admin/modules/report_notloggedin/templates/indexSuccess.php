<br><br>
<div align=center>
 <h1>Users not logged in Report for company <?php echo $companyname ?></h1>
<table border=1>
<tr><td>Email</td> <td>Date last Logged in</td> <td>First Name</td> <td>Last Name</td> <td>Days Last Logged in</td></tr>

 
<?php 

$data_array = explode("|", $data);
foreach($data_array as $key => $value){
		$dataline_array = explode(",", $value);	
		echo "<tr align=center>";
		foreach($dataline_array as $innervalue){	
			if(strpos($innervalue, "@") !== false)
				echo "<td><a href='mailto:$innervalue'>".$innervalue."</a></td>";
				else
				echo "<td>".$innervalue."</td>";
				
		}
		echo "</tr>";
}
	?>			
	
</table>	
</div>