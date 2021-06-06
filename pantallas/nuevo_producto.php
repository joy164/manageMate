<?php
//archivos incluidos
include("../funciones/funciones.php");
    //validando rol de usuario
    validar_vendedor();
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/utils/icons/icono.png">
        <link rel="stylesheet" href="/utils/css/generico.css">
        <link rel="stylesheet" href="/utils/css/formulario.css">
        <title>Nuevo Producto</title>
    </head>

    <body>
        <?php 
            include("../partials/header.php");
            include("../partials/menu_vendedor.php");
        ?>        
        <div class="form-formulario">
            <div class="form-contenido">
                <h2>Nuevo producto </h2>
                <form action="../procesos/proc_nuev_producto.php" method="POST"  enctype = "multipart/form-data">
                    <input REQUIRED name="nombre" type="text" placeholder="ingresa el nombre del producto">
                    <input REQUIRED name="descripcion" type="text" placeholder="ingresa la descripcion del producto">
                    <input REQUIRED name="marca" type="text" placeholder="ingresa la marca del producto">
                    <input REQUIRED name="precio" type="text" placeholder="ingresa el precio del producto">
                    <input REQUIRED name="foto" type="file">
                    <input REQUIRED name="aceptar" type="submit" value="Registrar producto">
                </form>
                <!--evaluamos si proc_registro envio un mensaje-->
                <?php if(isset($_REQUEST['mens'])):?>
                    <p><?=$_REQUEST['mens']?></p>
                <?php endif;?>
            </div>
        </div>
    </body>

    <footer class="pie_pagina">
        <p>ManageMate todos los derechos reservados &copy</p>
    </footer>

</html>