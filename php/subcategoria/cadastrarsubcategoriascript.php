
<html>
	<header>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../../css/css.css">



	</header>
	
	
	<div id="cabecalho"> 
		<img src="../../img/principal.jpg" width="180px" height="180px" align="left" border="1">
		<center>
			<h2>SubCategoria</h2>
		</center>
	</div>
	
	<body>
	
		<div id="botoes">
			<button><a href="../../index.html"><img src="../../img/homeicon.png" width="35px" height="35px"></a></button>
			<button><a href="cadastrarsubcategoria.php"><img src="../../img/backicon.png" width="35px" height="35px"></a></button>
		</div>


<?php

include("../conexao.php");






// RECEBENDO OS DADOS PREENCHIDOS DO FORMULÁRIO !
$id_categoria= $_POST	 ["id_categoria"];//atribuição do campo "nome_categoria" vindo do formulário para variavel
$nome_subcategoria= $_POST ["nome_subcategoria"];//atribuição do campo "nome_subcategoria" vindo do formulário para variavel

if(empty($id_categoria)){
	echo "<center>";
		echo	"<div id='erro'>";
		echo		"<table>";
		echo			"<tr>";
		echo				"<h1>Erro na operação</h1>";
		echo				"<h1>Campo Categoria precisa ser selecionado</h1>";
		echo			"</tr>";
		echo		"</table>"	;
		echo	"</div>";
		echo "</center>";
	
	
	
	
}else{

if(empty($nome_subcategoria)){
	echo "<center>";
		echo	"<div id='erro'>";
		echo		"<table>";
		echo			"<tr>";
		echo				"<h1>Erro na operação</h1>";
		echo				"<h1>Campo Nome da SubCategoria precisa ser preenchido</h1>";
		echo			"</tr>";
		echo		"</table>"	;
		echo	"</div>";
		echo "</center>";
	
	
	
	
}
else{


   $sql = "SELECT * FROM subcategoria WHERE nome_subcategoria = '{$nome_subcategoria}'"; //monto a query


  $query = $conn->query( $sql ); //executo a query

  if( $query->num_rows > 0 ) {//se retornar algum resultado 
	echo "<center>";
		echo	"<div id='erro'>";
		echo		"<table>";
		echo			"<tr>";
		echo				"<h1>Erro na operação</h1>";
		echo				"<h1>SubCategoria Já Cadastrada</h1>";
		echo			"</tr>";
		echo		"</table>"	;
		echo	"</div>";
		echo "</center>";
	
	
	
	
	
	
  } else {

 
  $comando="INSERT INTO subcategoria (nome_subcategoria,categoria_id_categoria) 
	VALUES ('{$nome_subcategoria}', {$id_categoria});";
	





	
 $resultado=mysqli_query($conn,$comando);
	
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
		
		
			<center>
			<div id='erro'>
				<table>
					<tr>
						<h1>Erro ao cadastrar</h1>
					</tr>
				</table>	
			</div>
		</center>	
				
		";
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