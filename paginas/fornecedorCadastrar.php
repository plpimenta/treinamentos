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
    <div class="col-lg-10 col-sm-6 col-xs-2">
        
        <!--painel cadastro fornecedor-->
        <div class="card">
            <div class="panel-heading"><h3>Cadastro de Fornecedores</h3></div>
            <div class="panel-body">
                <div class="form-group form-group-lg form-group-sm">
                    <div class="row">
                        <input type="text" id="fornecedorCadastrarQuemCadastrou" name="fornecedorCadastrarQuemCadastrou" hidden="" value="<?php echo $row_usu_info['usuario_id'];?>"/>
                        <div class="col-lg-3 col-sm-3 col-xs-2">
                            <label for="fornecedorCadastrarCodigo">Código Fornecedor</label>
                            <input type="number" id="fornecedorCadastrarCodigo" name="fornecedorCadastrarCodigo"  class="form-control border-input" placeholder="Codigo"  />
                        </div>
                        <div class="col-lg-9 col-sm-6 col-xs-1">
                            <label for="fornecedorCadastrarRazaoSocial">Razão Social</label>
                            <input type="text" id="fornecedorCadastrarRazaoSocial" name="fornecedorCadastrarRazaoSocial" class="form-control border-input"  placeholder="Informe a Razão Social do Fornecedor" />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-5 col-sm-5 col-xs-2">
                            <label for="fornecedorCadastrarCnpj">CNPJ</label>
                            <input type="text" id="fornecedorCadastrarCnpj" onblur="validaFornecedorJaCadastrado()" onkeypress="formatarCNPJ()" name="fornecedorCadastrarCnpj" class="form-control border-input" placeholder="Informe o Número CNPJ"  />
                        </div>
                        <div class="col-lg-7 col-sm-7 col-xs-1">
                            <label for="fornecedorCadastroLogradouro">Logradouro</label>
                            <input type="text" id="fornecedorCadastroLogradouro" name="fornecedorCadastroLogradouro" class="form-control border-input"  placeholder="Ex: Rua Pirai do Sul, 76" />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4 col-sm-4 col-xs-2">
                            <label for="fornecedorCadastrarComplemento">Complemento</label>
                            <input type="text" id="fornecedorCadastrarComplemento" name="fornecedorCadastrarComplemento" class="form-control border-input" placeholder="Ex: Sala 3"  />
                        </div>
                        <div class="col-lg-3 col-sm-3 col-xs-2">
                            <label for="fornecedorCadastrarNumero">Número</label>
                            <input type="number" id="fornecedorCadastrarNumero" name="fornecedorCadastrarNumero" class="form-control border-input" placeholder="Ex: 3000"  />
                        </div>
                        <div class="col-lg-5 col-sm-5 col-xs-1">
                            <label for="fornecedorCadastroCep">CEP</label>
                            <input type="text" id="fornecedorCadastroCep" name="fornecedorCadastroCep" class="form-control border-input"  placeholder="Ex: 83410310" />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-7 col-sm-7 col-xs-1">
                            <label for="fornecedorCadastroCidade">Cidade</label>
                            <input type="text" id="fornecedorCadastroCidade" list="fornecedorCadastroCidadeLista" name="fornecedorCadastroCidade" class="form-control border-input" />
                            <datalist id="fornecedorCadastroCidadeLista" >
                            <?php
                                $cidades=selectCidades($conn);
                                
                                if($cidades->rowcount() == 0 ){
                                    echo "<option>Não há cidades Cadastradas</option>";
                                }else{
                                    while($cidade=$cidades->fetch()){
                                        echo '<option value="'.$cidade['nome'].'"/>';
                                    }
                                }
                            ?>
                            </datalist>
                       </div>
                        <div class="col-lg-3 col-sm-3 col-xs-1">
                            <label for="fornecedorCadastroEstado">Estado</label>
                            <input type="text" id="fornecedorCadastroEstado" list="fornecedorCadastroEstadoLista" name="fornecedorCadastroEstado" class="form-control border-input" />
                            <datalist id="fornecedorCadastroEstadoLista" >
                            <?php
                                $estados=selectEstados($conn);
                                
                                if($estados->rowcount() == 0 ){
                                    echo "<option>Não há Estados Cadastrados</option>";
                                }else{
                                    while($estado=$estados->fetch()){
                                        echo '<option value="'.$estado['uf'].'"/>';
                                    }
                                }
                            ?>
                            </datalist>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-3 col-sm-3 col-xs-2">
                            <label for="fornecedorCadastrarFone">Fone</label>
                            <input type="text" id="fornecedorCadastrarFone" name="fornecedorCadastrarFone" class="form-control border-input" placeholder="Ex:41 3663-0758"  />
                        </div>
                        <div class="col-lg-3 col-sm-3 col-xs-2">
                            <label for="fornecedorCadastraCelular">Celular</label>
                            <input type="text" id="fornecedorCadastraCelular" name="fornecedorCadastraCelular" class="form-control border-input" placeholder="Ex: 41 9 97013502"  />
                        </div>
                        <div class="col-lg-2 col-sm-2 col-xs-2">
                            <label for="fornecedorCadastraWhatsApp">WhatsApp</label>
                            <select id="fornecedorCadastraWhatsApp" name="fornecedorCadastraWhatsApp" class="form-control border-input">
                                <option>SIM</option>
                                <option>NÃO</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-sm-4 col-xs-1">
                            <label for="fornecedorCadastroContato">Contato</label>
                            <input type="text" id="fornecedorCadastroContato" name="fornecedorCadastroContato" class="form-control border-input"  placeholder="Ex: Luiz Paulo" />
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-lg-7 col-sm-7 col-xs-2">
                            <label for="fornecedorCadastrarEmail">Email</label>
                            <input type="email" id="fornecedorCadastrarEmail" name="fornecedorCadastrarEmail" class="form-control border-input" placeholder="Ex:lpimenta@quanticait.com.br"  />
                        </div>
                    </div>
                    <hr>
                    <button id="fornecedorCadastrarGravar" name="fornecedorCadastrarGravar" class="btn btn-info" onclick="gravarFornecedor()">Gravar</button>
                </div>
                
            </div>
        </di>
        <!--painel cadastro fornecedor-->
    </div>
</div>
<!--Adicionar codigo acima desta linha->
<?php
#Estrutura inferior da pagina
require_once '../estrutura/estruturaInferiorPagina.php';
#Estrutura inferior da pagina
?>

