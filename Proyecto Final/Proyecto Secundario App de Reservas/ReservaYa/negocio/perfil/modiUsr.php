<?php
    include("../../util/db.php");
	session_start();
    if (isset($_SESSION["nombre"])) {
        if ($_POST["usr"] != "") {
            $usr = $_POST["usr"];
            $conex = conectar("reservas_negocios");
            $consulta = "SELECT nomUsr FROM negocios WHERE nomUsr = '$usr'";

            if($rs = mysqli_query($conex, $consulta)) {
                if(mysqli_num_rows($rs) == 0) {
                    $consulta = "UPDATE negocios SET nomUsr = '$usr' WHERE id = ".$_SESSION["idNegocio"];
                    if (mysqli_query($conex, $consulta)) {
                        $_SESSION["nombre"] = $usr;
                        $_SESSION["cambiado"] = "true";
                        header('Location: index.php');
                    } else {
                        $_SESSION["cambiado"] = "false";
                        header('Location: index.php');
                    }
                } else {
                    $_SESSION["usrExist"] = "true";
                    header('Location: index.php');
                }
            } else {
                $_SESSION["cambiado"] = "false";
                header('Location: index.php');
            }
        } else {
            $_SESSION["error"] = "true";
            header('Location: index.php');
        }
    } else {header('Location: ../../index.php');}
?>