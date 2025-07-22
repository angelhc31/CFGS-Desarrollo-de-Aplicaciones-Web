<?php
    include("../util/db.php");
	session_start();
    if (isset($_SESSION["nombre"])) {
        if ($_POST["mail"] != "") {
            $mail = $_POST["mail"];
            $conex = conectar("campo_trufas");
            $consulta = "UPDATE usuarios SET mail = '$mail' WHERE id = ".$_SESSION["idUsr"];
            
            if (mysqli_query($conex, $consulta)) {
                header('Location: perfil.php?cambiado=true');
            } else {header('Location: perfil.php?cambiado=false');}
        } else {header('Location: perfil.php');}
    } else {header('Location: ../index.php');}
?>