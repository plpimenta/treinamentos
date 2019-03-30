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
    var dados = "";
    dados = dados.concat(fornecedorCadastrarCodigo,";");
    dados = dados.concat(fornecedorCadastrarRazaoSocial,";");
    dados = dados.concat(fornecedorCadastrarCnpj,";");
    dados = dados.concat(fornecedorCadastroLogradouro,";");
    dados = dados.concat(fornecedorCadastrarComplemento,";");
    dados = dados.concat(fornecedorCadastrarNumero,";");
    dados = dados.concat(fornecedorCadastroCidade,";");
    dados = dados.concat(fornecedorCadastroEstado,";");
    dados = dados.concat(fornecedorCadastroCep,";");
    dados = dados.concat(fornecedorCadastrarFone,";");
    dados = dados.concat(fornecedorCadastraCelular,";");
    dados = dados.concat(fornecedorCadastraWhatsApp,";");
    dados = dados.concat(fornecedorCadastroContato,";");
    dados = dados.concat(fornecedorCadastrarEmail,";");
    dados = dados.concat(fornecedorCadastrarQuemCadastrou);
    // CONCATENA VARIAVEIS PARA ENVIAR VIA AJAX //
    
    
    // INSTANCIA VARIAVEL PARA CONEXAO AJAX //
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      
        if(this.readyState == 4 && this.status == 200 ){
            
            if(this.responseText){
                
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
                
                
                notificacao('top', 'right', 'success', 'Fornecedor '+fornecedorCadastrarRazaoSocial+' gravado com sucesso!', 400, 'ti-face-smile');
                
                
            }else{
                notificacao('top', 'right', 'warning', '!!! ATENÇÃO !!! Houve uma falha ao tentar gravar o Fornecedor '+fornecedorCadastrarRazaoSocial+', verifique os dados digitados e tente novamente!', 400, 'ti-face-sad');
            }
                
        }
    };
    xhttp.open("GET","../ajax/ajax.php?gravarFornecedor=1&dados="+dados);
    xhttp.send();
    
    
}

