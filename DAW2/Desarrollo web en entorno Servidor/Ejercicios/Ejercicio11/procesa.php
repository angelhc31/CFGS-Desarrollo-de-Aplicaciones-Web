<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Ejercicio 11</title>
	</head>

	<body>
		<?php
			require("db.php");
			$input=$_POST["Apellido"];
			$conex=conectar("ferreteria");
			if ($conex){
				$consulta="select ccif,cnombre,capellidos,cdireccion from clientes where capellidos like '%$input%'";
				if($rs=mysqli_query($conex,$consulta)){
					echo " <table border='3' cellspacing='0'>";
					echo "<tbody>";
					while ($vec=mysqli_fetch_assoc($rs)) {
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