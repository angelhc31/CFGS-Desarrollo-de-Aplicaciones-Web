<?php
	session_start();
	setcookie(session_name(), '', time() - 1, '/');
	session_destroy();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Cerrar Sesión</title>
	</head>
<body>
	<p>Has Cerrado Sesion</p>
	<br>
	<a href="index.php">Vuelve a hacer login a ver si quieres entrar</a>
</body>
</html>
