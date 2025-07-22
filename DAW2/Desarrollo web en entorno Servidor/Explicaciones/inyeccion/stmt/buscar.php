<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php
	require("db.php");
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>

</head>

<body>
<?php
	if(isset($_GET["buscar"]) && $_GET["buscar"]!=null){
		$buscado=$_GET["buscar"];
		$conex=conectar("ferreteria");
		if ($conex){
			
			$consulta="select ccif,cnombre,capellidos,cdireccion from clientes  where cnombre=?";
			if($stmt = mysqli_prepare($conex, $consulta)){ //crea el statement
				// enlaza las variables con los ?
				mysqli_stmt_bind_param($stmt, "s", $buscado);
				// si las variables no tinen valos se les da y se ejecuta
				
				if($rs=mysqli_stmt_execute($stmt)){
					mysqli_stmt_bind_result($stmt,$cif,$nombre,$apellidos,$direccion);
					echo " <table border='3' cellspacing='0'>";
					echo "<tbody>";
					while (mysqli_stmt_fetch($stmt)) 
					{
						echo "<tr>";		
						echo "<td  align='left'> $cif </td>";
						echo "<td  align='left'> $nombre </td>";
						echo "<td  align='left'> $apellidos </td>";
						echo "<td  align='left'> $direccion </td>";
						echo "</tr>";	
					}
					echo "</tbody>";
					echo "</table>";
				}
				mysqli_close($conex);
			}
		}else
			echo "error de conexion";
	}
	else
		echo "error en el pase de parámetros"

?>


</body>
</html>
