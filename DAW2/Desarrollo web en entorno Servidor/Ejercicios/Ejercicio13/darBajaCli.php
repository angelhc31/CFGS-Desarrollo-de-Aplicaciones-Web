<?php
    include("db.php");
	session_start();

    if (isset($_SESSION["nombre"])){
        if($_SESSION["tipo"] == 1){
            $conex = conectar("ferreteria");
            $code = $_POST["code"];
            $delete = "DELETE FROM clientes WHERE ncodigo = '$code'";
            $consulta = "SELECT * FROM cab_ped WHERE ncliente = '$code'";

            if ($conex) {
                if ($rs = mysqli_query($conex, $consulta)) {
                    if(mysqli_num_rows($rs) == 0){
                        if (mysqli_query($conex, $delete)) {
                            echo "Usuario: ".$_SESSION["nombre"]." <a href=cerrarSesion.php>cerrar sesion</a><br><br>";
                            echo "Cliente borrado <a href='index.php'>Volver</a>";
                        }
                    }else{
                        echo "Usuario: ".$_SESSION["nombre"]." <a href=cerrarSesion.php>cerrar sesion</a><br><br>";
                        echo "No se puedo borrar al cliente porque tiene pedidos asociados <a href='index.php'>Volver</a>";
                    }
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