<?php
    include("../util/db.php");
	session_start();
    if (isset($_SESSION["nombre"])) {
        if ($_POST["usr"] != "") {
            $usr = $_POST["usr"];
            $conex = conectar("campo_trufas");
            $consulta = "SELECT nombreUsr FROM usuarios WHERE nombreUsr = '$usr'";

            if($rs = mysqli_query($conex, $consulta)) {
                if(mysqli_num_rows($rs) == 0) {
                    $consulta = "UPDATE usuarios SET nombreUsr = '$usr' WHERE id = ".$_SESSION["idUsr"];
                    if (mysqli_query($conex, $consulta)) {
                        $_SESSION["nombre"] = $usr;
                        header('Location: perfil.php?cambiado=true');
                    } else {header('Location: perfil.php?cambiado=false');}
                } else {header('Location: perfil.php?usrExist=true');}
            } else {header('Location: perfil.php?cambiado=false');}
        } else {header('Location: perfil.php');}
    } else {header('Location: ../index.php');}
?>