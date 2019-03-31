<?php
require_once '../core/config.php';

    
if($_POST['gravarTreinamento']){
    
    #------------------------------------------
    # Recebe dados 
    $treinamento=$_POST['treinamento'];
    $treinados=$_POST['treinados'];
    $formar=$_POST['formar'];
    $vencidos=$_POST['vencidos'];
    
    #------------------------------------------
    # Trata dados recebidos
    $treinamento= strtoupper($treinamento);
    
    
    #-------------------------------------------
    # Grava no banco
    try{
        
        $gravar=$conn->prepare('INSERT INTO treinamentos VALUES(null , :treinamento , :treinados , :formar , :vencidos , :status)');
        $gravar->bindValue(":treinamento",$treinamento);
        $gravar->bindValue(":treinados",$treinados);
        $gravar->bindValue(":formar",$formar);
        $gravar->bindValue(":vencidos",$vencidos);
        $gravar->bindValue(":status",1);
        $gravar->execute();
        
        if($gravar){
            echo "<script>alert('Treinamento $treinamento cadastrado com sucesso!')</script>";
            echo "<script>window.location='../paginas/index.php'</script>";
        }else{
            echo "<script>alert('!!! ATENÇÃO !!! Houve uma falha ao tentar cadastrar o Treinamento $treinamento.')</script>";
            echo "<script>window.location='../paginas/index.php'</script>";
            
        }
    } catch (Exception $ex) {
            echo $ex->getMessage();
    }
}

function funcaoGravarApagarTreinamento($conn,$id){
    
    try{
        
        $apagar=$conn->prepare();
        
    } catch (Exception $ex) {

    }
}

