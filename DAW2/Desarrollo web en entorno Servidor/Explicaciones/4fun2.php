<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

</head>

<body>
	
<?php
	
	function sumar($n1,$n2=5){
		$suma=$n1+$n2;
		return $suma;
	}
	
	
	
	
	list($n1 ,$n2) = array(5,1);  
	
	echo "Primera suma: ".sumar($n1,$n2);
	echo "<br>";
	
	echo "Segunda suma: ".sumar($n1);
	echo "<br>";

	
	
?>
	
</body>

</html>
