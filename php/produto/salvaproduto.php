<html>
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
    //Recebe os dados com as alterações feitas
	include("../conexao.php");
    $id_produto = $_POST ["id_produto"];
    $novoNome = $_POST ["nome_produto"];
	$codbarras_produto = $_POST ["codbarras_produto"];
	
$sql = "SELECT * FROM produto WHERE nome_produto = '{$novoNome}'"; //monto a query


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
	
	
	
	
	
	
	if(empty($novoNome)){
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
	
	

    //Estabelece a conexão com o mysql
    
    
    //Executa a atualização no banco de dados
     echo $sql = "UPDATE produto SET nome_produto='" . $novoNome . "', codbarras_produto='" . $novoCodBarras . "'  WHERE id_produto=".$id_produto ;

	
    $update = mysqli_query($conn, $sql);
	


    if( !$update ){
        echo "
		
		
			<center>
			<div id='erro'>
				<table>
					<tr>
						<h1>Erro na operação </h1>
					</tr>
				</table>	
			</div>
		</center>	
				
		";
        exit;
    }else{
		

	
    
       
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