function atualizarTreinamento() {

    //Pega variaveis do formulario
    var treinamentoEditar = document.getElementById('treinamentoEditar').value;
    var formarEditar = document.getElementById('formarEditar').value;
    var treinadosEditar = document.getElementById('treinadosEditar').value;
    var vencidosEditar = document.getElementById('vencidosEditar').value;
    var treinamentoEditarId = document.getElementById('treinamentoEditarId').value;

    //Concatena dados
    var dados = "";
    dados = dados.concat(treinamentoEditar, ";");
    dados = dados.concat(formarEditar, ";");
    dados = dados.concat(treinadosEditar, ";");
    dados = dados.concat(vencidosEditar, ";");
    dados = dados.concat(treinamentoEditarId);

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            notificacao('top', 'right', 'success', 'Treinamento atualizado com sucesso');
            ocultarContainerTreinamentosEditar();
            exibirContainerTreinamentosGerenciar();
        }
    };
    xhttp.open("GET", "../ajax/ajax.php?atualizarTreinamento=1&dados=" + dados);
    xhttp.send();

}

function treinamentoEditar(id) {

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var dados = JSON.parse(this.responseText);

            ocultarContainerTreinamentosGerenciar();
            exibirContainerTreinamentosEditar();

            // Preenche formulario para edicao
            document.getElementById('treinamentoEditar').value = dados.treinamento_nome;
            document.getElementById('treinadosEditar').value = dados.treinamento_treinados;
            document.getElementById('formarEditar').value = dados.treinamento_formar;
            document.getElementById('vencidosEditar').value = dados.treinamento_vencidos;
            document.getElementById('treinamentoEditarId').value = dados.treinamento_id;
        }
    };
    xhttp.open("GET", "../ajax/ajax.php?treinamentoEditar=1&id=" + id);
    xhttp.send();

}

function treinamentoExcluir(id){
    
    if(confirm('Deseja realmente apagar este treinamento?')){
        
        alert('apagar treinamento');
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if( this.readyState == 4 && this.status == 200 ){


            }
        };
        xhttp.open("GET","../ajax/ajax.php?treinamentoExcluir=1&id="+id);
        xhttp.send();
        
    }
    
    
    
}

