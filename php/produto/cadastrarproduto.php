<html>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../css/css.css">



	</header>
	
	
	<div id="cabecalho"> 
		<img src="img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Bem vindo(a)</h2>
		</center>
	</div>
	
	<body>
	
		<div id="botoes">
			<button><a href="index.html"><img src="img/homeicon.png" width="35px" height="35px"></a></button>
			<button><a href="index.html"><img src="img/backicon.png" width="35px" height="35px"></a></button>
		</div>

<?php

include("../conexao.php");






// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
echo $codbarrasproduto= $_POST ["codigobarras"];//atribuição do campo "codigobarras" vindo do formulário para variavel
echo $nomeproduto= $_POST ["nomedoproduto"];//atribuição do campo "nomedoproduto" vindo do formulário para variavel

 


 
echo $comando="INSERT INTO produto (nome_produto,codbarras_produto) 
	VALUES ('{$nomeproduto}','{$codbarrasproduto}')";
	

	
// $mysqli_query($conexao.$comando);



	
 $resultado=mysqli_query($conexao,$comando);
	
	 if($resultado==true){
		echo "
		<center>
			<div id='sucesso'>
				<table>
					<tr>
						<h1>Cadastrado com sucesso</h1>
					</tr>
				</table>	
			</div>
		</center>	
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

</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>