<?php
//archivos incluidos
include_once("../funciones/funciones.php");
include_once("../database/conexion.php");
    //validando rol de usuario
    validar_vendedor();
    //realizando consulta SQL del producto que se quiere editar
    $producto = consultaProductoId($_REQUEST["id"], $conex);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/manageMateo/utils/icons/icono.png">
        <link rel="stylesheet" href="/manageMate/utils/css/formulario.css">
        <link rel="stylesheet" href="/manageMate/utils/css/generico.css">
        <title>Actualizar Producto</title>
    </head>

    <body>
        <?php 
            include("../partials/header.php");
            include("../partials/menu_vendedor.php");
        ?>        
        <div class="form-formulario">
            <div class="form-contenido">
                <h2>Editar producto </h2>
                <form action="../procesos/proc_editarP.php?id=<?=$producto["id"]?>" method="POST"  enctype = "multipart/form-data">
                    <input REQUIRED name="nombre" type="text" placeholder="ingresa el nombre del producto" value="<?=$producto["nombre"]?>">
                    <input REQUIRED name="descripcion" type="text" placeholder="ingresa la descripcion del producto" value="<?=$producto["descripcion"]?>">
                    <input REQUIRED name="marca" type="text" placeholder="ingresa la marca del producto" value="<?=$producto["marca"]?>">
                    <input REQUIRED name="precio" type="text" placeholder="ingresa el precio del producto" value="<?=$producto["precio"]?>">
                    <br><br><img height = "200px" src="data:img/jpg;base64, <?=base64_encode($producto["imagen"]); ?>"><br><br>
                    <input REQUIRED name="foto" type="file">
                    <input REQUIRED name="aceptar" type="submit" value="Actualizar producto">
                </form>
            </div>
            
        </div>
    </body>

    <footer class="pie_pagina">
        <p>ManageMate todos los derechos reservados &copy</p>
    </footer>

</html>