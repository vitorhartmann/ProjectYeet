<?php

include("../conexao.php");






// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$nome_categoria= $_POST ["nome_categoria"];//atribuição do campo "nome_categoria" vindo do formulário para variavel


 


 
$comando="INSERT INTO categoria (nome_categoria) 
	VALUES ('{$nome_categoria}')";
	

	
// $mysqli_query($conexao.$comando);



	
 $resultado=mysqli_query($conexao,$comando);
	
	 if($resultado==true){
		echo "
		<script>
			alert('Categoria cadastrada com sucesso!');
			location.href='cadastrarcategoria.php';
		</script>		
		";
	}else{
		echo "
		<script>
		alert('Erro ao cadastrar categoria!');
			location.href='cadastrarcategoria.html';
		</script>		
		";
	} 



?>