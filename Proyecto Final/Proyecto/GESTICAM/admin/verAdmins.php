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
        <title>Administradores</title>
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
                        <div id="success">Administrador añadido. La contraseña por defecto es su nombre de ususario seguido de su DNI.</div>
                        <script src="../js/successMsgFadeout.js" type="text/javascript"></script> 
                <?php
                    }
                }

                if(isset($_GET["eliminado"])){
                    if($_GET["eliminado"] == "true") {
                ?>
                        <div id="success">Administrador eliminado con éxito.</div>
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
                        <div id="success">Se ha añadido un nuevo administrador, le habrá llegado un email con su nombre de usuario y contraseña.</div>
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
                        <a href="verAdmins.php" style="color: grey;">Administradores</a>
                        <a href="verZonas.php">Zonas</a>
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
                            <h1 style="margin-bottom: 10px;">Nuevo administrador</h1>
                            <form action="addUser.php" method="POST">
                                <input id="name" name="name" type="text" placeholder="Nombre" required>
                                <input style="margin-top: 0px;" id="ape" name="ape" type="text" placeholder="Apellidos" required>
                                <input id="dni" name="dni" type="text" placeholder="DNI" required>
                                <input id="mail" name="mail" type="email" placeholder="Email" required>
                                <input style="margin-top: 0px;" id="telf" name="telf" type="tel" placeholder="Teléfono" required>
                                <input type="hidden" name="esAdmin" id="esAdmin" value="1">
                                <div id="continuar">
                                    <img src="../imgs/menu_icons/continuar.png" alt="continue">
                                    <button onclick="ocultarCard(true)" id="hidden-button" type="submit"></button>
                                </div>
                            </form>
                        </div>
                    </div>


                    <h1 style="margin-bottom: 0px">Administradores</h1>
                    <input id="cuadroTexto" onkeyup="busqueda('admins');" type="text" placeholder="Buscar por nombre...">
                    <br>
                    <div class="contenedor-icono" onclick="mostrarCard('add')"><img id="add_icon" id="añadir" src="../imgs/menu_icons/masUsr.png" alt="añadir"></div>
                    <hr id="lineaInicial" style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin: 0px;'>

                    <div id="content">
                        <?php
                        $consulta = "SELECT * FROM usuarios WHERE esAdmin = '1' ORDER BY nombre, apellidos";

                        if($rs=mysqli_query($conex,$consulta)){
                            while ($vec=mysqli_fetch_assoc($rs)){
                                echo "<div>";
                                if ($_SESSION["idUsr"] != $vec["id"]) {
                                    echo "<div id='contenedor-delete'><a href='borrarUser.php?id=".$vec['id']."&esAdmin=1'><img id='delete_icon' id='añadir' src='../imgs/menu_icons/delete.png' alt='eliminar'></a></div>";
                                    ?>
                                    <img class="fotoPerf" alt="foto" src='../imgs/users/<?php if($vec["foto"] != ""){echo $vec["foto"];}else{echo ("no-user-img.png");}?>'>
                                    <?php
                                } else {
                                    ?>
                                    <img style='margin-top: 41px;' class="fotoPerf" alt="foto" src='../imgs/users/<?php if($vec["foto"] != ""){echo $vec["foto"];}else{echo ("no-user-img.png");}?>'>
                                    <?php
                                }
                                echo "<h2 style='margin-top: 5px;'>".$vec['nombre']." ".$vec['apellidos']."</h2>";
                                echo "<p>Nombre de usuario: <strong>".$vec['nombreUsr']."</strong></p>";
                                echo "<p>".$vec['DNI']."</p>";
                                echo "<p>".$vec['mail']."</p>";
                                echo "<p>".$vec['telefono']."</p>";
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