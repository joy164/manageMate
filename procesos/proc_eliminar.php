<?php
//archivos incluidos
include_once("../database/conexion.php");
include("../funciones/funciones.php");
session_start();
//variables declaradas
$mensaje = "";
$id = $_REQUEST["id"];

    if(isset($_POST["acepto"])){
        $datos = consultaUsuarioId($_SESSION["id"], $conex);
        if(password_verify($_POST["contraseña"], $datos["password"])){
            if(eliminarProducto($id, $conex)){
                $mensaje = "producto eliminado con exito";
                header("location: ../pantallas/mostrar_productos.php?mens=$mensaje");
            }else{
                $mensaje = "error al eliminar producto";
                header("location: ../pantallas/mostrar_productos.php?mens=$mensaje");
            }
        }else{
            $mensaje = "contraseña incorrecta";
            header("location: ../pantallas/mostrar_productos.php?mens=$mensaje");
        }        
        
    }else if(isset($_POST["no_acepto"])){
        header("location: ../pantallas/mostrar_productos.php");
    }
    
    

?>