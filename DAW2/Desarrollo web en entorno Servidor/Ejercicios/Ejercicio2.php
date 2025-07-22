<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

</head>

<body>
	
	<?php

		$vec= array(array());
		$cont=1;

		for ($i=0; $i < 10; $i++) { 
			for ($j=0; $j < 10; $j++) { 
				$vec[$i][$j]=$cont;

				$cont++;
			}
		}
		echo "<br>";
		echo "<table align='center' style='text-align: center;' cellspacing='0'>";
		for ($i=0; $i < 10; $i++) { 
			if ($i%2==0) {
				echo "<tr style='background-color: grey;'>";
			}
			else {
				echo "<tr>";
			}
			
		    for ($j=0; $j < 10; $j++) { 
				echo "<td width='40px' height='25px'>";
				echo $vec[$i][$j];
				echo "</td>";
            }
			echo "</tr>";
		}
		echo "</table>";

	?>
	
</body>

</html>