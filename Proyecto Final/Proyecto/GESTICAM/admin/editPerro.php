<?php
    include("../util/db.php");
    session_start();

    if(isset($_SESSION["nombre"])){
        if ($_SESSION["admin"]) {
            if (isset($_POST["namePerro"]) && isset($_POST["fech_nacimientoEdit"]) && isset($_POST["nombreActual"]) && isset($_POST["nacimiento_actual"]) && isset($_POST["idPerro"]) && isset($_POST["borrarFoto"]) && isset($_FILES["fotoPerroNueva"]["name"])) {
                $conex = conectar("campo_trufas");

                if ($_POST["namePerro"] == "") {
                    $_POST["namePerro"] = $_POST["nombreActual"];
                }
                if ($_POST["fech_nacimientoEdit"] == "") {
                    $_POST["fech_nacimientoEdit"] = $_POST["nacimiento_actual"];
                }


                $sql = "UPDATE perros SET nombre = '".$_POST["namePerro"]."', fech_nacimiento = '".$_POST["fech_nacimientoEdit"]."'";
                $finConsulta = " WHERE id=".$_POST["idPerro"];

                if ($_POST["borrarFoto"]) {
                    $sql = $sql.", foto = ''";
                    
                    $verFoto = "SELECT foto FROM perros WHERE id='".$_POST['idPerro']."'";
                    if ($rs = mysqli_query($conex,$verFoto)) {
                        $carpeta = "../imgs/perros/";
                        $fotoPerro=mysqli_fetch_assoc($rs);
                        
                        if(file_exists($carpeta.$fotoPerro["foto"]) && !is_dir($carpeta.$fotoPerro["foto"])) {
                            unlink($carpeta.$fotoPerro["foto"]);
                        }
                    }
                } else {
                    if ($_FILES['fotoPerroNueva']['name'] != "") {
                        if ($_FILES['fotoPerroNueva']['type'] == "image/png" || $_FILES['fotoPerroNueva']['type'] == "image/jpeg") {
                            if (is_uploaded_file($_FILES["fotoPerroNueva"]["tmp_name"])) {
                                if(filesize($_FILES["fotoPerroNueva"]["tmp_name"]) != 0) {

                                    $verFoto = "SELECT foto FROM perros WHERE id='".$_POST['idPerro']."'";
                                    if ($rs = mysqli_query($conex,$verFoto)) {
                                        $carpeta = "../imgs/perros/";
                                        $fotoPerro=mysqli_fetch_assoc($rs);
                                        $direccion = $carpeta.$_FILES['fotoPerroNueva']['name'];
                                        move_uploaded_file($_FILES["fotoPerroNueva"]["tmp_name"], $direccion);

                                        $sql = $sql.", foto = 'fotoPerro".$_POST['idPerro'];

                                        if(file_exists($carpeta.$fotoPerro["foto"]) && !is_dir($carpeta.$fotoPerro["foto"])) {
                                            unlink($carpeta.$fotoPerro["foto"]);
                                        }

                                        if ($_FILES['fotoPerroNueva']['type'] == "image/png") {
                                            rename ($direccion, $carpeta."/fotoPerro".$_POST['idPerro'].".png");
                                            $sql = $sql.".png'";
                                        }
                                        if ($_FILES['fotoPerroNueva']['type'] == "image/jpeg") {
                                            rename ($direccion, $carpeta."/fotoPerro".$_POST['idPerro'].".jpg");
                                            $sql = $sql.".jpg'";
                                        }
                                    } else {header("Location: verPerros.php?error=true");}
                                } else {header("Location: verPerros.php?error=true");}
                            } else {header("Location: verPerros.php?error=true");}
                        } else {header('Location: verPerros.php?formatoIncorr=true');}
                    }
                }

                $sql = $sql.$finConsulta;

                if($rs=mysqli_query($conex,$sql)){
                    if ($_FILES['fotoPerroNueva']['name'] != "") {
                        if ($_FILES['fotoPerroNueva']['type'] != "image/png" && $_FILES['fotoPerroNueva']['type'] != "image/jpeg") {
                            header("Location: verPerros.php?formatoIncorr=true");
                        } else {header("Location: verPerros.php?edited=true");}
                    } else {header("Location: verPerros.php?edited=true");}
                } else {header("Location: verPerros.php?error=true");}
                desconectar($conex);
            } else {header("Location: verPerros.php");}
        } else {header("Location: ../index.php");}
    } else {header("Location: ../index.php");}
?>