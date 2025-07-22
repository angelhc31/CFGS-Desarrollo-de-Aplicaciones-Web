<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Insertar</title>
    </head>

    <body>
        <?php
            if(isset($_SESSION['nombre'])){
                if($_SESSION["tipo"] == 1){
                    echo "Usuario: ".$_SESSION["nombre"]." <a href=cerrarSesion.php>cerrar sesion</a><br><br>";
                    echo "<a href='index.php'>Volver</a>"
        ?>
                    <div style="margin: 0px auto; text-align: center;">
                        <h1 style="text-align: center;">Insertar Cliente</h1>
                        <form action="darAltaCli.php" method="POST">
                            <input type="number" name="code" placeholder="Código..."><br>
                            <br>
                            <input type="text" name="cif" placeholder="CIF..."><br>
                            <br>
                            <input type="text" name="name" placeholder="Nombre..."><br>
                            <br>
                            <input type="text" name="apes" placeholder="Apellidos..."><br>
                            <br>
                            <input type="number" name="telf" placeholder="Teléfono..."><br>
                            <br>
                            <input type="text" name="direc" placeholder="Dirección..."><br>
                            <br>
                            <input type="submit" value="Guardar">
                        </form>
                    </div>
        <?php 
                }else {
                    header('Location: index.php');
                }
            }else{
                header('Location: index.php');
            }
        ?>
    </body>
</html>