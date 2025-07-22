<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

</head>

<body>
	
<?php
	
	$edades=array("Pepe"=>13,"Eva"=>24,"Jose"=>33,"Pable"=>44,"Rosa"=>34,"Sofia"=>15,"Irene"=>76,"Luis"=>43,"Pedro"=>56);
	
		
	foreach($edades as $clave=>$valor){
		echo " $clave tiene $valor años	";
		echo "<br>";
	}
	
	
?>
	
</body>

</html>
