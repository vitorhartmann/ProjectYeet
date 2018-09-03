<?php
// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$codbarras_produto= $_POST ["codigobarras"];//atribuição do campo "codigobarras" vindo do formulário para variavel
$nome_produto= $_POST ["nomedoproduto"];//atribuição do campo "nomedoproduto" vindo do formulário para variavel

 
//Gravando no banco de dados ! conectando com o localhost - mysql
$conexao = mysql_connect("localhost","root"); //localhost é onde esta o banco de dados.
if (!$conexao)
die ("Erro de conexão com localhost, o seguinte erro ocorreu -> ".mysql_error());
 
//conectando com a tabela do banco de dados
$yeet = mysql_select_db("Produto",$conexao); //nome da tabela que deseja que seja inserida os dados cadastrais
if (!$yeet)
die ("Erro de conexão com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
 
 
//Query que realiza a inserção dos dados no banco de dados na tabela indicada acima
$query = "INSERT INTO `produto` ( `codbarras_produto` , `nome_produto` )
VALUES ('$codbarras_produto', '$nome_produto')";
mysql_query($query,$conexao);

#############################################
echo "Produto Cadastrado com sucesso.";
//mensagem que é escrita quando os dados são inseridos normalmente.
?>