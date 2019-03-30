<?php
require_once '../core/config.php';


if($_POST['logar']){
    
  #----------------------------------------
  # Pega dados formulario
  $login=$_POST['login'];
  $senha=$_POST['senha'];
  
  $valida=validaUsuarioSenha($conn,$login,$senha); 
  
  if($valida->rowcount() > 0){
      
      # INICIALIZA SESSAO DO USUARIO #
      require_once '../controles/sessao.php';
  
      
      # REDIRECIONA USUARIO PARA TELA INICIAL #
      echo "<script>window.location='../paginas/index.php'</script>";
  }else{
      echo "<script>alert('Usuário ou senha incorretos!')</script>";
      echo "<script>window.location='../paginas/login.php'</script>";
  }
}

if($_GET['logout']){
    
    session_start();
    session_destroy();
    
    
    # DIRECIONA USUARIO PARA PAGINA DE LOGIN #
    echo "<script>window.location='../paginas/login.php'</script>";
}
?>


