<?php
    include("util/db.php");
	session_start();
    $paramsRetorno = "?";
    if (!isset($_SESSION["nombre"])) {
        $conex = conectar("reservas_negocios");
        $usr = $_POST["usr"];
        $pwd = $_POST["pwd"];
        $consulta = "SELECT nombre, pwd, activo, nomUsr, id, foto FROM negocios WHERE nomUsr = '$usr'";

        if($rs = mysqli_query($conex, $consulta)){
            while ($vec = mysqli_fetch_array($rs)){
                if ($usr == $vec["nomUsr"] && password_verify($pwd, $vec["pwd"])) {
                    if ($vec["activo"]) {
                        $_SESSION["nombreNegocio"] = $vec["nombre"];
                        $_SESSION["activo"] = $vec["activo"];
                        $_SESSION["idNegocio"] = $vec["id"];
                        $_SESSION["nombre"] = $vec["nomUsr"];
                        $_SESSION["foto"] = $vec["foto"];

                        $_SESSION["filtroNombre"] = "";
                        $_SESSION["filtroFecha"] = "";
                        $_SESSION["filtroTurno"] = "";
                        $_SESSION["filtroEstado"] = "";
                    } else {
                        $_SESSION["sinPermisos"] = "true";
                    }
                } else {
                    $_SESSION["fallo"] = "true";
                }
            }
        }
        desconectar($conex);
    }
    header('Location: index.php');
?>