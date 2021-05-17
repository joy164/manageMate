<?php
    include("database.php");
    $mensaje = '';
    if(isset($_POST['registrarse'])){
        if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){
            $correo = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $cpassword = password_hash($_POST['confirm_password'], PASSWORD_BCRYPT);
            if(strcmp ($password, $cpassword) == 1){
                $consulta = "INSERT INTO usuarios(correo, password) VALUES ('$correo','$password')";
                $result = mysqli_query($conn, $consulta);
                if($result){
                    $mensaje = "registro exitoso";
                    }else{
                        $mensaje = "error al registrar el usuario";
                        }   
            }else{
                    $mensaje = "las contraseñas no coinciden";
                }
        }else{
            $mensaje = "llene todos los datos del formulario";
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
    <title>ManageMate-Registro</title>
</head>
<body>
    <?php require 'partials/header.php' ?>
    <div id = "formulario">
        <h1>Registrate</h1>
        <form method = "post" action="registro.php">
            <input name="email" type="text" placeholder="ingresa tu correo">
            <input name="password" type="password" placeholder="ingresa tu contraseña">
            <input name="confirm_password" type="password" placeholder="confirma tu contraseña">
            <input name ="registrarse" type="submit" value="Registrarse">
        </form>    
        <?php echo"$mensaje"?>
    </div>
</body>
</html>