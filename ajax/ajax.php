<?php
require_once '../core/config.php';

if($_GET['atualizarTreinamento']){
    
    $dados=$_GET['dados'];
    
    $dados= explode(";", $dados);
    
    funcaoGravarAtualizarTreinamento($conn,$dados);
   
}

if($_GET['treinamentoEditar']){
    
    $id=$_GET['id'];
    
    
    $treinamento=selectTreinamentoPorId($conn,$id);
    
    echo json_encode($treinamento);
    
}

if($_GET['treinamentoExcluir']){
    
    $id=$_GET['id'];
    
    
    # APAGA TREINAMENTO COM BASE NO ID INFORMADO #
     $apagar=funcaoGravarApagarTreinamento($conn,$id);
    # APAGA TREINAMENTO COM BASE NO ID INFORMADO #
    
}

if($_GET['gravarFornecedor']){
    
    
    # RECEBE DADOS VINDOS AJAX VIA PARAMETRO #
    $dados= json_decode($_GET['dados']);
    
    
    
    # VALIDA SE JA EXISTE FORNECEDOR CADASTRADO COM O CODIGO INFORMADO #
    $valida=validaFornecedorCadastrado($conn,$dados->fornecedorCadastrarCnpj);
    
    
    # CASO O RETORNO PARA VALIDA SEJA FALSE , EFETUA A GRAVAÇÃO POIS O FONECEDOR NÃO FOI CADASTRADO #
    if($valida){
        echo "cadastrado";
    
    }else{
    
        gravarFornecedor($conn,$dados);
    }
        
        
    
}
if($_GET['atualizaDadosFornecedor']){
    
    # RECEBE DADOS VINDOS AJAX VIA PARAMETRO #
    $dados= json_decode($_GET['dados']);
        
    
    # ATUALIZA DADOS FORNECEDOR #
    gravarFornecedorAtualizar($conn,$dados);
    
        
    
        
    
}

if($_GET['validaFornecedorJaCadastrado']){
    
     # RECEBE DADOS VINDOS AJAX VIA PARAMETRO #
    $fornecedorCadastrarCnpj=$_GET['fornecedorCadastrarCnpj'];
    
    # VALIDA CODIGO FORNECEDOR #
    validaCodigoFornecedor($conn,$fornecedorCadastrarCnpj);
    
}
    
if($_GET['fornecedorGerenciarEditar']){
    
    $id=$_GET['id'];
    
    # seleciona dados banco referente fornecedor com base no id #
    $fornecedorDados=selectFornecedorPorId($conn,$id);
    # seleciona dados banco referente fornecedor com base no id #
    
    echo json_encode($fornecedorDados);
    
}

if($_GET['cursoGravar']){
    
    # RECEBE DADOS VINDOS VINDOS VIA AJAX #
    $dados=$_GET['dados'];
    
    # CONVERTE DE JSON PARA HOBJETO
    $dados = json_decode($dados);
    
    # CONVERTE DADOS DE UM OBJETO PARA MAIUSCULO
    $dados=funcaoConverteDadosObjetoParaMaiusculo($dados);
    
    # EFETUA GRAVAÇÃO BANCO #
    $valida=gravarTreinamento($conn,$dados);
    
    
}


if($_GET['treinamentoDeletar']){
    
    $dados= json_decode($_GET['dados']);
    
   
    # EXECUTA FUNCAO PARA DESATIVAR TREINAMENTO #
    $valida=gravarApagarTreinamento($conn,$dados);
    
    if($valida){
        echo "<script>window.location='../paginas/treinamentosGerenciar.php?cursoDeletado=1'</script>";
    }else{
        echo "<script>window.location='../paginas/treinamentosGerenciar.php?falha=1'</script>";
    }
        
    
}

if($_GET['fornecedorDeletar']){
    
    $id=$_GET['id'];
    
    # CHAMA FUNCAO PARA DELETAR FORNECEDOR #
    $valida=gravarFornecedorExcluir($conn,$id);
    
    if($valida){
        echo "<script>alert('Fornecedor excluido com sucesso.)</script>";
        echo "<script>window.location='../paginas/fornecedorGerenciar.php'</script>";
    }else{
        echo "<script>alert('!!! ATENÇÃO !!! Houve uma falha ao tentar excluir o fornecedor..)</script>";
        echo "<script>window.location='../paginas/fornecedorGerenciar.php'</script>";
    }
        
    
}

