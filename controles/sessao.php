<?php

if(!$valida){
   
    echo "<script>window.localtion=../paginas/login.php</script>";
    
}

session_start();


$row_usu_info = $valida->fetch();
$id_login = $row_usu_info['usuario_id'];
$_SESSION['login'] = $id_login;

?>


