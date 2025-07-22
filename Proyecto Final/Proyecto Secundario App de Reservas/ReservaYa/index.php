<?php
    include("util/db.php");
    session_start();
    if (!isset($_GET["negocio"])) {
        header("Location: login.php");
    } else {
        $_SESSION["idNegocio"] = $_GET["negocio"];
    }
?>
<!DOCTYPE html>
<html lang=es>
    <head>
        <link rel="icon" href="imgs/logo.ico" type="image/x-icon">
        <link href="css/msg-style.css" rel="stylesheet" type="text/css">
        <link href="css/formReserva-style.css" rel="stylesheet" type="text/css">
        <link href="css/global.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <title>MesaYa</title>
    </head>
    <body style="margin: 0px;">
    <?php
        $conex = conectar("reservas_negocios");
        if(isset($_SESSION["registrado"])){
            if($_SESSION["registrado"] == "true") {
    ?>
                <div id="success">Reserva realizada.</div>
                <script src="js/successMsgFadeout.js" type="text/javascript"></script> 
    <?php
            } else {
                ?> 
                <div id="error">Ha ocurrido un error al realizar su reserva. Vuelva a intentarlo.</div>
                <script src="js/errorMsgFadeout.js" type="text/javascript"></script> 
                <?php 
            }

            unset($_SESSION["registrado"]);
        }
    ?>
        <form action="util/reservar.php" method="POST">
            <div class="formulario" id="formulario-reserva">
                <?php
                    $consulta = "SELECT nombre FROM negocios WHERE id = " . intval($_SESSION["idNegocio"]);
                    $nombreNegocio = "Negocio"; // Valor por defecto por si falla la consulta

                    if ($rs = mysqli_query($conex, $consulta)) {
                        if ($vec = mysqli_fetch_assoc($rs)) {
                            $nombreNegocio = $vec["nombre"];
                        }
                    }
                ?>
                <h1>Reservar en <?php echo htmlspecialchars($nombreNegocio); ?></h1>
                <input type="text" name="nombre" maxlength="150" placeholder="Nombre" required>
                <input type="tel" name="telf" placeholder="Teléfono" required>
                <input id="numPersonas" type="number" name="personas" placeholder="Nº Personas" min="1" step="1" onchange="updateTurnosDisp()" required>
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
    <?php
        desconectar($conex);
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
                    url: 'util/turnosDisponibles.php',
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