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
  
  <!--PEGA ID VIA GET E BUSCA DADOS PARA EDICAO-->
  <?php
        if($_GET['id']){
            
            $id=$_GET['id'];
            $fornecedor= selectFornecedorPorId($conn, $id);
        }
  ?>
  <!--PEGA ID VIA GET E BUSCA DADOS PARA EDICAO-->
  
  <!--FORMULARIO DE EDICAO-->
  
      
      
      
  <!--FORMULARIO DE EDICAO-->
  <!--EDITAR DAQUI PARA BAIXO-->
        <div class="col-md-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edição de Fornecedor</h2>
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
                                    <label for="fornecedorCadastrarCodigo">Código</label>
                                    <input type="text" id="fornecedorCadastrarQuemCadastrou" name="fornecedorCadastrarQuemCadastrou" hidden="" value="<?php echo $row_usu_info['usuario_id']; ?>"/>
                                    <input type="number" id="fornecedorCadastroId" name="fornecedorCadastroId" hidden="" value="<?php echo $fornecedor['fornecedor_id'] ?>"/>
                                    <input type="number" id="fornecedorCadastrarCodigo" name="fornecedorCadastrarCodigo" value="<?php echo $fornecedor['fornecedor_codigo'] ?>" class="form-control border-input" placeholder="CODIGO"  />
                                </div>
                                <div class="col-lg-9 col-sm-3">
                                    <label for="fornecedorCadastrarRazaoSocial">Razao Social</label>
                                    <input type="text" id="fornecedorCadastrarRazaoSocial" name="fornecedorCadastrarRazaoSocial" value="<?php echo $fornecedor['fornecedor_descricao'] ?>" autocomplete="off"  class="form-control border-input" placeholder="Informe a razão socila" />
                                </div>
                            </div>
                             <br>
                             <div class="row">
                                <div class="col-lg-5 col-sm-2">
                                    <label for="fornecedorCadastrarCnpj">Cnpj</label>
                                    <input type="text" id="fornecedorCadastrarCnpj" name="fornecedorCadastrarCnpj" value="<?php echo $fornecedor['fornecedor_cnpj'] ?>"  class="form-control border-input" placeholder="CNPJ" autocomplete="off"  />
                                </div>
                                <div class="col-lg-7 col-sm-3">
                                    <label for="fornecedorCadastroLogradouro">Logradouro</label>
                                    <input type="text" id="fornecedorCadastroLogradouro" name="fornecedorCadastroLogradouro" value="<?php echo $fornecedor['fornecedor_endereco_logradouro'] ?>"  autocomplete="off"  class="form-control border-input" placeholder="Ex : Rua Pirai do Sul" />
                                </div>
                            </div>
                             <br>
                             <div class="row">
                                <div class="col-lg-3 col-sm-1">
                                    <label for="fornecedorCadastrarComplemento">Complemento</label>
                                    <input type="text" id="fornecedorCadastrarComplemento" name="fornecedorCadastrarComplemento" value="<?php echo $fornecedor['fornecedor_endereco_complemento'] ?>" autocomplete="off" class="form-control border-input" placeholder="Ex: AP 370"   />
                                </div>
                                <div class="col-lg-3 col-sm-1">
                                    <label for="fornecedorCadastrarNumero">Número</label>
                                    <input type="number" id="fornecedorCadastrarNumero" name="fornecedorCadastrarNumero" value="<?php echo $fornecedor['fornecedor_numero'] ?>" autocomplete="off"  class="form-control border-input" placeholder="Ex : 76" />
                                </div>
                                <div class="col-lg-4 col-sm-1">
                                    <label for="fornecedorCadastroCep">CEP</label>
                                    <input type="text" id="fornecedorCadastroCep" name="fornecedorCadastroCep" value="<?php echo $fornecedor['fornecedor_cep'] ?>" autocomplete="off"  class="form-control border-input" placeholder="Ex : 83410310" />
                                </div>
                            </div>
                             <br>
                             <div class="row">
                                <div class="col-lg-5 col-sm-2">
                                    <label for="fornecedorCadastroCidade">Cidade</label>
                                    <select id="fornecedorCadastroCidade"  name="fornecedorCadastroCidade" class="form-control border-input" >
                                    
                                        <?php
                                                echo '<option>'.$fornecedor['fornecedor_cidade'].'</option>';
                                                $cidades=selectCidades($conn);

                                                if($cidades->rowcount() == 0 ){
                                                    echo "<option>Não há cidades Cadastradas</option>";
                                                }else{
                                                    while($cidade=$cidades->fetch()){
                                                        echo '<option>'.$cidade['nome'].'</option>';
                                                    }
                                                }
                                            ?>
                                    </select>
                                </div>
                                <div class="col-lg-3 col-sm-1">
                                    <label for="fornecedorCadastroEstado">Estado</label>
                                    <select id="fornecedorCadastroEstado" name="fornecedorCadastroEstado" class="form-control border-input" >
                                        <?php
                                            echo '<option selected="selected" value="'.$fornecedor['fornecedor_estado'].'">'.$fornecedor['fornecedor_estado'].'</option>';
                                            $estados=selectEstados($conn);

                                            if($estados->rowcount() == 0 ){
                                                echo "<option>Não há Estados Cadastrados</option>";
                                            }else{
                                                while($estado=$estados->fetch()){
                                                    echo '<option value="'.$estado['uf'].'"/>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                             <br>
                             <div class="row">
                                <div class="col-lg-4 col-sm-2">
                                    <label for="fornecedorCadastrarFone">Fone</label>
                                    <input type="text" id="fornecedorCadastrarFone" name="fornecedorCadastrarFone" value="<?php echo $fornecedor['fornecedor_fone'] ?>" autocomplete="off" class="form-control border-input" placeholder="Ex: 41 3663-0758"   />
                                </div>
                                <div class="col-lg-4 col-sm-2">
                                    <label for="fornecedorCadastraCelular">Celular</label>
                                    <input type="number" id="fornecedorCadastraCelular" name="fornecedorCadastraCelular"  value="<?php echo $fornecedor['fornecedor_celular'] ?>" autocomplete="off"  class="form-control border-input" placeholder="Ex : 41 9 97013502" />
                                </div>
                                <div class="col-lg-3 col-sm-1">
                                    <label for="fornecedorCadastraWhatsApp">Whatsapp</label>
                                    <select id="fornecedorCadastraWhatsApp" name="fornecedorCadastraWhatsApp" class="form-control border-input">
                                        <?php
                                            echo '<option">'.$fornecedor['fornecedor_celular'].'</option>';
                                         ?>
                                        <option>SIM</option>
                                        <option>NÃO</option>
                                    </select>
                                </div>
                            </div>
                             <br>
                             <div class="row">
                                <div class="col-lg-7 col-sm-2">
                                    <label for="fornecedorCadastrarEmail">Email</label>
                                    <input type="email" id="fornecedorCadastrarEmail" name="fornecedorCadastrarEmail" value="<?php echo $fornecedor['fornecedor_email'] ?>"  autocomplete="off" class="form-control border-input" placeholder="contato@contato.com.br"   />
                                </div>
                                <div class="col-lg-5 col-sm-2">
                                    <label for="fornecedorCadastroContato">Contato</label>
                                    <input type="text" id="fornecedorCadastroContato" name="fornecedorCadastroContato" value="<?php echo $fornecedor['fornecedor_contato'] ?>"  autocomplete="off"  class="form-control border-input" placeholder="Jõao Paulo" />
                                </div>
                            </div>
                             <hr>
                            <button id="fornecedorCadastrarGravar" name="fornecedorCadastrarGravar" class="btn btn-info" onclick="atualizarDadosFornecedor()">Atualizar</button>
                
                        </div>    
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