<?php
	
	function conectar($base,$user='root',$pwd='')
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
