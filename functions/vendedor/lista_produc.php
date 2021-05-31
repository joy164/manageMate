<?php
    session_start();
    if(!isset($_SESSION['id']) || $_SESSION['id_rol'] == '2'){
        header('Location: ../../index.php');
    }
    require("../../database.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="../../utils/css/style.css">
    <title>Lista de productos</title>
</head>
<body>
    <?php require'../../partials/header.php'?>
    <center>
        <table width = "60%" border = "2px">
            <tr>
                <td>id de producto</td>
                <td>nombre</td>
                <td>imagen</td>
            </tr>
            <?php foreach($conn->query('SELECT * FROM productos') as $results) {?>
                <tr>  
                    <td><?= $results['id'];?><br></td>
                    <td><?= $results['nombre'];?><br></td>
                    <td><img height = "80px"src="data:img/;base64, <?=base64_encode($results['imagen']); ?>"><br></td>
                </tr>
            <?php }?>
        </table>
    </center>
    
</body>
</html>