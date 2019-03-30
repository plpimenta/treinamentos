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
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Cadastro de Treinamento</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                
               <!--CORPO DO FORMULARIO-->
                <div class="x_content">
                    <div class="card"> <!-- CARD -->
                        <div class="panel-body"> <!-- PAINEL BODY -->
                            <div class="row">
                                <div class="col-lg-3 col-sm-1">
                                    <label for="cursoCodigo">Código</label>
                                    <input type="text" id="cursoCadastradoPor" name="cursoCadastradoPor" hidden="" value="<?php echo $row_usu_info['usuario_id']; ?>"/>
                                    <input type="number" id="cursoCodigo" name="cursoCodigo" class="form-control border-input" placeholder="CODIGO"  readonly="" />
                                </div>
                                <div class="col-lg-9 col-sm-3">
                                    <label for="cursoNome">Nome Curso</label>
                                    <input type="text" id="cursoNome" name="cursoNome" class="form-control border-input" placeholder="Informe o nome do curso" />
                                </div>
                            </div>
                             <br>
                            <div class="row">
                                <div class="col-lg-4 col-sm-3">
                                    <label for="cursoPossuiReciclagem">Curso Possui Reciclagem</label>
                                    <select id="cursoPossuiReciclagem" name="cursoPossuiReciclagem"  class="form-control border-input">
                                        <option>Selecione</option>
                                        <option value="1">SIM</option>
                                        <option value="0">NAO</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-sm-1">
                                    <label for="cursoCargaHorariaFormacao">Carga Horária Formação</label>
                                    <input type="number" id="cursoCargaHorariaFormacao" name="cursoCargaHorariaFormacao" class="form-control border-input" placeholder="Informe a carga horária" value="0" />
                                </div>
                                <div class="col-lg-4 col-sm-3" hidden="" id="cursoCargaHorariaReciclagemExibir">
                                    <label for="cursoCargaHorariaReciclagem">Carga Horária Reciclagem</label>
                                    <input type="number" id="cursoCargaHorariaReciclagem" name="cursoCargaHorariaReciclagem" class="form-control border-input" placeholder="Informe a carga horária" value="0" />
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 col-sm-1">
                                    <label for="cursoReferencia">Referência</label>
                                    <select id="cursoReferencia" name="cursoReferencia"  class="form-control border-input">
                                        <option>Selecione Referência</option>
                                        <?php
                                            $referencias=selectTreinamentosReferencias($conn);
                                            if($referencias->rowcount() == 0 ){
                                                echo '<option>Não há referencias cadastradas</option>';
                                            }else{
                                                while($referencia=$referencias->fetch()){
                                                    echo '<option value="'.$referencia['treinamento_referencia_id'].'">'.$referencia['treinamento_referencia_descricao'].'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-sm-1">
                                    <label for="cursoValidadeTreinamento">Perioticidade</label>
                                    <input type="number" id="cursoValidadeTreinamento" name="cursoValidadeTreinamento" class="form-control border-input" placeholder="Valor em meses" />
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6">
                                    <button class="btn btn-info" onclick="cursoGravar()" id="cursoGravarBtn">Gravar</button>
                                </div>
                            </div>
                            
                        </div><!-- PAINEL BODY -->
                    </div> <!-- CARD -->
                    
                    
                </div>  
               <!--CORPO DO FORMULARIO-->
                    
            </div>  
        </div>  

        <!--EDITAR DAQUI PARA CIMA-->

    </div>  <!-- top tiles -->
</div>
<!-- CONTEUDO DA PAGINA -->


<!--ESTRUTURA INFERIOR SCRIPTS E INCLUDES-->
<?php require_once '../estrutura/estruturaInferiorPagina.php'; ?>
<!--ESTRUTURA INFERIOR SCRIPTS E INCLUDES-->