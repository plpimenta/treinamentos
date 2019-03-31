
function exibirContainerTreinamentosAdicionar(){
    $('#container-treinamentos-adicionar').show(300);
    subMenuCadastro(0);
}
function ocultarContainerTreinamentosAdicionar(){
    $('#container-treinamentos-adicionar').hide(300);
}
function exibirContainerTreinamentosGerenciar(){
    $('#container-treinamentos-gerenciar').show(300);
}
function ocultarContainerTreinamentosGerenciar(){
    $('#container-treinamentos-gerenciar').hide(300);
}

function ocultarContainerTreinamentosGraficosGerais(){
    $('#treinamentos-graficos-gerais').hide(300);
    exibirContainerTreinamentosGerenciar();
}
function exibirContainerTreinamentosGraficosGerais(){
    ocultarContainerTreinamentosGerenciar();
    ocultarContainerTreinamentosGraficosPorTreinamento
    $('#treinamentos-graficos-gerais').show(300);
}

function ocultarContainerTreinamentosGraficosPorTreinamento(){
    $('#treinamentos-graficos-por-treinamento').hide(300);
    exibirContainerTreinamentosGerenciar();
    
}
function exibirContainerTreinamentosGraficosPorTreinamento(){
     ocultarContainerTreinamentosGerenciar();
    $('#treinamentos-graficos-por-treinamento').show(300);
}

function ocultarContainerTreinamentosEditar(){
    $('#container-treinamentos-editar').hide(300);
    exibirContainerTreinamentosGerenciar();
}
function exibirContainerTreinamentosEditar(){
    $('#container-treinamentos-editar').show(300);
    
}

function atualizarDadosFornecedorVoltar(){
    $('#fornecedor-gerenciar-editar-dados').hide(300);
    $('#fornecedor-gerenciar-tabela-exibicao').show(300);
}

function cursoInserirExibeInstrutorOrigem(){
    
    // VERIFICA VALOR SELELCIONADO PELO USUARIO //
    var origemInstrutor = document.getElementById('cursoInstrutorOrigem').value;
    
    if(origemInstrutor == "Interno"){
        $('#cursoInstrutorExternoContainer').hide(300);
        $('#cursoInstrutorInternoContainer').show(300);
        
    }else if(origemInstrutor == "Externo"){
        
        $('#cursoInstrutorInternoContainer').hide(300);
        $('#cursoInstrutorExternoContainer').show(300);
        
    }
}

function cursoInserirExibeFornecedor(){
    var cursoPossuiReciclagem = document.getElementById('cursoPossuiReciclagem').value;
    
    alert('valor selecionado e ' + cursoPossuiReciclagem);
}



//funcoes jquery
function cursoInserirExibeReciclagem(){
    
    var reciclagem = document.getElementById('cursoPossuiReciclagem').value;
    
    
    if( reciclagem == 1){
        $('#cursoCargaHorariaReciclagemExibir').show(300);
    }else{
        $('#cursoCargaHorariaReciclagemExibir').hide(300);
    }
        
}

//FUNCAO CRIADA PARA TESTE E MODELO DE EMBASAMENTO
function gravar(){
        
        var valor1 = document.getElementById('form1').value;
        var valor2 = document.getElementById('form2').value;
        var valor3 = document.getElementById('form3').value;
        
        var dados="";
        dados = dados.concat(valor1,",");
        dados = dados.concat(valor2,",");
        dados = dados.concat(valor3);
        
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
          if( this.readyState == 4 && this.status == 200 ){
             document.getElementById('gravar-aqui').innerHTML='<a href="http://www.techmove.net">'+this.responseText+'</a>';
          }  
        };
        xhttp.open("GET","../ajax/ajax.php?gravar=1&dados="+dados);
        xhttp.send();
       
    }
//FUNCAO CRIADA PARA TESTE E MODELO DE EMBASAMENTO
    
function treinamentoEditarVoltar(alteradoPor){
  
  
  treinamentoGerenciarListar(alteradoPor);
  $('#treinamento-gerenciar-painel-container-edicao').hide(300);
  $('#treinamento-gerenciar-painel-lista').show(300);
  
}
        
function treinamentoGerenciarListar(alteradoPor){
    
    // INSTANCIA XHTTP PARA AJAX //
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200 ){
            document.getElementById('treinamentos-gerenciar-container-dados').innerHTML=this.responseText;
            chamaDataTable ();
        }
    };
    xhttp.open("GET","../ajax/ajax.php?treinamentoGerenciarListar=1&alteradoPor="+alteradoPor);
    xhttp.send();
}
function chamaDataTable (){
        $().DataTable();
}

function exibirLogout(){
    $('#formata-link-sair').show(300);
}
function ocultarLogout(){
    $('#formata-link-sair').hide(300);
}

// #################### Alexandre Santos #####################


    function exibirTabelaUsuario(){
   $('#tabelaExibirUsuarios').show(300);
        
    }
    function exibirEditarTabelaUsuario(){
   $('#editarUsu').show(300);
        $('#tabelaExibirUsuarios').hide(300);
    }
    
    function fecharEditarUsuario(){
   $('#editarUsu').hide(300);
    exibirTabelaUsuario();
   }
   // DIVS TREINAMENTOS HISTORICO
   function exibirTabelaTreinamentosHist(){
       $('#editarHistoricoTabela').show(300);
   }
   
   function exibirEditarTreinamentoHist(){
       $('#editarHistoricoTabela').show(300);
       $('#tabelaExibirTreinamentosHist').hide(300);
   }
   
  function fecharTabelaTreinamentosHist(){
      $('#tabelaExibirTreinamentosHist').hide(300);
      exibirTabelaTreinamentosHist();
  }
  

function pessoalHistorico(id){
   exibirEditarTabelaUsuario();
    // INSTANCIA XHTTP PARA AJAX //
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200 ){
            document.getElementById("resultadoEditar").innerHTML = this.responseText;
// alert(xhttp.responseText);
        }
    };
    xhttp.open("GET","../ajax/ajax.php?pessoalHistEditar=1&id="+id);
    xhttp.send();
}





function treinamentosHistorico(id){////    exibirEditarTreinamentoHist();
    fecharTabelaTreinamentosHist();
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("resultadoTreinamentosHist").innerHTML = this.responseText;
        alert(xhttp.responseText);
        }
    };
    xhttp.open("GET","../ajax/ajax.php?treinamentosHistorico=1&id="+id);
    xhttp.send();
    
}

