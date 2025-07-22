<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Página A</title>
	</head>
	<body>
		<?php
            if(isset($_SESSION['nombre'])){
                if ($_SESSION['nombre'] == "pepe") {
                    echo "<p>Hola ".$_SESSION['nombre']."</p>";
                    echo "<h1>Esto es PAG A</h1>";
                    echo "<p>Cosas que puedes hacer:</p>
                            <ul>
                                <li>Ir a sitio A</li>
                                <li><a href='paginaB.php'>Ir a sitio B</a></li>
                                <li><a href='paginaC.php'>Ir a sitio C</a></li>
                                <li><a href='cerrarSesion.php'>Cerrar sesión</a></li>
                            </ul>";
                } else {
                    echo "Usuario incorrecto";
                    echo "<a href='index.php'>Volver al login</a>";
                }
            } else {
                echo "<p>Por favor, inicia sesion <a href='index.php'>aqui</a> para acceder a la página.</p>";
            }
		?>
	</body>
</html>