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
	<form action="acceso.php" method="POST">
		<p>Introduce tu nombre de usuario</p>
		Login <input type="text"name="nombre" required/><br>
		<br>
		<input type="submit" value="Submit"/>
	</form>
	</body>
</html>
