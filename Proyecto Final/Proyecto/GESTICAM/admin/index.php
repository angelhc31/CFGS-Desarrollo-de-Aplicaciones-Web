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
        <title>Mapa</title>
    </head>
    <body style="overflow: auto;">
    <?php
        if(isset($_SESSION["nombre"])){
            if ($_SESSION["admin"]) {
                $conex = conectar("campo_trufas");
                if(isset($_GET["encargado"])){
                    if($_GET["encargado"] == "true") {
                ?>
                        <div id="success">Encargo asignado. Le habrá llegado un email al recolector dándole las indicaciones pertinentes.</div>
                        <script src="../js/successMsgFadeout.js" type="text/javascript"></script> 
                <?php
                    }
                }
                if(isset($_GET["noEnviado"])){
                    if($_GET["noEnviado"] == "true") {
                ?>
                        <div id="error">No ha sido posible enviar el mensaje.</div>
                        <script src="../js/errorMsgFadeout.js" type="text/javascript"></script> 
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
                        <a href="index.php" style="color: grey;">Mapa</a>
                        <a href="verAdmins.php">Administradores</a>
                        <a href="verZonas.php">Zonas</a>
                        <a href="verRecolectores.php">Recolectores</a>
                        <a href="verPerros.php">Perros</a>
                        <a href="verRecolectas.php">Todas las recolectas</a>
                    </nav>
                </div>

                <hr style="position: fixed; width: 100%; border: 1px solid; border-color: white; background-color: white; margin-top: 0px; z-index: 40;">

                <div>
                    <div id="update-card" class="card">
                        <div id="contenedor-cruz" onclick="ocultarCard(false)"><img id="cerrar" src="../imgs/menu_icons/cruz.png"></div>
                        <h1 style="margin-bottom: 20px;">Enviar recolector</h1>
                        <form action="enviarRecolector.php" method="POST">
                            <p style="margin-bottom: 0px;">Enviar a</p>
                            <select style="margin: 2px;" name="recolector" id="recolectorEnviar" required>
                                <option id="recolectorPlaceholder" hidden value="">Recolector</option>
                                <?php
                                    $consulta = "SELECT mail, nombre, apellidos FROM usuarios WHERE esAdmin=0 ORDER BY nombre, apellidos";
                                    if($rs = mysqli_query($conex, $consulta)){
                                        while ($vec = mysqli_fetch_array($rs)){
                                ?>
                                            <option class="opcionRecolector" value='<?php echo$vec["mail"]?>'><?php echo$vec["nombre"]." ".$vec["apellidos"]?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                            <p style="margin: 0px;">a la zona</p>
                            <select style="margin: 2px;" name="zona" id="ZonaEnviar" required>
                                <option id="zonaPlaceholder" hidden value="">Zona</option>
                                <?php
                                    $consulta = "SELECT nombre FROM zonas ORDER BY nombre";
                                    if($rs = mysqli_query($conex, $consulta)){
                                        while ($vec = mysqli_fetch_array($rs)){
                                ?>
                                            <option class="opcionZona" value='<?php echo$vec["nombre"]?>'><?php echo$vec["nombre"]?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                            <p style="margin: 0px;">con el perro</p>
                            <select style="margin: 2px;" name="perro" id="perroEnviar">
                                <option id="perroCualquiera" value="">-</option>
                                <?php
                                    $consulta = "SELECT nombre FROM perros ORDER BY nombre";
                                    if($rs = mysqli_query($conex, $consulta)){
                                        while ($vec = mysqli_fetch_array($rs)){
                                ?>
                                            <option class="opcionPerro" value='<?php echo$vec["nombre"]?>'><?php echo$vec["nombre"]?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                            <p style="margin: 0px;">a las</p>
                            <input style="margin: 2px; margin-bottom: 10px;" type="time" name="hora" id="hora">
                            <div onclick="ocultarCard(true)" id="continuar">
                                <img src="../imgs/menu_icons/continuar.png" alt="continue">
                                <button id="hidden-button" type="submit"></button>
                            </div>
                        </form>
                    </div>

                    <div id="mapaInteractivo" style="position: relative; cursor: crosshair;">
                    <a onclick="mostrarCard()" id="botonEnviarRecolector" class='rainbow-button' alt='Enviar recolector'></a>
                        <img id="mapa" src="../imgs/campoTrufas.jpg" alt="mapa">
                        <?php
                        $consulta = "SELECT * FROM zonas ORDER BY nombre";

                        if($rs=mysqli_query($conex,$consulta)){
                            while ($zonas=mysqli_fetch_assoc($rs)){
                                $zona = "";
                                $color = "";
                                if ($zonas["id"] == 1) {
                                    $zona = "zonaA";
                                } elseif ($zonas["id"] == 2) {
                                    $zona = "zonaB";
                                } elseif ($zonas["id"] == 3) {
                                    $zona = "zonaC";
                                } elseif ($zonas["id"] == 4) {
                                    $zona = "zonaD";
                                } elseif ($zonas["id"] == 5) {
                                    $zona = "zonaE";
                                } elseif ($zonas["id"] == 6) {
                                    $zona = "zonaF";
                                } elseif ($zonas["id"] == 7) {
                                    $zona = "zonaG";
                                } elseif ($zonas["id"] == 8) {
                                    $zona = "zonaH";
                                }

                                if ($zona != "") {
                                    if ($zonas['ultRecolecta'] != "0000-00-00") {
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
                                    } else {
                                        $color = "red";
                                    }
                                    if ($zonas["id"] == 8) {
                                        echo "<div title='".$zonas["nombre"]."' id='$zona' style='background-color: $color;' class='zona'>";
                                        echo "<div class='contenidoZona' id='contenidoZona".$zonas["id"]."'>";
                                            echo "<h2>".$zonas["nombre"]."</h2>";
                                            echo "<p>"."Última recolecta: ".$zonas['ultRecolecta']."</p>";
                                        echo "</div>";
                                        echo "</div>";
                                    } else {
                                        echo "<div title='".$zonas["nombre"]."' id='$zona' style='background-color: $color;' class='zona'>";
                                        echo "<div class='contenidoZona' id='contenidoZona".$zonas["id"]."'>";
                                            echo "<h2>".$zonas["nombre"]."</h2>";
                                            echo "<p>"."Última recolecta: <br>".$zonas['ultRecolecta']."</p>";
                                        echo "</div>";
                                        echo "</div>";
                                    }
                                }
                            ?>
                        <?php
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