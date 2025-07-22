<?php
    include("../../util/db.php");
	session_start();
    if (isset($_SESSION["nombre"])) {
        $carpeta = "../../imgs/users";
        $consulta = "UPDATE negocios SET foto='' WHERE id='".$_SESSION['idNegocio']."'";
        $conex = conectar("reservas_negocios");
        echo $consulta;
        $_SESSION["foto"] = "";

        if(file_exists($carpeta."/foto".$_SESSION["nombre"].".png")) {
            unlink($carpeta."/foto".$_SESSION["nombre"].".png");
        }
        if(file_exists($carpeta."/foto".$_SESSION["nombre"].".jpg")) {
            unlink($carpeta."/foto".$_SESSION["nombre"].".jpg");
        }

        if(mysqli_query($conex, $consulta)) {
            $_SESSION["cambiado"] = "true";
            header('Location: index.php');
        } else {
            $_SESSION["cambiado"] = "false";
            header('Location: index.php');
        }
    } else {header('Location: ../../index.php');}
?>