<?php
    include("db.php");
	session_start();

    if (isset($_SESSION["nombre"])){
        if($_SESSION["tipo"] == 1){
            $conex = conectar("ferreteria");
            $code = $_POST["code"];
            $cif = $_POST["cif"];
            $name = $_POST["name"];
            $apes = $_POST["apes"];
            $telf = $_POST["telf"];
            $direc = $_POST["direc"];
            $consulta = "INSERT INTO clientes (ncodigo, ccif, cnombre, capellidos, ctelefono, cdireccion) VALUES ('$code', '$cif', '$name', '$apes', '$telf', '$direc')";

            if ($conex) {
                if (mysqli_query($conex, $consulta)) {
                    echo "Usuario: ".$_SESSION["nombre"]." <a href=cerrarSesion.php>cerrar sesion</a><br><br>";
                    echo "Cliente añadido <a href='index.php'>Volver</a>";
                }
            }
            desconectar($conex);
        }else {
            header('Location: index.php');
        }
    }else {
        header('Location: index.php');
    }
?>