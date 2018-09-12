<?php

include("conexao.php");






// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
echo $codbarrasproduto= $_POST ["codigobarras"];//atribuição do campo "codigobarras" vindo do formulário para variavel
echo $nomeproduto= $_POST ["nomedoproduto"];//atribuição do campo "nomedoproduto" vindo do formulário para variavel

 


 
echo $comando="INSERT INTO produto (nome_produto,codbarras_produto) 
	VALUES ('{$nomeproduto}','{$codbarrasproduto}')";
	

	
// $mysqli_query($conexao.$comando);



	
 $resultado=mysqli_query($conexao,$comando);
	
	 if($resultado==true){
		echo "
		<script>
			alert('Produto cadastrado com sucesso!');
			location.href='../cadastrarproduto.html';
		</script>		
		";
	}else{
		echo "
		<script>
		alert('Erro ao cadastrar produto!');
			location.href='../cadastrarproduto.html';
		</script>		
		";
	} 



?>