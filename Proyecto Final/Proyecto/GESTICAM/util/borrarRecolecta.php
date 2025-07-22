<?php
    include("../util/db.php");
    session_start();

    if(isset($_SESSION["nombre"])){
        if (isset($_GET["borrarUno"]) && isset($_GET["borrarUno"]) == true) {
            $conex = conectar("campo_trufas");
            $sql = "DELETE FROM recolectas WHERE id=".$_GET["id"];
            if($rs=mysqli_query($conex,$sql)){
                $consulta = "SELECT * FROM zonas";
                $result = mysqli_query($conex,$consulta);
                while ($zonas = mysqli_fetch_assoc($result)) {
                    $consulta = "SELECT MAX(fecha) AS ultRecolecta FROM recolectas WHERE zona=".$zonas["id"];
                    $rs2=mysqli_query($conex,$consulta);
                    $ultFecha = mysqli_fetch_assoc($rs2);
                    $cambiarUltRecolecta = "UPDATE zonas SET ultRecolecta='".$ultFecha["ultRecolecta"]."' WHERE id=".$zonas["id"];
                    mysqli_query($conex,$cambiarUltRecolecta);
                }
                if ($_SESSION["admin"]) {
                    header("Location: ../admin/verRecolectas.php?eliminado=true");
                } else {
                    header("Location: ../user/verRecolectasUsr.php?eliminado=true");
                }
            } else {
                if ($_SESSION["admin"]) {
                    header("Location: ../admin/verRecolectas.php?error=true");
                } else {
                    header("Location: ../user/verRecolectasUsr.php?error=true");
                }
            }
            desconectar($conex);
        }elseif (isset($_GET["borrarMuchos"]) && isset($_GET["borrarMuchos"]) == true) {
            $conex = conectar("campo_trufas");
            $sql = "DELETE FROM recolectas WHERE ";
            foreach ($_GET as $i => $idRecolecta) {
                if ($i == 0) {
                    $sql = $sql."id=".$idRecolecta;
                } else {
                    if (is_numeric($idRecolecta)) {
                        $sql = $sql." OR id=".$idRecolecta;
                    }
                }
            }
            echo $sql;
            if($rs=mysqli_query($conex,$sql)){
                $consulta = "SELECT * FROM zonas";
                $result = mysqli_query($conex,$consulta);
                while ($zonas = mysqli_fetch_assoc($result)) {
                    $consulta = "SELECT MAX(fecha) AS ultRecolecta FROM recolectas WHERE zona=".$zonas["id"];
                    $rs2=mysqli_query($conex,$consulta);
                    $ultFecha = mysqli_fetch_assoc($rs2);
                    $cambiarUltRecolecta = "UPDATE zonas SET ultRecolecta='".$ultFecha["ultRecolecta"]."' WHERE id=".$zonas["id"];
                    mysqli_query($conex,$cambiarUltRecolecta);
                }
                if ($_SESSION["admin"]) {
                    header("Location: ../admin/verRecolectas.php?eliminadas=true");
                } else {
                    header("Location: ../user/verRecolectasUsr.php?eliminadas=true");
                }
            } else {
                if ($_SESSION["admin"]) {
                    header("Location: ../admin/verRecolectas.php?error=true");
                } else {
                    header("Location: ../user/verRecolectasUsr.php?error=true");
                }
            }
            desconectar($conex);
        }else{
            if ($_SESSION["admin"]) {
                header("Location: ../admin/verRecolectas.php");
            } else {
                header("Location: ../user/verRecolectasUsr.php");
            }
        }
    }else{header("Location: ../index.php");}
?>