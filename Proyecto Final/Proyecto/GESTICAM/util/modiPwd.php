<?php
    include("../util/db.php");
	session_start();
    if (isset($_SESSION["nombre"])) {
        if ($_POST["pwdAct"] != "" && $_POST["pwd"] != "" && $_POST["pwdRepe"] != "") {
            $pwd = $_POST["pwd"];
            $pwdRepe = $_POST["pwdRepe"];
            $pwdAct = $_POST["pwdAct"];
            $conex = conectar("campo_trufas");
            $consulta = "SELECT pwd FROM usuarios WHERE id = ".$_SESSION["idUsr"];
            
            if ($rs = mysqli_query($conex, $consulta)) {
                while ($vec = mysqli_fetch_array($rs)){
                    if (password_verify($pwdAct, $vec["pwd"])) {
                        if ($pwd == $pwdRepe) {
                            $pwd = password_hash($pwd, PASSWORD_BCRYPT);
                            $consulta = "UPDATE usuarios SET pwd = '$pwd' WHERE id = ".$_SESSION["idUsr"];
                            if (mysqli_query($conex, $consulta)) {
                                header('Location: perfil.php?cambiado=true');
                            } else {header('Location: perfil.php?cambiado=false');}
                        } else {header('Location: perfil.php?repeMal=true');}
                    } else {header('Location: perfil.php?contraIncorr=true');}
                }
            } else {header('Location: perfil.php?cambiado=false');}
        } else {header('Location: perfil.php');}
    } else {header('Location: ../index.php');}
?>