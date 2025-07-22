<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />

</head>

<body>
	
<?php
	
	if (($fichero = fopen("productos.csv", "r")) !== FALSE) {
		while (($datos = fgetcsv($fichero,0,";")) !== FALSE) { // 0-->leer sin limite de bytes
			echo " Id: $datos[0] <br>";
			echo " Familia: $datos[1] <br>";
			echo " Descripción: $datos[2] <br>";
			echo " Peso: $datos[3] <br>";
			echo " Precio: $datos[4] <br>";
			echo " Stock: $datos[5] <br>";
			echo " Proveedor: $datos[6] <br>";
			echo "------------------------------------ <br>";
       
		}
	fclose($fichero);
	}
   
	

?>
	
</body>

</html>
