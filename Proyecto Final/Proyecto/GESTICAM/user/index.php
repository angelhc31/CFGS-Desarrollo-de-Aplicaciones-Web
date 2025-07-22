<?php
    include("../util/db.php");
	session_start();
?>
<!DOCTYPE html>
<html lang=es>
    <head>
        <link href="../css/msg-style.css" rel="stylesheet" type="text/css">
        <link href="../css/formRecolecta-style.css" rel="stylesheet" type="text/css">
        <link href="../css/menu.scss" rel="stylesheet" type="text/css">
        <link href="../css/global.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <title>Recolecta</title>
    </head>
    <body style="margin: 0px;">
    <?php
        if(isset($_SESSION["nombre"])){
            if (!$_SESSION["admin"]) {
                $conex = conectar("campo_trufas");
    ?>
                <?php
                if(isset($_GET["formIncompleto"]) && $_GET["formIncompleto"] == "true") {
                ?>
                    <div id="error">Todos los campos deben ser completados. Vuelve a introducirlo.</div>
                    <script src="../js/errorMsgFadeout.js" type="text/javascript"></script> 
                <?php
                }
                ?>
                <?php
                if(isset($_GET["fechaErr"]) && $_GET["fechaErr"] == "true") {
                ?>
                    <div id="error">Fecha errónea. Vuelve a introducirlo.</div>
                    <script src="../js/errorMsgFadeout.js" type="text/javascript"></script> 
                <?php
                }
                ?>
                <?php
                if(isset($_GET["registrado"])){
                    if($_GET["registrado"] == "true") {
                ?>
                        <div id="success">Tu recolecta se ha registrado.</div>
                        <script src="../js/successMsgFadeout.js" type="text/javascript"></script> 
                <?php
                    } else {
                        ?> 
                        <div id="error">Ha ocurrido un error. Vuelve a intentarlo.</div>
                        <script src="../js/errorMsgFadeout.js" type="text/javascript"></script> 
                        <?php 
                    }
                }
                ?>

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
                    <nav style = "margin-left: 3px;">
                        <a href="index.php" style="color: grey;">Registrar recolecta</a>
                        <a href="verRecolectasUsr.php">Mis recolectas</a>
                    </nav>
                </div>
                <hr style="position: fixed; width: 100%; border: 1px solid; border-color: white; background-color: white; margin-top: 62px; z-index: 50;">

                <form action="registrarRecolecta.php" method="POST">
                    <div class="formulario">
                        <h1>Recolecta nueva</h1>
                        <select name="perro" required>
                            <option hidden selected value="">Perro</option>
                            <?php
                                $consulta = "SELECT id, nombre FROM perros ORDER BY nombre";
                                if($rs = mysqli_query($conex, $consulta)){
                                    while ($vec = mysqli_fetch_array($rs)){
                            ?>
                                    <option value='<?php echo$vec["id"]?>'><?php echo$vec["nombre"]?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                        <select name="zona" required>
                            <option hidden selected value="">Zona</option>
                            <?php
                                $consulta = "SELECT id, nombre FROM zonas ORDER BY nombre";
                                if($rs = mysqli_query($conex, $consulta)){
                                    while ($vec = mysqli_fetch_array($rs)){
                            ?>
                                    <option value='<?php echo$vec["id"]?>'><?php echo$vec["nombre"]?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                        <input type="number" name="peso" placeholder="Peso (g)" min="0" step="0.1" required>
                        <input name="fecha" placeholder="Fecha" class="textbox-n" type="text" onfocus="(this.type='date')" required>
                        <button type="submit" class="btn btn-primary btn-block btn-large">Registrar recolecta</button>
                    </div>
                </form>
                <script src="../js/mostrarAccionesUsr.js"></script>
    <?php
                desconectar($conex);
            }else{header("Location: ../index.php");}
        }else{header("Location: ../index.php");}
    ?>
        <script>
            (function () {
            /**
             * Main stopscrollwheelzoom constructor
             */
            let SSWZ = function () {

                /**
                 * Handler for scroll- control must be pressed.
                 * @param e
                 */
                this.keyScrollHandler = function (e) {
                    if (e.ctrlKey) {
                        e.preventDefault();
                        return false;
                    }
                }
            };

            if (window === top) {
                let sswz = new SSWZ();
                window.addEventListener('wheel', sswz.keyScrollHandler, { passive: false });
            }

            })();
        </script>
    </body>
</html>