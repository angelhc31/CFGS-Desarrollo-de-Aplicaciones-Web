<?php
    include("funciones.php");
    cabecera();
    function verTabla($conex) {
        echo "<h2>Familias de productos</h2>";
        $ver="select ccodigo, cnombre, mobservaciones from familias";
        if($rs=mysqli_query($conex,$ver)){
            echo " <table border='1'>";
                echo "<tbody>";
                echo "<tr>";
                echo "<td> CODIGO </td>";
                echo "<td> NOMBRE </td>";
                echo "<td> OBSERVACIONES </td>";
                echo "<td colspan='2'> <a href='modificar_familias.php?action=1'>NUEVO</a> </td>";
                echo "</tr>";
                while ($vec=mysqli_fetch_assoc($rs)) 
                {
                    echo "<tr>";		
                    echo "<td> {$vec['ccodigo']} </td>";
                    echo "<td> {$vec['cnombre']} </td>";
                    echo "<td> {$vec['mobservaciones']} </td>";
                    echo "<td> <a href='modificar_familias.php?action=3&familia={$vec['ccodigo']}'>M</a> </td>";
                    echo "<td> <a href='modificar_familias.php?action=5&familia={$vec['ccodigo']}'>X</a></td>";
                    echo "</tr>";	
                }
                echo "</tbody>";
            echo "</table>";
            echo "<a href='index.php'><button>Volver</button></a>";
        }
    }

    if (isset($_GET["action"]) && $_GET["action"] == 1) {
?>

        <form action="modificar_familias.php" method="post" style="text-align:left">
            <b>Código:</b> <input type="text" name="codigo" style="width:50px" required>
            <br>
            <br>
            <b>Nombre:</b> <input type="text" name="nombre" style="width:200px"><br>
            <br>
            <br>
            <b>Observaciones:</b> <textarea name="observaciones" cols="30" rows="10"></textarea>
            <br>
            <br>
            <input type="submit" value="Guardar" name="guardar">
            <a href="index.php"><input type="button" value="Cancelar"></a>
        </form>

<?php
    }
    if (isset($_POST["guardar"])) {
        $conex = conectar("ferreteria");
        $codigoFamilia = $_POST["codigo"];
        $codeFamiliaCambio = $_POST["nombre"];
        if ($codeFamiliaCambio == "") {
            $codeFamiliaCambio = NULL;
        }
        $review = $_POST["observaciones"];
        if ($review == "") {
            $review = NULL;
        }
        if ($conex) {
            $consulta = "select ccodigo from familias";
            $fam = array();
            $cont = 0;
            if ($rs = mysqli_query($conex, $consulta)) {
                while ($vec = mysqli_fetch_array($rs)) {
                    $fam[$cont] = $vec['ccodigo'];
                    $cont++;
                }
                if (in_array($codigoFamilia, $fam)) {
                    error("Familia existente");
                } else {
                    $insert = "insert into familias (ccodigo, cnombre, mobservaciones) values ('$codigoFamilia', '$codeFamiliaCambio', '$review')";
                    if (mysqli_query($conex, $insert)) {
                        verTabla($conex);
                        mensaje("Aceptado",'0');
                    } else {
                        mensaje("Fallo sql",'1');
                    }
                }
            } else {
                mensaje("No se pudo conectar",'1');
            }
            mysqli_close($conex);
        }
    }



    if (isset($_GET["action"]) && $_GET["action"] == 3) {
        $codigoCambio = $_GET["familia"];
        
        if ($codigoCambio == "") {
            error("Introduce un código de familia");
        }

        $conex = conectar("ferreteria");

        if ($conex) {
            $consulta = "select ccodigo from familias";

            $nombreValue="select cnombre from familias where ccodigo = '$codigoCambio'";
            if ($rNombre=mysqli_query($conex, $nombreValue)) {
                $fila=mysqli_fetch_array($rNombre);
            }

            $observValue="select mobservaciones from familias where ccodigo='$codigoCambio'";
            if ($rObserv=mysqli_query($conex, $observValue)) {
                $filaObserv=mysqli_fetch_array($rObserv);
            }


            $fam = array();
            $cont = 0;
            if ($rs = mysqli_query($conex, $consulta)) {
                while ($vec = mysqli_fetch_array($rs)) {
                    $fam[$cont] = $vec['ccodigo'];
                    $cont++;
                }

                if (in_array($codigoCambio, $fam)) {
?>
                    <h2>MODIFICAR FAMILIA</h2>
                    <form action="modificar_familias.php" method="post" style="text-align:left">
                        <?php
                        echo "<b>Código:</b> <input type='text' name='codigo'  style='width:50px; background-color: gray; color: white' value= $codigoCambio  readonly>"
                        ?>
                        <br><br>
                        <?php
                        echo "<b>Nombre:</b> <input type='text' value='$fila[cnombre]' name='nombreM' style='width:200px'><br>";
                        ?>
                        <br><br>
                        <?php
                        echo "<b>Observaciones:</b> <textarea name='observacionesM' cols='30' rows='10'>$filaObserv[mobservaciones]</textarea>"
                        ?>
                        <br><br>
                        <input type="submit" value="Guardar" name="guardar2" id="guardar2" class="guardar2">
                        <a href="index.php"><input type="button" value="Cancelar"></a>
                    </form>
<?php
                } else {
                    error("No se encontró esa familia");
                }
            } else {
                mensaje("No se pudo conectar",'1');
            }
            mysqli_close($conex);
        }
    }



    if (isset($_POST["guardar2"])) {
        $conex = conectar("ferreteria");
        $mod = $_POST["codigo"];
        $codeFamiliaCambio = $_POST["nombreM"];
        $review = $_POST["observacionesM"];
        $update = "update familias set cnombre = '$codeFamiliaCambio', mobservaciones = '$review' where ccodigo = '$mod'";
        if (mysqli_query($conex, $update)) {
            verTabla($conex);
            mensaje("Aceptado",'0');
        } else {
            mensaje("Fallo sql",'1');
        }
    }



    if (isset($_GET["action"]) && $_GET["action"] == 5) {
        $codDelete = $_GET["familia"];
        if ($codDelete == "") {
            error("Introduce un códifo de familia");
        }
        $conex = conectar("ferreteria");

        if ($conex) {
            $consulta = "select ccodigo from familias";
            $fam = array();
            $cont = 0;
            if ($rs = mysqli_query($conex, $consulta)) {
                while ($vec = mysqli_fetch_array($rs)) {
                    $fam[$cont] = $vec['ccodigo'];
                    $cont++;
                }
                if (in_array($codDelete, $fam)) {
                    $delete = "delete from familias where ccodigo = '$codDelete'";
                    if (mysqli_query($conex, $delete)) {
                        verTabla($conex);
                        mensaje("Eliminado",'0');

                    } else {
                        mensaje("Fallo sql",'1');
                    }
                } else {
                    error("Familia inexistente");
                }
            } else {
                mensaje("No se pudo conectar",'1');
            }
            mysqli_close($conex);
        }
    }
pie();
?>