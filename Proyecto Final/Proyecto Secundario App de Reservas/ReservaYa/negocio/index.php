<?php
    include("../util/db.php");
	session_start();
?>
<!DOCTYPE html>
<html lang=es>
    <head>
        <link rel="icon" href="../imgs/logo.ico" type="image/x-icon">
        <link href="../css/msg-style.css" rel="stylesheet" type="text/css">
        <link href="../css/formReserva-style-negocio.css" rel="stylesheet" type="text/css">
        <link href="../css/menu.scss" rel="stylesheet" type="text/css">
        <link href="../css/global.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <title>MesaYa</title>
    </head>
    <body style="margin: 0px;">
    <?php
        if(isset($_SESSION["nombre"])){
            if ($_SESSION["activo"]) {
                $conex = conectar("reservas_negocios");
                $usr = $_SESSION["nombre"];
                $consulta = "SELECT id FROM negocios WHERE nomUsr = '$usr'";

                if($rs = mysqli_query($conex, $consulta)){
                    while ($vec = mysqli_fetch_array($rs)){
                        $_SESSION["idNegocio"] = $vec["id"];
                    }
                }

                if(isset($_SESSION["registrado"])){
                    if($_SESSION["registrado"] == "true") {
                ?>
                        <div id="success">Reserva realizada.</div>
                        <script src="../js/successMsgFadeout.js" type="text/javascript"></script> 
                <?php
                    } else {
                ?> 
                        <div id="error">Ha ocurrido un error al realizar su reserva. Vuelva a intentarlo.</div>
                        <script src="../js/errorMsgFadeout.js" type="text/javascript"></script> 
                <?php 
                    }

                    unset($_SESSION["registrado"]);
                }
                ?>

                <div id="header">
                    <img id="avatar" src='../imgs/users/<?php if($_SESSION["foto"] != NULL){echo $_SESSION["foto"];}else{echo ("no-user-img.png");}?>'>
                    <button id="clickAvatar"></button>
                    <div id="options-card" style="display: none;">
                        <a href="perfil">
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
                        <a href="index.php" style="color: grey;">Reservar</a>
                        <a href="verReservas.php">Ver Reservas</a>
                    </nav>
                </div>
                <hr style="position: fixed; width: 100%; border: 1px solid; border-color: white; background-color: white; margin-top: 62px; z-index: 50;">

                 <form action="../util/reservar.php" method="POST">
                    <div class="formulario" id="formulario-reserva">
                        <h1>Reservar en <?php echo $_SESSION["nombreNegocio"];?></h1>
                        <input type="text" name="nombre" maxlength="150" placeholder="Nombre" required>
                        <input type="tel" name="telf" placeholder="Teléfono" required>
                        <input id = "numPersonas" type="number" name="personas" placeholder="Nº Personas" min="1" step="1" onchange="updateTurnosDisp()" required>
                        <input id="fechaReserva" name="fecha" placeholder="Fecha" class="textbox-n" type="text" onfocus="activarDatePicker(this)" onchange="updateTurnosDisp()" required>
                        <div id="hora-reserva">
                            <select id = "selectHoraReserva" name="hora" required>
                                <option hidden selected value="">Hora</option>
                                <option disabled>Rellena todos los campos para ver las horas disponibles</option>
                            </select>
                        </div>
                        <br>
                        <textarea id="observaciones" name="observaciones" placeholder="Observaciones" style="resize: none; height: 70px" maxlength="500"></textarea>
                        <button type="submit" class="btn btn-primary btn-block btn-large">Reservar</button>
                    </div>
                </form>
                <script src="../js/mostrarAccionesUsr.js"></script>
    <?php
                desconectar($conex);
            }else{
                $_SESSION["sinPermisos"] = "true";
                header("Location: ../index.php");
            }
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

            function updateTurnosDisp() {
                fechaReserva = document.getElementById('fechaReserva').value;
                numPersonas = document.getElementById('numPersonas').value;
                turnosSelecc = document.getElementById('selectHoraReserva').value;
                var parametros = 
                {
                    "fechaReserva" : fechaReserva,
                    "numPersonas" : numPersonas,
                    "turnoSelecc" : turnosSelecc
                };

                $.ajax({
                    data: parametros,
                    url: '../util/turnosDisponibles.php',
                    type: 'POST',
                    

                    success: function(mensaje)
                    {
                    $('#hora-reserva').html(mensaje);
                    }
                });
            }

            function activarDatePicker(input) {
                input.type = 'date';
                
                const hoy = new Date().toISOString().split('T')[0];
                input.min = hoy;
            }
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </body>
</html>