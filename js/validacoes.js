function validaFornecedorJaCadastrado(){
    //FUNCAO PARA VALIDAR SE FORNECEDOR COM O CODIGO INFORMADO JÁ CONSTA NA BASE //
    
    var fornecedorCadastrarCnpj = document.getElementById('fornecedorCadastrarCnpj').value;
    
    // TRATA A VARIAVEL PARA TESTE //
    fornecedorCadastrarCnpj = fornecedorCadastrarCnpj.replace(".","");
    fornecedorCadastrarCnpj = fornecedorCadastrarCnpj.replace("/","");
    fornecedorCadastrarCnpj = fornecedorCadastrarCnpj.replace("-","");
    
     if(fornecedorCadastrarCnpj > 0 ){
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if( this.readyState == 4 && this.status == 200 ){
                
                if( this.responseText == "true"){
                    notificacao('top', 'right', 'warning', '!!! ATENÇÃO !!! Este CNPJ já está em uso, por favor verifique os dados do fornecedor em questão.', 600, 'ti-info-alt');
                    document.getElementById('fornecedorCadastrarGravar').disabled=true;
                }else{
                    notificacao('top', 'right', 'success', 'Códico cliente disponível. O cadastro ocorrerá normalmente', 600, 'ti-face-smile');
                    document.getElementById('fornecedorCadastrarGravar').disabled=false;
                }
                    
            }
        };
    }
    xhttp.open("GET","../ajax/ajax.php?validaFornecedorJaCadastrado=1&fornecedorCadastrarCnpj="+fornecedorCadastrarCnpj);
    xhttp.send();
    
}
function validaFornecedorJaCadastrado(){
    //FUNCAO PARA VALIDAR SE FORNECEDOR COM O CODIGO INFORMADO JÁ CONSTA NA BASE //
    
    var fornecedorCadastrarCnpj = document.getElementById('fornecedorCadastrarCnpj').value;
    
    // TRATA A VARIAVEL PARA TESTE //
    fornecedorCadastrarCnpj = fornecedorCadastrarCnpj.replace(".","");
    fornecedorCadastrarCnpj = fornecedorCadastrarCnpj.replace("/","");
    fornecedorCadastrarCnpj = fornecedorCadastrarCnpj.replace("-","");
    
     if(fornecedorCadastrarCnpj > 0 ){
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if( this.readyState == 4 && this.status == 200 ){
                
                if( this.responseText == "true"){
                    notificacao('top', 'right', 'warning', '!!! ATENÇÃO !!! Este CNPJ já está em uso, por favor verifique os dados do fornecedor em questão.', 600, 'ti-info-alt');
                    document.getElementById('fornecedorCadastrarGravar').disabled=true;
                }else{
                    notificacao('top', 'right', 'success', 'Códico cliente disponível. O cadastro ocorrerá normalmente', 600, 'ti-face-smile');
                    document.getElementById('fornecedorCadastrarGravar').disabled=false;
                }
                    
            }
        };
    }
    xhttp.open("GET","../ajax/ajax.php?validaFornecedorJaCadastrado=1&fornecedorCadastrarCnpj="+fornecedorCadastrarCnpj);
    xhttp.send();
    
}
function validaCursoJaCadastrado(){
    //FUNCAO PARA VALIDAR SE FORNECEDOR COM O CODIGO INFORMADO JÁ CONSTA NA BASE //
    
    var cursoCodigo = document.getElementById('cursoCodigo').value;
    
    
     if(cursoCodigo > 0 ){
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if( this.readyState == 4 && this.status == 200 ){
                
                if( this.responseText == "true"){
                    notificacao('top', 'right', 'warning', '!!! ATENÇÃO !!! Já existe um curso cadastrado com este código.', 600, 'ti-info-alt');
                    document.getElementById('cursoGravarBtn').disabled=true;
                }else{
                    notificacao('top', 'right', 'success', 'Códico curso disponível. O cadastro ocorrerá normalmente', 600, 'ti-face-smile');
                    document.getElementById('cursoGravarBtn').disabled=false;
                }
                    
            }
        };
    }
    xhttp.open("GET","../ajax/ajax.php?validaCursoJaCadastrado=1&cursoCodigo="+cursoCodigo);
    xhttp.send();
    
}