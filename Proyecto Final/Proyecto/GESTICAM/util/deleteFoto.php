<?php
    include("../util/db.php");
	session_start();
    if (isset($_SESSION["nombre"])) {
        $carpeta = "../imgs/users";
        $consulta = "UPDATE usuarios SET foto='' WHERE id='".$_SESSION['idUsr']."'";
        $conex = conectar("campo_trufas");

        $_SESSION["foto"] = "";

        if(file_exists($carpeta."/foto".$_SESSION["nombre"].".png")) {
            unlink($carpeta."/foto".$_SESSION["nombre"].".png");
        }
        if(file_exists($carpeta."/foto".$_SESSION["nombre"].".jpg")) {
            unlink($carpeta."/foto".$_SESSION["nombre"].".jpg");
        }

        if(mysqli_query($conex, $consulta)) {
            header('Location: perfil.php?cambiado=true');
        } else {header('Location: perfil.php?cambiado=false');}
    } else {header('Location: ../index.php');}
?>