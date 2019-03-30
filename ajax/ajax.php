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
    $dados=$_GET['dados'];
    
    # DIVIDE DADOS PARA ARRAY USANDO COMO DELIMITADOR , #
    $dados= explode(";", $dados);
    
    # VALIDA SE JA EXISTE FORNECEDOR CADASTRADO COM O CODIGO INFORMADO #
    $valida=validaFornecedorCadastrado($conn,$dados[0]);
    
    # CASO O RETORNO PARA VALIDA SEJA FALSE , EFETUA A GRAVAÇÃO POIS O FONECEDOR NÃO FOI CADASTRADO #
    if($valida){
    
        echo "falha";
    }else{
        gravarFornecedor($conn,$dados);
        
    }
        
    
}
if($_GET['atualizaDadosFornecedor']){
    
    # RECEBE DADOS VINDOS AJAX VIA PARAMETRO #
    $dados=$_GET['dados'];
    
    # DIVIDE DADOS PARA ARRAY USANDO COMO DELIMITADOR , #
    $dados= explode(";", $dados);
    
    
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
    
    
    # CONVERTE DADOS EM ARRAY COMO DELIMITADOR , #
    $dados= explode(";",$dados);
    
    # EFETUA GRAVAÇÃO BANCO #
    $valida=gravarTreinamento($conn,$dados);
    
    
}

if($_GET['validaCursoJaCadastrado']){
    
    # RECEBE DADOS VINDO VIA AJAX #
    $cursoCodigo=$_GET['cursoCodigo'];
    
    # EXECUTA FUNCAO PARA VALIDAR SE JA ESTÁ CADASTRADO CODIGO #
    $valida=validaCodigoCurso($conn,$cursoCodigo);
    
    if($valida){
        echo "true";
    }else{
        echo "false";
    }
}

if($_GET['treinamentoDeletar']){
    
    $dados=$_GET['dados'];
    $dados= explode(";", $dados);
    
    $id=$dados[0];
    $alteradoPor=$dados[1];
    
    # EXECUTA FUNCAO PARA DESATIVAR TREINAMENTO #
    $valida=gravarApagarTreinamento($conn,$id);
    
    
    
}

