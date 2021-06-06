<?php 
    include("procesos/validar_sesion.php");
?>
<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/utils/icons/icono.png">
        <link rel="stylesheet" href="/utils/css/generico.css">
        <title>ManageMate</title>
    </head>

    <body>
        <?php 
            //encabezado de pagina
            include("partials/header.php"); 
            //validamos si la variable usuario esta vacia
            if(empty($usuario)){
                //si esta vacia incluimos el menu generico
                include("partials/menu_generico.php");
            }else{
                //si no evaluamos que tipo de usuario esta iniciando sesion
                if($usuario["id_rol"] == '1'){
                    //si es un vendedor le mostramos todas las funciones del vendedor
                    include("partials/menu_vendedor.php");
                }else{
                    //si no le mostramos todas las funciones del cliente
                    include("partials/menu_usuario.php");
                }
                
            }
            //buscador de articules, presente en ambas sesiones
            include("partials/buscador.php"); 
        ?>

    </body>

    <footer class="pie_pagina">
        <p>ManageMate todos los derechos reservados &copy</p>
    </footer>
</html>
