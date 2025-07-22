<?php
    include("../util/db.php");
    session_start();

    if(isset($_SESSION["nombre"])){
        if ($_SESSION["admin"]) {
            if (isset($_POST["recolector"]) && isset($_POST["zona"]) && isset($_POST["perro"]) && isset($_POST["hora"])) {
                if ($_POST["recolector"] != "" && $_POST["zona"] != "") {
                    $zona = $_POST["zona"];
                    $perro = $_POST["perro"];
                    $hora = $_POST["hora"];
                    $to = $_POST['recolector'];
                    $subject = "Nuevo trabajo encargado";
                    $message = "Se te ha encargado ir a buscar a la $zona";

                    if ($_POST["perro"] == "") {
                        $message = $message." con el perro que prefieras";
                    } else {
                        $message = $message." con $perro";
                    }

                    if ($_POST["hora"] == "") {
                        $message = $message." cuanto antes";
                    } else {
                        $message = $message." a las $hora";
                    }
                    $message = $message.". Recuerda registrar tu recolecta en la aplicación al terminar.";
                    if (mail($to, $subject, $message)) {
                        header("Location: index.php?encargado=true");
                    } else {
                        header("Location: index.php?noEnviado=true");
                    }

                }else{header("Location: ../index.php");}
            }else{header("Location: index.php");}
        }else{header("Location: ../index.php");}
    }else{header("Location: ../index.php");}
?>