<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Pagina 2</title>
	</head>
	<body>
	<?php
		if(isset($_POST['nombre'])){
			$_SESSION['nombre'] = $_POST['nombre'];
			echo "Bienvenido! Has iniciado sesion: ".$_POST['nombre'];
		}else{
			if(isset($_SESSION['nombre'])){
				echo "Has iniciado Sesion: ".$_SESSION['nombre'];
			}else{
				echo "Acceso Restringido";
			}
		}
	?>
		<br /><a href="index.php">Ir a pagina 1</a>
	</body>
</html>
