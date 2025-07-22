<?php
/*header("Content-Type: text/html;charset=iso-8859-1");*/
//************************************FUNCIONES EN PHP*******************************************

	include_once ("lib/db.php");

//****************************************DICE SI UN ROL TIENE PERMISO PARA REALIZAR UNA FUNCION******************************************
	function tiene_permiso_categoria($rol,$categoria_funcion,$funcion='0')
	{
	
	   $conex_f = conectar();
	   if ($conex_f)
	   {
		   if ($funcion==0)
		   {
			   $lccadena = "SELECT roles.ccodigo FROM roles inner join roles_funciones on roles.ccodigo=roles_funciones.crol ";
			   $lccadena = $lccadena. "inner join funciones on funciones.ccodigo=roles_funciones.cfuncion ";
			   $lccadena = $lccadena. "inner join categorias_funciones on funciones.ccategoria=categorias_funciones.ccodigo ";
			   $lccadena = $lccadena. "WHERE categorias_funciones.cnombre='$categoria_funcion' AND roles.ccodigo='$rol'";
		   }
		   else
		   {
			   $lccadena = "SELECT roles.ccodigo FROM roles inner join roles_funciones on roles.ccodigo=roles_funciones.crol ";
			   $lccadena = $lccadena. "WHERE roles_funciones.cfuncion='$funcion' AND roles.ccodigo='$rol'"; 
		   }
		   $result = mysql_query($lccadena,$conex_f);
		   if(!mysql_num_rows($result)) 
		   {
		   		desconectar($conex_f);
				return 0;
		   }
		   else
		   {
			   	desconectar($conex_f);
				return 1;
		   }
	   }
	   else
	   		error("No se puede conectar con la base de datos");

	}
	

//****************************************IMPRIME LA TABLA CON ARTICULOS A PARTIR DE UNA CONSULTA******************************************
	function productos($datos)
	{
			echo"<table class='normal'>\n";
      		echo"	<tr class='titulos'>\n";
        	echo"		<td></td>\n";
        	echo"		<td>Características</td>\n";
			echo"		<td>Precio</td>\n";
        	echo"		<td>Stock</td>\n";
      		echo"	</tr>\n";
			while ($rs=mysql_fetch_array($datos))
			{	
				if (is_null($rs['cimagen']))
					$imagen="vacia.jpg";
				else
					$imagen=trim($rs['cimagen']);
				
				
				echo"	<tr>\n"; 
        		echo"		<td rowspan='2' class='fotos'><img src='images/articulos/$imagen'  alt='" . $rs['cnombre'] . "'/></td>\n";
        		echo"		<td  rowspan='2' class='caracteristicas'><strong>{$rs['cnombre']}</strong> <br/> {$rs['cdescripcion']} </td>\n";
				if ($rs['loferta']==1)
				{
					echo"		<td rowspan='2' class='precios'>".number_format($rs['nprecio'],2,',','.')."€";
					echo" <p id='oferta'> oferta ".number_format($rs['nprecio_oferta'],2,',','.')."€ </p></td> \n";
				}
				else
					echo"		<td rowspan='2' class='precios'>".number_format($rs['nprecio'],2,',','.')."€</td>\n";
				echo"		<td height='30' class='stock'>{$rs['nstock']}</td>\n";
      			echo"	</tr>\n";
				echo"	<tr>\n";
				echo"		<td class='caracteristicas'>\n";
				echo"			<form action='mete_producto.php' method='get' name='form_carro'>\n";
				echo"				<center>Cantidad\n";
				echo"				<input type='text'   name='cantidad' value='1' size='1' />\n";
				echo" 			    <input type='hidden' name='id' value='".$rs['ncodigo']."'>\n";
				echo" 			    <input type='hidden' name='nombre' value='".$rs['cnombre']."'>\n";
				if ($rs['loferta']==1)
					echo" 			    <input type='hidden' name='precio' value='".$rs['nprecio_oferta']."'>\n";
				else
					echo" 			    <input type='hidden' name='precio' value='".$rs['nprecio']."'>\n";
				echo"				<input name='a&ntilde;adir' type='image' src='./images/carrito.png' alt='a&ntilde;adir al carrito' align='middle' />\n";
				echo"			</center></form>\n";
				echo"      </td>\n";
				echo"	</tr>\n";
     		}
			echo"</table>\n";		
	}
	

