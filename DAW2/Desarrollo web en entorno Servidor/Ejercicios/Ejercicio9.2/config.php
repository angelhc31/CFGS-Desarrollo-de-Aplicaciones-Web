<?php
	session_start();
    include("funciones.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"/>
		<title>Configuración</title>
	</head>

	<body>
		<?php
			if (sesionCorrect()) {
        ?>
        <style>
            body {
                text-align: <?php echo $_COOKIE[$_SESSION["nombre"]."_align"]?>;
                color: <?php echo $_COOKIE[$_SESSION["nombre"]."_color"]?>;
                font-size: <?php echo $_COOKIE[$_SESSION["nombre"]."_tamano"]?>px;
                background-color: <?php echo $_COOKIE[$_SESSION["nombre"]."_backColor"]?>;
                <?php
                    if ($_COOKIE[$_SESSION["nombre"]."_marg"] == "si") {
                        echo "margin: 100px";
                    }
                ?>
            } 
        </style>
        <a href="cerrarSesion.php"><button>Cerrar sesión</button></a>
        <form action="generarCookies.php" method="POST">
            <p><strong>Alineación del texto: </strong>
                <input type="radio" name="align" value="left"> Izquierda
                <input type="radio" name="align" value="center"> Centro
                <input type="radio" name="align" value="right"> Derecha
            </p>
            <p><strong>Color de la letra: </strong>
                <select name="color">
                    <option value="blue">Azul</option>
                    <option value="grey">Gris</option>
                    <option value="red">Rojo</option>
                    <option value="yellow">Amarillo</option>
                    <option value="pink">Rosa</option>
                    <option value="orange">Naranja</option>
                    <option value="green">Verde</option>
                </select>
            </p>
            <p><strong>Tamaño de letra: </strong>
                <input type="range" name="tamano" min="10" max="60" step="1">
            </p>
            <p>
                <input type="checkbox" name="marg" value="si"><strong>Margenes</strong>
            </p>
            <p><strong>Color de fondo: </strong>
                <input type="color" name="backColor" value="#FFFFFF">
            </p>
            <input type="submit" value="Siguiente">
            <input type="reset" value="Borrar">
        </form>
        <?php        
            } else {
                echo "<p>Usuario o contraseña incorrecto</p>";
				echo "<a href='index.php'>Volver al login</a>";
            }            
		?>
		
	</body>

</html>
