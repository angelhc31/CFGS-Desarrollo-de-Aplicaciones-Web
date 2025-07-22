<?php
    session_start();
    include("../util/db.php");
    if(isset($_SESSION["idNegocio"])){
?>
    <select id = "selectHoraReserva" name="hora" required>
        <option hidden selected value="">Hora</option>
        <?php
        if(!isset($_POST["fechaReserva"]) || $_POST["fechaReserva"] == "" || !isset($_POST["numPersonas"]) || $_POST["numPersonas"] == ""){
            echo "<option disabled>Rellena todos los campos para ver las horas disponibles</option>";
        } else {
            $conex = conectar("reservas_negocios");

            $fecha = $_POST["fechaReserva"];
            if (strpos($fecha, '/') !== false) {
                // Viene como d/m/Y, transformamos para formato correcto
                $fechaObj = DateTime::createFromFormat('d/m/Y', $fecha);
                $fecha = $fechaObj ? $fechaObj->format('Y-m-d') : null;
            }
            $fecha = mysqli_real_escape_string($conex, $fecha);

            if (isset($_POST["idReserva"])) {
                $consulta = "
                SELECT t.id, t.nombre
                FROM turnos t
                LEFT JOIN (
                    SELECT turno, SUM(numPersonas) AS totalReservadas
                    FROM reservas
                    WHERE fecha = '" . $fecha . "'
                    AND estado != 3
                    AND id != " . intval($_POST["idReserva"]) . "
                    GROUP BY turno
                ) r ON t.id = r.turno
                WHERE t.negocio = '" . $_SESSION["idNegocio"] . "'
                AND (IFNULL(r.totalReservadas, 0) + " . intval($_POST["numPersonas"]) . " <= t.maxPersonas)
                AND (
                    '" . $fecha . "' <> CURRENT_DATE
                    OR t.nombre > CURRENT_TIME
                )
                ORDER BY t.nombre";
            } else {
                $consulta = "
                SELECT t.id, t.nombre
                FROM turnos t
                LEFT JOIN (
                    SELECT turno, SUM(numPersonas) AS totalReservadas
                    FROM reservas
                    WHERE fecha = '" . $fecha . "'
                    AND estado != 3
                    GROUP BY turno
                ) r ON t.id = r.turno
                WHERE t.negocio = '" . $_SESSION["idNegocio"] . "'
                AND (IFNULL(r.totalReservadas, 0) + " . intval($_POST["numPersonas"]) . " <= t.maxPersonas)
                AND (
                    '" . $fecha . "' <> CURRENT_DATE
                    OR t.nombre > CURRENT_TIME
                )
                ORDER BY t.nombre";
            }
            
            $hayOpciones = false;
            if($rs = mysqli_query($conex, $consulta)){
                while ($vec = mysqli_fetch_array($rs)){
                    $hayOpciones = true;
                    if (isset($_POST["turnoSelecc"]) && $_POST["turnoSelecc"] != "") {
                        if ($_POST["turnoSelecc"] == $vec["id"]) {
                            echo "<option selected value='" . $vec["id"] . "'>" . date('H:i', strtotime($vec["nombre"])) . "</option>";
                        } else {
                            echo "<option value='" . $vec["id"] . "'>" . date('H:i', strtotime($vec["nombre"])) . "</option>";
                        }
                        
                    } else {
                        echo "<option value='" . $vec["id"] . "'>" . date('H:i', strtotime($vec["nombre"])) . "</option>";
                    }
                }
            }
            if (!$hayOpciones) {
                echo "<option disabled>No hay sitio disponible</option>";
            }
        }
        ?>
    </select>
<?php
    }
?>