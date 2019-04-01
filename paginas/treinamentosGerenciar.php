<!--IMPORTA ESTRUTURA SUPERIOR DA PAGINA (HTML,TITLE,HEAD,...)-->
<?php require_once '../estrutura/estruturaSuperiorPagina.php';?>
<!--IMPORTA ESTRUTURA SUPERIOR DA PAGINA (HTML,TITLE,HEAD,...)-->

<!--IMPORTA MENU LATERAL ESQUERDO-->
<?php require_once '../estrutura/menuEsquerdo.php'; ?>
<!--IMPORTA MENU LATERAL ESQUERDO-->

<!--IMPORTA MENU TOP-->
<?php require_once '../estrutura/menuSuperior.php'; ?>
<!--IMPORTA MENU TOP-->

<!-- CONTEUDO DA PAGINA -->
<div class="right_col" role="main">
  <div class="row top_tiles"> <!-- top tiles -->

  <!--EDITAR DAQUI PARA BAIXO-->
  
  <div class="clearfix"></div>

            <div class="row" >
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Lista de Cursos</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                <div class="x_content" id="treinamentos-gerenciar-container-dados">
                      
                      <!--SELECIONA TREINAMENTOS BANCO DE DADOS E EXIBE NA TABELA-->
                    <?php
                        $treinamentos= selectTreinamentos($conn, 1);
                        
                        if($treinamentos->rowcount() == 0 ){
                            echo '<div class="alert alert-warning">
                                      <strong>!!! ATENÇÃO!!!</strong> Não há treinamentos cadastrados. <a href="treinamentoInserir.php">CLIQUE AQUI APRA CADASTRAR</a>.
                                    </div>';
                        }else{
                    ?>
                      
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                      <tr class="tabela-formata-titulo">
                            <th style="font-size: 12px;text-align:center;">CÓD</th>
                            <th style="font-size: 12px;text-align:center;">TREINAMENTO</th>
                            <th style="font-size: 12px;text-align:center;">FORMAÇÃO</th>
                            <th style="font-size: 12px;text-align:center;">RECICLAGEM</th>
                            <th style="font-size: 12px;text-align:center;">REFERÊNCIA</th>
                            <th style="font-size: 12px;text-align:center;">PERIODICIDADE</th>
                            <th style="font-size: 12px;text-align:center;">ULTIMA ALTERAÇÃO</th>
                            <th style="font-size: 12px;text-align:center;"></th>
                            <th style="font-size: 12px;text-align:center;"></th>
                        </tr>
                      </thead>
                      <tbody>
                        <!--IMPRIME CORPO DA TABELA-->   
                        <?php
                            
                        
                        while($treinamento=$treinamentos->fetch()){
                           
                                    
                                    
                                    # TRATA DATA DE ALTERACAO
                                    if(!$treinamento['treinamento_data_alteracao']){
                                        $dataAlteracao='<td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">----------</td>';
                                    }else{
                                        $dataAlteracao='<td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'.date("d/m/Y H:i:s", strtotime($treinamento['treinamento_data_alteracao'])).'</td>';
                                        
                                    }
                              
                                        echo '<tr>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'.$treinamento['treinamento_codigo'].'</td>
                                               <td class="tabela-formata-linha-fonte">'.$treinamento['treinamento_descricao'].'</td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'.$treinamento['treinamento_carga_horaria_formacao'].' h</td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'.$treinamento['treinamento_carga_horaria_reciclagem'].' h</td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'. $treinamento['referencia'].'</td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">'. $treinamento['treinamento_validade'].'</td>
                                               '.$dataAlteracao.'
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte"><a href="treinamentosEditar.php?id='.$treinamento['treinamento_id'].'"<i class="fa fa-pencil"></i></td>
                                               <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte"><i class="fa fa-close" onclick="treinamentoDeletar(\''.$treinamento['treinamento_id'].'\',\''.$row_usu_info['usuario_id'].'\')"></i></td>
                                          </tr>'; 

                            
                        } # FECHA WHILE
                        } # FECHA IF INICIAL   
                        ?>
                        
                        
                      </tbody>
                    </table>  
                </div>
            </div>
        </div>
    </div>
      
  <!--EDITAR DAQUI PARA CIMA-->
      
  </div>  <!-- top tiles -->
</div>
<!-- CONTEUDO DA PAGINA -->


<!--ESTRUTURA INFERIOR SCRIPTS E INCLUDES-->
<?php require_once '../estrutura/estruturaInferiorPagina.php'; ?>
<!--ESTRUTURA INFERIOR SCRIPTS E INCLUDES-->