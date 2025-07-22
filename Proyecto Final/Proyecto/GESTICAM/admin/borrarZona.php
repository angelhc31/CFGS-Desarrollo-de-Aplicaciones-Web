<?php
    include("../util/db.php");
    session_start();

    if(isset($_SESSION["nombre"])){
        if ($_SESSION["admin"]) {
            if (isset($_GET["id"]) && $_GET["id"]>8) {
                $conex = conectar("campo_trufas");
                $sql = "DELETE FROM zonas WHERE id=".$_GET["id"];
                if($rs=mysqli_query($conex,$sql)){
                    header("Location: verZonas.php?eliminado=true");
                } else {header("Location: verZonas.php?error=true");}
                desconectar($conex);
            }else{header("Location: verZonas.php");}
        }else{header("Location: ../index.php");}
    }else{header("Location: ../index.php");}
?>