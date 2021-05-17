<?php
    include("database.php");
    $mensaje = '';
    if(isset($_POST['ini_sesion'])){
        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $correo = $_POST['email'];
            $password = $_POST['password'];
            $consulta = "SELECT correo, password FROM usuarios WHERE correo = '$correo'";
            $resultado = mysqli_query($conn, $consulta);
            $array = mysqli_fetch_array($resultado,MYSQLI_ASSOC);

            if(mysqli_num_rows($resultado) > 0 && password_verify($password, $array["password"])){
                $mensaje = "usuario validado";
            }else{
                $mensaje = "error al validar las credenciales";
             }
        }else{
            $mensaje = 'favor de llenar su correo y contraseña';
        }
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@700&family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="utils/css/style.css">
    <title>Document</title>
</head>
<body>
    <?php require 'partials/header.php' ?>
    <div id = "formulario">
    <h1>Iniciar sesion</h1>
        <form method = "post" action="iniciar_sesion.php">
            <input name="email" type="text" placeholder="ingresa tu correo">
            <input name="password" type="password" placeholder="ingresa tu contraseña">
            <input name="ini_sesion" type="submit" value="Iniciar Sesion">
        </form>
        <?php echo"$mensaje"?>
    </div>
    
</body>
</html>