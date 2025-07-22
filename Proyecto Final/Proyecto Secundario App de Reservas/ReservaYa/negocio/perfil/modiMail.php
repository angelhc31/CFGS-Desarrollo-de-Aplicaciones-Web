<?php
    include("../../util/db.php");
    session_start();
    if (isset($_SESSION["nombre"])) {
        if ($_POST["mail"] != "") {
            $mail = $_POST["mail"];
            $conex = conectar("reservas_negocios");
            $consulta = "UPDATE negocios SET mail = '$mail' WHERE id = ".$_SESSION["idNegocio"];
            
            if (mysqli_query($conex, $consulta)) {
                $_SESSION["cambiado"] = "true";
                header('Location: index.php');
            } else {
                $_SESSION["cambiado"] = "false";
                header('Location: index.php');
            }
        } else {
            $_SESSION["error"] = "true";
            header('Location: index.php');
        }
    } else {
        header('Location: ../../index.php');
    }
?>
