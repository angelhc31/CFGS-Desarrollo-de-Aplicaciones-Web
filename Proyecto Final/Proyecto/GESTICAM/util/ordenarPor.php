<?php
    include("../util/db.php");
    session_start();
    if(isset($_SESSION["nombre"])){
        if ($_SESSION["admin"]) {
            if (isset($_POST["ordenarPor"]) && isset($_POST["queReordeno"]) && isset($_POST["id"])) {
                $conex = conectar("campo_trufas");
                $sql = "";

                if ($conex) {
                    switch ($_POST["queReordeno"]) {
                        case 'recolectas':
                            $sql = "SELECT * FROM recolectas ORDER BY ".$_POST["ordenarPor"].", fecha DESC";

                            if($rs=mysqli_query($conex,$sql)){
                                echo "<table class='tabla' style='margin-top: 20px; margin-bottom: 20px; font-size: 22px;'>";
                                    echo "<tr style='height: 40px;'>";
                                        echo "<th style='width: 20%;'>Fecha</th>";
                                        echo "<th style='width: 20%;'>Peso</th>";
                                        echo "<th style='width: 20%;'>Perro</th>";
                                        echo "<th style='width: 20%;'>Recolector</th>";
                                        echo "<th style='width: 20%;'>Zona</th>";
                                        echo "<td></td>";
                                    echo "</tr>";
                                while ($vec=mysqli_fetch_assoc($rs)){
                                    $vec['fecha'] = date("d/m/Y", strtotime($vec['fecha']));
                                    echo "<tr id='".$vec['id']."' class='filaTabla' style='height: 40px;'>";
                                    echo "<td style='width: 20%'>".$vec['fecha']."</td>";
                                    echo "<td style='width: 20%'>".$vec['peso']."g</td>";
        
                                    echo "<td style='width: 20%'>";
                                    $consulta = "SELECT nombre, foto FROM perros WHERE id = ".$vec['perro'];
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
        
                                    echo "<td style='width: 20%'>";
                                    $consulta = "SELECT nombre, apellidos, foto FROM usuarios WHERE id = ".$vec['recolector'];
                                    if ($rs3=mysqli_query($conex,$consulta)) {
                                        if(mysqli_num_rows($rs3) != 0) {
                                            while ($usrs=mysqli_fetch_assoc($rs3)) {
                                                ?>
                                                <img class="fotoTabla" alt="fotoUsrs" src='../imgs/users/<?php if($usrs["foto"] != ""){echo $usrs["foto"];}else{echo ("no-user-img.png");}?>'>
                                                <?php
                                                echo $usrs["nombre"]." ".$usrs["apellidos"];
                                            }
                                        } else {
                                            echo "Desconocido";
                                        }
                                    }
                                    echo "</td>";
        
                                    echo "<td style='width: 20%'>";
                                    $consulta = "SELECT nombre FROM zonas WHERE id = ".$vec['zona'];
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

                                    echo "<td><input onclick='seleccionarFila(".$vec['id'].")' type='checkbox' id='checkbox".$vec['id']."' class='checkbox'></td>";

                                    echo "<td><div id='contenedor-delete'><a href='../util/borrarRecolecta.php?id=".$vec['id']."&borrarUno=true'><img id='delete_icon' id='añadir' src='../imgs/menu_icons/delete.png' alt='eliminar'></a></div></td>";

                                    echo "</tr>";
                                }
                                echo "</table>";
                            }
                        break;





                        case 'zonas':
                            $sql = "SELECT recolector, perro, zona, fecha, peso FROM recolectas WHERE zona = ".$_POST['id']." ORDER BY ".$_POST["ordenarPor"].", fecha DESC";

                            if($rs2=mysqli_query($conex,$sql)){
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
                            }
                        break;




                        case 'recolectores':
                            $sql = "SELECT recolector, perro, zona, fecha, peso FROM recolectas WHERE recolector = ".$_POST['id']." ORDER BY ".$_POST["ordenarPor"].", fecha DESC";
    
                            if($rs2=mysqli_query($conex,$sql)){
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
                            }
                        break;





                        case 'perros':
                            $sql = "SELECT recolector, perro, zona, fecha, peso FROM recolectas WHERE perro = ".$_POST['id']." ORDER BY ".$_POST["ordenarPor"].", fecha DESC";

                            if($rs2=mysqli_query($conex,$sql)){
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
                            }
                        break;
                    }
                    desconectar($conex);                 
                }
            }
        } else {
            if (isset($_POST["ordenarPor"]) && isset($_POST["queReordeno"]) && isset($_POST["id"])) {
                $conex = conectar("campo_trufas");
                if ($_POST["queReordeno"] == "recolectasUsr") {
                    $sql = "SELECT * FROM recolectas WHERE recolector=".$_SESSION["idUsr"]." ORDER BY ".$_POST["ordenarPor"].", fecha DESC";

                    if($rs=mysqli_query($conex,$sql)){
                        echo "<table class='tabla' style='margin-top: 20px; margin-bottom: 20px; font-size: 22px; width: 60%;'>";
                            echo "<tr style='height: 40px;'>";
                                echo "<th style='width: 25%;'>Fecha</th>";
                                echo "<th style='width: 25%;'>Peso</th>";
                                echo "<th style='width: 25%;'>Perro</th>";
                                echo "<th style='width: 25%;'>Zona</th>";
                                echo "<td></td>";
                            echo "</tr>";
                        while ($vec=mysqli_fetch_assoc($rs)){
                            $fecha = $vec['fecha'];
                            $vec['fecha'] = date("d/m/Y", strtotime($vec['fecha']));
                            echo "<tr id='".$vec['id']."' class='filaTabla' style='height: 40px;'>";
                            echo "<td style='width: 25%'>".$vec['fecha']."</td>";
                            echo "<td style='width: 25%'>".$vec['peso']."g</td>";

                            echo "<td style='width: 25%'>";
                            $consulta = "SELECT nombre, foto FROM perros WHERE id = ".$vec['perro'];
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

                            echo "<td style='width: 25%'>";
                            $consulta = "SELECT nombre FROM zonas WHERE id = ".$vec['zona'];
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

                            echo "<td><input onclick='seleccionarFila(".$vec['id'].")' type='checkbox' id='checkbox".$vec['id']."' class='checkbox'></td>";

                            echo "<td><div id='contenedor-delete'><a href='../util/borrarRecolecta.php?id=".$vec['id']."&borrarUno=true'><img id='delete_icon' id='añadir' src='../imgs/menu_icons/delete.png' alt='eliminar'></a></div></td>";

                            echo "<td>";
                            ?>
                            <div class='contenedor-icono-edit' onclick="mostrarCard('editRecolecta',<?php echo $vec['id']?>,'','<?php echo $fecha?>',<?php echo $vec['peso']?>,<?php echo $vec['perro']?>,<?php echo $vec['zona']?>)"><img style='width: 32px; height: 32px;' id='edit_icon' id='añadir' src='../imgs/menu_icons/edit.png' alt='editar'></div>
                            <?php
                            echo "</td>";

                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                }
            }
        }
    }
?>