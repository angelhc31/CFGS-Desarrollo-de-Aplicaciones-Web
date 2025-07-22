<?php
	session_start();
	setcookie(session_name(), '', time() - 1, '/');  // aparte de destruir la sesiión borro la cookie con su id
	session_destroy();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Pagina 3</title>
	</head>
<body>
	<p>Has Cerrado Sesion</p>
	<br /><a href="index.php">Ir a pagina 1</a>
</body>
</html>
