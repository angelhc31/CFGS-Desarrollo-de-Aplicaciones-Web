<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>Login</title>
</head>

<body>
	<form action="config.php" method="POST">
		<input type="text"name="nombre" placeholder="Nombre..." required/><br>
		<br>
        <input type="text"name="paswd" placeholder="Contraseña..." required/><br>
        <br>
		<input type="submit" value="Siguiente">
        <input type="reset" value="Borrar">
	</form>
	</body>
</html>