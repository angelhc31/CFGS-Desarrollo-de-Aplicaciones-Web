<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Inicio</title>
    </head>

    <body>
        <?php
            if(isset($_SESSION['nombre'])){
                echo "Usuario: ".$_SESSION["nombre"]." <a href=cerrarSesion.php>cerrar sesion</a><br><br>";
                echo "<a href='consultar.php'><button>Consultar</button></a>";
                if ($_SESSION["tipo"] == 1) {
                    echo " <a href='insertar.php'><button>Insertar</button></a>";
                    echo " <a href='borrar.php'><button>Borrar</button></a>";
                }
            }else{
        ?>
                <a href="darAltaUsr.php"><button>Añadir usuarios</button></a><br>
                <br>
                <form action="validar.php" method="POST">
                    <input type="text" name="usuario" placeholder="Usuario..."><br>
                    <br>
                    <input type="text" name="paswd" placeholder="Password..."><br>
                    <br>
                    <input type="submit" value="Validar">
                </form>
        <?php
            }
        ?>
    </body>
</html>