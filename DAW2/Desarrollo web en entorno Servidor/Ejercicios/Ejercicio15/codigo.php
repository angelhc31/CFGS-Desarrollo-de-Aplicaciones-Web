<?php
    include("db.php");

    if (isset($_POST["accion"])) {
        $accion = $_POST["accion"];
        $conex = conectar("ferreteria");
        $sql = "";
        $busqueda = "";

        if ($conex) {
            switch ($accion) {
                case 1:
                    $sql = "SELECT ccif, cnombre, capellidos, ctelefono FROM clientes";

                    if($rs=mysqli_query($conex,$sql)){
                        echo "<table align='center'>";
                            echo "<tbody>";
                            echo "<tr><th>CIF</th><th>NOMBRE</th><th>APELLIDOS</th><th>TELEFONO</th></tr>";
                        while ($vec=mysqli_fetch_assoc($rs)){
                            echo "<tr>";		
                            echo "<td>{$vec['ccif']}</td>";
                            echo "<td>{$vec['cnombre']}</td>";
                            echo "<td>{$vec['capellidos']}</td>";
                            echo "<td>{$vec['ctelefono']}</td>";
                            echo "</tr>";
                        }
                            echo "</tbody>";
                        echo "</table>";
                    }
                    break;

                case 2:
                    $sql = "SELECT ccodigo, cfamilia, cnombre, ncoste FROM articulos";

                    if($rs=mysqli_query($conex,$sql)){
                        echo "<table align='center'>";
                            echo "<tbody>";
                            echo "<tr><th>CODIGO</th><th>FAMILIA</th><th>NOMBRE</th><th>COSTE</th></tr>";
                        while ($vec=mysqli_fetch_assoc($rs)){
                            echo "<tr>";		
                            echo "<td>{$vec['ccodigo']}</td>";
                            echo "<td>{$vec['cfamilia']}</td>";
                            echo "<td>{$vec['cnombre']}</td>";
                            echo "<td>{$vec['ncoste']}</td>";
                            echo "</tr>";
                        }
                            echo "</tbody>";
                        echo "</table>";
                    }
                    break;
                
                case 3:
                    $sql = "SELECT ccodigo, cnombre FROM familias";

                    if($rs=mysqli_query($conex,$sql)){
                        echo "<table align='center'>";
                            echo "<tbody>";
                            echo "<tr><th>CODIGO<th>NOMBRE</th></tr>";
                        while ($vec=mysqli_fetch_assoc($rs)){
                            echo "<tr>";		
                            echo "<td>{$vec['ccodigo']}</td>";
                            echo "<td>{$vec['cnombre']}</td>";
                            echo "</tr>";
                        }
                            echo "</tbody>";
                        echo "</table>";
                    }
                    break;

                case 4:
                    $busqueda = $_POST["mi_busqueda"];
                    $sql = "SELECT ccif, cnombre, capellidos, ctelefono FROM clientes WHERE cnombre LIKE '$busqueda%'";

                    if($rs=mysqli_query($conex,$sql)){
                        echo "<table align='center'>";
                            echo "<tbody>";
                            echo "<tr><th>CIF</th><th>NOMBRE</th><th>APELLIDOS</th><th>TELEFONO</th></tr>";
                        while ($vec=mysqli_fetch_assoc($rs)){
                            echo "<tr>";		
                            echo "<td>{$vec['ccif']}</td>";
                            echo "<td>{$vec['cnombre']}</td>";
                            echo "<td>{$vec['capellidos']}</td>";
                            echo "<td>{$vec['ctelefono']}</td>";
                            echo "</tr>";
                        }
                            echo "</tbody>";
                        echo "</table>";
                    }
                    break;
            }
            desconectar($conex);
        }
    }
?>