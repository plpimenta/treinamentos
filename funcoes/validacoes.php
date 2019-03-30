<?php

function validaFornecedorCadastrado($conn,$fornecedorCodigo){
    
    try{
        $valida=$conn->prepare('SELECT fornecedor_id FROM fornecedores WHERE fornecedor_id = :id');
        $valida->bindValue(":id",$fornecedorCodigo);
        $valida->execute();
        
        
    } catch (Exception $ex) {
        
    }
    
    if($valida->rowcount() == 0 ){
        $status=false;
    }else{
        $status=true;
    }
    return $status;
}

function validaCodigoFornecedor($conn,$cnpj){
    
    try{
        # TRATA CNPJ PARA GRAVACAO #
        $cnpj= str_replace(".","", $cnpj);
        $cnpj= str_replace("/","", $cnpj);
        $cnpj= str_replace("-","", $cnpj);
        
        $valida=$conn->prepare('SELECT fornecedor_id FROM fornecedores WHERE fornecedor_cnpj = :cnpj');
        $valida->bindValue(":cnpj",$cnpj);
        $valida->execute();
        
        if($valida->rowcount() == 0 ){
            echo "false";
        }else{
            echo "true";
        }
        
    } catch (Exception $ex) {
            echo $ex->getMessage();
    }
}

function validaTreinamentoCadastrado($conn,$codigo){
    
    try {
        
        $valida=$conn->prepare('SELECT treinamento_id FROM treinamentos WHERE treinamento_codigo = :codigo');
        $valida->bindValue(":codigo",$codigo);
        $valida->execute();
        
        if($valida->rowcount() == 0 ){
            return false;
        }else{
            return true;
        }
    } catch (Exception $ex) {
        
    }
}

function validaCodigoCurso($conn,$codigo){
    
    try {
        
        $valida=$conn->prepare('SELECT treinamento_id FROM treinamentos WHERE treinamento_codigo = :codigo');
        $valida->bindValue(":codigo",$codigo);
        $valida->execute();
        
        if($valida->rowcount() == 0 ){
            return false;
        }else{
            return true;
        }
        
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}