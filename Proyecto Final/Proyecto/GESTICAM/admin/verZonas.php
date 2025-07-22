<?php
    include("../util/db.php");
	session_start();
?>
<!DOCTYPE html>
<html lang=es>
    <head>
        <link href="../css/msg-style.css" rel="stylesheet" type="text/css">
        <link href="../css/adminMain-style.css" rel="stylesheet" type="text/css">
        <link href="../css/menu.scss" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <title>Zonas</title>
    </head>
    <body>
    <?php
        if(isset($_SESSION["nombre"])){
            if ($_SESSION["admin"]) {
                $conex = conectar("campo_trufas");

                if(isset($_GET["added"])){
                    if($_GET["added"] == "true") {
                ?>
                        <div id="success">Zona añadida con éxito.</div>
                        <script src="../js/successMsgFadeout.js" type="text/javascript"></script> 
                <?php
                    }
                }

                if(isset($_GET["error"])){
                    if($_GET["error"] == "true") {
                        ?> 
                        <div id="error">Ha ocurrido un error. Vuelve a intentarlo.</div>
                        <script src="../js/errorMsgFadeout.js" type="text/javascript"></script> 
                        <?php 
                    }
                }

                if(isset($_GET["edited"])){
                    if($_GET["edited"] == "true") {
                ?>
                        <div id="success">Datos modificados con éxito.</div>
                        <script src="../js/successMsgFadeout.js" type="text/javascript"></script> 
                <?php
                    }
                }

                if(isset($_GET["eliminado"])){
                    if($_GET["eliminado"] == "true") {
                ?>
                        <div id="success">Zona eliminada con éxito, las recolectas asociadas a esta zona se mantendrán.</div>
                        <script src="../js/successMsgFadeout.js" type="text/javascript"></script> 
                <?php
                    }
                }
                ?>

                <div id="bkgr"></div>
                <div id="header">
                    <img id="avatar" src='../imgs/users/<?php if($_SESSION["foto"] != NULL){echo $_SESSION["foto"];}else{echo ("no-user-img.png");}?>'>
                    <button id="clickAvatar"></button>
                    <div id="options-card" style="display: none;">
                        <a href="../util/perfil.php">
                            <div class="op">
                                <img src="../imgs/menu_icons/perfil.jpg" alt="cerrarSesion">
                                <p>Perfil</p>
                            </div>
                        </a>
                        <a href="../util/cerrarSesion.php">
                            <div class="op">
                                <img src="../imgs/menu_icons/cerrarSesion.jpg" alt="cerrarSesion">
                                <p>Cerrar sesión</p>
                            </div>
                        </a>
                    </div>
                    <nav>
                        <a href="index.php">Mapa</a>
                        <a href="verAdmins.php">Administradores</a>
                        <a href="verZonas.php" style="color: grey;">Zonas</a>
                        <a href="verRecolectores.php">Recolectores</a>
                        <a href="verPerros.php">Perros</a>
                        <a href="verRecolectas.php">Todas las recolectas</a>
                    </nav>
                </div>

                <hr style="position: fixed; width: 100%; border: 1px solid; border-color: white; background-color: white; margin-top: 0px;">

                <div id="cuerpo">
                    <div id="update-card" class="card">
                        <div id="contenedor-cruz" onclick="ocultarCard(false)"><img id="cerrar" src="../imgs/menu_icons/cruz.png"></div>
                        <div id="add-card-content">
                            <h1 style="margin-bottom: 10px;">Nueva zona</h1>
                            <form action="addZona.php" method="POST">
                                <input id="name" name="name" type="text" placeholder="Nombre" required>
                                <input style="margin-top: 0px;" id="area" name="area" type="number" placeholder="Area (m²)" min="0" step="0.1"  required>
                                <div id="continuar">
                                    <img src="../imgs/menu_icons/continuar.png" alt="continue">
                                    <button id="hidden-button" type="submit"></button>
                                </div>
                            </form>
                        </div>
                        <div id="edit-card-content">
                            <h1 id="tituloZona" style="margin-bottom: 10px;"></h1>
                            <form action="editZona.php" method="POST">
                                <input id="nameZona" name="nameZona" type="text" placeholder="Nombre">
                                <input style="margin-top: 0px;" id="areaZona" name="areaZona" type="number" placeholder="Area (m²)" min="0" step="0.1">
                                <input name="nombreActual" id="nombreActual" type="hidden" value="">
                                <input name="areaActual" id="areaActual" type="hidden" value="">
                                <input name="idZona" id="idZona" type="hidden" value="">
                                <div id="continuar">
                                    <img src="../imgs/menu_icons/continuar.png" alt="continue">
                                    <button id="hidden-button" type="submit"></button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <h1 style="margin-bottom: 0px">Zonas</h1>
                    <input id="cuadroTexto" onkeyup="busqueda('zonas');" type="text" placeholder="Buscar por nombre...">
                    <br>
                    <div class="contenedor-icono-cruz" onclick="mostrarCard('add')"><img style="width: 35px; height: 35px;" id="addCruz_icon" id="añadir" src="../imgs/menu_icons/add.png" alt="añadir"></div>
                    <hr id="lineaInicial" style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin: 0px;'>

                    <div id="content">
                        <?php
                        $consulta = "SELECT * FROM zonas ORDER BY nombre";

                        if($rs=mysqli_query($conex,$consulta)){
                            while ($zonas=mysqli_fetch_assoc($rs)){
                                echo "<div>";
                                ?>
                                <div class='contenedor-icono-edit' onclick="mostrarCard('editZona',<?php echo $zonas['id']?>,'<?php echo $zonas['nombre']?>',<?php echo $zonas['area']?>)"><img style='width: 32px; height: 32px;' id='edit_icon' id='añadir' src='../imgs/menu_icons/edit.png' alt='editar'></div>
                                <?php
                                if ($zonas['id']>8) {
                                    echo "<div id='contenedor-delete'><a href='borrarZona.php?id=".$zonas['id']."'><img id='delete_icon' id='añadir' src='../imgs/menu_icons/delete.png' alt='eliminar'></a></div>";
                                } else {
                                    echo "<div style='border-radius: 50%; width: 40px; height: 40px; margin-top: 3px; margin-left: 3px; padding-right: 2px; padding-top: 2px;'></div>";
                                }
                                echo "<h2 style='margin-top: 0px; margin-bottom: 0px;'>".$zonas['nombre']."</h2>";
                                echo "<p style='margin-top: 0px;'>(".$zonas['area']." m²".")</p>";
                                
                                /////////////Sacando color de la zona y comprobando/////////////////
                                if ($zonas['ultRecolecta'] != "0000-00-00") {
                                    $color = "";
                                    $diasPasados = (strtotime($zonas['ultRecolecta'])-strtotime(date('Y-m-d')))/86400;
                                    $diasPasados = abs($diasPasados);
                                    $diasPasados = floor($diasPasados);
                                    if ($diasPasados <= 3) {
                                        $color = "green";
                                    } elseif ($diasPasados > 3 && $diasPasados <=7) {
                                        $color = "yellow";
                                    } elseif ($diasPasados > 7) {
                                        $color = "red";
                                    }
                                    $zonas['ultRecolecta'] = date("d/m/Y", strtotime($zonas['ultRecolecta']));
                                    echo "<p style='color: ".$color.";'>"."Última recolecta: ".$zonas['ultRecolecta']."</p>";
                                }

                                /////////////////////Sacando suma mensual///////////////////////
                                $consulta = "SELECT SUM(peso) AS suma FROM recolectas WHERE zona = ".$zonas['id']." AND MONTH(fecha) = ".date('m');

                                if($rs1=mysqli_query($conex,$consulta)) {
                                    $suma=mysqli_fetch_assoc($rs1);
                                    if ($suma["suma"] == "") {
                                        $suma["suma"] = 0;
                                    }
                                    echo "<p>Recolectado este mes: ".$suma["suma"]."g</p>";
                                }


                                /////////////////////Sacando suma anual///////////////////////
                                $consulta = "SELECT SUM(peso) AS suma FROM recolectas WHERE zona = ".$zonas['id']." AND YEAR(fecha) = ".date('Y');

                                if($rs1=mysqli_query($conex,$consulta)) {
                                    $suma=mysqli_fetch_assoc($rs1);
                                    if ($suma["suma"] == "") {
                                        $suma["suma"] = 0;
                                    }
                                    echo "<p>Recolectado este año: ".$suma["suma"]."g</p>";
                                }

                                echo "<a id='botonTablaZona".$zonas['id']."' onclick=mostrarOcultarTabla('Zona',".$zonas['id'].") class='rainbow-button' alt='Ver recolectas'></a>";

                                echo "<div id='recolectasZona".$zonas['id']."' style='display: none;'>";
                                    echo "<h3 style='margin-bottom:10px;'>Recolectas:</h3>";

                                    $consulta = "SELECT recolector, perro, zona, fecha, peso FROM recolectas WHERE zona = ".$zonas['id']." ORDER BY fecha DESC";

                                    if($rs2=mysqli_query($conex,$consulta)) {
                                        if(mysqli_num_rows($rs2) != 0) {
                                            ?>
                                            <div>
                                                Ordenar por
                                                <select style="margin-top:0px; margin-bottom:30px;" onchange="reordenar('zonas',<?php echo $zonas['id']?>)" name="orderBy<?php echo $zonas['id']?>" id="orderBy<?php echo $zonas['id']?>" required>
                                                    <option selected value="fecha DESC">fecha</option>
                                                    <option value="peso DESC">peso</option>
                                                    <option value="perro">perro</option>
                                                    <option value="recolector">recolector</option>
                                                </select>
                                            </div>
                                            <?php

                                            echo "<div id='modify-table".$zonas["id"]."'>";
                                            echo "<table class='tabla'>";
                                                echo "<tr>";
                                                    echo "<th>Fecha</th>";
                                                    echo "<th>Peso</th>";
                                                    echo "<th>Perro</th>";
                                                    echo "<th>Recolector</th>";
                                                echo "</tr>";
                                            while ($recolectas=mysqli_fetch_assoc($rs2)) {
                                                $recolectas['fecha'] = date("d/m/Y", strtotime($recolectas['fecha']));
                                                echo "<tr class='filaTabla'>";
                                                echo "<td>".$recolectas['fecha']."</td>";
                                                echo "<td>".$recolectas['peso']."g</td>";

                                                echo "<td>";
                                                $consulta = "SELECT nombre, foto FROM perros WHERE id = ".$recolectas['perro'];
                                                if ($rs3=mysqli_query($conex,$consulta)) {
                                                    if(mysqli_num_rows($rs3) != 0) {
                                                        while ($perros=mysqli_fetch_assoc($rs3)) {
                                                            ?>
                                                            <img class="fotoTabla" alt="fotoPerro" src='../imgs/perros/<?php if($perros["foto"] != ""){echo $perros["foto"];}else{echo ("no-dog-img.jpg");}?>'>
                                                            <?php
                                                            echo $perros["nombre"];
                                                        }
                                                    } else {
                                                        echo "Desconocido";
                                                    }
                                                }
                                                echo "</td>";

                                                echo "<td>";
                                                $consulta = "SELECT nombre, apellidos, foto FROM usuarios WHERE id = ".$recolectas['recolector'];
                                                if ($rs3=mysqli_query($conex,$consulta)) {
                                                    if(mysqli_num_rows($rs3) != 0) {
                                                        while ($recolectores=mysqli_fetch_assoc($rs3)) {
                                                            ?>
                                                            <img class="fotoTabla" alt="fotoUsr" src='../imgs/users/<?php if($recolectores["foto"] != ""){echo $recolectores["foto"];}else{echo ("no-user-img.png");}?>'>
                                                            <?php
                                                            echo $recolectores["nombre"]." ".$recolectores["apellidos"];
                                                        }
                                                    } else {
                                                        echo "Desconocido";
                                                    }
                                                }
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                            echo "</table>";
                                            echo "</div>";
                                        } else {
                                            echo "Aún no hay recolectas";
                                        }
                                        echo "</div>";
                                    }
                                echo "</div>";
                                echo "<hr style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin-bottom: 0px; margin-top: 35px;'>";
                            }
                        }
                        ?>
                    </div>
                </div>

                <script src="../js/mostrarAccionesUsr.js"></script>
                <script src="../js/funcionesAdmin.js"></script>
    <?php
                desconectar($conex);
            }else{header("Location: ../index.php");}
        }else{header("Location: ../index.php");}
    ?>
    </body>
</html>