function gravarFornecedor(){
    
    // PEGA VARIAVEIS DO FORMULARIO //
    var fornecedorCadastrarQuemCadastrou    = $('#fornecedorCadastrarQuemCadastrou').val();
    var fornecedorCadastrarCodigo           = $('#fornecedorCadastrarCodigo').val();
    var fornecedorCadastrarRazaoSocial      = $('#fornecedorCadastrarRazaoSocial').val();
    var fornecedorCadastrarCnpj             = $('#fornecedorCadastrarCnpj').val();
    var fornecedorCadastroLogradouro        = $('#fornecedorCadastroLogradouro').val();
    var fornecedorCadastrarComplemento      = $('#fornecedorCadastrarComplemento').val();
    var fornecedorCadastrarNumero           = $('#fornecedorCadastrarNumero').val();
    var fornecedorCadastroCep               = $('#fornecedorCadastroCep').val();
    var fornecedorCadastroCidade            = $('#fornecedorCadastroCidade').val();
    var fornecedorCadastroEstado            = $('#fornecedorCadastroEstado').val();
    var fornecedorCadastrarFone             = $('#fornecedorCadastrarFone').val();
    var fornecedorCadastraCelular           = $('#fornecedorCadastraCelular').val();
    var fornecedorCadastraWhatsApp          = $('#fornecedorCadastraWhatsApp').val();
    var fornecedorCadastrarEmail            = $('#fornecedorCadastrarEmail').val();
    var fornecedorCadastroContato           = $('#fornecedorCadastroContato').val();
    
    
    // ARMAZENA DADOS EM FORMATO JASON NA VARIAVEL DADOS //
    var dados = '{"fornecedorCadastrarQuemCadastrou":"'+fornecedorCadastrarQuemCadastrou+'",';
        dados+= '"fornecedorCadastrarCodigo":"'+fornecedorCadastrarCodigo+'",';
        dados+= '"fornecedorCadastrarRazaoSocial":"'+fornecedorCadastrarRazaoSocial+'",';
        dados+= '"fornecedorCadastrarCnpj":"'+fornecedorCadastrarCnpj+'",';
        dados+= '"fornecedorCadastroLogradouro":"'+fornecedorCadastroLogradouro+'",';
        dados+= '"fornecedorCadastrarComplemento":"'+fornecedorCadastrarComplemento+'",';
        dados+= '"fornecedorCadastrarNumero":"'+fornecedorCadastrarNumero+'",';
        dados+= '"fornecedorCadastroCep":"'+fornecedorCadastroCep+'",';
        dados+= '"fornecedorCadastroCidade":"'+fornecedorCadastroCidade+'",';
        dados+= '"fornecedorCadastroEstado":"'+fornecedorCadastroEstado+'",';
        dados+= '"fornecedorCadastrarFone":"'+fornecedorCadastrarFone+'",';
        dados+= '"fornecedorCadastraCelular":"'+fornecedorCadastraCelular+'",';
        dados+= '"fornecedorCadastraWhatsApp":"'+fornecedorCadastraWhatsApp+'",';
        dados+= '"fornecedorCadastrarEmail":"'+fornecedorCadastrarEmail+'",';
        dados+= '"fornecedorCadastroContato":"'+fornecedorCadastroContato+'"}';
        
        alert(dados);
    
    // INSTANCIA VARIAVEL PARA CONEXAO AJAX //
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      
        if(this.readyState == 4 && this.status == 200 ){
            
            if(this.responseText == "true"){
                
                // LIMPA DADOS FORMULARIO //
                document.getElementById('fornecedorCadastrarCodigo').value="";
                document.getElementById('fornecedorCadastrarRazaoSocial').value="";
                document.getElementById('fornecedorCadastrarCnpj').value="";
                document.getElementById('fornecedorCadastroLogradouro').value="";
                document.getElementById('fornecedorCadastrarComplemento').value="";
                document.getElementById('fornecedorCadastrarNumero').value="";
                document.getElementById('fornecedorCadastroCidade').value="";
                document.getElementById('fornecedorCadastroEstado').value="";
                document.getElementById('fornecedorCadastroCep').value="";
                document.getElementById('fornecedorCadastrarFone').value="";
                document.getElementById('fornecedorCadastraCelular').value="";
                document.getElementById('fornecedorCadastraWhatsApp').value="";
                document.getElementById('fornecedorCadastroContato').value="";
                document.getElementById('fornecedorCadastrarEmail').value="";
                // LIMPA DADOS FORMULARIO //
                
                
                notificacao('Cadastro de Fornecedores','Fornecedor '+ fornecedorCadastrarRazaoSocial + ' cadastrado com sucesso','success');
                
                
            }else if (this.responseText == "cadastrado") {
                notificacao('Cadastro de Fornecedores','!!! ATENÇÃO !!! Houve um erro ao tentar cadastrar o código  '+ fornecedorCadastrarCodigo + ', já está em uso, verifique os dados e tente novamente','warning');
        
            }else{
                notificacao('Cadastro de Fornecedores','!!! ATENÇÃO !!! Houve um erro ao tentar cadastrar o fornecedor '+ fornecedorCadastrarRazaoSocial + ', tente novamente mais tarde','error');
            }
                
        }
    };
    xhttp.open("GET","../ajax/ajax.php?gravarFornecedor=1&dados="+dados);
    xhttp.send();
    
    
}

