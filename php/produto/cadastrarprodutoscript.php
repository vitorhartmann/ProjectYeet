<html>

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">



	</header>
	
	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>Produto</h2>
		</center>
	</div>
	
	<body>
	
		<div id="botoes">
			<button><a href="../../index.html"><img src="../../img/homeicon.png" width="35px" height="35px"></a></button>
			<button><a href="cadastrarproduto.php"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>

<?php

include("../conexao.php");






// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
 $codbarras_produto= $_POST ["codbarras_produto"];//atribuição do campo "codigobarras" vindo do formulário para variavel
 $nome_produto= $_POST ["nome_produto"];//atribuição do campo "nomedoproduto" vindo do formulário para variavel
$id_subcategoria= $_POST ["id_subcategoria"];//atribuição do campo "nome_subcategoria" vindo do formulário para variavel

if(empty($codbarras_produto)){
	echo "<center>";
		echo	"<div id='erro'>";
		echo		"<table>";
		echo			"<tr>";
		echo				"<h1>Erro na operação</h1>";
		echo				"<h1>Campo Código de Barras precisa ser preenchido</h1>";
		echo			"</tr>";
		echo		"</table>"	;
		echo	"</div>";
		echo "</center>";
	
	
	}
else{
	
 if(empty($nome_produto)){
	echo "<center>";
		echo	"<div id='erro'>";
		echo		"<table>";
		echo			"<tr>";
		echo				"<h1>Erro na operação</h1>";
		echo				"<h1>Campo Nome do produto precisa ser preenchido</h1>";
		echo			"</tr>";
		echo		"</table>"	;
		echo	"</div>";
		echo "</center>";
	
	
	
	
}
else{
	$sql = "SELECT * FROM produto WHERE nome_produto = '{$nome_produto}'"; //monto a query


  $query = $conn->query( $sql ); //executo a query

  if( $query->num_rows > 0 ) {//se retornar algum resultado 
	
		echo "<center>";
		echo	"<div id='erro'>";
		echo		"<table>";
		echo			"<tr>";
		echo				"<h1>Erro na operação</h1>";
		echo				"<h1>Produto Já Cadastrado</h1>";
		echo			"</tr>";
		echo		"</table>"	;
		echo	"</div>";
		echo "</center>";
	
	
	
	
	
	
  } else {
	  $sql = "SELECT * FROM produto WHERE codbarras_produto = '{$codbarras_produto}'"; //monto a query


  $query = $conn->query( $sql ); //executo a query

  if( $query->num_rows > 0 ) {//se retornar algum resultado 
	
		echo "<center>";
		echo	"<div id='erro'>";
		echo		"<table>";
		echo			"<tr>";
		echo				"<h1>Erro na operação</h1>";
		echo				"<h1>Produto Já Cadastrado</h1>";
		echo			"</tr>";
		echo		"</table>"	;
		echo	"</div>";
		echo "</center>";
	
	
	
	
	
	
  } else {
    


 
  $comando="INSERT INTO produto (nome_produto, saldo_produto, codbarras_produto,
 valor_produto, subcategoria_id_subcategoria) VALUES ('{$nome_produto}', '0', '{$codbarras_produto}', '0', '{$id_subcategoria}')";
	

	




	
 $resultado=mysqli_query($conn,$comando);
	
	 if($resultado==true){
		echo "
		<center>
			<div id='sucesso'>
				<table>
					<tr>
						<h1>Êxito na operação</h1>
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

  }
  }
}
}

?>

</body>
	<div id="rodape">     
		<p></p>
	</div>
	
</html>