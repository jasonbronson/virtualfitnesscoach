<table border=0 width=500px>
	<tr>
		<td width='70%'>
		<h1>Nutrition Meals</h1>
		</td>
		<td><?php if($_REQUEST['graphicsoff'] != 'true'): ?> <input
			type=button value='Print without Graphics'
			onclick="window.location='<?php echo $_SERVER['REQUEST_URI'] ?>&graphicsoff=true' ">
			<?php else: ?> <input type=button value='Print with Graphics'
			onclick="window.location='<?php echo $_SERVER['REQUEST_URI'] ?>&graphicsoff=false' ">
			<?php endif; ?></td>
	</tr>
</table>

<br><br>
<h1>Breakfast</h1>
			<?php
			//LOOP 1
			if(is_array($b)){
				echo "<table border=0><tr> ";

				foreach($b as $value){
					
					echo "<td>";
					if($_REQUEST['graphicsoff'] != 'true'){
						$tmp = "<img src='/uploads/nutrition/".$row[$value]['image']."' width=130px height=100px> <br> ";
					}

					echo "
					".$row[$value]['title']."<br> 
					$tmp
					 ".str_replace("|", "<br>", $row[$value]['portion'])."<br> 
					 ".$row[$value]['calories']." Calories<br>";
					 
					echo "</td>";
				}
				echo "</tr></table>";
			}else{

				if($_REQUEST['graphicsoff'] != 'true'){
					$tmp = "<tr> <td><img src='/uploads/nutrition/".$row[$b]['image']."' width=130px height=100px></td> </tr>";
				}

				echo "
				<table border=0>
				<tr><td>".$row[$b]['title']."</td></tr> 
				$tmp
				<tr> <td>".str_replace("|", "<br>", $row[$b]['portion'])."</td> </tr>
				<tr> <td>".$row[$b]['calories']." Calories</td> </tr>
				</table>
				<br>
				";

			}

			?>

<hr style="width: 100%">
<h1>Snack</h1>
			<?php
			//LOOP 2
				if($_REQUEST['graphicsoff'] != 'true'){
					$tmp = "<tr> <td><img src='/uploads/nutrition/".$row[$s1]['image']."' width=130px height=100px></td> </tr>";
				}

				echo "
				<table border=0>
				<tr><td>".$row[$s1]['title']."</td></tr> 
				$tmp
				<tr> <td>".$row[$s1]['portion']."</td> </tr>
				<tr> <td>".$row[$s1]['calories']." Calories</td> </tr>
				</table>
				<br>
				";			
			?>		

<hr style="width: 100%">
<h1>Lunch</h1>
			<?php
			//LOOP 3
				if(is_array($l)){
				echo "<table border=0><tr> ";

				foreach($l as $value){
					
					echo "<td>";
					if($_REQUEST['graphicsoff'] != 'true'){
						$tmp = "<img src='/uploads/nutrition/".$row[$value]['image']."' width=130px height=100px> <br> ";
					}

					echo "
					".$row[$value]['title']."<br> 
					$tmp
					 ".str_replace("|", "<br>", $row[$value]['portion'])."<br> 
					 ".$row[$value]['calories']." Calories<br>";
					 
					echo "</td>";
				}
				echo "</tr></table>";
			}else{

				if($_REQUEST['graphicsoff'] != 'true'){
					$tmp = "<tr> <td><img src='/uploads/nutrition/".$row[$l]['image']."' width=130px height=100px></td> </tr>";
				}

				echo "
				<table border=0>
				<tr><td>".$row[$l]['title']."</td></tr> 
				$tmp
				<tr> <td>".str_replace("|", "<br>", $row[$l]['portion'])."</td> </tr>
				<tr> <td>".$row[$l]['calories']." Calories</td> </tr>
				</table>
				<br>
				";

			}
			?>			

<hr style="width: 100%">
<h1>Snack</h1>
			<?php
			//LOOP 4
				if($_REQUEST['graphicsoff'] != 'true'){
					$tmp = "<tr> <td><img src='/uploads/nutrition/".$row[$s2]['image']."' width=130px height=100px></td> </tr>";
				}

				echo "
				<table border=0>
				<tr><td>".$row[$s2]['title']."</td></tr> 
				$tmp
				<tr> <td>".str_replace("|", "<br>", $row[$s2]['portion'])."</td> </tr>
				<tr> <td>".$row[$s2]['calories']." Calories</td> </tr>
				</table>
				<br>
				";			
			?>		
			

<hr style="width: 100%">
<h1>Dinner</h1>
			<?php
			//LOOP 5
				if(is_array($d)){
				echo "<table border=0><tr> ";

				foreach($d as $value){
					
					echo "<td>";
					if($_REQUEST['graphicsoff'] != 'true'){
						$tmp = "<img src='/uploads/nutrition/".$row[$value]['image']."' width=130px height=100px> <br> ";
					}

					echo "
					".$row[$value]['title']."<br> 
					$tmp
					 ".str_replace("|", "<br>", $row[$value]['portion'])."<br> 
					 ".$row[$value]['calories']." Calories<br>";
					 
					echo "</td>";
				}
				echo "</tr></table>";
			}else{

				if($_REQUEST['graphicsoff'] != 'true'){
					$tmp = "<tr> <td><img src='/uploads/nutrition/".$row[$d]['image']."' width=130px height=100px></td> </tr>";
				}

				echo "
				<table border=0>
				<tr><td>".$row[$d]['title']."</td></tr> 
				$tmp
				<tr> <td>".str_replace("|", "<br>", $row[$d]['portion'])."</td> </tr>
				<tr> <td>".$row[$d]['calories']." Calories</td> </tr>
				</table>
				<br>
				";

			}
			?>		
			
			
<hr style="width: 100%">
<h1>Snack</h1>
			<?php
			//LOOP 6
				if($_REQUEST['graphicsoff'] != 'true'){
					$tmp = "<tr> <td><img src='/uploads/nutrition/".$row[$s3]['image']."' width=130px height=100px></td> </tr>";
				}

				echo "
				<table border=0>
				<tr><td>".$row[$s3]['title']."</td></tr> 
				$tmp
				<tr> <td>".$row[$s3]['portion']."</td> </tr>
				<tr> <td>".$row[$s3]['calories']." Calories</td> </tr>
				</table>
				<br>
				";			
			?>		
											