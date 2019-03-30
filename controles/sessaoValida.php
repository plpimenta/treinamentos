<?php

session_start();

//var_dump($_SESSION);
if (!isset($_SESSION['login'])) {
	echo "<script>window.location='../paginas/login.php';</script>";
}
require_once '../classes/conn.php';

$id = $_SESSION['login'];

$valida = $conn->prepare('SELECT * FROM usuarios WHERE usuario_id= :paramid');
$valida->bindValue(':paramid', $id);
$valida->execute();
$row_usu_info = $valida->fetch();

?>  