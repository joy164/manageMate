<?php
$server="127.0.0.1";
$user="root";
$password="";
$database="managemate-database";
$conex = new mysqli($server, $user, $password, $database);
    
    if($conex->connect_errno){
        echo("Fallo al conectar a MySQL: (" . $conex->connect_errno . ") " . $conex->connect_error);
    }
    //echo ($mysqli->host_info . "\n");

?>