function atualizarDadosFornecedor(){
    
    // PEGA VARIAVEIS DO FORMULARIO //
    var fornecedorCadastroId       = document.getElementById('fornecedorCadastroId').value;
    var fornecedorCadastrarCodigo       = document.getElementById('fornecedorCadastrarCodigo').value;
    var fornecedorCadastrarRazaoSocial  = document.getElementById('fornecedorCadastrarRazaoSocial').value;
    var fornecedorCadastrarCnpj       = document.getElementById('fornecedorCadastrarCnpj').value;
    var fornecedorCadastroLogradouro       = document.getElementById('fornecedorCadastroLogradouro').value;
    var fornecedorCadastrarComplemento       = document.getElementById('fornecedorCadastrarComplemento').value;
    var fornecedorCadastrarNumero       = document.getElementById('fornecedorCadastrarNumero').value;
    var fornecedorCadastroCidade       = document.getElementById('fornecedorCadastroCidade').value;
    var fornecedorCadastroEstado       = document.getElementById('fornecedorCadastroEstado').value;
    var fornecedorCadastroCep       = document.getElementById('fornecedorCadastroCep').value;
    var fornecedorCadastrarFone       = document.getElementById('fornecedorCadastrarFone').value;
    var fornecedorCadastraCelular       = document.getElementById('fornecedorCadastraCelular').value;
    var fornecedorCadastraWhatsApp       = document.getElementById('fornecedorCadastraWhatsApp').value;
    var fornecedorCadastroContato       = document.getElementById('fornecedorCadastroContato').value;
    var fornecedorCadastrarEmail       = document.getElementById('fornecedorCadastrarEmail').value;
    var fornecedorCadastrarQuemCadastrou       = document.getElementById('fornecedorCadastrarQuemCadastrou').value;
    // PEGA VARIAVEIS DO FORMULARIO //
    
    // CONCATENA VARIAVEIS PARA ENVIAR VIA AJAX //
    var dados = '{"fornecedorCadastroId":"'+fornecedorCadastroId+'",';
        dados+= '"fornecedorCadastrarCodigo":"'+fornecedorCadastrarCodigo+'",';
        dados+= '"fornecedorCadastrarRazaoSocial":"'+fornecedorCadastrarRazaoSocial+'",';
        dados+= '"fornecedorCadastrarCnpj":"'+fornecedorCadastrarCnpj+'",';
        dados+= '"fornecedorCadastroLogradouro":"'+fornecedorCadastroLogradouro+'",';
        dados+= '"fornecedorCadastrarComplemento":"'+fornecedorCadastrarComplemento+'",';
        dados+= '"fornecedorCadastrarNumero":"'+fornecedorCadastrarNumero+'",';
        dados+= '"fornecedorCadastroCidade":"'+fornecedorCadastroCidade+'",';
        dados+= '"fornecedorCadastroEstado":"'+fornecedorCadastroEstado+'",';
        dados+= '"fornecedorCadastroCep":"'+fornecedorCadastroCep+'",';
        dados+= '"fornecedorCadastrarFone":"'+fornecedorCadastrarFone+'",';
        dados+= '"fornecedorCadastroCidade":"'+fornecedorCadastroCidade+'",';
        dados+= '"fornecedorCadastraCelular":"'+fornecedorCadastraCelular+'",';
        dados+= '"fornecedorCadastraWhatsApp":"'+fornecedorCadastraWhatsApp+'",';
        dados+= '"fornecedorCadastroContato":"'+fornecedorCadastroContato+'",';
        dados+= '"fornecedorCadastrarEmail":"'+fornecedorCadastrarEmail+'",';
        dados+= '"fornecedorCadastrarQuemCadastrou":"'+fornecedorCadastrarQuemCadastrou+'"}';
    
    
    // INSTANCIA VARIAVEL PARA CONEXAO AJAX //
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      
        if(this.readyState == 4 && this.status == 200 ){
            
            if(this.responseText == "true"){
                               
                notificacao('Cadastro de Fornecedor','Dados atualizados com sucesso.','success');
                               
                
            }else{
                
                notificacao('Cadastro de Fornecedor','!!! ATENÇÃO !!! Houve uma falha ao tentar gravar aos dados.','error');
            }
                
        }
    };
    xhttp.open("GET","../ajax/ajax.php?atualizaDadosFornecedor=1&dados="+dados);
    xhttp.send();
    
    
}

