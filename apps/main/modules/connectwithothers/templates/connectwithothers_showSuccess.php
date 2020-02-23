<table border=1>
<tr>
<td></td>
<td></td>
<td></td>
</tr>
</table>
<?php

foreach($row as $key=>$value){
	  echo "<a href=\"?id={$row[0]['id']}&show=true\">{$row[0]['title']} - {$row[0]['city']}, {$row[0]['state']} Additional Details</a> <br>";
	}
	
?>