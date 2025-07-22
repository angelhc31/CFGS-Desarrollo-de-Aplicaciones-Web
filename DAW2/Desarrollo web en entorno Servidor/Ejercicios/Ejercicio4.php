<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

    <head>
        
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />

    </head>

    <body>

    <br><br><br>  

            
        <form style="text-align: center;" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            
            <input type="number" name="carPaswd"><br>
            <br>
            <input type="submit" name="submit" value="Generar contraseña"><br>
            
        </form>
        <?php
            if (isset($_POST['submit'])) {
                $ended = false;
                $paswd = "";
                $carPaswd = $_POST['carPaswd'];
                $cars = array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","0","1","2","3","4","5","6","7","8","9",".","-","_","$","&","#","@");

                if ($carPaswd == null || $carPaswd < 8 || $carPaswd > 12) {
                    echo "<script> alert('La contraseña debe tener entre 8 y 12 caracteres.')</script>";
                } else {
                    for ($i=1; $i <= $carPaswd; $i++) { 
                        $paswd = $paswd.$cars[rand(0,count($cars)-1)];
                    }

                    while ($ended == false) {
                        $ended = true;
                        for ($i=1; $i < strlen($paswd); $i++) { 
                            if ($paswd[$i] == $paswd[$i-1]) {
                                $paswd[$i] = $cars[rand(0,count($cars)-1)];
                            }
                        }
                    

                        for ($i=0; $i < strlen($paswd); $i++) { 
                            $cont=0;
                            for ($j=0; $j < strlen($paswd); $j++) { 
                                if ($paswd[$i] == $paswd[$j]) {
                                    $cont++;
                                    if ($cont > 2) {
                                        $paswd[$j] = $cars[rand(0,count($cars)-1)];
                                    }
                                }
                            }
                        }
                        
                        //Comprobar que esté correcto.
                        for ($i=1; $i < strlen($paswd); $i++) { 
                            if ($paswd[$i] == $paswd[$i-1]) {
                                $ended = false;
                            }
                        }
                        for ($i=0; $i < strlen($paswd); $i++) { 
                            $cont=0;
                            for ($j=0; $j < strlen($paswd); $j++) { 
                                if ($paswd[$i] == $paswd[$j]) {
                                    $cont++;
                                    if ($cont > 2) {
                                        $ended = false;
                                    }
                                }
                            }
                        }
                    }

                    echo "<br><p style='text-align: center;'><strong>$paswd</strong></p>";
                }
            }
        ?>

    </body>
</html>