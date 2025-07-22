<?php
    include("db.php");
	session_start();

    if (!isset($_SESSION["nombre"])) {
        $conex = conectar("ferreteria");
        $usr = $_POST["usuario"];
        $pwd = $_POST["paswd"];
        $consulta = "select cpwd, ntipo, cnombre from usuarios where cnombre=?";

        if($stmt= mysqli_prepare($conex, $consulta)){
            mysqli_stmt_bind_param($stmt, "s", $usr);

            if($rs=mysqli_stmt_execute($stmt)){
                mysqli_stmt_bind_result($stmt,$cpwd,$ntipo,$cnombre);
                while (mysqli_stmt_fetch($stmt)){
                    if ($usr == $cnombre && password_verify($pwd, $cpwd)) {
                        $_SESSION["nombre"] = $cnombre;
                        $_SESSION["tipo"] = $ntipo;
                    }
                }
            }
        }
        desconectar($conex);
    }
    header('Location: index.php');
?>