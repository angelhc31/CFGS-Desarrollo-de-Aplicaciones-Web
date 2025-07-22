<?php
    function sesionCorrect() {
        if(isset($_POST['nombre']) && isset($_POST['paswd'])){
            $_SESSION['nombre'] = $_POST['nombre'];
            $_SESSION['paswd'] = $_POST['paswd'];
            $correcto = false;
            $gestor=fopen('./pwd.txt',"r");
            if($gestor == true) {
                While(feof($gestor) == false) {
                    $linea=trim(fgets($gestor));
                    if ($linea == $_SESSION['nombre'].":".$_SESSION['paswd']) {
                        $correcto = true;
                    }
                }
                fclose($gestor);
            }
        } else {
            if (isset($_SESSION['nombre']) && isset($_SESSION['paswd'])) {
                $correcto = true;
            }
            else {
                $correcto = false;
            }
        }
        return $correcto;
    }
?>