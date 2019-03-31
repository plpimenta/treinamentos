<?php

function validaFornecedorCadastrado($conn,$fornecedorCnpj){
    
    try{
        $valida=$conn->prepare('SELECT fornecedor_id FROM fornecedores WHERE fornecedor_cnpj = :cnpj');
        $valida->bindValue(":cnpj",$fornecedorCnpj);
        $valida->execute();
        if($valida->rowcount() == 0 ){
            return false;
        }else{
            return true;
        }
        
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
    
    
    
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
        } else {
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

function validaNomeCursoJaCadastrado($conn,$curso){
    
    try {
        
        $valida=$conn->prepare('SELECT treinamento_id FROM treinamentos WHERE treinamento_descricao = :descricao');
        $valida->bindValue(":descricao",$curso);
        $valida->execute();
        
        if($valida->rowcount() > 0 ){
            echo "true";
        }else{
            
            echo "false";
        }
            
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}