<?php
include "../conexao.php";
//recebe o código do estado selecionado
$tipo=$_POST['tipo'];
$valor=$_POST['valor'];
//se o tipo for nome...
if ($tipo=="nome"){
	//faz a pesquisa por nome
	$sql="SELECT * FROM produto WHERE nome_produto = '$valor'";
	//executa
	$result = $conn->query($sql);
	
	 while($linha = mysqli_fetch_array($result)){
		 //pega os dados necessários em um array
		$produto['dado']=$linha['codbarras_produto'];
		$produto['valor']=$linha['valor_produto'];
		//transforma o array em Json para devolver ao JS
		echo json_encode($produto);
	}
//senão, quer dizer que a pessoa digitou um codigo...
}else{
	//faz a pesquisa por codigo
	$sql="SELECT * FROM produto WHERE codbarras_produto = '$valor'";
	//o resto é idem ao caso acima
	$result = $conn->query($sql);
	while($linha=mysqli_fetch_array($result)){
		$produto['dado']=$linha['nome_produto'];
		$produto['valor']=$linha['valor_produto'];
		echo json_encode($produto);
	}
}
?>
