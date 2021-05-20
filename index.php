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
      </div>
      <br><nav><a href="/manageMate/cerrar_sesion.php">Cerrar sesion</a></nav>      
      <div id = "texto">
        <?php if($user['id_rol'] == '1'): ?>
          <p>eres el administrador, los procesos que puedes hacer son:<br>
            1. Modificar, agregar y eliminar productos del catalogo. <br>
            2. Ver la lista de pedididos teniendo de los datos del cliente (nombre, correo, direccion<br>
        <?php else: ?>
            eres comprador, los procesos que puedes hacer son: <br>
            1. buscar pruductos del catalogo de la tienda <br>
            2. agregar productos al carrito siempre y cuando se este registrado <br>
            3. registrarse en la plataforma <br>
            4. solo ve los atributos de los productos (imagen, precio, nombre y disponibilidad) <br>
        <?php endif;?>      
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
