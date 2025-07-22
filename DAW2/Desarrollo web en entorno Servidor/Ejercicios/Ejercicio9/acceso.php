<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Acceso</title>
	</head>
	<body>
		<?php
			if($_POST['nombre'] == "pepe") {
				$_SESSION['nombre'] = $_POST['nombre'];
				echo "<p>Hola ".$_POST['nombre']."</p>";
				echo "<p>Cosas que puedes hacer:</p>
					  <ul>
						 <li><a href='paginaA.php'>Ir a sitio A</a></li>
						 <li><a href='paginaB.php'>Ir a sitio B</a></li>
						 <li><a href='paginaC.php'>Ir a sitio C</a></li>
						 <li><a href='cerrarSesion.php'>Cerrar sesión</a></li>
					  </ul>";
			} else {
				echo "<p>Usuario incorrecto</p>";
				echo "<a href='index.php'>Volver al login</a>";
			}
		?>
	</body>
</html>