function fornecedorGerenciarEditar(id){
    
   
    // INSTANCIA VARIAVEL PARA CONEXAO AJAX //
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      
        if(this.readyState == 4 && this.status == 200 ){
            var retorno = JSON.parse(this.responseText);
            
            // ALIMENTA FORMULARIO PARA ALTERACAO DE DADOS
            document.getElementById('fornecedorCadastrarCodigo').value=retorno.fornecedor_codigo;
            document.getElementById('fornecedorCadastroId').value=id;
            document.getElementById('fornecedorCadastrarRazaoSocial').value=retorno.fornecedor_descricao;
            document.getElementById('fornecedorCadastrarCnpj').value=retorno.fornecedor_cnpj;
            document.getElementById('fornecedorCadastroLogradouro').value=retorno.fornecedor_endereco_logradouro;
            document.getElementById('fornecedorCadastrarComplemento').value=retorno.fornecedor_endereco_complemento;
            document.getElementById('fornecedorCadastrarNumero').value=retorno.fornecedor_numero;
            document.getElementById('fornecedorCadastroCidade').value=retorno.fornecedor_cidade;
            document.getElementById('fornecedorCadastroEstado').value=retorno.fornecedor_estado;
            document.getElementById('fornecedorCadastroCep').value=retorno.fornecedor_cep;
            document.getElementById('fornecedorCadastrarFone').value=retorno.fornecedor_fone;
            document.getElementById('fornecedorCadastraCelular').value=retorno.fornecedor_celular;
            document.getElementById('fornecedorCadastraWhatsApp').innerHTML="<option>"+retorno.fornecedor_whatsapp+"</option>";
            document.getElementById('fornecedorCadastroContato').value=retorno.fornecedor_contato;
            document.getElementById('fornecedorCadastrarEmail').value=retorno.fornecedor_email;
            // ALIMENTA FORMULARIO PARA ALTERACAO DE DADOS
            
            // OCULTA TABELA EXIBICAO FORNECEDORES //
            $('#fornecedor-gerenciar-tabela-exibicao').hide(300);
            // OCULTA TABELA EXIBICAO FORNECEDORES //
            
            // EXIBE FORMULARIO ALTERAÇÃO DE DADOS //
            $('#fornecedor-gerenciar-editar-dados').show(300);
            // EXIBE FORMULARIO ALTERAÇÃO DE DADOS //
                
        }
    };
    xhttp.open("GET","../ajax/ajax.php?fornecedorGerenciarEditar=1&id="+id);
    xhttp.send();
}

function fornecedorDeletar(id,alteradoPor){
    
    
    if(confirm('!!! ATENÇÃO !!! VOCÊ TEM CERTEZA QUE DESEJA APAGAR ESTE FORNECEDOR ?')){
     
        window.location='../ajax/ajax.php?fornecedorDeletar=1&id='+id+'&alteradoPor='+alteradoPor;
    }
}