if($_GET['fornecedorDeletar']){
    
    $id=$_GET['id'];
    
    # CHAMA FUNCAO PARA DELETAR FORNECEDOR #
    $valida=gravarFornecedorExcluir($conn,$id);
    
    # SELECIONA DADOS PARA MONTAR TABELA PARA ATUALIZA DADOS PARA USUARIO #
    $fornecedores=selectFornecedores($conn);
    
    
    if($fornecedores->rowcount() == 0 ){
              
          echo '<div class="alert alert-warning">
                  <strong>!!! ATENÇÃO!!!</strong> Não há fornecedores cadastrados. <a href="fornecedorInserir.php">CLIQUE AQUI APRA CADASTRAR</a>.
                </div>';
      }else{
          $dados='<table class="table table-condensed">
                    <thead>
                        <tr class="tabela-titulo">
                            <th style="font-size: 13px;">DESCRIÇÃO</th>
                            <th style="font-size: 13px;">CNPJ</th>
                            <th style="font-size: 13px;">CONTATO</th>
                            <th style="font-size: 13px;">FONE</th>
                            <th style="font-size: 13px;">CELULAR</th>
                            <th style="font-size: 13px;">EMAIL</th>
                            <th style="font-size: 13px;">CIDADE</th>
                            <th style="font-size: 13px;">UF</th>
                            <th style="font-size: 13px;"></th>
                            <th style="font-size: 13px;"></th>
                        </tr>
                    </thead>
                    <tbody>';
          
              #CONTADOR PARA FORMATACAO DE LINHA      
              $contador=0;
            
                while($fornecedor=$fornecedores->fetch()){
                    
                    if($contador % 2 == 0){
                        $dados.='<tr class="tabela-linha tabela-linha-centraliza tabela-linha-clara">
                                   <td>'.$fornecedor['fornecedor_descricao'].'</td>
                                   <td>'.formatarCnpj($fornecedor['fornecedor_cnpj']).'</td>
                                   <td>'.$fornecedor['fornecedor_contato'].'</td>
                                   <td>'.$fornecedor['fornecedor_fone'].'</td>
                                   <td>'.$fornecedor['fornecedor_celular'].'</td>
                                   <td>'.$fornecedor['fornecedor_email'].'</td>
                                   <td>'.$fornecedor['fornecedor_cidade'].'</td>
                                   <td>'.$fornecedor['fornecedor_estado'].'</td>
                                   <td><i class="ti-pencil" onclick="fornecedorGerenciarEditar(\''.$fornecedor['fornecedor_id'].'\')"></i></td>
                                   <td><i class="ti-close" onclick="fornecedorDeletar(\''.$fornecedor['fornecedor_id'].'\')"></i></td>
                              </tr>';                
                    }else{
                        $dados.='<tr class="tabela-linha tabela-linha-centraliza tabela-linha-escura">
                                   <td>'.$fornecedor['fornecedor_descricao'].'</td>
                                   <td>'.formatarCnpj($fornecedor['fornecedor_cnpj']).'</td>
                                   <td>'.$fornecedor['fornecedor_contato'].'</td>
                                   <td>'.$fornecedor['fornecedor_fone'].'</td>
                                   <td>'.$fornecedor['fornecedor_celular'].'</td>
                                   <td>'.$fornecedor['fornecedor_email'].'</td>
                                   <td>'.$fornecedor['fornecedor_cidade'].'</td>
                                   <td>'.$fornecedor['fornecedor_estado'].'</td>
                                   <td><i class="ti-pencil" onclick="fornecedorGerenciarEditar(\''.$fornecedor['fornecedor_id'].'\')"></i></td>
                                   <td><i class="ti-close" onclick="fornecedorDeletar(\''.$fornecedor['fornecedor_id'].'\')"></i></td>
                              </tr>';                
                        
                    }
                    $contador++;
                    
                }
          
    
            $dados.='</tbody>
                </table>' ;   
      }
      
      echo $dados;
}

