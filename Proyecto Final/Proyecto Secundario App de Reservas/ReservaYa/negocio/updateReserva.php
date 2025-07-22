<?php
include("../util/db.php");
session_start();
if (isset($_SESSION["nombre"])) {
    if ($_SESSION["activo"]) {
        $conex = conectar("reservas_negocios");

        // Validar que el método sea POST y que id esté definido (para update)
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['id'])) {
            // Sanear y obtener variables del formulario
            $id = intval($_POST['id']);
            $nombre = mb_strtoupper(trim($_POST["nombre"]), 'UTF-8');
            $telf = mysqli_real_escape_string($conex, $_POST['telf']);
            $personas = intval($_POST['personas']);
            $turno = intval($_POST['hora']);
            $fecha = $_POST['fecha'];
            $observaciones = trim($_POST["observaciones"]);

            if (strpos($fecha, '/') !== false) {
                // Viene como d/m/Y, transformamos para formato correcto
                $fechaObj = DateTime::createFromFormat('d/m/Y', $fecha);
                $fecha = $fechaObj ? $fechaObj->format('Y-m-d') : null;
            }
            $fecha = mysqli_real_escape_string($conex, $fecha);

            // Preparar consulta UPDATE
            $sql = "UPDATE reservas SET 
                        nombreCliente = '$nombre',
                        telfCliente = '$telf',
                        numPersonas = $personas,
                        fecha = '$fecha',
                        turno = $turno,
                        observaciones = '$observaciones'
                    WHERE id = $id";

            if (mysqli_query($conex, $sql)) {
                //Refrescar Tabla
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
                }
            } else {
                echo "<h2>Ha ocurrido un error, vuelve a intentarlo y si el problema persiste contacta con soporte.</h2>";
            }
        }

        desconectar($conex);
    }
}
?>