//****************************************CABECERA Y PIE******************************************
	function cabecera()
	{
		echo "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>\n";
		echo "<html xmlns='http://www.w3.org/1999/xhtml'>\n";
		echo "<head>\n";
		echo "<title>BluePc. Tienda online de material informático</title>\n";
		echo "<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'/>\n";
		echo "<link rel='stylesheet' type='text/css' href='http://yui.yahooapis.com/2.8.0r4/build/fonts/fonts-min.css' />\n";
		echo "<link href='css/estilos.css' rel='stylesheet' type='text/css' media='screen'/>\n";
		echo "<script type='text/javascript' src='./lib/prototype.js'></script>\n";
		echo "<script type='text/javascript' src='./lib/funciones.js'></script>\n";
		echo "</head>\n";

		echo "<body>\n";
		echo "<div id='contenedor'>\n";
		echo "   <div id='encabezado'>\n";
		echo "      <img src='images/banner.jpg'  alt='BluePc' align='middle'/>\n";
    	echo "   </div>\n";
		echo "   <div id='encabezadoB'>\n";
    	
        echo "       <ul class='menuH'>\n";         
        echo "           <li><a href='index.php?n=10'  title='Inicio del sitio'> Inicio </a> </li>\n";
        echo "           <li><a href='index.php?n=1' title='Información de la empresa'> Empresa </a> </li>\n";
        echo "           <li><a href='index.php?n=2' title='Principales Marcas'> Marcas</a> </li>\n";
        echo "           <li><a href='index.php?n=7' title='Ofertas actuales'> Ofertas </a> </li>\n";
        echo "           <li><a href='index.php?n=6' title='Buscador de productos'> Buscar </a> </li>\n";
        echo "           <li><a href='index.php?n=8' title='Información de contacto'> Contacto </a> </li>\n";         
        echo "       </ul>\n";
        echo "       <div id='menuH_izq'>\n";
           	
				if (!isset($_SESSION['user']))
				{
					echo "<ul class='acceso'>";
        			echo "		<li><a href='index.php?n=3'  title='Acceso a usuarios'> Acceder<< </a> </li> ";
					echo "		<li>Anónimo </li> ";
					echo "</ul>";
					echo " <ul class='carro'>";
					echo "		<li>Carrito<< </li>";
					echo " </ul>";
				}
				else
				{
					echo "<ul class='acceso'>";
        			echo "		<li><a href='./desconectar.php' title='Desconectar usuarios'> Desconectar<< </a> </li>";
					echo "		<li><a href='modificar_usuario.php' title='Acceso a panel control'> ".$_SESSION['user']."<< </li> ";
					echo "</ul>";
					echo " <ul class='carro'>";
					echo "		<li><a href='#' onclick='cargar_pagina(\"ver_carrito.php\")' title='Acceso al carrito'>Carrito<< </a></li>";
					echo " </ul>";
					
				}
			
          echo "     </div>\n";  
     	  echo "  </div>\n";
		  echo " <div id='contenido_form'>\n";
	}
	
	
	function pie()
	{
		echo "    </div>\n";
		echo "    <div class='pie'>\n";
    	echo "     <span id='fin'>\n";
		echo "  	<a href='index.php'  title='Inicio del sitio'> Inicio </a>  &nbsp;| &nbsp; <a href='index.php?n=1'  title='Inicio del sitio'> Empresa </a>  &nbsp;| &nbsp; <a href='index.php?n=2'  title='Inicio del sitio'> Marcas </a>  &nbsp; |  &nbsp; <a href='index.php?n=6'  title='Inicio del sitio'> Ofertas </a>  &nbsp; |  &nbsp; <a href='index.php?n=7'  title='Inicio del sitio'> Buscar </a> | &nbsp; <a href='index.php?n=8'  title='Inicio del sitio'> contacto </a>\n";
        echo "     </span>\n";
		echo "    </div>\n";
		echo "   </div>\n";
		echo " </body>\n";
		echo "</html>\n";
	}
	
	
	
	
	
	
