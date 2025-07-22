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
        <title>Recolectores</title>
    </head>
    <body>
    <?php
        if(isset($_SESSION["nombre"])){
            if ($_SESSION["admin"]) {
                $conex = conectar("campo_trufas");
                $consulta = "";
    ?>
                <?php
                if(isset($_GET["noEnviado"])){
                    if($_GET["noEnviado"] == "true") {
                ?>
                        <div id="success">Recolector añadido. La contraseña por defecto es su nombre de ususario seguido de su DNI.</div>
                        <script src="../js/successMsgFadeout.js" type="text/javascript"></script> 
                <?php
                    }
                }
                
                if(isset($_GET["eliminado"])){
                    if($_GET["eliminado"] == "true") {
                ?>
                        <div id="success">Recolector eliminado con éxito, las recolectas asociadas a este recolector se mantendrán.</div>
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


                if(isset($_GET["added"])){
                    if($_GET["added"] == "true") {
                ?>
                        <div id="success">Se ha añadido un nuevo recolector, le habrá llegado un email con su nombre de usuario y contraseña.</div>
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
                        <a href="verZonas.php">Zonas</a>
                        <a href="verRecolectores.php" style="color: grey;">Recolectores</a>
                        <a href="verPerros.php">Perros</a>
                        <a href="verRecolectas.php">Todas las recolectas</a>
                    </nav>
                </div>

                <hr style="position: fixed; width: 100%; border: 1px solid; border-color: white; background-color: white; margin-top: 0px;">

                <div id="cuerpo">
                    <div id="update-card" class="card">
                            <div id="contenedor-cruz" onclick="ocultarCard()"><img id="cerrar" src="../imgs/menu_icons/cruz.png"></div>
                            <div id="add-card-content">
                                <h1 style="margin-bottom: 10px;">Nuevo recolector</h1>
                                <form action="addUser.php" method="POST">
                                    <input id="name" name="name" type="text" placeholder="Nombre" required>
                                    <input style="margin-top: 0px;" id="ape" name="ape" type="text" placeholder="Apellidos" required>
                                    <input id="dni" name="dni" type="text" placeholder="DNI" required>
                                    <input id="mail" name="mail" type="email" placeholder="Email" required>
                                    <input style="margin-top: 0px;" id="telf" name="telf" type="tel" placeholder="Teléfono" required>
                                    <input type="hidden" name="esAdmin" id="esAdmin" value="0">
                                    <div id="continuar">
                                        <img src="../imgs/menu_icons/continuar.png" alt="continue">
                                        <button onclick="ocultarCard()" id="hidden-button" type="submit"></button>
                                    </div>
                                </form>
                            </div>
                    </div>


                    <h1 style="margin-bottom: 0px">Recolectores</h1>
                    <input id="cuadroTexto" onkeyup="busqueda('recolectores');" type="text" placeholder="Buscar por nombre...">
                    <br>
                    <div class="contenedor-icono" onclick="mostrarCard('add')"><img id="add_icon" id="añadir" src="../imgs/menu_icons/masUsr.png" alt="añadir"></div>
                    <hr id="lineaInicial" style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin: 0px;'>

                    <div id="content">
                        <?php
                        $consulta = "SELECT * FROM usuarios WHERE esAdmin = '0' ORDER BY nombre, apellidos";

                        if($rs=mysqli_query($conex,$consulta)){
                            while ($recolectores=mysqli_fetch_assoc($rs)){
                                echo "<div>";
                                echo "<div id='contenedor-delete'><a href='borrarUser.php?id=".$recolectores['id']."&esAdmin=0'><img id='delete_icon' id='añadir' src='../imgs/menu_icons/delete.png' alt='eliminar'></a></div>";
                                ?>
                                <img class="fotoPerf" alt="foto" src='../imgs/users/<?php if($recolectores["foto"] != ""){echo $recolectores["foto"];}else{echo ("no-user-img.png");}?>'>
                                <?php
                                echo "<h2 style='margin-top: 5px; margin-bottom: 15px;'>".$recolectores['nombre']." ".$recolectores['apellidos']."</h2>";
                                echo "<p>Nombre de usuario: <strong>".$recolectores['nombreUsr']."</strong></p>";
                                echo "<p style='margin: 2px;'>".$recolectores['DNI']."</p>";
                                echo "<p style='margin: 2px;'>".$recolectores['mail']."</p>";
                                echo "<p style='margin: 2px;'>".$recolectores['telefono']."</p>";

                                /////////////////////Sacando suma mensual///////////////////////
                                $consulta = "SELECT SUM(peso) AS suma FROM recolectas WHERE recolector = ".$recolectores['id']." AND MONTH(fecha) = ".date('m');

                                if($rs1=mysqli_query($conex,$consulta)) {
                                    $suma=mysqli_fetch_assoc($rs1);
                                    if ($suma["suma"] == "") {
                                        $suma["suma"] = 0;
                                    }
                                    echo "<p style='margin-bottom: 2px; margin-top: 20px;'>Recolectado este mes: ".$suma["suma"]."g</p>";
                                }


                                /////////////////////Sacando suma anual///////////////////////
                                $consulta = "SELECT SUM(peso) AS suma FROM recolectas WHERE recolector = ".$recolectores['id']." AND YEAR(fecha) = ".date('Y');

                                if($rs1=mysqli_query($conex,$consulta)) {
                                    $suma=mysqli_fetch_assoc($rs1);
                                    if ($suma["suma"] == "") {
                                        $suma["suma"] = 0;
                                    }
                                    echo "<p style='margin-top: 2px;'>Recolectado este año: ".$suma["suma"]."g</p>";
                                }

                                echo "<a id='botonTablaRecolector".$recolectores['id']."' onclick=mostrarOcultarTabla('Recolector',".$recolectores['id'].") class='rainbow-button' alt='Ver recolectas'></a>";

                                echo "<div id='recolectasRecolector".$recolectores['id']."' style='display: none;'>";
                                    echo "<h3 style='margin-bottom:10px;'>Recolectas:</h3>";

                                    $consulta = "SELECT recolector, perro, zona, fecha, peso FROM recolectas WHERE recolector = ".$recolectores['id']." ORDER BY fecha DESC";

                                    if($rs2=mysqli_query($conex,$consulta)) {
                                        if(mysqli_num_rows($rs2) != 0) {
                                            ?>
                                            <div>
                                                Ordenar por
                                                <select style="margin-top:0px; margin-bottom:30px;" onchange="reordenar('recolectores',<?php echo $recolectores['id']?>)" name="orderBy<?php echo $recolectores['id']?>" id="orderBy<?php echo $recolectores['id']?>" required>
                                                    <option selected value="fecha DESC">fecha</option>
                                                    <option value="peso DESC">peso</option>
                                                    <option value="perro">perro</option>
                                                    <option value="zona">zona</option>
                                                </select>
                                            </div>
                                            <?php

                                            echo "<div id='modify-table".$recolectores["id"]."'>";
                                            echo "<table class='tabla'>";
                                                echo "<tr>";
                                                    echo "<th>Fecha</th>";
                                                    echo "<th>Peso</th>";
                                                    echo "<th>Perro</th>";
                                                    echo "<th>Zona</th>";
                                            while ($recolectas=mysqli_fetch_assoc($rs2)) {
                                                $recolectas['fecha'] = date("d/m/Y", strtotime($recolectas['fecha']));
                                                echo "<tr class='filaTabla''>";
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
                                                $consulta = "SELECT nombre FROM zonas WHERE id = ".$recolectas['zona'];
                                                if ($rs3=mysqli_query($conex,$consulta)) {
                                                    if(mysqli_num_rows($rs3) != 0) {
                                                        while ($zonas=mysqli_fetch_assoc($rs3)) {
                                                            echo $zonas["nombre"];
                                                        }
                                                    } else {
                                                        echo "Desconocida";
                                                    }
                                                }
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                                echo "</tr>";
                                            echo "</table>";
                                            echo "</div>";
                                        } else {
                                            echo "Aún no hay recolectas";
                                        }
                                        echo "</div>";
                                    }

                                echo "<hr style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin-bottom: 0px; margin-top: 35px;'>";
                                echo "</div>";
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