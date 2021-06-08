<?php 
    include("../funciones/funciones.php");
    include("../database/conexion.php");
    validar_vendedor();
    $producto = consultaProductoId($_REQUEST["id"], $conex);
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
        <title>Eliminar Producto</title>
    </head>

    <body>
        <?php 
            include("../partials/header.php"); 
            include("../partials/menu_vendedor.php");
        ?>
        <div class="form-formulario">
                <div class="form-contenido">
                    <p>seguro que quiere eliminar el producto?:<br>"<?=$producto["nombre"]?>" con id: "<?=$producto["id"]?>"</p>
                    <img height = "200px" src="data:img/jpg;base64, <?=base64_encode($producto["imagen"]); ?>">
                    <form action="../procesos/proc_eliminar.php?id=<?=$producto["id"]?>" method="POST">
                    <input name="contraseña" type="password" placeholder="ingresa tu contraseña para confirmar"><br><br>   
                    <input name="acepto" type="submit" value="si, quiero eliminarlo">                       
                    <input name="no_acepto"type="submit" value="no, quiero conservarlo">
                    </form>
                </div>
            </div>
    </body>

    <footer class="pie_pagina">
        <p>ManageMate todos los derechos reservados &copy</p>
    </footer>
</html>