function cursoGravar(){
    
    // PEGA DADOS FORMULARIO
    var cursoCodigo = 1;
    var cursoCadastradoPor = $('#cursoCadastradoPor').val();
    var cursoNome = $('#cursoNome').val();
    var cursoPossuiReciclagem = $('#cursoPossuiReciclagem').val();
    var cursoCargaHorariaFormacao = $('#cursoCargaHorariaFormacao').val();
    var cursoCargaHorariaReciclagem = $('#cursoCargaHorariaReciclagem').val();
    var cursoReferencia = $('#cursoReferencia').val();
    var cursoValidadeTreinamento = $('#cursoValidadeTreinamento').val();
    var cursoFormacaoPossuiPratica = $('#cursoFormacaoPossuiPratica').val();
    var cursoReciclagemPossuiPratica = $('#cursoReciclagemPossuiPratica').val();
    var cursoConteudoProgramatico = $('#cursoConteudoProgramatico').val();
    var cursoProficiencia = $('#cursoProficiencia').val();
    
   
    //CONCATENA DADOS PARA ENVIO
    var dados='{"cursoCodigo":"1",';
        dados+='"cursoCadastradoPor":"'+cursoCadastradoPor+'",';
        dados+='"cursoNome":"'+cursoNome+'",';
        dados+='"cursoPossuiReciclagem":"'+cursoPossuiReciclagem+'",';
        dados+='"cursoCargaHorariaFormacao":"'+cursoCargaHorariaFormacao+'",';
        dados+='"cursoCargaHorariaReciclagem":"'+cursoCargaHorariaReciclagem+'",';
        dados+='"cursoReferencia":"'+cursoReferencia+'",';
        dados+='"cursoFormacaoPossuiPratica":"'+cursoFormacaoPossuiPratica+'",';
        dados+='"cursoReciclagemPossuiPratica":"'+cursoReciclagemPossuiPratica+'",';
        dados+='"cursoConteudoProgramatico":"'+cursoConteudoProgramatico+'",';
        dados+='"cursoProficiencia":"'+cursoProficiencia+'",';
        dados+='"cursoValidadeTreinamento":"'+cursoValidadeTreinamento+'"}';
        
  
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if( this.readyState == 4 && this.status == 200 ){
          
         if(this.responseText == "true"){
             
              // ZERA DADOS FORMULARIO //
                cursoNome = document.getElementById('cursoNome').value="";
                cursoCargaHorariaFormacao = document.getElementById('cursoCargaHorariaFormacao').value="";
                cursoCargaHorariaReciclagem = document.getElementById('cursoCargaHorariaReciclagem').value="";
                cursoValidadeTreinamento = document.getElementById('cursoValidadeTreinamento').value="";
                cursoValidadeTreinamento = document.getElementById('cursoProficiencia').value="";
                cursoValidadeTreinamento = document.getElementById('cursoConteudoProgramatico').value="";
                $("#cursoPossuiReciclagem option:contains(Selecione)").attr('selected', true);
                $("#cursoReferencia option:contains(Selecione)").attr('selected', true);
              // ZERA DADOS FORMULARIO //

              // EXIBE MENSAGEM DE SUCESSO AO USUARIO //
              notificacao('Cadastro de Treinamento ','Treinamento cadastrado com sucesso!!!','success');
                
              
          }else{
              notificacao('Cadastro de Treinamento ','!!! ATENÇÃO !!! Houve uma falha ao tentar gravar o treinamento','error');
          }
          
          
          
      }  
    };
    xhttp.open("GET","../ajax/ajax.php?cursoGravar=1&dados="+dados);
    xhttp.send();
}

function treinamentoDeletar(id,alteradoPor){
    
    var dados='{"id":'+id+',';
        dados+='"alteradoPor":'+alteradoPor+'}';
    
      
    if(confirm('!!! ATENÇÃO !!! DESEJA REALMENTE DELETAR ESTE TREINAMENTO ?')){
        
        window.location='../ajax/ajax.php?treinamentoDeletar=1&dados='+dados;
        
    }
    
}

function treinamentoGerenciarEditar(codigo,alteradoPor){
    
    //CONCATENA DADOS PARA ENVIAR//
    var dados = '{"codigo":'+codigo+',';
        dados+='"alteradoPor":'+alteradoPor+'}';
    
    // INSTANCIA XHHTP PARA AJAX //
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200 ){
          
          var retorno = JSON.parse(this.responseText);
          
          $('#cursoNome').val()=retorno.treinamento_descricao;
          $("#cursoPossuiReciclagem option:contains("+retorno.treinamento_reciclagem+")").attr('selected', true);
          $('#cursoCargaHorariaFormacao').val()=retorno.treinamento_carga_horaria_formacao;
          $('#cursoCargaHorariaReciclagem').val()=retorno.treinamento_carga_horaria_reciclagem;
          $("#cursoReferencia option:contains("+retorno.treinamento_referencia_descricao+")").attr('selected', true);
          $('#cursoValidadeTreinamento').val()=retorno.treinamento_validade;
          
      }  
    };
    xhttp.open("GET","../ajax/ajax.php?treinamentoGerenciarEditar=1&dados="+dados);
    xhttp.send();
}

