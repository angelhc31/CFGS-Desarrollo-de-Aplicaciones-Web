<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

</head>

<body>
	
<?php
	
	$var = '';


	if (isset($var)) 
		echo "Esta variable está definida, así que se imprimirá";

	echo "<br>";
	$a = "prueba";
	$b = "otraprueba";

	var_dump(isset($a));      
	echo "<br>";
	var_dump(isset($a, $b)); 
	echo "<br>";
	unset ($a); 

	var_dump(isset($a)); 
	echo "<br>";    
	var_dump(isset($a, $b));
	echo "<br>";
	$foo = NULL;
	var_dump(isset($foo));  
	echo "<br>";

	
	
?>
	
</body>

</html>
