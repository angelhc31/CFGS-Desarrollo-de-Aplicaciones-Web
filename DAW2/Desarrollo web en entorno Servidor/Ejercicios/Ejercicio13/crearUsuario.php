<?php
    include("db.php");
    if ($_POST["usuario"] != ""){
        $conex = conectar("ferreteria");
        $user = $_POST["usuario"];
        $pwd = $_POST["paswd"];
        $pwd = password_hash($pwd, PASSWORD_BCRYPT);
        $type = $_POST["tipo"];
        $sql = "insert into usuarios (cnombre, cpwd, ntipo) values ('$user', '$pwd', '$type')";
        $consulta = "SELECT * FROM usuarios WHERE cnombre = '$user'";

        if ($conex) {
            if ($rs = mysqli_query($conex, $consulta)) {
                if(mysqli_num_rows($rs) == 0){
                    if (mysqli_query($conex, $sql)) {
                        echo "<script language='javascript'> alert('Dado de alta');</script>";
                    }
                }else{
                    echo "<script language='javascript'> alert('El nombre de usuario ya está en uso');</script>";
                }
            }
        }
        desconectar($conex);
    }
    echo "<script language='javascript'>history.go(-1);</script>";
?>