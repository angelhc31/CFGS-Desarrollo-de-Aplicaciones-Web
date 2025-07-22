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
        <title>Perros</title>
    </head>
    <body>
    <?php
        if(isset($_SESSION["nombre"])){
            if ($_SESSION["admin"]) {
                $conex = conectar("campo_trufas");

                ?>
                <div style="display: none;" id="info">Selecciona una opción y presiona el botón para terminar.</div>
                <script src="../js/infoMsgFadeout.js" type="text/javascript"></script> 
                <?php

                if(isset($_GET["formatoIncorr"]) && $_GET["formatoIncorr"] == "true") {
                ?>
                    <div id="error">Solamente se aceptan imágenes .jpg o .png</div>
                    <script src="../js/errorMsgFadeout.js" type="text/javascript"></script> 
                <?php
                }

                if(isset($_GET["added"])){
                    if($_GET["added"] == "true") {
                ?>
                        <div id="success">Perro añadido con éxito.</div>
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
                        <div id="success">Perro eliminado con éxito, las recolectas asociadas a este perro se mantendrán.</div>
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
                        <a href="verRecolectores.php">Recolectores</a>
                        <a href="verPerros.php" style="color: grey;">Perros</a>
                        <a href="verRecolectas.php">Todas las recolectas</a>
                    </nav>
                </div>

                <hr style="position: fixed; width: 100%; border: 1px solid; border-color: white; background-color: white; margin-top: 0px;">

                <div id="cuerpo">
                    <div id="update-card" class="card">
                        <div id="contenedor-cruz" onclick="ocultarCard(false)"><img id="cerrar" src="../imgs/menu_icons/cruz.png"></div>
                        <div id="add-card-content">
                            <h1 style="margin-bottom: 10px;">Nuevo perro</h1>
                            <form action="addPerro.php" method="POST" enctype="multipart/form-data">
                                <input id="name" name="name" type="text" placeholder="Nombre" required>
                                <input style="margin-top: 0px;"  id="fech_nacimiento" name="fech_nacimiento" placeholder="Fecha de nacimiento" type="text" onfocus="(this.type='date')" required>
                                <div style="margin-top: 10px;" class="custom-input-file col-md-6 col-sm-6 col-xs-6">
                                    <input id="foto" name="foto" type="file" class="input-file">
                                    <div style="width: 75px; margin-left: 145px;">
                                        Foto
                                        <img style="width: 31px; float: right; vertical-align: center;" src="../imgs/menu_icons/cam.png" alt="edit">
                                    </div>
                                </div>
                                <div id="continuar">
                                    <img src="../imgs/menu_icons/continuar.png" alt="continue">
                                    <button id="hidden-button" type="submit"></button>
                                </div>
                            </form>
                        </div>
                        

                        <div id="edit-card-content">
                            <h1 id="tituloPerro" style="margin-bottom: 10px;"></h1>
                            <form action="editPerro.php" method="POST" enctype="multipart/form-data">

                                <input name="nombreActual" id="nombreActual" type="hidden" value="">
                                <input name="nacimiento_actual" id="nacimiento_actual" type="hidden" value="">
                                <input name="idPerro" id="idPerro" type="hidden" value="">
                                <input name="borrarFoto" id="borrarFoto" type="hidden" value="0">

                                <input id="namePerro" name="namePerro" type="text" placeholder="Nombre">
                                <input style="margin-top: 0px;" id="fech_nacimientoEdit" name="fech_nacimientoEdit" type="date">
                                <div id="falseButton" onclick="mostrarOcultarEditFoto(); mostrarInfo()" style="margin-top: 10px;" class="custom-input-file col-md-6 col-sm-6 col-xs-6">
                                    <div style="width: 75px; margin-left: 145px;">
                                        Foto
                                        <img style="width: 31px; float: right; vertical-align: center;" src="../imgs/menu_icons/cam.png" alt="edit">
                                    </div>
                                </div>
                                <div id="continuar">
                                    <img src="../imgs/menu_icons/continuar.png" alt="continue">
                                    <button id="hidden-button" type="submit"></button>
                                </div>
                                <div id="divEditFoto" class="card">
                                    <div class="flecha-up"></div>
                                    <div id="contenidoEditFoto">
                                        <img id="avatarPerroEdit" style="width: 130px; height: 130px;" class="fotoPerf" alt="fotoPerro" src=''>

                                        <div onclick="borrarFotoPerro(); mostrarOcultarEditFoto()" id="quitarFotoPerro" onclick="" class="custom-input-file col-md-6 col-sm-6 col-xs-6">
                                            <div style="width: 80px; margin-left: 145px;">
                                                Quitar 
                                                <img style="width: 25px; float: right" src="../imgs/menu_icons/delete.png" alt="delete">
                                            </div>
                                        </div>

                                        <div name="cambiarFotoPerro" id="cambiarFotoPerro" class="custom-input-file col-md-6 col-sm-6 col-xs-6" style="border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                                            <input onclick="mostrarOcultarEditFoto(1)" id="fotoPerroNueva" name="fotoPerroNueva" type="file" class="input-file">
                                            <div style="width: 100px; margin-left: 132px; margin">
                                                Cambiar
                                                <img style="width: 22px; float: right" src="../imgs/menu_icons/edit.png" alt="edit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <h1 style="margin-bottom: 0px">Perros</h1>
                    <input id="cuadroTexto" onkeyup="busqueda('perros');" type="text" placeholder="Buscar por nombre...">
                    <br>
                    <div class="contenedor-icono-cruz" onclick="mostrarCard('add')"><img style="width: 35px; height: 35px;" id="addCruz_icon" id="añadir" src="../imgs/menu_icons/add.png" alt="añadir"></div>
                    <hr id="lineaInicial" style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin: 0px;'>

                    <div id="content">
                        <?php
                        $consulta = "SELECT * FROM perros ORDER BY nombre";

                        if($rs=mysqli_query($conex,$consulta)){
                            while ($perros=mysqli_fetch_assoc($rs)){
                                echo "<div>";
                                ?>
                                <div class='contenedor-icono-edit' onclick="mostrarCard('editPerro',<?php echo $perros['id']?>,'<?php echo $perros['nombre']?>','<?php echo $perros['fech_nacimiento']?>','<?php echo $perros['foto']?>')"><img style='width: 32px; height: 32px;' id='edit_icon' id='añadir' src='../imgs/menu_icons/edit.png' alt='editar'></div>
                                <?php

                                echo "<div id='contenedor-delete'><a href='borrarPerro.php?id=".$perros['id']."'><img id='delete_icon' id='añadir' src='../imgs/menu_icons/delete.png' alt='eliminar'></a></div>";
                                ?>
                                <img class="fotoPerf" alt="fotoPerro" src='../imgs/perros/<?php if($perros["foto"] != ""){echo $perros["foto"];}else{echo ("no-dog-img.jpg");}?>'>
                                <?php
                                echo "<h2 style='margin-top: 5px; margin-bottom: 5px;'>".$perros['nombre']."</h2>";

                                $nacimiento = new DateTime($perros['fech_nacimiento']);
                                $hoy = new DateTime();
                                $edad = $hoy->diff($nacimiento);
                                echo "<p style='margin: 2px;'>".$edad->y." años y ".$edad->m." meses</p>";

                                /////////////////////Sacando suma mensual///////////////////////
                                $consulta = "SELECT SUM(peso) AS suma FROM recolectas WHERE perro = ".$perros['id']." AND MONTH(fecha) = ".date('m');

                                if($rs1=mysqli_query($conex,$consulta)) {
                                    $suma=mysqli_fetch_assoc($rs1);
                                    if ($suma["suma"] == "") {
                                        $suma["suma"] = 0;
                                    }
                                    echo "<p style='margin-bottom: 2px;'>Recolectado este mes: ".$suma["suma"]."g</p>";
                                }


                                /////////////////////Sacando suma anual///////////////////////
                                $consulta = "SELECT SUM(peso) AS suma FROM recolectas WHERE perro = ".$perros['id']." AND YEAR(fecha) = ".date('Y');

                                if($rs1=mysqli_query($conex,$consulta)) {
                                    $suma=mysqli_fetch_assoc($rs1);
                                    if ($suma["suma"] == "") {
                                        $suma["suma"] = 0;
                                    }
                                    echo "<p style='margin-top: 2px;'>Recolectado este año: ".$suma["suma"]."g</p>";
                                }

                                echo "<a id='botonTablaPerro".$perros['id']."' onclick=mostrarOcultarTabla('Perro',".$perros['id'].") class='rainbow-button' alt='Ver recolectas'></a>";

                                echo "<div id='recolectasPerro".$perros['id']."' style='display: none;'>";
                                    echo "<h3>Recolectas:</h3>";

                                    $consulta = "SELECT recolector, perro, zona, fecha, peso FROM recolectas WHERE perro = ".$perros['id']." ORDER BY fecha DESC";

                                    if($rs2=mysqli_query($conex,$consulta)) {
                                        if(mysqli_num_rows($rs2) != 0) {
                                            ?>
                                            <div>
                                                Ordenar por
                                                <select style="margin-top:0px; margin-bottom:30px;" onchange="reordenar('perros',<?php echo $perros['id']?>)" name="orderBy<?php echo $perros['id']?>" id="orderBy<?php echo $perros['id']?>" required>
                                                    <option selected value="fecha DESC">fecha</option>
                                                    <option value="peso DESC">peso</option>
                                                    <option value="recolector">guía</option>
                                                    <option value="zona">zona</option>
                                                </select>
                                            </div>
                                            <?php

                                            echo "<div id='modify-table".$perros["id"]."'>";
                                            echo "<table class='tabla'>";
                                                echo "<tr>";
                                                    echo "<th>Fecha</th>";
                                                    echo "<th>Peso</th>";
                                                    echo "<th>Guía</th>";
                                                    echo "<th>Zona</th>";
                                            while ($recolectas=mysqli_fetch_assoc($rs2)) {
                                                $recolectas['fecha'] = date("d/m/Y", strtotime($recolectas['fecha']));
                                                echo "<tr class='filaTabla'>";
                                                echo "<td>".$recolectas['fecha']."</td>";
                                                echo "<td>".$recolectas['peso']."g</td>";

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