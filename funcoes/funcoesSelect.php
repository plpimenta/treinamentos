<?php
function validaUsuarioSenha($conn,$login,$senha){
    
    
    $valida=$conn->prepare('SELECT * FROM usuarios WHERE usuario_login = :login AND usuario_senha = :senha AND usuario_status = :status');
    $valida->bindValue(":login",$login);
    $valida->bindValue(":senha",md5($senha));
    $valida->bindValue(":status",1);
    $valida->execute();
    
    return $valida;
}

function selectTreinamentos($conn,$status){
    
    try {
    
        $exib=$conn->prepare('SELECT * FROM treinamentos WHERE treinamento_status = :status');
        $exib->bindValue(":status",$status);
        $exib->execute();
        return $exib;
        
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    
}

function selectTotalTreinamentosTreinados($conn){
    $exib=$conn->prepare('SELECT SUM(treinamento_treinados) as total_treinados FROM treinamentos');
    $exib->execute();
    $exib=$exib->fetch();
    return $exib['total_treinados'];
}
function selectTotalTreinamentos($conn){
    
    try {
        $exib=$conn->prepare('SELECT count(treinamentos_id) as total FROM treinamentos_historico WHERE 
                treinamentos_historico.treinamentos_status = :status1 OR treinamentos_historico.treinamentos_status = :status2');
        $exib->bindValue(":status1",'A VENCER');
        $exib->bindValue(":status2",'VENCIDO');
        $exib->execute();
        $exib=$exib->fetch();
        return $exib['total'];
        
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
}
function selectTotalTreinamentosVencidos($conn){
    try {
        $exib=$conn->prepare('SELECT count(treinamentos_id) as total FROM treinamentos_historico WHERE 
                            treinamentos_historico.treinamentos_status = :status');
        $exib->bindValue(":status'",'VENCIDO');
        $exib->execute();
        $exib=$exib->fetch();
        return $exib['total'];
        
    } catch (Exception $ex) {
        
        return $ex->getMessage();
    }
}
function selectTotalTreinamentosFormar($conn){
    $exib=$conn->prepare('SELECT SUM(treinamento_formar) as total_formar FROM treinamentos');
    $exib->execute();
    $exib=$exib->fetch();
    return $exib['total_formar'];
}

function selectTreinamentoPorId($conn,$id){
    $exib=$conn->prepare('SELECT * FROM `treinamentos` WHERE treinamento_id = :id');
    $exib->bindValue(":id",$id);
    $exib->execute();
    $exib=$exib->fetch();
    return $exib;
}

function selectCidades($conn){
    $exib=$conn->prepare('SELECT * FROM cidade');
    $exib->execute();
    return $exib;
}
function selectEstados($conn){
    $exib=$conn->prepare('SELECT * FROM estado');
    $exib->execute();
    return $exib;
}
function selectFornecedores($conn){
    
    try {
    
        $exib=$conn->prepare('SELECT * FROM fornecedores WHERE fornecedor_status = :status ');
        $exib->bindValue(":status",1);
        $exib->execute();
        return $exib;
        
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
    
    
}

function selectFornecedorPorId($conn,$id){
    
    try {
    
        $exib=$conn->prepare('SELECT * FROM fornecedores WHERE fornecedor_id = :id');
        $exib->bindValue(":id",$id);
        $exib->execute();
        $exib=$exib->fetch();
        return $exib;
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
}
function selectFornecedorPorCodigo($conn, $codigo){
    
    try {
    
        $exib=$conn->prepare('SELECT * FROM fornecedores WHERE fornecedor_codigo = :codigo');
        $exib->bindValue(":codigo",$codigo);
        $exib->execute();
        $exib=$exib->fetch();
        return $exib;
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
}

function selectInstrutor($conn,$local,$codigo){
    
    if(strtolower($local) == strtolower("INTERNO")){
        
        try {
            $exib=$conn->prepare('SELECT Nome,Matricula FROM Pessoal WHERE Matricula = :codigo');
            $exib->bindValue(":codigo",$codigo);
            $exib->execute();
            $exib=$exib->fetch();
            return $exib;
        } catch (Exception $ex) {
            
        }
    }elseif (strtolower($local) == strtolower("Externo")) {
        
        try {
        
            $exib=$conn->prepare('SELECT * FROM fornecedores WHERE fornecedor_codigo = :codigo');
            $exib->bindValue(":codigo",$codigo);
            $exib->execute();
            return $exib;
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
        
    }
}
function selectInstrutornNome($conn,$local,$codigo){
    
    if(strtolower($local) == strtolower("INTERNO")){
        
        try {
            
            $exib=$conn->prepare('SELECT Nome FROM Pessoal WHERE Matricula = :codigo');
            $exib->bindValue(":codigo",$codigo);
            $exib->execute();
            $exib=$exib->fetch();
            return $exib['Nome'];
            
        } catch (Exception $ex) {
            
        }
        
    }elseif (strtolower($local) == strtolower("Externo")) {
        
        try {
        
            $exib=$conn->prepare('SELECT fornecedor_descricao AS nome FROM fornecedores WHERE fornecedor_codigo = :codigo');
            $exib->bindValue(":codigo",$codigo);
            $exib->execute();
            $exib=$exib->fetch();
            return $exib['nome'];
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
        
    }
}

function selectNomeQuemCadastrou($conn,$codigo){
    
        try {
        
            $exib=$conn->prepare('SELECT usuario_nome FROM usuarios WHERE usuario_id = :id');
            $exib->bindValue(":id",$codigo);
            $exib->execute();
            $exib=$exib->fetch();
            return $exib['usuario_nome'];
        
        } catch (Exception $ex) {
            return $ex->getMessage();
        }
        
    
}
function selectCursoProximoCodigo($conn){
    
    try {
    
        $exib=$conn->prepare('SELECT Max(treinamento_codigo) as codigo FROM treinamentos');
        $exib->execute();
        
        if($exib->rowcount() == 0 ){
            return 1;
        }else{
            $exib=$exib->fetch();
            return $exib['codigo'] + 1;
        }
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
}

function selectDadosPessoalParaFormulario($conn){
    try {
        
        $exib=$conn->prepare('SELECT Matricula, Nome FROM Pessoal ORDER BY Nome ASC');
        $exib->execute();
        return $exib;
    } catch (Exception $ex) {
        return $ex->getMessage();
    }
}


###### Alexandre Santos###################
function selectQuadroPessoal($conn){
    $exib=$conn->prepare('SELECT * FROM `Pessoal` where Status = 1 LIMIT 150');
       $exib->execute();
      return $exib;
}

function selectTreinamentosHist($conn,$id){
    if($id){
    $exib=$conn->prepare("SELECT * FROM `treinamentos_historico` where status_treinamentos = 1 and treinamentos_id = :treinamentos_id ");
      $exib->bindValue(":treinamentos_id",$id);
       $exib->execute();
      return $exib;
} else{
    $exib=$conn->prepare('SELECT * FROM `treinamentos_historico` where status_treinamentos = 1  LIMIT 10 ');
       $exib->execute();
      return $exib;
}
}


?>