function cursoGravarAtualizar(){
    
    // PEGA DADOS FORMULARIO
    var cursoCodigo = $('#cursoCodigo').val();
    var cursoCadastradoPor = $('#cursoCadastradoPor').val();
    var cursoNome = $('#cursoNome').val();
    var cursoPossuiReciclagem = $('#cursoPossuiReciclagem').val();
    var cursoCargaHorariaFormacao = $('#cursoCargaHorariaFormacao').val();
    var cursoCargaHorariaReciclagem = $('#cursoCargaHorariaReciclagem').val();
    var cursoReferencia = $('#cursoReferencia').val();
    var cursoFormacaoPossuiPratica = $('#cursoFormacaoPossuiPratica').val();
    var cursoReciclagemPossuiPratica = $('#cursoReciclagemPossuiPratica').val();
    var cursoConteudoProgramatico = $('#cursoConteudoProgramatico').val();
    var cursoValidadeTreinamento = $('#cursoValidadeTreinamento').val();
    var cursoProficiencia = $('#cursoProficiencia').val();
    
   
    //CONCATENA DADOS PARA ENVIO
    var dados='{"cursoCodigo":"'+cursoCodigo+'",';
        dados+='"cursoCadastradoPor":"'+cursoCadastradoPor+'",';
        dados+='"cursoNome":"'+cursoNome+'",';
        dados+='"cursoPossuiReciclagem":"'+cursoPossuiReciclagem+'",';
        dados+='"cursoCargaHorariaFormacao":"'+cursoCargaHorariaFormacao+'",';
        dados+='"cursoCargaHorariaReciclagem":"'+cursoCargaHorariaReciclagem+'",';
        dados+='"cursoReferencia":"'+cursoReferencia+'",';
        dados+='"cursoFormacaoPossuiPratica":"'+cursoFormacaoPossuiPratica+'",';
        dados+='"cursoReciclagemPossuiPratica":"'+cursoReciclagemPossuiPratica+'",';
        dados+='"cursoConteudoProgramatico":"'+cursoConteudoProgramatico+'",';
        dados+='"cursoProficiencia":"'+cursoProficiencia+'",';
        dados+='"cursoValidadeTreinamento":"'+cursoValidadeTreinamento+'"}';
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if( this.readyState == 4 && this.status == 200 ){
          
          if( this.responseText == "true"){
              
              // EXIBE MENSAGEM DE SUCESSO AO USUARIO //
              notificacao('Gerenciamento Curso' , 'Dados atualizados com sucesso.','success');
                
              
          }else{
              notificacao('Gerenciamento Curso','!!! ATENÇÃO !!! Houve uma falha ao tentar gravar os dados, por favor tente novamente.','error');
           
          }
          
          
          
      }  
    };
    xhttp.open("GET","../ajax/ajax.php?cursoGravarAtualizar=1&dados="+dados);
    xhttp.send();
}

//Funçao Alexandre###### 



