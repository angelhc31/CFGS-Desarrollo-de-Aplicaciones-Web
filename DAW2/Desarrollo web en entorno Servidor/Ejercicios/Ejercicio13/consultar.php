<?php
    include("db.php");
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Consultar</title>
        <style>
            th, td {
                border: 2px solid black;
            }
        </style>
    </head>

    <body>
        <?php
            if(isset($_SESSION['nombre'])){
                echo "Usuario: ".$_SESSION["nombre"]." <a href=cerrarSesion.php>cerrar sesion</a><br><br>";

                $conex = conectar("ferreteria");
                $consulta = "SELECT ncodigo, ccif, cnombre, capellidos, cdireccion FROM clientes";

                if($rs=mysqli_query($conex,$consulta)){
                    echo " <table style='border-collapse: collapse;'>";
                        echo "<tbody>";
                    while ($vec=mysqli_fetch_assoc($rs)){
                        echo "<tr>";		
                        echo "<td>{$vec['ncodigo']}</td>";
                        echo "<td>{$vec['ccif']}</td>";
                        echo "<td>{$vec['cnombre']}</td>";
                        echo "<td>{$vec['capellidos']}</td>";
                        echo "<td>{$vec['cdireccion']}</td>";
                        echo "</tr>";
                    }
                        echo "</tbody>";
                    echo "</table>";
                    echo "<a href='index.php'>Volver</a>";
                }
                desconectar($conex);
            }else{
                header('Location: index.php');
            }
        ?>
    </body>
</html>