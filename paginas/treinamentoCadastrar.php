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
        <div class="col-md-7 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Cadastro de Curso</h2>
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
                                    <input type="text" id="cursoNome" name="cursoNome" autocomplete="off" onblur="validaCursoJaCadastrado()" class="form-control border-input" placeholder="Informe o nome do curso" />
                                </div>
                            </div>
                             <br>
                            <div class="row">
                                <div class="col-lg-4 col-sm-3">
                                    <label for="cursoPossuiReciclagem">Curso Possui Reciclagem</label>
                                    <select id="cursoPossuiReciclagem" name="cursoPossuiReciclagem"  class="form-control border-input">
                                        <option>Selecione</option>
                                        <option value="SIM">SIM</option>
                                        <option value="NAO">NAO</option>
                                    </select>
                                </div>
                                <div class="col-lg-4 col-sm-1">
                                    <label for="cursoCargaHorariaFormacao">Carga Horária Formação</label>
                                    <input type="number" id="cursoCargaHorariaFormacao" name="cursoCargaHorariaFormacao" class="form-control border-input" placeholder="Informe a carga horária" value="0" />
                                </div>
                                <div class="col-lg-4 col-sm-3">
                                    <label for="cursoFormacaoPossuiPratica">Treinamento Prático</label>
                                    <select id="cursoFormacaoPossuiPratica" name="cursoFormacaoPossuiPratica" class="form-control border-input">
                                        <option>NAO</option>
                                        <option>SIM</option>
                                    </select>
                                </div>
                            </div>
                              <br>
                             <div class="row" id="cursoCargaHorariaReciclagemExibir" hidden="">
                                <div class="col-lg-4 col-sm-3"></div>
                                <div class="col-lg-4 col-sm-3">
                                    <label for="cursoCargaHorariaReciclagem">Carga Horária Reciclagem</label>
                                    <input type="number" id="cursoCargaHorariaReciclagem" name="cursoCargaHorariaReciclagem" class="form-control border-input" placeholder="Informe a carga horária" value="0" />
                                </div>
                                <div class="col-lg-4 col-sm-1">
                                   <label for="cursoReciclagemPossuiPratica">Treinamento Prático</label>
                                    <select id="cursoReciclagemPossuiPratica" name="cursoReciclagemPossuiPratica" class="form-control border-input">
                                        <option>NAO</option>
                                        <option>SIM</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 col-sm-1">
                                    <label for="cursoReferencia">Referência</label>
                                    <select id="cursoReferencia" name="cursoReferencia"  class="form-control border-input">
                                        <option value="Selecione">Selecione Referência</option>
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
                                    <label for="cursoValidadeTreinamento">Periodicidade</label>
                                    <input type="number" id="cursoValidadeTreinamento" name="cursoValidadeTreinamento" class="form-control border-input" placeholder="Valor em meses" />
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-8 col-sm-2">
                                    <label for="cursoProficiencia">Proficiência</label>
                                    <textarea id="cursoProficiencia" name="cursoProficiencia" rows="" cols="16" class="form-control" placeholder="Informe as proficiências do instrutor para o curso"></textarea>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12 col-sm-6">
                                    <label for="cursoConteudoProgramatico">Conteúdo Programatico</label>
                                    <textarea id="cursoConteudoProgramatico" class="form-control" name="cursoConteudoProgramatico" rows="10" cols="100" placeholder="Informe o conteúdo programático do curso"></textarea>
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