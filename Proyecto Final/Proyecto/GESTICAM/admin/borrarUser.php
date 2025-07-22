<?php
    include("../util/db.php");
    session_start();

    if(isset($_SESSION["nombre"])) {
        if ($_SESSION["admin"]) {
            if (isset($_GET["id"]) && isset($_GET["esAdmin"])) {
                $conex = conectar("campo_trufas");
                $sql = "DELETE FROM usuarios WHERE id=".$_GET["id"];

                $verName = "SELECT foto FROM usuarios WHERE id='".$_GET['id']."'";
                if ($rs2 = mysqli_query($conex,$verName)) {
                    $carpeta = "../imgs/users/";
                    $nUsr=mysqli_fetch_assoc($rs2);
                    
                    if(file_exists($carpeta.$nUsr["foto"])) {
                        unlink($carpeta.$nUsr["foto"]);
                    }
                    if(file_exists($carpeta.$nUsr["foto"])) {
                        unlink($carpeta.$nUsr["foto"]);
                    }
                }

                if($rs=mysqli_query($conex,$sql)){
                    if ($_GET["esAdmin"]) {
                        header("Location: verAdmins.php?eliminado=true");
                    } else {
                        header("Location: verRecolectores.php?eliminado=true");
                    }
                } else {
                    if ($_GET["esAdmin"]) {
                        header("Location: verAdmins.php?error=true");
                    } else {
                        header("Location: verRecolectores.php?error=true");
                    }
                }
                desconectar($conex);
            }else{header("Location: ../index.php");}
        }else{header("Location: ../index.php");}
    }else{header("Location: ../index.php");}
?>