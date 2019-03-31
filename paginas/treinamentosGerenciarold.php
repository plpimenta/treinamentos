<?php
# Gerenciamento de sessao #
//include '../controles/sessaoValida.php';

# Includes utilizadas no projetos (CLASSES E FUNCOES) #
require_once '../core/config.php';
# Includes utilizadas no projetos (CLASSES E FUNCOES) #

# Estrutura superior da pagina
require_once '../estrutura/estruturaSuperiorPagina.php';
# Estrutura superior da pagina
?>
<!--Adicionar codigo abaixo desta linha-->

<!--exibe quadro de pesquisa-->
<div class="row" id="treinamento-gerenciar-pesquisa" hidden="">
    <div class="col-lg-3">
        <label for="buscaDescricao">Descrição</label>
        <input type="text" id="buscaDescricao" name="buscaDescricao" class="form-control border-input"  />
    </div>
    <div class="col-lg-3">
        <label for="buscaCodigo">Código</label>
        <input type="number" id="buscaCodigo" name="buscaCodigo" class="form-control border-input"  />
    </div>
    <div class="col-lg-3">
        <label for="buscaInstrutor">Instrutor</label>
        <input type="text" id="buscaInstrutor" name="buscaInstrutor" class="form-control border-input"  />
    </div>
</div>
<!--exibe quadro de pesquisa-->

<!--icone de filtro-->
<span class="fas fa-search" id="icone-pesquisa"></span>
<!--icone de filtro-->
<div class="row" id="treinamento-gerenciar-painel-lista">
    <div class="col-lg-12 col-sm-8">
        <div class="card">
            <div class="panel-heading"><h4>Gerenciamento de Treinamentos</h4></div>
            <div class="panel-body" id="treinamentos-gerenciar-container-dados">
                    <!--SELECIONA TREINAMENTOS BANCO DE DADOS E EXIBE NA TABELA-->
                    <?php
                        $treinamentos= selectTreinamentos($conn, 1);
                        
                        if($treinamentos->rowcount() == 0 ){
                            echo '<div class="alert alert-warning">
                                      <strong>!!! ATENÇÃO!!!</strong> Não há treinamentos cadastrados. <a href="treinamentoInserir.php">CLIQUE AQUI APRA CADASTRAR</a>.
                                    </div>';
                        }else{
                    ?>
                    

                    <!--SELECIONA TREINAMENTOS BANCO DE DADOS E EXIBE NA TABELA-->
                   
                <table class="table table-condensed">
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
                    <tbody>
                    
                     <!--IMPRIME CORPO DA TABELA-->   
                        <?php
                            
                        $contador=0;

                        while($treinamento=$treinamentos->fetch()){
                           
                            # TRATA VARIAVEL DE ULTIMA ALTERAÇÃO, POIS CASO NÃO TENHA PREENCHE COM ---- #
                            if(!$treinamento['treinamento_data_alteracao']){
                                $treinamento['treinamento_data_alteracao']="----------";
                            }
                            
                            if($contador % 2 == 0 ){
                               
                                echo '<tr class="tabela-linha tabela-linha-centraliza tabela-linha-clara">
                                       <td>'.$treinamento['treinamento_descricao'].'</td>
                                       <td>'.$treinamento['treinamento_codigo'].'</td>
                                       <td>'.selectInstrutornNome($conn,$treinamento['treinamento_origem_instrutor'],$treinamento['treinamento_instrutor']).'</td>
                                       <td>'.$treinamento['treinamento_carga_horaria_formacao'].'</td>
                                       <td>'.$treinamento['treinamento_validade'].'</td>
                                       <td>'.selectNomeQuemCadastrou($conn, $treinamento['treinamento_cadastrado_por']).'</td>
                                       <td>'.date("d/m/Y H:i:s", strtotime($treinamento['treinamento_data_cadastro'])).'</td>
                                       <td>'.date("d/m/Y H:i:s", strtotime($treinamento['treinamento_data_alteracao'])).'</td>
                                       <td><i class="ti-pencil" onclick="treinamentoGerenciarEditar(\''.$treinamento['treinamento_id'].'\',\''.$row_usu_info['usuario_id'].'\')"></i></td>
                                       <td><i class="ti-close" onclick="treinamentoDeletar(\''.$treinamento['treinamento_id'].'\',\''.$row_usu_info['usuario_id'].'\')"></i></td>
                                  </tr>'; 
                                
                            }else{
                                echo '<tr class="tabela-linha tabela-linha-centraliza tabela-linha-escura">
                                       <td>'.$treinamento['treinamento_descricao'].'</td>
                                       <td>'.$treinamento['treinamento_codigo'].'</td>
                                       <td>'.selectInstrutornNome($conn,$treinamento['treinamento_origem_instrutor'],$treinamento['treinamento_instrutor']).'</td>
                                       <td>'.$treinamento['treinamento_carga_horaria_formacao'].'</td>
                                       <td>'.$treinamento['treinamento_validade'].'</td>
                                       <td>'.selectNomeQuemCadastrou($conn, $treinamento['treinamento_cadastrado_por']).'</td>
                                       <td>'.date("d/m/Y H:i:s", strtotime($treinamento['treinamento_data_cadastro'])).'</td>
                                       <td>'.date("d/m/Y H:i:s", strtotime($treinamento['treinamento_data_alteracao'])).'</td>
                                       <td><i class="ti-pencil" onclick="treinamentoGerenciarEditar(\''.$treinamento['treinamento_id'].'\',\''.$row_usu_info['usuario_id'].'\')"></i></td>
                                       <td><i class="ti-close" onclick="treinamentoDeletar(\''.$treinamento['treinamento_id'].'\',\''.$row_usu_info['usuario_id'].'\')"></i></td>
                                  </tr>'; 
                            }
                            
                            $contador++;
                            
                        }
                            
                        
                        
                        ?>
                     <!--IMPRIME CORPO DA TABELA-->   
                    </tbody>
                </table>
                    
                    
                <?php } ?> <!-- FECHA TABELA -->     
            </div>
        </div>
    </div>
</div>
<!--final linha tabela gerenciamento treinamento-->

<!--painel exibicao formulario de edicao treinamento-->
<div class="row" id="treinamento-gerenciar-painel-container-edicao" hidden="">
    <div class="col-lg-10 col-sm-8">
        <div class="card">
            <div class="panel-heading"><h4></h4></div>
            <div class="panel-body" id="treinamento-gerenciar-painel-edicao">
  
            </div>
        </div>
    </div>
</div>
<!--painel exibicao formulario de edicao treinamento-->

<!--Adicionar codigo acima desta linha->
<?php
#Estrutura inferior da pagina
require_once '../estrutura/estruturaInferiorPagina.php';
#Estrutura inferior da pagina
?>

