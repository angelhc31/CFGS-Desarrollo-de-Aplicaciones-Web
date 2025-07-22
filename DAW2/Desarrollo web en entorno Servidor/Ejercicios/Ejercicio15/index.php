<!DOCTYPE html>
<html>
<head>
	<title>PRUEBA AJAX-PHP 2</title>
	<script src="./lib/jquery-3.6.0.min.js"></script>
	<link rel="stylesheet" href="./lib/bootstrap.min.css">
	<script src="./lib/bootstrap.min.js"></script>
  <style>
    table{
      width: 90%;
      text-align: center;
    }
  </style>
</head>
<body>

	<div class="container">
		<h1 class="text-center">EJEMPLO DE PETICIÓN DE DATOS MEDIANTE BOTONES</h1>
		<hr>
		<div class="row text-center">
			<div class="col"><input type="button" class="btn btn-primary" value="CLIENTES" onclick="consulta(1);"></div>
			<div class="col">
				<input type="button" class="btn btn-primary" value="ARTÍCULOS" onclick="consulta(2);"><br><br>
				
				<input type="text" id="cuadroTexto" class="form-control" onkeyup="busqueda();">

			</div>
			<div class="col"><input type="button" class="btn btn-primary" value="FAMILIAS" onclick="consulta(3);"></div>
		</div>

		<hr>
		<h2 class="text-center">LISTAS DETALLADAS</h2>
    <br>
		<div class="row justify-content-md-center">		
			<div class="col-md-8">
				<div id="mostrar_mensaje"></div>
			</div>
		</div>
    <br><br>
	</div>



<script>
	function busqueda()
    { 
    	buscar = document.getElementById('cuadroTexto').value;
     
      var parametros = 
      {
        "mi_busqueda" : buscar,
        "accion" : "4"
      };

      $.ajax({
        data: parametros,
        url: 'codigo.php',
        type: 'POST',
        
       
        success: function(mensaje)
        {
          $('#mostrar_mensaje').html(mensaje);
        }
      });
    }

	function consulta(boton)
    { 
    
      var parametros = 
      {
        "accion" : boton
      };

      $.ajax({
        data: parametros,
        url: 'codigo.php',
        type: 'POST',
        
       

        success: function(mensaje)
        {
          $('#mostrar_mensaje').html(mensaje);
        }
      });
    }
</script>

</body>
</html>