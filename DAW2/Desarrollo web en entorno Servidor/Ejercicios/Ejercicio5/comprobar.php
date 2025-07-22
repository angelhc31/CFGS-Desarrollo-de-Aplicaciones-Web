<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>      
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    </head>

    <body style="text-align: center;">
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php

            if (estaCaducada() == false && codValido() == true) {
                echo "<p style='color: green'>La targeta introducida es corrrecta.</p>";
            } else {
                echo "<p style='color: red'>La targeta introducida es incorrrecta.</p>";
            }

            function estaCaducada() {
                $mes = $_POST["mes"];
                $year = $_POST["año"];
                $fechaActual = getdate();

                if ($year < $fechaActual["year"]) {
                    return true;
                } else {
                    if($year > $fechaActual["year"]) {
                        return false;
                    } else {
                        if ($mes < $fechaActual["mon"]) {
                            return true;
                        } else {
                            return false;
                        }
                    }
                }
            }

            function codValido() {
                $targ = $_POST["numero"];
                $result = 0;
                $nums;
                $cont = 0;

                for ($i=0; $i < strlen($targ); $i++) { 
                    if (($i+1) % 2 != 0) {
                        if ($targ[$i]*2 < 9) {
                            $nums[$cont] = $targ[$i]*2;
                    } else {
                            $nums[$cont] = $targ[$i]*2- 9;
                    }
                    $cont++;
                    }
                }

                for ($i=1,$j=0; $i < strlen($targ); $i=$i+2,$j++) { 
                    $result = $result + $nums[$j] + $targ[$i];
                }
                
                if ($result % 10 == 0 && $result <= 150) {
                    return true;
                } else {
                    return false;
                }
            }
        ?>

        <a href="index.html"><button>Volver a la página de inicio</button></a>
    </body>
</html>