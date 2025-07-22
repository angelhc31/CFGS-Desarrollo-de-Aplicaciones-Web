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
        <title>Mis recolectas</title>
    </head>
    <body>
    <?php
        if(isset($_SESSION["nombre"])){
            if (!$_SESSION["admin"]) {
                $conex = conectar("campo_trufas");

                if(isset($_GET["error"])){
                    if($_GET["error"] == "true") {
                        ?> 
                        <div id="error">Ha ocurrido un error. Vuelve a intentarlo.</div>
                        <script src="../js/errorMsgFadeout.js" type="text/javascript"></script> 
                        <?php 
                    }
                }

                if(isset($_GET["eliminadas"])){
                    if($_GET["eliminadas"] == "true") {
                ?>
                        <div id="success">Recolectas eliminadas con éxito.</div>
                        <script src="../js/successMsgFadeout.js" type="text/javascript"></script> 
                <?php
                    }
                }

                if(isset($_GET["edited"])){
                    if($_GET["edited"] == "true") {
                ?>
                        <div id="success">Cambios guardados.</div>
                        <script src="../js/successMsgFadeout.js" type="text/javascript"></script> 
                <?php
                    }
                }

                if(isset($_GET["eliminado"])){
                    if($_GET["eliminado"] == "true") {
                ?>
                        <div id="success">Recolecta eliminada con éxito.</div>
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
                    <nav style="margin-left: -5px;">
                        <a href="index.php">Registrar recolecta</a>
                        <a href="verRecolectasUsr.php" style="color: grey;">Mis recolectas</a>
                    </nav>
                </div>

                <hr style="position: fixed; width: 100%; border: 1px solid; border-color: white; background-color: white; margin-top: 0px; z-index: 50;">

                <div id="cuerpo">

                    <div id="update-card" class="card">
                        <div id="contenedor-cruz" onclick="ocultarCard(false)"><img id="cerrar" src="../imgs/menu_icons/cruz.png"></div>
                        <h1 style="margin-bottom: 10px;">Editar recolecta</h1>
                        <form action="editRecolecta.php" method="POST">
                            <input id="idRecolecta" name="id" type="hidden" value="">
                            <input id="pesoActual" name="pesoActual" type="hidden" value="">

                            <input id="fechaEdit" name="fecha" type="date">
                            <input type="number" name="peso" id="pesoEdit" placeholder="Peso (g)" min="0" step="0.1">
                            <select name="perro" id="perroEdit">
                                <option id="perroPlaceholder" hidden value="">Perro</option>
                            <?php
                                $consulta = "SELECT id, nombre FROM perros ORDER BY nombre";
                                if($rs = mysqli_query($conex, $consulta)){
                                    while ($vec = mysqli_fetch_array($rs)){
                            ?>
                                    <option class="opcionPerro" value='<?php echo$vec["id"]?>'><?php echo$vec["nombre"]?></option>
                            <?php
                                    }
                                }
                            ?>
                            </select>
                            <select name="zona" id="zonaEdit">
                                <option id="zonaPlaceholder" hidden value="">Zona</option>
                                <?php
                                    $consulta = "SELECT id, nombre FROM zonas ORDER BY nombre";
                                    if($rs = mysqli_query($conex, $consulta)){
                                        while ($vec = mysqli_fetch_array($rs)){
                                ?>
                                        <option class="opcionZona" value='<?php echo$vec["id"]?>'><?php echo$vec["nombre"]?></option>
                                <?php
                                        }
                                    }
                                ?>
                            </select>
                            <div id="continuar">
                                <img src="../imgs/menu_icons/continuar.png" alt="continue">
                                <button id="hidden-button" type="submit"></button>
                            </div>
                        </form>
                    </div>


                    <h1 id="titulo" style="margin-bottom: 0px">Recolectas</h1>
                    <div id="opcionesUsr" style="position: inherit; z-index: 1;">
                        <div>
                            Ordenar por
                            <select onchange="reordenar('recolectasUsr','')" name="orderBy" id="orderBy" required>
                                <option selected value="fecha DESC">fecha</option>
                                <option value="peso DESC">peso</option>
                                <option value="perro">perro</option>
                                <option value="zona">zona</option>
                            </select>
                        </div>
                        <br>
                        <div id='contenedor-delete-selected'><img onclick="borrarSeleccionado()" id='delete_icon' id='añadir' src='../imgs/menu_icons/delete.png' alt='eliminar'></div>
                        <input onclick='selectAll()' style="position: relative; z-index: 20;" type='checkbox' id="seleccionarTodo" class='checkbox'>
                    </div>
                    <hr id="lineaInicial" style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin: 0px;'>
                    <?php
                    $consulta = "SELECT * FROM recolectas WHERE recolector=".$_SESSION["idUsr"]." ORDER BY fecha DESC";

                    if($rs=mysqli_query($conex,$consulta)){
                        if(mysqli_num_rows($rs) != 0) {
                            echo "<div id='modify-table'>";
                            echo "<table class='tabla' style='margin-top: 20px; margin-bottom: 20px; font-size: 22px; width: 60%;'>";
                                echo "<tr style='height: 40px;'>";
                                    echo "<th style='width: 25%;'>Fecha</th>";
                                    echo "<th style='width: 25%;'>Peso</th>";
                                    echo "<th style='width: 25%;'>Perro</th>";
                                    echo "<th style='width: 25%;'>Zona</th>";
                                    echo "<td></td>";
                                echo "</tr>";
                            while ($vec=mysqli_fetch_assoc($rs)){
                                $fecha = $vec['fecha'];
                                $vec['fecha'] = date("d/m/Y", strtotime($vec['fecha']));
                                echo "<tr id='".$vec['id']."' class='filaTabla' style='height: 40px;'>";
                                echo "<td style='width: 25%'>".$vec['fecha']."</td>";
                                echo "<td style='width: 25%'>".$vec['peso']."g</td>";

                                echo "<td style='width: 25%'>";
                                $consulta = "SELECT nombre, foto FROM perros WHERE id = ".$vec['perro'];
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

                                echo "<td style='width: 25%'>";
                                $consulta = "SELECT nombre FROM zonas WHERE id = ".$vec['zona'];
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

                                echo "<td><input onclick='seleccionarFila(".$vec['id'].")' type='checkbox' id='checkbox".$vec['id']."' class='checkbox'></td>";

                                echo "<td><div id='contenedor-delete'><a href='../util/borrarRecolecta.php?id=".$vec['id']."&borrarUno=true'><img id='delete_icon' id='añadir' src='../imgs/menu_icons/delete.png' alt='eliminar'></a></div></td>";

                                echo "<td>";
                                ?>
                                <div class='contenedor-icono-edit' onclick="mostrarCard('editRecolecta',<?php echo $vec['id']?>,'','<?php echo $fecha?>',<?php echo $vec['peso']?>,<?php echo $vec['perro']?>,<?php echo $vec['zona']?>)"><img style='width: 32px; height: 32px;' id='edit_icon' id='añadir' src='../imgs/menu_icons/edit.png' alt='editar'></div>
                                <?php
                                echo "</td>";

                                echo "</tr>";
                            }
                            echo "</table>";
                            echo "</div>";
                        } else {
                            ?>
                            <script>
                                document.getElementById("opcionesUsr").style.display = "none";
                                document.getElementById("titulo").style.marginBottom = "50px";
                            </script>
                            <?php
                            echo "<h2>No se encontraron recolectas</h2>";
                        }
                        echo "<hr style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin-bottom: 0px;'>";
                    }
                    ?>
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