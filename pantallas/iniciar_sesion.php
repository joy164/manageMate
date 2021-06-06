<?php
//archivos incluidos
include("../funciones/funciones.php");
    //sesion iniciada
    sesion_iniciada();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/utils/icons/icono.png">
        <link rel="stylesheet" href="/utils/css/formulario.css">
        <link rel="stylesheet" href=/manageMate/utils/css/generico.css">
        <title>Iniciar Sesión</title>
    </head>

    <body>
        <!--encabezado de pagina con menu-->
        <?php 
            include("../partials/header.php");
            include("../partials/menu_generico.php");
        ?>        
        <!--formulario de iniciar sesion-->
        <div class="form-formulario">
            <div class="form-contenido">
                <h2>Inicia sesion</h2>
                <form action="../procesos/proc_iniciar_sesion.php" method="POST">
                    <input REQUIRED name="correo"type="text" placeholder="ingresa tu correo">
                    <input REQUIRED name="contraseña"type="password" placeholder="ingresa tu contraseña">
                    <input name="aceptar"type="submit" value="Iniciar sesión">
                </form>
                <!--evaluamos si proc_registro envio un mensaje-->
                <?php if(isset($_REQUEST['mens'])):?>
                    <p><?=$_REQUEST['mens']?></p>
                <?php endif;?>
                <p>¿no tienes una cuenta?<a href="/pantallas/registro.php"> Registrate </a></p>
            </div>
        </div>
    </body>

    <footer class="pie_pagina">
        <p>ManageMate todos los derechos reservados &copy</p>
    </footer>

</html>