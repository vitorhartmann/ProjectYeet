<?php
include("../conexao.php");


 
// Recebe o valor enviado
$codbarras_produto = $_GET['codbarras_produto'];
 
// Procura titulos no banco relacionados ao valor
$sql = mysql_query("SELECT * FROM produto WHERE codbarras_produto LIKE '%".$codbarras_produto."%'");
 
// Exibe todos os valores encontrados
while ($codigo = mysql_fetch_object($sql)) {
	echo "<a href=\"javascript:func()\" onclick=\"exibirConteudo('".$codigo->id."')\">" . $codigo->titulo . "</a><br />";
}





?>