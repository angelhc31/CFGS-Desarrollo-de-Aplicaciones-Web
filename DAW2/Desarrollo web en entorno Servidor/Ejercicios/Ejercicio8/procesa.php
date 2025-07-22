<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Procesar envío</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
  </head>

  <body>
    <div class="container">
      <?php
        $ErrorEnvio = false;
        $carpeta = "./ficheros";
        $fichero = $carpeta."/".$_FILES['fichero']['name'];

        if(file_exists($carpeta) == false) {
          mkdir($carpeta);
        }

        if (is_uploaded_file($_FILES['fichero']['tmp_name'])) {
          if(filesize($_FILES['fichero']['tmp_name']) == 0) {
            $ErrorEnvio=true;
          }else {
            move_uploaded_file($_FILES['fichero']['tmp_name'], $fichero);
          }
        }else {
          $ErrorEnvio=true;
        }

        if($ErrorEnvio) {
      ?>

      <div class="alert alert-danger" role="alert">
        <p><?php echo $_POST['nombre']; ?>, se ha producido algún error al intentar enviar el fichero 
          (<?php echo $_FILES['fichero']['name']; ?>). Inténtelo de nuevo.</p>
      </div>

      <?php 
        }else { 
      ?>

      <div class="alert alert-success" role="alert">
        <p>Usuario: <?php echo $_POST['nombre']; ?></p>
        <p>El documento ha sido almacenado de forma correcta.</p>
        <ul>
        <li><strong>Nombre</strong>: <?php echo $_FILES['fichero']['name'];?></li>
          <li><strong>Tipo</strong>: <?php echo $_FILES['fichero']['type'];?></li>
          <li><strong>Tamaño</strong>: <?php echo $_FILES['fichero']['size'];?> bytes</li>
        </ul>
        <p>Si quieres consultarlo se encuantra en la carpeta de archivos </p>
        <br>
      </div>

      <?php 
        } 
      ?>
    </div>
  </body>
</html>