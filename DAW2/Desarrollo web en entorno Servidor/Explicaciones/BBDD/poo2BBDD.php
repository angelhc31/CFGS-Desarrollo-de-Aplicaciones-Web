<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>

</head>

<body>
<?php
	
	$conex=new mysqli ("localhost", "root", "", "ferreteria");
	if (!$conex->connect_errno){
		
		$conex->set_charset("utf8");
		
		$consulta="select * from clientes";
		
		if($rs = $conex->query($consulta)){
			echo " <table border='3' cellspacing='0'>";
			echo "<tbody>";
			while ($vec=$rs->fetch_assoc()) 
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
		$conex->close();
	}
	else
		echo "error de conexion ".$mysqli->connect_error;	//comentar die
	

?>


</body>
</html>
