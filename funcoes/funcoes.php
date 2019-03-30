<?php
function formataTags($string){
    $string=  str_replace("<p>","",$string);
    $string=  str_replace("</p>","",$string);
    return $string;
}
function funcaoGravarAtualizarTreinamento($conn,$dados){
    
    
    $grava=$conn->prepare('UPDATE treinamentos SET treinamento_nome = :nome , 
            treinamento_treinados = :treinados , treinamento_formar = :formar ,
            treinamento_vencidos = :vencidos WHERE treinamento_id = :id');
    $grava->bindValue(":nome",$dados[0]);
    $grava->bindValue(":formar",$dados[1]);
    $grava->bindValue(":treinados",$dados[2]);
    $grava->bindValue(":vencidos",$dados[3]);
    $grava->bindValue(":id",$dados[4]);
    $grava->execute();
    if($grava){
        echo "Dados alterados com sucesso";
    }else{
        echo "!!! ATENÇÃO !!! Falha ao tentar alterar os dados";
    }
        
    
}
function formatarCnpj($cnpj_cpf)
{
  if (strlen(preg_replace("/\D/", '', $cnpj_cpf)) === 11) {
    $response = preg_replace("/(\d{3})(\d{3})(\d{3})(\d{2})/", "\$1.\$2.\$3-\$4", $cnpj_cpf);
  } else {
    $response = preg_replace("/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/", "\$1.\$2.\$3/\$4-\$5", $cnpj_cpf);
  }

  return $response;
}
?>