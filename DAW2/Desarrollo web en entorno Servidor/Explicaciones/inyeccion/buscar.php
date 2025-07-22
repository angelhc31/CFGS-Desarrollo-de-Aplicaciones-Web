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
			
			$consulta="select * from clientes  where capellidos='$buscado'";
			
			$rs=mysqli_query($conex,$consulta);
			if(mysqli_num_rows($rs)!=0){
				
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
	}
	else
		echo "error en el pase de parámetros"

?>


</body>
</html>