function usuarioEditarGravar(){
      var pessoal_id = document.getElementById('pessoal_id').value;
    var estabelecimentoCod =  document.getElementById('estabelecimentoCod').value;
    var estabelecimentoNome = document.getElementById('estabelecimentoNome').value;
    var Matricula = document.getElementById('Matricula').value;
    var Nome = document.getElementById('Nome').value;
    var Data_admissao = document.getElementById('Data_admissao').value;
    var Data_nascimento = document.getElementById('Data_nascimento').value;
    var Cargo_codigo = document.getElementById('Cargo_codigo').value;
    var Cargo_nome = document.getElementById('Cargo_nome').value;
    var Codigo = document.getElementById('Codigo').value;
    var Funcao_nome = document.getElementById('Funcao_nome').value;
    var Centro_resultado_codigo = document.getElementById('Centro_resultado_codigo').value;
    var Centro_resultado_nome = document.getElementById('Centro_resultado_nome').value;
    var Atividade_periculosa = document.getElementById('Atividade_periculosa').value;
    var Numero_horas = document.getElementById('Numero_horas').value;
    var Sindicato_codigo = document.getElementById('Sindicato_codigo').value;
    var Sindicato_razaosocial = document.getElementById('Sindicato_razaosocial').value;
    var Sexo = document.getElementById('Sexo').value;
    var Grau_instrucao_nome = document.getElementById('Grau_instrucao_nome').value;
    var Deficiente = document.getElementById('Deficiente').value;
    var CPF = document.getElementById('CPF').value;
    var Chefia_imediata_matricula = document.getElementById('Chefia_imediata_matricula').value;
    var Chefia_imediata_nome = document.getElementById('Chefia_imediata_nome').value;
    var Email = document.getElementById('Email').value;
    var CTPS_numero = document.getElementById('CTPS_numero').value;
    var CTPS_serie = document.getElementById('CTPS_serie').value;
    var PIS = document.getElementById('PIS').value;
    var Identidade = document.getElementById('Identidade').value;
    var Situacao = document.getElementById('Situacao').value;
    var RUT = document.getElementById('RUT').value;
  
    
    //Concatenar valores
     var dados = "";
     dados = dados.concat(pessoal_id,",");
    dados = dados.concat(estabelecimentoCod,",");
    dados = dados.concat(estabelecimentoNome,",");
    dados = dados.concat(Matricula,",");
    dados = dados.concat(Nome,",");
    dados = dados.concat(Data_admissao,",");
    dados = dados.concat(Data_nascimento,",");
    dados = dados.concat(Cargo_codigo,",");
    dados = dados.concat(Cargo_nome,",");
    dados = dados.concat(Codigo,",");
    dados = dados.concat(Funcao_nome,",");
    dados = dados.concat(Centro_resultado_codigo,",");
    dados = dados.concat(Centro_resultado_nome,",");
    dados = dados.concat(Atividade_periculosa,",");
    dados = dados.concat(Numero_horas,",");
    dados = dados.concat(Sindicato_codigo,",");
    dados = dados.concat(Sindicato_razaosocial,",");
    dados = dados.concat(Sexo,",");
    dados = dados.concat(Grau_instrucao_nome,",");
    dados = dados.concat(Deficiente,",");
    dados = dados.concat(CPF,",");
    dados = dados.concat(Chefia_imediata_matricula,",");
    dados = dados.concat(Chefia_imediata_nome,",");
    dados = dados.concat(Email,",");
    dados = dados.concat(CTPS_numero,",");
    dados = dados.concat(CTPS_serie,",");
    dados = dados.concat(PIS,",");
    dados = dados.concat(Identidade,",");
    dados = dados.concat(Situacao,",");
    dados = dados.concat(RUT);
    
    
     
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if( this.readyState == 4 && this.status == 200 ){
if(this.responseText == 'true') {
    alert(xhttp.responseText);
 
//    notificacao('top', 'right', 'success', 'Usuario '+Nome+' gravado com sucesso!', 400, 'ti-face-smile');
}else{
   
// notificacao('top', 'right', 'warning', '!!! ATENÇÃO !!! Houve uma falha ao tentar gravar os dados do usuário '+Nome+', verifique os dados digitados e tente novamente!', 400, 'ti-face-sad');
            
                }
            }
        };
        xhttp.open("GET","../ajax/ajax.php?alterarUsuarioGravar=1&id="+dados);
        xhttp.send();
}

