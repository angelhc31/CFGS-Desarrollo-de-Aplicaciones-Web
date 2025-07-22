<?php
    include("../util/db.php");
	session_start();
    
    if(isset($_SESSION["nombre"])){
        if ($_SESSION["admin"]) {
            if (isset($_POST["name"]) && isset($_POST["ape"]) && isset($_POST["dni"]) && isset($_POST["mail"]) && isset($_POST["telf"]) && isset($_POST["esAdmin"])) {
                $conex = conectar("campo_trufas");
                $nombreUsr = "";
                $autonumNUsr = 0;
                $consultaNUsr ="";
                $nombreValido = false;
                $pwd = "";

                $consulta = "INSERT INTO usuarios (nombre, apellidos, DNI, mail, telefono, esAdmin, nombreUsr, pwd) VALUES ('".$_POST['name']."', '".$_POST['ape']."', '".$_POST['dni']."', '".$_POST['mail']."', '".$_POST['telf']."', ".$_POST["esAdmin"].", '";

                //////////////////////////////Generando nombre usuario y contraseña///////////////////////////////
                while (!$nombreValido) {
                    $nombreUsr = substr($_POST["name"], 0, 2).substr($_POST["ape"], 0, 2).$autonumNUsr;
                    $consultaNUsr ="SELECT * FROM usuarios WHERE nombreUsr = '".$nombreUsr."'";
                    if($rs=mysqli_query($conex,$consultaNUsr)){
                        if(mysqli_num_rows($rs) == 0) {
                            $pwd = $nombreUsr.$_POST['dni'];
                            $pwd = password_hash($pwd, PASSWORD_BCRYPT);
                            $consulta = $consulta.$nombreUsr."', '".$pwd."');";
                            $pwd = $nombreUsr.$_POST['dni'];
                            $nombreValido = true;
                        } else {
                            $autonumNUsr++;
                        }
                    } else {
                        if ($_POST["esAdmin"]) {
                            header("Location: verAdmins.php?error=true");
                        } else {
                            header("Location: verRecolectores.php?error=true");
                        }
                    }
                }

                //////////////////////////////Insertando nuevo administrador y enviando email///////////////////////////////
                if(mysqli_query($conex, $consulta)) {
                    $to = $_POST['mail'];
                    $subject = "Dado de alta en la aplicación";

                    if ($_POST["esAdmin"]) {
                        $message = "Te han dado de alta como administrador en la aplicación para la gestión del campo de trufas, tu nombre de usuario y contraseña son $nombreUsr y $pwd respectivamente. Se recomienda cambiarlos a tu gusto en la pestaña perfil de la página.";
                    } else {
                        $message = "Te han dado de alta como recolector en la aplicación para la gestión del campo de trufas, tu nombre de usuario y contraseña son $nombreUsr y $pwd respectivamente. Se recomienda cambiarlos a tu gusto en la pestaña perfil de la página.";
                    }
                    
                    if (mail($to, $subject, $message)) {
                        if ($_POST["esAdmin"]) {
                            header("Location: verAdmins.php?added=true");
                        } else {
                            header("Location: verRecolectores.php?added=true");
                        }
                    } else {
                        if ($_POST["esAdmin"]) {
                            header("Location: verAdmins.php?noEnviado=true");
                        } else {
                            header("Location: verRecolectores.php?noEnviado=true");
                        }
                    }
                } else {
                    if ($_POST["esAdmin"]) {
                        header("Location: verAdmins.php?error=true");
                    } else {
                        header("Location: verRecolectores.php?error=true");
                    }
                }

                desconectar($conex);
            } else{header("Location: ../index.php");}
        } else{header("Location: ../index.php");}
    } else{header("Location: ../index.php");}
?>