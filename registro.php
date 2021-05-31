<?php
  session_start();
  
  if(isset($_SESSION['id'])){
    header('Location: /ManageMate/index.php');
  }

  require 'database.php';
  $message = '';
  
  if (!empty($_POST['email']) && !empty($_POST['name']) && !empty($_POST['lastname'])
      && !empty($_POST['address']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (name, lastname, address, email, password, id_rol) VALUES (:name, :lastname, :address, :email, :password, '2')";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $_POST['name']);
    $stmt->bindParam(':lastname', $_POST['lastname']);
    $stmt->bindParam(':address', $_POST['address']);
    $stmt->bindParam(':email', $_POST['email']);    
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'El usuario ha sido creado con exito';
    } else {
      $message = 'Error al registrar usuario';
    }
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Registrar</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="utils/css/style.css">
  </head>
  <body>

    <?php require 'partials/header.php' ?>

    <div id = "formulario">
      <h1>Registro</h1>
      <form action="/manageMate/registro.php" method="POST">
        <input name="email" REQUIRED type="text" placeholder="Ingresa tu correo">
        <input name="name" REQUIRED type="text" placeholder="Ingresa tu nombre">
        <input name="lastname" REQUIRED type="text" placeholder="Ingresa tu apellido">
        <input name="address" REQUIRED type="text" placeholder="Ingresa tu direccion">
        <input name="password" REQUIRED type="password" placeholder="Ingresa tu contraseña">
        <!--<input name="confirm_password" type="password" placeholder="Confirm Password">-->
        <input type="submit" value="Registrar">
      </form>
      <?php if(!empty($message)):?>
          <p><?= $message ?></p>
        <?php endif; ?>
    </div>
    

  </body>
</html>
