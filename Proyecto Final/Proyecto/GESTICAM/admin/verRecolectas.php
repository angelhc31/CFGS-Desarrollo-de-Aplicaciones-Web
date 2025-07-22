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
        <title>Recolectas</title>
    </head>
    <body>
    <?php
        if(isset($_SESSION["nombre"])){
            if ($_SESSION["admin"]) {
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
                    <nav>
                        <a href="index.php">Mapa</a>
                        <a href="verAdmins.php">Administradores</a>
                        <a href="verZonas.php">Zonas</a>
                        <a href="verRecolectores.php">Recolectores</a>
                        <a href="verPerros.php">Perros</a>
                        <a href="verRecolectas.php" style="color: grey;">Todas las recolectas</a>
                    </nav>
                </div>

                <hr style="position: fixed; width: 100%; border: 1px solid; border-color: white; background-color: white; margin-top: 0px; z-index: 50;">

                <div id="cuerpo">
                    <div id="update-card" class="card">
                        <div id="contenedor-cruz" onclick="ocultarCard(false)"><img id="cerrar" src="../imgs/menu_icons/cruz.png"></div>
                    </div>


                    <h1 id="titulo" style="margin-bottom: 0px">Recolectas</h1>
                    <div id="opcionesUsr" style="position: inherit; z-index: 1;">
                        <div>
                            Ordenar por
                            <select onchange="reordenar('recolectas','')" name="orderBy" id="orderBy" required>
                                <option selected value="fecha DESC">fecha</option>
                                <option value="peso DESC">peso</option>
                                <option value="perro">perro</option>
                                <option value="recolector">recolector</option>
                                <option value="zona">zona</option>
                            </select>
                        </div>
                        <br>
                        <div id='contenedor-delete-selected'><img onclick="borrarSeleccionado()" id='delete_icon' id='añadir' src='../imgs/menu_icons/delete.png' alt='eliminar'></div>
                        <input onclick='selectAll()' style="position: relative; z-index: 20;" type='checkbox' id="seleccionarTodo" class='checkbox'>
                    </div>
                    <hr id="lineaInicial" style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin: 0px;'>
                    <?php
                    $consulta = "SELECT * FROM recolectas ORDER BY fecha DESC";

                    if($rs=mysqli_query($conex,$consulta)){
                        if(mysqli_num_rows($rs) != 0) {
                            echo "<div id='modify-table'>";
                            echo "<table class='tabla' style='margin-top: 20px; margin-bottom: 20px; font-size: 22px;'>";
                                echo "<tr style='height: 40px;'>";
                                    echo "<th style='width: 20%;'>Fecha</th>";
                                    echo "<th style='width: 20%;'>Peso</th>";
                                    echo "<th style='width: 20%;'>Perro</th>";
                                    echo "<th style='width: 20%;'>Recolector</th>";
                                    echo "<th style='width: 20%;'>Zona</th>";
                                    echo "<td></td>";
                                echo "</tr>";
                            while ($vec=mysqli_fetch_assoc($rs)){
                                $vec['fecha'] = date("d/m/Y", strtotime($vec['fecha']));
                                echo "<tr id='".$vec['id']."' class='filaTabla' style='height: 40px;'>";
                                echo "<td style='width: 20%'>".$vec['fecha']."</td>";
                                echo "<td style='width: 20%'>".$vec['peso']."g</td>";

                                echo "<td style='width: 20%'>";
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
                                echo "</td>";

                                echo "<td style='width: 20%'>";
                                $consulta = "SELECT nombre, apellidos, foto FROM usuarios WHERE id = ".$vec['recolector'];
                                if ($rs3=mysqli_query($conex,$consulta)) {
                                    if(mysqli_num_rows($rs3) != 0) {
                                        while ($usrs=mysqli_fetch_assoc($rs3)) {
                                            ?>
                                            <img class="fotoTabla" alt="fotoUsrs" src='../imgs/users/<?php if($usrs["foto"] != ""){echo $usrs["foto"];}else{echo ("no-user-img.png");}?>'>
                                            <?php
                                            echo $usrs["nombre"]." ".$usrs["apellidos"];
                                        }
                                    } else {
                                        echo "Desconocido";
                                    }
                                }
                                echo "</td>";

                                echo "<td style='width: 20%'>";
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