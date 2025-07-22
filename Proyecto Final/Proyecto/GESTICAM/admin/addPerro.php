<?php
    include("../util/db.php");
	session_start();
    
    if(isset($_SESSION["nombre"])){
        if ($_SESSION["admin"]) {
            if (isset($_POST["name"]) && isset($_POST["fech_nacimiento"])) {
                $conex = conectar("campo_trufas");
                $carpeta = "../imgs/perros";
                $foto = $_FILES['foto']['name'];
                $direccion = $carpeta."/".$foto;
                $consulta = "INSERT INTO perros (nombre, fech_nacimiento) VALUES ('".$_POST['name']."', '".$_POST['fech_nacimiento']."');";

                if(mysqli_query($conex, $consulta)) {
                    if ($_FILES['foto']['name'] != "") {
                        if ($_FILES['foto']['type'] == "image/png" || $_FILES['foto']['type'] == "image/jpeg") {
                            $consulta = "SELECT id FROM perros WHERE id=(SELECT max(id) FROM perros);";
                            if($rs = mysqli_query($conex, $consulta)) {
                                $idPerro = mysqli_fetch_assoc($rs);
                                $consulta = "UPDATE perros SET foto='fotoPerro".$idPerro["id"];
                                if (is_uploaded_file($_FILES["foto"]["tmp_name"])) {
                                    if(filesize($_FILES["foto"]["tmp_name"]) != 0) {
                                        move_uploaded_file($_FILES["foto"]["tmp_name"], $direccion);
                                        if(file_exists($carpeta."/fotoPerro".$idPerro["id"].".png")) {
                                            unlink($carpeta."/fotoPerro".$idPerro["id"].".png");
                                        }
                                        if(file_exists($carpeta."/fotoPerro".$idPerro["id"].".jpg")) {
                                            unlink($carpeta."/fotoPerro".$idPerro["id"].".jpg");
                                        }
                
                                        if ($_FILES['foto']['type'] == "image/png") {
                                            rename ($direccion, $carpeta."/fotoPerro".$idPerro["id"].".png");
                                            $consulta = $consulta.".png'";
                                        }
                                        if ($_FILES['foto']['type'] == "image/jpeg") {
                                            rename ($direccion, $carpeta."/fotoPerro".$idPerro["id"].".jpg");
                                            $consulta = $consulta.".jpg'";
                                        }
                                        $consulta = $consulta." WHERE id=".$idPerro["id"];
                                        if(!mysqli_query($conex, $consulta)) {
                                            header("Location: verPerros.php?error=true");
                                        }
                                    }
                                }
                            }
                            header("Location: verPerros.php?edited=true");
                        } else {header('Location: verPerros.php?formatoIncorr=true');}
                    } else {header("Location: verPerros.php?edited=true");}
                } else {header("Location: verPerros.php?error=true");}
                desconectar($conex);
            } else{header("Location: verPerros.php");}
        } else{header("Location: ../index.php");}
    } else{header("Location: ../index.php");}
?>