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
        $dados->fornecedorCadastrarCnpj= tratarCnpjParaGravar($dados->fornecedorCadastrarCnpj);
        
        # TRATA CEP PARA GRAVACAO
        $dados->fornecedorCadastroCep= tratarCepParaGravar($dados->fornecedorCadastroCep);
        
        #CONVERTE DADOS PARA MAIUSCULO PARA GRAVAR NO BANCO
        $dados= funcaoConverteDadosObjetoParaMaiusculo($dados);
        echo "<pre>";
        print_r($dados);
    echo "</pre>";
    
       $gravar=$conn->prepare('INSERT INTO fornecedores VALUES (null , :codigo , :razaoSocial , :cnpj , :logradouro , :complemento , :cep , :numero,:cidade ,
                                :estado  , :fone , :celular , :whatsapp , :email, :contato , :dataCadastro , :dataAtualizacao , :cadastradoPor ,:status)');
        $gravar->bindValue(":codigo",$dados->fornecedorCadastrarCodigo);
        $gravar->bindValue(":razaoSocial",$dados->fornecedorCadastrarRazaoSocial);
        $gravar->bindValue(":cnpj",$dados->fornecedorCadastrarCnpj);
        $gravar->bindValue(":logradouro", $dados->fornecedorCadastroLogradouro);
        $gravar->bindValue(":complemento", $dados->fornecedorCadastrarComplemento);
        $gravar->bindValue(":numero",$dados->fornecedorCadastrarNumero);
        $gravar->bindValue(":cidade",$dados->fornecedorCadastroCidade);
        $gravar->bindValue(":estado",$dados->fornecedorCadastroEstado);
        $gravar->bindValue(":cep",$dados->fornecedorCadastroCep);
        $gravar->bindValue(":fone",$dados->fornecedorCadastrarFone);
        $gravar->bindValue(":celular",$dados->fornecedorCadastraCelular);
        $gravar->bindValue(":whatsapp",$dados->fornecedorCadastraWhatsApp);
        $gravar->bindValue(":contato",$dados->fornecedorCadastroContato);
        $gravar->bindValue(":email",$dados->fornecedorCadastrarEmail);
        $gravar->bindValue(":dataCadastro",date("Y-m-d H:i:s"));
        $gravar->bindValue(":dataAtualizacao",date("Y-m-d H:i:s"));
        $gravar->bindValue(":cadastradoPor",$dados->fornecedorCadastrarQuemCadastrou);
        $gravar->bindValue(":status",1);
        $gravar->execute();
        if($gravar){
           echo "true";
        }
        
    } catch (Exception $ex) {
            echo "falha";
            echo $ex->getMessage();
    }
    
}
function gravarFornecedorAtualizar($conn,$dados){
    
    
    try {
    
        # TRATA DADOS PARA GRAVACAO #
        $dados->fornecedorCadastrarCnpj= tratarCnpjParaGravar($dados->fornecedorCadastrarCnpj);
        $dados->fornecedorCadastroCep= tratarCepParaGravar($dados->fornecedorCadastroCep);
        $dados= funcaoConverteDadosObjetoParaMaiusculo($dados);
        
       $gravar=$conn->prepare('UPDATE fornecedores SET  fornecedor_descricao = :razaoSocial , fornecedor_cnpj = :cnpj , fornecedor_endereco_logradouro = :logradouro ,
                              fornecedor_endereco_complemento = :complemento , fornecedor_cep = :cep , fornecedor_numero = :numero, fornecedor_cidade = :cidade ,
                              fornecedor_estado = :estado  , fornecedor_fone = :fone , fornecedor_celular =  :celular , fornecedor_whatsapp =  :whatsapp , 
                              fornecedor_email = :email, fornecedor_contato = :contato , fornecedor_data_atualizacao = :dataAtualizacao , 
                              fornecedor_alterado_por =  :cadastradoPor WHERE fornecedor_id = :id');
        $gravar->bindValue(":id",$dados->fornecedorCadastroId);
        $gravar->bindValue(":razaoSocial", $dados->fornecedorCadastrarRazaoSocial);
        $gravar->bindValue(":cnpj",$dados->fornecedorCadastrarCnpj);
        $gravar->bindValue(":logradouro", $dados->fornecedorCadastroLogradouro);
        $gravar->bindValue(":complemento",$dados->fornecedorCadastrarComplemento);
        $gravar->bindValue(":numero",$dados->fornecedorCadastrarNumero);
        $gravar->bindValue(":cidade",$dados->fornecedorCadastroCidade);
        $gravar->bindValue(":estado",$dados->fornecedorCadastroEstado);
        $gravar->bindValue(":cep",$dados->fornecedorCadastroCep);
        $gravar->bindValue(":fone",$dados->fornecedorCadastrarFone);
        $gravar->bindValue(":celular",$dados->fornecedorCadastraCelular);
        $gravar->bindValue(":whatsapp",$dados->fornecedorCadastraWhatsApp);
        $gravar->bindValue(":contato",$dados->fornecedorCadastroContato);
        $gravar->bindValue(":email",$dados->fornecedorCadastrarEmail);
        $gravar->bindValue(":dataAtualizacao",date("Y-m-d H:i:s"));
        $gravar->bindValue(":cadastradoPor",$dados->fornecedorCadastrarQuemCadastrou);
        $gravar->execute();
        if($gravar){
            echo "true";
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
                                    :validade , :reciclagem , :cadastradoPor , :dataCadastro , :alteradoPor , :dataAlterado , :referencia ,
                                    :cursoFormacaoPossuiPratica , :cursoReciclagemPossuiPratica , :conteudoProgramatico , :proficiencia ,:status)');
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
            $gravar->bindValue(":cursoFormacaoPossuiPratica",$dados->cursoFormacaoPossuiPratica);
            $gravar->bindValue(":cursoReciclagemPossuiPratica",$dados->cursoReciclagemPossuiPratica);
            $gravar->bindValue(":conteudoProgramatico",$dados->cursoConteudoProgramatico);
            $gravar->bindValue(":proficiencia",$dados->cursoProficiencia);
            $gravar->bindValue(":status",1);
            $gravar->execute();
        
            if($gravar){
                echo "true";
            }
        } catch (Exception $ex) {
//            return $ex->getMessage();
            echo $ex->getMessage();
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
                                treinamento_validade = :validade  , treinamento_reciclagem = :reciclagem , treinamento_formacao_pratica = :formacaoPratica ,
                                treinamento_alterado_por = :alteradoPor , treinamento_data_alteracao = :dataAlteracao , treinamento_reciclagem_pratica = :reciclagemPratica , 
                                treinamento_conteudo_programatico = :conteudoProgramatico , treinamento_proficientica = :proficiencia WHERE treinamento_codigo = :codigo');
          $gravar->bindValue(":descricao",$dados->cursoNome);
          $gravar->bindValue(":referencia",$dados->cursoReferencia);
          $gravar->bindValue(":cargaHorariaFormacao",$dados->cursoCargaHorariaFormacao);
          $gravar->bindValue(":cargaHorariaReciclagem",$dados->cursoCargaHorariaReciclagem);
          $gravar->bindValue(":validade",$dados->cursoValidadeTreinamento);
          $gravar->bindValue(":reciclagem",$dados->cursoPossuiReciclagem);
          $gravar->bindValue(":alteradoPor",$dados->cursoCadastradoPor);
          $gravar->bindValue(":dataAlteracao",date("Y-m-d H:i:s"));
          $gravar->bindValue(":formacaoPratica",$dados->cursoFormacaoPossuiPratica);
          $gravar->bindValue(":reciclagemPratica",$dados->cursoReciclagemPossuiPratica);
          $gravar->bindValue(":conteudoProgramatico",$dados->cursoConteudoProgramatico);
          $gravar->bindValue(":proficiencia",$dados->cursoProficiencia);
          $gravar->bindValue(":codigo",$dados->cursoCodigo);
          $gravar->execute();
          
          echo "true";
          
    } catch (Exception $ex) {
          echo $ex->getMessage();
          echo "false";
         
    }
}
?>
