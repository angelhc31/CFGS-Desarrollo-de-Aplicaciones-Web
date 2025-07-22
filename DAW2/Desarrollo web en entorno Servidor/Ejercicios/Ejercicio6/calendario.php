<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>      
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    </head>

    <body style="text-align: center;">
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <?php
            $mes = $_POST["mes"];
            $ano = $_POST["año"];

            $dias = cal_days_in_month(CAL_GREGORIAN, $mes, $ano);
            $dia1 = date("w",strtotime($ano."-".$mes));
            $ultDia = date("w",strtotime($ano."-".$mes."-".$dias));
            $filas = 0;
            $cont1 = 0;
            $cont2 = 1;

            if ($dias == 31 && $dia1 > 5 || $dias == 30 && $dia1 > 6) {
                $filas = 6;
            } else {
                if ($dias == 28 && $dia1 == 1) {
                    $filas = 4;
                } else {
                    $filas = 5;
                }
                
            }
                        

            if($mes >= 1 && $mes <= 12){
                echo "<table border = 3 style='margin: 0px auto;'>";
                echo "<tr><td>Lunes</td><td>Martes</td><td>Miércoles</td><td>Jueves</td><td>Viernes</td><td>Sábado</td><td>Domingo</td></tr>";
                    for($i = 1; $i <= $filas; $i++){
                        echo "<tr>";
                        for($j = 0; $j < 7; $j++){
                            if($cont1 < $dia1-1 || $cont2 > $dias){
                                echo "<td>*</td>";
                                $cont1++;
                            }
                            else{
                                echo "<td>$cont2</td>";
                                $cont2++;
                            }
                        }
                        echo "</tr>";
                    }
                echo "</table>";
            }
            
        ?>
    </body>
</html>