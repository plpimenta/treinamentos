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


<div class="row">
    <div class="col-lg-8 col-sm-6">
        <div class="card">
            <div class="panel-heading">
                <h4>Cadastro de Treinamento</h4>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <input type="text" id="cursoCadastradoPor" name="cursoCadastradoPor" hidden="" value="<?php echo $row_usu_info['usuario_id']; ?>"/>
                    <div class="row">
                        <div class="col-lg-3 col-sm-1">
                            <label for="cursoCodigo">Código</label>
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
                            <select id="cursoPossuiReciclagem" name="cursoPossuiReciclagem" onblur="cursoInserirExibeReciclagem()" class="form-control border-input">
                                <option>Selecione</option>
                                <option value="1">Sim</option>
                                <option value="0">Não</option>
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
                            <label for="cursoInstrutorOrigem">Selecione a origem do Instrutor</label>
                            <select id="cursoInstrutorOrigem" name="cursoInstrutorOrigem" onblur="cursoInserirExibeInstrutorOrigem()" class="form-control border-input">
                                <option value="0">Selecione</option>
                                <option value="Interno">Interno</option>
                                <option value="Externo">Externo</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-sm-1">
                            <label for="cursoValidadeTreinamento">Validade do Treinamento</label>
                            <input type="number" id="cursoValidadeTreinamento" name="cursoValidadeTreinamento" class="form-control border-input" placeholder="Valor em meses" />
                        </div>
                    </div>
                    <br>
                    <div class="row" >
                        <div class="col-lg-6 col-sm-1" id="cursoInstrutorInternoContainer" hidden="" >
                            <label for="cursoInstrutorInterno">Selecione Instrutor</label>
                            <select id="cursoInstrutorInterno" name="cursoInstrutorInterno" class="form-control border-input">
                                <option>Selecione Instrutor</option>
                                <?php
                                    $instrutores=selectDadosPessoalParaFormulario($conn);
                                    if($instrutores->rowcount() == 0){
                                        echo '<option>Nao há instrutores cadastrados</option>';
                                    }else{
                                        while($instrutor=$instrutores->fetch()){
                                            echo '<option value="'.$instrutor['Matricula'].'">'.$instrutor['Nome'].'</option>';
                                        }
                                    }
                                        
                                ?>
                            </select>    
                        </div>
                        <div class="col-lg-6 col-sm-1" id="cursoInstrutorExternoContainer" hidden="">
                            <label for="cursoInstrutorExterno">Selecione o Fornecedor</label>
                            <select id="cursoInstrutorExterno" name="cursoInstrutorExterno" class="form-control border-input">
                                <?php
                                    $fornecedores= selectFornecedores($conn);
                                    if($fornecedores->rowcount() == 0 ){
                                        echo '<option>Nao Há fornecedores cadastrados</option>';
                                    }else{
                                        while($fornecedor=$fornecedores->fetch()){
                                            echo '<option value="'.$fornecedor['fornecedor_codigo'].'">'.$fornecedor['fornecedor_descricao'].'</option>';
                                            
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <button class="btn btn-info" onclick="cursoGravar()" id="cursoGravarBtn">Gravar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Adicionar codigo acima desta linha->
<?php
#Estrutura inferior da pagina
require_once '../estrutura/estruturaInferiorPagina.php';
#Estrutura inferior da pagina
?>

