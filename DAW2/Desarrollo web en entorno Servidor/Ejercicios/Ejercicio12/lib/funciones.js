
//************************funcion para cargar los productos buscados**********************************************
	/*function cargar_productos_buscados()
	{
		var ruta;
		ruta="./buscador.php";
		new Ajax.Updater("contenido",ruta);
	}
*/

//************************funcion para cargar los productos seleccionados del arbol**********************************************
	function cargar_productos(tipo,familia)
	{
		var ruta;
		var parametros;
		parametros="tipo="+tipo+"&familia="+familia;
		ruta="./productos.php?"+parametros;
		new Ajax.Updater("contenido",ruta,{method:'get'});
	}
	function cargar_productos_inicio()
	{
		var ruta;
		ruta="./productos.php";
		new Ajax.Updater("contenido",ruta,{method:'get'});
	}
//**************************************actualiza el contenido*****************************************************************
	function cambiar_pagina(ruta)
	{
		new Ajax.Updater("contenido",ruta);
	}
//***************************************cambia el contenido ejecutando un script si lo hay***********************************
	function cargar_pagina(ruta)
	{
		new Ajax.Request(ruta,{method:'post',onSuccess:mostrar_respuesta});
	}
	function mostrar_respuesta(respuesta)
	{
		document.getElementById("contenido").innerHTML=respuesta.responseText;	
		var script=leer_script(respuesta.responseText);
		if (script!=-1)
			eval(script);	
	}
//*************************************busca un script delimitado por los caracteres de comentario y # en un texto para ejecutarlo al cargar************
	function leer_script(texto)
	{
		var indice=texto.lastIndexOf("<!--#");
		var x="";
		if (indice!=-1)
		{
			x= texto.substring( texto.lastIndexOf("<!--#")+5,texto.lastIndexOf("-->"));	
			return x;
		}
		else
			return -1;
		
	}
//*************************************************ir a una pagina*************************************************************************
	function ir_a(pagina)
	{
	 document.location.href=pagina; 
		
	}
//***********************************************funciones para mostrar valores iniciales de listas****************************************
	function muestraRol(valor)
	{
		var lista = $('roles');
		lista.value =valor;
	}
	function muestraFamilia(valor)
	{
		var lista = $('familias');
		lista.value =valor;
	}
	function muestraProveedor(valor)
	{
		var lista = $('proveedores');
		lista.value =valor;
	}
	function muestraTipo(valor)
	{
		var lista = $('tipos');
		lista.value =valor;
	}
	function muestraForma(valor)
	{
		var lista = $('formas');
		lista.value =valor;
	}
	function muestraProvincia(valor)
	{
		var lista = $('provincias');
		lista.value =valor;
	}
	function muestraPoblacion(valor)
	{
		var lista = $('poblaciones');
		lista.value =valor;
	}
//****************************************************XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
	

//*************************************************RESETEA LAS POBLACIONES*********************************************
  function reset_pro()
  {
  	  var pro = $('provincias');
   	  pob.options[0] = new Option('-Selecciona-','0');
  }


  function reset_pob()
  {
  	  var pob = $('poblaciones');
	  pob.options.length=0;
	  pob.options[0] = new Option('-Selecciona-','0');
	
  }
//**XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  function consultaPoblaciones()
  {
	  var pro = $('provincias');
	  var pob = $('poblaciones');
	  reset_pob();
	  var ruta="./consulta_poblaciones.php?codpro="+ pro.value;
	  new Ajax.Request(ruta,{method:'get',onSuccess:rellena_poblaciones});
	
  }
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX 
  function rellena_poblaciones(respuesta)
  {
  	if (respuesta.responseText!=-1)
	{
		var pob = $('poblaciones');
		var poblaciones=respuesta.responseText.split("$");	
		var i=0,j=1;
		while(i<poblaciones.length)
			{
				pob.options[j] = new Option(poblaciones[i],poblaciones[i+1]);
				i=i+2;
				j=j+1;
			} 
	}
		
  }
  //**XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  function reset_fam()
  {
  	  var pob = $('familias');
	  pob.options.length=0;
	  pob.options[0] = new Option('-Selecciona-','0');
	
  }
  //**XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
  function consultaFamilias()
  {
	  var tipo = $('tipos');
	  var familia = $('familias');
	  reset_fam();
	  var ruta="./consulta_familias.php?codfam="+ tipo.value;
	  new Ajax.Request(ruta,{method:'get',onSuccess:rellena_familias});
	
  }
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX 
  function rellena_familias(respuesta)
  {
  	if (respuesta.responseText!=-1)
	{
		var fam = $('familias');
		var familias=respuesta.responseText.split("$");	
		var i=0,j=1;
		while(i<familias.length)
			{
				fam.options[j] = new Option(familias[i],familias[i+1]);
				i=i+2;
				j=j+1;
			} 
	}
		
  }
//XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
 function confirmar()
 {
	
	if(confirm('�Seguro que desea darse de baja'))
		$('oculto').value='eliminar';
	else 
		$('oculto').value="nada";
 }
 