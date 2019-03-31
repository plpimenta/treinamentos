#!/usr/bin/php -q
<?php

require_once('../classes/conn.php');


$atualiza=$conn->prepare('SELECT * FROM treinamentos');
$atualiza->execute();

while($valor=$atualiza->fetch()){


	$gravar=$conn->prepare('UPDATE treinamentos SET treinamento_codigo = :codigo WHERE treinamento_id = :id');
	$gravar->bindValue(":codigo",$valor['treinamento_codigo'] + 1001);
	$gravar->bindValue(":id",$valor['treinamento_id']);
	$gravar->execute();

}	
?>
