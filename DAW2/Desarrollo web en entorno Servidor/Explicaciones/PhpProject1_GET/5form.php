<?php

    echo "Hola ". htmlspecialchars($_GET['nombre']) ." como va???"; 
    echo "<br>";
    echo "tienes ". $_GET['edad'] ." años";
    $n=(int)$_GET['edad']+5;
    echo "de aquí 5 años tendrás $n"

?>