if($_GET['treinamentoGerenciarEditar']){
    
    # PEGA DADOS VIA PARAMETRO #
    $dados= json_decode($_GET['dados']);
    
    
    
    # SELECIONA DADOS DO TREINAMENTO #
    $treinamento= selectTreinamentoPorCodigo($conn, $dados->codigo);
    
    
    echo json_encode($treinamento);
}

if($_GET['gravar']){
    
    $dados=$_GET['dados'];
    
    echo $dados;
}
if($_GET['treinamentoGerenciarListar']){
    
    # PEGA VARIAVEL DE QUEM ESTA ALTERANDO PARA SETAR NO EDITAR #
    $alteradoPor=$_GET['alteradoPor'];
    
    # SELECIONA FORNECEDORES PARA ATUALIZAR TELA DO USUARIO #
    $treinamentos= selectTreinamentos($conn, 1);
                        
        if($treinamentos->rowcount() == 0 ){
            $dados='<div class="alert alert-warning">
                      <strong>!!! ATENÇÃO!!!</strong> Não há treinamentos cadastrados. <a href="treinamentoInserir.php">CLIQUE AQUI APRA CADASTRAR</a>.
                    </div>';
        }else{
            
            
            
            $dados='<table id="datatable" class="table table-striped table-bordered">
                      <thead>
                      <tr class="tabela-formata-titulo">
                            <th style="font-size: 12px;text-align:center;"">DESCRIÇÃO</th>
                            <th style="font-size: 12px;text-align:center;">CÓD</th>
                            <th style="font-size: 12px;text-align:center;">INSTRUTOR</th>
                            <th style="font-size: 12px;text-align:center;">HORAS FORMAÇÃO</th>
                            <th style="font-size: 12px;text-align:center;">VALIDADE</th>
                            <th style="font-size: 12px;text-align:center;">CADASTRADO POR</th>
                            <th style="font-size: 12px;text-align:center;">DATA CADASTRO</th>
                            <th style="font-size: 12px;text-align:center;">ULTIMA ALTERAÇÃO</th>
                            <th style="font-size: 12px;text-align:center;"></th>
                            <th style="font-size: 12px;text-align:center;"></th>
                        </tr>
                      </thead>
                      <tbody>';
            
            
            # CONTADOR PARA CONTROLAR AS LINHAS #
                 
                        $contador=0;

                        while($treinamento=$treinamentos->fetch()){
                           
                                    
                                    # TRATA DATA DE ALTERACAO
                                    if(!$treinamento['treinamento_data_alteracao']){
                                        $dataAlteracao='<td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">----------</td>';
                                    }else{
                                        $dataAlteracao='<td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'.date("d/m/Y H:i:s", strtotime($treinamento['treinamento_data_alteracao'])).'</td>';
                                        
                                    }
                                    
                            
                                    if($contador % 2 == 0 ){

                                        $dados.='<tr>
                                               <td class="tabela-formata-linha-fonte">'.$treinamento['treinamento_descricao'].'</td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'.$treinamento['treinamento_codigo'].'</td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'.selectInstrutornNome($conn,$treinamento['treinamento_origem_instrutor'],$treinamento['treinamento_instrutor']).'</td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'.$treinamento['treinamento_carga_horaria_formacao'].'</td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'.$treinamento['treinamento_validade'].'</td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'.selectNomeQuemCadastrou($conn, $treinamento['treinamento_cadastrado_por']).'</td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'.date("d/m/Y H:i:s", strtotime($treinamento['treinamento_data_cadastro'])).'</td>
                                               '.$dataAlteracao.'
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte"><i class="fa fa-pencil" onclick="treinamentoGerenciarEditar(\''.$treinamento['treinamento_id'].'\',\''.$alteradoPor.'\')"></i></td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte"><i class="fa fa-close" onclick="treinamentoDeletar(\''.$treinamento['treinamento_id'].'\',\''.$alteradoPor.'\')"></i></td>
                                          </tr>'; 

                                    }else{
                                        $dados.='<tr>
                                               <td class="tabela-formata-linha-fonte">'.$treinamento['treinamento_descricao'].'</td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'.$treinamento['treinamento_codigo'].'</td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'.selectInstrutornNome($conn,$treinamento['treinamento_origem_instrutor'],$treinamento['treinamento_instrutor']).'</td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'.$treinamento['treinamento_carga_horaria_formacao'].'</td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'.$treinamento['treinamento_validade'].'</td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'.selectNomeQuemCadastrou($conn, $treinamento['treinamento_cadastrado_por']).'</td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'.date("d/m/Y H:i:s", strtotime($treinamento['treinamento_data_cadastro'])).'</td>
                                               '.$dataAlteracao.'
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte"><i class="fa fa-pencil" onclick="treinamentoGerenciarEditar(\''.$alteradoPor.'\',\''.$row_usu_info['usuario_id'].'\')"></i></td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte"><i class="fa fa-close" onclick="treinamentoDeletar(\''.$treinamento['treinamento_id'].'\',\''.$alteradoPor.'\')"></i></td>
                                          </tr>'; 
                                    }

                                    $contador++;
                            
                        } # FECHA WHILE
                        
                
                  # FECHA TABELAS #
                  $dados.='</tbody>
                            </table>  
                            ';
            
        }
    
      echo $dados;
    
}

if($_GET['cursoGravarAtualizar']){
    
    # RECEBE DADOS VIA PARAMETRO #
    $dados= json_decode($_GET['dados']);
    
    
   
    # ENVIA PARA FUNCAO DE GRAVACAO #
    gravarTreinamentoAtualizar($conn,$dados);
}

####################################################
############## ALEXANDRE SANTOS #######################
#######################################################
   if($_GET['pessoalHistEditar']){
       
//       $variavel = $_GET['pessoalHistEditar'];
       $id = $_GET['id'];
       $sql=$conn->prepare("select * from Pessoal where pessoal_id = '$id'");
       $sql->execute();
       
       $rows=$sql->fetch();
       
       ?>
<div id="editarUsu" class="row" >
    <div class="col-lg-12 col-sm-6">
        <div class="card">
            <div class="panel-heading">
    <button type="button" class="close" onclick="fecharEditarUsuario()" aria-hidden="false">&times;</button>
                <h4>Editar Usuário</h4>
            </div>
            <!--<div id="resultado"></div>-->
  
            <div class="panel-body">
                <div class="form-group">
                    <div class="row">
                        <form action="" method="POST" id="formularioEditarUsuario">
                        <div class="col-lg-2 col-sm-1">  
                            <label for="estabelecimentoCod">Cod Estab.</label>
                            <input type="number" id="estabelecimentoCod" name="estabelecimentoCod" value="<?php echo $rows['Estabelecimento_cod'] ?>" class="form-control border-input" placeholder="CODIGO" />
                        </div>
                        <div class="col-lg-4 col-sm-3">
                            <label for="EstabelecimentoNome">Estabelecimento Nome:</label>
                            <input type="text" id="estabelecimentoNome" value="<?php echo $rows['Estabelecimento_nome'] ?>" name="Estabelecimento_ome" class="form-control border-input" placeholder="Informe o nome do curso" />
                        </div>
                        <div class="col-lg-1 col-sm-1">
                            <label for="matricula">Matricula</label>
                            <input type="text" id="Matricula" value="<?php echo $rows['Matricula'] ?>" name="Matricula" class="form-control border-input" placeholder="Informe o nome do curso" />
                        </div>
                        <div class="col-lg-5 col-sm-3">
                            <label for="Nome">Nome</label>
                            <input type="text" id="Nome" value="<?php echo $rows['Nome'] ?>" name="" class="form-control border-input" placeholder="Informe o nome do curso" />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3 col-sm-1">
                            <label for="admissao">Admissao</label>
                            <input type="date" id="Data_admissao" name="Data_admissao" value="<?php echo $rows['Data_admissao'] ?>"   class="form-control border-input" placeholder="" />
                        </div>
                        <div class="col-lg-3 col-sm-2">
                            <label for="Data_nascimento">Data Nasc.</label>
                            <input type="date" id="Data_nascimento" name="Data_nascimento" value="<?php  echo $rows['Data_nascimento']?>" class="form-control border-input" placeholder="Informe a carga horária" />
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <label for="Cargo_codigo">Cargo Cod.</label>
                            <input type="number" id="Cargo_codigo" name="Cargo_codigo" value="<?php echo $rows['Cargo_codigo'] ?>" class="form-control border-input" />
                        </div>
                        <div class="col-lg-4 col-sm-2">
                            <label for="Cargo_nome">Cargo Nome</label>
                            <input type="text" id="Cargo_nome" name="Cargo_nome" value="<?php echo $rows['Cargo_nome'] ?>" class="form-control border-input" />
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2 col-sm-1">
                            <label for="Codigo">Código</label>
                            <input type="number" id="Codigo" name="Codigo" value="<?php echo $rows['Codigo'] ?>"   class="form-control border-input" placeholder="" />
                        </div>
                        <div class="col-lg-3 col-sm-2">
                            <label for="Funcao_nome">Funcao_nome</label>
                            <input type="text" id="Funcao_nome" name="Funcao_nome" value="<?php  echo $rows['Funcao_nome']?>" class="form-control border-input" placeholder="Informe a carga horária" />
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <label for="Centro_resultado_codigo">Resultado Cod. </label>
                            <input type="number" id="Centro_resultado_codigo" name="Centro_resultado_codigo" value="<?php echo $rows['Centro_resultado_codigo'] ?>" class="form-control border-input" />
                        </div>
                        <div class="col-lg-5 col-sm-2">
                            <label for="Centro_resultado_nome">Resultado Nome</label>
                            <input type="text" id="Centro_resultado_nome" name="Centro_resultado_nome" value="<?php echo $rows['Centro_resultado_nome'] ?>" class="form-control border-input" />
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2 col-sm-2">
                            <label for="Atividade_periculosa">Ativ. Periculosa</label>
                            <input type="text" id="Atividade_periculosa" name="Atividade_periculosa" value="<?php echo $rows['Atividade_periculosa'] ?>"   class="form-control border-input" placeholder="" />
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <label for="Numero_horas">Nº Horas</label>
                            <input type="number" id="Numero_horas" name="Numero_horas" value="<?php  echo $rows['Numero_horas']?>" class="form-control border-input" placeholder="Informe a carga horária" />
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <label for="Sindicato_codigo">Cod. Sindicato </label>
                            <input type="number" id="Sindicato_codigo" name="Sindicato_codigo" value="<?php echo $rows['Centro_resultado_codigo'] ?>" class="form-control border-input" />
                        </div>
                        <div class="col-lg-6 col-sm-4">
                            <label for="Sindicato_razaosocial">Sindicato</label>
                            <input type="text" id="Sindicato_razaosocial" name="Sindicato_razaosocial" value="<?php echo $rows['Sindicato_razaosocial'] ?>" class="form-control border-input" />
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2 col-sm-2">
                            <label for="Sexo">Sexo</label>
                            <input type="text" id="Sexo" name="Sexo" value="<?php echo $rows['Sexo'] ?>"   class="form-control border-input" placeholder="" />
                        </div>
                        <div class="col-lg-4 col-sm-2">
                            <label for="Grau_instrucao_nome">Grau de Instrução</label>
                            <input type="text" id="Grau_instrucao_nome" name="Grau_instrucao_nome" value="<?php  echo $rows['Grau_instrucao_nome']?>" class="form-control border-input" placeholder="Informe a carga horária" />
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <label for="Deficiente">PCD </label>
                            <input type="text" id="Deficiente" name="Deficiente" value="<?php echo $rows['Deficiente'] ?>" class="form-control border-input" />
                        </div>
                        <div class="col-lg-4 col-sm-2">
                            <label for="CPF">CPF</label>
                            <input type="text" id="CPF" name="CPF" value="<?php echo $rows['CPF'] ?>" class="form-control border-input" />
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2 col-sm-2">
                            <label for="Chefia_imediata_matricula">Matricula Chefe</label>
                            <input type="number" id="Chefia_imediata_matricula" name="Chefia_imediata_matricula" value="<?php echo $rows['Chefia_imediata_matricula'] ?>"   class="form-control border-input" placeholder="" />
                        </div>
                        <div class="col-lg-4 col-sm-2">
                            <label for="Chefia_imediata_nome">Nome Chefe </label>
                            <input type="text" id="Chefia_imediata_nome" name="Chefia_imediata_nome" value="<?php echo $rows['Chefia_imediata_nome'] ?>" class="form-control border-input" />
                        </div>
                        <div class="col-lg-4 col-sm-2">
                            <label for="Email">E-mail</label>
                            <input type="email" id="Email" name="Email" value="<?php  echo $rows['Email']?>" class="form-control border-input" placeholder="Informe a carga horária" />
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <label for="CTPS_numero">CTPS</label>
                            <input type="number" id="CTPS_numero" name="CTPS_numero" value="<?php echo $rows['CTPS_numero'] ?>" class="form-control border-input" />
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2 col-sm-2">
                            <label for="CTPS_serie">CTPS Serie</label>
                            <input type="number" id="CTPS_serie" name="CTPS_serie" value="<?php echo $rows['CTPS_serie'] ?>" class="form-control border-input" />
                        </div>
                        
                        <div class="col-lg-2 col-sm-2">
                            <label for="PIS">PIS </label>
                            <input type="text" id="PIS" name="PIS" value="<?php echo $rows['PIS'] ?>" class="form-control border-input" />
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <label for="Identidade">Identidade</label>
                            <input type="text" id="Identidade" name="Identidade" value="<?php  echo $rows['Identidade']?>" class="form-control border-input" placeholder="Informe a carga horária" />
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <label for="Situacao">Situação</label>
                            <input type="text" id="Situacao" name="Situacao" value="<?php echo $rows['Situacao'] ?>" class="form-control border-input" />
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <label for="RUT">RUT</label>
                            <input type="text" id="RUT" name="RUT" value="<?php echo $rows['RUT'] ?>" class="form-control border-input" />
                        </div>
                        
                        <input type="hidden" id="pessoal_id" name="pessoal_id" value="<?php echo $rows['pessoal_id'] ?>" class="form-control border-input" />
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div id="col-lg-12 col-sm-1">
                        </div>
                    </div>
                    <div class="row">
                        <div id="col-lg-12 col-sm-1">
                            
                            <button type="button"  id="editarUsuario" onclick="usuarioEditarGravar()" class=" btn btn-primary" >Gravar</button>
                            <button type="button" id="voltar" onclick="fecharEditarUsuario()" class="btn btn-warning" >Voltar</button>
                        </div>
                    </div>
                    <br>
                    <div class="row" id="crusoInstrutorInterno" hidden="">
                        <div class="col-lg-12 col-sm-1">
                        </div>
                        
                    </div>
                    <br>
                    <div class="row" id="crusoInstrutorExterno" hidden="">
                        <div class="col-lg-12 col-sm-1">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
           <?php
       
   }
   
if($_GET['alterarUsuarioGravar']){
   $dados = $_GET['id'];
   $dados = explode(",", $dados);
   $sql = funcaoGravarAtualizarUsuario($conn, $dados);

  fecharEditarUsuario();
}
   
   
if($_GET['treinamentosHistorico']){
   $id = $_GET['id'];

   $sql=selectTreinamentosHist($conn,$id);
    $row=$sql->fetch();

?>
<div id="editarHistoricoTabela" class="row" >
    <div class="col-lg-12 col-sm-6">
        <div class="card">
            <div class="panel-heading">
    <button type="button" class="close" onclick="fecharTabelaTreinamentosHist()" aria-hidden="false">&times;</button>
                <h4>Editar Treinamento Histórico</h4>
            </div>
            <!--<div id="resultado"></div>-->
  
            <div class="panel-body">
                <div class="form-group">
                    <div class="row">

                        <div class="col-lg-2 col-sm-1">  
                            <label for="treinamentos_matricula">Matricula</label>
                            <input type="text" id="treinamentos_matricula" name="treinamentos_matricula" value="<?php echo $row['treinamentos_matricula'] ?>" class="form-control border-input" placeholder="CODIGO" />
                        </div>
                        <div class="col-lg-4 col-sm-3">
                            <label for="treinamentos_nome">Treinamento</label>
                            <input type="text" id="treinamentos_nome" value="<?php echo $row['treinamentos_nome'] ?>" name="treinamentos_nome" class="form-control border-input" placeholder="Informe o nome do curso" />
                        </div>
                        <div class="col-lg-1 col-sm-1">
                            <label for="treinamentos_admissao">Admissão</label>
                            <input type="text" id="treinamentos_admissao" value="<?php echo $row['treinamentos_admissao'] ?>" name="treinamentos_admissao" class="form-control border-input" placeholder="Informe o nome do curso" />
                        </div>
                        <div class="col-lg-5 col-sm-3">
                            <label for="treinamentos_desc_funcao">Função</label>
                            <input type="text" id="treinamentos_desc_funcao" value="<?php echo $row['treinamentos_desc_funcao'] ?>" name="treinamentos_desc_funcao" class="form-control border-input" placeholder="Informe o nome do curso" />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4 col-sm-1">
                            <label for="treinamentos_turno">Turno</label>
                            <input type="text" id="treinamentos_turno" name="treinamentos_turno" value="<?php echo $row['treinamentos_turno'] ?>"   class="form-control border-input" placeholder="" />
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <label for="treinamentos_cc">CC</label>
                            <input type="text" id="treinamentos_cc" name="treinamentos_cc" value="<?php  echo $row['treinamentos_cc']?>" class="form-control border-input" placeholder="Informe a carga horária" />
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <label for="treinamentos_centro_custo">Centro de Custo</label>
                            <input type="text" id="treinamentos_centro_custo" name="treinamentos_centro_custo" value="<?php echo $row['treinamentos_centro_custo'] ?>" class="form-control border-input" />
                        </div>
                        <div class="col-lg-4 col-sm-2">
                            <label for="treinamentos_gerencia">Gerência</label>
                            <input type="text" id="treinamentos_gerencia" name="treinamentos_gerencia" value="<?php echo $row['treinamentos_gerencia'] ?>" class="form-control border-input" />
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4 col-sm-1">
                            <label for="treinamentos_responsavel">Responsável</label>
                            <input type="text" id="treinamentos_responsavel" name="treinamentos_responsavel" value="<?php echo $row['treinamentos_responsavel'] ?>"   class="form-control border-input" placeholder="" />
                        </div>
                        <div class="col-lg-4 col-sm-2">
                            <label for="treinamentos_desc_curso">Curso</label>
                            <input type="text" id="treinamentos_desc_curso" name="treinamentos_desc_curso" value="<?php  echo $row['treinamentos_desc_curso']?>" class="form-control border-input" placeholder="Informe a carga horária" />
                        </div>
                        <div class="col-lg-1 col-sm-1">
                            <label for="treinamentos_horas">Horas </label>
                            <input type="text" id="treinamentos_horas" name="treinamentos_horas" value="<?php echo $row['treinamentos_horas'] ?>" class="form-control border-input" />
                        </div>
                        <div class="col-lg-3 col-sm-2">
                            <label for="treinamentos_data_inicio">Data Início</label>
                            <input type="date" id="treinamentos_data_inicio" name="treinamentos_data_inicio" value="<?php echo $row['treinamentos_data_inicio'] ?>" class="form-control border-input" />
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2 col-sm-2">
                            <label for="Atividade_periculosa">Emissão Conclusão</label>
                            <input type="date" id="treinamentos_emissao_conclusao" name="treinamentos_emissao_conclusao" value="<?php echo $row['treinamentos_emissao_conclusao'] ?>"   class="form-control border-input" placeholder="" />
                        </div>
                        <div class="col-lg-4 col-sm-2">
                            <label for="treinamentos_fornecedor">Fornecedores</label>
                            <input type="text" id="treinamentos_fornecedor" name="treinamentos_fornecedor" value="<?php  echo $row['treinamentos_fornecedor']?>" class="form-control border-input" placeholder="Informe a carga horária" />
                        </div>
                        <div class="col-lg-3 col-sm-2">
                            <label for="treinamentos_cpf">CPF </label>
                            <input type="text" id="treinamentos_cpf" name="treinamentos_cpf" value="<?php echo $row['treinamentos_cpf'] ?>" class="form-control border-input" />
                        </div>
                        <div class="col-lg-3 col-sm-4">
                            <label for="treinamentos_rg">RG</label>
                            <input type="text" id="treinamentos_rg" name="treinamentos_rg" value="<?php echo $row['treinamentos_rg'] ?>" class="form-control border-input" />
                        </div>
                         
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2 col-sm-2">
                            <label for="treinamentos_validade">Validade</label>
                            <input type="text" id="treinamentos_validade" name="treinamentos_validade" value="<?php echo $row['treinamentos_validade'] ?>"   class="form-control border-input" placeholder="" />
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <label for="treinamentos_status">Status</label>
                            <input type="text" id="treinamentos_status" name="treinamentos_status" value="<?php  echo $rows['treinamentos_status']?>" class="form-control border-input" placeholder="Informe a carga horária" />
                        </div>
                        <div class="col-lg-4 col-sm-2">
                            <label for="treinamentos_referencia">Referência </label>
                            <input type="text" id="treinamentos_referencia" name="treinamentos_referencia" value="<?php echo $rows['treinamentos_referencia'] ?>" class="form-control border-input" />
                        </div>
                        <div class="col-lg-4 col-sm-2">
                            <label for="treinamentos_onda">Onda</label>
                            <input type="text" id="treinamentos_onda" name="treinamentos_onda" value="<?php echo $row['treinamentos_onda'] ?>" class="form-control border-input" />
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2 col-sm-2">
                            <label for="Chefia_imediata_matricula">Atividade Especial</label>
                            <input type="text" id="treinamentos_atividade_especial" name="treinamentos_atividade_especial" value="<?php echo $row['treinamentos_atividade_especial'] ?>"   class="form-control border-input" placeholder="" />
                        </div>
                        <div class="col-lg-4 col-sm-2">
                            <label for="treinamentos_externo_interno">Interno / Externo </label>
                            <input type="text" id="treinamentos_externo_interno" name="treinamentos_externo_interno" value="<?php echo $row['treinamentos_externo_interno'] ?>" class="form-control border-input" />
                        </div>
                        <div class="col-lg-4 col-sm-2">
                            <label for="treinamentos_necessario">Necessário</label>
                            <input type="text" id="treinamentos_necessario" name="treinamentos_necessario" value="<?php  echo $row['treinamentos_necessario']?>" class="form-control border-input" placeholder="Informe a carga horária" />
                        </div>
                        <div class="col-lg-2 col-sm-2">
                            <label for="treinamentos_justificar">Justificar</label>
                            <input type="text" id="treinamentos_justificar" name="treinamentos_justificar" value="<?php echo $row['treinamentos_justificar'] ?>" class="form-control border-input" />
                        </div>
                        
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-2 col-sm-2">
                            <label for="treinamentos_obs">Observações</label>
                            <input type="text" id="treinamentos_obs" name="treinamentos_obs" value="<?php echo $row['treinamentos_obs'] ?>" class="form-control border-input" />
                        </div>
                        
                        <div class="col-lg-2 col-sm-2">
                        </div>
                        <div class="col-lg-2 col-sm-2">
                        </div>
                        <div class="col-lg-2 col-sm-2">
                        </div>
                        <div class="col-lg-2 col-sm-2">
                        </div>
                        
                        <input type="hidden" id="treinamentos_id" name="treinamentos_id" value="<?php echo $row['treinamentos_id'] ?>" class="form-control border-input" />
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div id="col-lg-12 col-sm-1">
                        </div>
                    </div>
                    <div class="row">
                        <div id="col-lg-12 col-sm-1">
                            
                            <button type="button"  id="editarUsuario" onclick="treinamentosEditarGravar()" class=" btn btn-primary" >Gravar</button>
                            <button type="button" id="voltar"   class="btn btn-warning" >Voltar</button>
                        </div>
                    </div>
                    <br>
                    <div class="row" id="crusoInstrutorInterno" hidden="">
                        <div class="col-lg-12 col-sm-1">
                        </div>
                        
                    </div>
                    <br>
                    <div class="row" id="crusoInstrutorExterno" hidden="">
                        <div class="col-lg-12 col-sm-1">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php

   }else{
       
   }
   
if($_GET['treinamentosEditarGravar1']){
       
   $dados = $_GET['id'];
   $dados = explode(",", $dados);

   $grava = funcaoGravarAtualizarTreinamentosHist($conn, $dados);

   echo "true";

}

if($_GET['validaCursoJaCadastrado']){
    
    #PEGA CURSO PASSADO VIA PARAMETRO
    $curso=$_GET['curso'];
    
    validaNomeCursoJaCadastrado($conn,$curso);
    
}

