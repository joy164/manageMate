<?php
//archivos incluidos
include("../funciones/funciones.php");
    //verifica si hay una sesion activa
    sesion_iniciada();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/managemate/utils/icons/icono.png">
        <link rel="stylesheet" href="/managemate/utils/css/formulario.css">
        <link rel="stylesheet" href="/managemate/utils/css/generico.css">
        <title>Registro</title>
    </head>

    <body>
        <?php 
            include("../partials/header.php");
            include("../partials/menu_generico.php");
        ?>        
        <div class="form-formulario">
            <div class="form-contenido">
                <h2>Registro</h2>
                <form action="../procesos/proc_registro.php" method="POST">
                    <input REQUIRED name="correo" type="text" placeholder="ingresa tu correo">
                    <input REQUIRED name="nombre" type="text" placeholder="ingresa tu nombre(s)">
                    <input REQUIRED name="apellido" type="text" placeholder="ingresa tu apellido">
                    <input REQUIRED name="direccion" type="text" placeholder="ingresa tu dirección">
                    <input REQUIRED name="contraseña" type="password" placeholder="ingresa tu contraseña">
                    <input REQUIRED name="aceptar" type="submit" value="Registrarse">
                </form>
                <!--evaluamos si proc_registro envio un mensaje-->
                <?php if(isset($_REQUEST['mens'])):?>
                    <p><?=$_REQUEST['mens']?></p>
                <?php endif;?>
                <p>¿ya tienes una cuenta?<a href="/managemate/pantallas/iniciar_sesion.php"> Inicia sesión </a></p>
            </div>
            
        </div>
    </body>

    <footer class="pie_pagina">
        <p>ManageMate todos los derechos reservados &copy</p>
    </footer>

</html>