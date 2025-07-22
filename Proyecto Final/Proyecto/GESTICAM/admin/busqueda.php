<?php
    include("../util/db.php");
    session_start();

    if(isset($_SESSION["nombre"])){
        if ($_SESSION["admin"]) {
            if (isset($_POST["queBusco"])) {
                $conex = conectar("campo_trufas");
                $sql = "";
                $busqueda = "";

                if ($conex) {
                    $busqueda = $_POST["miBusqueda"];
                    $queBusco = $_POST["queBusco"];
                    switch ($queBusco) {

                        case "admins":
                            $sql = "SELECT * FROM usuarios WHERE esAdmin='1' AND CONCAT(nombre, ' ', apellidos) LIKE '$busqueda%' ORDER BY nombre, apellidos";

                            if($rs=mysqli_query($conex,$sql)){
                                if(mysqli_num_rows($rs) == 0) {
                                    echo "<h2>No se encontraron resultados</h2>";
                                    echo "<hr style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin-bottom: 0px;'>";
                                } else {
                                    while ($vec=mysqli_fetch_assoc($rs)){
                                        echo "<div>";
                                        if ($_SESSION["idUsr"] != $vec["id"]) {
                                            echo "<div id='contenedor-delete'><a href='borrarUser.php?id=".$vec['id']."&esAdmin=1'><img id='delete_icon' id='añadir' src='../imgs/menu_icons/delete.png' alt='eliminar'></a></div>";
                                            ?>
                                            <img class="fotoPerf" alt="foto" src='../imgs/users/<?php if($vec["foto"] != ""){echo $vec["foto"];}else{echo ("no-user-img.png");}?>'>
                                            <?php
                                        } else {
                                            ?>
                                            <img style='margin-top: 41px;' class="fotoPerf" alt="foto" src='../imgs/users/<?php if($vec["foto"] != ""){echo $vec["foto"];}else{echo ("no-user-img.png");}?>'>
                                            <?php
                                        }
                                        echo "<h2 style='margin-top: 5px;'>".$vec['nombre']." ".$vec['apellidos']."</h2>";
                                        echo "<p>".$vec['DNI']."</p>";
                                        echo "<p>".$vec['mail']."</p>";
                                        echo "<p>".$vec['telefono']."</p>";
                                        echo "<hr style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin-bottom: 0px; margin-top: 35px;'>";
                                        echo "</div>";
                                    }
                                }
                            }
                        break;





                        case "zonas":
                            $consulta = "SELECT * FROM zonas WHERE nombre LIKE '$busqueda%' ORDER BY nombre";

                            if($rs=mysqli_query($conex,$consulta)){
                                if(mysqli_num_rows($rs) == 0) {
                                    echo "<h2>No se encontraron resultados</h2>";
                                    echo "<hr style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin-bottom: 0px;'>";
                                } else {
                                    while ($zonas=mysqli_fetch_assoc($rs)){
                                        echo "<div>";
                                        ?>
                                        <div class='contenedor-icono-edit' onclick="mostrarCard('editZona',<?php echo $zonas['id']?>,'<?php echo $zonas['nombre']?>',<?php echo $zonas['area']?>)"><img style='width: 32px; height: 32px;' id='edit_icon' id='añadir' src='../imgs/menu_icons/edit.png' alt='editar'></div>
                                        <?php
        
                                        if ($zonas['id']>8) {
                                            echo "<div id='contenedor-delete'><a href='borrarZona.php?id=".$zonas['id']."'><img id='delete_icon' id='añadir' src='../imgs/menu_icons/delete.png' alt='eliminar'></a></div>";
                                        } else {
                                            echo "<div style='border-radius: 50%; width: 40px; height: 40px; margin-top: 3px; margin-left: 3px; padding-right: 2px; padding-top: 2px;'></div>";
                                        }
                                        echo "<h2 style='margin-top: 0px; margin-bottom: 0px;'>".$zonas['nombre']."</h2>";
                                        echo "<p style='margin-top: 0px;'>(".$zonas['area']." m²".")</p>";
                                        
                                        /////////////Sacando color de la zona y comprobando/////////////////
                                        if ($zonas['ultRecolecta'] != "0000-00-00") {
                                            $color = "";
                                            $diasPasados = (strtotime($zonas['ultRecolecta'])-strtotime(date('Y-m-d')))/86400;
                                            $diasPasados = abs($diasPasados);
                                            $diasPasados = floor($diasPasados);
                                            if ($diasPasados <= 3) {
                                                $color = "green";
                                            } elseif ($diasPasados > 3 && $diasPasados <=7) {
                                                $color = "yellow";
                                            } elseif ($diasPasados > 7) {
                                                $color = "red";
                                            }
                                            $zonas['ultRecolecta'] = date("d/m/Y", strtotime($zonas['ultRecolecta']));
                                            echo "<p style='color: ".$color.";'>"."Última recolecta: ".$zonas['ultRecolecta']."</p>";
                                        }
        
                                        /////////////////////Sacando suma mensual///////////////////////
                                        $consulta = "SELECT SUM(peso) AS suma FROM recolectas WHERE zona = ".$zonas['id']." AND MONTH(fecha) = ".date('m');
        
                                        if($rs1=mysqli_query($conex,$consulta)) {
                                            $suma=mysqli_fetch_assoc($rs1);
                                            if ($suma["suma"] == "") {
                                                $suma["suma"] = 0;
                                            }
                                            echo "<p>Recolectado este mes: ".$suma["suma"]."g</p>";
                                        }
        
        
                                        /////////////////////Sacando suma anual///////////////////////
                                        $consulta = "SELECT SUM(peso) AS suma FROM recolectas WHERE zona = ".$zonas['id']." AND YEAR(fecha) = ".date('Y');
        
                                        if($rs1=mysqli_query($conex,$consulta)) {
                                            $suma=mysqli_fetch_assoc($rs1);
                                            if ($suma["suma"] == "") {
                                                $suma["suma"] = 0;
                                            }
                                            echo "<p>Recolectado este año: ".$suma["suma"]."g</p>";
                                        }
        
                                        echo "<a id='botonTablaZona".$zonas['id']."' onclick=mostrarOcultarTabla('Zona',".$zonas['id'].") class='rainbow-button' alt='Ver recolectas'></a>";
        
                                        echo "<div id='recolectasZona".$zonas['id']."' style='display: none;'>";
                                            echo "<h3 style='margin-bottom:10px;'>Recolectas:</h3>";
        
                                            $consulta = "SELECT recolector, perro, zona, fecha, peso FROM recolectas WHERE zona = ".$zonas['id']." ORDER BY fecha DESC";
        
                                            if($rs2=mysqli_query($conex,$consulta)) {
                                                if(mysqli_num_rows($rs2) != 0) {
                                                    ?>
                                                    <div>
                                                        Ordenar por
                                                        <select style="margin-top:0px; margin-bottom:30px;" onchange="reordenar('zonas',<?php echo $zonas['id']?>)" name="orderBy<?php echo $zonas['id']?>" id="orderBy<?php echo $zonas['id']?>" required>
                                                            <option selected value="fecha DESC">fecha</option>
                                                            <option value="peso DESC">peso</option>
                                                            <option value="perro">perro</option>
                                                            <option value="recolector">recolector</option>
                                                        </select>
                                                    </div>
                                                    <?php

                                                    echo "<div id='modify-table".$zonas["id"]."'>";
                                                    echo "<table class='tabla'>";
                                                        echo "<tr>";
                                                            echo "<th>Fecha</th>";
                                                            echo "<th>Peso</th>";
                                                            echo "<th>Perro</th>";
                                                            echo "<th>Recolector</th>";
                                                        echo "</tr>";
                                                    while ($recolectas=mysqli_fetch_assoc($rs2)) {
                                                        $recolectas['fecha'] = date("d/m/Y", strtotime($recolectas['fecha']));
                                                        echo "<tr class='filaTabla'>";
                                                        echo "<td>".$recolectas['fecha']."</td>";
                                                        echo "<td>".$recolectas['peso']."g</td>";

                                                        echo "<td>";
                                                        $consulta = "SELECT nombre, foto FROM perros WHERE id = ".$recolectas['perro'];
                                                        if ($rs3=mysqli_query($conex,$consulta)) {
                                                            if(mysqli_num_rows($rs3) != 0) {
                                                                while ($perros=mysqli_fetch_assoc($rs3)) {
                                                                    ?>
                                                                    <img class="fotoTabla" alt="fotoPerro" src='../imgs/perros/<?php if($perros["foto"] != ""){echo $perros["foto"];}else{echo ("no-dog-img.jpg");}?>'>
                                                                    <?php
                                                                    echo $perros["nombre"];
                                                                }
                                                            } else {
                                                                echo "Desconocido";
                                                            }
                                                        }
                                                        echo "</td>";

                                                        echo "<td>";
                                                        $consulta = "SELECT nombre, apellidos, foto FROM usuarios WHERE id = ".$recolectas['recolector'];
                                                        if ($rs3=mysqli_query($conex,$consulta)) {
                                                            if(mysqli_num_rows($rs3) != 0) {
                                                                while ($recolectores=mysqli_fetch_assoc($rs3)) {
                                                                    ?>
                                                                    <img class="fotoTabla" alt="fotoUsr" src='../imgs/users/<?php if($recolectores["foto"] != ""){echo $recolectores["foto"];}else{echo ("no-user-img.png");}?>'>
                                                                    <?php
                                                                    echo $recolectores["nombre"]." ".$recolectores["apellidos"];
                                                                }
                                                            } else {
                                                                echo "Desconocido";
                                                            }
                                                        }
                                                        echo "</td>";
                                                        echo "</tr>";
                                                    }
                                                    echo "</table>";
                                                    echo "</div>";
                                                } else {
                                                    echo "Aún no hay recolectas";
                                                }
                                                echo "</div>";
                                            }
                                        echo "<hr style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin-bottom: 0px; margin-top: 35px;'>";
                                        echo "</div>";
                                    }
                                }
                            }
                        break;





                        case "recolectores":
                            $sql = "SELECT * FROM usuarios WHERE esAdmin='0' AND CONCAT(nombre, ' ', apellidos) LIKE '$busqueda%' ORDER BY nombre, apellidos";

                            if($rs=mysqli_query($conex,$sql)){
                                if(mysqli_num_rows($rs) == 0) {
                                    echo "<h2>No se encontraron resultados</h2>";
                                    echo "<hr style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin-bottom: 0px;'>";
                                } else {
                                    while ($vec=mysqli_fetch_assoc($rs)){
                                        echo "<div>";
                                        echo "<div id='contenedor-delete'><a href='borrarUser.php?id=".$vec['id']."&esAdmin=0'><img id='delete_icon' id='añadir' src='../imgs/menu_icons/delete.png' alt='eliminar'></a></div>";
                                        ?>
                                        <img class="fotoPerf" alt="foto" src='../imgs/users/<?php if($vec["foto"] != ""){echo $vec["foto"];}else{echo ("no-user-img.png");}?>'>
                                        <?php
                                        echo "<h2 style='margin-top: 5px; margin-bottom: 15px;'>".$vec['nombre']." ".$vec['apellidos']."</h2>";
                                        echo "<p style='margin: 2px;'>".$vec['DNI']."</p>";
                                        echo "<p style='margin: 2px;'>".$vec['mail']."</p>";
                                        echo "<p style='margin: 2px;'>".$vec['telefono']."</p>";

                                        /////////////////////Sacando suma mensual///////////////////////
                                        $consulta = "SELECT SUM(peso) AS suma FROM recolectas WHERE recolector = ".$vec['id']." AND MONTH(fecha) = ".date('m');

                                        if($rs1=mysqli_query($conex,$consulta)) {
                                            $suma=mysqli_fetch_assoc($rs1);
                                            if ($suma["suma"] == "") {
                                                $suma["suma"] = 0;
                                            }
                                            echo "<p style='margin-bottom: 2px; margin-top: 20px;'>Recolectado este mes: ".$suma["suma"]."g</p>";
                                        }


                                        /////////////////////Sacando suma anual///////////////////////
                                        $consulta = "SELECT SUM(peso) AS suma FROM recolectas WHERE recolector = ".$vec['id']." AND YEAR(fecha) = ".date('Y');

                                        if($rs1=mysqli_query($conex,$consulta)) {
                                            $suma=mysqli_fetch_assoc($rs1);
                                            if ($suma["suma"] == "") {
                                                $suma["suma"] = 0;
                                            }
                                            echo "<p style='margin-top: 2px;'>Recolectado este año: ".$suma["suma"]."g</p>";
                                        }

                                        echo "<a id='botonTablaRecolector".$vec['id']."' onclick=mostrarOcultarTabla('Recolector',".$vec['id'].") class='rainbow-button' alt='Ver recolectas'></a>";

                                        echo "<div id='recolectasRecolector".$vec['id']."' style='display: none;'>";
                                            echo "<h3>Recolectas:</h3>";

                                            $consulta = "SELECT recolector, perro, zona, fecha, peso FROM recolectas WHERE recolector = ".$vec['id']." ORDER BY fecha DESC";

                                            if($rs2=mysqli_query($conex,$consulta)) {
                                                if(mysqli_num_rows($rs2) != 0) {
                                                    ?>
                                                    <div>
                                                        Ordenar por
                                                        <select style="margin-top:0px; margin-bottom:30px;" onchange="reordenar('recolectores',<?php echo $vec['id']?>)" name="orderBy<?php echo $vec['id']?>" id="orderBy<?php echo $vec['id']?>" required>
                                                            <option selected value="fecha DESC">fecha</option>
                                                            <option value="peso DESC">peso</option>
                                                            <option value="perro">perro</option>
                                                            <option value="zona">zona</option>
                                                        </select>
                                                    </div>
                                                    <?php

                                                    echo "<div id='modify-table".$vec["id"]."'>";
                                                    echo "<table class='tabla'>";
                                                        echo "<tr>";
                                                            echo "<th>Fecha</th>";
                                                            echo "<th>Peso</th>";
                                                            echo "<th>Perro</th>";
                                                            echo "<th>Zona</th>";
                                                    while ($recolectas=mysqli_fetch_assoc($rs2)) {
                                                        $recolectas['fecha'] = date("d/m/Y", strtotime($recolectas['fecha']));
                                                        echo "<tr class='filaTabla'>";
                                                        echo "<td>".$recolectas['fecha']."</td>";
                                                        echo "<td>".$recolectas['peso']."g</td>";

                                                        echo "<td>";
                                                        $consulta = "SELECT nombre, foto FROM perros WHERE id = ".$recolectas['perro'];
                                                        if ($rs3=mysqli_query($conex,$consulta)) {
                                                            if(mysqli_num_rows($rs3) != 0) {
                                                                while ($perros=mysqli_fetch_assoc($rs3)) {
                                                                    ?>
                                                                    <img class="fotoTabla" alt="fotoPerro" src='../imgs/perros/<?php if($perros["foto"] != ""){echo $perros["foto"];}else{echo ("no-dog-img.jpg");}?>'>
                                                                    <?php
                                                                    echo $perros["nombre"];
                                                                }
                                                            } else {
                                                                echo "Desconocido";
                                                            }
                                                        }
                                                        echo "</td>";

                                                        echo "<td>";
                                                        $consulta = "SELECT nombre FROM zonas WHERE id = ".$recolectas['zona'];
                                                        if ($rs3=mysqli_query($conex,$consulta)) {
                                                            if(mysqli_num_rows($rs3) != 0) {
                                                                while ($zonas=mysqli_fetch_assoc($rs3)) {
                                                                    echo $zonas["nombre"];
                                                                }
                                                            } else {
                                                                echo "Desconocida";
                                                            }
                                                        }
                                                        echo "</td>";
                                                        echo "</tr>";
                                                    }
                                                        echo "</tr>";
                                                    echo "</table>";
                                                    echo "</div>";
                                                } else {
                                                    echo "Aún no hay recolectas";
                                                }
                                                echo "</div>";
                                            }

                                        echo "<hr style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin-bottom: 0px; margin-top: 35px;'>";
                                        echo "</div>";
                                    }
                                }
                            }
                        break;





                        case 'perros':
                            $sql = "SELECT * FROM perros WHERE nombre LIKE '$busqueda%' ORDER BY nombre";

                            if($rs=mysqli_query($conex,$sql)){
                                if(mysqli_num_rows($rs) == 0) {
                                    echo "<h2>No se encontraron resultados</h2>";
                                    echo "<hr style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin-bottom: 0px;'>";
                                } else {
                                    while ($perros=mysqli_fetch_assoc($rs)){
                                        echo "<div>";
                                        ?>
                                        <div class='contenedor-icono-edit' onclick="mostrarCard('editPerro',<?php echo $perros['id']?>,'<?php echo $perros['nombre']?>','<?php echo $perros['fech_nacimiento']?>','<?php echo $perros['foto']?>')"><img style='width: 32px; height: 32px;' id='edit_icon' id='añadir' src='../imgs/menu_icons/edit.png' alt='editar'></div>
                                        <?php
        
                                        echo "<div id='contenedor-delete'><a href='borrarPerro.php?id=".$perros['id']."'><img id='delete_icon' id='añadir' src='../imgs/menu_icons/delete.png' alt='eliminar'></a></div>";
                                        ?>
                                        <img class="fotoPerf" alt="fotoPerro" src='../imgs/perros/<?php if($perros["foto"] != ""){echo $perros["foto"];}else{echo ("no-dog-img.jpg");}?>'>
                                        <?php
                                        echo "<h2 style='margin-top: 5px; margin-bottom: 5px;'>".$perros['nombre']."</h2>";
        
                                        $nacimiento = new DateTime($perros['fech_nacimiento']);
                                        $hoy = new DateTime();
                                        $edad = $hoy->diff($nacimiento);
                                        echo "<p style='margin: 2px;'>".$edad->y." años y ".$edad->m." meses</p>";
        
                                        /////////////////////Sacando suma mensual///////////////////////
                                        $consulta = "SELECT SUM(peso) AS suma FROM recolectas WHERE perro = ".$perros['id']." AND MONTH(fecha) = ".date('m');
        
                                        if($rs1=mysqli_query($conex,$consulta)) {
                                            $suma=mysqli_fetch_assoc($rs1);
                                            if ($suma["suma"] == "") {
                                                $suma["suma"] = 0;
                                            }
                                            echo "<p style='margin-bottom: 2px;'>Recolectado este mes: ".$suma["suma"]."g</p>";
                                        }
        
        
                                        /////////////////////Sacando suma anual///////////////////////
                                        $consulta = "SELECT SUM(peso) AS suma FROM recolectas WHERE perro = ".$perros['id']." AND YEAR(fecha) = ".date('Y');
        
                                        if($rs1=mysqli_query($conex,$consulta)) {
                                            $suma=mysqli_fetch_assoc($rs1);
                                            if ($suma["suma"] == "") {
                                                $suma["suma"] = 0;
                                            }
                                            echo "<p style='margin-top: 2px;'>Recolectado este año: ".$suma["suma"]."g</p>";
                                        }
        
                                        echo "<a id='botonTablaPerro".$perros['id']."' onclick=mostrarOcultarTabla('Perro',".$perros['id'].") class='rainbow-button' alt='Ver recolectas'></a>";
        
                                        echo "<div id='recolectasPerro".$perros['id']."' style='display: none;'>";
                                        echo "<h3>Recolectas:</h3>";
    
                                        $consulta = "SELECT recolector, perro, zona, fecha, peso FROM recolectas WHERE perro = ".$perros['id']." ORDER BY fecha DESC";
                                        if($rs2=mysqli_query($conex,$consulta)) {
                                            if(mysqli_num_rows($rs2) != 0) {
                                                ?>
                                                <div>
                                                    Ordenar por
                                                    <select style="margin-top:0px; margin-bottom:30px;" onchange="reordenar('perros',<?php echo $perros['id']?>)" name="orderBy<?php echo $perros['id']?>" id="orderBy<?php echo $perros['id']?>" required>
                                                        <option selected value="fecha DESC">fecha</option>
                                                        <option value="peso DESC">peso</option>
                                                        <option value="recolector">guía</option>
                                                        <option value="zona">zona</option>
                                                    </select>
                                                </div>
                                                <?php

                                                echo "<div id='modify-table".$perros["id"]."'>";
                                                echo "<table class='tabla'>";
                                                    echo "<tr>";
                                                        echo "<th>Fecha</th>";
                                                        echo "<th>Peso</th>";
                                                        echo "<th>Guía</th>";
                                                        echo "<th>Zona</th>";
                                                while ($recolectas=mysqli_fetch_assoc($rs2)) {
                                                    $recolectas['fecha'] = date("d/m/Y", strtotime($recolectas['fecha']));
                                                    echo "<tr class='filaTabla'>";
                                                    echo "<td>".$recolectas['fecha']."</td>";
                                                    echo "<td>".$recolectas['peso']."g</td>";

                                                    echo "<td>";
                                                    $consulta = "SELECT nombre, apellidos, foto FROM usuarios WHERE id = ".$recolectas['recolector'];
                                                    if ($rs3=mysqli_query($conex,$consulta)) {
                                                        if(mysqli_num_rows($rs3) != 0) {
                                                            while ($recolectores=mysqli_fetch_assoc($rs3)) {
                                                                ?>
                                                                <img class="fotoTabla" alt="fotoUsr" src='../imgs/users/<?php if($recolectores["foto"] != ""){echo $recolectores["foto"];}else{echo ("no-user-img.png");}?>'>
                                                                <?php
                                                                echo $recolectores["nombre"]." ".$recolectores["apellidos"];
                                                            }
                                                        } else {
                                                            echo "Desconocido";
                                                        }
                                                    }
                                                    echo "</td>";
    
                                                    echo "<td>";
                                                    $consulta = "SELECT nombre FROM zonas WHERE id = ".$recolectas['zona'];
                                                    if ($rs3=mysqli_query($conex,$consulta)) {
                                                        if(mysqli_num_rows($rs3) != 0) {
                                                            while ($zonas=mysqli_fetch_assoc($rs3)) {
                                                                echo $zonas["nombre"];
                                                            }
                                                        } else {
                                                            echo "Desconocida";
                                                        }
                                                    }
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                                    echo "</tr>";
                                                echo "</table>";
                                                echo "</div>";
                                            } else {
                                                echo "Aún no hay recolectas";
                                            }   
                                            echo "</div>";
                                        }
                                        echo "<hr style='width: 100%; border: 1px solid; border-color: white; background-color: white; margin-bottom: 0px; margin-top: 35px;'>";
                                        echo "</div>";
                                    }
                                }
                            }
                        break;
                    }
                    desconectar($conex);
                }
            }
        }
    }
?>