function gravarFornecedor($conn,$dados){
    
    try {
    
        # TRATA CNPJ PARA GRAVACAO #
        $dados[2]= str_replace(".","", $dados[2]);
        $dados[2]= str_replace("/","", $dados[2]);
        $dados[2]= str_replace("-","", $dados[2]);
        
        
       $gravar=$conn->prepare('INSERT INTO fornecedores VALUES (null , :codigo , :razaoSocial , :cnpj , :logradouro , :complemento , :cep , :numero,:cidade ,
                                :estado  , :fone , :celular , :whatsapp , :email, :contato , :dataCadastro , :dataAtualizacao , :cadastradoPor ,:status)');
        $gravar->bindValue(":codigo",$dados[0]);
        $gravar->bindValue(":razaoSocial", strtoupper($dados[1]));
        $gravar->bindValue(":cnpj",$dados[2]);
        $gravar->bindValue(":logradouro", strtoupper($dados[3]));
        $gravar->bindValue(":complemento",strtoupper($dados[4]));
        $gravar->bindValue(":numero",$dados[5]);
        $gravar->bindValue(":cidade",strtoupper($dados[6]));
        $gravar->bindValue(":estado",strtoupper($dados[7]));
        $gravar->bindValue(":cep",$dados[8]);
        $gravar->bindValue(":fone",$dados[9]);
        $gravar->bindValue(":celular",$dados[10]);
        $gravar->bindValue(":whatsapp",strtoupper($dados[11]));
        $gravar->bindValue(":contato",strtoupper($dados[12]));
        $gravar->bindValue(":email",strtoupper($dados[13]));
        $gravar->bindValue(":dataCadastro",date("Y-m-d H:i:s"));
        $gravar->bindValue(":dataAtualizacao",date("Y-m-d H:i:s"));
        $gravar->bindValue(":cadastradoPor",$dados[14]);
        $gravar->bindValue(":status",1);
        $gravar->execute();
        if($gravar){
           echo 1;
        }
        
    } catch (Exception $ex) {
            echo "falha";
            echo var_dump($ex->getMessage());
    }
    
}
function gravarFornecedorAtualizar($conn,$dados){
    
    
    try {
    
        # TRATA CNPJ PARA GRAVACAO #
        $dados[2]= str_replace(".","", $dados[2]);
        $dados[2]= str_replace("/","", $dados[2]);
        $dados[2]= str_replace("-","", $dados[2]);
        
        
       $gravar=$conn->prepare('UPDATE fornecedores SET  fornecedor_descricao = :razaoSocial , fornecedor_cnpj = :cnpj , fornecedor_endereco_logradouro = :logradouro ,
                              fornecedor_endereco_complemento = :complemento , fornecedor_cep = :cep , fornecedor_numero = :numero, fornecedor_cidade = :cidade ,
                              fornecedor_estado = :estado  , fornecedor_fone = :fone , fornecedor_celular =  :celular , fornecedor_whatsapp =  :whatsapp , 
                              fornecedor_email = :email, fornecedor_contato = :contato , fornecedor_data_atualizacao = :dataAtualizacao , 
                              fornecedor_alterado_por =  :cadastradoPor WHERE fornecedor_id = :codigo');
        $gravar->bindValue(":codigo",$dados[0]);
        $gravar->bindValue(":razaoSocial", strtoupper($dados[1]));
        $gravar->bindValue(":cnpj",$dados[2]);
        $gravar->bindValue(":logradouro", strtoupper($dados[3]));
        $gravar->bindValue(":complemento",strtoupper($dados[4]));
        $gravar->bindValue(":numero",$dados[5]);
        $gravar->bindValue(":cidade",strtoupper($dados[6]));
        $gravar->bindValue(":estado",strtoupper($dados[7]));
        $gravar->bindValue(":cep",$dados[8]);
        $gravar->bindValue(":fone",$dados[9]);
        $gravar->bindValue(":celular",$dados[10]);
        $gravar->bindValue(":whatsapp",strtoupper($dados[11]));
        $gravar->bindValue(":contato",strtoupper($dados[12]));
        $gravar->bindValue(":email",strtoupper($dados[13]));
        $gravar->bindValue(":dataAtualizacao",date("Y-m-d H:i:s"));
        $gravar->bindValue(":cadastradoPor",$dados[14]);
        $gravar->execute();
        if($gravar){
            try {
    
                $exib=$conn->prepare('SELECT * FROM fornecedores WHERE fornecedor_id = :id');
                $exib->bindValue(":id",$dados[0]);
                $exib->execute();
                $exib=$exib->fetch();
                echo json_encode($exib);
                
            } catch (Exception $ex) {
                return $ex->getMessage();
            }
        }
        
    } catch (Exception $ex) {
            
            echo $ex->getMessage();
    }
    
}
function gravarFornecedorExcluir($conn,$id){
    
    
    try {
            # ATUALIZA STATUS FORNECEDOR PARA 0 #
            $gravar=$conn->prepare('UPDATE fornecedores SET fornecedor_status = :status WHERE fornecedor_id = :id');
            $gravar->bindValue(":status",0);
            $gravar->bindValue(":id",$id);
            $gravar->execute();

            if($gravar){
                echo "<script>alert('FORNECEDOR APAGADO COM SUCESSO.');</script>";
                echo "<script>window.location='../paginas/fornecedorGerenciar.php'</script>";
            }else{
                echo "<script>alert('!!! ATENÇÃO!!! HOUVE UMA FALHA AO TENTAR EXCLUIR ESTE FORNECEDOR. POR FAVOR, ENTRE EM CONTATO COM OS DESENVOLVEDORES DO SISTEMA.');</script>";
                echo "<script>window.location='../paginas/fornecedorGerenciar.php'</script>";
            }
            # ATUALIZA STATUS FORNECEDOR PARA 0 #
        
            echo "true";
            
    } catch (Exception $ex) {
//        echo $ex->getMessage();
            echo "false";
    }
        
    
    
    
}

function gravarTreinamento($conn,$dados){
    
    
        
    # SELECIONA PROXIMO CODIGO PARA O CURSO #
    $codigo= selectCursoProximoCodigo($conn);
    
    
        try {
            # GRAVA TREINAMENTO #
            $gravar=$conn->prepare('INSERT INTO treinamentos VALUES (null , :codigo , :descricao , :cargaHorariaFormacao , :cargaHorariaReciclagem ,
                                    :validade , :reciclagem , :cadastradoPor , :dataCadastro , :alteradoPor , :dataAlterado , :referencia , :status)');
            $gravar->bindValue(":codigo",$codigo);
            $gravar->bindValue(":descricao",$dados->cursoNome);
            $gravar->bindValue(":cargaHorariaFormacao",$dados->cursoCargaHorariaFormacao);
            $gravar->bindValue(":cargaHorariaReciclagem",$dados->cursoCargaHorariaReciclagem);
            $gravar->bindValue(":validade",$dados->cursoValidadeTreinamento);
            $gravar->bindValue(":reciclagem",$dados->cursoPossuiReciclagem);
            $gravar->bindValue(":cadastradoPor",$dados->cursoCadastradoPor);
            $gravar->bindValue(":dataCadastro",date("Y-m-d H:i:s"));
            $gravar->bindValue(":alteradoPor",NULL);
            $gravar->bindValue(":dataAlterado",NULL);
            $gravar->bindValue(":referencia",$dados->cursoReferencia);
            $gravar->bindValue(":status",1);
            $gravar->execute();
        
            if($gravar){
                
                return true;
            }
        } catch (Exception $ex) {
                return $ex->getMessage();
        }
}


function gravarApagarTreinamento($conn,$dados){
    
    try {
        
        $gravar=$conn->prepare('UPDATE treinamentos SET treinamento_status = :status , treinamento_alterado_por = :alteradoPor ,
                                treinamento_data_alteracao = :dataAlteracao WHERE treinamento_id = :id');
        $gravar->bindValue(":status",0);
        $gravar->bindValue(":id",$dados->id);
        $gravar->bindValue(":alteradoPor",$dados->alteradoPor);
        $gravar->bindValue(":dataAlteracao",date("Y-m-d H:i:s"));
        $gravar->execute();
        
        return true;
       
    } catch (Exception $ex) {
        return FALSE;;
    }
}

function gravarTreinamentoAtualizar($conn,$dados){
    
     try {
        
       
          $gravar=$conn->prepare('UPDATE treinamentos SET treinamento_descricao = :descricao , treinamento_referencia = :referencia , 
                                treinamento_carga_horaria_formacao =  :cargaHorariaFormacao , treinamento_carga_horaria_reciclagem = :cargaHorariaReciclagem,
                                treinamento_validade = :validade  , treinamento_reciclagem = :reciclagem , 
                                treinamento_alterado_por = :alteradoPor , treinamento_data_alteracao = :dataAlteracao WHERE treinamento_codigo = :codigo');
          $gravar->bindValue(":descricao",$dados->cursoNome);
          $gravar->bindValue(":referencia",$dados->cursoReferencia);
          $gravar->bindValue(":cargaHorariaFormacao",$dados->cursoCargaHorariaFormacao);
          $gravar->bindValue(":cargaHorariaReciclagem",$dados->cursoCargaHorariaReciclagem);
          $gravar->bindValue(":validade",$dados->cursoValidadeTreinamento);
          $gravar->bindValue(":reciclagem",$dados->cursoPossuiReciclagem);
          $gravar->bindValue(":alteradoPor",$dados->cursoCadastradoPor);
          $gravar->bindValue(":dataAlteracao",date("Y-m-d H:i:s"));
          $gravar->bindValue(":codigo",$dados->cursoCodigo);
          $gravar->execute();
          
          echo "true";
          
    } catch (Exception $ex) {
          echo $ex->getMessage();
          echo "false";
         
    }
}
?>
