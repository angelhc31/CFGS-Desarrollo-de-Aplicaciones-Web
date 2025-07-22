<?php
    include("../util/db.php");
	session_start();
    if (isset($_SESSION["nombre"])) {
        if (!$_SESSION["admin"]) {
            if ($_POST["perro"] != "" && $_POST["zona"] != "" && $_POST["peso"] != "" && $_POST["fecha"] != "") {
                $conex = conectar("campo_trufas");
                $recolector = $_SESSION["idUsr"];
                $perro = $_POST["perro"];
                $zona = $_POST["zona"];
                $peso = $_POST["peso"];
                $fecha = $_POST["fecha"];
                $fechaActual = date("Y")."-".date("m")."-".date("d");
                $consulta = "INSERT INTO recolectas (recolector, perro, zona, peso, fecha) VALUES ('$recolector', '$perro', '$zona', '$peso', '$fecha')";

                if ($fechaActual < $fecha) {
                    header('Location: index.php?fechaErr=true');
                } else {
                    if(mysqli_query($conex, $consulta)) {
                        $consulta = "SELECT ultRecolecta FROM zonas WHERE id=$zona";
                        if ($rs = mysqli_query($conex, $consulta)) {
                            while ($vec=mysqli_fetch_assoc($rs)) {
                                if ($vec["ultRecolecta"] < $fecha) {
                                    $consulta = "UPDATE zonas SET ultRecolecta='$fecha' WHERE id=$zona";
                                    mysqli_query($conex, $consulta);
                                }
                            }
                        }
                        header('Location: index.php?registrado=true');
                    } else {
                        header('Location: index.php?registrado=false');
                    }
                }
                desconectar($conex);
            } else {
                header('Location: index.php?formIncompleto=true');
            }
        } else {header('Location: index.php');}
    } else {header('Location: index.php');}
?>