//*************************  GENERADOR DE CONTRASEÑAS ***************************************/
  function generar_contrasena($tam=7,$may=FALSE)
  { 
	  //Tamaño Mínimo
	  $min=7;
	  //Tamaño Máximo
	  $max=14;
	  
	  if($may === FALSE)
	  {
		  $cadena='0123456789abcdefghijklmnopqrstuvwxyz';
	  }
	  else
	  {
		  $cadena='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	  }
	  if(($tam >= $min)&&($tam <=$max))
	  {
		  //Generación aleatoria segun sea mayuscula o minuscula.
		  for($i=0;$i<=$tam;$i++)
		  {
			  //Guardamos en un arreglo.
			  $pila[]=$cadena{rand(0,25)};
		  }
		  //Desordenamos el arreglo.
		  shuffle($pila);
		  //Mostramos la contraseña, suena ilógico, pero usualmente
		  //es para enviarse a un correo, donde se supone el usuario
		  //si puede verla con seguridad.    
		  foreach($pila as $letra => $contrasena)
		  {
			  $pass=$pass.$contrasena;
		  }
	  }
	  return $pass;
	  
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
//*******************************ENVIA UN CORREO ELECTRONICO*********************************************
	function email($to,$subject,$body)
	{
	  if(!mail($to,$subject,$body))
	  {
		  error("No se ha podido enciar el mensaje");
	  }
	}
//****************************************VALIDAR CUENTA CORRIENTE****************************************

  function is_cc($numeroCuenta)
  {
 	 $valores = array(1, 2, 4, 8, 5, 10, 9, 7, 3, 6);
 	 $controlCS=0;
	 $controlCC = 0;
	 if (strlen($numeroCuenta)==20)
	 {
	   for ($i=0; $i<=7; $i++)
		   $controlCS += intval($numeroCuenta[$i]) * $valores[$i+2];
	   
	   $controlCS = 11 - ($controlCS % 11);
	   if ($controlCS == 11)
		  $controlCS = 0;
	   else{
		  if ($controlCS == 10) 
			  $controlCS = 1;}

	   for ($i=10; $i<=19; $i++)
		   $controlCC += intval($numeroCuenta[$i]) * $valores[$i-10];
	   $controlCC = 11 - ($controlCC % 11);
	   if ($controlCC == 11) 
		  $controlCC = 0;
	   else{
		  if ($controlCC == 10)
			  $controlCC = 1;}
	
	   if (($numeroCuenta[8]==$controlCS) and ($numeroCuenta[9]==$controlCC ))
		  return 1;
	   else
		  return 0;
	 }
	 else
	 	 return 0;
  
  } 

//****************************************COMPRUEBA EL NIF O NIE*****NO EL CIF****************************************
	function is_nif_nie($doc)
	{
		$numero=substr($doc,0,strlen($doc)-1);
		$letra=substr($doc,strlen($doc)-1,1);
		$calculo= substr("TRWAGMYFPDXBNJZSQVHLCKE",strtr($numero,"XYZ","012")%23,1);
		if($calculo==strtoupper($letra))
			return 1;
		else
			return 0;
			
	}

//****************************************COMPRUEBA LA DIRECCION DE CORREO*********************************************

	function is_mail($direccion)
	{
		$arroba=0;
		$puntos=0;	
		for ($i=0;$i<strlen($direccion);$i++)
		{	
			if ($direccion[$i]=='@')
				$arroba=$arroba+1;
			if ($direccion[$i]=='.')
				$puntos=$puntos+1;
		}
		if ($arroba==1 and $puntos>=1 and strlen($direccion)>5)
			return 1;
		else
			return 0;
		
	}
//****************************************COMPRUEBA SI UN USUARIO EXISTE*********************************************

	function in_use_id($userid) 
	{
  
	   $conex_f = conectar();
	   if ($conex_f)
	   {
		   $query = "SELECT cid FROM usuarios WHERE cid = '$userid'";
		   $result = mysql_query($query,$conex_f);
		   if(!mysql_num_rows($result)) 
		   {
		   		desconectar($conex_f);
				return 0;
		   }
		   else 
		   {
		   		desconectar($conex_f);
				return 1;
		   }
		}
		else
		{
			error("No se puede conectar con la base de datos");
		}
	}
//****************************************COMPRUEBA SI UN DNI YA EXISTE*********************************************

	function in_use_nif($nif) 
	{
  
	   $conex_f = conectar();
	   if ($conex_f)
	   {
		   $query = "SELECT cid FROM usuarios WHERE cnif = '$nif'";
		   $result = mysql_query($query,$conex_f);
		   if(!mysql_num_rows($result)) 
		   {
		   		desconectar($conex_f);
				return 0;
		   }
		   else 
		   {
		   		desconectar($conex_f);
				return 1;
		   }
		}
		else
		{
			error("No se puede conectar con la base de datos");
		}
	}
//***************************************************CONSULTA LAS PROVINCIAS*********************************************************
		
	function consulta_provincias() 
	{
		$conex_f = conectar();
		if ($conex_f)
		{
			$consulta="select ccodigo,cnombre from provincias order by cnombre";
			$cursor=mysql_query($consulta,$conex_f);
			desconectar($conex_f);
			return $cursor;
		}
		else
		{
				error("No se puede conectar con la base de datos");
		}
	}
//**************************************************CONSULTA LOS PROVEEDORES*********************************************************
	function consulta_proveedores() 
	{
		$conex_f = conectar();
		if ($conex_f)
		{
			$consulta="select ncodigo,cnombre from proveedores order by cnombre";
			$cursor=mysql_query($consulta,$conex_f);
			desconectar($conex_f);
			return $cursor;
		}
		else
		{
			 error("No se puede conectar con la base de datos");
		}
	}	
//**************************************************CONSULTA LAS FAMILIAS DE ARTICULOS*********************************************************
	function consulta_familias($tipo) 
	{
		$conex_f = conectar();
		if ($conex_f)
		{
			if ($tipo!='')	
				$consulta="select ccodigo,cnombre from familias where ctipo='$tipo' order by cnombre";
			else
				$consulta="select ccodigo,cnombre from familias order by cnombre";
			$cursor=mysql_query($consulta,$conex_f);
			desconectar($conex_f);
			return $cursor;
		}
		else
		{
			 error("No se puede conectar con la base de datos");
		}
	}
//**************************************************CONSULTA LOS TIPOS DE ARTICULOS*********************************************************
	function consulta_tipos() 
	{
		$conex_f = conectar();
		if ($conex_f)
		{
			$consulta="select ccodigo,cnombre from tipos order by cnombre";
			$cursor=mysql_query($consulta,$conex_f);
			desconectar($conex_f);
			return $cursor;
		}
		else
		{
			 error("No se puede conectar con la base de datos");
		}
	}



//**************************************************CONSULTA LOS ROLES*********************************************************
	function consulta_roles() 
	{
		$conex_f = conectar();
		if ($conex_f)
		{
			$consulta="select ccodigo,cnombre from roles where ccodigo<>'anm' order by cnombre";
			$cursor=mysql_query($consulta,$conex_f);
			desconectar($conex_f);
			return $cursor;
		}
		else
		{
			 error("No se puede conectar con la base de datos");
		}
	}

//**************************************************CONSULTA LAS FORMAS DE PAGO*********************************************************
	function consulta_formas() 
	{
		$conex_f = conectar();
		if ($conex_f)
		{
			$consulta="select ccodigo,cnombre from formas_pago order by cnombre";
			$cursor=mysql_query($consulta,$conex_f);
			desconectar($conex_f);
			return $cursor;
		}
		else
		{
			 error("No se puede conectar con la base de datos");
		}
	}
	
//************************************************AÑADE LOS PROVEEDORES******************************************************************
//********************las variables var controlan si mostrar o no la opcion TODOS*********************
	function muestraProveedores($var=1)
	{
		
		echo "<script type='text/javascript'> var lista = $('proveedores');lista.options[0] = new Option('-Selecciona-','-1'); </script>";
		$i=0;
		if ($var==1)
		{
			echo "<script type='text/javascript'> var lista = $('proveedores');lista.options[1] = new Option('Todos','0'); </script>";
			$i=2;
		}
		else
			$i=1;
		$cursor=consulta_proveedores();
		while ($rs=mysql_fetch_array($cursor))
		{
			echo "<script type='text/javascript'> lista.options[".$i."]=new Option('".$rs['cnombre']."','".$rs['ncodigo']."');</script>";
			$i=$i+1;
		}
	
	}
//************************************************AÑADE LAS FAMILIAS******************************************************************	
	function muestraFamilias($codigo='',$var=1)
	{
		
		echo "<script type='text/javascript'> var lista = $('familias');lista.options[0] = new Option('-Selecciona-','-1'); </script>";
		$i=0;
		if ($var==1)
		{
			echo "<script type='text/javascript'> var lista = $('familias');lista.options[1] = new Option('Todos','0'); </script>";
			$i=2;
		}
		else
			$i=1;
		$cursor=consulta_familias($codigo);
		while ($rs=mysql_fetch_array($cursor))
		{
			echo "<script type='text/javascript'> lista.options[".$i."]=new Option('".$rs['cnombre']."','".$rs['ccodigo']."');</script>";
			$i=$i+1;
		}
	
	}
//************************************************AÑADE LOS TIPOS DE ARTICULOS******************************************************************	
	function muestraTipos($var=1)
	{
		
		echo "<script type='text/javascript'> var lista = $('tipos');lista.options[0] = new Option('-Selecciona-','-1'); </script>";
		$i=0;
		if ($var==1)
		{
			echo "<script type='text/javascript'> var lista = $('tipos');lista.options[1] = new Option('Todos','0'); </script>";
			$i=2;
		}
		else
			$i=1;
		$cursor=consulta_tipos();
		while ($rs=mysql_fetch_array($cursor))
		{
			echo "<script type='text/javascript'> lista.options[".$i."]=new Option('".$rs['cnombre']."','".$rs['ccodigo']."');</script>";
			$i=$i+1;
		}
	
	}


//************************************************AÑADE LOS ROLES ******************************************************************	
	function muestraRoles($var=1)
	{
		$i=0;
		echo "<script type='text/javascript'> var lista = $('roles');lista.options[0] = new Option('-Selecciona-','0'); </script>";
		if ($var==1)
		{
			echo "<script type='text/javascript'> var lista = $('roles');lista.options[1] = new Option('Todos','0'); </script>";
			$i=2;
		}
		else
			$i=1;
		$cursor=consulta_roles();
		while ($rs=mysql_fetch_array($cursor))
		{
			echo "<script type='text/javascript'> lista.options[".$i."]=new Option('".$rs['cnombre']."','".$rs['ccodigo']."');</script>";
			$i=$i+1;
		}
	
	}
//************************************************AÑADE LAS FORMAS DE PAGO******************************************************************	
	function muestraFormas()
	{
		
		echo "<script type='text/javascript'> var lista = $('formas');lista.options[0] = new Option('-Selecciona-','0'); </script>";
		$i=1;
		$cursor=consulta_formas();
		while ($rs=mysql_fetch_array($cursor))
		{
			echo "<script type='text/javascript'> lista.options[".$i."]=new Option('".$rs['cnombre']."','".$rs['ccodigo']."');</script>";
			$i=$i+1;
		}
	
	}
//************************************************AÑADE LAS PROVINCIAS******************************************************************	
	function muestraProvincias()
	{
		
		echo "<script type='text/javascript'> var lista = $('provincias');lista.options[0] = new Option('-Selecciona-','0'); </script>";
		$i=1;
		$cursor=consulta_provincias();
		while ($rs=mysql_fetch_array($cursor))
		{
			echo "<script type='text/javascript'> lista.options[".$i."]=new Option('".$rs['cnombre']."','".$rs['ccodigo']."');</script>";
			$i=$i+1;
		}
	
	}
//************************************************AÑADE LAS POBLACIONES USA LAS FUNCIONES DE JAVASCRIPT ********************************	
	function muestraPoblaciones()
	{
	
		echo "<script type='text/javascript'> consultaPoblaciones(); </script>";
	}

?>