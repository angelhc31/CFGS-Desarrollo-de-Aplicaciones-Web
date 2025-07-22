<?php
    include("conexion.php");
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
            $conectar = new conexion();
            $conex = $conectar->getConector();
            $sql = "SELECT ccif, cnombre, capellidos, cdireccion FROM clientes";
            if ($conex) {
                $stmt = $conex->prepare($sql);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);

                if($stmt->execute()){
                    echo " <table style='border-collapse: collapse;'>";
                        echo "<tbody>";
                    while ($vec=$stmt->fetch()){
                        echo "<tr>";		
                        echo "<td>{$vec['ccif']}</td>";
                        echo "<td>{$vec['cnombre']}</td>";
                        echo "<td>{$vec['capellidos']}</td>";
                        echo "<td>{$vec['cdireccion']}</td>";
                        echo "</tr>";
                    }
                        echo "</tbody>";
                    echo "</table>";
                }
            }
            $conectar->cerrar();
        ?>
    </body>
</html>