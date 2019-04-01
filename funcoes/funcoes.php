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

  #####ALEXANDRE######
function funcaoGravarAtualizarUsuario($conn,$dados){
      $grava=$conn->prepare('UPDATE Pessoal SET Estabelecimento_cod = :Estabelecimento_cod, Estabelecimento_nome = :Estabelecimento_nome, 
          Matricula = :Matricula, Nome = :Nome, Data_admissao = :Data_admissao, Data_nascimento = :Data_nascimento, Cargo_codigo = :Cargo_codigo,
                        Cargo_nome = :Cargo_nome, Codigo = :Codigo, Funcao_nome = :Funcao_nome, Centro_resultado_codigo = :Centro_resultado_codigo, 
                        Centro_resultado_nome = :Centro_resultado_nome, Atividade_periculosa = :Atividade_periculosa, Numero_horas = :Numero_horas, 
                        Sindicato_codigo = :Sindicato_codigo, Sindicato_razaosocial = :Sindicato_razaosocial, Sexo = :Sexo, Grau_instrucao_nome = :Grau_instrucao_nome, 
                        Deficiente = :Deficiente, CPF = :CPF, Chefia_imediata_matricula = :Chefia_imediata_matricula, Chefia_imediata_nome = :Chefia_imediata_nome, 
                        Email = :Email, CTPS_numero = :CTPS_numero, CTPS_serie = :CTPS_serie, PIS = :PIS, Identidade = :Identidade, Situacao = :Situacao, 
                        RUT = :RUT where pessoal_id = :id ');
    $grava->bindValue(":Estabelecimento_cod", $dados[1]);
    $grava->bindValue(":Estabelecimento_nome",$dados[2]);
    $grava->bindValue(":Matricula",$dados[3]);
    $grava->bindValue(":Nome",$dados[4]);
    $grava->bindValue(":Data_admissao",$dados[5]);
    $grava->bindValue(":Data_nascimento",$dados[6]);
    $grava->bindValue(":Cargo_codigo",$dados[7]);
    $grava->bindValue(":Cargo_nome",$dados[8]);
    $grava->bindValue(":Codigo",$dados[9]);
    $grava->bindValue(":Funcao_nome",$dados[10]);
    $grava->bindValue(":Centro_resultado_codigo",$dados[11]);
    $grava->bindValue(":Centro_resultado_nome",$dados[12]);
    $grava->bindValue(":Atividade_periculosa",$dados[13]);
    $grava->bindValue(":Numero_horas",$dados[14]);
    $grava->bindValue(":Sindicato_codigo",$dados[15]);
    $grava->bindValue(":Sindicato_razaosocial",$dados[16]);
    $grava->bindValue(":Sexo",$dados[17]);
    $grava->bindValue(":Grau_instrucao_nome",$dados[18]);
    $grava->bindValue(":Deficiente",$dados[19]);
    $grava->bindValue(":CPF",$dados[20]);
    $grava->bindValue(":Chefia_imediata_matricula",$dados[21]);
    $grava->bindValue(":Chefia_imediata_nome",$dados[22]);
    $grava->bindValue(":Email",$dados[23]);
    $grava->bindValue(":CTPS_numero",$dados[24]);
    $grava->bindValue(":CTPS_serie",$dados[25]);
    $grava->bindValue(":PIS",$dados[26]);
    $grava->bindValue(":Identidade",$dados[27]);
    $grava->bindValue(":Situacao",$dados[28]);
    $grava->bindValue(":RUT",$dados[29]);
    $grava->bindValue(":id",$dados[0]);
 
    $grava->execute();
   
    
}


 function funcaoGravarAtualizarTreinamentosHist($conn, $dados){
     
//     $grava = $conn->prepare("UPDATE treinamentos_historico SET treinamentos_nome = :treinamentos_nome WHERE treinamentos_id = :treinamentos_id");
//     $grava->bindValue(":treinamentos_nome",$dados[1]);
//     $grava->bindValue(":treinamentos_id",$dados[0]);
//     
     
     $grava = $conn->prepare("UPDATE treinamentos_historico SET treinamentos_matricula = :treinamentos_matricula, 
         treinamentos_nome = :treinamentos_nome, treinamentos_admissao = :treinamentos_admissao, treinamentos_desc_funcao = :treinamentos_desc_funcao, 
         treinamentos_turno = :treinamentos_turno, treinamentos_cc = :treinamentos_cc, treinamentos_centro_custo = :treinamentos_centro_custo,
         treinamentos_gerencia = :treinamentos_gerencia, treinamentos_responsavel = :treinamentos_responsavel, treinamentos_desc_curso = :treinamentos_desc_curso, 
         treinamentos_horas = :treinamentos_horas, treinamentos_data_inicio = :treinamentos_data_inicio, treinamentos_emissao_conclusao = :treinamentos_emissao_conclusao, 
       treinamentos_fornecedor = :treinamentos_fornecedor, treinamentos_cpf = :treinamentos_cpf, treinamentos_rg = :treinamentos_rg, treinamentos_validade = :treinamentos_validade,
       treinamentos_status = :treinamentos_status, treinamentos_referencia = :treinamentos_referencia, treinamentos_onda = :treinamentos_onda, 
       treinamentos_atividade_especial = :treinamentos_atividade_especial, treinamentos_externo_interno = :treinamentos_externo_interno,
       treinamentos_necessario = :treinamentos_necessario, treinamentos_justificar = :treinamentos_justificar, treinamentos_obs = :treinamentos_obs WHERE treinamentos_id = :treinamentos_id");
    
     $grava-> bindValue(":treinamentos_id",$dados[0]);
     $grava-> bindValue(":treinamentos_matricula",$dados[1]);
     $grava-> bindValue(":treinamentos_nome",$dados[2]);
     $grava-> bindValue(":treinamentos_admissao",$dados[3]);
     $grava-> bindValue(":treinamentos_desc_funcao",$dados[4]);
     $grava-> bindValue(":treinamentos_turno",$dados[5]);
     $grava-> bindValue(":treinamentos_cc",$dados[6]);
     $grava-> bindValue(":treinamentos_centro_custo",$dados[7]);
     $grava-> bindValue(":treinamentos_gerencia",$dados[8]);
     $grava-> bindValue(":treinamentos_responsavel",$dados[9]);
     $grava-> bindValue(":treinamentos_desc_curso",$dados[10]);
     $grava-> bindValue(":treinamentos_horas",$dados[11]);
     $grava-> bindValue(":treinamentos_data_inicio",$dados[12]);
     $grava-> bindValue(":treinamentos_emissao_conclusao",$dados[13]);
     $grava-> bindValue(":treinamentos_cpf",$dados[14]);
     $grava-> bindValue(":treinamentos_rg",$dados[15]);
     $grava-> bindValue(":treinamentos_validade",$dados[16]);
     $grava-> bindValue(":treinamentos_status",$dados[17]);
     $grava-> bindValue(":treinamentos_referencia",$dados[18]);
     $grava-> bindValue(":treinamentos_onda",$dados[19]);
     $grava-> bindValue(":treinamentos_atividade_especial",$dados[20]);
     $grava-> bindValue(":treinamentos_externo_interno",$dados[21]);
     $grava-> bindValue(":treinamentos_necessario",$dados[22]);
     $grava-> bindValue(":treinamentos_justificar",$dados[23]);
     $grava-> bindValue(":treinamentos_obs",$dados[24]);
     $grava->execute();
     
 }
 function funcaoConverteDadosObjetoParaMaiusculo($dados){
     
     foreach ($dados as $key => $value){
         
         if(is_string($value)){
             $dados->$key= strtoupper($value);
         }
         
     }
        
     return $dados;        
     
 }
 function tratarCnpjParaGravar($dados){
    $dados= str_replace(".","", $dados);
    $dados= str_replace("/","", $dados);
    $dados= str_replace("-","", $dados);
    
    return $dados;
 }
 function tratarCepParaGravar($dados){
     $dados= str_replace(".","",$dados);
     $dados= str_replace("-","",$dados);
     return $dados;
 }
 
 
 
?>