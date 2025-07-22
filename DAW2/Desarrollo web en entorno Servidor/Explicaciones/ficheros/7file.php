<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

</head>

<body>
	
<?php
	// Abrimos el fichero en modo de escritura
	$gestor=fopen('./ejemplo.txt',"r");
	// Si se ha podido abrir el fichero
	if($gestor) 
      While(!feof($gestor)) {// Mientras no se encuentre el final del fichero
		$linea=fgets($gestor);
		echo "$linea <br>";
	  }
   
	fclose($gestor);// Cerramos el fichero 

	
?>
	
</body>

</html>
