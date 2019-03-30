<?php
include_once('../core/config.php');
 
// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = '../Arquivos/';
 
// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
 
// Array com as extensões permitidas
$_UP['extensoes'] = array('jpg', 'png', 'gif', 'pdf', 'csv','xlsx');
 
// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
//$_UP['renomeia'] = false;
$_UP['renomeia'] = false;
 
// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
 
// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
exit; // Para a execução do script
}
 
// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
 
// Faz a verificação da extensão do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if (array_search($extensao, $_UP['extensoes']) === false) {
echo "Por favor, envie arquivos com as seguintes extensões: jpg, png ou gif";
}
 
// Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
}
 
// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
else {
// Primeiro verifica se deve trocar o nome do arquivo
if ($_UP['renomeia'] == true) {
// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
//    $nome_final = $_POST['nome'];
        $meuNome=$_POST['nome']; 
$nome_final =$meuNome .'.jpg';
} else {
// Mantém o nome original do arquivo
$nome_final = $_FILES['arquivo']['name'];
}
 
// Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
echo "Upload efetuado com sucesso!";
//echo '<br /><a href="' . $_UP['pasta'] . $nome_final . '">Clique aqui para acessar o arquivo</a>';
} else {
// Não foi possível fazer o upload, provavelmente a pasta está incorreta
echo "Não foi possível enviar o arquivo, tente novamente";
}
 
}

 

$arquivo = fopen ('../Arquivos/Pessoal.csv', 'r');


try {
    $trunca = $conn->prepare("TRUNCATE TABLE pessoal");
    $trunca->execute();
    echo "ok";
} catch (Exception $ex) {
    echo $ex->getMessage();
}
//Lê o conteúdo do arquivo
while(!feof($arquivo))
{
  
// Pega os dados da linha
$linha = fgets($arquivo, 1024);

// Divide as Informações das celular para poder salvar
$dados = explode(';', $linha);

// Verifica se o Dados Não é o cabeçalho ou não esta em branco
if($dados[0] != 'Nome' && !empty($linha))
{
    
  
    $valor1 = $dados['0'];
    $valor2 = $dados['1'];

   

    try {
        $query=$conn->prepare("INSERT INTO pessoal (pessoal_id , Estabelecimento_id , Estabelecimento_nome, Matricula, Nome, Data_admissao, Data_nascimento, Cargo_codigo,
                            Cargo_nome, Codigo, Funcao_nome, Centro_resultado_codigo, Centro_resultado_nome, Atividade_periculosa, Numero_horas, Sindicato_codigo, Sindicato_razaosocial, Sexo, Grau_instrucao_nome, Deficiente, CPF, Chefia_imediata_matricula, Chefia_imediata_nome, Email, CTPS_numero, CTPS_serie, PIS, Identidade, Situacao, RUT, Status) VALUES 
                            (null, '$dados[1]', '$dados[2]', '$dados[3]', '$dados[4]', '$dados[5]', '$dados[6]', '$dados[7]', '$dados[8]', '$dados[9]', '$dados[10]', '$dados[11]','$dados[12]', '$dados[13]', '$dados[14]','$dados[15]', '$dados[16]', '$dados[17]', '$dados[18]', '$dados[19]', '$dados[20]', '$dados[21]', '$dados[22]', '$dados[23]', '$dados[24]', '$dados[25]', '$dados[27]', '$dados[26]', '$dados[28]', '$dados[29]', 2 )");//   var_dump($query);

        $query->execute();
        
    } catch (Exception $ex) {
        echo "<pre>";
        print_r($ex->getMessage());
        echo "</pre>";
    }
  

}
}

// Fecha arquivo aberto
fclose($arquivo);
  header("Refresh: 0; ../paginas/quadroPessoal.php");