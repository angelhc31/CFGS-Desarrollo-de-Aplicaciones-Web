<?php
    include("../../util/db.php");
    session_start();
    if (isset($_SESSION["nombre"])) {
        if ($_POST["direcc"] != "") {
            $direcc = $_POST["direcc"];
            $conex = conectar("reservas_negocios");
            $consulta = "UPDATE negocios SET direcc = '$direcc' WHERE id = ".$_SESSION["idNegocio"];
            
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
