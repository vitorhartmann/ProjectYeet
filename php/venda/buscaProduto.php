<?php
include "../conexao.php";
//recebe o código do estado selecionado
$tipo=$_POST['pesquisarpor'];
$valor=$_POST['valorcampo']
//se o código for vazio, quer dizer que a pessoa não escolheu um estado, então...
if ($tipo=="nome"){
	//através do echo, retorna para a página index uma option que diz que a pessoa deve selecionar o estado
	
	$sql="SELECT * FROM produto WHERE nome_produto = '$valor'"
	$result = $conn->query($sql);
	while($result=$sql_slt_cidades_preparado->fetch()){
		$codigo_cidade=$sql_slt_cidades_dados['id'];
		$nome_cidade=$sql_slt_cidades_dados['nome'];
		echo "<option value='$codigo_cidade'>$nome_cidade</option>";
	}
//senão, quer dizer que a pessoa escolheu um estado válido, então faz a pesquisa das cidades dele.
}else{
	$sql_slt_cidades="SELECT * FROM cidades WHERE estados_id='$cod'";
	$sql_slt_cidades_preparado=$conexao->prepare($sql_slt_cidades);
	$sql_slt_cidades_preparado->execute();
	//Através dos echos abaixo, retorna a lista das cidades do estado selecionado para a index
	echo "<option value=''>Escolha</option>";
	while($sql_slt_cidades_dados=$sql_slt_cidades_preparado->fetch()){
		$codigo_cidade=$sql_slt_cidades_dados['id'];
		$nome_cidade=$sql_slt_cidades_dados['nome'];
		echo "<option value='$codigo_cidade'>$nome_cidade</option>";
	}
}
?>
