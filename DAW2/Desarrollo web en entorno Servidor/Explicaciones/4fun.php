<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

</head>

<body>
	
<?php
	
	function sumar($n1,$n2){
		$suma=$n1+$n2;
		return $suma;
	}
	
	function sumar2($n1,$n2){
		$n2=2;
		$suma=$n1+$n2;
		return $suma;
	}
	
	function sumar3($vec){
		$suma=0;
		for($i=0;$i<count($vec);$i++)
			$suma=$suma+$vec[$i];
		$vec[0]=20;
		return $suma;
	}
	
	function sumar4(&$vec){
		$suma=0;
		for($i=0;$i<count($vec);$i++)
			$suma=$suma+$vec[$i];
		$vec[0]=20;
		return $suma;
	}
	list($n1 ,$n2) = array(5,1);  //declaración multilinea
	
	echo "Primera suma: ".sumar($n1,$n2);
	echo "<br>";
	
	echo "Segunda suma: ".sumar2($n1,$n2);
	echo "<br>";
	echo "n2=$n2";
	echo "<br>";
	
	$vector=array(1,2,3,4,5);
	echo "Tercera suma: ".sumar3($vector);
	echo "<br>";
	print_r($vector);
	echo "<br>";
	
	$vector=array(1,2,3,4,5);
	echo "Cuarta suma: ".sumar4($vector);
	echo "<br>";
	print_r($vector);
	
?>
	
</body>

</html>
