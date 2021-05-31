<?php 

    session_start();
    if(!isset($_SESSION['id']) || $_SESSION['id_rol'] == '2'){
        header('Location: ../../index.php');
    }

    require("../../database.php");
    $message = '';
    if(!empty($_POST['nombre'])){
        $nombre = $_POST['nombre'];
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $sql = "INSERT INTO productos (nombre, imagen) VALUES ('$nombre', '$imagen')";
        $stmt = $conn->prepare($sql);
        if($stmt->execute()) {
          $message = 'El producto ha sido registrado con exito';
        } else {
          $message = 'Error al registrar el producto';
        }
    }      
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../../utils/css/style.css">
    <title>Registrar producto</title>
</head>
<body>
    <?php require '../../partials/header.php';?>
    <div id = "formulario">
        <h1>Registro de nuevo producto</h1>
        <form action = "nuevo_producto.php" method = "post" enctype = "multipart/form-data">
            <input name = "nombre"  REQUIRED type = "text" placeholder = "nombre del producto">
            <input name = "imagen"  REQUIRED type = "file" ><br>
            <input type = "submit" value = "Registrar">
        </form>
        <?php if(!empty($message)):?>
            <p><?= $message ?></p>
        <?php endif; ?>
    </div>    
</body>
</html>