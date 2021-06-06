<?php 
//archivos incluidos
session_start();
include_once("../database/conexion.php");
include("../funciones/funciones.php");
//variables
$mensaje = "";
//variables del formulario
$correo = $_POST["correo"];
$contraseña = $_POST["contraseña"];

    //si el boton fue presionado
    if(isset($_POST["aceptar"])){
        //validamos formato de correo
        if(filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)){
            //consulta por id de la tabla usuarios 
            $datos = consultaUsuarioCorreo($correo, $conex);
            //si la consulta es exitosa
            if($datos){
                //verificamos si su contraseña sea correcta
                if(password_verify($contraseña, $datos["password"])){
                    //creamos las variables SESSION para guardar la id y su rol al iniciar sesion 
                    $_SESSION["id"] = $datos["id"];
                    $_SESSION["id_rol"] = $datos["id_rol"];
                    //regresamos a la pagina principal 
                    header("location: ../index.php");
                }else{
                    //en caso de error redireccionamos a iniciar sesion con mensaje de error
                    $mensaje="contraseña incorrecta";
                    header("location: ../pantallas/iniciar_sesion.php?mens=$mensaje");    
                }
            }else{
                //en caso de que la consulta no es exitos decimos que el usuario no existe
                $mensaje="usuario no reconocido o correo incorrecto";
                header("location: ../pantallas/iniciar_sesion.php?mens=$mensaje");
            }
        }else{
             //redirigimos a pagina de registro con el resultado del proceso
             $mensaje="correo invalido";
             header("Location: ../pantallas/iniciar_sesion.php?mens=$mensaje");
        }
    }
?>