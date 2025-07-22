<?php
    include("../../util/db.php");
    session_start();
    if (isset($_SESSION["nombre"])) {
        if ($_POST["pwdAct"] != "" && $_POST["pwd"] != "" && $_POST["pwdRepe"] != "") {
            $pwd = $_POST["pwd"];
            $pwdRepe = $_POST["pwdRepe"];
            $pwdAct = $_POST["pwdAct"];
            $conex = conectar("reservas_negocios");
            $consulta = "SELECT pwd FROM negocios WHERE id = ".$_SESSION["idNegocio"];
            
            if ($rs = mysqli_query($conex, $consulta)) {
                while ($vec = mysqli_fetch_array($rs)) {
                    if (password_verify($pwdAct, $vec["pwd"])) {
                        if ($pwd == $pwdRepe) {
                            $pwdHashed = password_hash($pwd, PASSWORD_BCRYPT);
                            $consulta = "UPDATE negocios SET pwd = '$pwdHashed' WHERE id = ".$_SESSION["idNegocio"];
                            if (mysqli_query($conex, $consulta)) {
                                $_SESSION["cambiado"] = "true";
                                header('Location: index.php');
                            } else {
                                $_SESSION["cambiado"] = "false";
                                header('Location: index.php');
                            }
                        } else {
                            $_SESSION["repeMal"] = "true";
                            header('Location: index.php');
                        }
                    } else {
                        $_SESSION["contraIncorr"] = "true";
                        header('Location: index.php');
                    }
                }
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
