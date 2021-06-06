<?php 
//archivos incluidos
include_once("../database/conexion.php");
include("../funciones/funciones.php");
//variables 
$mensaje = "";
//variables del formulario
$correo = $_POST["correo"];
$nom = $_POST["nombre"];
$apellido = $_POST["apellido"];
$direc = $_POST["direccion"];
//encriptacion de contraseña
$contraseña = password_hash($_POST['contraseña'], PASSWORD_BCRYPT);
$registro = consultaUsuarioCorreo($correo, $conex); 

    //si boton fue presionado
    if(isset($_POST["aceptar"])){
        //validamos formato de correo
        if(filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)){
            //evaluamos si el correo ya fue registrado
            if(strcmp($registro["email"],$correo ) !== 0){
                //validamos si la insersion se realizo con exito
                if(registrarCliente($conex, $nom, $apellido, $direc, $correo, $contraseña)){
                    //redirigimos a pagina de registro con el resultado del proceso
                    $mensaje="usuario registrado con exito";
                    header("Location: ../pantallas/registro.php?mens=$mensaje");
                }else{
                    //redirigimos a pagina de registro con el resultado del proceso
                    $mensaje="error al registrar usuario";
                    header("Location: ../pantallas/registro.php?mens=$mensaje");
                }
            }else{
                    $mensaje="El correo ya esta registrado";
                    header("Location: ../pantallas/registro.php?mens=$mensaje");
            }
        }else{
            //redirigimos a pagina de registro con el resultado del proceso
            $mensaje="correo invalido";
            header("Location: ../pantallas/registro.php?mens=$mensaje");
        }
    }
?>