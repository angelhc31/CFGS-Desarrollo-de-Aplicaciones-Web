<?php
    include("../util/db.php");
    session_start();

    if(isset($_SESSION["nombre"])){
        if ($_SESSION["admin"]) {
            if (isset($_GET["id"])) {
                $conex = conectar("campo_trufas");
                $sql = "DELETE FROM perros WHERE id=".$_GET["id"];
                $verfoto = "SELECT foto FROM perros WHERE id='".$_GET['id']."'";
                if ($rs2 = mysqli_query($conex,$verfoto)) {
                    $carpeta = "../imgs/perros/";
                    $fotoPerro=mysqli_fetch_assoc($rs2);
                    
                    if(file_exists($carpeta.$fotoPerro["foto"]) && !is_dir($carpeta.$fotoPerro["foto"])) {
                        unlink($carpeta.$fotoPerro["foto"]);
                    }
                }
                if($rs=mysqli_query($conex,$sql)){
                    header("Location: verPerros.php?eliminado=true");
                } else {header("Location: verPerros.php?error=false");}
                desconectar($conex);
            }else{header("Location: verPerros.php");}
        }else{header("Location: ../index.php");}
    }else{header("Location: ../index.php");}
?>