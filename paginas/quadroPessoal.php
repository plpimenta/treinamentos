<?php
error_reporting(0);
# Gerenciamento de sessao #
include '../funcoes/sessaoValida.php';

# Includes utilizadas no projetos (CLASSES E FUNCOES) #
require_once '../core/config.php';
# Includes utilizadas no projetos (CLASSES E FUNCOES) #

# Estrutura superior da pagina
require_once '../estrutura/estruturaSuperiorPagina.php';
# Estrutura superior da pagina
?>
<script> 
         function exibirEdit(){
     var display = document.getElementById('editarUsu').style.display;
     var display1 = document.getElementById('tabelaUsu').style.display;
     if(display == "none"){
         
     display1 = document.getElementById('editarUsu').style.display='block';
     display = document.getElementById('tabelaUsu').style.display='none';
     }
        
    }
    function voltar(){
        window.location.href = "quadroPessoal.php";
    }
 
</script>

<!--Adicionar codigo abaixo desta linha-->
<div id="tabelaUsu" class="table-responsive-sm">
<table class="table table-responsive-sm table-striped" >
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Estabelecimento Cod.</th>
      <th scope="col">Estab. Nome</th>
      <th scope="col">Matrícula</th>
      <th scope="col">Nome</th>
      <!--<th scope="col">Data Admissão</th>-->
      <!--<th scope="col">Data Nasc</th>-->
      <th scope="col">Cargo Cod.</th>
      <th scope="col">Cargo Nome</th>
      <th scope="col">Código</th>
      <!--<th scope="col">Resultado Cod.</th>-->
      <th scope="col">Resultado Nome</th>
      <th scope="col">Ativ. Periculosa</th>
      <th scope="col">Nº Horas</th>
      <!--<th scope="col">Sindicato Cod.</th>-->
      <!--<th scope="col">Sindicato Razão S.</th>-->
      <!--<th scope="col">Sexo</th>-->
      <th scope="col">Grau Instrução</th>
      <th scope="col">PCD</th>
      <th scope="col">CPF</th>
      <!--<th scope="col">Chefia Matrícula</th>-->
      <th scope="col">Chefia Nome</th>
      <th scope="col">E-mail</th>
      <!--<th scope="col">CTPS Nº</th>-->
      <!--<th scope="col">CTPS Serie</th>-->
      <!--<th scope="col">PIS</th>-->
      <th scope="col">Indentidade</th>
      <th scope="col">Situação</th>
      <th scope="col">RUT</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      $exibir = selectQuadroPessoal($conn);
      while($row=$exibir->fetch()){
      ?>
    <tr>
        <td class="tabela-celula-limite-caracter" id="approved" value="<?php echo $row[0]; ?>" name="idPessoal"><?php echo $row['pessoal_id']; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['Matricula'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['Nome'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['Data_admissao'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['Data_nascimento'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['Cargo_codigo'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['Cargo_nome'] ; ?></td>
      <td class="tabela-celula-limite-caracter" ><?php echo $row['Codigo'] ; ?></td>
      <td class="tabela-celula-limite-caracter" ><?php echo $row['Funcao_nome'] ; ?></td>
      <td class="tabela-celula-limite-caracter" ><?php echo $row['Centro_resultado_codigo'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['Centro_resultado_nome'] ; ?></td>
      <td class="tabela-celula-limite-caracter" ><?php echo $row['Atividade_periculosa'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['Numero_horas'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['Sindicato_codigo'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['Sindicato_razaosocial'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['Sexo'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['Grau_instrucao_nome'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['Deficiente'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['CPF'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['Chefia_imediata_matricula'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['Chefia_imediata_nome'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['Email'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['CTPS_numero'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['CTPS_serie'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['PIS'] ; ?></td>
      <td class="tabela-celula-limite-caracter" ><?php echo $row['Identidade'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['Situacao'] ; ?></td>
      <td class="tabela-celula-limite-caracter"><?php echo $row['RUT'] ; ?></td>
      <td class="tabela-celula-limite-caracter" hidden="" id="valorID" > <a href="#?ids= <?php echo $row['pessoal_id']; ?> " onclick="exibirEdit()" id="ref" class="btn btn-primary pull-right h4">Editarss</a> </td>
      <td class="tabela-celula-limite-caracter"  id="editarClick" onclick="exibirEdit(), mostrarId();" class="btn btn-primary pull-right h4">Editar </td>
  <input type="hidden" id="meuId" name="meuId" value="<?php echo $row['pessoal_id'];?>" />
    </tr>
      <?php } ?>
    
  </tbody>
</table>

</div>

<div id="editarUsu" class="row" style="display: none;" >
    <div class="col-lg-8 col-sm-6">
        <div class="card">
            <button type="button" class="close" onclick="voltar();" aria-hidden="true">&times;</button>
            <div class="panel-heading">
                <h4>Cadastro de Treinamento </h4>
            </div>
            <div id="resultado"> </div>
            <div class="panel-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col-lg-3 col-sm-1">
                            <label for="cursoCodigo">Código</label>
                            <input type="number" id="cursoCodigo" name="cursoCodigo" class="form-control border-input" placeholder="CODIGO" />
                        </div>
                        <div class="col-lg-9 col-sm-3">
                            <label for="cursoNome">Nome Curso</label>
                            <input type="text" id="cursoNome" name="cursoNome" class="form-control border-input" placeholder="Informe o nome do curso" />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-4 col-sm-1">
                            <label for="cursoCargaHoraiaFormacao">Carga Horária Formação</label>
                            <input type="number" id="cursoCargaHoraiaFormacao" name="cursoCargaHoraiaFormacao" class="form-control border-input" placeholder="Informe a carga horária" />
                        </div>
                        <div class="col-lg-4 col-sm-3">
                            <label for="cursoCargaHoraiaReciclagem">Carga Horária Reciclagem</label>
                            <input type="number" id="cursoCargaHoraiaReciclagem" name="cursoCargaHoraiaReciclagem" class="form-control border-input" placeholder="Informe a carga horária" />
                        </div>
                        <div class="col-lg-4 col-sm-3">
                            <label for="cursoValidade">Validade do Treinamento</label>
                            <input type="date" id="cursoValidade" name="cursoValidade" class="form-control border-input" />
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-lg-6 col-sm-1">
                            <label for="cursoInstrutorOrigem">Selecione a Horigem do Instrutor</label>
                            <select id="cursoInstrutorOrigem" name="cursoInstrutorOrigem" onblur="cursoInserirExibeInstrutorOrigem()" class="form-control border-input">
                                <option value="0">Selecione</option>
                                <option>Interno</option>
                                <option>Externo</option>
                            </select>
                        </div>
                        <div id="resultado"></div>
                    </div>
                    <br>
                    <div class="row" id="crusoInstrutorInterno" hidden="">
                        <div class="col-lg-12 col-sm-1">
                        </div>
                        
                    </div>
                    <br>
                    <div class="row" id="crusoInstrutorExterno" hidden="">
                        <div class="col-lg-12 col-sm-1">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<input id="title"  name="teste"  value="52"/>

<?php $tt = 'A'; 


?>
<script>
       
       
    
    function mostrarId() {
 

  var id_task = $("#approved").attr('value');

//  alert(id_task );
//   var nome = document.getElementById('campos');
    $.post("ajax.php", {
    nome: {id:id_task }

    
 }, function(msg){
     $("#resultado").html(msg);
 })
       };
</script>

<!--Adicionar codigo acima desta linha->
<?php
#Estrutura inferior da pagina
require_once '../estrutura/estruturaInferiorPagina.php';
#Estrutura inferior da pagina
?>

