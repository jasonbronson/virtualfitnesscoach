<div align="center">
	<h1>User Assessment <?php echo $row['user_firstname']." ".$row['user_lastname'] ?></h1> 
	Assessment done on <?php echo date("m / d / Y h:i A", strtotime($row['date_time'])) ?><br>
	<br>
	<ul>
	<?php
		$data_array = unserialize(base64_decode($row['data']));
		foreach($data_array as $key=>$value){
			foreach($value as $innerkey => $innervalue){
				if($innervalue == "")
					$innervalue = " *EMPTY*";
				echo "<li><label>$innerkey</label> $innervalue</li>";
			}
		}
	
	?>
	</ul>
</div>