if($_GET['treinamentoGerenciarEditar']){
    
    # PEGA DADOS VIA PARAMETRO #
    $dados=$_GET['dados'];
    
    # DIVIDE DADOS LIMITADO POR , E CRIA ARRAY #
    $dados= explode(";", $dados);
    
    $id=$dados[0];
    $alteradoPor=$dados[1];
    
    # SELECIONA DADOS DO TREINAMENTO #
    $treinamento= selectTreinamentoPorId($conn, $id);
    
    $dados='<div class="form-group">
                    <input type="text" id="cursoCadastradoPor" name="cursoCadastradoPor" hidden="" value="'.$alteradoPor.'"/>
                    <input type="text" id="cursoCadastradoId" name="cursoCadastradoId" hidden="" value="'.$id.'"/>
                    <div class="row">
                        <div class="col-lg-3 col-sm-1">
                            <label for="cursoCodigo">Código</label>
                            <input type="number" id="cursoCodigo" name="cursoCodigo" class="form-control border-input" readonly="" placeholder="CODIGO" onblur="validaCursoJaCadastrado()" value="'.$treinamento['treinamento_codigo'].'" />
                        </div>
                        <div class="col-lg-9 col-sm-3">
                            <label for="cursoNome">Nome Curso</label>
                            <input type="text" id="cursoNome" name="cursoNome" class="form-control border-input" placeholder="Informe o nome do curso" value="'.$treinamento['treinamento_descricao'].'" />
                        </div>
                    </div>
                    <br>';
    
    
    if($treinamento['treinamento_reciclagem'] == 1){
        $dados.='<div class="row">
                        <div class="col-lg-4 col-sm-3">
                            <label for="cursoPossuiReciclagem">Curso Possui Reciclagem</label>
                            <select id="cursoPossuiReciclagem" name="cursoPossuiReciclagem" onblur="cursoInserirExibeReciclagem()" class="form-control border-input">
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-sm-1">
                            <label for="cursoCargaHorariaFormacao">Carga Horária Formação</label>
                            <input type="number" id="cursoCargaHorariaFormacao" name="cursoCargaHorariaFormacao" class="form-control border-input" placeholder="Informe a carga horária" value="'.$treinamento['treinamento_carga_horaria_formacao'].'" />
                        </div>
                        <div class="col-lg-4 col-sm-3"  id="cursoCargaHorariaReciclagemExibir">
                            <label for="cursoCargaHorariaReciclagem">Carga Horária Reciclagem</label>
                            <input type="number" id="cursoCargaHorariaReciclagem" name="cursoCargaHorariaReciclagem" class="form-control border-input" placeholder="Informe a carga horária" value="'.$treinamento['treinamento_carga_horaria_reciclagem'].'"  />
                        </div>
                        
                    </div>
                    <br>';
    }else{
         $dados.='<div class="row">
                        <div class="col-lg-4 col-sm-3">
                            <label for="cursoPossuiReciclagem">Curso Possui Reciclagem</label>
                            <select id="cursoPossuiReciclagem" name="cursoPossuiReciclagem" onblur="cursoInserirExibeReciclagem()" class="form-control border-input">
                                <option value="0">Não</option>
                                <option value="1">Sim</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-sm-1">
                            <label for="cursoCargaHorariaFormacao">Carga Horária Formação</label>
                            <input type="number" id="cursoCargaHorariaFormacao" name="cursoCargaHorariaFormacao" class="form-control border-input" placeholder="Informe a carga horária" value="'.$treinamento['treinamento_carga_horaria_formacao'].'" />
                        </div>
                        <div class="col-lg-4 col-sm-3" hidden=""  id="cursoCargaHorariaReciclagemExibir">
                            <label for="cursoCargaHorariaReciclagem">Carga Horária Reciclagem</label>
                            <input type="number" id="cursoCargaHorariaReciclagem" name="cursoCargaHorariaReciclagem" class="form-control border-input" placeholder="Informe a carga horária" value="0"  />
                        </div>
                        
                    </div>
                    <br>
                    ';
                                
    }
              
    
    if( strtolower($treinamento['treinamento_origem_instrutor']) == strtolower("INTERNO")){
        $dados.='<div class="row">
                        <div class="col-lg-6 col-sm-1">
                            <label for="cursoInstrutorOrigem">Selecione a origem do Instrutor</label>
                            <select id="cursoInstrutorOrigem" name="cursoInstrutorOrigem" onblur="cursoInserirExibeInstrutorOrigem()" class="form-control border-input">
                                <option value="Interno">Interno</option>
                                <option value="Externo">Externo</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-sm-1">
                            <label for="cursoValidadeTreinamento">Validade do Treinamento</label>
                            <input type="number" id="cursoValidadeTreinamento" name="cursoValidadeTreinamento" class="form-control border-input" placeholder="Valor em meses" value="'.$treinamento['treinamento_validade'].'" />
                        </div>
                    </div>
                    <br>
                    <div class="row" >
                        <div class="col-lg-6 col-sm-1" id="cursoInstrutorInternoContainer" >
                            <label for="cursoInstrutorInterno">Selecione Instrutor</label>
                            <select id="cursoInstrutorInterno" name="cursoInstrutorInterno" class="form-control border-input">';
                                    $instrutorNome= selectInstrutor($conn, $treinamento['treinamento_origem_instrutor'], $treinamento['treinamento_instrutor']);
        
                                    $dados.='<option value="'.$instrutorNome['Matricula'].'">'.$instrutorNome['Nome'].'</option>';
                                    
                                    $instrutores=selectDadosPessoalParaFormulario($conn);
                                    if($instrutores->rowcount() == 0){
                                        $dados.='<option>Nao há instrutores cadastrados</option>';
                                    }else{
                                        while($instrutor=$instrutores->fetch()){
                                           $dados.='<option value="'.$instrutor['Matricula'].'">'.$instrutor['Nome'].'</option>';
                                        }
                                    }
                                
                           $dados.=' </select>    
                        </div>
                        <div class="col-lg-6 col-sm-1" id="cursoInstrutorExternoContainer" hidden="">
                            <label for="cursoInstrutorExterno">Selecione o Fornecedor</label>
                            <select id="cursoInstrutorExterno" name="cursoInstrutorExterno" class="form-control border-input">
                                    <option>Selecione um fornecedor</option>
                                    ';
                               
                                
                                # SELECIONA DADOS DO INSTRUTOR #
                                $fornecedoresDados= selectFornecedores($conn);
                                    if($fornecedoresDados->rowcount() == 0 ){
                                        $dados.='<option>Nao Há fornecedores cadastrados</option>';
                                    }else{
                                        while($fornecedorDados=$fornecedoresDados->fetch()){
                                            $dados.='<option value="'.$fornecedorDados['fornecedor_codigo'].'">'.$fornecedorDados['fornecedor_descricao'].'</option>';
                                            
                                        }
                                    }
                                
                                

                         $dados.='</select>
                                        </div>
                                    </div>
                                    <br>
                                    
            ';
    }else{
        $dados.='<div class="row">
                        <div class="col-lg-6 col-sm-1">
                            <label for="cursoInstrutorOrigem">Selecione a origem do Instrutor</label>
                            <select id="cursoInstrutorOrigem" name="cursoInstrutorOrigem" onblur="cursoInserirExibeInstrutorOrigem()" class="form-control border-input">
                                <option value="Externo">Externo</option>
                                <option value="Interno">Interno</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-sm-1">
                            <label for="cursoValidadeTreinamento">Validade do Treinamento</label>
                            <input type="number" id="cursoValidadeTreinamento" name="cursoValidadeTreinamento" class="form-control border-input" placeholder="Valor em meses" value="'.$treinamento['treinamento_validade'].'" />
                        </div>
                    </div>
                    <br>
                    <div class="row" >
                        <div class="col-lg-6 col-sm-1" id="cursoInstrutorInternoContainer" hidden="" >
                            <label for="cursoInstrutorInterno">Selecione Instrutor</label>
                            <select id="cursoInstrutorInterno" name="cursoInstrutorInterno" class="form-control border-input">
                                <option value="50">João Paulo</option>
                            </select>    
                        </div>
                        <div class="col-lg-6 col-sm-1" id="cursoInstrutorExternoContainer" >
                            <label for="cursoInstrutorExterno">Selecione o Fornecedor</label>
                            <select id="cursoInstrutorExterno" name="cursoInstrutorExterno" class="form-control border-input">
                                ';
                                    # SELECIONA NOME DO FORNECEDOR #
                                     $fornecedorNome= selectFornecedorPorCodigo($conn, $treinamento['treinamento_instrutor']);
                                
                                     $dados.='<option value="'.$fornecedorNome['fornecedor_codigo'].'">'.$fornecedorNome['fornecedor_descricao'].'</option>';
                                     
                                    $fornecedoresDados= selectFornecedores($conn);
                                    if($fornecedoresDados->rowcount() == 0 ){
                                        $dados.='<option>Nao Há fornecedores cadastrados</option>';
                                    }else{
                                        while($fornecedorDados=$fornecedoresDados->fetch()){
                                            $dados.='<option value="'.$fornecedorDados['fornecedor_codigo'].'">'.$fornecedorDados['fornecedor_descricao'].'</option>';
                                            
                                        }
                                    }
                                

                         $dados.='</select>
                                        </div>
                                    </div>
                                    <br>
                                     ';
    }
    
    $dados.='<hr><div class="row">
                    <div class="col-lg-6">
                        <button class="btn btn-info" onclick="treinamentoEditarGravar()" id="cursoGravarBtn">Gravar</button>
                        <button class="btn btn-warning" onclick="treinamentoEditarVoltar(\''.$alteradoPor.'\')" >Voltar</button>
                    </div>
                </div>
            </div>';
    echo $dados;
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
            
            $dados='<table class="table table-condensed">
                    <thead>
                        <tr class="tabela-titulo">
                            <th style="font-size: 13px;">DESCRIÇÃO</th>
                            <th style="font-size: 13px;">CÓD</th>
                            <th style="font-size: 13px;">INSTRUTOR</th>
                            <th style="font-size: 13px;">HORAS FORMAÇÃO</th>
                            <th style="font-size: 13px;">VALIDADE</th>
                            <th style="font-size: 13px;">CADASTRADO POR</th>
                            <th style="font-size: 13px;">DATA CADASTRO</th>
                            <th style="font-size: 13px;">ULTIMA ALTERAÇÃO</th>
                            <th style="font-size: 13px;"></th>
                            <th style="font-size: 13px;"></th>
                        </tr>
                    </thead>
                    <tbody>';
            
            
            # CONTADOR PARA CONTROLAR AS LINHAS #
             $contador=0;
             
              while($treinamento=$treinamentos->fetch()){
                           
                            # TRATA VARIAVEL DE ULTIMA ALTERAÇÃO, POIS CASO NÃO TENHA PREENCHE COM ---- #
                            if(!$treinamento['treinamento_data_alteracao']){
                                $treinamento['treinamento_data_alteracao']="----------";
                            }
                            
                            if($contador % 2 == 0 ){
                               
                                $dados.='<tr class="tabela-linha tabela-linha-centraliza tabela-linha-clara">
                                       <td>'.$treinamento['treinamento_descricao'].'</td>
                                       <td>'.$treinamento['treinamento_codigo'].'</td>
                                       <td>'.selectInstrutornNome($conn,$treinamento['treinamento_origem_instrutor'],$treinamento['treinamento_instrutor']).'</td>
                                       <td>'.$treinamento['treinamento_carga_horaria_formacao'].'</td>
                                       <td>'.$treinamento['treinamento_validade'].' Meses</td>
                                       <td>'.selectNomeQuemCadastrou($conn, $treinamento['treinamento_cadastrado_por']).'</td>
                                       <td>'.date("d/m/Y H:i:s", strtotime($treinamento['treinamento_data_cadastro'])).'</td>
                                       <td>'.date("d/m/Y H:i:s", strtotime($treinamento['treinamento_data_alteracao'])).'</td>
                                       <td><i class="ti-pencil" onclick="treinamentoGerenciarEditar(\''.$treinamento['treinamento_id'].'\',\''.$alteradoPor.'\')"></i></td>
                                       <td><i class="ti-close" onclick="treinamentoDeletar(\''.$treinamento['treinamento_id'].'\',\''.$alteradoPor.'\')"></i></td>
                                  </tr>'; 
                                
                            }else{
                                $dados.='<tr class="tabela-linha tabela-linha-centraliza tabela-linha-escura">
                                       <td>'.$treinamento['treinamento_descricao'].'</td>
                                       <td>'.$treinamento['treinamento_codigo'].'</td>
                                       <td>'.selectInstrutornNome($conn,$treinamento['treinamento_origem_instrutor'],$treinamento['treinamento_instrutor']).'</td>
                                       <td>'.$treinamento['treinamento_carga_horaria_formacao'].'</td>
                                       <td>'.$treinamento['treinamento_validade'].' Meses</td>
                                       <td>'.selectNomeQuemCadastrou($conn, $treinamento['treinamento_cadastrado_por']).'</td>
                                       <td>'.date("d/m/Y H:i:s", strtotime($treinamento['treinamento_data_cadastro'])).'</td>
                                       <td>'.date("d/m/Y H:i:s", strtotime($treinamento['treinamento_data_alteracao'])).'</td>
                                       <td><i class="ti-pencil" onclick="treinamentoGerenciarEditar(\''.$treinamento['treinamento_id'].'\',\''.$alteradoPor.'\')"></i></td>
                                       <td><i class="ti-close" onclick="treinamentoDeletar(\''.$treinamento['treinamento_id'].'\',\''.$alteradoPor.'\')"></i></td>
                                  </tr>'; 
                            }
                            
                            $contador++;
                            
                        }
                        
                
                  # FECHA TABELAS #
                  $dados.='</tbody>
                        </table>';
            
        }
    
      echo $dados;
    
}

if($_GET['treinamentoEditarGravar']){
    
    # RECEBE DADOS VIA PARAMETRO #
    $dados=$_GET['dados'];
    
    
    # QUEBRA VARIAVEL DADOS EM ARRAY #
    $dados= explode(";", $dados);
    
    # ENVIA PARA FUNCAO DE GRAVACAO #
    gravarTreinamentoAtualizar($conn,$dados);
}
?>
