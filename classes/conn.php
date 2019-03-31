<?php
header('Content-Type: text/html; charset=utf-8');

try{
    $conn=new PDO('mysql:host=localhost;dbname=treinamentos','admin','policy=99',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
     echo 'ERROR: ' . $e->getMessage();
}



?>