function treinamentosEditarGravar(){
    var treinamentos_matricula = document.getElementById('treinamentos_matricula').value;
    var treinamentos_nome = document.getElementById('treinamentos_nome').value;
    var treinamentos_admissao = document.getElementById('treinamentos_admissao').value;
    var treinamentos_desc_funcao = document.getElementById('treinamentos_desc_funcao').value;
    var treinamentos_turno = document.getElementById('treinamentos_turno').value;
    var treinamentos_cc = document.getElementById('treinamentos_cc').value;
    var treinamentos_centro_custo = document.getElementById('treinamentos_centro_custo').value;
    var treinamentos_gerencia = document.getElementById('treinamentos_gerencia').value;
    var treinamentos_responsavel = document.getElementById('treinamentos_responsavel').value;
    var treinamentos_desc_curso = document.getElementById('treinamentos_desc_curso').value;
    var treinamentos_horas = document.getElementById('treinamentos_horas').value;
    var treinamentos_data_inicio = document.getElementById('treinamentos_data_inicio').value;
    var treinamentos_emissao_conclusao = document.getElementById('treinamentos_emissao_conclusao').value;
    var treinamentos_fornecedor = document.getElementById('treinamentos_fornecedor').value;
    var treinamentos_cpf = document.getElementById('treinamentos_cpf').value;
    var treinamentos_rg = document.getElementById('treinamentos_rg').value;
    var treinamentos_validade = document.getElementById('treinamentos_validade').value;
    var treinamentos_status = document.getElementById('treinamentos_status').value;
    var treinamentos_referencia = document.getElementById('treinamentos_referencia').value;
    var treinamentos_onda = document.getElementById('treinamentos_onda').value;
    var treinamentos_atividade_especial = document.getElementById('treinamentos_atividade_especial').value;
    var treinamentos_externo_interno = document.getElementById('treinamentos_externo_interno').value;
    var treinamentos_necessario = document.getElementById('treinamentos_necessario').value;
    var treinamentos_justificar = document.getElementById('treinamentos_justificar').value;
    var treinamentos_obs = document.getElementById('treinamentos_obs').value;
    var treinamentos_id = document.getElementById('treinamentos_id').value;
    
    //Concatenar
    var dados = "";
      dados = dados.concat(treinamentos_matricula,",");
      dados = dados.concat(treinamentos_nome,",");
      dados = dados.concat(treinamentos_admissao,",");
      dados = dados.concat(treinamentos_desc_funcao,",");
      dados = dados.concat(treinamentos_turno,",");
      dados = dados.concat(treinamentos_cc,",");
      dados = dados.concat(treinamentos_centro_custo,",");
      dados = dados.concat(treinamentos_gerencia,",");
      dados = dados.concat(treinamentos_responsavel,",");
      dados = dados.concat(treinamentos_desc_curso,",");
      dados = dados.concat(treinamentos_horas,",");
      dados = dados.concat(treinamentos_data_inicio,",");
      dados = dados.concat(treinamentos_emissao_conclusao,",");
      dados = dados.concat(treinamentos_fornecedor,",");
      dados = dados.concat(treinamentos_cpf,",");
      dados = dados.concat(treinamentos_rg,",");
      dados = dados.concat(treinamentos_validade,",");
      dados = dados.concat(treinamentos_status,",");
      dados = dados.concat(treinamentos_referencia,",");
      dados = dados.concat(treinamentos_onda,",");
      dados = dados.concat(treinamentos_atividade_especial,",");
      dados = dados.concat(treinamentos_externo_interno,",");
      dados = dados.concat(treinamentos_necessario,",");
      dados = dados.concat(treinamentos_justificar,",");
      dados = dados.concat(treinamentos_obs,",");
      dados = dados.concat(treinamentos_id);
    
    //Início do Ajax
 var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if( this.readyState == 4 && this.status == 200 ){
                
                if(this.responseText == 'true') {
                
                }else{
                
                }
            }
        };
        xhttp.open("GET","../ajax/ajax.php?treinamentosEditarGravar1=1&id="+dados);
        xhttp.send();
}











//Fim Funçao Alexandre
