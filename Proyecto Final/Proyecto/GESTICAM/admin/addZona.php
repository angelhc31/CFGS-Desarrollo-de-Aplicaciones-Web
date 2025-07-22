<?php
    include("../util/db.php");
	session_start();
    
    if(isset($_SESSION["nombre"])){
        if ($_SESSION["admin"]) {
            if (isset($_POST["name"]) && isset($_POST["area"])) {
                $conex = conectar("campo_trufas");

                $consulta = "INSERT INTO zonas (nombre, area) VALUES ('".$_POST['name']."', ".$_POST['area'].")";

                if(mysqli_query($conex, $consulta)) {
                    header("Location: verZonas.php?added=true");
                } else {header("Location: verZonas.php?error=true");}

                desconectar($conex);
            }else{header("Location: verZonas.php");}
        } else{header("Location: ../index.php");}
    } else{header("Location: ../index.php");}
?>