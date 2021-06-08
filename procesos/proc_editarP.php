<?php
//archivos incluidos
include_once("../funciones/funciones.php");
include_once("../database/conexion.php");
//variables del formulario
$id = $_REQUEST["id"];
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
        if(actualizarProducto($id, $conex, $nom, $des, $marca, $precio, $foto)){
            //redirigimos a la pantalla de nuevo producto con el resultado del proceso 
            $mensaje="producto actualizado con exito";
            header("location: ../pantallas/mostrar_productos.php?mens=$mensaje");
        }else{
            //si no enviamos un mensaje de error 
            $mensaje="error al actualizar producto";
            header("location: ../pantallas/mostrar_productos.php?mens=$mensaje");
        }
    }

?>