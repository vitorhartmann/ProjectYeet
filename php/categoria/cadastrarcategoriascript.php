<html>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">



	</header>
	
	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Categoria</h2>
		</center>
	</div>
	
	<body>
	
		<div id="botoes">
			<button><a href="../../index.html"><img src="../../img/homeicon.png" width="35px" height="35px"></a></button>
			<button><a href="cadastrarcategoria.php"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>


<?php








include("../conexao.php");


// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$nome_categoria= $_POST ["nome_categoria"];//atribuição do campo "nome_categoria" vindo do formulário para variavel


if(mysql_num_rows($pegaEmail) == 1){
  echo "email já cadastrado";
}
else{
  echo "cadastrado com sucesso";
}
 
$comando="INSERT INTO categoria (nome_categoria) 
	VALUES ('{$nome_categoria}')";
	

	




	
 $resultado=mysqli_query($conn,$comando);
	
	 if($resultado==true){
		echo "
		<center>
			<div id='sucesso'>
				<table>
					<tr>
						<h1>Exito na operação</h1>
					</tr>
				</table>	
			</div>
		</center>	
		";
	}else{
			
		echo "
		
		
			<center>
			<div id='erro'>
				<table>
					<tr>
						<h1>Erro na operação</h1>
					</tr>
				</table>	
			</div>
		</center>	
				
		";
	} 

		
?>
</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>

