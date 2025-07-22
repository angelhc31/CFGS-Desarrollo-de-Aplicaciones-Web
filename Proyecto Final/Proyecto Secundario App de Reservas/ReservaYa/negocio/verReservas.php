<?php
    include("../util/db.php");
	session_start();
?>
<!DOCTYPE html>
<html lang=es>
    <head>
        <link rel="icon" href="../imgs/logo.ico" type="image/x-icon">
        <link href="../css/msg-style.css" rel="stylesheet" type="text/css">
        <link href="../css/adminMain-style.css" rel="stylesheet" type="text/css">
        <link href="../css/menu.scss" rel="stylesheet" type="text/css">
        <script>
            function seleccionarFilaInit(id) {
                fila = document.getElementById(id);
                checkbox = document.getElementById("checkbox" + id);

                if (checkbox.checked) {
                    fila.classList.add('clicado');
                } else {
                    fila.classList.remove('clicado');
                }
            }
        </script>
        <meta charset="UTF-8">
        <title>MesaYa</title>
    </head>
    <body>
    <?php
        if(isset($_SESSION["nombre"])){
            if ($_SESSION["activo"]) {
                $conex = conectar("reservas_negocios");

                if(isset($_SESSION["error"])){
                    if($_SESSION["error"] == "true") {
                        ?> 
                        <div id="error">Ha ocurrido un error. Vuelve a intentarlo o contacta con soporte.</div>
                        <script src="../js/errorMsgFadeout.js" type="text/javascript"></script> 
                        <?php 
                    }
                    unset($_SESSION["error"]);
                }

                if(isset($_SESSION["completada"])){
                    if($_SESSION["completada"] == "true") {
                ?>
                        <div id="success">Reserva completada.</div>
                        <script src="../js/successMsgFadeout.js" type="text/javascript"></script> 
                <?php
                    }
                    unset($_SESSION["completada"]);
                }

                if(isset($_SESSION["pendiente"])){
                    if($_SESSION["pendiente"] == "true") {
                ?>
                        <div id="success">Reserva pendiente.</div>
                        <script src="../js/successMsgFadeout.js" type="text/javascript"></script> 
                <?php
                    }
                    unset($_SESSION["pendiente"]);
                }

                if(isset($_SESSION["cancelada"])){
                    if($_SESSION["cancelada"] == "true") {
                ?>
                        <div id="success">Reserva cancelada.</div>
                        <script src="../js/successMsgFadeout.js" type="text/javascript"></script> 
                <?php
                    }
                    unset($_SESSION["cancelada"]);
                }

                if(isset($_SESSION["edited"])){
                    if($_SESSION["edited"] == "true") {
                ?>
                        <div id="success">Cambios guardados.</div>
                        <script src="../js/successMsgFadeout.js" type="text/javascript"></script> 
                <?php
                    }
                    unset($_SESSION["edited"]);
                }
                ?>
                <div id="bkgr"></div>
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
                    <nav style="margin-left: -5px;">
                        <a href="index.php">Reservar</a>
                        <a href="verReservas.php" style="color: grey;">Ver Reservas</a>
                    </nav>
                </div>

                <hr style="position: fixed; width: 100%; border: 1px solid; border-color: white; background-color: white; margin-top: 0px; z-index: 50;">

                <div id="cuerpo">

                    <div id="update-card" class="card">
                        <div id="contenedor-cruz" onclick="ocultarCard(false)"><img id="cerrar" src="../imgs/menu_icons/cruz.png"></div>
                        <br><br>
                        <h1 style="margin-bottom: 10px;">Editar Reserva</h1>
                        <form onsubmit="updateReserva(event)">
                            <input id="idReserva" name="id" type="hidden" value="">
                            <input id="nombreCli" type="text" name="nombre" placeholder="Nombre" required>
                            <input id="telfCli" type="tel" name="telf" placeholder="Teléfono" required>
                            <input id="numPersonas" type="number" name="personas" placeholder="Nº Personas" min="1" step="1" onchange="updateTurnosDisp('')" required>
                            <input id="fechaReserva" name="fecha" placeholder="Fecha" class="textbox-n" type="text" onclick="activarDatePicker(this)" onchange="updateTurnosDisp('')" required>
                            <div id="hora-reserva">
                                <select id="selectHoraReserva" name="hora" required>
                                    <option hidden selected value="">Hora</option>
                                    <?php
                                        $consulta = "SELECT id, nombre FROM turnos WHERE negocio = '".$_SESSION["idNegocio"]."' ORDER BY nombre";
                                        if($rs = mysqli_query($conex, $consulta)){
                                            while ($vec = mysqli_fetch_array($rs)){
                                    ?>
                                                <option class="optionHoraReserva" value='<?php echo$vec["id"]?>'><?php echo date('H:i', strtotime($vec["nombre"]));?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                            <br>
                            <textarea id="observaciones" name="observaciones" placeholder="Observaciones" style="resize: none; height: 70px" maxlength="500"></textarea>
                            <div id="continuar">
                                <img src="../imgs/menu_icons/continuar.png" alt="continue">
                                <button id="hidden-button" type="submit"></button>
                            </div>
                        </form>
                    </div>
                    
                    <h1 id="titulo" style="margin-bottom: 0px">Reservas</h1>
                    <br>

                    <div id="opcionesUsr" style="position: inherit; z-index: 1; width: 50%; margin: 0 auto;">
                        <div style="display: flex; justify-content: space-between;">
                            <input onkeyup="filtrarReservas()" id="nombreCliFiltro" name="nombreFiltro" placeholder="Buscar Nombre" type="text" style="width: 20%; height: 40px;" value="<?php echo $_SESSION["filtroNombre"]?>">
                            <input onchange="filtrarReservas()" onclick="activarDatePicker(this)" id="fechaFiltro" name="fechaFiltro" placeholder="Filtrar por Fecha" type="text" style="width: 20%; height: 40px;" value="<?php echo $_SESSION["filtroFecha"]?>">
                            <select onchange="filtrarReservas()" id="filtroTurno" name="filtroTurno" style="width: 20%; height: 40px;">
                                <option hidden selected value="">Filtrar por Turno</option>
                                <option value="">Todos</option>
                                    <?php
                                        $consulta = "SELECT id, nombre FROM turnos WHERE negocio = '".$_SESSION["idNegocio"]."' ORDER BY nombre";
                                        if($rs = mysqli_query($conex, $consulta)){
                                            while ($vec = mysqli_fetch_array($rs)){
                                                if ($_SESSION["filtroTurno"] == $vec["id"]) {
                                                    echo "<option selected value='".$vec["id"]."'>".date('H:i', strtotime($vec["nombre"]))."</option>";
                                                } else {
                                                    echo "<option value='".$vec["id"]."'>".date('H:i', strtotime($vec["nombre"]))."</option>";
                                                }
                                            }
                                        }
                                    ?>
                            </select>
                            <select onchange="filtrarReservas()" id="filtroEstado" name="filtroEstado" style="width: 20%; height: 40px;">
                                <option hidden selected value="">Filtrar por Estado</option>
                                <option value="">Todos</option>
                                <?php
                                    $consulta = "SELECT id, nombre FROM estados ORDER BY id";
                                    if($rs = mysqli_query($conex, $consulta)){
                                        while ($vec = mysqli_fetch_array($rs)){
                                            if ($_SESSION["filtroEstado"] == $vec["id"]) {
                                                echo "<option selected value='".$vec["id"]."'>".$vec["nombre"]."</option>";
                                            } else {
                                                echo "<option value='".$vec["id"]."'>".$vec["nombre"]."</option>";
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                        <br>
                        <div><button onclick="window.location.href='reiniciarFiltros.php'" class="btn btn-primary" style="height: 30px;">Reiniciar Filtros</button></div>
                        <br>
                    </div>

                    <hr id="lineaInicial" style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin: 0px;'>
                    <?php
                    $consulta = "SELECT * FROM reservas WHERE negocio=".$_SESSION["idNegocio"];

                    if ($_SESSION["filtroNombre"] != "") {
                        $consulta .= " AND nombreCliente LIKE '".mb_strtoupper(trim($_SESSION["filtroNombre"]), 'UTF-8')."%'";
                    }

                    if ($_SESSION["filtroFecha"] != "") {
                        $consulta .= " AND fecha = '".$_SESSION["filtroFecha"]."'";
                    }

                    if ($_SESSION["filtroTurno"] != "") {
                        $consulta .= " AND turno = '".$_SESSION["filtroTurno"]."'";
                    }

                    if ($_SESSION["filtroEstado"] != "") {
                        $consulta .= " AND estado = '".$_SESSION["filtroEstado"]."'";
                    }

                    $consulta .= " ORDER BY fecha DESC, turno";

                    if($rs=mysqli_query($conex,$consulta)){
                        echo "<div id='modify-table'>";
                        if(mysqli_num_rows($rs) != 0) {
                            echo "<table class='tabla' style='margin-top: 20px; margin-bottom: 20px; font-size: 22px; width: 90%;'>";
                                echo "<tr style='height: 40px;'>";
                                    echo "<th style='width: 14%;'>Cliente</th>";
                                    echo "<th style='width: 14%;'>Teléfono</th>";
                                    echo "<th style='width: 14%;'>Nº Personas</th>";
                                    echo "<th style='width: 14%;'>Fecha</th>";
                                    echo "<th style='width: 14%;'>Turno</th>";
                                    echo "<th style='width: 14%;'>Observaciones</th>";
                                    echo "<th style='width: 14%;' colspan='3'>Opciones</th>";
                                    echo "<td></td>";
                                echo "</tr>";
                            while ($vec=mysqli_fetch_assoc($rs)){
                                $fecha = $vec['fecha'];
                                $vec['fecha'] = date("d/m/Y", strtotime($vec['fecha']));
                                $claseFila = ($vec['estado'] == 3) ? "fila-cancelada" : "";
                                echo "<tr id='" . $vec['id'] . "' class='filaTabla $claseFila' style='height: 40px;'>";
                                echo "<td style='width: 17%'>".$vec['nombreCliente']."</td>";
                                echo "<td style='width: 17%'>".$vec['telfCliente']."</td>";
                                echo "<td style='width: 17%'>".$vec['numPersonas']."</td>";
                                echo "<td style='width: 17%'>".$vec['fecha']."</td>";

                                echo "<td style='width: 17%'>";
                                $consulta = "SELECT descripcion FROM turnos WHERE id = ".$vec['turno'];
                                if ($rs3=mysqli_query($conex,$consulta)) {
                                    if(mysqli_num_rows($rs3) != 0) {
                                        while ($turnos=mysqli_fetch_assoc($rs3)) {
                                            echo $turnos["descripcion"];
                                        }
                                    } else {
                                        echo "Desconocido";
                                    }
                                }
                                echo "</td>";
                                
                                $observaciones = $vec['observaciones'];
                                $observaciones_cortas = mb_strimwidth($observaciones, 0, 10, '...');
                                ?>
                                <td style='width: 17%'>
                                    <?php echo htmlspecialchars($observaciones_cortas, ENT_QUOTES); ?>
                                    <?php if(strlen($observaciones) > 10): ?>
                                        <button onclick="alert('<?php echo htmlspecialchars($observaciones, ENT_QUOTES); ?>')" style="margin-left:5px; cursor:pointer;">🔍</button>
                                    <?php endif; ?>
                                </td>
                                <?php

                                echo "<td><label title='Completar Reserva'><input onclick='seleccionarFila(".$vec['id']."); actualizarEstado(".$vec['id'].", \"completar\")' type='checkbox' id='checkbox".$vec['id']."' class='checkbox'" . ($vec['estado'] == 2 ? " checked" : "") . "></label></td>";

                                echo "<td><label title='Cancelar Reserva'><div id='contenedor-delete' onclick='actualizarEstado(".$vec['id'].", \"cancelar\")'><img id='delete_icon' id='añadir' src='../imgs/menu_icons/delete.png' alt='eliminar'></div></label></td>";

                                echo "<td>";
                                ?>
                                <label title='Editar Reserva'><div class='contenedor-icono-edit' onclick="mostrarCard(<?php echo $vec['id']?>,'<?php echo $vec['nombreCliente']?>','<?php echo $vec['telfCliente']?>','<?php echo $vec['numPersonas']?>','<?php echo $vec['fecha']?>','<?php echo $vec['turno']?>','<?php echo $vec['observaciones']?>'); updateTurnosDisp('<?php echo $vec['turno']?>')"><img style='width: 32px; height: 32px;' id='edit_icon' id='añadir' src='../imgs/menu_icons/edit.png' alt='editar'></div></label>
                                <?php
                                echo "</td>";

                                echo "</tr>";

                                echo "<script>seleccionarFilaInit(".$vec['id'].");</script>";
                            }
                            echo "</table>";
                        } else {
                            echo "<h2>No se encontraron resultados</h2>";
                        }
                        echo "</div>";
                        echo "<hr style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin-bottom: 0px;'>";
                    }
                    ?>
                </div>
                <script src="../js/mostrarAccionesUsr.js"></script>
                <script src="../js/funcionesAdmin.js"></script>
    <?php
                desconectar($conex);
            }else{
                $_SESSION["sinPermisos"] = "true";
                header("Location: ../index.php");
            }
        }else{header("Location: ../index.php");}
    ?>
    </body>

    <script>

        //Para refrescar la pagina a los 1 minuto de inactividad, por si hay nuevas reservas
        let timeout;

        function resetTimer() {
            // Si hay un temporizador en marcha, lo cancelamos
            clearTimeout(timeout);
            // Creamos uno nuevo: refrescar tras 1 minuto de inactividad
            timeout = setTimeout(() => {
            location.reload(); // Recarga la página
            }, 60000); // 60000 ms = 1 minuto
        }

        // Eventos que consideramos como "actividad del usuario"
        window.onload = resetTimer;
        document.onmousemove = resetTimer;
        document.onkeypress = resetTimer;
        document.onscroll = resetTimer;
        document.onclick = resetTimer;
    </script>
</html>