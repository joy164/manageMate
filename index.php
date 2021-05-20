<?php
  session_start();

  require 'database.php';

  if (isset($_SESSION['user_id'])) {
    $records = $conn->prepare('SELECT id, name, id_rol FROM users WHERE id = :id');
    $records->bindParam(':id', $_SESSION['user_id']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;

    if (count($results) > 0) {
      $user = $results;
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>ManageMate</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="utils/css/style.css">
  </head>
  <body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($user)): ?>
      <div id = "titulo">
        <br> bienvenido <?= $user['name']; ?> iniciaste sesion
        <?php if($user['id_rol'] == '1'): ?>
          eres vendedor
        <?php else: ?>
          eres comprador
        <?php endif;?>      
      </div>
      <br><nav><a href="/manageMate/cerrar_sesion.php">Logout</a></nav>      
      <div id = "texto">
        <br><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
        Placeat quae necessitatibus voluptate provident non expedita dicta odit fuga atque! <br>
        Quidem autem quasi unde cum ipsam? Dolor doloribus in illo voluptatibus! </p>

        <br><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
        Placeat quae necessitatibus voluptate provident non expedita dicta odit fuga atque! <br>
        Quidem autem quasi unde cum ipsam? Dolor doloribus in illo voluptatibus! </p>
      </div>
    <?php else: ?>
      <div id = "titulo">
        <h1>Por favor inicia sesion o registrate</h1>
      </div>
      <nav>
        <a href="iniciar_sesion.php">Inicia Sesion</a> o
        <a href="registro.php">Registrate</a>
      </nav>
      <div id = "texto">
      <br><p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. <br>
      Placeat quae necessitatibus voluptate provident non expedita dicta odit fuga atque! <br>
      Quidem autem quasi unde cum ipsam? Dolor doloribus in illo voluptatibus!</p>
      </div>
    <?php endif;?>
  </body>
</html>
