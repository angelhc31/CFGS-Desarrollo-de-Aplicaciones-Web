<?php
/*header("Content-Type: text/html;charset=iso-8859-1");*/
//************************************FUNCIONES EN PHP*******************************************

	include_once ("./lib/db.php");


//****************************************CABECERA Y PIE******************************************
	function cabecera()
	{
		echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>\n";
		echo "<html xmlns='http://www.w3.org/1999/xhtml'>\n";
		echo "<head>\n";
		echo "<title>BluePc. Tienda online de material inform�tico</title>\n";
		echo "<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>\n";
		echo "<script type='text/javascript' src='./lib/prototype.js'></script>\n";
		echo "<script type='text/javascript' src='./lib/funciones.js'></script>\n";
		echo "</head>\n";

		echo "<body>\n";
		
	}
	
	
	function pie()
	{
		
		echo " </body>\n";
		echo "</html>\n";
	}
	
	
	


//************************************MUESTRA UN MENSAJE DE ERROR*******************************************
	function error($mensaje)
	{
		echo "<script language='javascript'> alert('Error: ".$mensaje."!!');history.go(-1); </script>";
		exit;    
	}

//**********************************muestra un mensaje y cambia de pagina************************************
	function mensaje($texto,$pagina)
	{
		if ($pagina=='0')
			echo "<script language='javascript'> alert('".$texto."');</script>";
			
		else
		{
			if ($pagina=='1')
				echo "<script language='javascript'> alert('".$texto."'); history.go(-1); </script>";
			else
				echo "<script language='javascript'> alert('".$texto."'); document.location.href='".$pagina."'; </script>";
		}
		exit;
        
	}


?>
