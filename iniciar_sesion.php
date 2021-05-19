<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /manageMate/index.php');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';
    if($results){
      if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
          $_SESSION['user_id'] = $results['id'];
          header("Location: /manageMate/index.php");
        }else{
            $message = 'correo o contraseña incorrectos';
          }  
    }else{
      $message = 'usuario desconocido, por favor registrate';
      }
    
  }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="utils/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <div id = formulario >
      <h1>Inicia Sesion </h1>
        <form action="/manageMate/iniciar_sesion.php" method="POST">
          <input name="email" type="text" placeholder="Ingresa tu correo">
          <input name="password" type="password" placeholder="Ingresa tu contraseña">
          <input type="submit" value="Iniciar sesion">
        </form>
        <?php if(!empty($message)):?>
          <p><?= $message ?></p>
        <?php endif; ?>
      </div>
  </body>
</html>
