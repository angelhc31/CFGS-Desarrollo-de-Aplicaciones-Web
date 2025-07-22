<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Añadir Usuarios</title>
    </head>

    <body>
        <a href="index.php"><button>Volver</button></a><br>
        <br>
        <form action="crearUsuario.php" method="POST">
            <input type="text" name="usuario" placeholder="Usuario..."><br>
            <br>
            <input type="text" name="paswd" placeholder="Password..."><br>
            <br>
            Tipo: <select name="tipo"><option value="1">Admin</option><option value="0">User</option></select><br>
            <br>
            <input type="submit" value="Crear">
        </form>
    </body>
</html>