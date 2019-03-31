<!--IMPORTA ESTRUTURA SUPERIOR DA PAGINA (HTML,TITLE,HEAD,...)-->
<?php require_once '../estrutura/estruturaSuperiorPagina.php'; ?>
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
                        <h2>Lista de Fornecedores</h2>
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
                        $fornecedores = selectFornecedores($conn,1);

                        if ($fornecedores->rowcount() == 0) {
                            echo '<div class="alert alert-warning">
                                      <strong>!!! ATENÇÃO!!!</strong> Não há treinamentos cadastrados. <a href="treinamentoInserir.php">CLIQUE AQUI APRA CADASTRAR</a>.
                                    </div>';
                        } else {
                            ?>

                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                    <tr class="tabela-formata-titulo">
                                        <th style="font-size: 12px;text-align:center;">CÓD</th>
                                        <th style="font-size: 12px;text-align:center;">DESCRIÇÃO</th>
                                        <th style="font-size: 12px;text-align:center;">CNPJ</th>
                                        <th style="font-size: 12px;text-align:center;">CIDADE</th>
                                        <th style="font-size: 12px;text-align:center;">ESTADO</th>
                                        <th style="font-size: 12px;text-align:center;">FONE</th>
                                        <th style="font-size: 12px;text-align:center;">CELULAR</th>
                                        <th style="font-size: 12px;text-align:center;">WHATSAPP</th>
                                        <th style="font-size: 12px;text-align:center;">EMAIL</th>
                                        <th style="font-size: 12px;text-align:center;">CONTATO</th>
                                        <th style="font-size: 12px;text-align:center;"></th>
                                        <th style="font-size: 12px;text-align:center;"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--IMPRIME CORPO DA TABELA-->   
                                    <?php
                                    $contador = 0;

                                    while ($fornecedor = $fornecedores->fetch()) {


                                        if ($contador % 2 == 0) {

                                            echo '<tr>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_codigo'] . '</td>
                                                       <td class="tabela-formata-linha-fonte">' . $fornecedor['fornecedor_descricao'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_cnpj'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_cidade'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_estado'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_fone'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_celular'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_whatsapp'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_email'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_contato'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte"><a href="fornecedoresEditar.php?id=' . $fornecedor['fornecedor_id'] . '"<i class="fa fa-pencil"></i></td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte"><i class="fa fa-close" onclick="fornecedorDeletar(\'' . $fornecedor['fornecedor_id'] . '\',\'' . $row_usu_info['usuario_id'] . '\')"></i></td>
                                                  </tr>';
                                        } else {
                                            echo '<tr>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_codigo'] . '</td>
                                                       <td class="tabela-formata-linha-fonte">' . $fornecedor['fornecedor_descricao'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_cnpj'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_cidade'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_estado'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_fone'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_celular'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_whatsapp'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_email'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte">' . $fornecedor['fornecedor_contato'] . '</td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte"><a href="fornecedoresEditar.php?id=' . $fornecedor['fornecedor_id'] . '"<i class="fa fa-pencil"></i></td>
                                                       <td class="tabela-formata-linha-alinhamento tabela-formata-linha-fonte"><i class="fa fa-close" onclick="fornecedorDeletar(\'' . $fornecedor['fornecedor_id'] . '\',\'' . $row_usu_info['usuario_id'] . '\')"></i></td>
                                                 </tr>';
                                        }

                                        $contador++;
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