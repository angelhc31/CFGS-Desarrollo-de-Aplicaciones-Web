<?php
    include("../util/db.php");
	session_start();
    if (isset($_SESSION["nombre"])) {
        if ($_POST["nombre"] != "" && $_POST["apellidos"] != "") {
            $nombre = $_POST["nombre"];
            $apellidos = $_POST["apellidos"];
            $conex = conectar("campo_trufas");
            $consulta = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos' WHERE id = ".$_SESSION["idUsr"];

            if(mysqli_query($conex, $consulta)) {
                header('Location: perfil.php?cambiado=true');
            } else {header('Location: perfil.php?cambiado=false');}
        } else {header('Location: perfil.php');}
    } else {header('Location: ../index.php');}
?>