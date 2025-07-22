<?php
    include("../util/db.php");
    session_start();

    if(isset($_SESSION["nombre"])){
        if ($_SESSION["admin"]) {
            if (isset($_POST["nameZona"]) && isset($_POST["areaZona"]) && isset($_POST["nombreActual"]) && isset($_POST["areaActual"]) && isset($_POST["idZona"])) {
                $conex = conectar("campo_trufas");

                if ($_POST["nameZona"] == "") {
                    $_POST["nameZona"] = $_POST["nombreActual"];
                }

                if ($_POST["areaZona"] == "") {
                    $_POST["areaZona"] = $_POST["areaActual"];
                }

                $sql = "UPDATE zonas SET nombre = '".$_POST["nameZona"]."', area = ".$_POST["areaZona"]." WHERE id=".$_POST["idZona"];

                if($rs=mysqli_query($conex,$sql)){
                    header("Location: verZonas.php?edited=true");
                }else {header("Location: verZonas.php?error=true");}
                desconectar($conex);
            }else{header("Location: verZonas.php");}
        }else{header("Location: ../index.php");}
    }else{header("Location: ../index.php");}
?>