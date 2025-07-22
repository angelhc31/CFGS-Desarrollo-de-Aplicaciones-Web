<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

</head>

<body>
	
	<?php

		$vec= array();
		$suma=0;

		for ($i=0; $i < 10; $i++) { 
			$vec[]= rand(1,100);
		}

		echo "La suma de ";
		for ($i=0; $i < 10; $i++) {
			echo "$vec[$i] ";
			$suma=$suma+$vec[$i];
		}
		echo "es $suma";


	?>
	
</body>

</html>