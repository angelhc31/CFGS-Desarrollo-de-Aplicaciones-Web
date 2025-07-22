<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <link href="css/msg-style.css" rel="stylesheet" type="text/css">
        <link href="css/global.css" rel="stylesheet" type="text/css">
        <link href="css/login-style.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <title>Inicio</title>
    </head>
    <body>
        <?php
        if(isset($_SESSION["nombre"])){
           if ($_SESSION["admin"]) {
               header("Location: admin");
           }else{
               header("Location: user");
           }
        }else{
        ?>
            <?php
            if(isset($_GET["fallo"]) && $_GET["fallo"] == "true") {
            ?>
                <div id="error">Usuario o contraseña incorrectos. Vuelve a intentarlo.</div>
                <script src="js/errorMsgFadeout.js" type="text/javascript"></script>
            <?php
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