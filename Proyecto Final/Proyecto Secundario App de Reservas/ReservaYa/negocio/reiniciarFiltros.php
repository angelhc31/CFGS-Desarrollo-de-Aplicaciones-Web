<?php
	session_start();
    if (isset($_SESSION["nombre"])) {
        $_SESSION["filtroNombre"] = "";
        $_SESSION["filtroFecha"] = "";
        $_SESSION["filtroTurno"] = "";
        $_SESSION["filtroEstado"] = "";
    }
    header('Location: verReservas.php');
?>