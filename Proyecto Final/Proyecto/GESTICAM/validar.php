<?php
    include("util/db.php");
	session_start();
    if (!isset($_SESSION["nombre"])) {
        $conex = conectar("campo_trufas");
        $usr = $_POST["usr"];
        $pwd = $_POST["pwd"];
        $consulta = "SELECT pwd, esAdmin, nombreUsr, id, foto FROM usuarios WHERE nombreUsr = '$usr'";

        if($rs = mysqli_query($conex, $consulta)){
            while ($vec = mysqli_fetch_array($rs)){
                if ($usr == $vec["nombreUsr"] && password_verify($pwd, $vec["pwd"])) {
                    $_SESSION["admin"] = $vec["esAdmin"];
                    $_SESSION["idUsr"] = $vec["id"];
                    $_SESSION["nombre"] = $vec["nombreUsr"];
                    $_SESSION["foto"] = $vec["foto"];
                }
            }
        }
        desconectar($conex);
    }
    header('Location: index.php?fallo=true');
?>