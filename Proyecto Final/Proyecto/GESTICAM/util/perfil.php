<?php
    include("db.php");
	session_start();
?>
<!DOCTYPE html>
<html lang=es>
    <head>
        <link href="../css/msg-style.css" rel="stylesheet" type="text/css">
        <link href="../css/global.css" rel="stylesheet" type="text/css">
        <link href="../css/perfil-style.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <title>Perfil</title>
    </head>
    <body>
        <?php
        if (isset($_SESSION["nombre"])) {
            $conex = conectar("campo_trufas");
            $consulta = "SELECT nombre, apellidos, mail, telefono, foto FROM usuarios WHERE id='".$_SESSION['idUsr']."'";
            if($rs = mysqli_query($conex, $consulta)) {
                while ($vec = mysqli_fetch_array($rs)) {
                    $nombre = $vec["nombre"]." ".$vec["apellidos"];
                    $mail = $vec["mail"];
                    $telefono = $vec["telefono"];
                    $nombreUsr = $_SESSION["nombre"];
                    $foto = $vec["foto"];
                    ?>

                    <a href="../index.php"><div id="volver"><img src="../imgs/menu_icons/atras.png" alt="atras"></div></a>

                    <div style="display: none;" id="info">Selecciona una imagen y presiona el botón.</div>
                    <script src="../js/infoMsgFadeout.js" type="text/javascript"></script> 

                    <?php
                    if(isset($_GET["vacio"]) && $_GET["vacio"] == "true") {
                    ?>
                        <div id="warning">Selecciona una imagen.</div>
                        <script src="../js/warningMsgFadeout.js" type="text/javascript"></script> 
                    <?php
                    }
                    ?>

                    <?php
                    if(isset($_GET["formatoIncorr"]) && $_GET["formatoIncorr"] == "true") {
                    ?>
                        <div id="error">Solamente se aceptan imágenes .jpg o .png</div>
                        <script src="../js/errorMsgFadeout.js" type="text/javascript"></script> 
                    <?php
                    }
                    ?>

                    <?php
                    if(isset($_GET["usrExist"]) && $_GET["usrExist"] == "true") {
                    ?>
                        <div id="error">El nombre de usuario ya está en uso. Prueba con otro.</div>
                        <script src="../js/errorMsgFadeout.js" type="text/javascript"></script> 
                    <?php
                    }
                    ?>

                    <?php
                    if(isset($_GET["cambiado"])) {
                        if($_GET["cambiado"] == "true") {
                    ?>
                            <div id="success">Tu perfil se actualizará en breves. Puede tardar unos minutos.</div>
                            <script src="../js/successMsgFadeout.js" type="text/javascript"></script> 
                    <?php
                        }else {
                    ?>
                            <div id="error">Ha ocurrido un error. Vuelve a intentarlo.</div>
                            <script src="../js/errorMsgFadeout.js" type="text/javascript"></script> 
                    <?php
                        }
                    }
                    ?>

                    <?php
                    if(isset($_GET["contraIncorr"]) && $_GET["contraIncorr"] == "true") {
                    ?>
                        <div id="error">Contraseña actual incorrecta.</div>
                        <script src="../js/errorMsgFadeout.js" type="text/javascript"></script> 
                    <?php
                    }
                    ?>

                    <?php
                    if(isset($_GET["repeMal"]) && $_GET["repeMal"] == "true") {
                    ?>
                        <div id="error">Has repetido incorrectamente la contraseña. Vuelve a intentarlo.</div>
                        <script src="../js/errorMsgFadeout.js" type="text/javascript"></script> 
                    <?php
                    }
                    ?>

                    <div id="update-card" class="card">
                        <div id="contenedor-cruz" onclick="ocultarCard()"><img id="cerrar" src="../imgs/menu_icons/cruz.png"></div>

                        <div id="modiFoto" class="card-content">
                            <img id="card-avatar" src='../imgs/users/<?php if($foto != NULL){echo $foto;}else{echo ("no-user-img.png");}?>'>
                            <form action="deleteFoto.php" method="POST" enctype="multipart/form-data">
                                <div style="margin-bottom:15px;" class="custom-input-file col-md-6 col-sm-6 col-xs-6">
                                    <input id="foto" name="foto" type="submit" class="input-file">
                                    <div style="width: 80px; margin-left: 150px;">
                                        Quitar 
                                        <img style="width: 25px; float: right" src="../imgs/menu_icons/delete.png" alt="delete">
                                    </div>
                                </div>
                            </form>
                            <form action="modiFoto.php" method="POST" enctype="multipart/form-data">
                                <div onclick="mostrarInfo()" class="custom-input-file col-md-6 col-sm-6 col-xs-6">
                                    <input id="foto" name="foto" type="file" class="input-file">
                                    <div style="width: 105px; margin-left: 136px;">
                                        Cambiar
                                        <img style="width: 22px; float: right" src="../imgs/menu_icons/edit.png" alt="edit">
                                    </div>
                                </div>
                                <div id="continuar">
                                    <img src="../imgs/menu_icons/continuar.png" alt="continue">
                                    <button id="hidden-button" type="submit"></button>
                                </div>
                            </form>
                        </div>

                        <div id="modiNombre" class="card-content">
                            <h1>Nombre</h1>
                            <form action="modiNombre.php" method="POST">
                                <input type="text" maxlength="50" name="nombre" placeholder="Nombre" required>
                                <input type="text" maxlength="100" name="apellidos" placeholder="Apellidos" required>
                                <div id="continuar">
                                    <img src="../imgs/menu_icons/continuar.png" alt="continue">
                                    <button id="hidden-button" type="submit"></button>
                                </div>
                            </form>
                        </div>

                        <div id="modiUser" class="card-content">
                            <h1>Nombre de Usuario</h1>
                            <form action="modiUsr.php" method="POST">
                                <input type="text" maxlength="50" name="usr" placeholder="Usuario" required>
                                <div id="continuar">
                                    <img src="../imgs/menu_icons/continuar.png" alt="continue">
                                    <button id="hidden-button" type="submit"></button>
                                </div>
                            </form>
                        </div>

                        <div id="modiPwd" class="card-content">
                            <h1>Contraseña</h1>
                            <form action="modiPwd.php" method="POST">
                                <input type="password" name="pwdAct" placeholder="Contraseña actual" required>
                                <hr style="margin-bottom: 15px; border: 1px solid; border-color: white; background-color: white;">
                                <input type="password" name="pwd" placeholder="Contraseña nueva" required>
                                <input type="password" name="pwdRepe" placeholder="Repetir contraseña" required>
                                <div id="continuar">
                                    <img src="../imgs/menu_icons/continuar.png" alt="continue">
                                    <button id="hidden-button" type="submit"></button>
                                </div>
                            </form>
                        </div>

                        <div id="modiMail" class="card-content">
                            <h1>Email</h1>
                            <form action="modiMail.php" method="POST">
                                <input type="email" name="mail" maxlength="150" placeholder="Dirección de email" required>
                                <div id="continuar">
                                    <img src="../imgs/menu_icons/continuar.png" alt="continue">
                                    <button id="hidden-button" type="submit"></button>
                                </div>
                            </form>
                        </div>

                        <div id="modiTelf" class="card-content">
                            <h1>Teléfono</h1>
                            <form action="modiTelf.php" method="POST">
                                <input type="tel" name="telf" maxlength="15" placeholder="Número de teléfono" required>
                                <div id="continuar">
                                    <img src="../imgs/menu_icons/continuar.png" alt="continue">
                                    <button id="hidden-button" type="submit"></button>
                                </div>
                            </form>
                        </div>
                    </div>



                    <div class="info">

                        <div id="foto">
                            <img onclick="mostrarCard(1)" id="avatar" src='../imgs/users/<?php if($foto != NULL){echo $foto;}else{echo ("no-user-img.png");}?>'>
                            <img onclick="mostrarCard(1)" id="avatar-hover" src='../imgs/menu_icons/fotoPerfil-hover.jpg'>
                        </div>

                        <div onclick="mostrarCard(2)">
                            <h2 class="campo-perfil" id="nombre">
                                <?php echo $nombre;?> <img style="width: 30px; height: 30px; vertical-align: text-top;" class="edit-icon" src="../imgs/menu_icons/edit.png" alt="edit">
                            </h2>
                        </div>

                        <div onclick="mostrarCard(3)">
                            <p class="campo-perfil">
                                <strong>Usuario:</strong> <?php echo $nombreUsr;?> 
                                <img class="edit-icon" src="../imgs/menu_icons/edit.png" alt="edit">
                            </p>
                        </div>

                        <div onclick="mostrarCard(4)">
                            <p class="campo-perfil">
                                <strong>Cambiar contraseña</strong> 
                                <img class="edit-icon" src="../imgs/menu_icons/edit.png" alt="edit">
                            </p>
                        </div>

                        <div onclick="mostrarCard(5)">
                            <p class="campo-perfil">
                                <strong>Email:</strong> <?php echo $mail;?> 
                                <img class="edit-icon" src="../imgs/menu_icons/edit.png" alt="edit">
                            </p>
                        </div>

                        <div onclick="mostrarCard(6)">
                            <p class="campo-perfil">
                                <strong>Teléfono:</strong> <?php echo $telefono;?> 
                                <img class="edit-icon" src="../imgs/menu_icons/edit.png" alt="edit">
                            </p>
                        </div>

                    </div>
                    <?php
                }
            }
            desconectar($conex);
        } else {header("Location: ../index.php");}
        ?>
        <script src="../js/funcionesPerfil.js"></script>
    </body>
</html>