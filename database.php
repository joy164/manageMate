<?php

$server = 'localhost';
$username = 'root';
$password = '';
$database = 'managemate-database';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('error al conectarse: ' . $e->getMessage());
}

?>
