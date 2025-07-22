<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

</head>

<body>
	
<?php
	//comentarios
	/*comentarios*/
	#comentarios	
	
	$logico=true;
	$entero=5;
	$decimal=56.78;
	$string="Pedro";
	
	print $logico . "<br>";
	print $entero . "<br>";
	print $decimal . "<br>";
	print $string . "<br>";
//********************************************************************************	
	echo "</br>";
	echo "el valor logico es:" . $logico . "<br>";
	echo "el valor entero es:". $entero . "<br>";
	echo "el valor decimal es:". $decimal . "<br>";
	echo "el valor string es:". $string . "<br>";
	
//********************************************************************************	
	echo "</br>";
	echo "el valor logico es:$logico <br>";
	echo "el valor entero es:$entero <br>";
	echo "el valor decimal es: $decimal <br>";
	echo "el valor string es: $string </r>";
	
//********************************************************************************	
	echo "</br>";
	echo 'el valor logico es:$logico <br>';
	echo 'el valor entero es:$entero <br>';
	echo 'el valor decimal es: $decimal <br>';
	echo 'el valor string es: $string <br>';
//********************************************************************************	
	echo "</br>";
	echo "la primera letra del string es: $string[0] y al a última ". $string[strlen($string)-1];	
?>
	
</body>

</html>