function atualizarDadosFornecedor(){
    
    // PEGA VARIAVEIS DO FORMULARIO //
    var fornecedorCadastroId       = document.getElementById('fornecedorCadastroId').value;
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
    var dados = "";
    dados = dados.concat(fornecedorCadastroId,";");
    dados = dados.concat(fornecedorCadastrarRazaoSocial,";");
    dados = dados.concat(fornecedorCadastrarCnpj,";");
    dados = dados.concat(fornecedorCadastroLogradouro,";");
    dados = dados.concat(fornecedorCadastrarComplemento,";");
    dados = dados.concat(fornecedorCadastrarNumero,";");
    dados = dados.concat(fornecedorCadastroCidade,";");
    dados = dados.concat(fornecedorCadastroEstado,";");
    dados = dados.concat(fornecedorCadastroCep,";");
    dados = dados.concat(fornecedorCadastrarFone,";");
    dados = dados.concat(fornecedorCadastraCelular,";");
    dados = dados.concat(fornecedorCadastraWhatsApp,";");
    dados = dados.concat(fornecedorCadastroContato,";");
    dados = dados.concat(fornecedorCadastrarEmail,";");
    dados = dados.concat(fornecedorCadastrarQuemCadastrou);
    // CONCATENA VARIAVEIS PARA ENVIAR VIA AJAX //
    
    
    // INSTANCIA VARIAVEL PARA CONEXAO AJAX //
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      
        if(this.readyState == 4 && this.status == 200 ){
            
            if(this.responseText){
                               
                notificacao('top', 'right', 'success', 'Fornecedor '+fornecedorCadastrarRazaoSocial+' gravado com sucesso!', 400, 'ti-face-smile');
                
                var retorno = JSON.parse(this.responseText);
                
                // ALIMENTA FORMULARIO PARA ALTERACAO DE DADOS
                document.getElementById('fornecedorCadastrarCodigo').value=retorno.fornecedor_codigo;
                document.getElementById('fornecedorCadastroId').value=fornecedorCadastroId;
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
                
                
            }else{
                notificacao('top', 'right', 'warning', '!!! ATENÇÃO !!! Houve uma falha ao tentar gravar o Fornecedor '+fornecedorCadastrarRazaoSocial+', verifique os dados digitados e tente novamente!', 400, 'ti-face-sad');
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

function fornecedorDeletar(id){
    
    
    if(confirm('!!! ATENÇÃO !!! VOCÊ TEM CERTEZA QUE DESEJA APAGAR ESTE FORNECEDOR ?')){
     
        // INSTANCIA XHTTP PARA AJAX //
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200 ){
              
                if(this.responseText == "false"){
                  
                      notificacao('top', 'right', 'warning', '!!! ATENÇÃO !!! Houve uma falha ao tentar deletar o Fornecedor, verifique os dados digitados e tente novamente!', 400, 'ti-face-sad');
              
                }else{
               
                     // MENSAGEM DE NOTIFICAÇÃO PARA O USUARIO //
                      notificacao('top', 'right', 'success', 'Fornecedor deletado com sucesso!', 400, 'ti-face-smile');
                      
                      
                }
          }  
        };
        xhttp.open("GET","../ajax/ajax.php?fornecedorDeletar=1&id="+id);
        xhttp.send();
        
    }
}

function cursoGravar(){
    
    // PEGA DADOS FORMULARIO
    var cursoCodigo = 1;
    var cursoNome = $('#cursoNome').val();
    var cursoInstrutorOrigem = $('#cursoInstrutorOrigem').val();
    var cursoCargaHorariaFormacao = $('#cursoCargaHorariaFormacao').val();
    var cursoCargaHorariaReciclagem = $('#cursoCargaHorariaReciclagem').val();
    var cursoValidadeTreinamento = $('#cursoValidadeTreinamento').val();
    var cursoPossuiReciclagem = $('#cursoPossuiReciclagem').val();
    var cursoCadastradoPor = $('#cursoCadastradoPor').val();
    
    
    
    
    
    // PEGA DADOS FORMULARIO
    
    //CONCATENA DADOS PARA ENVIO
    var dados="";
    dados = dados.concat(cursoCodigo,";");
    dados = dados.concat(cursoNome,";");
    dados = dados.concat(cursoInstrutorOrigem,";");
    dados = dados.concat(cursoCargaHorariaFormacao,";");
    dados = dados.concat(cursoCargaHorariaReciclagem,";");
    dados = dados.concat(cursoValidadeTreinamento,";");
    dados = dados.concat(cursoInstrutorExterno,";");
    dados = dados.concat(cursoInstrutorInterno,";");
    dados = dados.concat(cursoPossuiReciclagem,";");
    dados = dados.concat(cursoCadastradoPor);
    //CONCATENA DADOS PARA ENVIO
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if( this.readyState == 4 && this.status == 200 ){
          
         if(this.responseText == "true"){
              // ZERA DADOS FORMULARIO //
                cursoNome = document.getElementById('cursoNome').value="";
                cursoCargaHorariaFormacao = document.getElementById('cursoCargaHorariaFormacao').value="";
                cursoCargaHorariaReciclagem = document.getElementById('cursoCargaHorariaReciclagem').value="";
                cursoValidadeTreinamento = document.getElementById('cursoValidadeTreinamento').value="";
              // ZERA DADOS FORMULARIO //

              // EXIBE MENSAGEM DE SUCESSO AO USUARIO //
              notificacao('top', 'right', 'success', 'Curso '+cursoNome+' gravado com sucesso!', 400, 'ti-face-smile');
                
              
          }else{
              notificacao('top', 'right', 'warning', '!!! ATENÇÃO !!! Houve uma falha ao tentar gravar o curso '+cursoNome+', verifique os dados digitados e tente novamente!', 400, 'ti-face-sad');
           
          }
          
          
          
      }  
    };
    xhttp.open("GET","../ajax/ajax.php?cursoGravar=1&dados="+dados);
    xhttp.send();
}

function treinamentoDeletar(id,alteradoPor){
    
    var dados="";
    dados=dados.concat(id,";");
    dados=dados.concat(alteradoPor);
    
    
    if(confirm('!!! ATENÇÃO !!! DESEJA REALMENTE DELETAR ESTE TREINAMENTO ?')){
        
        // INSTANCIA XHTTP PARA AJAX //
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200 ){
              
                if(this.responseText == "false"){
                  
                      notificacao('top', 'right', 'warning', '!!! ATENÇÃO !!! Houve uma falha ao tentar deletar o Treinamento, verifique os dados digitados e tente novamente!', 400, 'ti-face-sad');
              
                }else{
               
                      // MENSAGEM DE NOTIFICAÇÃO PARA O USUARIO //
                      notificacao('top', 'right', 'success', 'Treinamento deletado com sucesso!', 400, 'ti-face-smile');
                      
                      treinamentoGerenciarListar(alteradoPor);
                }
          }  
        };
        xhttp.open("GET","../ajax/ajax.php?treinamentoDeletar=1&dados="+dados);
        xhttp.send();
        
    }
    
}

