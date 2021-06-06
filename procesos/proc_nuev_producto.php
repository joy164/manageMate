9<?php
//archivos archivos
include_once("../database/conexion.php");
include("../funciones/funciones.php");
//variables del formulario
$nom = $_POST["nombre"];
$des = $_POST["descripcion"];
$marca = $_POST["marca"];
$precio = $_POST["precio"];
$foto = addslashes(file_get_contents($_FILES["foto"]["tmp_name"]));
//variables
$mensaje="";
    //verifica si se presiono el boton 
    if(isset($_POST["aceptar"])){
        //si la consulta se realizo con exito
        if(registrarProducto($conex, $precio, $des, $marca, $nom, $foto)){
            //redirigimos a la pantalla de nuevo producto con el resultado del proceso 
            $mensaje="producto registrado con exito";
            header("location: ../pantallas/nuevo_producto.php?mens=$mensaje");
        }else{
            //si no enviamos un mensaje de error 
            $mensaje="error al registrar producto";
            header("location: ../pantallas/nuevo_producto.php?mens=$mensaje");
        }
    }

?>