<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

</head>

<body>
	
<?php
	
	$gestor=fopen('./ejemplo.txt',"a");// Abrimos el fichero en modo "append"
	// Si se ha podido abrir el fichero
	if (fwrite($gestor,"\n\nTE HUELEN LOS PIES") == FALSE) 
       echo "No se puede escribir al archivo";
     
   
	fclose($gestor);

?>
	
</body>

</html>
