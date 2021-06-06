<?php
//archivos incluidos
include_once("database/conexion.php");
session_start();
//declaracion de variables
$usuario = null;

    //evaluamos si se creo una variable de sesion y es diferente de nulo
    if(isset($_SESSION["id"])){
        //consulta del id, password e id_rolj de la tabla usuarios 
        $consul = "SELECT email, name, id_rol FROM users WHERE id = '{$_SESSION["id"]}'";
        $resul = $conex->query($consul);
        //arreglo de los resultados por asosiacion  
        $datos = $resul->fetch_array(MYSQLI_ASSOC);       
        //numero de filas obtenidas
        $fila= $resul->num_rows;

        //si hay resultados en la consulta se inicializa la variable usuario con los datos consultados
        if($fila == 1){
            $usuario = $datos;
        }
    }
 
?>