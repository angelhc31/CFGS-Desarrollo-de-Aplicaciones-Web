<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>

</head>

<body>
<?php
	require("db.php");
	$conex=conectar("ferreteria");
	if ($conex){
		$consulta="select ccif,clientes.cnombre,capellidos,cdireccion from clientes inner join poblaciones on poblaciones.ccodigo=clientes.cpoblacion where poblaciones.cnombre='Burriana'";
		if($rs=mysqli_query($conex,$consulta)){
			echo " <table border='3' cellspacing='0'>";
			echo "<tbody>";
			while ($vec=mysqli_fetch_assoc($rs)) 
			{
				echo "<tr>";		
				echo "<td  align='left'> {$vec['ccif']} </td>";
				echo "<td  align='left'> {$vec['cnombre']} </td>";
				echo "<td  align='left'> {$vec['capellidos']} </td>";
				echo "<td  align='left'> {$vec['cdireccion']} </td>";
				echo "</tr>";	
			}
			echo "</tbody>";
			echo "</table>";
		}
		mysqli_close($conex);
	}
	else
		echo "error de conexion";
	

?>


</body>
</html>
