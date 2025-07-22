<?php
	
	function conectar($base='ferreteria',$user='root',$pwd='') //conexiones solo para consultar
	{
		$db=mysqli_connect("localhost",$user,$pwd,$base);
		if ($db)
		{
			return $db;
		}
		else
			return 0;
	}
	
	function desconectar($conex)
	{
		mysqli_close($conex);
	}
	
	
?>
