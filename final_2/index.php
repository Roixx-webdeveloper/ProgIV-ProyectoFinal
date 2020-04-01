<!DOCTYPE html>
<html>

<?php
    require_once 'config.php';

?>

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="Resources/login.css" />
        <title>Cakelove - Iniciar sesión</title>
    </head>
    <body style= "background-image: url(Resources/img/fondo.jpg); background-size:cover; background-position:top left; background-repeat:no-repeat; background-attachment:fixed">
        <div class="content">
            <div class="logo">
                <a href="index.php">
                    <img class="logo header-logo" src="Resources/img/logo2.jpg" alt="logo" height="75">
                </a>
            </div>
            <div class="login">
                <h2>Inicio de Sesión</h2><br>
                <form action="POST" class="form-login">
                    <h4>Correo:</h4>
                    <input class="itext" type="text" name="email" size="15" id="correo">
                    <h4>Contraseña:</h4>
                    <input class="itext" type="password" name="password" size="15" id="contrasena">
                    <button class="btn" id="login"  name="submit" value="Iniciar sesión">Login</button>
                </form> 
                <a href="registro.php">Registro</a><br>
            </div>
        </div>
        <script src="js/jquery.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>