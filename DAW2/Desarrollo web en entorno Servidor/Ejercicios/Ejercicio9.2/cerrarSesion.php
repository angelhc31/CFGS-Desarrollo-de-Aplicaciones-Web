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
        <p>Si quieres volver a iniciar sesión pulsa <a href="index.php">aqui.</a></p>
    </body>
</html>