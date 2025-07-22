<?php
    include("../util/db.php");
	session_start();
    if (isset($_SESSION["nombre"])) {
        $carpeta = "../imgs/users";
        $foto = $_FILES['foto']['name'];
        $direccion = $carpeta."/".$foto;

        if ($_FILES['foto']['name'] != "") {
            if ($_FILES['foto']['type'] == "image/png" || $_FILES['foto']['type'] == "image/jpeg") {
                if (is_uploaded_file($_FILES["foto"]["tmp_name"])) {
                    if(filesize($_FILES["foto"]["tmp_name"]) != 0) {
                        move_uploaded_file($_FILES["foto"]["tmp_name"], $direccion);
                        $conex = conectar("campo_trufas");
                        $consulta = "UPDATE usuarios SET foto='foto".$_SESSION["nombre"];

                        if(file_exists($carpeta."/foto".$_SESSION["nombre"].".png")) {
                            unlink($carpeta."/foto".$_SESSION["nombre"].".png");
                        }
                        if(file_exists($carpeta."/foto".$_SESSION["nombre"].".jpg")) {
                            unlink($carpeta."/foto".$_SESSION["nombre"].".jpg");
                        }

                        if ($_FILES['foto']['type'] == "image/png") {
                            rename ($direccion, $carpeta."/foto".$_SESSION["nombre"].".png");
                            $consulta = $consulta.".png'";
                        }
                        if ($_FILES['foto']['type'] == "image/jpeg") {
                            rename ($direccion, $carpeta."/foto".$_SESSION["nombre"].".jpg");
                            $consulta = $consulta.".jpg'";
                        }
                        
                        $consulta = $consulta." WHERE id='".$_SESSION['idUsr']."'";
                        if(mysqli_query($conex, $consulta)) {
                            $consulta = "SELECT foto FROM usuarios WHERE id='".$_SESSION['idUsr']."'";
                            if($rs = mysqli_query($conex, $consulta)) {
                                while ($vec = mysqli_fetch_array($rs)) {
                                    $_SESSION["foto"] = $vec["foto"];
                                }
                                header('Location: perfil.php?cambiado=true');
                            } else {header('Location: perfil.php?cambiado=false');}
                        } else {header('Location: perfil.php?cambiado=false');}
                    } else {header('Location: perfil.php');}
                } else {header('Location: perfil.php');}
            } else {header('Location: perfil.php?formatoIncorr=true');}
        } else {header('Location: perfil.php?vacio=true');}
    } else {header('Location: ../index.php');}
?>