function treinamentoGerenciarEditar(id,alteradoPor){
    
    //CONCATENA DADOS PARA ENVIAR//
    var dados = "";
    dados = dados.concat(id,";");
    dados = dados.concat(alteradoPor);
    
    
    // INSTANCIA XHHTP PARA AJAX //
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if(this.readyState == 4 && this.status == 200 ){
          
          // OCULTA LISTA DE TREINAMENTOS
          $('#treinamento-gerenciar-painel-lista').hide(300);
          $('#treinamento-gerenciar-painel-container-edicao').show(300);
          
          document.getElementById('treinamento-gerenciar-painel-edicao').innerHTML=this.responseText;
      }  
    };
    xhttp.open("GET","../ajax/ajax.php?treinamentoGerenciarEditar=1&dados="+dados);
    xhttp.send();
}

function treinamentoEditarGravar(){
    // PEGA DADOS FORMULARIO
    var cursoCodigo = 1;
    var cursoNome = document.getElementById('cursoNome').value;
    var cursoInstrutorOrigem = document.getElementById('cursoInstrutorOrigem').value;
    var cursoCargaHorariaFormacao = document.getElementById('cursoCargaHorariaFormacao').value;
    var cursoCargaHorariaReciclagem = document.getElementById('cursoCargaHorariaReciclagem').value;
    var cursoValidadeTreinamento = document.getElementById('cursoValidadeTreinamento').value;
    var cursoInstrutorExterno = document.getElementById('cursoInstrutorExterno').value;
    var cursoInstrutorInterno = document.getElementById('cursoInstrutorInterno').value;
    var cursoPossuiReciclagem = document.getElementById('cursoPossuiReciclagem').value;
    var cursoCadastradoPor = document.getElementById('cursoCadastradoPor').value;
    var cursoCadastradoId = document.getElementById('cursoCadastradoId').value;
    
    
    
    
    // PEGA DADOS FORMULARIO
    
    //CONCATENA DADOS PARA ENVIO
    var dados="";
    dados = dados.concat(cursoCodigo,";");
    dados = dados.concat(cursoNome,";");
    dados = dados.concat(cursoInstrutorOrigem,";");
    dados = dados.concat(cursoCargaHorariaFormacao,";");
    dados = dados.concat(cursoCargaHorariaReciclagem,";");
    dados = dados.concat(cursoValidadeTreinamento,";");
    dados = dados.concat(cursoInstrutorExterno,";");
    dados = dados.concat(cursoInstrutorInterno,";");
    dados = dados.concat(cursoPossuiReciclagem,";");
    dados = dados.concat(cursoCadastradoPor,";");
    dados = dados.concat(cursoCadastradoId);
    //CONCATENA DADOS PARA ENVIO
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
      if( this.readyState == 4 && this.status == 200 ){
          
          if( this.responseText == "true"){
              
              // EXIBE DADOS ATUALIZADOS PARA CLIENTE
              treinamentoGerenciarEditar(cursoCadastradoId,cursoCadastradoPor);
              
              // EXIBE MENSAGEM DE SUCESSO AO USUARIO //
              notificacao('top', 'right', 'success', 'Curso '+cursoNome+' gravado com sucesso!', 400, 'ti-face-smile');
                
              
          }else{
              notificacao('top', 'right', 'warning', '!!! ATENÇÃO !!! Houve uma falha ao tentar gravar o curso '+cursoNome+', verifique os dados digitados e tente novamente!', 400, 'ti-face-sad');
           
          }
          
          
          
      }  
    };
    xhttp.open("GET","../ajax/ajax.php?treinamentoEditarGravar=1&dados="+dados);
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
//    notificacao('top', 'right', 'success', 'Treinamento '+treinamentos_nome+' gravado com sucesso!', 400, 'ti-face-smile');
//                  alert(xhttp.responseText); 
}else{
// notificacao('top', 'right', 'warning', '!!! ATENÇÃO !!! Houve uma falha ao tentar gravar os dados do Treinamento '+treinamentos_nome+', verifique os dados digitados e tente novamente!', 400, 'ti-face-sad');
              
                }
            }
        };
        xhttp.open("GET","../ajax/ajax.php?treinamentosEditarGravar1=1&id="+dados);
        xhttp.send();
}
    
    
    
    







//Fim Funçao Alexandre
