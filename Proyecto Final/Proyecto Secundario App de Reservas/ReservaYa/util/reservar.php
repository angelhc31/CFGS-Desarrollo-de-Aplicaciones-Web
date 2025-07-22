<?php
session_start();
include("../util/db.php");

if (isset($_SESSION["idNegocio"])) {
    $conex = conectar("reservas_negocios");

    // Escapar los datos del formulario
    $nombre = mb_strtoupper(trim($_POST["nombre"]), 'UTF-8');
    $telf = mb_strtoupper(trim($_POST["telf"]), 'UTF-8');
    $personas = intval($_POST["personas"]);
    $fecha = mb_strtoupper(trim($_POST["fecha"]), 'UTF-8');
    $hora = intval($_POST["hora"]);
    $idNegocio = intval($_SESSION["idNegocio"]);
    $observaciones = trim($_POST["observaciones"]);

    $consulta = "
        INSERT INTO reservas (negocio, nombreCliente, telfCliente, numPersonas, fecha, turno, estado, observaciones)
        VALUES ('$idNegocio', '$nombre', '$telf', '$personas', '$fecha', '$hora', '1', '$observaciones')
    ";

    if (mysqli_query($conex, $consulta)) {
        $_SESSION["registrado"] = "true";
        if (!empty($_SERVER['HTTP_REFERER'])) {
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit;
        }
    } else {
        $_SESSION["registrado"] = "false";
    }
}
?>