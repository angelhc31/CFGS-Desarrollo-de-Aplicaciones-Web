<?php
    include("../util/db.php");
    session_start();

    if(isset($_SESSION["nombre"])){
        if (!$_SESSION["admin"]) {
            if (isset($_POST["id"]) && isset($_POST["fecha"]) && isset($_POST["peso"]) && isset($_POST["perro"]) && isset($_POST["zona"]) && isset($_POST["pesoActual"])) {
                $conex = conectar("campo_trufas");
                $consulta = "UPDATE recolectas SET ";

                if ($_POST["peso"] == "") {
                    $_POST["peso"] = $_POST["pesoActual"];
                }

                $consulta = $consulta."peso=".$_POST["peso"];

                if ($_POST["fecha"] != "") {
                    $consulta = $consulta.",fecha='".$_POST["fecha"]."'";
                }

                if ($_POST["perro"] != "") {
                    $consulta = $consulta.",perro=".$_POST["perro"];
                }

                if ($_POST["zona"] != "") {
                    $consulta = $consulta.",zona=".$_POST["zona"];
                }

                $consulta = $consulta." WHERE id=".$_POST["id"];

                if($rs=mysqli_query($conex,$consulta)){
                    $consulta = "SELECT * FROM zonas";
                    $result = mysqli_query($conex,$consulta);
                    while ($zonas = mysqli_fetch_assoc($result)) {
                        $consulta = "SELECT MAX(fecha) AS ultRecolecta FROM recolectas WHERE zona=".$zonas["id"];
                        $rs2=mysqli_query($conex,$consulta);
                        $ultFecha = mysqli_fetch_assoc($rs2);
                        $cambiarUltRecolecta = "UPDATE zonas SET ultRecolecta='".$ultFecha["ultRecolecta"]."' WHERE id=".$zonas["id"];
                        mysqli_query($conex,$cambiarUltRecolecta);
                    }
                    header("Location: verRecolectasUsr.php?edited=true");
                }else {header("Location: verRecolectasUsr.php?error=true");}
                desconectar($conex);
            }else{header("Location: verRecolectasUsr.php");}
        }else{header("Location: ../index.php");}
    }else{header("Location: ../index.php");}
?>