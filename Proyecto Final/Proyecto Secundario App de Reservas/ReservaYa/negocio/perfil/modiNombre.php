<?php
    include("../../util/db.php");
	session_start();
    if (isset($_SESSION["nombre"])) {
        if ($_POST["nombre"] != "") {
            $nombre = $_POST["nombre"];
            $conex = conectar("reservas_negocios");
            $consulta = "UPDATE negocios SET nombre = '$nombre' WHERE id = ".$_SESSION["idNegocio"];

            if(mysqli_query($conex, $consulta)) {
                $_SESSION["nombreNegocio"] = $nombre;
                $_SESSION["cambiado"] = "true";
                header('Location: index.php');
            } else {
                $_SESSION["cambiado"] = "false";
                header('Location: index.php');
            }
        } else {header('Location: index.php');}
    } else {header('Location: ../../index.php');}
?>