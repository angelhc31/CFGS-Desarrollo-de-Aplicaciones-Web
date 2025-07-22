<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    </head>

    <body style="text-align: center;">

        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <a href="index.html"><button name="volver">Volver a la pagina de inicio</button></a>

        <?php
            $dni;
            
            if($_GET["dni"] == null){
                echo "<script language='javascript'> alert('No has introducido el NIF'); </script>";
            }
            else {
                $dni=$_GET["dni"];
                
                if (pareceDNI($dni)) {
                    if (dniCorrecto($dni)) {
                        echo "<script language='javascript'> alert('El nif es correcto'); </script>";
                    } else {
                        echo "<script language='javascript'> alert('El nif no es correcto'); </script>";
                    }         
                } else {
                    echo "<script language='javascript'> alert('Esto no es un nif'); </script>";
                }
            }


            function pareceDNI($dni) {
                $parece=true;
                if (strlen($dni) == 9){
                    for ($i=0; $i < strlen($dni)-1; $i++) { 
                        if (($dni[$i]<='z' && $dni[$i]>='a') || ($dni[$i]<='Z' && $dni[$i]>='A')) {
                            $parece=false;
                        }
                    }
                    if ($dni[strlen($dni)-1]>'Z' || $dni[strlen($dni)-1]<'A') {
                        $parece=false;
                    }
                } else $parece=false;

                return $parece;
            }


            function dniCorrecto($dni) {
                $letras=array('T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E');
                $digitosDni=intval(substr($dni, 0, -1));
                if ($dni[strlen($dni)-1] == $letras[$digitosDni%23]) {
                    return true;
                } else {
                    return false;
                }
                
            }
        ?>
    </body>
</html>