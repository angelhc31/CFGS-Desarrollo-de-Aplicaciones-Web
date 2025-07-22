<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <link rel="icon" href="imgs/logo.ico" type="image/x-icon">
        <link href="css/msg-style.css" rel="stylesheet" type="text/css">
        <link href="css/global.css" rel="stylesheet" type="text/css">
        <link href="css/login-style.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <title>MesaYa</title>
    </head>
    <body>
        <?php
        if(isset($_SESSION["nombre"])){
            header("Location: negocio");
        }else{
        ?>
            <?php
            if(isset($_SESSION["fallo"])){
                if($_SESSION["fallo"] == "true") {
            ?>
                <div id="error">Usuario o contraseña incorrectos.<br>Vuelve a intentarlo.</div>
                <script src="js/errorMsgFadeout.js" type="text/javascript"></script>
            <?php
                }
                unset($_SESSION["fallo"]);
            }
            if(isset($_SESSION["sinPermisos"])){
                if($_SESSION["sinPermisos"] == "true") {
            ?>
                <div id="error">Usuario deshabilitado.<br>Contacte con soporte.</div>
                <script src="js/errorMsgFadeout.js" type="text/javascript"></script>
            <?php
                }
                unset($_SESSION["sinPermisos"]);
            }
            ?>

            <form action="validar.php" method="POST">
                <div class="login">
                    <h1>Iniciar Sesión</h1>
                    <input type="text" name="usr" placeholder="Usuario" required>
                    <input type="password" name="pwd" placeholder="Contraseña" required>
                    <button type="submit" class="btn btn-primary btn-block btn-large">Siguiente</button>
                </div>
            </form>
        <?php
        }
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