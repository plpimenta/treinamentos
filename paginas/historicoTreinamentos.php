<!--IMPORTA ESTRUTURA SUPERIOR DA PAGINA (HTML,TITLE,HEAD,...)-->
<?php require_once '../estrutura/estruturaSuperiorPagina.php';?>
<!--IMPORTA ESTRUTURA SUPERIOR DA PAGINA (HTML,TITLE,HEAD,...)-->

<!--IMPORTA MENU LATERAL ESQUERDO-->
<?php require_once '../estrutura/menuEsquerdo.php'; ?>
<!--IMPORTA MENU LATERAL ESQUERDO-->

<!--IMPORTA MENU TOP-->
<?php require_once '../estrutura/menuSuperior.php'; ?>
<!--IMPORTA MENU TOP-->

<!--IMPORTA MENU TOP-->
<?php require_once '../core/config.php'; ?>
<!--IMPORTA MENU TOP-->

<!-- CONTEUDO DA PAGINA -->
<div class="right_col" role="main">
  <div class="row top_tiles"> <!-- top tiles -->
      
  <!--EDITAR DAQUI PARA BAIXO-->
  <div id="tabelaExibirTreinamentosHist" class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Histórico<small>Usuários</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a><!--                          <td>System Architect</td>
                          <td>Edinburgh</td>
                          <td>61</td>
                          <td>2011/04/25</td>
                          <td>$320,800</td>-->
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <p class="text-muted font-13 m-b-30">
                        Histórico Treinamentos.
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Matricula</th>
                          <th>Nome</th>
                          <th>Matrícula</th>
                          <th>Nome</th>
                          <th>Função</th>
                          <th>Turno</th>
<!--                          <th>Cargo Nome</th>
                          <th>Código</th>
                          <th>Função</th>
                          <th>Resultado Cod.</th>
                          <th>Resultado Nome</th>
                          <th>Ativ. Periculosa</th>
                          <th>Nº Horas</th>
                          <th>Sindicato Cod.</th>
                          <th>Sindicato Razão S.</th>
                          <th>Sexo</th>
                          <th>Grau Instrução</th>
                          <th>PCD</th>
                          <th>CPF</th>
                          <th>Chefia Matrícula</th>
                          <th>Chefia Nome</th>
                          <th>E-mail</th>
                          <th>CTPS Nº</th>
                          <th>CTPS Serie</th>
                          <th>PIS</th>
                          <th>Indentidade</th>
                          <th>Situação</th>
                          <th>RUT</th>-->
                          <th>Editar</th>
                        </tr>
                      </thead>

                      <tbody>
                        <tr>
                            <?php 
                              $exibir = selectTreinamentosHist($conn);
                             while($row=$exibir->fetch()){
                            ?>
                          <td><?php echo $row['treinamentos_matricula'] ?></td>
                          <td><?php echo $row['treinamentos_nome'] ?></td>
                          <td><?php echo $row['treinamentos_dsc_funcao'] ?></td>
                          <td><?php echo $row['treinamentos_turno'] ?></td>
                          <td><?php echo $row['treinamentos_cc'] ?></td>
                          <td><?php echo $row['treinamentos_centro_custo'] ?></td>
                          <td> <i class="fa fa-pencil" id="treinamentos_id" onclick="treinamentosHistorico(<?php echo $row['treinamentos_id']; ?>)"></i></td>
                          
                        </tr>
      <?php }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
      
      
  <!--EDITAR DAQUI PARA CIMA-->
      
  </div>  <!-- top tiles -->
</div>
    
    <div id="resultadoTreinamentosHist">
        
    </div>
<!-- CONTEUDO DA PAGINA -->


<!--ESTRUTURA INFERIOR SCRIPTS E INCLUDES-->
<?php require_once '../estrutura/estruturaInferiorPagina.php'; ?>
<!--ESTRUTURA INFERIOR SCRIPTS E INCLUDES-->